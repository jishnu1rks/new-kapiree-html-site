<?php
include dirname(__DIR__) . '/includes/config.php';
include_once dirname(__DIR__) . '/includes/schema.php';

$page_title = "Video Interview Platform & Candidate Screening Software | Kapiree";
$meta_description = "Explore video interviews, automated pre-screening, candidate screening, interview analysis, asynchronous video interviews, and hiring workflow tools for modern recruitment teams.";
$canonical_url = SITE_URL . "/features";
$og_title = $page_title;
$og_description = $meta_description;
$og_url = $canonical_url;
$og_image = ASSETS_PATH . "/images/home_og.webp";

// JSON-LD Schema for Features Page
$schema_markup = [
    get_organization_schema(),
    get_software_application_schema(),
    get_breadcrumb_schema([
        ['name' => 'Home', 'url' => SITE_URL],
        ['name' => 'Features', 'url' => SITE_URL . '/features']
    ])
];

$active_page = 'features';
$theme = 'light';

// Add critical CSS and performance optimizations for features page
$additional_head = '
    <!-- Keep DNS hints only; the video is loaded lazily -->
    <link rel="dns-prefetch" href="https://img.youtube.com">
    <link rel="dns-prefetch" href="https://www.youtube.com">
    
    <!-- Critical CSS for features page -->
    <style>
        /* Optimize sections for performance */
        .feature-section {
            contain: layout style;
        }

        /* Lazy load off-screen sections */
        .lazy-section {
            content-visibility: auto;
            contain-intrinsic-size: auto 600px;
        }
        
        /* Optimize video container */
        #youtube-video-container {
            contain: layout style paint;
            will-change: contents;
        }
        
        /* Optimize feature cards */
        .feature-card {
            contain: layout style;
        }
        
        /* Prevent layout shift for images */
       
    </style>
';

include FS_INCLUDES . '/head.php';
include FS_COMPONENTS . '/header.php';
?>

