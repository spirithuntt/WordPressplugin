<?php

	$modern_furniture_store_tp_theme_css = "" ;

	$modern_furniture_store_theme_lay = get_theme_mod( 'modern_furniture_store_tp_body_layout_settings','Full');
    if($modern_furniture_store_theme_lay == 'Container'){
		$modern_furniture_store_tp_theme_css .='body{';
			$modern_furniture_store_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$modern_furniture_store_tp_theme_css .='}';
		$modern_furniture_store_tp_theme_css .='.scrolled{';
			$modern_furniture_store_tp_theme_css .='width: auto; left:0; right:0;';
		$modern_furniture_store_tp_theme_css .='}';
	}else if($modern_furniture_store_theme_lay == 'Container Fluid'){
		$modern_furniture_store_tp_theme_css .='body{';
			$modern_furniture_store_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$modern_furniture_store_tp_theme_css .='}';
		$modern_furniture_store_tp_theme_css .='.scrolled{';
			$modern_furniture_store_tp_theme_css .='width: auto; left:0; right:0;';
		$modern_furniture_store_tp_theme_css .='}';
	}else if($modern_furniture_store_theme_lay == 'Full'){
		$modern_furniture_store_tp_theme_css .='body{';
			$modern_furniture_store_tp_theme_css .='max-width: 100%;';
		$modern_furniture_store_tp_theme_css .='}';
	}

	$modern_furniture_store_scroll_position = get_theme_mod( 'modern_furniture_store_scroll_top_position','Right');
	if($modern_furniture_store_scroll_position == 'Right'){
		$modern_furniture_store_tp_theme_css .='#return-to-top{';
			$modern_furniture_store_tp_theme_css .='right: 20px;';
		$modern_furniture_store_tp_theme_css .='}';
	}else if($modern_furniture_store_scroll_position == 'Left'){
		$modern_furniture_store_tp_theme_css .='#return-to-top{';
			$modern_furniture_store_tp_theme_css .='left: 20px;';
		$modern_furniture_store_tp_theme_css .='}';
	}else if($modern_furniture_store_scroll_position == 'Center'){
		$modern_furniture_store_tp_theme_css .='#return-to-top{';
			$modern_furniture_store_tp_theme_css .='right: 50%;left: 50%;';
		$modern_furniture_store_tp_theme_css .='}';
	}

	// site title and tagline font size option
	$modern_furniture_store_site_title_font_size = get_theme_mod('modern_furniture_store_site_title_font_size', 22);{
	$modern_furniture_store_tp_theme_css .='.logo h1 a, .logo p a{';
	$modern_furniture_store_tp_theme_css .='font-size: '.esc_attr($modern_furniture_store_site_title_font_size).'px;';
		$modern_furniture_store_tp_theme_css .='}';
	}

	$modern_furniture_store_site_tagline_font_size = get_theme_mod('modern_furniture_store_site_tagline_font_size', 15);{
	$modern_furniture_store_tp_theme_css .='.logo p{';
	$modern_furniture_store_tp_theme_css .='font-size: '.esc_attr($modern_furniture_store_site_tagline_font_size).'px;';
		$modern_furniture_store_tp_theme_css .='}';
	}
