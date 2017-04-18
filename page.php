<?php get_header(); ?>
<div class="main" id="">
<section class="single-page section">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $ID=get_the_ID();
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
?>
	<main class="container">
		<h1 class="title"><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</main>
<?php endwhile; else: ?>
	<?php _e('Perdon no encontramos lo que buscas.', 'cademonline'); ?>
<?php endif; ?>
</section>
<script type="text/javascript">
$(function() {
	$.each($('ol#menu-navegacion-1 li a'), function (key, data) {
		var $href=$(this).attr('href');
		console.log($href);
		if (/#/i.test($href)){
			$nhref=$blogurl+$href;
			$(this).attr('href',$nhref);
		}
	});
});
</script>
</div>
<?php get_footer(); ?> 