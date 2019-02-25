<?php /* Template Name: Home
*/ 
?>

<?php get_header(); 

?>
	<!-- Slide1 -->
		<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="w-full wrap-pic-w op-0-0"><img src="wp-content/themes/storefront/assets/images//icons/video-16-9.jpg" alt="IMG"></div>
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/<?=get_field("code_video")?>?rel=0&amp;showinfo=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
			<?php if( have_rows('home_banner') ):
		    	while ( have_rows('home_banner') ) : the_row();
		    	$image_id = get_sub_field("image");
		    	$image = wp_get_attachment_image_src( $image_id, 'banner' );
		    	$title = get_sub_field("title");
     		?>
			<!-- 	<div class="item-slick1 item1-slick1" style="background-image: url('<?=$image[0] ?>');">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					</div>
				</div> -->
				<div class="item-slick1 item1-slick1" style="background-image: url('<?=$image[0] ?>')">
					<div class="container include-banner">
						<div class="content-banner container">
						<?= get_sub_field("content_banner"); ?>
					</div>
					</div>
					
				</div>

			
			<?php  endwhile; endif; ?>

			</div>
		</div>
	</section>
	<!-- Our product -->
	<section class="bgwhite p-t-45 p-b-58 homepage">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					<p>LỌC ACC THEO GIÁ</p>
					
				</h3>
				<div class="loc">
					<!-- <form action="<?php echo get_template_directory_uri() ?>/filter.php" method="get"> -->
						<select name="filler" id="filler" >
					  		<option value="">Tìm theo giá</option>
		                    <option value="50000-100000">Acc 50k - 100k</option>
		                    <option value="100000-300000">Acc 100k - 300k</option>
		                    <option value="300000-500000">Acc 300k - 500k</option>
		                    <option value="500000-1000000">Acc 500k - 1 triệu</option>
		                  	<option value="1000000">trên 1 triệu</option>
						</select>
						<input class="filter_price_submit" type="submit" name="add" value="Tìm kiếm" />
				<!-- 	</form> -->
				</div>
				
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<div class="tab-content p-t-35">
					<div class="tab-pane fade fade show active" id="featured" role="tabpanel">
						<div class="row ketqua">
					<?php
					$price_filter =  $_GET['price'];
					 $price_array  = explode('-', $price_filter);

					$args = array(
						'post_type' => 'product',
						'posts_per_page' => -1,
					);
				
					if($price_array[0]==1000000){
						$args['meta_query'] = array(
				            array(
				                'key' => '_price',
				                'value' => $price_array[1],
				                'compare' => '<='
				            )
				        );
					}
					if($price_array[0] && $price_array[1] ){
						$args['meta_query'] = array(
				            array(
				                'key' => '_price',
					            'value' => array($price_array[0] , $price_array[1] ),
					            'compare' => 'BETWEEN',
					            'type' => 'NUMERIC'
				            )
				        );
					}
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) :
						while ( $loop->have_posts() ) : $loop->the_post();
							$image = get_the_post_thumbnail_url($post->ID, ITEM_PRODUCT_HOME);
						 ?>
						 <?php if( $product->is_in_stock()): ?>
						 
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
										<a href="<?=get_permalink() ?>" class="block2-name dis-block s-text3 p-b-5">
											<?= $post->post_title ?>
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
							<?php endif; endwhile; endif; ?>
						</div>
					</div>

					<!--  -->
			

					<!--  -->
				
				</div>
			</div>
			
		</div> 
	</section>

	<!-- Banner video -->
<!-- 	<section class="parallax0 parallax100" style="background-image: url(<?= get_field("image_for_video") ?>);">
		<div class="overlay0 p-t-190 p-b-200">
			<div class="flex-col-c-m p-l-15 p-r-15">
				<span class="m-text9 p-t-45 fs-20-sm">
					<?= get_field("title_video_1") ?>
				</span>

				<h3 class="l-text1 fs-35-sm">
					<?= get_field("title_video_2") ?>
				</h3>

				<span class="btn-play s-text4 hov5 cs-pointer p-t-25" data-toggle="modal" data-target="#modal-video-01">
					<i class="fa fa-play" aria-hidden="true"></i>
					<?= get_field("title_video_3") ?>
				</span>
			</div>
		</div>
	</section> -->
<!-- Container Selection1 -->
	<script type="text/javascript">
			 $(document).on('each', '.block2-btn-addcart', function(){
  			 // $('.block2-btn-addcart').each(function(){
  			
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            // $(document).on('click', l, function(){
              $(this).on('click', function(){
                swal(nameProduct, "is added to cart !", "success");   
            });
        });	 

        $('.block2-btn-addwishlist').each(function(){
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");
            });
        });
        $('.parallax100').parallax100();

        $(".filter_price_submit").click(function(){
        	var price  = $("#filler").val();
        	
        	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        	  var data = {
            'action': 'fitler_price',
            'price': price
        	};
          jQuery.post( ajaxurl, data, function( response ) {
          	if(response!=''){
          		jQuery( '.ketqua' ).html( response );
          	}
          })
        });
        </script>
<?php get_footer();