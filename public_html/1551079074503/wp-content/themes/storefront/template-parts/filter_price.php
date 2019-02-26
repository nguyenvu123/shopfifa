<?php
global $post; 
	$price_filter =  $_POST['price'];
	 $price_array  = explode('-', $price_filter);

	$args = array(
		'post_type' => 'product',
		'posts_per_page' => -1,
	);

	if($price_array[0]==1000000){
		$args['meta_query'] = array(
            array(
                'key' => '_price',
	            'value' => array(1000000 , 100000000 ),
	            'compare' => 'BETWEEN',
	            'type' => 'NUMERIC'
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
				global $product; 
				
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
									<a href="" class="flex-c-m size1 bo-rad-23s-text1 trans-0-4">
										<?php echo do_shortcode( "[ajax_add_to_cart id='$post->ID' text='Mua ngay!']" );
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
				<?php endif; ?>
			<?php 
			endwhile;
			 
		endif; 
		?>	
