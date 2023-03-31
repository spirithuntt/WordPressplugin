<?php
/**
 * Template part for displaying posts
 *
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2><?php the_title();?></h2>
    <div class="box-info">
        <?php if(get_theme_mod('modern_furniture_store_remove_date',true) != ''){ ?>
            <i class="far fa-calendar-alt"></i><span class="entry-date"><?php the_date(); ?></span>
        <?php }?>
        <?php if(get_theme_mod('modern_furniture_store_remove_author',true) != ''){ ?>
            <i class="fas fa-user"></i><span class="entry-author"><?php the_author(); ?></span>
        <?php }?>
        <?php if(get_theme_mod('modern_furniture_store_remove_comments',true) != ''){ ?>
            <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','modern-furniture-store'), __('0 Comments','modern-furniture-store'), __('% Comments','modern-furniture-store') ); ?></span>
        <?php }?>
    </div>
    <?php if(has_post_thumbnail()) { ?>
        <hr>
        <div class="box-image">
            <?php the_post_thumbnail();  ?>
        </div>       
    <?php }?>
    <hr>
    <div class="box-content">
        <?php the_content(); ?>
        <?php if(get_theme_mod('modern_furniture_store_remove_tags',true) != ''){ ?>
            <?php the_tags(); ?>
        <?php }?>
        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
        comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'modern-furniture-store' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next:', 'modern-furniture-store' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous:', 'modern-furniture-store' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }
    ?>
    </div>
</article>