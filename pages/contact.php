<?php
include dirname(__DIR__) . '/includes/config.php';
include_once dirname(__DIR__) . '/includes/schema.php';

$page_title = "Contact Kapiree | Candidate Screening Software";
$meta_description = "Get in touch with Kapiree to learn how our video interview platform and pre-screening tools can improve hiring efficiency.";
$canonical_url = SITE_URL . "/contact";
$og_title = $page_title;
$og_description = $meta_description;
$og_url = $canonical_url;
$og_image = ASSETS_PATH . "/images/home_og.webp";

// JSON-LD Schema for Contact Page
$schema_markup = [
    get_organization_schema(),
    get_contact_page_schema(),
    get_breadcrumb_schema([
        ['name' => 'Home', 'url' => SITE_URL],
        ['name' => 'Contact', 'url' => SITE_URL . '/contact']
    ])
];

$active_page = 'contact';
$theme = 'light';
include FS_INCLUDES . '/head.php';
include FS_COMPONENTS . '/header.php';
?>

<main role="main" class="relative flex min-h-screen w-full flex-col group/design-root">
    <section class="contact-hero pt-16 pb-12 bg-background-light">
        <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-text-main leading-[1.1] tracking-tight mb-6">Let's get in touch!</h1>
            <p class="section-subheading max-w-2xl mx-auto">Have a question or need a hand? Tell us what you're looking for - we'll make sure you get the right support.</p>
        </div>
    </section>

    <section class="pb-20 bg-background-light contact-form-section">
        <div class="layout-container max-w-[800px] mx-auto px-4 sm:px-8 xl:px-20">
            <div id="contact-form-card" class="bg-white border border-border-light rounded-xl shadow-md p-6 sm:p-10">
                <form class="space-y-6" id="contact-form">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-text-main mb-2" for="full-name">Full Name</label>
                            <input class="w-full rounded-btn border-border-light bg-background-subtle focus:border-primary focus:ring-primary text-text-main placeholder:text-text-dim/50 text-sm h-12" id="full-name" name="full-name" placeholder="Enter your full name" type="text" required />
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-text-main mb-2" for="email">Email</label>
                            <input class="w-full rounded-btn border-border-light bg-background-subtle focus:border-primary focus:ring-primary text-text-main placeholder:text-text-dim/50 text-sm h-12" id="email" name="email" placeholder="you@company.com" type="email" required />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-text-main mb-2" for="company">Company Name</label>
                            <input class="w-full rounded-btn border-border-light bg-background-subtle focus:border-primary focus:ring-primary text-text-main placeholder:text-text-dim/50 text-sm h-12" id="company" name="company" placeholder="Enter your company name" type="text" required minlength="2" />
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-text-main mb-2" for="phone">Phone Number</label>
                            <input class="w-full rounded-btn border-border-light bg-background-subtle focus:border-primary focus:ring-primary text-text-main placeholder:text-text-dim/50 text-sm h-12" id="phone" name="phone" placeholder="+91 XXXX XXX XXX" type="tel" required />
                            <p id="phone-error" class="text-red-500 text-xs mt-1 hidden">Please enter a valid phone number (8–15 digits)</p>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-text-main mb-2">Purpose of Contact</label>
                        <div class="relative">
                            <select class="w-full rounded-btn border-border-light bg-background-subtle focus:border-primary focus:ring-primary text-text-main text-sm h-12 appearance-none cursor-pointer pr-10" id="purpose" name="purpose" required style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: none !important;">
                                <option disabled="" selected="" value="">Select a purpose</option>
                                <option value="Request Demo">Request Demo</option>
                                <option value="Request Product">Request Product</option>
                                <option value="Queries">Queries</option>
                            </select>
                            <!-- SVG chevron — no font-load dependency, zero CLS -->
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-text-dim" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:block;flex-shrink:0"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-text-main mb-2" for="message">Message <span class="text-text-dim font-normal">(Optional)</span></label>
                        <textarea class="w-full rounded-btn border-border-light bg-background-subtle focus:border-primary focus:ring-primary text-text-main placeholder:text-text-dim/50 text-sm min-h-[120px] resize-y" id="message" name="message" placeholder="How can we help you?"></textarea>
                    </div>

                    <div class="pt-2">
                        <button id="submit-btn" class="w-full h-12 flex items-center justify-center rounded-btn bg-primary hover:bg-primary/90 text-white font-bold transition-all shadow-lg shadow-primary/20 hover:shadow-primary/30 transform hover:-translate-y-0.5" type="submit">
                            <span id="submit-text">Contact Us</span>
                            <span id="submit-loading" class="hidden">
                                <span class="material-symbols-outlined animate-spin mr-2">progress_activity</span>
                                Sending...
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Thank You Screen -->
                <div id="thank-you-message" class="hidden text-center py-10">
                    <div class="inline-flex items-center justify-center size-16 rounded-full bg-green-100 mb-6">
                        <span class="material-symbols-outlined text-4xl text-green-600" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-text-main mb-4">Thank You!</h2>
                    <p class="text-text-dim text-lg mb-8">We've received your request and will get back to you shortly.</p>
                    <a href="<?php echo HOME_PATH; ?>" class="inline-flex items-center justify-center h-12 px-8 rounded-btn bg-primary hover:bg-primary/90 text-white font-bold transition-all shadow-lg shadow-primary/20 transform hover:-translate-y-0.5">
                        <span class="material-symbols-outlined mr-2">home</span>
                        Return to Home Page
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include FS_COMPONENTS . '/cta-transform.php'; ?>
</main>

