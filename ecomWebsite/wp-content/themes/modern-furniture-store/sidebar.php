<?php
/**
 * The sidebar containing the main widget area
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'modern-furniture-store' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>