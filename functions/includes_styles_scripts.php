<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// styles and scripts including
function load_theme_styles() {
	wp_enqueue_style( 'style' );

	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap', [], time(), 'all' );
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/styles.css', [], time(), 'all' );

	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/scripts.min.js', [ 'jquery' ], time(), true );

	wp_localize_script( 'jquery', 'myajax', [
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'myajax-nonce' ),
		] );
}

add_action( 'wp_enqueue_scripts', 'load_theme_styles', 100 );

// enable colorpicker
function enqueue_colorpicker() {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'enqueue_colorpicker' );

function initialize_colorpicker_script() {
	?>
    <script>
      jQuery(document).ready(function ($) {
        $('.colorpicker').wpColorPicker()
      })
    </script>
	<?php
}
add_action( 'admin_footer', 'initialize_colorpicker_script' );
