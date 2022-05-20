<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>

<section id="banner" class="banner-interno">
	<img src="<?php the_field('banner_post_blog','option'); ?>" class="img-responsive">
    <div class="texto-banner text-center">
    	<h1 class="titulo-banner"><span class="bg-green">404</span></h1>
    </div>
</section>

<?php /*
<section id="contenido" class="contenido-pagina seccion-site bg-gris">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 text-center">
				<?php 
					if (have_posts()) : while (have_posts()) : the_post(); ?>
			        	<?php the_content(); ?>		
					<?php endwhile; ?>		
				<?php endif; wp_reset_postdata(); ?>  					
			</div>
		</div>		
	</div>
</section> */?>

<?php include 'templates-parts/inscripcion.php' ?>

<?php include 'templates-parts/actividades.php' ?>

<?php include 'templates-parts/blog.php' ?>

<?php get_footer(); ?>