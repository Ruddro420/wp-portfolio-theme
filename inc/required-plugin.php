<?php 
// required plugin
// Include the TGM Plugin Activation library
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'my_theme_register_required_plugins');

function my_theme_register_required_plugins() {
    $plugins = array(
        array(
            'name'     => 'Contact Form 7',
            'slug'     => 'contact-form-7',
            'required' => true,
        ),
        // Add other plugins as needed in a similar format
    );

    $config = array(
        'id'           => 'my-theme-plugins', // Unique ID for your theme.
        'default_path' => '', // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true, // Show admin notices or not.
        'dismissable'  => true, // If false, a user cannot dismiss the nag message.
        'is_automatic' => true, // Automatically activate plugins after installation or not.
    );

    tgmpa($plugins, $config);
} 

?>