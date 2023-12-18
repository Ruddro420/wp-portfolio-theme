<?php
get_header(); // Include header
// Get the current term
$current_term = get_queried_object();

$args = array(
    'post_type' => 'portfolio', // Your custom post type name
    'posts_per_page' => -1, // Display all posts (-1 for all)
    'tax_query' => array(
        array(
            'taxonomy' => 'portfolio_category', // Your custom taxonomy name
            'field' => 'slug',
            'terms' => $current_term->slug, // Get posts of current category
        ),
    ),
);

$portfolio_posts = new WP_Query($args);
?>
<!-- Hero Section -->
<div class="hero-container">
    <div class="inner-hero">
        <div class="inner-text">
            <h1 class="text-white">
                <span>
                    <?php echo $current_term->name; ?>
                </span>.
            </h1>
        </div>
    </div>
    <div class="gradient-circle"></div>
    <div class="gradient-circle-two"></div>
</div>
<!-- Portfolio Show -->
<section class='my-10'>
    <div class="product-container">
        <?php
        if ($portfolio_posts->have_posts()) {
            while ($portfolio_posts->have_posts()) {
                $portfolio_posts->the_post();
                $categories = get_the_terms(get_the_ID(), 'portfolio_category'); // Replace 'portfolio_category' with your actual taxonomy slug
                ?>
                <div class="main-product" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>');
                    background-size: fit;
                    background-position: center;
                    background-repeat: no-repeat;
                    ">
                    <div class="work-container">
                        <div class="product-content">
                            <div class="work-category">
                                <?php
                                if ($categories && !is_wp_error($categories)) {
                                    foreach ($categories as $category) {
                                        echo '<h5>/' . $category->name . '</h5>'; // Display category name
                                    }
                                }
                                ?>
                            </div>
                            <div class="work-title">
                                <h3>
                                    <?php the_title(); ?>
                                </h3>
                            </div>
                            <div class="work-button">
                                <a href="<?php the_permalink(); ?>">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
        } else {
            echo 'No portfolio posts found.';
        }
        ?>
</section>

<!-- About Section -->
<?php require get_template_directory() . '/template-parts/about-section.php'; ?>


<?php get_footer(); ?>