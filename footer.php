<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portfolioME
 */

?>
<footer class="">
    <div style="background:black!important; color:white!important"
        class="px-4 py-6 md:flex md:items-center md:justify-between">
        <span class="text-sm text-white dark:text-gray-300 sm:text-center">© 2023 <a href="https://flowbite.com/">
                <?php echo get_bloginfo('name'); ?>
            </a>. All Rights Reserved.
        </span>
        <div class="flex mt-4 sm:justify-center md:mt-0 space-x-5 rtl:space-x-reverse">
            <?php dynamic_sidebar('footer_widget'); ?>
        </div>
    </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>