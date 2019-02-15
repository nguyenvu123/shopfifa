<?php
/* Template Name: Contact
*/ 
get_header(); 
?>
<div class="container contact-form">
	<h1>Liên hệ</h1>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div>
		<?php the_content(); ?>
	</div>
<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>