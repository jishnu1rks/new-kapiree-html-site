# new-kapiree-html-site

Static marketing site for Kapiree, deployed on Vercel.

- Source pages are the `*.dc.html` design files (Homepage, About, Pricing, Hiring, FAQ, Blogs, Customer Stories, Privacy, Terms, plus the shared `Modals` component).
- `node build.mjs` produces `dist/` with clean URLs (`/about`, `/pricing`, `/blogs/<slug>`, …), root-level `robots.txt` / `sitemap.xml` / `llms.txt`, and only the public assets.
- `vercel.json` runs that build, serves `dist/`, and redirects the old PHP-site URLs.
- `index.php`, `pages/`, `includes/`, `components/` are reference copies of the old PHP site and are not deployed.

## Deploy
Import this repo in Vercel (Framework preset: **Other**) — the settings come from `vercel.json`. Or from the CLI: `npx vercel --prod`.
