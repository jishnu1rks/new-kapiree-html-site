<?php
$is_root = true;

// Basic Router for environments where server rewrites (nginx/apache) fail to map clean URLs to /pages/xxx.php
$request_uri = $_SERVER['REQUEST_URI'];
$base_path = dirname($_SERVER['SCRIPT_NAME']);
// Remove base path if present (e.g. /kapiree)
if (strpos($request_uri, $base_path) === 0 && $base_path !== '/') {
    $path = substr($request_uri, strlen($base_path));
} else {
    $path = $request_uri;
}

// Strip query string and leading/trailing slashes
$path = trim(parse_url($path, PHP_URL_PATH), '/');

// List of valid pages in /pages directory
$valid_pages = [
    'about', 'blog-details', 'blogs', 'book-demo', 'contact', 
    'features', 'pricing', 'pricing_3', 'pricing-3',
    'privacy-policy', 'products', 'report-sample', 'terms-of-service'
];

// Handle /blogs/{slug} routing
if (strpos($path, 'blogs/') === 0) {
    $slug = substr($path, 6); // Get slug after 'blogs/'
    if (!empty($slug)) {
        $_GET['slug'] = $slug;
        include 'pages/blog-details.php';
        exit;
    }
}

if (!empty($path) && (in_array($path, $valid_pages) || in_array($path . '.php', $valid_pages))) {
    $page_name = str_replace('.php', '', $path);
    $page_file = 'pages/' . $page_name . '.php';
    $fallback_file = 'pages/' . str_replace('-', '_', $page_name) . '.php';

    if (file_exists($page_file)) {
        include $page_file;
        exit;
    }

    if (file_exists($fallback_file)) {
        include $fallback_file;
        exit;
    }
}

include 'includes/config.php';

// Include schema helper
include_once 'includes/schema.php';

$page_title = "Video Interview Software | Automated Pre-Screening | Kapiree";
$meta_description = "Automate hiring with video interview software, AI-powered pre-screening, and candidate screening tools. Identify top talent faster with Kapiree.";
$canonical_url = SITE_URL;
$og_title = $page_title;
$og_description = $meta_description;
$og_url = $canonical_url;
$og_image = ASSETS_PATH . "/images/home_og.webp";

// Add JSON-LD Schema for Homepage
$schema_markup = [
    get_organization_schema(),
    get_website_schema(),
    get_software_application_schema(),
    get_service_schema()
];

$active_page = 'home';
$theme = 'light';
include 'includes/head.php';
include 'components/header.php';
?>

<style>
    .perspective-container {
        perspective: none;
    }
    .card-3d-left {
        transform: rotate(-6deg) translateY(20px);
        filter: opacity(0.9);
        transition: all 0.5s ease;
    }
    .card-3d-right {
        transform: rotate(6deg) translateY(20px);
        filter: opacity(0.9);
        transition: all 0.5s ease;
    }
    .card-3d-center {
        z-index: 30;
        transform: scale(1.02);
        box-shadow: 0 20px 40px -10px rgba(0,0,0,0.15);
    }
</style>

<main role="main" id="main-content" class="relative flex min-h-screen w-full flex-col">
    
<!-- Hero4 Section: 3D Candidate Profile Cards -->
    <section class="relative w-full pt-16 overflow-visible">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20 text-center mb-2">
            <div class="flex flex-col gap-2 text-center">
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-semibold tracking-tighter text-text-main">
                    Kapiree automates pre-screening to hire faster and smarter.
                </h1>
            </div>
            <p class="text-lg md:text-xl text-text-light font-medium max-w-1xl mx-auto leading-relaxed mt-6 mb-6">
                AI-powered video interview and pre-screening software that helps hiring teams screen 10x more candidates, reduce time-to-hire by 50%, and surface top talent automatically.
            </p>
            <button onclick="window.openCalendlyPopup('https://calendly.com/kapiree-info/30min');return false;" class="inline-flex items-center justify-center h-12 px-8 rounded-lg bg-primary hover:bg-primary/90 text-white font-bold transition-all shadow-lg shadow-primary/20 relative z-30" style="min-width: 160px;">
                Book a demo
            </button>
        </div>
        
        <div class="w-full relative flex items-center justify-center overflow-visible hero-wrapper">
            <div class="max-w-5xl mx-auto px-4 relative" id="hero-image-wrapper">
                <!-- Base hero image with picture element for better control -->
               <picture style="display: block; width: 100%; aspect-ratio: 1303/597;">
    <source media="(min-width: 1303px)" srcset="<?php echo ASSETS_PATH; ?>/images/content/video-interview-software-kapiree-desktop.webp" width="1303" height="597">
    <source media="(min-width: 768px)" srcset="<?php echo ASSETS_PATH; ?>/images/content/video-interview-software-kapiree-medium.webp" width="1024" height="469">
    <source media="(min-width: 480px)" srcset="<?php echo ASSETS_PATH; ?>/images/content/video-interview-software-kapiree-small.webp" width="768" height="352">
    <img src="<?php echo ASSETS_PATH; ?>/images/content/video-interview-software-kapiree-small.webp" 
         alt="Kapiree Video Interview Software Platform" 
         class="w-full h-auto rounded-xl shadow-2xl relative z-10" 
         style="aspect-ratio: 1303/597; display: block;"
         fetchpriority="high" 
         width="1303" 
         height="597"
         loading="eager">
