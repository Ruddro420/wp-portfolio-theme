<?php
/**
 * portfolioME Theme Customizer
 *
 * @package portfolioME
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function portfoliome_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'portfoliome_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'portfoliome_customize_partial_blogdescription',
			)
		);

		// header button section
		$wp_customize->add_section('portfoliome_header_btn', array(
			'title' => __('Header', 'portfoliome_header_btn'),
			'description' => 'Header Button Text Change Here',
			'priority' => 30,
		));	
		// button text setting
		$wp_customize->add_setting('portfoliome_headerBtn_section', array(
			'default' => 'Know More',
		));
		// button link settings
		$wp_customize->add_setting('portfoliome_headerLink_section', array(
			'default' => '#',
		));
		// button text controller
		$wp_customize->add_control('portfoliome_headerBtn_section', array(
			'label' => 'Button Text',
			'description' => 'update content',
			'settings' => 'portfoliome_headerBtn_section',
			'section' => 'portfoliome_header_btn',
		));
		// button link controller
		$wp_customize->add_control('portfoliome_headerLink_section', array(
			'label' => 'Button URL',
			'description' => 'update content',
			'settings' => 'portfoliome_headerLink_section',
			'section' => 'portfoliome_header_btn',
		));
		// hero section settings
		$wp_customize->add_setting('portfoliome_hero_section', array(
			'default' => 'Creativity is the process of having orginal ideas.',
		));
		// hero section controller
		$wp_customize->add_control('portfoliome_hero_section', array(
			'label' => 'Hero Section',
			'description' => 'update content',
			'settings' => 'portfoliome_hero_section',
			'section' => 'portfoliome_header_btn',
			'type' => 'textarea',
		));
		// about section 
		$wp_customize->add_section('portfoliome_about', array(
			'title' => __('About Me', 'portfoliome_about'),
			'description' => 'About section edit here',
			'priority' => 31,
		));	
		// about section settings
		$wp_customize->add_setting('portfoliome_about_section', array(
			'default'=> 'WHO I AM',
		));
		// about section description
		$wp_customize->add_setting('portfoliome_about_section_des', array(
			'default'=> 'I am passionate about creating beautiful and functional websites that are easy to use and navigate. I am also a team player and able to work effectively with others. I am always looking for new ways to improve my skills and stay up-to-date on the latest trends in web development.
			<br>
			I am excited about the future of front-end web development and I am eager to continue learning and growing in this field. I believe that front-end web development is a great way to use my skills and creativity to make a difference in the world.',
		));
		// about section controller
		$wp_customize->add_control('portfoliome_about_section', array(
			'label' => 'Title Text',
			'description' => 'update content',
			'settings' => 'portfoliome_about_section',
			'section' => 'portfoliome_about',
		));
		// about section description controller
		$wp_customize->add_control('portfoliome_about_section_des', array(
			'label' => 'Description Text',
			'description' => 'update content',
			'settings' => 'portfoliome_about_section_des',
			'section' => 'portfoliome_about',
			'type' => 'textarea',
		));
		// about section embaded link settings
		$wp_customize->add_setting('portfoliome_about_link', array(
			'default' => 'https://www.youtube.com/embed/qmVDfuSL8EY',
		));
		// about section embaded link controller
		$wp_customize->add_control('portfoliome_about_link', array(
			'label' => 'Video Link',
			'description' => 'update content',
			'settings' => 'portfoliome_about_link',
			'section' => 'portfoliome_about',
			'type' => 'url',
		) );

	}
}
add_action( 'customize_register', 'portfoliome_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function portfoliome_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function portfoliome_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function portfoliome_customize_preview_js() {
	wp_enqueue_script( 'portfoliome-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'portfoliome_customize_preview_js' );
