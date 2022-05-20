<section class="bg-white py-5"></section>

<section id="novedades" class="seccion-pagina bg-celeste">
	<div class="container wow fadeInUp" data-wow-delay=".75s">
		<div class="row top-negativo">
			<div class="col text-right">
				<h2 class="titulo-seccion color-black">Novedades</h2>
			</div>
		</div>

		<div class="row justify-content-center slider-noticias">
			<?php 
			  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			  $custom_args = array(
			      'post_type' => 'post',
				    /*'tax_query' => array(
				        array(
				            'taxonomy' => 'category',
				            'field'    => 'slug',
				            'terms'    => array( 'noticias'),
				        ),
				    ),		*/
				    'category__not_in' => array(405,406,407,408,409) ,		      
			      'posts_per_page' => 3,		      
			      'paged' => $paged
			    );

			  $custom_query = new WP_Query( $custom_args ); ?>

			<?php if ( $custom_query->have_posts() ) : ?>
			      <!-- the loop -->
			      <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
				<?php 
				$terms = get_the_terms( $post->ID , 'category' );
				if($terms) {
					foreach( $terms as $term ) {
						//Captura ID de cada term o categoría
						$term_name = $term->name;
						$term_slug = $term->slug;
						$term_url = get_term_link($term->slug, 'category');
						$term_id = $term->term_id;
					}
				}?>				
					<div class="item-blog item-novedades">
						<div class="contenedor-item d-flex flex-wrap bg-white flex-column">
							<figure class="imagen-item mb-0">
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('large'); ?> </a>
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
								<?php the_excerpt() ?>	
								<div class="cta-item mt-3">
									<a class="boton-cta" href="<?php the_permalink() ?>">VER MÁS ></a>
								</div>					
							</div>
						</div>
					</div>		
			      <?php endwhile; ?>
			      <!-- end of the loop -->

			<?php wp_reset_postdata(); ?>

			<?php else:  ?>
			    <p><?php _e( 'Lo sentimos, no se encontraron posts.' ); ?></p>
			<?php endif; ?>		
		</div>

		<div class="row mt-5">
			<div class="col-12 text-center">
				<a id="enlace-novedades" class="boton boton-cta">Ver más novedades</a>
			</div>
		</div>
	</div>
</section>