<?php include FS_COMPONENTS . '/footer.php'; ?>
<?php include FS_INCLUDES . '/scripts.php'; ?>

<!-- reCAPTCHA v3 API - Lazy loaded on demand -->
<script>
let recaptchaLoaded = false;
function loadRecaptcha() {
    if (recaptchaLoaded) return Promise.resolve();
    return new Promise(function(resolve, reject) {
        var script = document.createElement('script');
        script.src = 'https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_SITE_KEY; ?>';
        script.async = true;
        script.defer = true;
        script.onload = function() { recaptchaLoaded = true; resolve(); };
        script.onerror = reject;
        document.head.appendChild(script);
    });
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var contactForm = document.getElementById('contact-form');
    var submitBtn   = document.getElementById('submit-btn');
    var submitText  = document.getElementById('submit-text');
    var submitLoading = document.getElementById('submit-loading');

    if (!contactForm) return;

    function showErrorToast(message) {
        var existing = contactForm.querySelector('.error-toast');
        if (existing) existing.remove();

        var toast = document.createElement('div');
        toast.className = 'error-toast bg-red-50 border border-red-200 rounded-xl p-4 mb-4 flex items-center gap-3';
        toast.innerHTML =
            '<span class="material-symbols-outlined text-red-500">error</span>' +
            '<span class="text-red-700 text-sm font-medium">' + message + '</span>' +
            '<button class="error-toast-close ml-auto text-red-400 hover:text-red-600">' +
            '<span class="material-symbols-outlined text-lg">close</span></button>';

        toast.querySelector('.error-toast-close').addEventListener('click', function() {
            toast.remove();
        });

        contactForm.insertBefore(toast, contactForm.firstChild);
        setTimeout(function() { if (toast.parentNode) toast.remove(); }, 5000);
    }

    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Phone validation
        var phoneField  = document.getElementById('phone');
        var phoneError  = document.getElementById('phone-error');
        var phoneDigits = phoneField ? phoneField.value.trim().replace(/[^0-9]/g, '') : '';
        if (phoneField && (phoneDigits.length < 8 || phoneDigits.length > 15)) {
            if (phoneError) phoneError.classList.remove('hidden');
            phoneField.classList.add('border-red-400');
            return;
        } else {
            if (phoneError) phoneError.classList.add('hidden');
            if (phoneField) phoneField.classList.remove('border-red-400');
        }

        if (submitText)    submitText.classList.add('hidden');
        if (submitLoading) submitLoading.classList.remove('hidden');
        if (submitBtn)     submitBtn.disabled = true;

        function getRecaptchaToken() {
            var isLocal = ['localhost', '127.0.0.1', '::1'].indexOf(window.location.hostname) !== -1;
            if (isLocal) return Promise.resolve('localhost-bypass');
            return loadRecaptcha().then(function() {
                return new Promise(function(resolve, reject) {
                    grecaptcha.ready(function() {
                        grecaptcha.execute('<?php echo RECAPTCHA_SITE_KEY; ?>', { action: 'contact_form' })
                            .then(resolve).catch(reject);
                    });
                });
            });
        }

        function resetBtn() {
            if (submitText)    submitText.classList.remove('hidden');
            if (submitLoading) submitLoading.classList.add('hidden');
            if (submitBtn)     submitBtn.disabled = false;
        }

        getRecaptchaToken().then(function(token) {
            var formData = new FormData(contactForm);
            formData.append('g-recaptcha-response', token);

            var basePath   = window.location.protocol + '//' + window.location.host +
                             window.location.pathname.replace(/[^/]*$/, '');
            var handlerUrl = basePath + 'includes/contact-handler.php';

            fetch(handlerUrl, { method: 'POST', body: formData })
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    resetBtn();
                    if (data.success) {
                        contactForm.classList.add('hidden');
                        var title = document.querySelector('h1.text-4xl');
                        var sub   = document.querySelector('p.text-text-dim');
                        if (title) title.textContent = 'Request Received';
                        if (sub)   sub.classList.add('hidden');
                        var ty = document.getElementById('thank-you-message');
                        if (ty) ty.classList.remove('hidden');
                    } else {
                        showErrorToast(data.message || 'An error occurred. Please try again.');
                    }
                })
                .catch(function() {
                    resetBtn();
                    showErrorToast('An error occurred. Please try again.');
                });

        }).catch(function() {
            resetBtn();
            showErrorToast('reCAPTCHA verification failed. Please try again.');
        });
    });
});
</script>
