<?php
/*
Plugin Name: UCF Section
Description: Provides a shortcode, functions, and default styles for displaying Sections.
Version: 1.0.8
Author: UCF Web Communications / UCF College of Sciences
License: GPL3
*/


if ( ! defined( 'WPINC' ) ) {
	die;
}

add_filter( 'the_content', array( 'UCF_Section_Common', 'format_shortcode_output' ), 10, 1 );

if ( ! function_exists( 'ucf_section_plugins_loaded' ) ) {
	function ucf_section_plugins_loaded() {

		define( 'UCF_SECTION__PLUGIN_FILE', __FILE__ );

		require_once 'includes/ucf-section-common.php';
		require_once 'shortcodes/ucf-section-shortcode.php';
		require_once 'includes/ucf-section-posttype.php';
		require_once 'includes/ucf-section-group-taxonomy.php';

		add_action( 'init', array( 'UCF_Section_PostType', 'register' ), 10, 0 );
		add_action( 'init', array( 'UCF_Section_Group_Taxonomy', 'register' ), 10, 0 );
	}

	add_action( 'plugins_loaded', 'ucf_section_plugins_loaded', 10, 0 );
}

?>
