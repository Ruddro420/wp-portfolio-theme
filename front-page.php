<?php
$args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => 6,
);

$portfolio_query = new WP_Query($args);

get_header();
?>

<!-- Hero Section -->
<div class="hero-container">
    <div class="inner-hero">
        <div class="inner-text">
            <h1 class="text-white">
                <?php echo get_theme_mod('portfoliome_hero_section') ?>
            </h1>
        </div>
    </div>
    <div class="gradient-circle"></div>
    <div class="gradient-circle-two"></div>
</div>

<!-- Working Section -->
<section>
    <div class="workShow-container">
        <div class="inner-hero">
            <div class="inner-text">
                <h2 class="text-white"><span>
                        <?php echo get_theme_mod('portfoliome_working_section'); ?>
                    </span>.</h2>
            </div>
            <div class="working-category">
                <div class="list-category">
                    <ul>
                        <?php
                        $displayed_categories = array(); // Array to store displayed category IDs
                        
                        if ($portfolio_query->have_posts()) {
                            while ($portfolio_query->have_posts()) {
                                $portfolio_query->the_post();
                                $categories = get_the_terms(get_the_ID(), 'portfolio_category'); // Replace 'portfolio_category' with your actual taxonomy slug
                                ?>
                                <?php
                                if ($categories && !is_wp_error($categories)) {
                                    foreach ($categories as $category) {
                                        if (!in_array($category->term_id, $displayed_categories)) {
                                            echo '<li>' . '<a href="' . get_term_link($category) . '">' . $category->name . '</a>' . '</li>';
                                            $displayed_categories[] = $category->term_id; // Add displayed category ID to the array
                                        }
                                    }
                                }
                                ?>
                                <?php
                            }
                            wp_reset_postdata();
                        } else {
                            echo 'No portfolio posts found.';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Show -->
    <div class="product-container">
        <?php
        if ($portfolio_query->have_posts()) {
            while ($portfolio_query->have_posts()) {
                $portfolio_query->the_post();
                $categories = get_the_terms(get_the_ID(), 'portfolio_category'); // Replace 'portfolio_category' with your actual taxonomy slug
                ?>
                <div class="main-product mt-10" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>');
                    background-size: cover;
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


<?php get_footer() ?>