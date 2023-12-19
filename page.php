<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolioME
 */

get_header();
?>
<!-- Hero Section -->
<div class="hero-container">
    <div class="inner-hero">
        <div class="inner-text">
            <h1 class="text-white">
                <span>
                    <?php echo the_title(); ?>
                </span>.
            </h1>
        </div>
    </div>
    <div class="gradient-circle"></div>
    <div class="gradient-circle-two"></div>
</div>
	<main id="primary" class="site-main">

	<?php echo the_content(); ?>

	</main>

<?php
get_footer();
