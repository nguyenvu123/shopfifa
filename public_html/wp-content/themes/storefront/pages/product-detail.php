<?php /* Template Name: Product detail
*/ 
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="container">
	<?php the_content(); ?>
</div>

<?php get_footer(); ?>