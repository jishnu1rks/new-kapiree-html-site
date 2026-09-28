<?php
include dirname(__DIR__) . '/includes/config.php';

$page_title = "Recruitment & Hiring Blog | Kapiree";
$meta_description = "Insights on video interviews, candidate screening, recruitment automation, hiring workflows, and talent acquisition.";
$meta_keywords = "recruitment blog, hiring tips, video interview guide, pre-screening strategies, HR technology, talent acquisition, candidate screening, recruitment insights, asynchronous interviews, hiring process optimization";
$canonical_url = SITE_URL . "/blogs";
$og_title = $page_title;
$og_description = $meta_description;
$og_url = $canonical_url;
$og_image = ASSETS_PATH . "/images/home_og.webp";

// Add schema markup for blog listing page
include_once dirname(__DIR__) . '/includes/schema.php';

// Get blogs for schema (blog_data.php will be included later in the page)
// We'll generate schema after blogs are loaded
$schema_markup = [];

// Blog-specific head additions — inline CSS that stabilises layout before output.css loads.
// Uses fixed pixel heights derived from actual rendered sizes so they are
// 100 % independent of font-load timing (= no CLS from web-font swap).
$additional_head = '<style>
/* ─── Blog hero ─────────────────────────────────────────────────────────── */
/* Mobile  : h1 ~3 lines @ 36px/1.1 lh + span 20px + p 42px + padding */
.blog-hero {
  min-height: 320px;
}
@media(min-width:640px)  { .blog-hero { min-height: 280px; } }
@media(min-width:768px)  { .blog-hero { min-height: 240px; } }
@media(min-width:1024px) { .blog-hero { min-height: 220px; } }

/* ─── Blog intro (2-paragraph text block) ───────────────────────────────── */
.blog-intro {
  min-height: 520px;
}
@media(min-width:640px)  { .blog-intro { min-height: 400px; } }
@media(min-width:768px)  { .blog-intro { min-height: 300px; } }
@media(min-width:1024px) { .blog-intro { min-height: 240px; } }

/* ─── Blog grid section ─────────────────────────────────────────────────── */
.blog-grid-section { min-height: 420px; content-visibility: auto; contain-intrinsic-size: auto 1200px; }

/* ─── Blog card stability ───────────────────────────────────────────────── */
.blog-card-img-wrap { height: 192px; overflow: hidden; position: relative; background-color: var(--surface-alt); flex-shrink: 0; }
.blog-card-img-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; aspect-ratio: 662/373; }
.blog-card-meta { min-height: 28px; display: flex; align-items: center; justify-content: space-between; }
</style>';

$active_page = 'blogs';
$theme = 'light';
include FS_INCLUDES . '/head.php';
include FS_COMPONENTS . '/header.php';
?>

<main role="main" class="flex flex-col min-h-screen">
    <!-- Hero Section -->
    <section class="blog-hero bg-white pt-20 pb-16 text-center border-b border-[#e1dbe6]">
        <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
            <span class="text-sm font-bold tracking-wide uppercase" style="color: #9B3708; mb-6 block">Resources & Insights</span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-text-main mb-6 tracking-tight leading-[1.1]">
                Expand your knowledge with our resources
            </h1>
            <p class="section-subheading">
                Find the right guide to help you make your candidate recruitment process efficient.
            </p>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="blog-intro bg-white py-12 border-b border-[#e1dbe6]">
        <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
            <div class="text-center">
                <h2 class="section-heading mb-6">Your Complete Guide to Modern Recruitment</h2>
                <p class="body-text mb-4">
                    Welcome to the Kapiree blog, your go-to resource for recruitment best practices, 
                    hiring technology insights, and pre-screening strategies. Our expert guides help 
                    HR teams streamline their candidate evaluation process, reduce time-to-hire, and 
                    identify top talent faster using video interviews and AI-powered screening tools.
                </p>
                <p class="body-text">
                    Whether you're looking to optimize your recruitment funnel, implement asynchronous 
                    video interviews, or learn about the latest trends in talent acquisition, our 
                    comprehensive resources cover everything from interview question strategies to 
                    candidate engagement techniques. Explore our case studies, guides, and tips below 
                    to transform your hiring process and build high-performing teams efficiently.
                </p>
            </div>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="blog-grid-section bg-background-light py-20 flex-grow">
        <div class="layout-container max-w-[1280px] mx-auto px-4 sm:px-8 xl:px-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                include_once dirname(__DIR__) . '/includes/blog_data.php';
                $blogs = get_all_blogs();
                
                // Generate schema markup now that blogs are loaded
                if (empty($schema_markup)) {
                    $schema_markup = [
                        get_organization_schema(),
                        get_blog_listing_schema($blogs),
                        get_breadcrumb_schema([
                            ['name' => 'Home', 'url' => 'https://www.kapiree.com'],
                            ['name' => 'Blog', 'url' => 'https://www.kapiree.com/blogs']
                        ])
                    ];
                }

                $blog_index = 0;
                foreach ($blogs as $blog_data) {
                    // Map data to expected keys for blog-card.php
                    $blog = [
                        'url'       => PAGES_PATH . '/blogs/' . $blog_data['slug'],
                        'image'     => $blog_data['image'],
                        'category'  => $blog_data['category'],
                        'read_time' => $blog_data['read_time'],
                        'title'     => $blog_data['title'],
                        'excerpt'   => $blog_data['description'],
                        'date'      => $blog_data['published_date'],
                        'is_first'  => ($blog_index === 0),
                    ];
                    include FS_COMPONENTS . '/blog-card.php';
                    $blog_index++;
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php include FS_COMPONENTS . '/footer.php'; ?>
<?php include FS_INCLUDES . '/scripts.php'; ?>
