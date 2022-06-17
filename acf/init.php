<?php

// If using ACF that supports block types
if ( function_exists( 'acf_register_block_type' ) ) :

	// Reuseable global variable of color.
	define( 'CT_COLOR', '#FFFFFF' );
	define( 'CT_BG_COLOR', '#076aab' );

	/**
	 * Function to register ACF block type
	 *
	 * @link https://www.advancedcustomfields.com/resources/acf_register_block_type/
	 */
	function ct_register_acf_block_types() {

		$cache_icons_grid = filemtime(assets_directory() . '/css/blocks/icons-grid.css' );
		$cache_cards_slider = filemtime(assets_directory() . '/css/blocks/cards-slider.css' );
		$cache_button = filemtime(assets_directory() . '/css/blocks/button.css');
		$cache_service = filemtime(assets_directory() . '/css/blocks/service.css');
		$cache_blogs = filemtime(assets_directory() . '/css/blocks/blogs.css');
		$cache_bio = filemtime(assets_directory() . '/css/blocks/bio.css');
		$cache_testimonial = filemtime(assets_directory() . '/css/blocks/testimonial.css');
		$cache_video_testimonial = filemtime(assets_directory() . '/css/blocks/video-testimonial.css');
		$cache_link = filemtime(assets_directory() . '/css/blocks/link.css');
		$cache_benefit = filemtime(assets_directory() . '/css/blocks/benefits.css');

		// Icon Grid Block
		acf_register_block_type(array(
			'name'				=> 'icons-grid',
			'title'				=> 'Icons Grid',
			'description'		=> 'Add icons using grid layout',
			'render_template'	=> 'acf/templates/icons-grid.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'images-alt2',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('grid', 'icons', 'icon'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/icons-grid.css?ct-cache=' . $cache_icons_grid,
		));

		// Card Slider Block
		acf_register_block_type(array(
			'name'				=> 'card-slider',
			'title'				=> 'Cards Slider',
			'description'		=> 'Custom block for cards slider',
			'render_template'	=> 'acf/templates/cards-slider.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'slides',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('slider', 'cards slider', 'card slider', 'cards', 'card'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/cards-slider.css?ct-cache=' . $cache_cards_slider,
			'enqueue_script'    => assets_uri() . '/js/blocks/cards-slider.js',
		));

		// Button Block
		acf_register_block_type(array(
			'name'				=> 'button',
			'title'				=> 'Button',
			'description'		=> 'Add CTA button to your website',
			'render_template'	=> 'acf/templates/button.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'button',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('button', 'link'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/button.css?ct-cache=' . $cache_button,
		));

		// Services Block
		acf_register_block_type(array(
			'name'				=> 'service',
			'title'				=> 'Service',
			'description'		=> 'Custom block for services section on your website',
			'render_template'	=> 'acf/templates/service.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'admin-generic',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('card', 'cards', 'services', 'service'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/service.css?ct-cache=' . $cache_service,
		));

		// Blogs Block
		acf_register_block_type(array(
			'name'				=> 'blogs',
			'title'				=> 'Blogs',
			'description'		=> 'Display interactive blog carousel on your website',
			'render_template'	=> 'acf/templates/blogs.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'welcome-write-blog',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('card', 'cards', 'blogs', 'blog', 'slider'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/blogs.css?ct-cache=' . $cache_blogs,
			'enqueue_script'    => assets_uri() . '/js/blocks/blogs.js',
		));

		// Biography Block
		acf_register_block_type(array(
			'name'				=> 'biography',
			'title'				=> 'Biograpgy',
			'description'		=> 'Custom block for displaying your biography on your website',
			'render_template'	=> 'acf/templates/bio.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'businessman',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('biography', 'information', 'matt'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/bio.css?ct-cache=' . $cache_bio,
			'enqueue_script'    => assets_uri() . '/js/blocks/bio.js',
		));

		// Testimonaial Block
		acf_register_block_type(array(
			'name'				=> 'testimonial',
			'title'				=> 'Testimonials',
			'description'		=> 'Custom block for displaying testimonials',
			'render_template'	=> 'acf/templates/testimonial.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'testimonial',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('testimonial', 'testimonials', 'client', 'review', 'reviews'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/testimonial.css?ct-cache=' . $cache_testimonial,
			'enqueue_script'    => assets_uri() . '/js/blocks/testimonial.js',
		));

		// Link Block
		acf_register_block_type(array(
			'name'				=> 'link',
			'title'				=> 'Link',
			'description'		=> 'Add link to your content',
			'render_template'	=> 'acf/templates/link.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'admin-links',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('link', 'button', 'url'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/link.css?ct-cache=' . $cache_link,
		));

		// Benefit Block
		acf_register_block_type(array(
			'name'				=> 'benefits',
			'title'				=> 'Benefits',
			'description'		=> 'Add benefits to your website',
			'render_template'	=> 'acf/templates/benefits.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'editor-bold',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('benefit', 'benefits', 'carousel', 'slider'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/benefits.css?ct-cache=' . $cache_benefit,
			'enqueue_script'    => assets_uri() . '/js/blocks/benefits.js',
		));

		// Testimonaial Block
		acf_register_block_type(array(
			'name'				=> 'video-testimonial',
			'title'				=> 'Video Testimonial',
			'description'		=> 'Custom block for displaying video testimonial',
			'render_template'	=> 'acf/templates/video-testimonial.php',
			'category'			=> 'coalition',
			'supports'			=> array(
			'anchor'			=> true,
			),
			'icon'				=> array(
				'src'				=> 'testimonial',
				'foreground'		=> CT_COLOR,
				'background'		=> CT_BG_COLOR,
			),
			'keywords'			=> array('testimonial', 'testimonials', 'client', 'review', 'reviews', 'video', 'video-testimonial'),
			'enqueue_style'		=> assets_uri() . '/css/blocks/video-testimonial.css?ct-cache=' . $cache_video_testimonial,
		));
	}
	add_action( 'acf/init', 'ct_register_acf_block_types' );

	/**
	 * Register gutenberg block and re-order it to make custom category first.
	 * 
	 * @param  array $categories contains all registered categories
	 * @return array             sorted categories
	 */
	function ct_block_category( $categories ) {

		$custom_block = array(
			'slug'	=> 'coalition',
			'icon'	=> 'wordpress',
			'title'	=> 'CT Custom Blocks',
		);

		$categories_sorted = array();
		$categories_sorted[0] = $custom_block;

		foreach ($categories as $category) {
			$categories_sorted[] = $category;
		}

		return $categories_sorted;

	}
	add_filter( 'block_categories', 'ct_block_category', 10, 1);

