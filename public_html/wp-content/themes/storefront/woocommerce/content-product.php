<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="include-prd">
	


<li <?php wc_product_class(); ?>>
	<?php $image = get_the_post_thumbnail_url($post->ID, ITEM_PRODUCT_HOME); ?>
	<div class="block2">
		<div class="block2-img wrap-pic-w of-hidden pos-relative">
			<img src=" <?= $image?> " alt="IMG-PRODUCT">

			<div class="block2-overlay trans-0-4">
				<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
					<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
					<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
				</a>

				<div class="block2-btn-addcart w-size1 trans-0-4">
					<a href="" class="flex-c-m size1 bo-rad-23s-text1 trans-0-4"><?php echo do_shortcode( "[ajax_add_to_cart id='$post->ID' text='Mua ngay!']" );
					 ?></a>
				</div>
			</div>
		</div>

		<div class="block2-txt p-t-20">
			<a href="<?=get_permalink() ?>" class="block2-name dis-block s-text3 p-b-5">
				<?= $post->post_title; ?>
			</a>
			<p><?=$post->post_excerpt ?></p>
			<?php if ( $product->is_on_sale() ) { ?>
			<span class="block2-oldprice m-text7 p-r-5">
				<?= number_format($product->get_regular_price()); ?> đ
			</span>

			<span class="block2-newprice m-text8 p-r-5">
				<?= number_format($product->get_sale_price()); ?> đ
			</span>
			<?php } else{?>
				<span class="block2-newprice m-text8 p-r-5">
				<?= number_format($product->get_regular_price()) ?> đ
			</span>
			<?php } ?>
		</div>
	</div>
</li>
</div>
