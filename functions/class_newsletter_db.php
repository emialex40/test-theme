<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class NewsLetterDB {

	private $table_name;

	public function __construct() {
		global $wpdb;
		$this->table_name = $this->get_table_name();
	}

	private function get_table_name() {
		global $wpdb;

		return $wpdb->prefix . 'newsletter_subscribers';
	}

	private function create_table() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE IF NOT EXISTS {$this->table_name} (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      email varchar(255) NOT NULL,
      date_added datetime DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (id),
      UNIQUE KEY email (email)
    ) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}

	public function add_subscriber( $email ) {
		if ( ! $this->table_exists() ) {
			$this->create_table();
		}

		global $wpdb;

		return $wpdb->insert( $this->table_name, [ 'email' => $email ], [ '%s' ] );
	}

	public function get_subscribers() {
		if ( ! $this->table_exists() ) {
			return [];
		}

		global $wpdb;

		return $wpdb->get_results( "SELECT * FROM {$this->table_name}", ARRAY_A );
	}

	public function delete_subscriber( $email ) {
		if ( ! $this->table_exists() ) {
			return false;
		}

		global $wpdb;

		return $wpdb->delete( $this->table_name, [ 'email' => $email ], [ '%s' ] );
	}

	public function update_subscriber( $old_email, $new_email ) {
		if ( ! $this->table_exists() ) {
			return false;
		}

		global $wpdb;

		return $wpdb->update( $this->table_name, [ 'email' => $new_email ], [ 'email' => $old_email ], [ '%s' ], [ '%s' ] );
	}

	public function email_exists( $email ) {
		if ( ! $this->table_exists() ) {
			return false;
		}

		global $wpdb;
		$result = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$this->table_name} WHERE email = %s", $email ) );

		return (int) $result > 0;
	}

	private function table_exists() {
		global $wpdb;

		return $wpdb->get_var( "SHOW TABLES LIKE '{$this->table_name}'" ) === $this->table_name;
	}

}


