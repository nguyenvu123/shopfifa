<?php
/**
 * Enqueue scripts and styles.
**/
function athena_scripts() {
    // Styles
    // wp_enqueue_style( 'main-style', ASSETS_PATH.'css/main.css', array(), null );

    // Scripts
    wp_enqueue_script( 'main-script', ASSETS_PATH.'js/js/main.js', array('jquery'), null, true );

    wp_localize_script( 'main-script1', 'wp_localize',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'homeurl' => get_home_url()
        )
    );
    wp_enqueue_script( 'main-script' );

}
add_action( 'wp_enqueue_scripts', 'athena_scripts' );

/**
 * Register Menu
**/
add_action('init', 'athena_setup');
function athena_setup(){
    register_nav_menus( array(
        'athena_main_menu' => __('Main Menu', DOMAIN)
    ) );
    add_theme_support( 'post-thumbnails' );
    add_post_type_support( 'page', 'excerpt' );
    add_image_size(ITEM_PRODUCT_HOME,270,160,TRUE); 
     add_image_size(ITEM_PRODUCT_MINICART,320,320,TRUE);
    
   
}
add_action('wp_enqueue_scripts', 'evatheme_scripts');

function evatheme_scripts() {
    wp_enqueue_style ('theme-style-bootstrap',ASSETS_PATH.'vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style ('theme-style-awesome',ASSETS_PATH.'fonts/font-awesome-4.7.0/css/font-awesome.min.css');
    wp_enqueue_style ('theme-style-themify',ASSETS_PATH.'fonts/themify/themify-icons.css');
    wp_enqueue_style ('theme-style-Linearicons',ASSETS_PATH.'fonts/Linearicons-Free-v1.0.0/icon-font.min.css');
    wp_enqueue_style ('theme-style-elegant',ASSETS_PATH.'fonts/elegant-font/html-css/style.css');
    wp_enqueue_style ('theme-style-animate',ASSETS_PATH.'vendor/animate/animate.css');
    wp_enqueue_style ('theme-style-hamburgers',ASSETS_PATH.'vendor/css-hamburgers/hamburgers.min.css');
    wp_enqueue_style ('theme-style-animsition',ASSETS_PATH.'vendor/animsition/css/animsition.min.css');
    wp_enqueue_style ('theme-style-select2',ASSETS_PATH.'vendor/select2/select2.min.css');
    wp_enqueue_style ('theme-style-daterangepicker',ASSETS_PATH.'vendor/daterangepicker/daterangepicker.css');
    wp_enqueue_style ('theme-style-lightbox2',ASSETS_PATH.'vendor/lightbox2/css/lightbox.min.css'); 
    wp_enqueue_style ('theme-style-util',ASSETS_PATH.'/css/util.css');   
    wp_enqueue_style ('theme-style',ASSETS_PATH.'/css/main.css'); 
 
    // wp_enqueue_style ('theme-style-slick',ASSETS_PATH.'vendor/slick/slick.css');

    wp_enqueue_script ('slick-jquery',ASSETS_PATH.'vendor/jquery/jquery-3.2.1.min.js'); 
    wp_enqueue_script ('slick-animsition',ASSETS_PATH.'vendor/animsition/js/animsition.min.js'); 
    wp_enqueue_script ('slick-bootstrap',ASSETS_PATH.'vendor/bootstrap/js/popper.js');
    wp_enqueue_script ('slick-slick',ASSETS_PATH.'vendor/bootstrap/js/bootstrap.min.js');
    // wp_enqueue_script ('slick-slick2',ASSETS_PATH.'vendor/slick/slick.min.js');
    // wp_enqueue_script ('slick-custom',ASSETS_PATH.'js/slick-custom.js');
    wp_enqueue_script ('slick-countdowntime',ASSETS_PATH.'vendor/countdowntime/countdowntime.js');
    wp_enqueue_script ('slick-lightbox2',ASSETS_PATH.'vendor/lightbox2/js/lightbox.min.js');      
    wp_enqueue_script ('slick-sweetalert',ASSETS_PATH.'vendor/sweetalert/sweetalert.min.js');
    // wp_enqueue_script ('slick-main',ASSETS_PATH.'js/main.js');
    wp_enqueue_script ('slick-select2',ASSETS_PATH.'vendor/select2/select2.min.js');
    wp_enqueue_script ('slick-parallax100',ASSETS_PATH.'vendor/parallax100/parallax100.js');
    
}
if( function_exists('acf_add_options_page') ) {
 
    $option_page = acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'  => false
    ));
 
}
if( ! function_exists('custom_ajax_add_to_cart_button') && class_exists('WooCommerce') ) {
    function custom_ajax_add_to_cart_button( $atts ) {
        // Shortcode attributes
        $atts = shortcode_atts( array(
            'id' => '0', // Product ID
            'qty' => '1', // Product quantity
            'text' => '', // Text of the button
            'class' => '', // Additional classes
        ), $atts, 'ajax_add_to_cart' );
        
        if( esc_attr( $atts['id'] ) == 0 ) return; // Exit when no Product ID

        if( get_post_type( esc_attr( $atts['id'] ) ) != 'product' ) return; // Exit if not a Product

        $product = wc_get_product( esc_attr( $atts['id'] ) );

        if ( ! $product ) return; // Exit when if not a valid Product

        $classes = implode( ' ', array_filter( array(
            'button',
            'product_type_' . $product->get_type(),
            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
            $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
        ) ) ).' '.$atts['class'];

        $add_to_cart_button = sprintf( '<a rel="nofollow" href="%s" %s %s %s class="%s">%s</a>',
            esc_url( $product->add_to_cart_url() ),
            'data-quantity="' . esc_attr( $atts['qty'] ) .'"',
            'data-product_id="' . esc_attr( $atts['id'] ) .'"',
            'data-product_sku="' . esc_attr( $product->get_sku() ) .'"',
            esc_attr( isset( $classes ) ? $classes : 'button' ),
            esc_html( empty( esc_attr( $atts['text'] ) ) ? $product->add_to_cart_text() : esc_attr( $atts['text'] ) )
        );

        return $add_to_cart_button;
    }
    add_shortcode('ajax_add_to_cart', 'custom_ajax_add_to_cart_button');
}