endif;

/**
	  ________                                     __  __  _
	 /_  __/ /_  ___  ____ ___  ___     ________  / /_/ /_(_)___  ____ ______
	  / / / __ \/ _ \/ __ `__ \/ _ \   / ___/ _ \/ __/ __/ / __ \/ __ `/ ___/
	 / / / / / /  __/ / / / / /  __/  (__  )  __/ /_/ /_/ / / / / /_/ (__  )
	/_/ /_/ /_/\___/_/ /_/ /_/\___/  /____/\___/\__/\__/_/_/ /_/\__, /____/
															   /____/
 */

if ( function_exists( 'acf_add_local_field_group' ) ) :

	/**
	 * Add quick link to site settings to the admin nav bar
	 *
	 * @param  object $wp_admin_bar contains the admin bar object.
	 */
	function ct_add_site_settings( $wp_admin_bar ) {
		$args = array(
			'id'    => 'ct-settings',
			'title' => '<i class="dashicons-before dashicons-sos" style="line-height: 20px;display: inline-block;"></i> CT Settings',
			'href'  => admin_url( 'admin.php?page=ct-settings' ),
			'meta'  => array(
				'html'     => '<style>#wp-admin-bar-ct-settings a{color:#FFFFFF!important;background:#006AAC!important}</style>',
			),
		);

		$wp_admin_bar->add_node( $args );
		$wp_admin_bar->remove_node( 'wp-logo' );
		$wp_admin_bar->remove_node( 'comments' );
		$wp_admin_bar->remove_node( 'customize' );
	}
	add_action( 'admin_bar_menu', 'ct_add_site_settings', 99 );

	/**
	 * Registering ACF options page
	 */
	function ct_settings() {

		// Check function exists.
		if ( function_exists( 'acf_add_options_page' ) ) {

			acf_add_options_page(
				array(
					'position'      => 1,
					'page_title'    => 'CT Settings',
					'menu_title'    => 'CT Settings',
					'menu_slug'     => 'ct-settings',
					'icon_url'      => 'dashicons-sos',
				)
			);
		}
	}
	add_action( 'acf/init', 'ct_settings' );


	/**
	 * Fixing admin area with CSS
	 */
	function ct_fix_admin_stuff() {
		echo '
		<style>
			.wp-block {
				max-width: 1170px;
			}
			.editor-post-title textarea {
				text-align: center;
			}
		</style>
		';
	}
	add_action( 'admin_head', 'ct_fix_admin_stuff' );

endif;
