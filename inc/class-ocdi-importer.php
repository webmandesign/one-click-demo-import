<?php
/**
 * Class for declaring the importer used in the One Click Demo Import plugin
 *
 * @package ocdi
 */

class OCDI_Importer {

	private $importer;

	function __construct( $importer_options ) {

		// Include files that are needed for WordPress Importer v2.
		$this->include_required_files();

		// Set the WordPress Importer v2 as the importer used in this plugin.
		// More: https://github.com/humanmade/WordPress-Importer.
		$this->importer = new WXR_Importer( $importer_options );
	}

	/**
	 * Include required files.
	 */
	private function include_required_files() {
		if ( ! class_exists( 'WP_Importer' ) ) {
			defined( 'WP_LOAD_IMPORTERS' ) || define( 'WP_LOAD_IMPORTERS', true );
			require ABSPATH . '/wp-admin/includes/class-wp-importer.php';
		}
		require PT_OCDI_PATH . 'vendor/humanmade/WordPress-Importer/class-wxr-importer.php';
	}

	/**
	 * Imports demo data from a WordPress export file.
	 *
	 * @param string $data_file path to xml file, file with WordPress demo export data.
	 */
	public function import( $data_file ) {
		$this->importer->import( $data_file );
	}

	/**
	 * Set the logger used in the import
	 *
	 * @param object $logger logger instance.
	 */
	public function set_logger( $logger ) {
		$this->importer->set_logger( $logger );
	}
}
