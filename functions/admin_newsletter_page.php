<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action('admin_menu', 'register_newsletter_leads_page');

function register_newsletter_leads_page() {
	// Додаємо сторінку в головне меню
	add_menu_page(
		'Newsletter Leads',
		'Newsletter Leads',
		'manage_options',
		'newsletter-leads',
		'display_newsletter_leads',
		'dashicons-email-alt',
		6
	);
}
