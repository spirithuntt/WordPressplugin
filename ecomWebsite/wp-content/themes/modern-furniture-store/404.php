<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

get_header(); ?>

<div class="container">
	<main id="tp_content" role="main">
		<div id="primary" class="content-area">
			<section class="error-404 not-found">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'modern-furniture-store' ); ?></h1>
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'modern-furniture-store' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</section>
		</div>
	</main>
</div>

<?php get_footer();