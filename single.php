<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$post_id = get_the_ID();
?>

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

<section id="contenido" class="seccion-pagina bg-celeste-bajo">
	<div class="container">
		<div class="row top-universidad justify-content-between align-items-center mb-5">
			<div class="col-md-4 col-lg-3">
				<h1 class="titulo-de-banner">Novedades</h1>
			</div>
			<div class="col-md-4 col-lg-3 back-buscador">
				<a href="<?php bloginfo('url') ?>/novedades" class="d-flex align-items-center justify-content-between"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icono-back.png"> Todas las novedades</a>
			</div>
		</div>

		<div class="row item-blog justify-content-between">
			<div class="col-md-8 text-center">
                <h2 class="titulo-universidad color-black"><?php the_title(); ?></h2>
                <p class="site-web has-dot"><a href="<?php the_field('website');?>" target="_blank"><?php the_field('website');?></a></p>	

				<div class="meta-item d-flex justify-content-center mb-3">
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

				<div class="share d-flex justify-content-between py-2 px-2">
					<span>Compartir</span>
					<div>
					    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="facebook" target="_blank"><i class="fab fa-facebook"></i></a>
					    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
						<a href="https://www.linkedin.com/cws/share?url=<?php the_permalink();?>" target="_blank" class="linkedin"><i class="fab fa-linkedin"></i></a>	
					</div>
				</div>     

                <div class="imagen-post">
                	<?php the_post_thumbnail('full') ?>
                </div>

                <?php $categoria = $term_slug;
                if ($categoria !== 'noticias'): ?>
	                <div class="bloque-detalles py-3 px-3 mt-5" style="background: #fff; border-radius: 10px; color: #4d4d4d;">
	                	<h3 class="text-left titulo-universidad color-black mb-3">Detalles</h3>
	                	<div class="row justify-content-between text-left">
		                	<div class="col-md-6">
		                		<p><strong>Fecha:</strong> <br><?php echo get_the_date('') ?></p>

		                		<?php if (get_field('horario')): ?>
		                			<p><strong>Hora:</strong> <br><?php the_field('horario') ?><br></p>
		                		<?php endif ?>

		                		<?php if (get_field('lugar')): ?>
		                			<p><strong>Lugar:</strong> <br><?php the_field('lugar') ?></p>
		                		<?php endif ?>
		                	</div>
		                	<div class="col-md-6">
		                		<?php if (get_field('organizador')): ?>
		                			<p><strong>Organizador:</strong> <br><?php the_field('organizador') ?></p>
		                		<?php endif ?>
		           
		                		<?php if (get_field('registro')): ?>
									<p><strong>Registro:</strong> <br><?php the_field('registro') ?></p>		                			
		                		<?php endif ?>

		                		<?php if (get_field('universidad_partner')): ?>
									<p><strong>Universidad partner:</strong> <br><?php the_field('universidad_partner') ?></p>	
		                		<?php endif ?>			
		                	</div>                                		
	                	</div>	
	                </div>
	            <?php endif ?>

                <div class="descripcion mt-5 text-left">
					<?php 
						if (have_posts()) : while (have_posts()) : the_post(); ?>
				        	<?php the_content(); ?>		
						<?php endwhile; ?>		
					<?php endif; ?>                      	
                </div>		

                <div class="navegacion-post mt-5 text-center">

						<?php
						$pagelist = get_posts('sort_column=menu_order&sort_order=asc');
						$pages = array();
						foreach ($pagelist as $page) {
						$pages[] += $page->ID;
						}

						$current = array_search(get_the_ID(), $pages);
						$prevID = $pages[$current-1];
						$nextID = $pages[$current+1];
						?>

						<div class="navigation">
						<?php if (!empty($prevID)) { ?>
						<a href="<?php echo get_permalink($prevID); ?>"
						title="<?php echo get_the_title($prevID); ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icono-back.png"></a>
						<?php }
						if (!empty($nextID)) { ?>
						<a href="<?php echo get_permalink($nextID); ?>"
						title="<?php echo get_the_title($nextID); ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icono-next.png"></a>
						<?php } ?>
					</div><!-- .navigation -->
                </div>		

			</div>		

			<div id="sidebar-novedades" class="col-md-3 text-center">
				<h3 class="color-morado">Eventos</h3>
				<?php echo do_shortcode('[fullcalendar]') ?>
			</div>		
		</div>
	</div>
</section>

<?php include 'templates-parts/i_novedades.php' ?>

<?php get_footer(); ?>