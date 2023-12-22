<?php

// sidebar register
function inspiry_theme_sidebars() {
	register_sidebar(
		[
			'name'          => __( 'header_widget', 'themename' ),
			'id'            => 'Header Widget',
			'description'   => __( 'header_widget', 'themename' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		]
	);
}
add_action( 'widgets_init', 'inspiry_theme_sidebars' );
