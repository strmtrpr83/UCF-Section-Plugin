<?php
/**
 * Handles the registeration of the Section Group custom taxonomy.
 * @author Jim Barnes
 * @since 1.0.0
 **/
if ( ! class_exists( 'UCF_Section_Group_Taxonomy' ) ) {
	class UCF_Section_Group_Taxonomy {
		/**
		 * Registers the Section Group custom taxonomy.
		 * @author Jim Barnes
		 * @since 1.0.0
		 **/
		public static function register() {
			$labels = apply_filters( 
						'ucf_section_group_labels',
						array( 
							'singular' => 'Section Group',
							'plural'   => 'Section Groups',
							'slug'     => 'section-groups',
						) );

			register_taxonomy( 'section_group', array( 'ucf_section' ), self::args( $labels ) );
		}

		/**
		 * Returns an array of labels for the custom taxonomy.
		 * @author Jim Barnes
		 * @since 1.0.0
		 * @param $singular string | The singular form for the CPT labels.
		 * @param $plural string | The plural form for the CPT labels.
		 * @return Array
		 **/
		public static function labels( $singular, $plural ) {
			return array(
				'name'                       => _x( $plural, 'Taxonomy General Name', 'ucf_section' ),
				'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'ucf_section' ),
				'menu_name'                  => __( $plural, 'ucf_section' ),
				'all_items'                  => __( 'All ' . $plural, 'ucf_section' ),
				'parent_item'                => __( 'Parent ' . $singular, 'ucf_section' ),
				'parent_item_colon'          => __( 'Parent :' . $singular, 'ucf_section' ),
				'new_item_name'              => __( 'New ' . $singular . ' Name', 'ucf_section' ),
				'add_new_item'               => __( 'Add New ' . $singular, 'ucf_section' ),
				'edit_item'                  => __( 'Edit ' . $singular, 'ucf_section' ),
				'update_item'                => __( 'Update ' . $singular, 'ucf_section' ),
				'view_item'                  => __( 'View ' . $singular, 'ucf_section' ),
				'separate_items_with_commas' => __( 'Separate ' . strtolower( $plural ) . ' with commas', 'ucf_section' ),
				'add_or_remove_items'        => __( 'Add or remove ' . strtolower( $plural ), 'ucf_section' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'ucf_section' ),
				'popular_items'              => __( 'Popular ' . strtolower( $plural ), 'ucf_section' ),
				'search_items'               => __( 'Search ' . $plural, 'ucf_section' ),
				'not_found'                  => __( 'Not Found', 'ucf_section' ),
				'no_terms'                   => __( 'No items', 'ucf_section' ),
				'items_list'                 => __( $plural . ' list', 'ucf_section' ),
				'items_list_navigation'      => __( $plural . ' list navigation', 'ucf_section' ),
			);
		}

		/**
		 * Returns an array of args used to register the custom taxonomy.
		 * @author Jim Barnes
		 * @since 1.0.0
		 * @param $labels Array | An array of labels.
		 * @return Array
		 **/
		public static function args( $labels ) {
			$singular = $labels['singular'];
			$plural = $labels['plural'];
			$slug = $labels['slug'];

			$args = array(
				'labels'                     => self::labels( $singular, $plural ),
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
				'rewrite'                    => array(
					'slug'         => $slug,
					'hierarchical' => true,
					'ep_mask'      => EP_PERMALINK | EP_PAGES
				)
			);

			$args = apply_filters( 'ucf_section_group_args', $args );

			return $args;
		}
	}
}
