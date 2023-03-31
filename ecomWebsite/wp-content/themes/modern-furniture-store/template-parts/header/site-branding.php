<?php
/*
* Display Logo and contact details
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row">
      <div class="head-1 col-lg-5 col-md-4 align-self-center text-lg-left">
        <?php if( get_theme_mod( 'modern_furniture_store_shipping_text' ) != '' || get_theme_mod( 'modern_furniture_store_shipping' ) != '' || get_theme_mod( 'modern_furniture_store_return_text' ) != '' || get_theme_mod( 'modern_furniture_store_return' ) != '') { ?>
          <div class="row">
            <div class="col-lg-6">
              <div class="row head-box">
                <div class="col-lg-3 col-md-3 align-self-center"><i class="fas fa-truck"></i></div>
                <div class="col-lg-9 col-md-9 align-self-center">
                  <p class="infotext"><?php echo esc_html( get_theme_mod('modern_furniture_store_shipping_text','')); ?></p>
                  <p class="mb-0"><?php echo esc_html( get_theme_mod('modern_furniture_store_shipping','') ); ?></p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row head-box">
                <div class="col-lg-3 col-md-3 align-self-center"><i class="fas fa-undo"></i></div>
                <div class="col-lg-9 col-md-9 align-self-center">
                  <p class="infotext"><?php echo esc_html( get_theme_mod('modern_furniture_store_return_text','')); ?></p>
                  <p class="mb-0"><?php echo esc_html( get_theme_mod('modern_furniture_store_return','') ); ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-lg-2 col-md-4 align-self-center">
        <?php $modern_furniture_store_logo_settings = get_theme_mod( 'modern_furniture_store_logo_settings','Different Line');
        if($modern_furniture_store_logo_settings == 'Different Line'){ ?>
          <div class="logo">
            <?php if( has_custom_logo() ) modern_furniture_store_the_custom_logo(); ?>
            <?php if( get_theme_mod('modern_furniture_store_site_title_text',true) == 1){ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php }?>
            <?php $modern_furniture_store_description = get_bloginfo( 'description', 'display' );
            if ( $modern_furniture_store_description || is_customize_preview() ) : ?>
              <?php if( get_theme_mod('modern_furniture_store_site_tagline_text',false)){ ?>
                <p class="site-description"><?php echo esc_html($modern_furniture_store_description); ?></p>
              <?php }?>
            <?php endif; ?>
          </div>
        <?php }else if($modern_furniture_store_logo_settings == 'Same Line'){ ?>
          <div class="logo logo-same-line">
            <div class="row">
              <div class="col-lg-5 col-md-5 align-self-center">
                <?php if( has_custom_logo() ) modern_furniture_store_the_custom_logo(); ?>
              </div>
              <div class="col-lg-7 col-md-7 align-self-center">
                <?php if(get_theme_mod('modern_furniture_store_site_title_text',true) != ''){ ?>
                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php }?>
                <?php $modern_furniture_store_description = get_bloginfo( 'description', 'display' );
                if ( $modern_furniture_store_description || is_customize_preview() ) : ?>
                  <?php if(get_theme_mod('modern_furniture_store_site_tagline_text',false) != ''){ ?>
                    <p class="site-description"><?php echo esc_html($modern_furniture_store_description); ?></p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="head-2 col-lg-5 col-md-4 align-self-center">
        <?php if( get_theme_mod( 'modern_furniture_store_deal_text' ) != '' || get_theme_mod( 'modern_furniture_store_deal' ) != '' || get_theme_mod( 'modern_furniture_store_cart_text' ) != '' || get_theme_mod( 'modern_furniture_store_cart' ) != '') { ?>
          <div class="row text-lg-right head-box">
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-3 col-md-3 align-self-center"><i class="fas fa-tags"></i></div>
                <div class="col-lg-9 col-md-9 align-self-center">
                  <p class="infotext"><?php echo esc_html( get_theme_mod('modern_furniture_store_deal_text','')); ?></p>
                  <p class="mb-0"><?php echo esc_html( get_theme_mod('modern_furniture_store_deal','') ); ?></p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <?php if(class_exists('woocommerce')){ ?>
                <div class="row head-box">
                  <div class="col-lg-3 col-md-3 align-self-center"><i class="fas fa-shopping-cart"></i></div>
                    <div class="col-lg-9 col-md-9 align-self-center">
                      <p class="cart_no infotext">
                        <?php global $woocommerce; ?>
                        <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','modern-furniture-store' ); ?>"><?php esc_html_e('CART','modern-furniture-store'); ?>    <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count()));?></a>
                        </p>
                        <p class="cart-value simplep"> - <?php echo esc_sql( $woocommerce->cart->get_cart_total() ); ?></p>
                    </div>
                  </div>
                <?php } ?>
              </div>
          </div>
      </div>
    </div>
        <?php } ?>
  </div>
      <div class="clear"></div>
</div>