</picture>

                <!-- Animated overlay image masked inside hero.webp bounds -->
                <div id="hero2-mask" class="absolute inset-0 z-20 rounded-xl overflow-hidden pointer-events-none" style="height: 100%;">
                    <img id="hero2-img" 
                         src="<?php echo ASSETS_PATH; ?>/images/content/candidate-screening-software-xs.webp" 
                         srcset="<?php echo ASSETS_PATH; ?>/images/content/candidate-screening-software-xs.webp 124w,
                                 <?php echo ASSETS_PATH; ?>/images/content/candidate-screening-software-mobile.webp 216w,
                                 <?php echo ASSETS_PATH; ?>/images/content/candidate-screening-software-small.webp 307w,
                                 <?php echo ASSETS_PATH; ?>/images/content/candidate-screening-software-optimized.webp 423w"
                         sizes="(max-width: 480px) 124px, (max-width: 768px) 216px, (max-width: 1200px) 307px, 423px"
                         alt="Kapiree Candidate Screening Platform" 
                         aria-hidden="true" 
                         fetchpriority="low"
                         width="423" 
                         height="480"
                         loading="lazy"
                         decoding="async"
                         style="position: absolute; bottom: -5%; right: 200px; width: 30%; height: auto; aspect-ratio: 423/480; transform: translate3d(0,110%,0); will-change: transform, opacity;">
                </div>
            </div>
        </div>

        <style>
            #hero2-img {
                filter: drop-shadow(0 -12px 24px rgba(0,0,0,0.3));
                animation: hero2Rise 1.4s cubic-bezier(0.22, 1, 0.36, 1) 0.4s forwards;
            }
            @keyframes hero2Rise {
                0%   { transform: translate3d(0, 110%, 0); opacity: 0.7; }
                100% { transform: translate3d(0, 0, 0); opacity: 1; }
            }
            
            /* Responsive padding for hero wrapper */
            .hero-wrapper {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
            @media (min-width: 768px) {
                .hero-wrapper {
                    padding-top: 1.5rem;
                    padding-bottom: 1.5rem;
                }
            }
            @media (min-width: 1024px) {
                .hero-wrapper {
                    padding-top: 2rem;
                    padding-bottom: 2rem;
                }
            }
        </style>
    </section>

    <!-- Social Proof / Logos -->
    <?php include 'components/logo-carousel.php'; ?>

    <!-- Dashboard: How Pre-Screening Works -->
    <?php
    // Dashboard Data Model
    $headerData = [
        'title' => 'How Kapiree\'s AI Pre-Screening Process Works',
        'subtitle' => 'From application to shortlist in a few simple steps',
    ];

    $statsCards = [
        [
            'title' => 'Total Shortlisted',
            'value' => '1,245',
            'growth' => '+12%',
            'isPositive' => true,
            'period' => 'vs last week'
        ],
        [
            'title' => 'Avg. Candidate Score',
            'value' => '85.4',
            'growth' => '+1.2',
            'isPositive' => true,
            'period' => 'vs last week'
        ],
        [
            'title' => 'Time to Shortlist',
            'value' => '1.8 days',
            'growth' => '-15%',
            'isPositive' => true, // Green color per design
            'iconDirection' => 'down',
            'period' => 'vs last week'
        ],
    ];

    $funnelData = [
        ['stage' => 'Received', 'numbers' => '9,670 Candidates', 'widthPercent' => 100],
        ['stage' => 'Automated Screening', 'numbers' => '4,526 Profiles', 'widthPercent' => 85],
        ['stage' => 'Shortlisted', 'numbers' => '1,245 Shortlisted', 'widthPercent' => 65],
        ['stage' => 'Interviewed', 'numbers' => '890 Interviewed', 'widthPercent' => 45],
        ['stage' => 'Hired', 'numbers' => '20 Final Hires', 'widthPercent' => 15],
    ];

    $pipelineData = [
        [
            'title' => '9,670+ Applicants',
            'subtitle' => 'MASS SUBMISSION',
            'status' => 'RECEIVED',
            'statusColor' => 'text-gray-500',
            'iconSvg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />'
        ],
        [
            'title' => 'Automated Screening',
            'subtitle' => '4,526 Profiles Filtered',
            'status' => 'FILTERED',
            'statusColor' => 'text-emerald-500',
            'iconSvg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082m0 0a24.301 24.301 0 01-3 0m3 0v5.714c0 .597-.237 1.17-.659 1.591L10.5 14.5m-6 0v2.25a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25v-2.25m-15 0l4.09-4.091m10.91 0l-4.09-4.091m-6 0l4.09 4.091m-10.91 0l4.09-4.091" />'
        ],
        [
            'title' => 'Video Interview',
            'subtitle' => '1,245 AI-Assessed recordings',
            'status' => 'COMPLETED',
            'statusColor' => 'text-emerald-500',
            'iconSvg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />'
        ],
        [
            'title' => 'Rating & Filters',
            'subtitle' => '890 Candidates Ranked',
            'status' => 'QUALIFIED',
            'statusColor' => 'text-blue-500',
            'iconSvg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />'
        ],
        [
            'title' => 'Final Screened List',
            'subtitle' => '20 Ready for Selection',
            'status' => 'READY',
            'statusColor' => 'text-emerald-500',
            'iconSvg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'
        ],
    ];
    ?>
    


    <!-- Problems Section -->
    <section class="section-padding bg-background-subtle" style="contain: layout style paint;">
        <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
            <div class="flex flex-col mb-12 text-center">
                <h2 class="section-heading">The Problem with Traditional Pre-Screening</h2>
                <p class="section-subheading">Manual candidate screening is a bottleneck for high-growth teams.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex flex-col gap-4 p-6 rounded-xl border border-border-light bg-card-light transition-colors shadow-sm group">
                    <div class="size-12 rounded-full bg-accent-bg border border-primary/10 flex items-center justify-center text-primary transition-transform">
                        <span class="material-symbols-outlined">schedule</span>
                    </div>
                    <div>
                        <h3 class="card-heading">Time-consuming</h3>
                        <p class="card-text">Recruiters spend 100+ hours per month scheduling and conducting initial phone screens, time that should be spent evaluating, not coordinating.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4 p-6 rounded-xl border border-border-light bg-card-light transition-colors shadow-sm group">
                    <div class="size-12 rounded-full bg-accent-bg border border-primary/10 flex items-center justify-center text-primary transition-transform">
                        <span class="material-symbols-outlined">autorenew</span>
                    </div>
                    <div>
                        <h3 class="card-heading">Too many follow-ups</h3>
                        <p class="card-text">Chasing candidates for initial calls creates a slow feedback loop and increases drop-off rates.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4 p-6 rounded-xl border border-border-light bg-card-light transition-colors shadow-sm group">
                    <div class="size-12 rounded-full bg-accent-bg border border-primary/10 flex items-center justify-center text-primary transition-transform">
                        <span class="material-symbols-outlined">person_search</span>
                    </div>
                    <div>
                        <h3 class="card-heading">Weak pre-screening</h3>
                        <p class="card-text">Resumes don't reveal soft skills, personality, or communication abilities early enough in the process.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Built for Modern Hiring Teams Section -->
    <section class="section-padding bg-white">
        <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
            <div class="text-center mb-12">
                <h2 class="section-heading">Built for Modern Hiring Teams</h2>
                <p class="section-subheading">Helping hiring teams grow with flexible AI-powered hiring solutions.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- HR Teams -->
                <div class="bg-card-light rounded-2xl p-8 border border-border-light flex flex-col items-start gap-6 transition-all group">
                    <div class="size-14 rounded-full bg-accent-bg border border-primary/10 flex items-center justify-center text-primary transition-all duration-300 shadow-sm">
                        <span class="material-symbols-outlined text-3xl">groups</span>
                    </div>
                    <div>
                        <h3 class="card-heading">HR Teams</h3>
                        <p class="card-text">Reduce time-to-hire and standardize candidate screening across all departments.</p>
                    </div>
                </div>
                <!-- Recruiters -->
                <div class="bg-card-light rounded-2xl p-8 border border-border-light flex flex-col items-start gap-6 transition-all group">
                    <div class="size-14 rounded-full bg-accent-bg border border-primary/10 flex items-center justify-center text-primary transition-all duration-300 shadow-sm">
                        <span class="material-symbols-outlined text-3xl">person_add</span>
                    </div>
                    <div>
                        <h3 class="card-heading">Recruiters</h3>
                        <p class="card-text">Focus on closing top candidates instead of repetitive phone screening calls.</p>
                    </div>
                </div>
                <!-- Agencies -->
                <div class="bg-card-light rounded-2xl p-8 border border-border-light flex flex-col items-start gap-6 transition-all group">
                    <div class="size-14 rounded-full bg-accent-bg border border-primary/10 flex items-center justify-center text-primary transition-all duration-300 shadow-sm">
                        <span class="material-symbols-outlined text-3xl">business_center</span>
                    </div>
                    <div>
                        <h3 class="card-heading">Agencies</h3>
                        <p class="card-text">Present clients with video profiles, interview insights, and candidate evaluations. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

 

    <!-- How Pre-Screening Works: New Funnel Design -->
    <section class="section-padding bg-white">
        <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
            <div class="text-center mb-16">
                <h2 class="section-heading">How Kapiree's AI Pre-Screening Process Works</h2>
                <p class="section-subheading">From application to shortlist in a few simple steps</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Side: Funnel Image -->
                <div class="relative" style="aspect-ratio: 623/637;">
                    <img src="<?php echo ASSETS_PATH; ?>/images/content/automated-pre-screening-process-xs.webp?v=<?php echo time(); ?>" 
                         srcset="<?php echo ASSETS_PATH; ?>/images/content/automated-pre-screening-process-xs.webp 291w,
                                 <?php echo ASSETS_PATH; ?>/images/content/automated-pre-screening-process-mobile.webp 343w,
                                 <?php echo ASSETS_PATH; ?>/images/content/automated-pre-screening-process-small.webp 509w,
                                 <?php echo ASSETS_PATH; ?>/images/content/automated-pre-screening-process-desktop.webp 623w"
                         sizes="(max-width: 480px) 291px, (max-width: 768px) 343px, (max-width: 1200px) 509px, 623px"
                         alt="Automated Pre-Screening and Candidate Screening Process" 
                         class="w-full h-full max-w-md mx-auto object-contain" 
                         loading="lazy" 
                         width="623" 
                         height="637"
                         style="aspect-ratio: 623/637;">
                </div>

                <!-- Right Side: Benefits -->
                <div class="space-y-8">
                    <!-- Header -->
                    <div>
                        <h3 class="text-2xl md:text-3xl font-bold text-text-main mb-4">Filter Better Candidates from Larger Applicant Pools</h3>
                        <p class="content-description">Stop compromising on hire quality just because you have too many applications. Kapiree lets your team review  <span class="font-bold text-primary">10x</span> more candidates without adding workload.</p>
                    </div>

                    <!-- Time Optimized -->
                    <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="text-4xl font-black text-blue-600">90%</div>
                            <div>
                                <div class="font-bold text-lg text-text-main">Time Optimized</div>
                                <div class="text-sm text-text-dim">Time Optimized</div>
                            </div>
                        </div>
                        <p class="text-text-dim">Recruiters using Kapiree report saving an average of <span class="font-bold text-primary">15 hours</span> per week on screening calls.</p>
                    </div>

                    <!-- Speed & Efficiency -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary text-2xl">bolt</span>
                            <h4 class="font-bold text-lg text-text-main">Speed & Efficiency</h4>
                        </div>
                        <ul class="space-y-2 ml-8">
                            <li class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-primary rounded-full"></span>
                                <span class="text-text-dim">Instant automated interview invites</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-primary rounded-full"></span>
                                <span class="text-text-dim">No scheduling back-and-forth</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-primary rounded-full"></span>
                                <span class="text-text-dim">Review <span class="font-bold">10</span> videos in the time of 1 call</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Quality of Profiles -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-green-600 text-2xl">verified</span>
                            <h4 class="font-bold text-lg text-text-main">Quality of Profiles</h4>
                        </div>
                        <ul class="space-y-2 ml-8">
                            <li class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                <span class="text-text-dim">Standardized questions for fairness</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                <span class="text-text-dim">Collaborative scoring with hiring managers</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                <span class="text-text-dim">Data-driven decisions, less bias</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <!-- AI Intelligence Section -->
    <section class="section-padding bg-surface-alt">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
            <div class="text-center mb-16">
                <span class="font-bold text-sm tracking-widest uppercase mb-2 block" style="color: #9B3708;">Interview Analysis</span>
                <h2 class="section-heading">AI Uncovers Insights <span class="text-primary">Hidden in Every Video Interview</span></h2>
                <p class="section-subheading max-w-2xl mx-auto">AI-powered interview analysis provides transcripts, candidate insights, and skill validation.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-[32px] p-8 shadow-card border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-primary/10 rounded-[20px] flex items-center justify-center text-primary mb-6 transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">subtitles</span>
                    </div>
                    <h3 class="card-heading">Smart Transcripts</h3>
                    <p class="card-text mb-6">Every video interview is instantly transcribed into searchable text, allowing recruiters to quickly find key phrases without rewatching the interview. </p>
                    <div class="bg-surface-alt rounded-xl p-4 border border-gray-100 text-xs text-text-light font-mono leading-relaxed">
                        <span class="text-primary font-bold">00:45</span> "I specialize in <span class="bg-yellow-100 text-text-main px-1 rounded-sm">React performance</span> optimization..."
                    </div>
                </div>
                <div class="bg-white rounded-[32px] p-8 shadow-card border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-secondary/10 rounded-[20px] flex items-center justify-center text-secondary mb-6 transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">psychology</span>
                    </div>
                    <h3 class="card-heading">Behavioral Insights</h3>
                    <p class="card-text mb-6">AI evaluates communication clarity, confidence level, and enthusiasm to flag strong soft-skill candidates.</p>
                    <div class="flex gap-2 items-end h-16 mt-12 px-2">
                        <div class="w-1/4 h-[60%] bg-secondary/20 rounded-t-sm"></div>
                        <div class="w-1/4 h-[80%] bg-secondary/40 rounded-t-sm"></div>
                        <div class="w-1/4 h-[100%] rounded-t-sm shadow-sm relative" style="background-color: #9B3708;"><span class="absolute -top-7 left-1/2 -translate-x-1/2 text-[10px] font-bold" style="color: #9B3708;">High</span></div>
                        <div class="w-1/4 h-[50%] bg-secondary/30 rounded-t-sm"></div>
                    </div>
                </div>
                <div class="bg-white rounded-[32px] p-8 shadow-card border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-green-500/10 rounded-[20px] flex items-center justify-center text-green-600 mb-6 transition-colors duration-300">
                        <span class="material-symbols-outlined text-3xl">fact_check</span>
                    </div>
                    <h3 class="card-heading">Skill Validation</h3>
                    <p class="card-text mb-6">Technical skills mentioned during the interview are automatically detected and validated against the role's requirements.</p>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between text-xs font-bold text-text-main bg-surface-alt p-3 rounded-xl border border-transparent transition-colors">
                            <span>System Design</span>
                            <span class="flex items-center gap-1" style="color: #10652F;"><span class="material-symbols-outlined text-[16px]">check</span> Validated</span>
                        </div>
                        <div class="flex items-center justify-between text-xs font-bold text-text-main bg-surface-alt p-3 rounded-xl border border-transparent transition-colors">
                            <span>API Security</span>
                            <span class="flex items-center gap-1" style="color: #10652F;"><span class="material-symbols-outlined text-[16px]">check</span> Validated</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Rule Configuration Section -->
    <section class="section-padding bg-white overflow-hidden">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
            <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
                <div class="w-full lg:w-1/2 order-2 lg:order-1 relative pointer-events-none select-none">
                    <div class="absolute -inset-4 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl blur-2xl opacity-50"></div>
                    <div class="relative bg-white rounded-xl shadow-2xl border border-gray-200 overflow-hidden">
                        <div class="bg-gray-50 border-b border-gray-200 px-4 py-3 flex items-center justify-between">
                            <span class="text-xs font-semibold text-text-light uppercase tracking-wider">Rule Configuration</span>
                            <div class="flex gap-1.5">
                                <div class="w-2.5 h-2.5 rounded-full bg-red-400"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-yellow-400"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-green-400"></div>
                            </div>
                        </div>
                        <div class="p-6 md:p-8 space-y-6">
                            <div class="bg-surface-alt/50 rounded-xl border border-gray-200 p-4">
                                <div class="flex justify-between items-center mb-3">
                                    <div class="flex items-center gap-2">
                                        <span class="bg-white p-1.5 rounded-md shadow-sm text-primary material-symbols-outlined text-sm">code_blocks</span>
                                        <span class="font-bold text-sm text-text-main">Primary Skills</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-[10px] font-bold text-red-500 bg-red-50 px-2 py-0.5 rounded border border-red-100">REQUIRED</span>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    <div class="px-3 py-1.5 bg-white border border-gray-200 rounded-lg shadow-sm text-xs font-medium flex items-center gap-2">
                                        Figma <span class="text-gray-300">|</span> <span class="text-text-main">Expert</span>
                                    </div>
                                    <div class="px-3 py-1.5 bg-white border border-gray-200 rounded-lg shadow-sm text-xs font-medium flex items-center gap-2">
                                        Prototyping <span class="text-gray-300">|</span> <span class="text-text-main">3+ Years</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-surface-alt/50 rounded-xl border border-gray-200 p-4">
                                <div class="flex justify-between items-center mb-3">
                                    <div class="flex items-center gap-2">
                                        <span class="bg-white p-1.5 rounded-md shadow-sm text-secondary material-symbols-outlined text-sm">school</span>
                                        <span class="font-bold text-sm text-text-main">Education</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-[10px] font-bold text-blue-500 bg-blue-50 px-2 py-0.5 rounded border border-blue-100">PREFERRED</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="w-full h-9 bg-white border border-gray-200 rounded-lg px-3 flex items-center justify-between text-xs text-text-main shadow-sm">
                                        <span>Bachelor's in Design or related</span>
                                        <span class="material-symbols-outlined text-gray-400 text-sm">expand_more</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-surface-alt/50 rounded-xl border border-gray-200 p-4">
                                <div class="flex justify-between items-center mb-3">
                                    <div class="flex items-center gap-2">
                                        <span class="bg-white p-1.5 rounded-md shadow-sm text-green-600 material-symbols-outlined text-sm">location_on</span>
                                        <span class="font-bold text-sm text-text-main">Location</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-[10px] font-bold text-red-500 bg-red-50 px-2 py-0.5 rounded border border-red-100">REQUIRED</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="px-3 py-1.5 bg-white border border-gray-200 rounded-lg shadow-sm text-xs font-medium flex items-center gap-2">
                                        <img alt="United States Hiring Team" class="w-4 h-3 object-cover rounded-[1px]" src="<?php echo ASSETS_PATH; ?>/images/content/united-states-hiring.webp" width="32" height="32" loading="lazy"/> United States
                                    </div>
                                    <span class="text-xs text-text-light">or</span>
                                    <div class="px-3 py-1.5 bg-white border border-gray-200 rounded-lg shadow-sm text-xs font-medium flex items-center gap-2">
                                        <img alt="United Kingdom Hiring Team" class="w-4 h-3 object-cover rounded-[1px]" src="<?php echo ASSETS_PATH; ?>/images/content/united-kingdom-hiring.webp" width="32" height="32" loading="lazy"/> United Kingdom
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 border-t border-gray-200 px-6 py-4 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary">auto_awesome</span>
                                <span class="text-xs font-bold text-primary">AI Validation Active</span>
                            </div>
                             <button class="bg-primary text-white text-xs font-bold px-4 py-2 rounded-btn">Save & Activate</button>
                        </div>
                    </div>
                    <div class="absolute -right-8 top-1/2 -translate-y-1/2 bg-white p-4 rounded-xl shadow-card border border-gray-100 hidden xl:block">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="material-symbols-outlined text-green-500">check_circle</span>
                            <span class="text-sm font-bold text-text-main">Rule Logic Valid</span>
                        </div>
                        <div class="h-1 w-32 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-green-500 w-full"></div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 order-1 lg:order-2">
                    <span class="font-bold text-sm tracking-widest uppercase mb-3 block" style="color: #9B3708;">Total Control</span>
                    <h2 class="section-heading">
                        Define your ideal candidate.<br>
                        <span class="text-primary">Let Kapiree Filter the Rest.</span>
                    </h2>
                    <p class="section-subheading mb-8">
                        Stop manually reviewing unqualified resumes. Set precise rules for skills, experience, and location in Kapiree's dashboard. Our system automatically shortlists candidates that match your "Must-Haves" and ranks them by your "Nice-to-Haves".
                    </p>
                    <div class="space-y-6 mt-8">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0 text-primary">
                                <span class="material-symbols-outlined">filter_list</span>
                            </div>
                            <div>
                                <h3 class="card-heading">Smart Filtering</h3>
                                <p class="subsection-text">Automatically disqualify applications that don't meet your mandatory criteria like visa status or core skills.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center shrink-0 text-secondary">
                                <span class="material-symbols-outlined">tune</span>
                            </div>
                            <div>
                                <h3 class="card-heading">Flexible Configuration</h3>
                                <p class="subsection-text">Easily adjust rules for different roles. Toggle between strict filtering and broad matching in seconds.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Testimonials -->
    <section class="section-padding bg-background-light border-t border-border-light">
        <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
            <div class="text-center mb-16">
                <h2 class="section-heading">Loved by Hiring Teams Everywhere</h2>
                <p class="section-subheading">See how companies like yours are transforming their recruitment process</p>
            </div>
            <div class="relative w-full overflow-hidden mask-linear-fade">
                <div class="flex gap-6 animate-scroll w-max py-4 will-change-transform">
                    <!-- Original Set -->
                    <div class="w-[300px] md:w-[350px] lg:w-[360px] flex-shrink-0 bg-card-light border border-border-light rounded-xl p-8 shadow-md transition-all flex flex-col h-full">
                        <div class="flex gap-1 text-secondary mb-6">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <blockquote class="text-text-main font-medium leading-relaxed mb-8 flex-grow">
                            "Kapiree revolutionized our hiring process, making it faster and more efficient than ever before. It's truly a leading Video Interview Platform."
                        </blockquote>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-lg">SP</div>
                            <div>
                                <div class="font-bold text-text-main">Sakshi Patil</div>
                                <div class="text-xs text-text-dim font-medium">HR Manager</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-[300px] md:w-[350px] lg:w-[360px] flex-shrink-0 bg-card-light border border-border-light rounded-xl p-8 shadow-md transition-all flex flex-col h-full">
                        <div class="flex gap-1 text-secondary mb-6">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <blockquote class="text-text-main font-medium leading-relaxed mb-8 flex-grow">
                             "Using Kapiree's automated video interviews, we found the perfect candidates in record time. Highly impressed with this software."
                        </blockquote>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="size-12 rounded-full bg-secondary/10 flex items-center justify-center font-bold text-lg" style="color: #9B3708;">JG</div>
                            <div>
                                <div class="font-bold text-text-main">Janvi Goyal</div>
                                <div class="text-xs text-text-dim font-medium">HR Manager</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-[300px] md:w-[350px] lg:w-[360px] flex-shrink-0 bg-card-light border border-border-light rounded-xl p-8 shadow-md transition-all flex flex-col h-full">
                        <div class="flex gap-1 text-secondary mb-6">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <blockquote class="text-text-main font-medium leading-relaxed mb-8 flex-grow">
                            "Kapiree's platform transformed our recruitment strategy, allowing us to screen candidates effectively with minimal effort. A game-changer!"
                        </blockquote>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="size-12 rounded-full bg-accent-bg flex items-center justify-center text-primary font-bold text-lg">AV</div>
                            <div>
                                <div class="font-bold text-text-main">Ananya Verma</div>
                                <div class="text-xs text-text-dim font-medium">HR Director</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-[300px] md:w-[350px] lg:w-[360px] flex-shrink-0 bg-card-light border border-border-light rounded-xl p-8 shadow-md transition-all flex flex-col h-full">
                        <div class="flex gap-1 text-secondary mb-6">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <blockquote class="text-text-main font-medium leading-relaxed mb-8 flex-grow">
                            "We've drastically reduced the time spent on interviews while improving the quality of our hires. The automated process is incredibly efficient."
                        </blockquote>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center font-bold text-lg" style="color: #9B3708;">RD</div>
                            <div>
                                <div class="font-bold text-text-main">Rohan Desai</div>
                                <div class="text-xs text-text-dim font-medium">Talent Acquisition Lead</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-[300px] md:w-[350px] lg:w-[360px] flex-shrink-0 bg-card-light border border-border-light rounded-xl p-8 shadow-md transition-all flex flex-col h-full">
                        <div class="flex gap-1 text-secondary mb-6">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <blockquote class="text-text-main font-medium leading-relaxed mb-8 flex-grow">
                            "Kapiree streamlined our hiring process, enabling us to focus on the best talent. The platform's ease of use and effectiveness are unmatched."
                        </blockquote>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="size-12 rounded-full bg-secondary/10 flex items-center justify-center text-primary font-bold text-lg">MN</div>
                            <div>
                                <div class="font-bold text-text-main">Meera Nair</div>
                                <div class="text-xs text-text-dim font-medium">Recruitment Specialist</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-[300px] md:w-[350px] lg:w-[360px] flex-shrink-0 bg-card-light border border-border-light rounded-xl p-8 shadow-md transition-all flex flex-col h-full">
                        <div class="flex gap-1 text-secondary mb-6">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <blockquote class="text-text-main font-medium leading-relaxed mb-8 flex-grow">
                            "The video interview tools are exceptional. They saved us countless hours and helped us identify top candidates quickly and accurately."
                        </blockquote>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="size-12 rounded-full bg-accent-bg flex items-center justify-center font-bold text-lg" style="color: #9B3708;">VR</div>
                            <div>
                                <div class="font-bold text-text-main">Vikram Rao</div>
                                <div class="text-xs text-text-dim font-medium">HR Executive</div>
                            </div>
                        </div>
                    </div>

                    <!-- Duplicate Set for Loop (Hidden from screen readers) -->
                    <div class="w-[300px] md:w-[350px] lg:w-[360px] flex-shrink-0 bg-card-light border border-border-light rounded-xl p-8 shadow-md transition-all flex flex-col h-full" aria-hidden="true">
                        <div class="flex gap-1 text-secondary mb-6">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <blockquote class="text-text-main font-medium leading-relaxed mb-8 flex-grow">
                            "Kapiree revolutionized our hiring process, making it faster and more efficient than ever before. It's truly a leading Video Interview Platform."
                        </blockquote>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-lg">SP</div>
                            <div>
                                <div class="font-bold text-text-main">Sakshi Patil</div>
                                <div class="text-xs text-text-dim font-medium">HR Manager</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-[300px] md:w-[350px] lg:w-[360px] flex-shrink-0 bg-card-light border border-border-light rounded-xl p-8 shadow-md transition-all flex flex-col h-full" aria-hidden="true">
                        <div class="flex gap-1 text-secondary mb-6">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <blockquote class="text-text-main font-medium leading-relaxed mb-8 flex-grow">
                             "Using Kapiree's automated video interviews, we found the perfect candidates in record time. Highly impressed with this software."
                        </blockquote>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="size-12 rounded-full bg-secondary/10 flex items-center justify-center font-bold text-lg" style="color: #9B3708;">JG</div>
                            <div>
                                <div class="font-bold text-text-main">Janvi Goyal</div>
                                <div class="text-xs text-text-dim font-medium">HR Manager</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-[300px] md:w-[350px] lg:w-[360px] flex-shrink-0 bg-card-light border border-border-light rounded-xl p-8 shadow-md transition-all flex flex-col h-full" aria-hidden="true">
                        <div class="flex gap-1 text-secondary mb-6">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <blockquote class="text-text-main font-medium leading-relaxed mb-8 flex-grow">
                            "Kapiree's platform transformed our recruitment strategy, allowing us to screen candidates effectively with minimal effort. A game-changer!"
                        </blockquote>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="size-12 rounded-full bg-accent-bg flex items-center justify-center text-primary font-bold text-lg">AV</div>
                            <div>
                                <div class="font-bold text-text-main">Ananya Verma</div>
                                <div class="text-xs text-text-dim font-medium">HR Director</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-[300px] md:w-[350px] lg:w-[360px] flex-shrink-0 bg-card-light border border-border-light rounded-xl p-8 shadow-md transition-all flex flex-col h-full" aria-hidden="true">
                        <div class="flex gap-1 text-secondary mb-6">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <blockquote class="text-text-main font-medium leading-relaxed mb-8 flex-grow">
                            "We've drastically reduced the time spent on interviews while improving the quality of our hires. The automated process is incredibly efficient."
                        </blockquote>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center font-bold text-lg" style="color: #9B3708;">RD</div>
                            <div>
                                <div class="font-bold text-text-main">Rohan Desai</div>
                                <div class="text-xs text-text-dim font-medium">Talent Acquisition Lead</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-[300px] md:w-[350px] lg:w-[360px] flex-shrink-0 bg-card-light border border-border-light rounded-xl p-8 shadow-md transition-all flex flex-col h-full" aria-hidden="true">
                        <div class="flex gap-1 text-secondary mb-6">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <blockquote class="text-text-main font-medium leading-relaxed mb-8 flex-grow">
                            "Kapiree streamlined our hiring process, enabling us to focus on the best talent. The platform's ease of use and effectiveness are unmatched."
                        </blockquote>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="size-12 rounded-full bg-secondary/10 flex items-center justify-center text-primary font-bold text-lg">MN</div>
                            <div>
                                <div class="font-bold text-text-main">Meera Nair</div>
                                <div class="text-xs text-text-dim font-medium">Recruitment Specialist</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-[300px] md:w-[350px] lg:w-[360px] flex-shrink-0 bg-card-light border border-border-light rounded-xl p-8 shadow-md transition-all flex flex-col h-full" aria-hidden="true">
                        <div class="flex gap-1 text-secondary mb-6">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                        <blockquote class="text-text-main font-medium leading-relaxed mb-8 flex-grow">
                            "The video interview tools are exceptional. They saved us countless hours and helped us identify top candidates quickly and accurately."
                        </blockquote>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="size-12 rounded-full bg-accent-bg flex items-center justify-center font-bold text-lg" style="color: #9B3708;">VR</div>
                            <div>
                                <div class="font-bold text-text-main">Vikram Rao</div>
                                <div class="text-xs text-text-dim font-medium">HR Executive</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="section-padding bg-white border-t border-gray-200" style="contain: layout style paint; min-height: 350px;">
        <div class="max-w-[960px] mx-auto px-4 text-center">
            <h2 class="section-heading mb-10">Ready to Automate Your Pre-Screening?</h2>
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-10">
                <a href="<?php echo PAGES_PATH; ?>/pricing"
                    class="flex min-w-[180px] items-center justify-center rounded-btn h-14 px-8 bg-primary hover:bg-primary/90 text-white text-lg font-bold transition-colors shadow-lg shadow-primary/20">
                    Start your free trial
                </a>
                <a href="<?php echo PAGES_PATH; ?>/book-demo"
                    class="flex min-w-[180px] items-center justify-center rounded-btn h-14 px-8 bg-transparent border border-[#e1dbe6] hover:border-[#540793] text-[#1e0b33] hover:text-[#540793] text-lg font-bold transition-all shadow-sm">
                    Request a demo
                </a>
            </div>

        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section-padding bg-white border-t border-border-light" style="contain: layout style paint;">
        <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
            <div class="text-center mb-12" style="min-height: 100px;">
                <h2 class="section-heading">Frequently Asked Questions</h2>
                <p class="section-subheading">Everything you need to know about our application.</p>
            </div>
            
            <div class="space-y-3">
                <!-- Question 1 -->
                <details class="group [&_summary::-webkit-details-marker]:hidden" style="contain: layout style paint;">
                    <summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-xl bg-white border border-border-light p-4 text-text-main hover:border-primary transition-all shadow-md hover:shadow-lg">
                        <h3 class="font-bold text-lg">What is prescreening in recruitment?</h3>
                        <span class="shrink-0 rounded-full bg-background-subtle p-1.5 text-primary group-open:bg-primary group-open:text-white transition-all duration-300">
                           <span class="material-symbols-outlined block text-sm font-bold">expand_more</span>
                        </span>
                    </summary>
                    <div class="mt-4 px-6 pb-4 leading-relaxed text-text-light border-l-2 border-primary/20 ml-6">
                        <p>Prescreening is the initial filtering step in recruitment where employers quickly assess candidates to identify those who meet basic job requirements before investing time in full interviews. It helps prevent wasting resources on unqualified applicants by checking minimum qualifications early, saving 30-70% of screening time by eliminating obvious mismatches.</p>
                    </div>
                </details>

                <!-- Question 2 -->
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-xl bg-white border border-border-light p-4 text-text-main hover:border-primary transition-all shadow-md hover:shadow-lg">
                        <h3 class="font-bold text-lg">What methods are commonly used for prescreening?</h3>
                        <span class="shrink-0 rounded-full bg-background-subtle p-1.5 text-primary group-open:bg-primary group-open:text-white transition-all duration-300">
                           <span class="material-symbols-outlined block text-sm font-bold">expand_more</span>
                        </span>
                    </summary>
                    <div class="mt-4 px-6 pb-4 leading-relaxed text-text-light border-l-2 border-primary/20 ml-6">
                        <p>Common prescreening methods include:</p>
                        <ul class="list-disc ml-6 mt-2 space-y-1">
                            <li><strong>Resume/application review:</strong> Scanning for required experience, education, skills, and salary fit</li>
                            <li><strong>Short phone/video calls</strong> (15-30 min): Verifying interest, availability, and basic qualifications</li>
                            <li><strong>Questionnaires/forms:</strong> Automated checks for must-have criteria such as tools, certifications, and location</li>
                            <li><strong>Skills assessments:</strong> Quick tests for technical or role-specific abilities</li>
                        </ul>
                    </div>
                </details>

                <!-- Question 3 -->
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-xl bg-white border border-border-light p-4 text-text-main hover:border-primary transition-all shadow-md hover:shadow-lg">
                        <h3 class="font-bold text-lg">What is the typical prescreening workflow?</h3>
                        <span class="shrink-0 rounded-full bg-background-subtle p-1.5 text-primary group-open:bg-primary group-open:text-white transition-all duration-300">
                           <span class="material-symbols-outlined block text-sm font-bold">expand_more</span>
                        </span>
                    </summary>
                    <div class="mt-4 px-6 pb-4 leading-relaxed text-text-light border-l-2 border-primary/20 ml-6">
                        <p>The typical prescreening flow follows this pattern:</p>
                        <ol class="list-decimal ml-6 mt-2 space-y-1">
                            <li>Job application submitted</li>
                            <li>Prescreening conducted (30 seconds to 30 minutes)</li>
                            <li>Candidate either qualified (moves to full interview) or rejected (70-80% of applicants are typically filtered out at this stage)</li>
                        </ol>
                        <p class="mt-3">This efficient process ensures that only the most relevant candidates proceed to more time-intensive interview rounds.</p>
                    </div>
                </details>

                <!-- Question 4 -->
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-xl bg-white border border-border-light p-4 text-text-main hover:border-primary transition-all shadow-md hover:shadow-lg">
                        <h3 class="font-bold text-lg">What key qualifications are checked during prescreening?</h3>
                        <span class="shrink-0 rounded-full bg-background-subtle p-1.5 text-primary group-open:bg-primary group-open:text-white transition-all duration-300">
                           <span class="material-symbols-outlined block text-sm font-bold">expand_more</span>
                        </span>
                    </summary>
                    <div class="mt-4 px-6 pb-4 leading-relaxed text-text-light border-l-2 border-primary/20 ml-6">
                        <p>During prescreening, recruiters typically verify:</p>
                        <ul class="list-disc ml-6 mt-2 space-y-1">
                            <li>Relevant experience and years in the role</li>
                            <li>Specific skills and tools required for the position</li>
                            <li>Salary expectations versus budget alignment</li>
                            <li>Start date and location availability</li>
                            <li>Basic cultural and job understanding</li>
                        </ul>
                        <p class="mt-3">These checks ensure candidates meet the fundamental requirements before moving forward in the hiring process.</p>
                    </div>
                </details>

                <!-- Question 5 -->
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-xl bg-white border border-border-light p-4 text-text-main hover:border-primary transition-all shadow-md hover:shadow-lg">
                        <h3 class="font-bold text-lg">How does Kapiree's prescreening integrate with ATS systems?</h3>
                        <span class="shrink-0 rounded-full bg-background-subtle p-1.5 text-primary group-open:bg-primary group-open:text-white transition-all duration-300">
                           <span class="material-symbols-outlined block text-sm font-bold">expand_more</span>
                        </span>
                    </summary>
                    <div class="mt-4 px-6 pb-4 leading-relaxed text-text-light border-l-2 border-primary/20 ml-6">
                        <p>Kapiree's prescreening seamlessly integrates with your existing Applicant Tracking System (ATS). When candidates are uploaded to your ATS, they are automatically prescreened using your configured criteria before being invited to video interviews. This automation ensures that only qualified candidates advance to the interview stage, streamlining your entire recruitment workflow.</p>
                    </div>
                </details>

                <!-- Question 6 -->
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-xl bg-white border border-border-light p-4 text-text-main hover:border-primary transition-all shadow-md hover:shadow-lg">
                        <h3 class="font-bold text-lg">Why should I use prescreening for my hiring process?</h3>
                        <span class="shrink-0 rounded-full bg-background-subtle p-1.5 text-primary group-open:bg-primary group-open:text-white transition-all duration-300">
                           <span class="material-symbols-outlined block text-sm font-bold">expand_more</span>
                        </span>
                    </summary>
                    <div class="mt-4 px-6 pb-4 leading-relaxed text-text-light border-l-2 border-primary/20 ml-6">
                        <p>Prescreening saves significant time and resources by filtering out candidates who don't meet your basic requirements early in the recruitment process. It reduces screening time by 30-70%, ensures your team focuses only on relevant applicants, and creates a more efficient hiring funnel. With Kapiree's automated prescreening, you can configure your criteria once and let the system handle the initial filtering for every job posting.</p>
                    </div>
                </details>
            </div>
        </div>
    </section>

</main>

<?php include 'components/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
