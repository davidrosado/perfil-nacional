<?php get_header(); ?>

<div id="content" class="bg-celeste-bajo">
	<div class="row justify-content-center">
		<div class="col-md-10 block block-title py-5">
			<h1><?php echo _x("Búsqueda para:", "label", "simple-bootstrap"); ?> <?php echo esc_attr(get_search_query()); ?></h1>
		</div>
	</div>

    <div class="row justify-content-center">
        <div id="listado-noticias" class="col-md-10 d-flex flex-wrap justify-content-between">	

			<?php if ( have_posts() ) : ?>
				<?php /*<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header --> */ ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="item-blog col-md-4 mb-4">
						<div class="contenedor-item d-flex flex-wrap bg-white flex-column">
							<?php /*<div class="share d-flex justify-content-between py-2 px-2 bg-celeste-bajo">
								<span>Compartir</span>
								<div>
									<a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
									<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
								</div>
							</div>*/?>
							<figure class="imagen-item mb-0">
								<?php the_post_thumbnail('large'); ?>  
							</figure>
							<div class="resumen-item py-3 px-3">
								<div class="meta-item d-flex justify-content-between mb-3">
									<?php /*<p class="fecha mb-0"><?php echo get_the_date() ?></p>*/?>
									<?php 
										$terms = get_the_terms( $post->ID , 'category' );
										if($terms) {
										foreach( $terms as $term ) {
											//Captura ID de cada term o categoría
											$term_name = $term->name;
											$term_url = get_term_link($term->slug, 'category');
										    $term_id = $term->term_id;
										}
									}?>
									<a class="categoria-item" href="<?php echo $term_url ?>"><?php echo $term_name ?></a>
								</div>		
								<h3 class="titulo-item"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>		
								<div class="cta-item mt-3">
									<a class="boton-cta" href="<?php the_permalink() ?>">VER MÁS ></a>
								</div>					
							</div>
						</div>
					</div>		
				<?php endwhile; ?>

			<?php else : ?>

				<div class="item-blog col-md-12 mb-4 pb-5">
					<h2>No se encontraron resultados para su búsqueda.</h2>
				</div>
			<?php endif; ?>
		</div>
	</div>

</div>

<?php get_footer(); ?>