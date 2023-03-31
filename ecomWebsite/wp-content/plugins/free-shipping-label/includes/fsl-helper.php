<?php

namespace FSL\Includes;

class Helper
{
    /**
     * Check if string starts with string.
     *
     * @since    1.0.0
     * @return   boolean
     */
    static function starts_with( $string, $start_string )
    {
        if ( !$string ) {
            return;
        }
        $len = strlen( $start_string );
        return substr( $string, 0, $len ) === $start_string;
    }
    
    /**
     * Get information about shipping method.
     *
     * @since    2.1.0
     * @param    string    $shipping_id       The id of the method.
     * @return   number                                 
     */
    static function get_shipping_method_min_amount( $shipping_id )
    {
        $packages = WC()->shipping->get_packages();
        $amount = null;
        foreach ( $packages as $key => $package ) {
            
            if ( isset( $package['rates'] ) && isset( $package['rates'][$shipping_id] ) ) {
                $rate = $package['rates'][$shipping_id];
                $meta = $rate->get_meta_data();
                // Flexible Shipping
                if ( isset( $meta['_fs_method']['method_free_shipping'] ) ) {
                    $amount = ( $meta['_fs_method']['method_free_shipping'] ?: null );
                }
            }
        
        }
        return apply_filters( 'fsl_shipping_method_min_amount', $amount, $shipping_id );
    }
    
    /**
     * Get chosen shipping method.
     *
     * @since    2.1.0
     */
    static function chosen_shipping_method()
    {
        $wc_session = ( isset( WC()->session ) ? WC()->session : null );
        if ( !$wc_session ) {
            return;
        }
        $chosen_methods = $wc_session->get( 'chosen_shipping_methods' );
        if ( !$chosen_methods ) {
            return null;
        }
        $chosen_shipping_id = ( $chosen_methods ? $chosen_methods[0] : '' );
        return $chosen_shipping_id;
    }
    
    /**
     * Get minimal amount for free shipping.
     *
     * @since    1.0.0
     * @return   number  
     */
    static function get_free_shipping_min_amount()
    {
        $amount = null;
        $general_options = get_option( 'devnet_fsl_general' );
        $initial_zone = ( isset( $general_options['initial_zone'] ) ? $general_options['initial_zone'] : '1' );
        $enable_custom_threshold = ( isset( $general_options['enable_custom_threshold'] ) ? $general_options['enable_custom_threshold'] : false );
        $custom_threshold = ( isset( $general_options['custom_threshold'] ) ? $general_options['custom_threshold'] : false );
        
        if ( $enable_custom_threshold ) {
            $amount = ( $custom_threshold ?: $amount );
            return $amount;
        }
        
        $chosen_shipping_id = self::chosen_shipping_method();
        $is_flexible_shipping = self::starts_with( $chosen_shipping_id, 'flexible_shipping' );
        
        if ( $is_flexible_shipping ) {
            $option_name = 'woocommerce_' . str_replace( ':', '_', $chosen_shipping_id ) . '_settings';
            $option = get_option( $option_name );
            $fs_amount = ( isset( $option['method_free_shipping'] ) ? $option['method_free_shipping'] : null );
            $fs_amount = apply_filters( 'fsl_flexible_shipping_min_amount', $amount, $chosen_shipping_id );
            // Return $amount from options if exists,otherwise go through packages and find FlexibleShipping.
            $amount = ( $fs_amount ? $fs_amount : self::get_shipping_method_min_amount( $chosen_shipping_id ) );
            if ( self::only_virtual_products() ) {
                $amount = null;
            }
            return apply_filters( 'fsl_min_amount', $amount );
        }
        
        $amount = null;
        $cart = WC()->cart;
        
        if ( $cart ) {
            $packages = $cart->get_shipping_packages();
            $package = reset( $packages );
            $zone = wc_get_shipping_zone( $package );
            $known_customer = self::destination_info_exists( $package );
            
            if ( !$known_customer && $initial_zone || $initial_zone == 0 ) {
                $init_zone = \WC_Shipping_Zones::get_zone_by( 'zone_id', $initial_zone );
                // Check if initial zone still exists.
                $zone = ( $init_zone ? $init_zone : $zone );
            }
            
            foreach ( $zone->get_shipping_methods( true ) as $key => $method ) {
                
                if ( $method->id === 'free_shipping' ) {
                    $instance = ( isset( $method->instance_settings ) ? $method->instance_settings : null );
                    $requires = ( isset( $instance['requires'] ) ? $instance['requires'] : null );
                    
                    if ( !$requires || 'coupon' === $requires ) {
                        $amount = null;
                        break;
                    }
                    
                    $GLOBALS['fsl_free_shipping_instance_settings'] = $instance;
                    $min_amount_key = apply_filters( 'fsl_free_shipping_instance_key', 'min_amount' );
                    $amount = ( isset( $instance[$min_amount_key] ) ? $instance[$min_amount_key] : null );
                    // If filter fails, go back to default 'min_amount' key.
                    if ( !$amount && isset( $instance['min_amount'] ) ) {
                        $amount = $instance['min_amount'];
                    }
                    break;
                }
                
                
                if ( self::starts_with( $method->id, 'flexible_shipping' ) ) {
                    $option_name = 'woocommerce_' . $method->id . '_' . $method->instance_id . '_settings';
                    $option = get_option( $option_name );
                    $amount = ( isset( $option['method_free_shipping'] ) ? $option['method_free_shipping'] : null );
                    // Return $amount from options if exists,otherwise go through packages and find FlexibleShipping.
                    $amount = ( $amount ? $amount : self::get_shipping_method_min_amount( $method->id ) );
                }
            
            }
            if ( self::only_virtual_products() ) {
                $amount = null;
            }
        }
        
        return apply_filters( 'fsl_min_amount', $amount );
    }
    
