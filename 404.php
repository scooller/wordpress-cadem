<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 */
get_header(); ?>
<div class="main" id="">
<section class="single-page section">
	<main class="container">
		<h1 class="title">404.</h1>
		<div class="big"><?php _e('Perdon no encontramos lo que buscas.', 'cademonline'); ?><br>
			<small><a href="<?php bloginfo('url'); ?>" target="_top" title="volver al home">Puedes volver al sitio principal aquí</a></small>
		</div>
	</main>
</section>
</div>
<?php get_footer(); ?> 