<?php
/**
 * Registers the section shortcode
 * @author RJ Bruneel
 * @since 1.0.0
 **/

if ( ! class_exists( 'UCF_Section_Shortcode' ) ) {
	class UCF_Section_Shortcode {
		public static function shortcode( $atts ) {
			$atts = shortcode_atts( array(
				'slug'       	=> null,
				'id'         	=> null,
				'class'      	=> '',
				'title'      	=> '',
				'display_title' => '',
				'section_id' 	=> ''
			), $atts );

			if ( isset( $atts['slug'] ) || isset( $atts['id'] ) ) {
				return UCF_Section_Common::display_section( $atts );
			}

			return '';
		}
	}
	add_shortcode( 'ucf-section', array( 'UCF_Section_Shortcode', 'shortcode' ) );
}
if ( ! class_exists( 'UCF_Section_Group_Shortcode' ) ) {
	class UCF_Section_Group_Shortcode {
		public static function shortcode( $atts ) {
			$atts = shortcode_atts( array(
				'slug'       	=> null,
				'display_title' => '',
				'class'      	=> ''
				/*'id'         	=> null,
				
				'title'      	=> '',
				
				'section_id' 	=> '' */
			), $atts );

			if ( isset( $atts['slug'] ) || isset( $atts['id'] ) ) {
				return UCF_Section_Common::display_section_group( $atts );
			}

			return '';
		}
	}
	add_shortcode( 'ucf-section-group', array( 'UCF_Section_Group_Shortcode', 'shortcode' ) );
}
?>
