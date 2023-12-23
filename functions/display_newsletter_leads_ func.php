<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function display_newsletter_leads() {
	$newsletter_db = new NewsLetterDB();
	$subscribers   = $newsletter_db->get_subscribers();

	echo '<div class="wrap">';
	echo '<h1>'. __('Newsletter Leads', 'themename') .'</h1>';

	echo '<table class="wp-list-table widefat fixed striped" style="margin-top: 50px;">';
	echo '<thead><tr><th scope="col">ID</th><th scope="col">'. __('Email', 'themename') .'</th><th scope="col">'. __('Date Added', 'themename') .'</th></tr></thead>';
	echo '<tbody>';

	foreach ( $subscribers as $subscriber ) {
		echo '<tr>';
		echo '<td>' . esc_html( $subscriber['id'] ) . '</td>';
		echo '<td>' . esc_html( $subscriber['email'] ) . '</td>';
		echo '<td>' . esc_html( $subscriber['date_added'] ) . '</td>';
		echo '</tr>';
	}

	echo '</tbody>';
	echo '</table>';

	echo '</div>';
}
