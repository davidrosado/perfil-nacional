<?php
/**
Template name: Página Taller Global
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>

<?php include 'templates-parts/i_banner_taller_global.php' ?>

<section id="contenido-principal" class="seccion-pagina">
	<div class="container wow fadeInUp" data-wow-delay="1s">
		<div class="row justify-content-center">
			<div class="contenido col-md-10">
				
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>						
			</div>
		</div>

		<div id="rutas-internacionales" class="row justify-content-center mt-5">		
			<?php if (have_rows('bloque_ruta_internacional')): ?>
			    <?php while ( have_rows('bloque_ruta_internacional') ) : the_row(); ?>
					<div class="contenido col-md-12 mb-5">
						<h3 class="subtitulo-seccion text-center">
							<?php the_sub_field('titulo') ?>
						</h3>					
					</div>

					<?php if (have_rows('items')): ?>
						<?php while ( have_rows('items') ) : the_row(); ?>
							<div class="item-rutas col-md-3 col-sm-6 text-center">
								<h4 class="numero-paso has-dot"><?php the_sub_field('titulo') ?></h4>
								<div class="inferior-paso">
									<img class="mb-3" src="<?php the_sub_field('imagen') ?>">
									<p><?php the_sub_field('bajada') ?></p>
								</div>
							</div>
						<?php endwhile;?>
					<?php endif ?>
				<?php endwhile;?>
			<?php endif ?>	
		</div>		
	</div>
</section>
<?php if (have_rows('bloque_parallax')): ?>
    <?php while ( have_rows('bloque_parallax') ) : the_row(); ?>
		<section class="bloque-parallax d-flex align-items-center" style="background-image: url('<?php the_sub_field('background'); ?>');">
			<div class="container">
				<div class="row">
					<div class="texto-banner col-md-4">
						<?php the_sub_field('texto_parallax'); ?>
					</div>					
				</div>
			</div>
		</section>
	<?php endwhile;?>
<?php endif ?>	
<section id="como-inscribo" class="seccion-pagina bg-celeste-bajo">
	<div class="container-fluid wow fadeInUp" data-wow-delay="0.75s">
		<div class="row justify-content-end">
			<?php if (have_rows('bloque_como_inscribo')): ?>
			    <?php while ( have_rows('bloque_como_inscribo') ) : the_row(); ?>
					<div class="contenido col-md-7 mb-5">
						<h3 class="subtitulo-seccion">
							<?php the_sub_field('titulo') ?>
						</h3>					
					</div>

					<div class="items-opciones col-md-7">
						<div class="row">
							<?php if (have_rows('items')): ?>
								<?php while ( have_rows('items') ) : the_row(); ?>
									<div class="item-inicios col-lg-6 col-md-6">
										<h4 class="has-dot color-black"><?php the_sub_field('titulo') ?></h4>
										<p><?php the_sub_field('bajada') ?></p>
									</div>
								<?php endwhile;?>
							<?php endif ?>								
						</div>
					</div>
					<style type="text/css">#como-inscribo {background-image: url(<?php the_sub_field('background'); ?>)}</style>
				<?php endwhile;?>
			<?php endif ?>		
		</div>
	</div>
</section>

<section id="inicios" class="seccion-pagina">
	<div class="container wow fadeInUp" data-wow-delay="0.75s">
		<div class="row justify-content-center">	
			<?php if (have_rows('bloque_inicios')): ?>
			    <?php while ( have_rows('bloque_inicios') ) : the_row(); ?>
					<div class="contenido col-md-12 mb-5">
						<h2 class="titulo-seccion text-center color-black">
							<?php the_sub_field('titulo') ?>
						</h2>					
					</div>

					<?php if (have_rows('items')): ?>
						<?php while ( have_rows('items') ) : the_row(); ?>
							<div class="item-inicios col-6 col-md-3 col-lg-2 text-center">
								<div class="border-item-inicios">
									<h4 class="dia-inicio"><?php the_sub_field('titulo') ?></h4>
									<p class="mes-inicio has-dot"><?php the_sub_field('bajada') ?></p>
								</div>
							</div>
						<?php endwhile;?>
					<?php endif ?>
				<?php endwhile;?>
			<?php endif ?>		
		</div>

		<div class="row mt-5 justify-content-center-center">
			<div class="col text-center"><a class="boton boton-cta" data-toggle="modal" data-target="#modal">PRE-INSCRIBIRME AQUÍ</a></div>			
		</div>	
	</div>
</section>

<?php include 'templates-parts/i_novedades.php' ?>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php echo do_shortcode('[contact-form-7 id="1258" title="Formulario popup programas" html_id="form_contacto"]') ?>
		</div>
	</div>
</div>

<?php $titulo = get_the_title() ?>

<?php get_footer(); ?>