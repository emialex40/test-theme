<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_ajax_newsletter_lead', 'newsletter_lead_callback' );
add_action( 'wp_ajax_nopriv_newsletter_lead', 'newsletter_lead_callback' );

function newsletter_lead_callback() {
	if ( isset( $_REQUEST ) ) {
		if ( $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' ) {
			$email    = isset( $_REQUEST['email'] ) ? sanitize_email( $_REQUEST['email'] ) : '';
			$email_db = new NewsLetterDB();

			if ( isset( $email ) && ! empty( $email ) ) {
				if ( ! $email_db->email_exists( $email ) ) {
					$email_db->add_subscriber( $email );
					echo '0';
				}
				else {
					echo '1';
				}
			}
		}
	}
	wp_die();
}