    /**
     * Check if only a virtual product is in the cart.
     * 
     * @since   2.6.0 
     * 
     */
    static function only_virtual_products()
    {
        $only_virtual = false;
        $cart = WC()->cart;
        if ( $cart ) {
            foreach ( $cart->get_cart() as $cart_item ) {
                $product = $cart_item['data'];
                
                if ( $product->is_virtual() || $product->is_downloadable() ) {
                    $only_virtual = true;
                } else {
                    $only_virtual = false;
                    break;
                }
            
            }
        }
        return $only_virtual;
    }
    
    /**
     * Check package to determine if is a returning customer.
     * 
     * TODO: better check on more parameters.
     */
    static function destination_info_exists( $package = array() )
    {
        $country = ( isset( $package['destination']['country'] ) ? $package['destination']['country'] : null );
        $state = ( isset( $package['destination']['state'] ) ? $package['destination']['state'] : null );
        $postcode = ( isset( $package['destination']['postcode'] ) ? $package['destination']['postcode'] : null );
        $city = ( isset( $package['destination']['city'] ) ? $package['destination']['city'] : null );
        // If country is set to AF - this is probably default selection for the first country on the list.
        // Just to be sure, we'll check if city is empty or not.
        if ( $country === 'AF' && !$city ) {
            $country = null;
        }
        $exists = true;
        // If there's no country, state and postcode, we are probably dealing with "first-timer" or
        // a customer that hasn't filled out checkout form recently.
        if ( !$country && !$state && !$postcode ) {
            $exists = false;
        }
        return $exists;
    }
    
    static function shipping_zones_option_list()
    {
        $zones = \WC_Shipping_Zones::get_zones();
        $options = [
            '' => esc_html__( '-- None --', 'free-shipping-label' ),
        ];
        foreach ( $zones as $key => $zone ) {
            $id = ( isset( $zone['zone_id'] ) ? $zone['zone_id'] : null );
            $name = ( isset( $zone['zone_name'] ) ? $zone['zone_name'] : null );
            if ( $id && $name ) {
                $options[$id] = $name;
            }
        }
        return $options;
    }
    
    /**
     * 
     * @since   2.4.0
     */
    static function is_free_shipping_coupon_applied()
    {
        $is_applied = false;
        $applied_coupons = WC()->cart->get_applied_coupons();
        foreach ( $applied_coupons as $coupon_code ) {
            $coupon = new \WC_Coupon( $coupon_code );
            if ( $coupon->get_free_shipping() ) {
                $is_applied = true;
            }
        }
        return $is_applied;
    }
    
    /**
     * Search products by title only.
     * 
     * @since    2.6.0
     */
    static function search_product_titles( $find = '' )
    {
        global  $wpdb ;
        $wild = '%';
        $like = $wild . $wpdb->esc_like( $find ) . $wild;
        $sql = $wpdb->prepare( "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type = 'product' AND post_title LIKE %s", $like );
        $results = $wpdb->get_results( $sql );
        return $results;
    }
    
    /**
     * Search through products and product categories
     * 
     * @since    2.6.0
     */
    static function fsl_search()
    {
        // we will pass post IDs and titles to this array
        $return = [];
        $categories = get_terms( [
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
        ] );
        // Prepare category array
        foreach ( $categories as $category ) {
            $name = $category->name;
            // Find category by slug or title
            
            if ( strpos( strtolower( $name ), strtolower( $_GET['q'] ) ) !== false ) {
                $name = ( mb_strlen( $name ) > 50 ? mb_substr( $name, 0, 49 ) . '...' : $name );
                $return[] = [ $category->term_id, $name, 'category' ];
                // array( Category ID, Category Title, Type )
            }
        
        }
        $found_products = self::search_product_titles( $_GET['q'] );
        if ( !empty($found_products) ) {
            foreach ( $found_products as $product ) {
                $title = $product->post_title;
                // shorten the title a little
                $title = ( mb_strlen( $title ) > 50 ? mb_substr( $title, 0, 49 ) . '...' : $title );
                $return[] = [ $product->ID, $title, 'product' ];
                // array( Post ID, Post Title, Type )
            }
        }
        echo  json_encode( $return ) ;
        wp_die();
    }
    
    static function label_excluded( $output )
    {
        $label_options = get_option( 'devnet_fsl_label' );
        $excluded = ( isset( $label_options['exclude'] ) ? $label_options['exclude'] : [] );
        $options = [];
        $excluded_on = [];
        foreach ( $excluded as $key ) {
            $parts = explode( '___', $key );
            $title = ( isset( $parts[1] ) ? $parts[1] : $key );
            $type_and_id = ( isset( $parts[0] ) ? $parts[0] : [] );
            $type_and_id_parts = explode( '---', $type_and_id );
            $type = ( isset( $type_and_id_parts[0] ) ? $type_and_id_parts[0] : '' );
            $id = ( isset( $type_and_id_parts[1] ) ? $type_and_id_parts[1] : '' );
            $options[$key] = $title;
            $excluded_on[$type][] = $id;
        }
        return ( $output === 'options' ? $options : $excluded_on );
    }

}