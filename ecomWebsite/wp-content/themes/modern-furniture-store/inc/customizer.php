<?php
/**
 * Modern Furniture Store: Customizer
 *
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function modern_furniture_store_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'modern_furniture_store_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home page Settings', 'modern-furniture-store' ),
	    'description' => __( 'Description of what this panel does.', 'modern-furniture-store' ),
	) );

  	//TP Preloader Option
	$wp_customize->add_section('modern_furniture_store_prealoader_option',array(
		'title' => __('TP Preloader Option', 'modern-furniture-store'),
		'panel' => 'modern_furniture_store_panel_id',
		'priority' => 10,
 	) );

	$wp_customize->add_setting('modern_furniture_store_preloader_show_hide',array(
		'default' => false,
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
	));
 	$wp_customize->add_control('modern_furniture_store_preloader_show_hide',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Preloader Option','modern-furniture-store'),
		'section' => 'modern_furniture_store_prealoader_option',
	));

  	$wp_customize->add_setting( 'modern_furniture_store_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_tp_preloader_color1_option', array(
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'modern-furniture-store'),
	    'section' => 'modern_furniture_store_prealoader_option',
	    'settings' => 'modern_furniture_store_tp_preloader_color1_option',
  	)));

  	$wp_customize->add_setting( 'modern_furniture_store_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_tp_preloader_color2_option', array(
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'modern-furniture-store'),
	    'section' => 'modern_furniture_store_prealoader_option',
	    'settings' => 'modern_furniture_store_tp_preloader_color2_option',
  	)));

  	$wp_customize->add_setting( 'modern_furniture_store_tp_preloader_bg_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_tp_preloader_bg_option', array(
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'modern-furniture-store'),
	    'section' => 'modern_furniture_store_prealoader_option',
	    'settings' => 'modern_furniture_store_tp_preloader_bg_option',
  	)));

	//TP General Option
	$wp_customize->add_section('modern_furniture_store_tp_general_settings',array(
        'title' => __('TP General Option', 'modern-furniture-store'),
        'panel' => 'modern_furniture_store_panel_id',
        'priority' => 10,
    ) );

    $wp_customize->add_setting('modern_furniture_store_tp_body_layout_settings',array(
        'default' => 'Full',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
    $wp_customize->add_control('modern_furniture_store_tp_body_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Body Layout Setting', 'modern-furniture-store'),
        'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'modern-furniture-store'),
        'section' => 'modern_furniture_store_tp_general_settings',
        'choices' => array(
            'Full' => __('Full','modern-furniture-store'),
            'Container' => __('Container','modern-furniture-store'),
            'Container Fluid' => __('Container Fluid','modern-furniture-store')
        ),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('modern_furniture_store_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_furniture_store_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Position', 'modern-furniture-store'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'modern-furniture-store'),
        'section' => 'modern_furniture_store_tp_general_settings',
        'choices' => array(
            'full' => __('Full','modern-furniture-store'),
            'left' => __('Left','modern-furniture-store'),
            'right' => __('Right','modern-furniture-store'),
            'three-column' => __('Three Columns','modern-furniture-store'),
            'four-column' => __('Four Columns','modern-furniture-store'),
            'grid' => __('Grid Layout','modern-furniture-store')
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('modern_furniture_store_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_furniture_store_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'modern-furniture-store'),
        'description'   => __('This option work for pages.', 'modern-furniture-store'),
        'section' => 'modern_furniture_store_tp_general_settings',
        'choices' => array(
            'full' => __('Full','modern-furniture-store'),
            'left' => __('Left','modern-furniture-store'),
            'right' => __('Right','modern-furniture-store')
        ),
	) );

	$wp_customize->add_setting('modern_furniture_store_sticky',array(
				'default' => false,
				'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
	));
	$wp_customize->add_control('modern_furniture_store_sticky',array(
				'type' => 'checkbox',
				'label' => __('Show / Hide Sticky Header','modern-furniture-store'),
				'section' => 'modern_furniture_store_tp_general_settings',
	));

	//TP Blog Option
	$wp_customize->add_section('modern_furniture_store_blog_option',array(
        'title' => __('TP Blog Option', 'modern-furniture-store'),
        'panel' => 'modern_furniture_store_panel_id',
        'priority' => 10,
    ) );

    $wp_customize->add_setting('modern_furniture_store_remove_date',array(
       'default' => true,
       'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('modern_furniture_store_remove_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Date Option','modern-furniture-store'),
       'section' => 'modern_furniture_store_blog_option',
    ));
    $wp_customize->selective_refresh->add_partial( 'modern_furniture_store_remove_date', array(
		'selector' => '.entry-date',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_remove_date',
	) );

    $wp_customize->add_setting('modern_furniture_store_remove_author',array(
       'default' => true,
       'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('modern_furniture_store_remove_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Author Option','modern-furniture-store'),
       'section' => 'modern_furniture_store_blog_option',
    ));
    $wp_customize->selective_refresh->add_partial( 'modern_furniture_store_remove_author', array(
		'selector' => '.entry-author',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_remove_author',
	) );

    $wp_customize->add_setting('modern_furniture_store_remove_comments',array(
       'default' => true,
       'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('modern_furniture_store_remove_comments',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Comment Option','modern-furniture-store'),
       'section' => 'modern_furniture_store_blog_option',
    ));
    $wp_customize->selective_refresh->add_partial( 'modern_furniture_store_remove_comments', array(
		'selector' => '.entry-comments',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_remove_comments',
	) );

    $wp_customize->add_setting('modern_furniture_store_remove_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('modern_furniture_store_remove_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Tags Option','modern-furniture-store'),
       'section' => 'modern_furniture_store_blog_option',
    ));
    $wp_customize->selective_refresh->add_partial( 'modern_furniture_store_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_remove_tags',
	 ));

    $wp_customize->add_setting('modern_furniture_store_remove_read_button',array(
       'default' => true,
       'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('modern_furniture_store_remove_read_button',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Read More Button','modern-furniture-store'),
       'section' => 'modern_furniture_store_blog_option',
    ));
    $wp_customize->selective_refresh->add_partial( 'modern_furniture_store_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_remove_read_button',
	 ));

    $wp_customize->add_setting('modern_furniture_store_read_more_text',array(
		'default'=> __('Read More','modern-furniture-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_read_more_text',array(
		'label'	=> __('Edit Button Text','modern-furniture-store'),
		'section'=> 'modern_furniture_store_blog_option',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'modern_furniture_store_read_more_text', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_read_more_text',
	) );

	$wp_customize->add_setting( 'modern_furniture_store_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'modern_furniture_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'modern_furniture_store_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','modern-furniture-store' ),
		'section'     => 'modern_furniture_store_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Top bar Section
	$wp_customize->add_section( 'modern_furniture_store_topbar', array(
    	'title'      => __( 'Topbar Details', 'modern-furniture-store' ),
    	'description' => __( 'Add your contact details', 'modern-furniture-store' ),
		'panel' => 'modern_furniture_store_panel_id',
      'priority' => 10,
	) );

	$wp_customize->add_setting('modern_furniture_store_topbar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_topbar_text',array(
		'label'	=> __('Add Topbar Text','modern-furniture-store'),
		'section'=> 'modern_furniture_store_topbar',
		'type'=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'modern_furniture_store_topbar_text', array(
		'selector' => '.timebox i',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_topbar_text',
	) );

	$wp_customize->add_setting('modern_furniture_store_about_us_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_about_us_text',array(
		'label'	=> __('Track Order Text','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('modern_furniture_store_about_us_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_about_us_link',array(
		'label'	=> __('Track Order Link','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_topbar',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('modern_furniture_store_change_usd',array(
		'default' => false,
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
	));
 	$wp_customize->add_control('modern_furniture_store_change_usd',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Currency','modern-furniture-store'),
		'section' => 'modern_furniture_store_topbar',
	));

	$wp_customize->add_setting('modern_furniture_store_wishlist_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_wishlist_text',array(
		'label'	=> __('Offer Zone Text','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('modern_furniture_store_wishlist_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_wishlist_link',array(
		'label'	=> __('Offer Zone Link','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_topbar',
		'type'		=> 'url'
	));


	// Header Section
	$wp_customize->add_section( 'modern_furniture_store_header', array(
    	'title'      => __( 'Header Details', 'modern-furniture-store' ),
    	'description' => __( 'Add your contact details', 'modern-furniture-store' ),
		'panel' => 'modern_furniture_store_panel_id',
      'priority' => 10,
	) );

	$wp_customize->add_setting('modern_furniture_store_shipping_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_shipping_text',array(
		'label'	=> __('Add Shipping','modern-furniture-store'),
		'section'=> 'modern_furniture_store_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('modern_furniture_store_shipping',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_shipping',array(
		'label'	=> __('Add Shipping Text','modern-furniture-store'),
		'section'=> 'modern_furniture_store_header',
		'type'=> 'text'
	));



	$wp_customize->add_setting('modern_furniture_store_return_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_return_text',array(
		'label'	=> __('Add Money Return','modern-furniture-store'),
		'section'=> 'modern_furniture_store_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('modern_furniture_store_return',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_return',array(
		'label'	=> __('Add Money Return Text','modern-furniture-store'),
		'section'=> 'modern_furniture_store_header',
		'type'=> 'text'
	));



	$wp_customize->add_setting('modern_furniture_store_deal_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_deal_text',array(
		'label'	=> __('Add Deals','modern-furniture-store'),
		'section'=> 'modern_furniture_store_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('modern_furniture_store_deal',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_deal',array(
		'label'	=> __('Add Deal Text','modern-furniture-store'),
		'section'=> 'modern_furniture_store_header',
		'type'=> 'text'
	));


	// Social Link
	$wp_customize->add_section( 'modern_furniture_store_social_media', array(
    	'title'      => __( 'Social Media Links', 'modern-furniture-store' ),
    	'description' => __( 'Add your Social Links', 'modern-furniture-store' ),
		'panel' => 'modern_furniture_store_panel_id',
      'priority' => 10,
	) );

	$wp_customize->add_setting('modern_furniture_store_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_facebook_url',array(
		'label'	=> __('Facebook Link','modern-furniture-store'),
		'section'=> 'modern_furniture_store_social_media',
		'type'=> 'url'
	));

	$wp_customize->selective_refresh->add_partial( 'modern_furniture_store_facebook_url', array(
		'selector' => '.social-media',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_facebook_url',
	) );

	$wp_customize->add_setting('modern_furniture_store_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_twitter_url',array(
		'label'	=> __('Twitter Link','modern-furniture-store'),
		'section'=> 'modern_furniture_store_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('modern_furniture_store_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_instagram_url',array(
		'label'	=> __('Instagram Link','modern-furniture-store'),
		'section'=> 'modern_furniture_store_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('modern_furniture_store_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_youtube_url',array(
		'label'	=> __('YouTube Link','modern-furniture-store'),
		'section'=> 'modern_furniture_store_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('modern_furniture_store_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_pint_url',array(
		'label'	=> __('Pinterest Link','modern-furniture-store'),
		'section'=> 'modern_furniture_store_social_media',
		'type'=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'modern_furniture_store_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'modern-furniture-store' ),
    	'description' => __('Slider Image Dimension ( 1600px x 650px )','modern-furniture-store'),
			'panel' => 'modern_furniture_store_panel_id',
		'priority'   => 10,
	) );

	$modern_furniture_store_categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($modern_furniture_store_categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('modern_furniture_store_post_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'modern_furniture_store_sanitize_select',
	));
	$wp_customize->add_control('modern_furniture_store_post_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display slider images','modern-furniture-store'),
		'section' => 'modern_furniture_store_slider_section',
	));


	// Product Section

	$wp_customize->add_section( 'modern_furniture_store_product_section' , array(
	 	'title'      => __( 'Product Section', 'modern-furniture-store' ),
	 	'priority' => 6,
			'panel' => 'modern_furniture_store_panel_id'
	) );


	$modern_furniture_store_args = array(
		'type'                     => 'product',
		'child_of'                 => 0,
		'parent'                   => '',
		'orderby'                  => 'term_group',
		'order'                    => 'ASC',
		'hide_empty'               => false,
		'hierarchical'             => 1,
		'number'                   => '',
		'taxonomy'                 => 'product_cat',
		'pad_counts'               => false
		);
		$categories = get_categories( $modern_furniture_store_args );
		$modern_furniture_store_cats = array();
		$i = 0;
		foreach($categories as $category){
				if($i==0){
						$default = $category->slug;
						$i++;
				}
		$modern_furniture_store_cats[$category->slug] = $category->name;
		}
		$wp_customize->add_setting('modern_furniture_store_recent_product_category',array(
				'sanitize_callback' => 'modern_furniture_store_sanitize_select',
		));
		$wp_customize->add_control('modern_furniture_store_recent_product_category',array(
				'type'    => 'select',
				'choices' => $modern_furniture_store_cats,
				'label' => __('Select Product Category','modern-furniture-store'),
				'section' => 'modern_furniture_store_product_section',
		));


	//footer
	$wp_customize->add_section('modern_furniture_store_footer_section',array(
		'title'	=> __('Footer Text','modern-furniture-store'),
		'description'	=> __('Add copyright text.','modern-furniture-store'),
		'panel' => 'modern_furniture_store_panel_id'
	));

	$wp_customize->add_setting('modern_furniture_store_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_footer_text',array(
		'label'	=> __('Copyright Text','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'modern_furniture_store_footer_text', array(
		'selector' => '#footer p',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_footer_text',
	) );

    $wp_customize->add_setting('modern_furniture_store_return_to_header',array(
       'default' => true,
       'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('modern_furniture_store_return_to_header',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Return to header','modern-furniture-store'),
       'section' => 'modern_furniture_store_footer_section',
    ));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('modern_furniture_store_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_furniture_store_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'modern-furniture-store'),
        'description'   => __('This option work for scroll to top', 'modern-furniture-store'),
        'section' => 'modern_furniture_store_footer_section',
        'choices' => array(
            'Right' => __('Right','modern-furniture-store'),
            'Left' => __('Left','modern-furniture-store'),
            'Center' => __('Center','modern-furniture-store')
        ),
	) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'modern_furniture_store_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'modern_furniture_store_customize_partial_blogdescription',
	) );

	$wp_customize->add_setting('modern_furniture_store_site_title_text',array(
       'default' => true,
       'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('modern_furniture_store_site_title_text',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','modern-furniture-store'),
       'section' => 'title_tagline',
    ));

		// logo site title size
		$wp_customize->add_setting('modern_furniture_store_site_title_font_size',array(
			'default'	=> 22,
			'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
		));
		$wp_customize->add_control('modern_furniture_store_site_title_font_size',array(
			'label'	=> __('Site Title Font Size in PX','modern-furniture-store'),
			'section'	=> 'title_tagline',
			'setting'	=> 'modern_furniture_store_site_title_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 100,
			),
		));

    $wp_customize->add_setting('modern_furniture_store_site_tagline_text',array(
       'default' => false,
       'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('modern_furniture_store_site_tagline_text',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Tagline','modern-furniture-store'),
       'section' => 'title_tagline',
    ));


		// logo site tagline size
	$wp_customize->add_setting('modern_furniture_store_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_furniture_store_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','modern-furniture-store'),
		'section'	=> 'title_tagline',
		'setting'	=> 'modern_furniture_store_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

    $wp_customize->add_setting('modern_furniture_store_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	 $wp_customize->add_control('modern_furniture_store_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','modern-furniture-store'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('modern_furniture_store_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
   $wp_customize->add_control('modern_furniture_store_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'modern-furniture-store'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'modern-furniture-store'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','modern-furniture-store'),
            'Same Line' => __('Same Line','modern-furniture-store')
        ),
	) );

	$wp_customize->add_setting('modern_furniture_store_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_furniture_store_per_columns',array(
		'label'	=> __('Product Per Row','modern-furniture-store'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('modern_furniture_store_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_furniture_store_product_per_page',array(
		'label'	=> __('Product Per Page','modern-furniture-store'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

    $wp_customize->add_setting('modern_furniture_store_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('modern_furniture_store_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Shop page sidebar','modern-furniture-store'),
       'section' => 'woocommerce_product_catalog',
    ));

    $wp_customize->add_setting('modern_furniture_store_single_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'modern_furniture_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('modern_furniture_store_single_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product page sidebar','modern-furniture-store'),
       'section' => 'woocommerce_product_catalog',
    ));
}
add_action( 'customize_register', 'modern_furniture_store_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Modern Furniture Store 1.0
 * @see modern_furniture_store_customize_register()
 *
 * @return void
 */
