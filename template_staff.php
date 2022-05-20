<?php
/**
Template name: Página Staff
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>

<?php include 'templates-parts/i_banner_interna_nosotros.php' ?>

<section id="contenido-principal" class="seccion-pagina pb-0">
	<div class="container wow fadeInUp" data-wow-delay="1s">
		<div class="row justify-content-between">
			<div id="sidebar-nosotros" class="sidebar col-12 col-md-5 col-lg-4">
				<div class="titulo-bloque-sidebar d-flex justify-content-between align-items-center">
					<h2 class="titulo-sidebar">Nosotros</h2>
					<div class="icono-titulo"><img src="<?php echo get_stylesheet_directory_uri()?>/images/icono-titulo-sidebar.png"></div>
				</div>

				<div class="contenedor-sidebar">
					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu( array(
					    'menu'   => 'menu-nosotros',
					    'menu_class' => 'menu-sidebar'
					) );?>						
				</div>

				<div class="text-center">
					<img class="mt-5" src="<?php echo get_stylesheet_directory_uri()?>/images/arrow-down-sidebar.png">
				</div>
			</div>

			<div class="contenido col-11 col-md-7 col-lg-7 offset-lg-1">
				<div class="breadcrumb-pagina pt-3 mb-5">
					<a href="<?php bloginfo('url') ?>">Home</a> <span>/</span> Nosotros <span>/</span> <?php if (get_field('titulo_personalizado')): ?>
						<?php the_field('titulo_personalizado') ?>
					<?php else: ?>
						<?php the_title() ?>
					<?php endif ?>
				</div>

				<h2 class="titulo-seccion titulo-personalizado">
					<?php if (get_field('titulo_personalizado')): ?>
						<?php the_field('titulo_personalizado') ?>
					<?php else: ?>
						<?php the_title() ?>
					<?php endif ?>
				</h2>
				
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>		

				<?php if (have_rows('items')): ?>
					<?php while ( have_rows('items') ) : the_row(); 
						$imagen = get_sub_field('imagen');
						$titulo = get_sub_field('titulo');
						$cargo = get_sub_field('cargo');
						$bajada = get_sub_field('bajada');
						?>
						<div class="item-staff my-3 row flex-column">
							<div class="top-item d-flex flex-wrap align-items-center">
								<figure class="imagen-item col-md-4">
									<img src="<?php echo $imagen ?>">
								</figure>
								<div class="col-md-8">
									<h3 class="titulo-item-staff"><?php echo $titulo ?></h3>
									<p class="cargo"><?php echo $cargo ?></p>
								</div>								
							</div>	
							<?php if ($bajada): ?>
								<div class="col-12 bajada-item">
									<?php echo $bajada ?>
								</div>
							<?php endif ?>	
						</div>	
					<?php endwhile;?>
				<?php endif ?>					
				</div>				
		</div>
	</div>
</section>

<section id="video-interna">
	<?php if (have_rows('video_html')): ?>
		<?php while ( have_rows('video_html') ) : the_row(); ?>
			<video id="videohome" muted autoplay loop playsinline poster="<?php get_sub_field('poster') ?>">
	            <source src="<?php get_sub_field('video_mp4') ?>" type="video/mp4">
	            <source src="<?php get_sub_field('video_webm') ?>" type="video/webm">
	            <source src="<?php get_sub_field('video_ogv') ?>" type="video/ogg">
	         Tu navegador no soporta HTML5 Video
	        </video>	
		<?php endwhile;?>
	<?php endif ?>
</section>

<?php include 'templates-parts/i_novedades.php' ?>

<?php get_footer(); ?>