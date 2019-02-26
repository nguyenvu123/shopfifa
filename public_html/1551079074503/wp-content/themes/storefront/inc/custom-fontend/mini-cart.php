	<?php
	function tvlgiao_wpdance_tini_cart($class = ""){
	global $woocommerce;
	ob_start();
	?>

	<div class="header-wrapicon2 m-r-13">
		<img src="<?= get_field("cat_image","option") ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
		<span id="count-cart-items" class="header-icons-noti"></span>

		<!-- Header cart noti -->
		<div class="header-cart header-dropdown">
		</div>
	</div>
<?php 
	$tini_cart = ob_get_clean();
	return $tini_cart;
}

if ( ! function_exists( 'tvlgiao_wpdance_update_tini_cart' ) ) {
	function tvlgiao_wpdance_update_tini_cart() {
		die($_tini_cart_html = tvlgiao_wpdance_tini_cart());
	}
}
/* Support WooCommerce Multilingual */
function tvlgiao_wpdance_tiny_cart_add_ajax_action($actions){
	$actions[] = 'update_tini_cart';
	return $actions;
}

add_action('init', 'tvlgiao_wpdance_tiny_cart_add_filter', 1);
function tvlgiao_wpdance_tiny_cart_add_filter(){
	add_filter( 'wcml_multi_currency_is_ajax', 'tvlgiao_wpdance_tiny_cart_add_ajax_action');
}

add_action('wp_ajax_update_tini_cart', 'tvlgiao_wpdance_update_tini_cart');
add_action('wp_ajax_nopriv_update_tini_cart', 'tvlgiao_wpdance_update_tini_cart');

if ( ! function_exists( 'tvlgiao_wpdance_checkout_product_in_woocommerce' ) ) {
	function tvlgiao_wpdance_checkout_product_in_woocommerce(){
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
			return;
		}
		global $woocommerce;
		?>
			<a class="checkout secondary_button" href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>"><?php esc_html_e( 'Check out', 'wpdance' ); ?></a>
		<?php
	}
}

?>