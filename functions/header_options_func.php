<?php
/**
 *  add logo field for header
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function custom_customize_register_logo($wp_customize) {

	$wp_customize->add_setting('custom_logo', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
		'label'    => __('Select your logo', 'themename'),
		'section'  => 'title_tagline',
		'settings' => 'custom_logo',
	)));
}

add_action('customize_register', 'custom_customize_register_logo');
