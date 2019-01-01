<?php
/**
 * Enqueue scripts and styles.
**/
define('APP_PATH',dirname(__FILE__));
function athena_scripts() {
    // Styles
    // wp_enqueue_style( 'main-style', ASSETS_PATH.'css/main.css', array(), null );

    // Scripts
    wp_enqueue_script( 'main-script', ASSETS_PATH.'js/main.js', array('jquery'), null, true );

    wp_localize_script( 'main-script', 'wp_localize',
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
    add_image_size(ITEM_PRODUCT_HOME,270,360,TRUE);
    
   
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


   