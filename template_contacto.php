<?php
/**
Template name: Página Contacto
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>

<?php include 'templates-parts/i_banner_interna_contacto.php' ?>

<section id="programas" class="seccion-pagina bg-celeste-bajo">
	<div class="container wow fadeInUp" data-wow-delay=".75s">
		<div class="row">
			<?php if (have_rows('bloque_programa')): ?>
			    <?php while ( have_rows('bloque_programa') ) : the_row(); ?>
					<div class="contenido col-md-7 mb-5">
						<h2 class="titulo-seccion no-dot"><?php the_sub_field('titulo') ?></h2>					
					</div>

					<div class="items-opciones col-md-7">
						<div class="row">
							<?php if (have_rows('items')): ?>
								<?php while ( have_rows('items') ) : the_row(); ?>
									<div class="item-programas col-lg-6 col-md-6 mb-5">
										<h4 class="color-morado"><?php the_sub_field('titulo') ?></h4>
										<a class="color-black" href="mailto:<?php the_sub_field('bajada') ?>" style="font-weight: 600"><?php the_sub_field('bajada') ?></a>
									</div>
								<?php endwhile;?>
							<?php endif ?>								
						</div>
					</div>
					<style type="text/css">section#programas {background-image: url(<?php the_sub_field('background'); ?>)}</style>
				<?php endwhile;?>
			<?php endif ?>		
		</div>
	</div>
</section>

<section id="video-interna">
	<div class="wow fadeInUp" data-wow-delay=".75s">
		<?php if (have_rows('video_html')): ?>
		<?php while ( have_rows('video_html') ) : the_row(); ?>
			<video id="videohome" muted autoplay loop playsinline poster="<?php the_sub_field('poster') ?>">
	            <source src="<?php the_sub_field('video_mp4') ?>" type="video/mp4">
	            <source src="<?php the_sub_field('video_webm') ?>" type="video/webm">
	            <source src="<?php the_sub_field('video_ogv') ?>" type="video/ogg">
	         Tu navegador no soporta HTML5 Video
	        </video>	
		<?php endwhile;?>
	<?php endif ?>
	</div>
</section>

<?php include 'templates-parts/i_novedades.php' ?>

<?php get_footer(); ?>