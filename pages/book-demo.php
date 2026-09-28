<?php
include dirname(__DIR__) . '/includes/config.php';

$page_title = "Book a Demo | AI Video Interview Software | Kapiree";
$meta_description = "Schedule a free demo to see how Kapiree automates pre-screening, candidate evaluation, and video interview workflows.";
$canonical_url = SITE_URL . "/book-demo";
$og_title = $page_title;
$og_description = $meta_description;
$og_url = $canonical_url;
$og_image = ASSETS_PATH . "/images/content/demo-video-thumbnail.webp";

$active_page = 'book-demo';
$theme = 'light';
$body_class = 'book-demo-page';

function book_demo_icon_mail() {
    return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display:block;flex-shrink:0"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>';
}
function book_demo_icon_contact() {
    return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display:block;flex-shrink:0"><path d="M16 2v2"/><path d="M8 2v2"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/></svg>';
}

$book_demo_css_path = dirname(__DIR__) . '/assets/css/output.css';
$book_demo_css_version = file_exists($book_demo_css_path) ? filemtime($book_demo_css_path) : time();
$book_demo_css_href = ASSETS_PATH . '/css/output.css?v=' . $book_demo_css_version;

$additional_head = '<link rel="preload" href="' . htmlspecialchars($book_demo_css_href, ENT_QUOTES, 'UTF-8') . '" as="style">'
. '<link rel="preconnect" href="https://assets.calendly.com" crossorigin>'
. '<style>
/* Book demo — stable layout from first paint (scoped to avoid header bleed) */
.book-demo-hero{min-height:200px;contain:layout style}
@media(min-width:768px){.book-demo-hero{min-height:180px}}
@media(min-width:1024px){.book-demo-hero{min-height:170px}}
.book-demo-section{padding-bottom:3rem;contain:layout style}
@media(min-width:1024px){.book-demo-section{min-height:clamp(760px,72vh,920px)}}
body.book-demo-page,
body.book-demo-page *{font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}
#booking-card{background:#fff;border:1px solid var(--border-color);border-radius:.75rem;box-shadow:0 4px 6px -1px rgba(0,0,0,.1),0 2px 4px -2px rgba(0,0,0,.1);overflow:hidden;contain:layout style}
#booking-card{min-height:460px}
@media(min-width:768px){#booking-card{min-height:520px}}
#booking-card .card-body{padding:1.5rem}
@media(min-width:768px){#booking-card .card-body{padding:2rem}}
#booking-card .benefits-grid{display:grid;grid-template-columns:1fr;gap:1rem;margin-bottom:1.5rem}
@media(min-width:768px){#booking-card .benefits-grid{grid-template-columns:repeat(3,minmax(0,1fr))}}
#booking-card .benefit-card{display:flex;flex-direction:column;align-items:center;text-align:center;padding:1rem;border-radius:.5rem;background-color:var(--surface-alt);min-height:118px}
#booking-card .benefit-icon{width:2.5rem;height:2.5rem;border-radius:9999px;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-bottom:.5rem}
#booking-card .benefit-icon-green{background-color:#dcfce7}
#booking-card .benefit-icon-blue{background-color:#dbeafe}
#booking-card .benefit-icon-purple{background-color:#f3e8ff}
#booking-card .benefit-title{font-size:.875rem;line-height:1.25rem;font-weight:700;color:var(--text-main);margin:0 0 .25rem}
#booking-card .benefit-text{font-size:.75rem;line-height:1rem;color:var(--text-dim);margin:0}
#booking-card .cookie-notice{margin-bottom:1.25rem;padding:.75rem;background-color:#eff6ff;border:1px solid #bfdbfe;border-radius:.5rem}
#booking-card .cookie-notice p{font-size:.75rem;line-height:1rem;color:#1e3a8a;margin:0}
#booking-card .cta-section{text-align:center;margin-bottom:1rem;min-height:72px}
#booking-card #open-calendly-btn{display:inline-flex;align-items:center;justify-content:center;min-height:44px;padding:.75rem 1.5rem;border:none;border-radius:.25rem;background-color:#530790;color:#fff;font-size:.75rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;cursor:pointer;box-shadow:0 4px 6px -1px rgba(84,7,147,.2)}
#booking-card .cta-note{font-size:.75rem;line-height:1rem;color:var(--text-dim);margin:.5rem 0 0}
#booking-card .contact-section{padding-top:1rem;border-top:1px solid var(--border-color);text-align:center;min-height:76px}
#booking-card .contact-lead{font-size:.75rem;line-height:1rem;color:var(--text-dim);margin:0 0 .5rem}
#booking-card .contact-links{display:flex;flex-wrap:wrap;gap:.75rem;justify-content:center;align-items:center;font-size:.875rem;line-height:1.25rem}
#booking-card .contact-link{display:inline-flex;align-items:center;gap:.25rem;color:var(--primary-color);font-weight:600;text-decoration:none}
#booking-card .contact-sep{color:var(--border-color)}
</style>';

$book_demo_icon_font_script = '<script>(function(){var u="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&icon_names=menu&display=optional";document.querySelectorAll(\'link[href*="Material+Symbols"]\').forEach(function(l){l.rel="stylesheet";l.removeAttribute("onload");l.href=u;});})();</script>';

ob_start();
include FS_INCLUDES . '/head.php';
include FS_COMPONENTS . '/header.php';
?>

<main role="main" class="relative flex w-full flex-col font-display">
    <section class="book-demo-hero pt-16 pb-8 bg-background-light">
        <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-text-main leading-[1.1] tracking-tight mb-6">Request a Demo</h1>
        </div>
    </section>

    <section class="book-demo-section bg-background-light">
        <div class="layout-container max-w-[900px] mx-auto px-4 sm:px-8 xl:px-20">
            <div id="booking-card" class="bg-white rounded-xl shadow-md border border-border-light overflow-hidden">
                <div class="card-body p-6 md:p-8">
                    <div class="benefits-grid grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="benefit-card flex flex-col items-center text-center p-4 rounded-lg bg-background-subtle">
                            <div class="benefit-icon benefit-icon-green bg-green-100 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgb(22,163,74)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display:block;flex-shrink:0"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            </div>
                            <h3 class="benefit-title font-bold text-text-main text-sm mb-1">30-Min Demo</h3>
                            <p class="benefit-text text-text-dim text-xs">Personalized walkthrough</p>
                        </div>
                        <div class="benefit-card flex flex-col items-center text-center p-4 rounded-lg bg-background-subtle">
                            <div class="benefit-icon benefit-icon-blue bg-blue-100 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgb(37,99,235)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display:block;flex-shrink:0"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                            </div>
                            <h3 class="benefit-title font-bold text-text-main text-sm mb-1">Live Video Call</h3>
                            <p class="benefit-text text-text-dim text-xs">Meet or Zoom</p>
                        </div>
                        <div class="benefit-card flex flex-col items-center text-center p-4 rounded-lg bg-background-subtle">
                            <div class="benefit-icon benefit-icon-purple bg-purple-100 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgb(147,51,234)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display:block;flex-shrink:0"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                            </div>
                            <h3 class="benefit-title font-bold text-text-main text-sm mb-1">Tailored</h3>
                            <p class="benefit-text text-text-dim text-xs">Focus on your needs</p>
                        </div>
                    </div>

                    <div class="cookie-notice mb-5 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                        <p class="text-xs text-blue-900">
                            <strong>Note:</strong> Our calendar uses Calendly, which may set cookies. By clicking below, you consent to Calendly's use of cookies.
                        </p>
                    </div>

                    <div class="cta-section text-center mb-4">
                        <button id="open-calendly-btn"
                                type="button"
                                class="text-xs font-bold uppercase tracking-wider py-3 rounded px-6 inline-block hover:opacity-90 transition-all shadow-md shadow-primary/20"
                                style="background-color: #530790; color: white;">
                            Book Your Demo
                        </button>
                        <p class="cta-note text-xs text-text-dim mt-2">No credit card required</p>
                    </div>

                    <div class="contact-section pt-4 border-t border-border-light text-center">
                        <p class="contact-lead text-text-dim text-xs mb-2">Prefer to reach out directly?</p>
                        <div class="contact-links flex flex-wrap gap-3 justify-center text-sm">
                            <span class="contact-link inline-flex items-center gap-1 text-primary font-semibold">
                                <?php echo book_demo_icon_mail(); ?>
                                <span>info&#64;kapiree&#46;com</span>
                            </span>
                            <span class="contact-sep text-border-light">•</span>
                            <a href="<?php echo PAGES_PATH; ?>/contact" class="contact-link inline-flex items-center gap-1 text-primary hover:text-primary/80 font-semibold transition-colors">
                                <?php echo book_demo_icon_contact(); ?>
                                <span>Contact form</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.getElementById('open-calendly-btn')?.addEventListener('click', function() {
    if (typeof window.openCalendlyPopup === 'function') {
        window.openCalendlyPopup('https://calendly.com/kapiree-info/30min');
    }
}, { passive: true });
</script>

<?php include FS_COMPONENTS . '/footer.php'; ?>
<?php include FS_INCLUDES . '/scripts.php'; ?>
<?php
$book_demo_html = ob_get_clean();
$book_demo_html = preg_replace(
    '/(<link rel="preload" href="[^"]*Material\+Symbols[^"]*"[^>]*>)/i',
    '$1' . $book_demo_icon_font_script,
    $book_demo_html,
    1
);
// Drop service-worker registration on this lightweight landing page.
$book_demo_html = preg_replace(
    '/<!-- Service Worker Registration for Caching -->.*?<\/script>\s*/s',
    '',
    $book_demo_html,
    1
);
echo $book_demo_html;
?>
