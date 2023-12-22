<?php

// styles and scripts including
function load_theme_styles()
{
	wp_enqueue_style( 'style' );

	wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/styles.css', array(), time(), 'all');

	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), time(), true);

    wp_localize_script( 'jquery', 'myajax',
		[
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'myajax-nonce' ),
		]
	);
}

add_action('wp_enqueue_scripts', 'load_theme_styles', 100);
