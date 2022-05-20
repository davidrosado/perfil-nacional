<?php
/**
Template name: Página Podcasts
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>

<section id="contenido" class="seccion-pagina bg-celeste-bajo">
	<div class="container wow fadeInUp" data-wow-delay=".75s">
		<div class="row top-universidad justify-content-center mb-3" style="border: none">
			<div class="col-md-12 d-flex flex-wrap justify-content-between align-items-center padding-0">
				<div class="col-md-4 col-lg-3">
					<h1 class="titulo-de-banner">Podcasts</h1>
				</div>
				<div class="col-md-4 col-lg-3 text-right">
					<img src="<?php echo get_stylesheet_directory_uri();?>/images/arrow-right.png">
				</div>				
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-md-12">
				<hr>
			</div>
		</div>

	    <div class="row justify-content-center">
			<div id="listado-noticias" class="col-md-12 d-flex flex-wrap justify-content-between contenido padding-0">
				<?php 
				  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				  $custom_args = array(
				      'post_type' => 'podcast',
				      'posts_per_page' => 18,
				      'orderby'	=> 'date',
				      'order'	=> 'DESC',			      
				      'paged' => $paged
				    );

				  $custom_query = new WP_Query( $custom_args ); ?>

				<?php if ( $custom_query->have_posts() ) : ?>
				    <!-- the loop -->
				    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
						<div class="item-blog item-podcast col-md-12 mb-4 item-<?php echo $term_slug ?>">
							<div class="top-item-podcast">
								<?php if (get_field('indice_titulo')): ?>
									<p class="mb-2"><strong><?php the_field('indice_titulo') ?></strong></p>
								<?php endif ?>	
								<h2 class="titulo-item-podcast titulo-seccion"><?php the_title() ?></h2>
								<?php if (get_field('fecha_de_lanzamiento')): ?>
									<p class="color-black">Fecha de lanzamiento: <?php the_field('fecha_de_lanzamiento') ?></p>	
								<?php endif ?>	
							</div>
							<div class="bottom-item">
								<div class="row">
									<div class="embed-spotify col-md-6">
										<?php the_field('audio') ?>
									</div>	

									<div class="texto-item col-md-6">
										<div class="content-texto-item">
											<div class="icono-texto mb-3">
												<img src="<?php echo get_stylesheet_directory_uri();?>/images/arrow-right.png" width="70">
											</div>
											<?php the_content('') ?>											
										</div>
									</div>
								</div>
							</div>
						</div>							      	
				    <?php endwhile; ?>
				    <!-- end of the loop -->
		            <div class="w-100"></div>
		            <div class="col-md-12 paginacion text-center">
		                <!-- The pagination component -->
						<?php custom_pagination($custom_query->max_num_pages,"",$paged); ?>
		            </div>   

				<?php wp_reset_postdata(); ?>

				<?php else:  ?>
				    <p><?php _e( 'Lo sentimos, no se encontraron posts.' ); ?></p>
				<?php endif; ?>				    	
	    	</div>			
		</div>
	</div>
</section>
<?php get_footer(); ?>