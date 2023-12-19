<?php
// custom widget for footer
function footer_widget() {
    register_sidebar(array(
        'name' => 'Footer Widget',
        'id' => 'footer_widget',
        'description' => 'Footer Widget',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

add_action('widgets_init', 'footer_widget');
?>