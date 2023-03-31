<?php
/**
 * Modern Furniture Store functions and definitions
 *
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

function modern_furniture_store_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'modern-furniture-store-featured-image', 2000, 1200, true );
	add_image_size( 'modern-furniture-store-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'modern-furniture-store' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', modern_furniture_store_fonts_url() ) );
}
add_action( 'after_setup_theme', 'modern_furniture_store_setup' );

/**
 * Register custom fonts.
 */
function modern_furniture_store_fonts_url(){
	$modern_furniture_store_font_url = '';
	$modern_furniture_store_font_family = array();
	$modern_furniture_store_font_family[] = 'Playfair Display:400,400i,700,700i,900,900i';
	$modern_furniture_store_font_family[] = 'Poppins:200,200i,300,300i,400,400i,500';
	$modern_furniture_store_font_family[] = 'Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';

	$modern_furniture_store_query_args = array(
		'family'	=> rawurlencode(implode('|',$modern_furniture_store_font_family)),
	);
	$modern_furniture_store_font_url = add_query_arg($modern_furniture_store_query_args,'//fonts.googleapis.com/css');
	return $modern_furniture_store_font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $modern_furniture_store_font_url ) );
}

/**
 * Register widget area.
 */
function modern_furniture_store_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'modern-furniture-store' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'modern-furniture-store' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'modern-furniture-store' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'modern-furniture-store' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'modern-furniture-store' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'modern-furniture-store' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'modern-furniture-store' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'modern_furniture_store_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function modern_furniture_store_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'modern-furniture-store-fonts', modern_furniture_store_fonts_url(), array(), null );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	//Owl Carousel CSS
	wp_enqueue_style( 'owl.carousel-style', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'modern-furniture-store-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'modern-furniture-store-style',$modern_furniture_store_tp_theme_css );

	// Theme block stylesheet.
	wp_enqueue_style( 'modern-furniture-store-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'modern-furniture-store-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	//Owl Carousel JS
	wp_enqueue_script( 'owl.carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ),true );

	if(!wp_is_mobile()){
		wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ), true );
		wp_enqueue_script( 'modern-furniture-store-superfish-custom-scripts', esc_url( get_template_directory_uri() ) . '/assets/js/superfish-custom.js', array('jquery','jquery-superfish'), true );
	}

	wp_enqueue_script( 'modern-furniture-store-custom-scripts', esc_url( get_template_directory_uri() ) . '/assets/js/custom.js', array('jquery'), true );

	wp_enqueue_script( 'modern-furniture-store-focus-nav', esc_url( get_template_directory_uri() ) . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'modern_furniture_store_scripts' );

//Admin Enqueue for Admin
function modern_furniture_store_admin_enqueue_scripts(){
	wp_enqueue_style('modern-furniture-store-admin-style', esc_url( get_template_directory_uri() ) . '/assets/css/admin.css');
	wp_enqueue_script( 'modern-furniture-store-custom-scripts', esc_url( get_template_directory_uri() ). '/assets/js/custom.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'modern_furniture_store_admin_enqueue_scripts' );


/*radio button sanitization*/
function modern_furniture_store_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function modern_furniture_store_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'modern_furniture_store_loop_columns');
if (!function_exists('modern_furniture_store_loop_columns')) {
	function modern_furniture_store_loop_columns() {
		$columns = get_theme_mod( 'modern_furniture_store_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'modern_furniture_store_per_page', 20 );
function modern_furniture_store_per_page( $cols ) {
  	$cols = get_theme_mod( 'modern_furniture_store_product_per_page', 9 );
	return $cols;
}

function modern_furniture_store_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function modern_furniture_store_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function modern_furniture_store_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function modern_furniture_store_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function modern_furniture_store_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'modern_furniture_store_front_page_template' );

define('MODERN_FURNITURE_STORE_CREDIT',__('https://www.themespride.com/themes/free-furniture-wordpress-theme/','modern-furniture-store') );
if ( ! function_exists( 'modern_furniture_store_credit' ) ) {
	function modern_furniture_store_credit(){
		echo "<a href=".esc_url(MODERN_FURNITURE_STORE_CREDIT)." target='_blank'>".esc_html__('Furniture Store WordPress Theme','modern-furniture-store')."</a>";
	}
}

function modern_furniture_store_activation_notice() { ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="modern-furniture-store-getting-started-notice clearfix">
            <div class="modern-furniture-store-theme-notice-content">
                <h2 class="modern-furniture-store-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'modern-furniture-store' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>

                <p class="plugin-install-notice"><?php echo sprintf(__('Click here to get started with the theme set-up.', 'modern-furniture-store')) ?></p>

                <a class="modern-furniture-store-btn-get-started button button-primary button-hero modern-furniture-store-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=modern-furniture-store-about' )); ?>" ><?php esc_html_e( 'Get started', 'modern-furniture-store' ) ?></a><span class="modern-furniture-store-push-down">
                <?php
                    /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                    printf(
                        'or %1$sCustomize theme%2$s</a></span>',
                        '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                        '</a>'
                    );
                ?>
            </div>
        </div>
    </div>
<?php }

add_action( 'admin_notices', 'modern_furniture_store_activation_notice' );

/**
 * Logo Custamization.
 */

function modern_furniture_store_logo_width(){

	$modern_furniture_store_logo_width   = get_theme_mod( 'modern_furniture_store_logo_width', 150 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $modern_furniture_store_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'modern_furniture_store_logo_width' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/about-theme.php' );

/**
 * Load Theme Web File
 */
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