<main class="flex-1" role="main">
<!-- Hero Section -->
<section class="w-full bg-white section-padding overflow-visible">
    <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="flex flex-col gap-6">
            <div class="flex flex-col gap-2 text-left">
                <span class="text-sm font-bold tracking-wide uppercase" style="color: #9B3708;">Platform Features</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-text-main leading-[1.1] tracking-tight">
                    Powerful Tools for <br/>
                    <span class="text-primary">Smarter Hiring</span>
                </h1>
            </div>
            <p class="text-lg text-gray-600 leading-relaxed max-w-xl">
                Discover how Kapiree simplifies hiring at every stage, combining AI-powered screening with effortless integrations to help your team find the right fit, faster. </p>

        </div>
        <div class="relative w-full rounded-xl shadow-sm">
            <div class="aspect-[4/3] rounded-xl overflow-hidden bg-gray-50 border border-gray-100">
                <img srcset="<?php echo ASSETS_PATH; ?>/images/content/video-interview-software-features-mobile.webp 400w,
                             <?php echo ASSETS_PATH; ?>/images/content/video-interview-software-features.webp 820w"
                     sizes="(max-width: 768px) 100vw, 50vw"
                     src="<?php echo ASSETS_PATH; ?>/images/content/video-interview-software-features.webp" 
                     alt="Video Interview Software with Automated Candidate Screening" 
                     width="820" height="615" fetchpriority="high" 
                     class="rounded-xl absolute inset-0 w-full h-full object-cover object-center-bottom" 
                     style="aspect-ratio: 820/615; object-position: center bottom;">
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-white feature-section overflow-visible">
    <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <!-- Image block - positioned first for mobile top/desktop left flow -->
        <div class="relative order-1 lg:order-1">
            <div class="rounded-xl shadow-lg">
                <div class="rounded-xl overflow-hidden aspect-square lg:aspect-[4/3] bg-gray-100">
                    <img src="<?php echo ASSETS_PATH; ?>/images/content/manual-resume-screening.webp" 
                         alt="Manual Resume Screening Challenges for Recruiters" 
                         class="w-full h-full object-cover"
                         width="800"
                         height="600"
                         loading="lazy"
                         style="aspect-ratio: 4/3;">
                </div>
            </div>
            <!-- Floating Impact Card - now visible and responsive on all screens -->
            <div class="absolute -bottom-6 -right-4 sm:-right-6 bg-white p-5 sm:p-6 rounded-xl shadow-md border border-gray-100 max-w-[180px] sm:max-w-[240px] z-10">
                <p class="text-3xl sm:text-4xl font-black text-accent mb-1">50%</p>
                <p class="text-[10px] sm:text-sm font-medium text-gray-600">Faster time-to-hire with automated screening.</p>
            </div>
        </div>
        
        <!-- Content block -->
        <div class="order-2 lg:order-2 flex flex-col gap-8">
            <div>
                <h2 class="section-heading">The Pre-Screening Problems We Address</h2>
                <p class="section-subheading">High application volumes, drawn-out follow-ups, and manual resume review can quickly overwhelm any recruiting team. Kapiree is built to fix that.</p>
            </div>
            <div class="grid gap-6">
                <div class="flex gap-4 items-start">
                    <div class="min-w-10 min-h-10 rounded-full bg-red-50 flex items-center justify-center text-red-500 mt-1">
                        <span class="material-symbols-outlined">battery_low</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-[#151118]">Manual Screening Fatigue</h3>
                        <p class="text-gray-600 mt-1">Stop losing hours to manual resume review. Kapiree's AI parser helps you sort and prioritize large applicant pools in a fraction of the time.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="min-w-10 min-h-10 rounded-full bg-red-50 flex items-center justify-center text-red-500 mt-1">
                        <span class="material-symbols-outlined">calendar_month</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-[#151118]">Scheduling Conflicts</h3>
                        <p class="text-gray-600 mt-1">No more chasing candidates to find a call time that works. They record answers to pre-set video questions on their own schedule - you review whenever it suits you.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="min-w-10 min-h-10 rounded-full bg-red-50 flex items-center justify-center text-red-500 mt-1">
                        <span class="material-symbols-outlined">balance</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-[#151118]">Bias in Hiring</h3>
                        <p class="text-gray-600 mt-1">Standardized questions and structured scoring keep every candidate on a level playing field, helping reduce bias in your hiring decisions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-background-subtle lazy-section">
    <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20 flex flex-col gap-12">
        <div class="text-center max-w-1xl mx-auto">
            <h2 class="section-heading">How Kapiree Pre-Screens Candidates</h2>
            <p class="section-subheading">A straightforward four-step process that saves time and surfaces better-matched candidates.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $steps = [
                ['icon' => 'upload_file', 'title' => 'Candidates Apply', 'desc' => 'Candidates apply through your own branded portal, keeping the experience consistent with your company.'],
                ['icon' => 'quiz', 'title' => 'Answer Questions', 'desc' => 'Candidates respond to a short set of role-specific screening questions right after applying.'],
                ['icon' => 'filter_list_alt', 'title' => 'Auto Shortlist', 'desc' => 'Kapiree scores each response, shortlists candidates who meet your criteria, and automatically sends video interview invites.'],
                ['icon' => 'psychology', 'title' => 'AI Analysis', 'desc' => 'Video answers and transcripts are reviewed for communication style, soft skills, and relevant keywords, giving you added context at a glance.']
            ];
            foreach($steps as $step):
            ?>
            <div class="bg-white p-6 rounded-xl border border-[#e1dbe6] shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-4">
                    <span class="material-symbols-outlined text-[28px]"><?php echo $step['icon']; ?></span>
                </div>
                <h3 class="text-lg font-bold text-[#151118] mb-2"><?php echo $step['title']; ?></h3>
                <p class="text-gray-600"><?php echo $step['desc']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-padding bg-white border-b border-[#e1dbe6] lazy-section overflow-visible">
    <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="section-heading">See Kapiree in Action</h2>
            <p class="section-subheading">Watch a quick demo to see how automated pre-screening and video interviews fit into your existing hiring workflow.</p>
        </div>
        <div class="rounded-xl shadow-lg">
            <div id="youtube-video-container" class="relative w-full aspect-video rounded-xl overflow-hidden border border-gray-100 group cursor-pointer bg-gray-900" style="aspect-ratio: 16/9;">
                <!-- Optimized thumbnail with proper caching -->
                <img srcset="https://img.youtube.com/vi/wWLoNUwF_CU/mqdefault.jpg 320w,
                             https://img.youtube.com/vi/wWLoNUwF_CU/hqdefault.jpg 480w,
                             https://img.youtube.com/vi/wWLoNUwF_CU/sddefault.jpg 640w,
                             https://img.youtube.com/vi/wWLoNUwF_CU/maxresdefault.jpg 1280w"
                     sizes="(max-width: 768px) 100vw, (max-width: 1200px) 80vw, 1280px"
                     src="https://img.youtube.com/vi/wWLoNUwF_CU/maxresdefault.jpg" 
                     alt="Kapiree Video Interview Platform Demo" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                     width="1280"
                     height="720"
                     loading="lazy"
                     style="aspect-ratio: 16/9;">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                <div class="absolute top-6 left-6 bg-black/60 backdrop-blur-md text-white px-4 py-1.5 rounded-full text-xs font-bold tracking-wide border border-white/10 shadow-sm z-10">
                    Product Demo · 3:15 min.
                </div>
                <div class="absolute inset-0 flex items-center justify-center z-10">
                    <div class="w-20 h-20 md:w-24 md:h-24 bg-white/95 backdrop-blur-sm rounded-full flex items-center justify-center shadow-[0_0_40px_rgba(0,0,0,0.3)] group-hover:scale-110 transition-all duration-300">
                        <span class="material-symbols-outlined text-accent text-[48px] md:text-[56px] ml-1.5">play_arrow</span>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center text-sm text-gray-500 mt-6 font-medium">A walkthrough of the full Kapiree experience, from application to AI-supported video review.</p>
    </div>
</section>

<script>
// YouTube video lazy load - optimized to prevent forced reflow
(function() {
    function initYouTubeVideo() {
        const videoContainer = document.getElementById('youtube-video-container');
        if (!videoContainer) return;
        
        videoContainer.addEventListener('click', function() {
            // Create iframe with exact dimensions to prevent reflow
            const iframe = document.createElement('iframe');
            iframe.className = 'absolute inset-0 w-full h-full';
            iframe.src = 'https://www.youtube.com/embed/wWLoNUwF_CU?autoplay=1';
            iframe.frameBorder = '0';
            iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
            iframe.allowFullscreen = true;
            iframe.style.aspectRatio = '16/9';
            
            // Replace content
            this.innerHTML = '';
            this.appendChild(iframe);
        }, { once: true, passive: true });
    }
    
    // Initialize after DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initYouTubeVideo);
    } else {
        initYouTubeVideo();
    }
})();
</script>

<section class="section-padding bg-background-subtle lazy-section">
    <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="section-heading">Who Kapiree Is For</h2>
            <p class="section-subheading mt-4">Kapiree fits solo recruiters, in-house teams, and agencies alike and grows with your hiring needs.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1: Recruitment Agencies -->
            <div class="flex flex-col gap-4 rounded-xl border border-[#e1dbe6] bg-white p-6 shadow-md hover:shadow-lg transition-all group feature-card">
                <div class="w-full aspect-[4/3] rounded-lg overflow-hidden">
                    <img srcset="<?php echo ASSETS_PATH; ?>/images/content/recruitment-agency-screening-software-mobile.webp 360w,
                                 <?php echo ASSETS_PATH; ?>/images/content/recruitment-agency-screening-software-desktop.webp 400w,
                                 <?php echo ASSETS_PATH; ?>/images/content/recruitment-agency-screening-software.webp 626w"
                         sizes="(max-width: 768px) 360px, 400px"
                         src="<?php echo ASSETS_PATH; ?>/images/content/recruitment-agency-screening-software-desktop.webp" 
                         alt="Recruitment Agencies Hiring Platform" 
                         width="400" 
                         height="300" 
                         loading="lazy"
                         class="w-full h-full object-cover transition-all duration-300 grayscale group-hover:grayscale-0" 
                         style="aspect-ratio: 4/3;">
                </div>
                <div class="flex flex-col gap-2">
                    <h3 class="text-[#151118] text-xl font-bold">Recruitment Agencies</h3>
                    <p class="text-gray-500">Screen high-volume roles more efficiently and hand clients clear, high-quality shortlists.</p>
                </div>
            </div>
            <!-- Card 2: In-House HR -->
            <div class="flex flex-col gap-4 rounded-xl border border-[#e1dbe6] bg-white p-6 shadow-md hover:shadow-lg transition-all group feature-card">
                <div class="w-full aspect-[4/3] rounded-lg overflow-hidden">
                    <img srcset="<?php echo ASSETS_PATH; ?>/images/content/hr-video-interview-platform-mobile.webp 360w,
                                 <?php echo ASSETS_PATH; ?>/images/content/hr-video-interview-platform-desktop.webp 400w,
                                 <?php echo ASSETS_PATH; ?>/images/content/hr-video-interview-platform.webp 626w"
                         sizes="(max-width: 768px) 360px, 400px"
                         src="<?php echo ASSETS_PATH; ?>/images/content/hr-video-interview-platform-desktop.webp" 
                         alt="In-House HR Hiring Team" 
                         width="400" 
                         height="300" 
                         loading="lazy"
                         class="w-full h-full object-cover transition-all duration-300 grayscale group-hover:grayscale-0" 
                         style="aspect-ratio: 4/3;">
                </div>
                <div class="flex flex-col gap-2">
                    <h3 class="text-[#151118] text-xl font-bold">In-House HR</h3>
                    <p class="text-gray-500">Strengthen collaboration with hiring managers and cut down time-to-hire.</p>
                </div>
            </div>
            <!-- Card 3: Startups -->
            <div class="flex flex-col gap-4 rounded-xl border border-[#e1dbe6] bg-white p-6 shadow-md hover:shadow-lg transition-all group feature-card">
                <div class="w-full aspect-[4/3] rounded-lg overflow-hidden">
                    <img srcset="<?php echo ASSETS_PATH; ?>/images/content/startup-hiring-software-mobile.webp 360w,
                                 <?php echo ASSETS_PATH; ?>/images/content/startup-hiring-software-desktop.webp 400w,
                                 <?php echo ASSETS_PATH; ?>/images/content/startup-hiring-software.webp 626w"
                         sizes="(max-width: 768px) 360px, 400px"
                         src="<?php echo ASSETS_PATH; ?>/images/content/startup-hiring-software-desktop.webp" 
                         alt="Automated Hiring Software for Startups" 
                         width="400" 
                         height="300" 
                         loading="lazy"
                         class="w-full h-full object-cover transition-all duration-300 grayscale group-hover:grayscale-0" 
                         style="aspect-ratio: 4/3;">
                </div>
                <div class="flex flex-col gap-2">
                    <h3 class="text-[#151118] text-xl font-bold">Startups</h3>
                    <p class="text-gray-500">Identify culture and role fit earlier in the funnel so you can scale with confidence.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Deep Dives / Platform Features -->
<section class="section-padding bg-background-subtle lazy-section">
    <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
        <div class="text-center max-w-1xl mx-auto mb-20">
            <h2 class="section-heading">Platform Features for Smarter Pre-Screening</h2>
            <p class="section-subheading">Everything you need to spot stronger candidates, sooner.</p>
        </div>
        
        <div class="flex flex-col gap-20 lg:gap-32">
            <!-- Feature 1 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="order-2 lg:order-1">
                    <h3 class="text-2xl md:text-3xl font-bold text-[#151118] mb-4">Asynchronous Video Interviews</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">Asynchronous video interviews allow candidates to record their responses to pre-set questions at any time, from any location. Recruiters review recordings at their convenience- eliminating the need to coordinate live meetings across time zones and schedules. </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Reach candidates anywhere</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Set your own review pace</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Lower-pressure experience for candidates </span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">All evaluations centralized in one place</span>
                        </li>
                    </ul>
                </div>
                <div class="order-1 lg:order-2 rounded-xl overflow-hidden shadow-md bg-white p-6 border border-[#e1dbe6] flex flex-col gap-4 pointer-events-none select-none">
                    <div class="flex items-center justify-between pb-2 border-b border-gray-100">
                        <div class="font-bold text-gray-800 text-sm">Review: J. Anderson</div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            <span class="text-xs text-gray-500 font-medium">Ready for review</span>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 h-full">
                        <div class="flex-grow bg-gray-900 rounded-lg relative aspect-video flex items-center justify-center overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent z-10"></div>
                            <div class="w-full h-full bg-cover bg-center opacity-60" style="background-image: url('<?php echo ASSETS_PATH; ?>/images/content/candidate-video-sample.webp');"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="material-symbols-outlined text-white text-[64px] opacity-80">play_circle</span>
                            </div>
                            <div class="absolute bottom-4 left-4 right-4 z-20 flex items-center gap-3 text-white">
                                <button><span class="material-symbols-outlined">play_arrow</span></button>
                                <div class="flex-grow h-1 bg-gray-600 rounded-full overflow-hidden">
                                    <div class="w-1/3 h-full bg-accent"></div>
                                </div>
                                <span class="text-xs font-mono">0:42 / 2:15</span>
                                <button><span class="material-symbols-outlined">volume_up</span></button>
                            </div>
                        </div>
                        <div class="w-full md:w-48 flex-shrink-0 flex flex-col gap-3">
                            <div class="p-3 bg-gray-50 rounded border border-gray-100">
                                <p class="text-xs text-gray-500 mb-1">Role Applied</p>
                                <p class="text-sm font-bold text-gray-800">Senior Product Designer</p>
                            </div>
                            <div class="p-3 bg-primary/5 rounded border border-primary/10">
                                <p class="text-xs text-primary font-bold mb-1 uppercase tracking-wider">AI Confidence</p>
                                <div class="flex items-end gap-1">
                                    <span class="text-2xl font-bold text-primary">92%</span>
                                    <span class="material-symbols-outlined text-primary text-sm mb-1">trending_up</span>
                                </div>
                            </div>
                            <div class="mt-auto">
                                 <button class="w-full py-2 bg-primary text-white text-xs font-bold rounded-btn">Move to Interview</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
             <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="order-1 relative pointer-events-none select-none">
                    <div class="absolute -inset-4 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl blur-2xl opacity-50"></div>
                    <div class="relative bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
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
                                         <img alt="United States Hiring Team" width="16" height="12" class="w-4 h-3 object-cover rounded-[1px]" style="aspect-ratio: 4/3;" src="<?php echo ASSETS_PATH; ?>/images/content/united-states-hiring.webp" loading="lazy" /> United States
                                     </div>
                                     <span class="text-xs text-text-light">or</span>
                                     <div class="px-3 py-1.5 bg-white border border-gray-200 rounded-lg shadow-sm text-xs font-medium flex items-center gap-2">
                                         <img alt="United Kingdom Hiring Team" width="16" height="12" class="w-4 h-3 object-cover rounded-[1px]" style="aspect-ratio: 4/3;" src="<?php echo ASSETS_PATH; ?>/images/content/united-kingdom-hiring.webp" loading="lazy" /> United Kingdom
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
                </div>
                <div class="order-2">
                    <h3 class="text-2xl md:text-3xl font-bold text-[#151118] mb-4">Configurable Screening Rules</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">Define your must-haves- experience, skills, certifications, location and let only qualifying candidates move forward.</p>
                     <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Set standards per role</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Automate filtering</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Spend less time on unqualified profiles</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Keep evaluation consistent</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="order-2 lg:order-1">
                    <h3 class="text-2xl md:text-3xl font-bold text-[#151118] mb-4">AI Soft-Skill Analysis</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">Kapiree evaluates recorded interviews for tone, clarity, confidence, and enthusiasm - signals a resume simply can't show.</p>
                     <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Look past the resume</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Support better personality and culture assessment</span>
                        </li>
                    </ul>
                </div>
                <div class="order-1 lg:order-2 rounded-xl overflow-hidden shadow-md bg-white p-6 border border-[#e1dbe6] flex flex-col pointer-events-none select-none">
                    <div class="flex items-center justify-between mb-6">
                        <div class="font-bold text-gray-800">Candidate Insights</div>
                        <span class="bg-purple-100 text-purple-700 text-[10px] px-2 py-0.5 rounded font-bold uppercase">AI Generated</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="p-3 bg-gray-50 rounded border border-gray-100 text-center">
                            <p class="text-xs text-gray-500 mb-1">Communication</p>
                            <div class="text-xl font-bold text-gray-800">8.5<span class="text-xs text-gray-400 font-normal">/10</span></div>
                            <div class="w-full bg-gray-200 h-1.5 rounded-full mt-2 overflow-hidden">
                                <div class="bg-green-500 h-full rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                         <div class="p-3 bg-gray-50 rounded border border-gray-100 text-center">
                            <p class="text-xs text-gray-500 mb-1">Confidence</p>
                            <div class="text-xl font-bold text-gray-800">9.2<span class="text-xs text-gray-400 font-normal">/10</span></div>
                            <div class="w-full bg-gray-200 h-1.5 rounded-full mt-2 overflow-hidden">
                                <div class="bg-primary h-full rounded-full" style="width: 92%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-50 p-3 rounded border border-blue-100">
                        <p class="text-xs text-blue-800 leading-snug">
                            <span class="font-bold">Insight:</span> Candidate demonstrates strong leadership potential through assertive communication.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="order-1 rounded-xl overflow-hidden shadow-md bg-white p-6 border border-[#e1dbe6] flex flex-col h-full min-h-[300px] pointer-events-none select-none">
                    <div class="border-b border-gray-100 pb-3 mb-3 flex justify-between items-center">
                        <div class="font-bold text-gray-800 text-sm">Transcript Analysis</div>
                        <div class="flex gap-2">
                            <span class="text-[10px] bg-green-100 text-green-700 px-2 py-0.5 rounded font-bold">Positive Sentiment</span>
                        </div>
                    </div>
                    <div class="mb-4 bg-gray-50 p-3 rounded border border-gray-100">
                        <p class="text-xs font-bold text-gray-500 uppercase mb-1">Q2: Describe a challenging project.</p>
                        <p class="text-sm text-gray-800 italic">"Can you tell us about a time you had to overcome a significant technical hurdle?"</p>
                    </div>
                    <div class="relative mb-4 flex-grow">
                        <div class="absolute right-0 top-0">
                            <div class="flex items-center bg-yellow-100 border border-yellow-200 px-2 py-1 rounded text-[10px] text-yellow-800 font-bold gap-1 shadow-sm">
                                <span class="material-symbols-outlined text-[12px]">search</span>
                                <span>optimization</span>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            "...so we decided to refactor the legacy codebase. The main challenge was ensuring backward compatibility while improving performance. We focused on database <span class="bg-yellow-200 text-yellow-900 px-0.5 rounded font-medium">optimization</span> which resulted in a 40% speed increase..."
                        </p>
                    </div>
                    <div class="mt-auto grid grid-cols-2 gap-3 pt-3 border-t border-gray-100">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-gray-400 uppercase font-bold">Key Skills Detected</span>
                            <span class="text-lg font-bold text-primary">5</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] text-gray-400 uppercase font-bold">Word Count</span>
                            <span class="text-lg font-bold text-gray-700">142</span>
                        </div>
                    </div>
                </div>
                <div class="order-2">
                    <h3 class="text-2xl md:text-3xl font-bold text-[#151118] mb-4">Transcript-Based Feedback</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">Every video response is fully transcribed and keyword-searchable, so you can filter by skill, tool, or phrase without watching a single clip.</p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Keep a full documentation trail</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Search by key terms</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Pull quotes and compare candidates side-by-side</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Assess answer quality more easily</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Feature 5 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="order-2 lg:order-1">
                    <h3 class="text-2xl md:text-3xl font-bold text-[#151118] mb-4">Career Page Integration</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">Plug Kapiree directly into your existing careers page so candidates can apply and begin pre-screening without extra steps.</p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Keep the candidate journey seamless</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Reduce application drop-off</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Maintain consistent branding </span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Capture applicant data in one flow</span>
                        </li>
                    </ul>
                </div>
                <div class="order-1 lg:order-2 rounded-xl overflow-hidden shadow-xl bg-white border border-[#e1dbe6]">
                    <img srcset="<?php echo ASSETS_PATH; ?>/images/content/career-page-integration-mobile.webp 360w,
                                 <?php echo ASSETS_PATH; ?>/images/content/career-page-integration-desktop.webp 665w,
                                 <?php echo ASSETS_PATH; ?>/images/content/career-page-integration.webp 796w"
                         sizes="(max-width: 768px) 360px, 665px"
                         src="<?php echo ASSETS_PATH; ?>/images/content/career-page-integration-desktop.webp" 
                         alt="Career Page Integration for Candidate Screening" 
                         width="665" 
                         height="358" 
                         class="w-full h-auto" 
                         style="aspect-ratio: 665/358;">
                </div>
            </div>

            <!-- Feature 6 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="order-1 rounded-xl overflow-hidden shadow-md bg-white p-6 border border-[#e1dbe6] flex flex-col">
                    <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-100">
                        <div>
                            <div class="font-bold text-gray-800">Candidate Pipeline</div>
                            <p class="text-xs text-gray-500">45 Selected</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="hidden sm:block h-2 w-24 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-primary w-2/3"></div>
                            </div>
                            <button class="bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-btn flex items-center gap-1 hover:bg-primary/90 transition-all">
                                <span class="material-symbols-outlined text-[14px]">send</span> Bulk Invite
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead>
                                <tr class="text-xs text-gray-400 border-b border-gray-100">
                                    <th class="pb-2 font-medium pl-2">Name</th>
                                    <th class="pb-2 font-medium">Role</th>
                                    <th class="pb-2 font-medium">Status</th>
                                    <th class="pb-2 font-medium text-right pr-2">AI Score</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600">
                                <tr class="group border-b border-gray-50 hover:bg-gray-50 transition-colors">
                                    <td class="py-3 pl-2 font-medium text-gray-800">Sarah M.</td>
                                    <td class="py-3 text-xs">UX Lead</td>
                                    <td class="py-3"><span class="bg-green-100 text-green-700 text-[10px] px-2 py-0.5 rounded-full font-bold">Passed</span></td>
                                    <td class="py-3 text-right pr-2 font-bold text-primary">98%</td>
                                </tr>
                                <tr class="group border-b border-gray-50 hover:bg-gray-50 transition-colors">
                                    <td class="py-3 pl-2 font-medium text-gray-800">David K.</td>
                                    <td class="py-3 text-xs">DevOps</td>
                                    <td class="py-3"><span class="bg-blue-100 text-blue-700 text-[10px] px-2 py-0.5 rounded-full font-bold">Screening</span></td>
                                    <td class="py-3 text-right pr-2 font-bold text-gray-400">--</td>
                                </tr>
                                <tr class="group border-b border-gray-50 hover:bg-gray-50 transition-colors">
                                    <td class="py-3 pl-2 font-medium text-gray-800">Elena R.</td>
                                    <td class="py-3 text-xs">UX Lead</td>
                                    <td class="py-3"><span class="bg-red-100 text-red-700 text-[10px] px-2 py-0.5 rounded-full font-bold">Rejected</span></td>
                                    <td class="py-3 text-right pr-2 font-bold text-gray-500">42%</td>
                                </tr>
                                <tr class="group hover:bg-gray-50 transition-colors">
                                    <td class="py-3 pl-2 font-medium text-gray-800">Mike T.</td>
                                    <td class="py-3 text-xs">Backend</td>
                                    <td class="py-3"><span class="bg-green-100 text-green-700 text-[10px] px-2 py-0.5 rounded-full font-bold">Passed</span></td>
                                    <td class="py-3 text-right pr-2 font-bold text-primary">91%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="order-2">
                    <h3 class="text-2xl md:text-3xl font-bold text-[#151118] mb-4">Bulk Candidate Screening</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">Send video interview invites to many candidates at once, and review responses in bulk without sacrificing consistency.</p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Manage high-volume hiring with ease </span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Scale screening without scaling headcount</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Apply the same bar across every candidate</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-accent text-[20px]">check_circle</span>
                            <span class="font-medium text-[#151118]">Move candidates through the funnel faster </span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

     <!-- Seamless ATS Ecosystem Section -->
    <section class="py-24 bg-background-subtle lazy-section">
        <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20 text-center">
            <!-- Faster Cycle Time Badge -->
            <div class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-green-50 border border-green-100 text-green-700 text-[11px] font-bold tracking-widest uppercase mb-8 shadow-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                30-40% Faster Cycle Time
            </div>
            
            <h2 class="section-heading">
                Seamless <span class="text-primary">ATS integration</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed mb-16">
                Sync candidate data from your ATS straight into Kapiree, where screening and video invites run with minimal manual effort.
            </p>

            <!-- Workflow Diagram -->
            <div class="relative w-full max-w-5xl mx-auto mb-24">
                <!-- Connecting Line -->
                <div class="hidden md:block absolute top-[40px] left-[15%] right-[15%] h-0.5 bg-gradient-to-r from-gray-200 via-primary/30 to-gray-200"></div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative z-10">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center text-center group">
                        <div class="w-20 h-20 rounded-full bg-[#1a0d3d] border-4 border-white shadow-card hover:shadow-lg transition-all duration-300 flex items-center justify-center mb-6 group-hover:scale-105 group-hover:bg-primary relative z-10">
                            <span class="material-symbols-outlined text-[32px] text-white">api</span>
                            <div class="absolute -top-2 -right-2 w-7 h-7 rounded-full bg-primary border-2 border-white text-white flex items-center justify-center text-xs font-bold">1</div>
                        </div>
                        <h3 class="text-lg font-bold text-[#151118] mb-2">API Ingestion</h3>
                        <p class="text-sm text-gray-500 max-w-[240px]">Applications flow in automatically from supported ATS platforms </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col items-center text-center group">
                        <div class="w-20 h-20 rounded-full bg-[#1a0d3d] border-4 border-white shadow-card hover:shadow-lg transition-all duration-300 flex items-center justify-center mb-6 group-hover:scale-105 group-hover:bg-primary relative z-10">
                            <span class="material-symbols-outlined text-[32px] text-white">smart_toy</span>
                            <div class="absolute -top-2 -right-2 w-7 h-7 rounded-full bg-primary border-2 border-white text-white flex items-center justify-center text-xs font-bold">2</div>
                        </div>
                        <h3 class="text-lg font-bold text-[#151118] mb-2">Auto-Screening</h3>
                        <p class="text-sm text-gray-500 max-w-[240px]">Candidates are checked against your knock-out criteria on arrival</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col items-center text-center group">
                        <div class="w-20 h-20 rounded-full bg-[#1a0d3d] border-4 border-white shadow-card hover:shadow-lg transition-all duration-300 flex items-center justify-center mb-6 group-hover:scale-105 group-hover:bg-primary relative z-10">
                            <span class="material-symbols-outlined text-[32px] text-white">video_camera_front</span>
                            <div class="absolute -top-2 -right-2 w-7 h-7 rounded-full bg-primary border-2 border-white text-white flex items-center justify-center text-xs font-bold">3</div>
                        </div>
                        <h3 class="text-lg font-bold text-[#151118] mb-2">Video Invite</h3>
                        <p class="text-sm text-gray-500 max-w-[240px]">Qualified candidates get branded video interview invites instantly</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="section-padding bg-white lazy-section">
    <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
        <h2 class="section-heading mb-12 text-center">How Kapiree Improves Pre-Screening</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex gap-6 p-6 rounded-xl border border-[#e1dbe6] bg-gray-50/50 items-start shadow-md hover:shadow-lg transition-all">
                <div class="min-w-12 h-12 rounded-full bg-primary text-white flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined">tune</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-[#151118] mb-2">Rule Based Filtering</h3>
                    <p class="text-gray-600 leading-relaxed">Set knock-out questions and filters so unqualified candidates are screened out before they hit your main view.</p>
                </div>
            </div>
            <div class="flex gap-6 p-6 rounded-xl border border-[#e1dbe6] bg-gray-50/50 items-start shadow-md hover:shadow-lg transition-all">
                <div class="min-w-12 h-12 rounded-full bg-primary text-white flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined">videocam</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-[#151118] mb-2">Asynchronous Video Interviews</h3>
                    <p class="text-gray-600 leading-relaxed">Candidates respond on their own time; you review on yours, even at faster playback to save time.</p>
                </div>
            </div>
            <div class="flex gap-6 p-6 rounded-xl border border-[#e1dbe6] bg-gray-50/50 items-start shadow-md hover:shadow-lg transition-all">
                <div class="min-w-12 h-12 rounded-full bg-primary text-white flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined">psychology</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-[#151118] mb-2">AI-Powered Soft-Skill Analysis</h3>
                    <p class="text-gray-600 leading-relaxed">Understand not just qualifications, but how candidates communicate and perform under pressure.</p>
                </div>
            </div>
            <div class="flex gap-6 p-6 rounded-xl border border-[#e1dbe6] bg-gray-50/50 items-start shadow-md hover:shadow-lg transition-all">
                <div class="min-w-12 h-12 rounded-full bg-primary text-white flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined">description</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-[#151118] mb-2">Audio Transcript-Based Feedback</h3>
                    <p class="text-gray-600 leading-relaxed">Auto-generated transcripts let you search for specific terms and review answers thoroughly, no replaying required.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include FS_COMPONENTS . '/cta-transform.php'; ?>

    <!-- Why Features Matter -->
    <section class="py-20 bg-primary relative overflow-hidden lazy-section">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-20 -left-20 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-80 h-80 bg-accent rounded-full blur-3xl"></div>
    </div>
    <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20 relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="text-center lg:text-left">
            <h2 class="section-heading-white text-white">Why Pre-Screening with Kapiree Matters</h2>
            <p class="section-subheading-white text-white/80 mb-8 opacity-60">Turn your earliest hiring stage from a bottleneck into an advantage.</p>
            <a href="<?php echo PAGES_PATH; ?>/blogs/neointeraction"
                class="inline-flex items-center justify-center rounded-btn bg-white text-primary text-base font-bold h-12 px-8 hover:bg-gray-100 transition-all mt-8">
                See Case Studies
            </a>
        </div>
        <div>
            <ul class="space-y-6">
                <li class="flex items-start gap-4 p-4 rounded-lg bg-white/10 backdrop-blur-sm border border-white/10">
                    <span class="material-symbols-outlined text-accent text-[28px]">speed</span>
                    <div>
                        <h3 class="text-white font-bold text-lg">Speed</h3>
                        <p class="text-white/70 ">Move candidates to decision stages faster by cutting time spent on early screening</p>
                    </div>
                </li>
                <li class="flex items-start gap-4 p-4 rounded-lg bg-white/10 backdrop-blur-sm border border-white/10">
                    <span class="material-symbols-outlined text-accent text-[28px]">verified</span>
                    <div>
                        <h3 class="text-white font-bold text-lg">Quality</h3>
                        <p class="text-white/70 ">A more structured process means clearer, more defensible hiring decisions.</p>
                    </div>
                </li>
                 <li class="flex items-start gap-4 p-4 rounded-lg bg-white/10 backdrop-blur-sm border border-white/10">
                    <span class="material-symbols-outlined text-accent text-[28px]">savings</span>
                    <div>
                        <h3 class="text-white font-bold text-lg">Cost</h3>
                        <p class="text-white/70 ">Automating early-stage work lowers your effort and cost per hire over time.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="section-padding bg-white text-center lazy-section">
    <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
        <div class="max-w-2xl mx-auto">
            <h2 class="section-heading">Ready to improve your pre‑screening process?</h2>
        <p class="section-subheading mb-10">Join the recruiters already using Kapiree to simplify screening and hire with more confidence.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-8">
            <a href="<?php echo PAGES_PATH; ?>/pricing"
                class="w-full sm:w-auto flex items-center justify-center rounded-btn bg-primary hover:bg-primary/90 text-white text-base font-bold h-12 px-8 transition-colors shadow-lg shadow-primary/20">
                Start your free trial
            </a>
            <a href="<?php echo PAGES_PATH; ?>/contact"
                class="w-full sm:w-auto flex items-center justify-center rounded-btn bg-transparent border border-[#e1dbe6] hover:border-[#540793] text-[#1e0b33] hover:text-[#540793] text-base font-bold h-12 px-8 transition-all">
                Contact us
            </a>
        </div>
    </div>
</section>
</main>

<?php include FS_COMPONENTS . '/footer.php'; ?>
<?php include FS_INCLUDES . '/scripts.php'; ?>
