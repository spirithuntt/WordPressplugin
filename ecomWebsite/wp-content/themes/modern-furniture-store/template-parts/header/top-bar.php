<?php
/*
* Display Top Bar
*/
?>

<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 align-self-center text-lg-left">
        <div class="timebox">
          <?php if( get_theme_mod( 'modern_furniture_store_topbar_text') != '') { ?>
            <span class="phone"><?php echo esc_html( get_theme_mod('modern_furniture_store_topbar_text','')); ?></span>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 align-self-center text-lg-center">
        <div class="social-media">
          <?php if( get_theme_mod( 'modern_furniture_store_facebook_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'modern_furniture_store_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'modern_furniture_store_twitter_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'modern_furniture_store_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'modern_furniture_store_instagram_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'modern_furniture_store_instagram_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'modern_furniture_store_youtube_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'modern_furniture_store_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'modern_furniture_store_pint_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'modern_furniture_store_pint_url','' ) ); ?>"><i class="fab fa-pinterest"></i></a>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 align-self-center">
        <div class="topbar-links align-self-center">
           <?php if(get_theme_mod('modern_furniture_store_about_us_link' ) != '' || get_theme_mod('modern_furniture_store_about_us_text') != ""){?>
            <span><a href="<?php echo esc_url( get_theme_mod('modern_furniture_store_about_us_link','') ); ?>"> <?php echo esc_html( get_theme_mod('modern_furniture_store_about_us_text','') ); ?></a></span>
          <?php } ?>
          <?php if(class_exists('woocommerce')){ ?>
          <?php global $woocommerce; ?>
          <span><?php if( get_theme_mod('modern_furniture_store_change_usd') != '' ){ ?>
            <?php echo do_shortcode('[woocommerce_currency_switcher_drop_down_box]'); ?>
          <?php }?></span>
          <?php } ?>
          <?php if(get_theme_mod('modern_furniture_store_wishlist_link' ) != '' || get_theme_mod('modern_furniture_store_wishlist_text') != ""){?>
          <span><a href="<?php echo esc_url( get_theme_mod('modern_furniture_store_wishlist_link','') ); ?>"> <?php echo esc_html( get_theme_mod('modern_furniture_store_wishlist_text','') ); ?></a></span>
          <?php } ?>

        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
