<?php 

/**************
* Для примера *
***************/
function dmz_get_post_types() {
	return [
		'example_post_type' => [
			'config' => [
					'public' => false,
					'menu_position' => 5,
					'menu_icon'     => 'dashicons-text-page',
					'supports'=> ['title'],
					'show_ui' => true,
				],
			'singular' => esc_html__( 'Для примера', 'dmz_theme' ),
			'multiple' => esc_html__( 'Для примера', 'dmz_theme' ),
		],
	];
}

function dmz_get_taxonomies() {
	return [
		'example_category'    => [
			'for'        => ['example_post_type'],
			'config'    => [
				'sort'        => true,
				'args'        => ['orderby' => 'term_order'],
				'hierarchical' => true,
			],
			'singular'    => esc_html__('Category', 'dmz_theme'),
			'multiple'    => esc_html__('Categories', 'dmz_theme')
		],
		'example_tag'    => [
			'for'        => ['example_post_type'],
			'config'    => [
				'sort'        => true,
				'args'        => ['orderby' => 'term_order'],
				'hierarchical' => false,
			],
			'singular'    => esc_html__('Tag', 'dmz_theme'),
			'multiple'    => esc_html__('Tags', 'dmz_theme')
		]
	];
}



/*=================================================================== */