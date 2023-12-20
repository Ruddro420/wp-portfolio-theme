<?php
function portfoliome_import_files()
{
    return array(
        array(
            'import_file_name' => 'Import Your Demo Content',
            'categories' => array('New category'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'demo-content/content.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'demo-content/widget.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'demo-content/customizer.dat',
            'import_notice' => __('After you import this demo, you will have to setup the slider separately.', 'portfoliome'),
            'preview_url' => 'https://ruddro.info/',
        ),
    );
}
add_filter('ocdi/import_files', 'portfoliome_import_files');

// Set primary menu and other options after import
function portfoliome_after_import_setup()
{
    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

    if ($main_menu) {
        set_theme_mod('nav_menu_locations', array(
            'menu-1' => $main_menu->term_id,
        ));
    }

    $front_page_id = get_page_by_title('Home');
    $blog_page_id = get_page_by_title('Blog');

    if ($front_page_id) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page_id->ID);
    }

    if ($blog_page_id) {
        update_option('page_for_posts', $blog_page_id->ID);
    }
    // Assign the menu to the location manually if it's not set automatically
    $locations = get_theme_mod('nav_menu_locations');
    if (!$locations || !isset($locations['primary'])) {
        $locations['primary'] = $main_menu->term_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('ocdi/after_import', 'portfoliome_after_import_setup');

?>