<?php
function create_contact_page() {
    $home_page = array(
        'post_title'    => 'Home', // Title of the contact page
        //'post_content'  => '[contact-form-7 id="35e61ef" title="Contact form 1"]', // Content of the page (you can adjust this)
        'post_status'   => 'publish',
        'post_type'     => 'page',
    );
    $contact_page = array(
        'post_title'    => 'Contact', // Title of the contact page
        'post_content'  => '[contact-form-7 id="35e61ef" title="Contact form 1"]', // Content of the page (you can adjust this)
        'post_status'   => 'publish',
        'post_type'     => 'page',
    );

    // Insert the page into the database
    $page_id = wp_insert_post($contact_page);
    $page_id = wp_insert_post($home_page);

    if ($page_id) {
        // Optional: Set the created page as the front page
        update_option('page_on_front', $page_id);
        update_option('show_on_front', 'page');
    }
}
add_action('after_switch_theme', 'create_contact_page');

?>