function modern_furniture_store_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Modern Furniture Store 1.0
 * @see modern_furniture_store_customize_register()
 *
 * @return void
 */
function modern_furniture_store_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'MODERN_FURNITURE_STORE_PRO_THEME_NAME' ) ) {
	define( 'MODERN_FURNITURE_STORE_PRO_THEME_NAME', esc_html__( 'Modern Furniture Pro Theme', 'modern-furniture-store' ));
}
if ( ! defined( 'MODERN_FURNITURE_STORE_PRO_THEME_URL' ) ) {
	define( 'MODERN_FURNITURE_STORE_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/furniture-store-wordpress-theme/'));
}


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Modern_Furniture_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Modern_Furniture_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Modern_Furniture_Store_Customize_Section_Pro(
				$manager,
				'modern_furniture_store_section_pro',
				array(
					'priority'   => 9,
					'title'    => MODERN_FURNITURE_STORE_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'modern-furniture-store' ),
					'pro_url'  => esc_url( MODERN_FURNITURE_STORE_PRO_THEME_URL, 'modern-furniture-store' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'modern-furniture-store-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'modern-furniture-store-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );

		wp_enqueue_script( 'modern-furniture-store-owl-carousel', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/owl.carousel.js' );
	}
}

// Doing this customizer thang!
Modern_Furniture_Store_Customize::get_instance();
