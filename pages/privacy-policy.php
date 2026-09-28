<?php
include dirname(__DIR__) . '/includes/config.php';

$page_title = "Privacy Policy | Kapiree";
$meta_description = "Read Kapiree's Privacy Policy and learn how we collect, use, and protect your personal information.";
$canonical_url = SITE_URL . "/privacy-policy";
$og_title = $page_title;
$og_description = $meta_description;
$og_url = $canonical_url;

$active_page = 'privacy';
$theme = 'light';
include FS_INCLUDES . '/head.php';
include FS_COMPONENTS . '/header.php';
?>

<main class="flex-1 w-full bg-white dark:bg-[#1a1022]">
    <section class="max-w-[1000px] mx-auto px-6 lg:px-10 py-16 md:py-24">
        <div class="flex flex-col gap-2 mb-12">
            <span class="text-primary text-sm font-bold uppercase tracking-wide">Legal</span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-text-main dark:text-white leading-[1.1] tracking-tight">
                Privacy Policy
            </h1>
            <p class="text-gray-500 dark:text-gray-400 text-lg mt-2">Last updated: January 2025</p>
        </div>

        <div class="flex flex-col gap-10 text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
            
            <div class="flex flex-col gap-4">
                <h3 class="text-[#151118] dark:text-white text-2xl font-bold">1. Information we collect from you</h3>
                <p>
                    Information that you may provide by filling in the forms on our website - www.kapiree.com and its domains, including the information provided at the time of registration, taking part in video interviews, subscribing to the services that Kapiree provides, requesting further information or services and any video content you might create. Information provided at the time of contacting us or any other correspondence between us. Details of your visit to the website including web traffic data, your IP address, operating system, browser, and other information that is captured automatically. Information provided through any surveys you may choose to take part in.
                </p>
            </div>

            <div class="flex flex-col gap-4">
                <h3 class="text-[#151118] dark:text-white text-2xl font-bold">2. How your information is used</h3>
                <p>
                    To allow you to register and create an account on Kapiree. To provide you with services you request through our website including video interviews. To provide you with information about our services. To provide support when requested. To inform you about changes in our terms of usage or other legal requirements. For our business requirements such as data analysis, security audits, and improvement of our product.
                </p>
            </div>

            <div class="flex flex-col gap-4">
                <h3 class="text-[#151118] dark:text-white text-2xl font-bold">3. Disclosure of your information</h3>
                <p>
                    If you are a candidate taking part in a video interview, we provide access to your video content to the concerned employer and their designated users. Any other information that you may choose to disclose as part of the recruitment process can also be shared with the employer. Additionally, your personal information may be disclosed if we are under a legal obligation to disclose or share your personal data. In such an event, we will endeavor to minimize such disclosure to what is reasonably necessary and, if possible, notify you of such disclosure. We may also disclose your information if we are trying to protect it against potential fraud or unauthorized transactions or investigating fraud that has already taken place.
                </p>
            </div>

            <div class="flex flex-col gap-4">
                <h3 class="text-[#151118] dark:text-white text-2xl font-bold">4. Your data protection rights</h3>
                <p>
                    As per relevant data protection policies and laws, you have specific rights regarding the personal information collected through our website: If you want to access, update, or request the deletion of your personal information and interview data, you can do so at any time by contacting us at info@kapiree.com. If we have obtained and processed your personal information with your consent, you have the right to withdraw your consent at any time. You possess the right to lodge a complaint with a data protection authority regarding our collection and use of your personal information. We address all requests from individuals whose information was collected through the website and who wish to exercise their data protection rights in compliance with applicable data protection laws. To safeguard your privacy and security, we take reasonable measures to verify your identity before granting account access or making any corrections to your information. Kapiree stores data in secure, compliant data centers. They ensure that the data is protected and accessible globally through their scalable content delivery network. Data Retention: The exact duration for which the data is stored can vary based on the organization’s data retention policies and plan they choose. Generally it is retained for a period necessary to complete the hiring process and any subsequent legal or compliance requirements.
                </p>
            </div>

            <div class="flex flex-col gap-4">
                <h3 class="text-[#151118] dark:text-white text-2xl font-bold">5. Cookies</h3>
                <p>
                    This website may use cookies and tracking technology depending on the features. Cookie and tracking technology are useful for gathering information such as browser type and operating system, tracking the number of visitors to the site, and understanding how visitors use the site. Cookies can also help customize the site for visitors depending on if you are an employer or a job seeker.
                </p>
            </div>

            <div class="flex flex-col gap-4">
                <h3 class="text-[#151118] dark:text-white text-2xl font-bold">6. Third-parties</h3>
                <p>
                    We provide links to external and third-party websites. These websites may not be affiliated with Kapiree and are not under our control. We cannot accept responsibility for the conduct of companies linked to our website. Before disclosing your personal information on any other website, we advise you to read their terms and conditions and privacy policy.
                </p>
            </div>

            <div class="flex flex-col gap-4">
                <h3 class="text-[#151118] dark:text-white text-2xl font-bold">7. Notification of changes</h3>
                <p>
                    Kapiree reserves the right to change or update this Privacy Policy at any time by posting a clear and conspicuous notice on the website explaining the change. All Privacy Policy changes will take effect immediately when they’re published on the website. Please check our website periodically for any changes that might affect you. Your continued use of the website and/or acceptance of our e-mail communications following the publishing of changes to this Privacy Policy will constitute your acceptance of any or all the changes.
                </p>
            </div>

            <div class="flex flex-col gap-4">
                <h3 class="text-[#151118] dark:text-white text-2xl font-bold">8. Live video interview recording - notice to end user</h3>
                <p>
                    Transparency is important to us. Employers using our platform may choose to record live video interviews. The candidate will be notified at the beginning of the interview if the session is being recorded. This notification will appear visually to ensure the candidate is fully informed before proceeding. By participating in a recorded interview, you're consenting to the collection and use of your personal data as outlined in this policy. If you have any concerns about interview recordings, please feel free to contact the employer directly or reach out to our support team for clarification.
                </p>
            </div>

        </div>
    </section>
</main>

<?php include FS_COMPONENTS . '/footer.php'; ?>
<?php include FS_INCLUDES . '/scripts.php'; ?>
