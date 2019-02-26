
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Accfifa.vn</title> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.png" />
	<link rel="stylesheet" type="text/css" href="wp-content/themes/storefront/assets/vendor/slick/slick.css">
	<?php wp_head(); ?>
</head>
<body class="<?php body_class(); ?>">
	<?php 
		$user = wp_get_current_user();
		global $woocommerce;
	?>
	<!-- header fixed -->
	<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<h1>
			<a href="/" class="logo">
				<img src="<?= get_field("logo","option") ?>" alt="accfifa">
			</a>
		</h1>
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
			<a href="/my-account" class="header-wrapicon1 dis-block">
				<img src="<?= get_field("avata","option") ?>" class="header-icon1" alt="accfifa">
			</a>

			<span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<img src="<?= get_field("cat_image","option") ?>" class="header-icon1 js-show-header-dropdown" alt="accfifa">
				<span class="header-icons-noti">0</span>

				<!-- Header cart noti -->
					<div class="header-cart header-dropdown">	
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
					<div class="login-face">
					<?php
    					$code = '[nextend_social_login]';
    					echo do_shortcode($code); ?>
					</div>
				</div>

				<!-- Logo2 -->
				<h1>
					<a href="/" class="logo2">
						<img src="<?= get_field("logo","option") ?>" alt="accfifa">
					</a>
				</h1>
				<div class="topbar-child2">
					<div class=phone>
						<img src="<?= get_field("icon_phone","option") ?>">
						<a href="tel:<?= get_field("phone_number","option") ?>">Phone: <?= get_field("phone_number","option") ?></a>
						
					</div>
						<span class="topbar-email">
						<?php if($user->user_email){ ?>
						
						   <a href="/my-account"><?=$user->user_login ?></a>
						<?php }
						else{

						   ?>
						   <span><a href="/my-account">Tài khoản</a></span>
						<?php } ?>
						
					</span>
					<a href="/my-account" class="header-wrapicon1 dis-block m-l-30">
						<img src="<?= get_field("avata","option") ?>" class="header-icon1" alt="accfifa">
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
			
			<a href="/" class="logo-mobile">
				<img src="<?= get_field("logo","option") ?>" alt="accfifa">
			</a>
			<div class=phone>
				<img src="<?= get_field("icon_phone","option") ?>">
				<a href="tel:<?= get_field("phone_number","option") ?>"><?= get_field("phone_number","option") ?></a>		
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
	                <div class="login-face">
					<?php
    					$code = '[nextend_social_login]';
    					echo do_shortcode($code); ?>
					</div>
					<a href="/my-account" class="header-wrapicon1 dis-block">
						<img src="<?= get_field("avata","option") ?>" class="header-icon1" alt="accfifa">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="<?= get_field("cat_image","option") ?>" class="header-icon1 js-show-header-dropdown" alt="accfifa">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti mobilevuvu-->
					<div class="header-cart header-dropdown">
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
