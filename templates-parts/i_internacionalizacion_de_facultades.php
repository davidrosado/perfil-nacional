<section class="bg-white py-5"></section>

<section id="internacionalizacion" class="seccion-pagina">
	<div class="container wow fadeInUp" data-wow-delay=".75s">
		<div class="row top-negativo">
			<div class="col-lg-9 col-md-8 col-9">
				<h2 class="titulo-seccion color-black">Internacionalización <br>de Facultades</h2>
			</div>
			<div class="col-md-4 col-lg-3 col-3 text-right flecha">
				<img src="<?php echo get_stylesheet_directory_uri()?>/images/arrow-right.png">
			</div>			
		</div>

		<div class="row justify-content-center slider-noticias">
			<?php 
			  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			  $custom_args = array(
			      	'post_type' => 'post',
				    'tax_query' => array(
				        array(
				            'taxonomy' => 'category',
				            'field'    => 'slug',
				            'terms'    => array( 'webinar-academico', 'visiting-proffesor', 'master-class', 'investigacion-conjunta', 'coil' ),
				        ),
				    ),
			      'posts_per_page' => 3,
			      'paged' => $paged
			    );

			  $custom_query = new WP_Query( $custom_args ); ?>

			<?php if ( $custom_query->have_posts() ) : ?>
			    <!-- the loop -->
			    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
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
					<div class="item-blog item-novedades">
						<div class="contenedor-item d-flex flex-wrap bg-white flex-column">
							<figure class="imagen-item mb-0">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
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
									<?php if (get_field('horario')): ?>
										<li><i class="far fa-clock"></i> <?php the_field('horario') ?></li>
									<?php endif ?>
									<?php if (get_field('lugar')): ?>
										<li><i class="fas fa-map-marker-alt"></i> <?php the_field('lugar') ?></li>
									<?php endif ?>
									<?php if (get_field('universidad_partner')): ?>
										<li><i class="fas fa-graduation-cap"></i> <?php the_field('universidad_partner') ?></li>
									<?php endif ?>
								</ul>	

								<h4 class="titulo-categoria-novedades text-center"><a class="categoria-item-novedad" href="<?php echo $facultad_url ?>"><?php echo $facultad_name ?></a></h4>
								<?php /*<div class="cta-item mt-3">
									<a class="boton-cta" href="<?php the_permalink() ?>">VER MÁS ></a>
								</div>	*/?>				
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
				<a id="enlace-actividades" class="boton boton-cta">Ver más actividades</a>
				<?php 
					$home = get_bloginfo('url');
				?>
				<form id="form-filtro" action="<?php echo $home ?>/novedades" method="POST" style="display: none">
					<input type="text" name="boton-filtrado" id="boton-filtrado" value="filtrado">
				</form>
			</div>
		</div>
	</div>
</section>