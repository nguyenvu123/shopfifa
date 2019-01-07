<?php /* Template Name: Home
*/ 
?>

<?php get_header(); 

?>
	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
			<?php if( have_rows('home_banner') ):
		    	while ( have_rows('home_banner') ) : the_row();
		    	$image = get_sub_field("image");
		    	$title = get_sub_field("title");
     		?>
				<div class="item-slick1 item1-slick1" style="background-image: url('<?=$image["url"] ?>');">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
							<?= get_sub_field("title") ?>
						</h2>

						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown">
							<?= get_sub_field("sub_title") ?>
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="tel:+0332751221" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Gọi ngay!
							</a>
						</div>
					</div>
				</div>

			
			<?php  endwhile; endif; ?>

			</div>
		</div>
	</section>
	<!-- Our product -->
	<section class="bgwhite p-t-45 p-b-58">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					Our Products
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#featured" role="tab">Acc ngon!</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Sale</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-35">
					<!-- - -->
			
				
					<!-- - -->
					<div class="tab-pane fade fade show active" id="featured" role="tabpanel">
						<div class="row">
					<?php
					$args = array(
						'post_type' => 'product',
						'posts_per_page' => -1,
						'product_cat' => 'top',
					);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) :
						while ( $loop->have_posts() ) : $loop->the_post();
							$image = get_the_post_thumbnail_url($post->ID, ITEM_PRODUCT_HOME);
						 ?>
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
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
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											<?= $product->name ?>
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
							</div>
							<?php endwhile; endif; ?>
						</div>
					</div>

					<!--  -->
					<div class="tab-pane fade" id="sale" role="tabpanel">
						<div class="row">

						<?php $args = array(
						'post_type' => 'product',
						'posts_per_page' => -1,
						
					);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) :
						while ( $loop->have_posts() ) : $loop->the_post();
							if($product->is_on_sale()):
								$image = get_the_post_thumbnail_url($post->ID, ITEM_PRODUCT_HOME);
								
						?>


							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
										<img src=" <?=$image ?> " alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<a href="" class="flex-c-m size1 bo-rad-23 s-text1 trans-0-4"><?php echo do_shortcode( "[ajax_add_to_cart id='$post->ID' text='Mua ngay!']" );
												 ?></a>
												
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											<?=$product->name; ?>
										</a>

										<span class="block2-price m-text6 p-r-5">
											<?= number_format($product->get_regular_price()) ?> đ
										</span>
										<span class="block2-newprice m-text8 p-r-5">
											<?= number_format($product->get_sale_price()) ?> đ
										</span>
									</div>
								</div>
							</div>


							<?php endif; endwhile; 
								wp_reset_postdata(); 
						endif; ?>


						</div>
					</div>

					<!--  -->
				
				</div>
			</div>
			<a href="#">XEM TẤT CẢ</a>
		</div> 
	</section>

	<!-- Banner video -->
	<section class="parallax0 parallax100" style="background-image: url(<?= get_field("image_for_video") ?>);">
		<div class="overlay0 p-t-190 p-b-200">
			<div class="flex-col-c-m p-l-15 p-r-15">
				<span class="m-text9 p-t-45 fs-20-sm">
					The Beauty
				</span>

				<h3 class="l-text1 fs-35-sm">
					Lookbook
				</h3>

				<span class="btn-play s-text4 hov5 cs-pointer p-t-25" data-toggle="modal" data-target="#modal-video-01">
					<i class="fa fa-play" aria-hidden="true"></i>
					Play Video
				</span>
			</div>
		</div>
	</section>

<?php get_footer();