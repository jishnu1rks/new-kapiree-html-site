// Builds the deployable static site into dist/ (used by Vercel).
// The *.dc.html design files stay the source of truth; this only renames them to
// clean URLs, makes asset paths root-absolute and copies the public files.
import { cpSync, mkdirSync, readFileSync, rmSync, writeFileSync, existsSync } from "node:fs";

const OUT = "dist";

// design file -> published route (served via cleanUrls, e.g. about.html -> /about)
const PAGES = {
  "Homepage.dc.html": "index.html",
  "About.dc.html": "about.html",
  "Pricing.dc.html": "pricing.html",
  "Hiring.dc.html": "hiring.html",
  "FAQ.dc.html": "faq.html",
  "Blogs.dc.html": "blogs.html",
  "Customer Stories.dc.html": "customer-stories.html",
  "Privacy.dc.html": "privacy-policy.html",
  "Terms.dc.html": "terms-of-service.html",
};
const route = (file) => (PAGES[file] === "index.html" ? "/" : "/" + PAGES[file].replace(/\.html$/, ""));

// Root-relative prefixes for local files, so pages also work under /blogs/<slug>.
const LOCAL = /^(?:\.\/)?((?:uploads|assets|_ds)\/[^"']*|support\.js|favicon\.ico|blogs\.json|legal\.json)$/;

function rewrite(html) {
  // Links between design pages -> clean routes.
  html = html.replace(/href="([^"#]+\.dc\.html)(#[^"]*)?"/g, (m, file, hash = "") => {
    const name = decodeURIComponent(file);
    if (!PAGES[name]) return m;
    return `href="${route(name)}${hash}"`;
  });
  // Local assets -> absolute paths.
  html = html.replace(/\b(src|href)="([^"]+)"/g, (m, attr, url) => {
    const hit = url.match(LOCAL);
    return hit ? `${attr}="/${hit[1]}"` : m;
  });
  html = html.replace(/fetch\("(blogs|legal)\.json"\)/g, 'fetch("/$1.json")');
  // Blog posts get real URLs (/blogs/<slug>) instead of #post/<slug>.
  html = html.replace('href: "#post/" + b.slug', 'href: "/blogs/" + b.slug');
  html = html.replace('history.pushState(null, "", location.pathname)', 'history.pushState(null, "", "/blogs")');
  return html;
}

rmSync(OUT, { recursive: true, force: true });
mkdirSync(OUT, { recursive: true });

for (const [src, dest] of Object.entries(PAGES)) {
  writeFileSync(`${OUT}/${dest}`, rewrite(readFileSync(src, "utf8")));
}
// Imported component: the runtime fetches it by its design name.
writeFileSync(`${OUT}/Modals.dc.html`, rewrite(readFileSync("Modals.dc.html", "utf8")));

// Runtime: resolve imported components from the site root, not the current path.
const support = readFileSync("support.js", "utf8");
if (!support.includes('var COMPONENT_DIR = ".";')) throw new Error("support.js: COMPONENT_DIR marker not found");
writeFileSync(`${OUT}/support.js`, support.replace('var COMPONENT_DIR = ".";', 'var COMPONENT_DIR = "";'));

// Blog data with root-absolute image paths.
const blogs = JSON.parse(readFileSync("blogs.json", "utf8"));
const abs = (v) => (typeof v === "string" && /^(assets|uploads)\//.test(v) ? "/" + v : v);
const fix = (o) => (Array.isArray(o) ? o.map(fix) : o && typeof o === "object" ? Object.fromEntries(Object.entries(o).map(([k, v]) => [k, fix(abs(v))])) : o);
writeFileSync(`${OUT}/blogs.json`, JSON.stringify(fix(blogs)));

for (const p of ["assets", "uploads", "legal.json", "favicon.ico"]) cpSync(p, `${OUT}/${p}`, { recursive: true });
const ds = "_ds/modernist-4aed9d00-ade3-47d4-a294-39db364dc93d";
for (const f of ["styles.css", "_ds_bundle.js"]) cpSync(`${ds}/${f}`, `${OUT}/${ds}/${f}`);

// SEO files live at the site root.
for (const f of ["robots.txt", "sitemap.xml", "llms.txt"]) cpSync(`SEO/${f}`, `${OUT}/${f}`);

// Images referenced by OG tags / JSON-LD that the design never shipped.
cpSync("uploads/kapiree_logo.svg", `${OUT}/assets/images/kapiree-logo.svg`);
if (!existsSync("assets/images/home_og.webp")) {
  cpSync("assets/images/content/video-interview-software-kapiree-desktop.webp", `${OUT}/assets/images/home_og.webp`);
}

console.log(`Built ${Object.keys(PAGES).length} pages into ${OUT}/`);