add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 4; // 3 products per row
    }
}


     function woocommerce_catalog_ordering() {
        if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
            return;
        }
        $orderby                 = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) ); // WPCS: sanitization ok, input var ok, CSRF ok.
        $show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        $catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
            'menu_order' => __( 'Default sorting', 'woocommerce' ),
            'popularity' => __( 'Sort by popularity', 'woocommerce' ),
            'rating'     => __( 'Sort by average rating', 'woocommerce' ),
            'date'       => __( 'Sort by newness', 'woocommerce' ),
            'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
            'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
        ) );

        if ( wc_get_loop_prop( 'is_search' ) ) {
            $catalog_orderby_options = array_merge( array( 'relevance' => __( 'Relevance', 'woocommerce' ) ), $catalog_orderby_options );
            unset( $catalog_orderby_options['menu_order'] );
            if ( 'menu_order' === $orderby ) {
                $orderby = 'relevance';
            }
        }

        if ( ! $show_default_orderby ) {
            unset( $catalog_orderby_options['menu_order'] );
        }

        if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
            unset( $catalog_orderby_options['rating'] );
        }

        wc_get_template( 'loop/orderby.php', array(
            'catalog_orderby_options' => $catalog_orderby_options,
            'orderby'                 => $orderby,
            'show_default_orderby'    => $show_default_orderby,
        ) );
    }
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10, 0 ); 


if( !function_exists('tvlgiao_wpdance_is_woocommerce') ){
    function tvlgiao_wpdance_is_woocommerce(){
        $_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
        if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
            return false;
        }
        return true;
    }
}


//action cart
add_action( 'tvlgiao_wpdance_header_init_action', 'tvlgiao_wpdance_header_init', 5 );
if(!function_exists ('tvlgiao_wpdance_header_init')){
    function tvlgiao_wpdance_header_init(){

    //var_dump(TVLGIAO_THEME_CUSTOMIZE. "custom-cart.php");die();
        require_once TVLGIAO_THEME_CUSTOMIZE. "mini-cart.php";
    }   
}


add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment_mini' );

     function woocommerce_header_add_to_cart_fragment_mini($fragments) {

    ob_start();
    ?>

  <div class="header-cart header-dropdown">
        <?php 
        global $woocommerce;
                $items = $woocommerce->cart->get_cart();
                foreach($items as $item => $values) { 
                $_product =  wc_get_product( $values['data']->get_id());  
                $getProductDetail = wc_get_product( $values['product_id'] );
                $image = get_the_post_thumbnail_url($values['product_id'], ITEM_PRODUCT_MINICART);
                $quantity = $values['quantity'];
                $price = get_post_meta($values['product_id'] , '_price', true); 
                ?>
                 <ul class="header-cart-wrapitem">
                <li class="header-cart-item">
                    <div class="header-cart-item-img">
                        <img src="<?=$image ?>" alt="IMG">
                    </div> 
                   
                    <div class="header-cart-item-txt">
                        <a href="<?= get_permalink($values['product_id']) ?>" class="header-cart-item-name">
                            <?= $_product->get_title() ?>
                        </a>
                     <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove remove_mini_cart" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $item ) ), esc_html__( 'Remove this item', 'wpdance' ) ), $item ); ?>

                        <span class="header-cart-item-info">
                            <?=$quantity ?> x <?= number_format($price) ?>đ
                        </span>
                    </div>
                </li>
            </ul>
            <?php } ?>
            <div class="header-cart-total">
                Tổng: <?=$woocommerce->cart->get_cart_total();?>
            </div>

            <div class="header-cart-buttons">
                <div class="header-cart-wrapbtn">
                    <!-- Button -->
                    <a href="/custom-checkout/" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                        Giỏ hàng
                    </a>
                </div>

                <div class="header-cart-wrapbtn">
                    <!-- Button -->
                    <a href="/cart-custom/" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                        Thanh toán
                    </a>
                </div>
            </div>
        </div>
   
    <?php $fragments['div.header-cart'] = ob_get_clean();

    return $fragments;

} 


//up date cart count
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <span class="header-icons-noti" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo  $woocommerce->cart->cart_contents_count; ?></span>
    <?php
    $fragments['span.header-icons-noti'] = ob_get_clean();
    return $fragments;
} 
