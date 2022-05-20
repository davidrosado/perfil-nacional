<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="content">

	<section id="contenido" class="seccion-pagina bg-celeste-bajo">
		<div class="container">

			<div class="row top-universidad justify-content-center mb-5" style="border: none">
				<div class="col-md-12 d-flex flex-wrap justify-content-between align-items-center ">
					<div class="col-md-8 col-lg-8">
						<h1 class="titulo-de-banner">Novedades / <?php single_term_title();?></h2>
					</div>
					<div class="col-md-4 col-lg-3 text-right">
						<img src="<?php echo get_stylesheet_directory_uri();?>/images/arrow-right.png">
					</div>				
				</div>
			</div>

			<div class="row">
				<?php if (is_tag()): ?>
					<div class="col-md-12 offset-md-1 text-center">
						<div class="descripcion color-blue">
							<p>Resultados para Tag: <?php single_term_title();?></p>						
						</div>				
					</div>
	        	<?php else: ?>
	        		
	        	<?php endif ?>  				
			</div>		

		    <div class="row justify-content-between">
		    	<div class="col-md-8 px-0">
	                <div id="listado-noticias" class="col-md-12 d-flex flex-wrap justify-content-between">			
						<?php if ( have_posts() ) : ?>
							<?php /*<header class="page-header">
								<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
								?>
							</header><!-- .page-header --> */ ?>

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>
							<?php 
							$terms = get_the_terms( $post->ID , 'category' );
							$facultades = get_the_terms( $post->ID, 'facultad');
							if($terms) {
								foreach( $terms as $term ) {
									//Captura ID de cada term o categoría
									$term_name = $term->name;
									$term_slug = $term->slug;
									$term_url = get_term_link($term->slug, 'category');
									$term_id = $term->term_id;
								}
							};
							if($facultades) {
								foreach( $facultades as $term2 ) {
									//Captura ID de cada term o categoría
									$facultad_name = $term2->name;
									$facultad_slug = $term2->slug;
									$facultad_url = get_term_link($term2->slug, 'facultad');
								}
							}

							?>								
								<div class="item-blog col-md-6 mb-4 item-<?php echo $term_slug ?> <?php if ($term_slug != 'eventos' && $term_slug != 'noticias'): ?>item-eventos<?php endif ?>">
									<?php $categoria = $term_slug ?>
									<?php if ($categoria == 'noticias'): ?>
										<div class="contenedor-item d-flex flex-wrap bg-white flex-column">
											<figure class="imagen-item mb-0">
												<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('large'); ?></a>
											</figure>
											<div class="resumen-item py-3 px-3">
												<div class="meta-item meta-novedad">
													<?php /*<p class="fecha mb-0"><?php echo get_the_date() ?></p>*/?>
													<div class="fecha-novedades text-center">
														<span class="dia-fecha"><?php the_time( 'j'); ?></span>
														<span class="mes-fecha"><?php the_time( 'M'); ?></span>
													</div>
													<h4 class="titulo-categoria-novedades"><a class="categoria-item-" href="<?php echo $term_url ?>"><?php echo $term_name ?></a></h4>
												</div>		
												<h3 class="titulo-item"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>		
												<div class="cta-item mt-3">
													<a class="boton-cta" href="<?php the_permalink() ?>">VER MÁS ></a>
												</div>					
											</div>
										</div>		
									<?php endif ?>
									<?php if ($categoria == 'eventos'): ?>
										<div class="contenedor-item d-flex flex-wrap bg-white flex-column">
											<figure class="imagen-item mb-0">
												<?php the_post_thumbnail('large'); ?>  
											</figure>
											<div class="resumen-item py-3 px-3">
												<div class="meta-item meta-novedad">
													<?php /*<p class="fecha mb-0"><?php echo get_the_date() ?></p>*/?>
													<div class="fecha-novedades text-center">
														<span class="dia-fecha"><?php the_time( 'j'); ?></span>
														<span class="mes-fecha"><?php the_time( 'M'); ?></span>
													</div>
													<h4 class="titulo-categoria-novedades"><a class="categoria-item-" href="<?php echo $term_url ?>"><?php echo $term_name ?></a></h4>
												</div>		
												<h3 class="titulo-item"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>		
												<div class="cta-item mt-3">
													<a class="boton-cta" href="<?php the_permalink() ?>">VER MÁS ></a>
												</div>					
											</div>
										</div>	
									<?php endif ?>
									<?php if ($categoria !== 'eventos' && $categoria !== 'noticias'): ?>
										<div class="contenedor-item d-flex flex-wrap bg-white flex-column">
											<figure class="imagen-item mb-0">
												<?php the_post_thumbnail('large'); ?>  
												<div class="tag-item"><span>Actividad Virtual</span></div>
											</figure>
											<div class="resumen-item py-3 px-3">
												<div class="meta-item meta-novedad">
													<?php /*<p class="fecha mb-0"><?php echo get_the_date() ?></p>*/?>
													<div class="fecha-novedades text-center">
														<span class="dia-fecha"><?php the_time( 'j'); ?></span>
														<span class="mes-fecha"><?php the_time( 'M'); ?></span>
													</div>
													<h4 class="titulo-categoria-novedades"><a class="categoria-item-" href="<?php echo $term_url ?>"><?php echo $term_name ?></a></h4>
												</div>		
												<h3 class="titulo-item"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>	
												<ul class="listado-meta-item">
													<li><i class="far fa-clock"></i> <?php the_field('horario') ?></li>
													<li><i class="fas fa-map-marker-alt"></i> <?php the_field('lugar') ?></li>
													<li><i class="fas fa-graduation-cap"></i> <?php the_field('universidad_partner') ?></li>
												</ul>	

												<h4 class="titulo-categoria-novedades text-center"><a class="categoria-item-novedad" href="<?php echo $facultad_url ?>"><?php echo $facultad_name ?></a></h4>
												<?php /*<div class="cta-item mt-3">
													<a class="boton-cta" href="<?php the_permalink() ?>">VER MÁS ></a>
												</div>	*/?>				
											</div>
										</div>	
									<?php endif ?>	
								</div>		
							<?php endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'loop-templates/content', 'none' ); ?>

						<?php endif; ?>
					</div>

		            <div class="w-100"></div>
		            <div class="col-md-12 paginacion text-center">
		                <!-- The pagination component -->
						<?php custom_pagination($custom_query->max_num_pages,"",$paged); ?>
		            </div>   			    		
		    	</div>

				<div id="sidebar-novedades" class="col-md-3 text-center">
					<h3 class="color-morado">Eventos</h3>
					<?php echo do_shortcode('[fullcalendar]') ?>
				</div>			            
			</div>
		</div>
	</section>

<?php get_footer(); ?>
