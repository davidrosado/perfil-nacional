<?php
/**
Template name: Nueva Página Programas
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>

<?php include 'templates-parts/i_banner_interna_programas.php' ?>

<section id="contenido-principal" class="seccion-pagina pb-0">
	<div class="container wow fadeInUp" data-wow-delay=".75s">
		<div class="row justify-content-center">
			<div id="sidebar-nosotros" class="sidebar col-12 col-md-5 col-lg-4">
				<div class="titulo-bloque-sidebar d-flex justify-content-between align-items-center">
					<h2 class="titulo-sidebar">Programas</h2>
					<div class="icono-titulo"><img src="<?php echo get_stylesheet_directory_uri()?>/images/icono-titulo-sidebar.png"></div>
				</div>

				

				<div class="contenedor-sidebar">

					<h3 class="titulo-tipo-programa">Virtuales</h3>
					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu( array(
					    'menu'   => 'menu-programas-virtuales',
					    'menu_class' => 'menu-sidebar'
					) );?>		

					<h3 class="titulo-tipo-programa">Presenciales</h3>
					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu( array(
					    'menu'   => 'menu-programas-presenciales',
					    'menu_class' => 'menu-sidebar'
					) );?>										
				</div>

				<div class="text-center">
					<img class="mt-5" src="<?php echo get_stylesheet_directory_uri()?>/images/arrow-down-sidebar.png">
				</div>
			</div>

			<div class="contenido col-11 col-md-7 col-lg-7 offset-lg-1">
				<div class="breadcrumb-pagina pt-3 mb-5">
					<a href="<?php bloginfo('url') ?>">Home</a> <span>/</span> Programas <span>/</span> <?= get_the_title($post->post_parent) ?> <span>/</span> <?php if (get_field('titulo_personalizado')): ?> <?php the_field('titulo_personalizado') ?>
					<?php else: ?> <?php the_title() ?> <?php endif ?>
				</div>
				<h2 class="titulo-seccion titulo-personalizado">
					<?php if (get_field('titulo_personalizado')): ?>
						<?php the_field('titulo_personalizado') ?>
					<?php else: ?>
						<?php the_title() ?>
					<?php endif ?>
				</h2>

				<div class="texto-contenido col-md-12 padding-0">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; // end of the loop. ?>							
				</div>

				<div id="acordeon-faq" class="col-md-12 my-3" style="display: inline;">
					<?php $a=0; if (have_rows('items')): ?>
						<?php while ( have_rows('items') ) : the_row(); $a++ ?>
							  <div id="card-<?php echo $a ?>" class="card mb-3">
							    <div class="card-header" id="heading<?php echo $a ?>">
							      <h5 class="mb-0">
							        <button class="btn btn-link <?php if ($a!==1): ?>collapsed<?php endif ?>" data-toggle="collapse" data-target="#collapse<?php echo $a ?>" aria-expanded="<?php if ($a==1): ?> true <?php else: ?>false<?php endif ?>" aria-controls="collapse<?php echo $a ?>"><span class="numero-faq"><?php echo $a ?></span> <?php the_sub_field('titulo') ?></button>
							      </h5>
							    </div>

							    <div id="collapse<?php echo $a ?>" class="collapse <?php if ($a==1): ?> show <?php endif ?>" aria-labelledby="heading<?php echo $a ?>" data-parent="#acordeon-faq">
							      <div class="card-body bg-celeste-bajo">
							      	<?php the_sub_field('bajada') ?>
							    </div>
							  </div>
							</div>
						<?php endwhile;?>
					<?php endif ?>				
				</div>								

				<?php 
					$imagenbrochure = get_field('imagen_brochure');
					$pdfbrochure = get_field('pdf_brochure');
				?>

				<?php if ($imagenbrochure): ?>
					<div id="brochure-programa" class="col-md-12 brochure">
						<div class="row justify-content-between py-3 px-3 bg-celeste-bajo align-items-center" style="border-radius: 10px;">
							<div class="imagen-brochure col-md-5 pl-0"><img src="<?php echo $imagenbrochure ?>"></div>
							<div class="enlace-brochure col-md-7 pr-0"><a href="<?php echo $pdfbrochure['url']; ?>" class="color-morado" target="_blank" style="text-decoration: underline;"><?php //echo $pdfbrochure['filename']; ?> Descargar brochure</a></div>
						</div>
					</div>					
				<?php endif ?>
			</div>
		</div>
	</div>
</section>

<?php if (have_rows('bloque_pasos')): ?>
	<section id="pasos-programas">
		<div class="container wow fadeInUp" data-wow-delay=".75s">
			<div id="rutas-internacionales" class="row justify-content-center mt-5">					
			    <?php while ( have_rows('bloque_pasos') ) : the_row(); ?>
					<div class="contenido col-md-10 mb-5">
						<h3 class="subtitulo-seccion text-center">
							<?php the_sub_field('titulo') ?>
						</h3>					
					</div>

					<div class="col-md-10">
						<div class="row justify-content-center">
							<?php if (have_rows('items')): ?>
								<?php while ( have_rows('items') ) : the_row(); ?>
									<div class="item-rutas col-md-4 col-sm-6 text-center mb-5">
										<h4 class="numero-paso has-dot"><?php the_sub_field('titulo') ?></h4>
										<div class="inferior-paso">
											<img class="mb-3" src="<?php the_sub_field('imagen') ?>">
											<p><?php the_sub_field('bajada') ?></p>
										</div>
									</div>
								<?php endwhile;?>
							<?php endif ?>							
						</div>
					</div>
				<?php endwhile;?>
			
			</div>			
		</div>		
	</section>
<?php endif ?>	

<section class="seccion-menor">
	<hr class="mb-5">
	<div class="col text-center"><a id="open-modal-programa" class="boton boton-cta" data-toggle="modal" data-target="#modal">MÁS INFORMACIÓN</a></div>
</section>

<section id="banner">
	<div class="container wow fadeInUp" data-wow-delay=".45s">
		<div class="row">
			<div class="col-md-12 slider-home slider-programa">
				<?php 
					$b = 0;
					if (have_rows('banner')): ?>
					    <?php while ( have_rows('banner') ) : the_row(); $b++ ?>
							<?php 
							$image = get_sub_field('imagen');?>
							<?php if( !empty($image)): ?>
								<?php if( have_rows('texto_banner') ): ?>
								    <?php while ( have_rows('texto_banner') ) : the_row();
								    	$titulo = get_sub_field('titulo');
								    	$bajada = get_sub_field('bajada');
								    	$texto_cta = get_sub_field('texto_cta');
								    	$target_url = get_sub_field('target_url');
								    	$url_cta = get_sub_field('url_cta');
								    	?>

							            <?php if ($titulo): ?>
							            	<div>
							            		<img class="banner-con-texto" src="<?php echo $image ;?>">
									            <div class="texto-banner texto-banner-home">
									            	<div class="container">
									            		<div class="row flex-column">
									            			<div class="col-md-6 col-lg-6 offset-lg-1 offset-md-1">
												            	<h2 class="titulo-banner"><?php echo $titulo; ?></h2>
												            	<p class="bajada-banner"><?php echo $bajada; ?></p>
									            			</div>
									            		</div>
									            	</div>					            	
									            </div>  				            		
							            	</div>          	
							            <?php endif ?>
								    <?php endwhile;?>		
								<?php else :?>
									<div><img src="<?php echo $image ;?>"></div>
								<?php endif ?>				
							<?php endif; ?>

							<?php if (have_rows('video_html')): ?>
								<?php while ( have_rows('video_html') ) : the_row(); ?>
									<div>
										<video id="videofacultad" class="video-banner-home" muted autoplay loop playsinline poster="<?php the_sub_field('poster') ?>">
								            <source src="<?php the_sub_field('video_mp4') ?>" type="video/mp4">
								            <source src="<?php the_sub_field('video_webm') ?>" type="video/webm">
								            <source src="<?php the_sub_field('video_ogv') ?>" type="video/ogg">
								         Tu navegador no soporta HTML5 Video
								        </video>									
									</div>
								<?php endwhile;?>
							<?php endif ?>

						<?php endwhile;?>
				<?php endif ?>					
			</div>
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


<?php if (get_field('titulo_personalizado')): ?>
	<?php $titulo = get_field('titulo_personalizado') ?>
<?php else: ?>
	<?php $titulo = get_the_title() ?>
<?php endif ?>



<script type="text/javascript">
	$('#open-modal-programa').click(function() {
		$programa = '<?php echo $titulo ?>'
		console.log($programa)
		$('#form_contacto #programa').val($programa)		
	})
</script>

<?php get_footer(); ?>