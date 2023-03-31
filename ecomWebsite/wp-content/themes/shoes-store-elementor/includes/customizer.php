<?php

if ( class_exists("Kirki")){

	// HEADER SECTION

	Kirki::add_section( 'shoes_store_elementor_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'shoes-store-elementor' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'shoes-store-elementor' ),
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shoes_store_elementor_sticky_header',
		'label'       => esc_html__( 'Enable/Disable Sticky Header', 'shoes-store-elementor' ),
		'section'     => 'shoes_store_elementor_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shoes-store-elementor' ),
			'off' => esc_html__( 'Disable', 'shoes-store-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shoes_store_elementor_google_translator',
		'label'       => esc_html__( 'Language Translator', 'shoes-store-elementor' ),
		'section'     => 'shoes_store_elementor_section_header',
		'default'     => 0,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shoes-store-elementor' ),
			'off' => esc_html__( 'Disable', 'shoes-store-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shoes_store_elementor_currency_switcher',
		'label'       => esc_html__( 'Currency Switcher', 'shoes-store-elementor' ),
		'section'     => 'shoes_store_elementor_section_header',
		'default'     => 0,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shoes-store-elementor' ),
			'off' => esc_html__( 'Disable', 'shoes-store-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Contact Button', 'shoes-store-elementor' ),
		'settings' => 'shoes_store_elementor_header_button_text',
		'section'  => 'shoes_store_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'    =>  esc_html__( 'Button Link', 'shoes-store-elementor' ),
		'settings' => 'shoes_store_elementor_header_button_url',
		'section'  => 'shoes_store_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Advertisement Text', 'shoes-store-elementor' ),
		'settings' => 'shoes_store_elementor_header_advertisement_text',
		'section'  => 'shoes_store_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'    =>  esc_html__( 'Wishlist Link', 'shoes-store-elementor' ),
		'settings' => 'shoes_store_elementor_header_wishlist_url',
		'section'  => 'shoes_store_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shoes_store_elementor_cart_box_enable',
		'label'       => esc_html__( 'Enable/Disable Shopping Cart', 'shoes-store-elementor' ),
		'section'     => 'shoes_store_elementor_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shoes-store-elementor' ),
			'off' => esc_html__( 'Disable', 'shoes-store-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shoes_store_elementor_disable_search_icon',
		'label'       => esc_html__( 'Enable/Disable Search', 'shoes-store-elementor' ),
		'section'     => 'shoes_store_elementor_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shoes-store-elementor' ),
			'off' => esc_html__( 'Disable', 'shoes-store-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'shoes_store_elementor_menu_color',
		'label'       => __( 'Menu Color', 'shoes-store-elementor' ),
		'type'        => 'color',
		'section'     => 'shoes_store_elementor_section_header',
		'transport' => 'auto',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'shoes_store_elementor_menu_hover_color',
		'label'       => __( 'Menu Hover Color', 'shoes-store-elementor' ),
		'type'        => 'color',
		'default'     => '#fc1313',
		'section'     => 'shoes_store_elementor_section_header',
		'transport' => 'auto',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a:hover', '#main-menu ul li a:hover', '#main-menu li:hover > a','#main-menu a:focus','#main-menu li.focus > a','#main-menu ul li.current-menu-item > a','#main-menu ul li.current_page_item > a','#main-menu ul li.current-menu-parent > a','#main-menu ul li.current_page_ancestor > a','#main-menu ul li.current-menu-ancestor > a'),
				'property' => 'color',
			),

		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'shoes_store_elementor_submenu_color',
		'label'       => __( 'Submenu Color', 'shoes-store-elementor' ),
		'type'        => 'color',
		'section'     => 'shoes_store_elementor_section_header',
		'transport' => 'auto',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu ul.children li a', '#main-menu ul.sub-menu li a'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'shoes_store_elementor_submenu_hover_color',
		'label'       => __( 'Submenu Hover Color', 'shoes-store-elementor' ),
		'type'        => 'color',
		'section'     => 'shoes_store_elementor_section_header',
		'transport' => 'auto',
		'default'     => '#fff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu ul.children li a:hover', '#main-menu ul.sub-menu li a:hover'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'shoes_store_elementor_submenu_hover_background_color',
		'label'       => __( 'Submenu Hover Background Color', 'shoes-store-elementor' ),
		'type'        => 'color',
		'section'     => 'shoes_store_elementor_section_header',
		'transport' => 'auto',
		'default'     => '#fc1313',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu ul.children li a:hover', '#main-menu ul.sub-menu li a:hover'),
				'property' => 'background',
			),
		),
	) );

	//ADDITIONAL SETTINGS

	Kirki::add_section( 'shoes_store_elementor_additional_setting', array(
		'title'          => esc_html__( 'Additional Settings', 'shoes-store-elementor' ),
		'description'    => esc_html__( 'Additional Settings of themes', 'shoes-store-elementor' ),
		'priority'       => 10,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'shoes_store_elementor_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'shoes-store-elementor' ),
		'section'     => 'shoes_store_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'shoes_store_elementor_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'shoes-store-elementor' ),
		'section'     => 'shoes_store_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'shoes_store_elementor_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'shoes-store-elementor' ),
		'description'    => esc_html__( 'Here you can add post information.', 'shoes-store-elementor' ),
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'shoes_store_elementor_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'shoes-store-elementor' ),
		'section'     => 'shoes_store_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'shoes_store_elementor_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'shoes-store-elementor' ),
		'section'     => 'shoes_store_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'shoes_store_elementor_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'shoes-store-elementor' ),
		'section'     => 'shoes_store_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shoes_store_elementor_length_setting_heading',
		'section'     => 'shoes_store_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'shoes-store-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'shoes_store_elementor_length_setting',
		'section'     => 'shoes_store_elementor_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
						'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'shoes-store-elementor' ),
		'settings'    => 'shoes_store_elementor_single_post_tag',
		'section'     => 'shoes_store_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'shoes-store-elementor' ),
		'settings'    => 'shoes_store_elementor_single_post_category',
		'section'     => 'shoes_store_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	// FOOTER SECTION

	Kirki::add_section( 'shoes_store_elementor_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'shoes-store-elementor' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'shoes-store-elementor' ),
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shoes_store_elementor_footer_text_heading',
		'section'     => 'shoes_store_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'shoes-store-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'shoes_store_elementor_footer_text',
		'section'  => 'shoes_store_elementor_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shoes_store_elementor_footer_enable_heading',
		'section'     => 'shoes_store_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'shoes-store-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shoes_store_elementor_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'shoes-store-elementor' ),
		'section'     => 'shoes_store_elementor_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shoes-store-elementor' ),
			'off' => esc_html__( 'Disable', 'shoes-store-elementor' ),
		],
	] );
}
