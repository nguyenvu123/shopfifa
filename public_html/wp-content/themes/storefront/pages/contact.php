<?php
/* Template Name: Contact
*/ 
get_header(); 
?>
<div id="main_banner_prd">
	<?php
	 	$image_id = get_field("main_banner","option");;
		$image = wp_get_attachment_image_src( $image_id, 'banner' ); ?>
		<img src="<?=$image[0] ?>">
</div>
<div class="container contact-form">
	<h1>Liên hệ</h1>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div>
		<?php the_content(); ?>
	</div>
<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>