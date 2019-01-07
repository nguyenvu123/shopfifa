<?php /* Template Name: shop
*/ 
?>
<?php get_header(); 

?>

<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/heading-pages-02.jpg);">
	<h2 class="l-text2 t-center">
		Women
	</h2>
	<p class="m-text13 t-center">
		New Arrivals Women Collection 2018
	</p>
</section>

<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-8 col-lg-12 p-b-50">
					<!-- Product -->
					<div class="row">


					<?php $args = array(
						'post_type' => 'product',
						'posts_per_page' => -1,
					);
					$loop = new WP_Query( $args );
					do_action( 'woocommerce_before_shop_loop' ); 
					if ( $loop->have_posts() ) :
					
                   
               			 
              
						while ( $loop->have_posts() ) : $loop->the_post();
							$image = get_the_post_thumbnail_url($post->ID, ITEM_PRODUCT_HOME);
						?>


						<div class="col-sm-12 col-md-6 col-lg-3 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="<?=$image?>" alt="IMG-PRODUCT">

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
									<a href="<?= get_permalink() ?>" class="block2-name dis-block s-text3 p-b-5">
										<?= $product->name ?>
									</a>

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
						</div>

					<?php endwhile; endif; ?>

					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>
		</div>
	</section>
<!--  -->

<?php get_footer();