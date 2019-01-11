
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home 02</title> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="wp-content/themes/storefront/assets/vendor/slick/slick.css">
	<?php wp_head(); ?>
</head>
<body class="animsition <?php body_class(); ?>">
	<?php 
		$user = wp_get_current_user();
		global $woocommerce;
	?>
	<!-- header fixed -->
	<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="index.html" class="logo">
			<img src="images/icons/logo.png" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="index.html">Home</a>
						<ul class="sub_menu">
							<li><a href="index.html">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul>
					</li>

					<li>
						<a href="product.html">Shop</a>
					</li>

					<li class="sale-noti">
						<a href="product.html">Sale</a>
					</li>

					<li>
						<a href="cart.html">Features</a>
					</li>

					<li>
						<a href="blog.html">Blog</a>
					</li>

					<li>
						<a href="about.html">About</a>
					</li>

					<li>
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>

		<!-- Header Icon -->
		<div class="header-icons">
			<a href="/my-account" class="header-wrapicon1 dis-block">
				<img src="<?= get_field("avata","option") ?>" class="header-icon1" alt="ICON">
			</a>

			<span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<img src="<?= get_field("cat_image","option") ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti">0</span>

				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="images/item-cart-01.jpg" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									White Shirt With Pleat Detail Back 111
								</a>

								<span class="header-cart-item-info">
									1 x $19.00
								</span>
							</div>
						</li>

					

						
					</ul>

					<div class="header-cart-total">
						Total: $75.00
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Check Out
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- top noti -->
		<div class="flex-c-m size22 bg0 s-text21 pos-relative">
		<?= get_field("title-sale-of","option"); ?>
		<a href="<?= get_field("link_shop","option"); ?>" class="s-text22 hov6 p-l-5">
			<?=get_field("title-banner-sale","option") ?>
		</a>

		<button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
			<i class="fa fa-remove fs-13" aria-hidden="true"></i>
		</button>
	</div>

	<!-- Header -->
	<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">
				<div class="topbar-social">
					<a href="<?= get_field("link_facebook","option"); ?>" class="topbar-social-item fa fa-facebook"></a>
					<a href="<?= get_field("link_youtobe","option"); ?>" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<!-- Logo2 -->
				<a href="index.html" class="logo2">
					<img src="<?= get_field("logo","option") ?>" alt="IMG-LOGO">
				</a>

				<div class="topbar-child2">
						<span class="topbar-email">
						<?php if($user->user_email){ ?>
						
						   <a href="/my-account"><?=$user->user_login ?></a>
						<?php }
						else{

						   ?>
						   <span><a href="/my-account">Tài khoản</a></span>
						<?php } ?>
						
					</span>

					

					<!--  -->
					<a href="/my-account" class="header-wrapicon1 dis-block m-l-30">
						<img src="<?= get_field("avata","option") ?>" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>



					<?php do_action('tvlgiao_wpdance_header_init_action');  ?>






				</div>
			</div>

			<div class="wrap_header">

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
					<?php 
                	wp_nav_menu( array(
                    	'menu' =>'main_menu',
                    	'menu_class'=> 'main_menu',
                		) )
            		?>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">

				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="<?= get_field("logo","option") ?>" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="/my-account" class="header-wrapicon1 dis-block">
						<img src="<?= get_field("avata","option") ?>" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="<?= get_field("cat_image","option") ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<?php global $woocommerce;
    							$items = $woocommerce->cart->get_cart();
    							foreach($items as $item => $values) { 
            					$_product =  wc_get_product( $values['data']->get_id()); 
            					$getProductDetail = wc_get_product( $values['product_id'] );
            					$image = get_the_post_thumbnail_url($values['product_id'], ITEM_PRODUCT_MINICART);
            					$quantity = $values['quantity'];
            					$price = get_post_meta($values['product_id'] , '_price', true);
            					
            					
     							?>
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?=$image  ?>" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="<?= get_permalink() ?>" class="header-cart-item-name">
											<?= $_product->get_title() ?>
										</a>

										<span class="header-cart-item-info">
											<?=$quantity ?> x <?= $price ?>đ
										</span>
									</div>
								</li>


								<?php } ?>


							</ul>

							<div class="header-cart-total">
								Total: <?=$woocommerce->cart->get_cart_total();?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<?php 
                wp_nav_menu( array(
                    'menu' =>'main_menu',
                    'menu_class'=> 'main-menu',
                ) )
            ?>
			</nav>
		</div>
		<?php global $product; ?>
	</header>
