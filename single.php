<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package portfolioME
 */

get_header();
?>
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

<!-- Main Content -->
<main class='single-work-container'>
	<div href="#"
		class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
		<img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
			src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="">
		<div class="flex flex-col justify-between p-4 leading-normal">
			<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo the_title(); ?></h5>
			<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
				<?php echo the_content(); ?>
			</p>
		</div>
</di>
</main>

<?php
get_footer();
