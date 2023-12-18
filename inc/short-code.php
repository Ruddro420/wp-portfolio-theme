<?php

// Shortcode & Custom Post
function service_shotcode($atts)
{
    ob_start();
    $query = new WP_Query(array(
        'post_type' => 'portfolio',
        'posts_per_page' => 3,
        'order' => 'ASC',
        'orderby' => 'title',
    ));
    if ($query->have_posts()) { ?>


        <div className="workShow-container">
            <div className="inner-hero">
                <div className="inner-text">
                    <h2 className="text-white"><span>AMAZING WORKS</span>.</h2>
                </div>
                <div className="working-category">
                    <div className="list-category">
                        <ul>
                            <!-- category -->
                        </ul>
                    </div>
                </div>
            </div>
            <div className="product-container">
                <?php while ($query->have_posts()):
                    $query->the_post(); ?>
                    <div className="main-product">
                        <div  className="work-container">
                            <div className="product-content">
                                <div className="work-category">
                                    <h5>/</h5>
                                </div>
                                <div className="work-title">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <div className="work-button">

                                    <a href="<?php the_excerpt(); ?>">Learn More</a>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>
        <?php $myvariable = ob_get_clean();
        return $myvariable;
    }
}
add_shortcode('service', 'service_shotcode');