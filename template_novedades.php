<?php
/**
Template name: Página Novedades
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>

<?php if (isset($_POST['boton-filtrado'])) : ?>
	<?php 
		$filtrado = $_POST['boton-filtrado'];
		//echo $filtrado;
	?>
	<script>
		$(document).ready(function() {
			$('.item-eventos').removeClass('hidden')
			$('.item-eventos').addClass('show')
			$('.item-noticias').removeClass('show')
			$('.item-noticias').addClass('hidden')
			$('.filtro').removeClass('filtrado')
			$('#filtro2').addClass('filtrado')		
		});	
	</script>
<?php endif ?> 

<section id="contenido" class="seccion-pagina bg-celeste-bajo">
	<div class="container wow fadeInUp" data-wow-delay=".75s">
		<div class="row top-universidad justify-content-center mb-5" style="border: none">
			<div class="col-md-12 d-flex flex-wrap justify-content-between align-items-center ">
				<div class="col-md-4 col-lg-3">
					<h1 class="titulo-de-banner">Novedades</h1>
				</div>
				<div class="col-md-4 col-lg-3 text-right">
					<img src="<?php echo get_stylesheet_directory_uri();?>/images/arrow-right.png">
				</div>				
			</div>
		</div>

		<div class="row justify-content-center mb-5">
			<div class="filtros medium col-md-12 d-flex">
				<div id="filtro1" class="filtro d-flex justify-content-center ml-4 mr-md-5 filtrado">
					<div class="icon mr-3"><svg id="square" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48z"></path></svg></div>
					<p class="mb-0">Ver todas las novedades</p>
				</div>
				<div id="filtro2" class="filtro d-flex justify-content-center mr-5">
					<div class="icon mr-3"><svg id="square" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48z"></path></svg></div>
					<p class="mb-0">Ver eventos</p>
				</div>
				<div id="filtro3"  class="filtro d-flex justify-content-center">
					<div class="icon mr-3"><svg id="square" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48z"></path></svg></div>
					<p class="mb-0">Ver noticias</p>
				</div>
				<script type="text/javascript">
					$('#filtro1').click(function() {
						$('.item-noticias').toggleClass('show')
						$('.item-eventos').toggleClass('show')
						$('.filtro').removeClass('filtrado')
						$(this).addClass('filtrado')
					})
					$('#filtro2').click(function() {
						$('.item-eventos').removeClass('hidden')
						$('.item-eventos').addClass('show')
						$('.item-noticias').removeClass('show')
						$('.item-noticias').addClass('hidden')
						$('.filtro').removeClass('filtrado')
						$(this).addClass('filtrado')						
					})						
					$('#filtro3').click(function() {
						$('.item-noticias').removeClass('hidden')
						$('.item-noticias').addClass('show')
						$('.item-eventos').removeClass('show')
						$('.item-eventos').addClass('hidden')
						$('.filtro').removeClass('filtrado')
						$(this).addClass('filtrado')						
					})					
				</script>
				<style type="text/css">
					.item-blog.hidden {display: none}
					.item-blog.show, .item-blog.hidden.show {display: revert}
				</style>
			</div>
		</div>
		
	    <div class="row justify-content-between">
			<div id="listado-noticias" class="col-md-8 d-flex flex-wrap justify-content-between">
				<?php 
				  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				  $custom_args = array(
				      'post_type' => 'post',
				      'posts_per_page' => 100,
				      'orderby'	=> 'date',
				      'order'	=> 'DESC',
			          //'category__in' => array(1,395),			      
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
					<div class="item-blog col-md-6 mb-4 item-<?php echo $term_slug ?> <?php if ($term_slug != 'eventos' && $term_slug != 'noticias'): ?>item-eventos<?php endif ?>">
						<?php $categoria = $term_slug ?>
						<?php if ($categoria == 'noticias'): ?>
							<div class="contenedor-item d-flex flex-wrap bg-white flex-column">
								<figure class="imagen-item mb-0">
									<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('large'); ?></a> 
								</figure>
								<div class="resumen-item py-3 px-3">
									<div class="meta-item meta-novedad">
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
						<?php endif ?>
						<?php if ($categoria == 'eventos'): ?>
							<div class="contenedor-item d-flex flex-wrap bg-white flex-column">
								<figure class="imagen-item mb-0">
									<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('large'); ?></a>
								</figure>
								<div class="resumen-item py-3 px-3">
									<div class="meta-item meta-novedad">
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
						<?php endif ?>
						<?php if ($categoria !== 'eventos' && $categoria !== 'noticias'): ?>
							<div class="contenedor-item d-flex flex-wrap bg-white flex-column">
								<figure class="imagen-item mb-0">
									<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('large'); ?> </a>
									<div class="tag-item"><span>Actividad Virtual</span></div>
								</figure>
								<div class="resumen-item py-3 px-3">
									<div class="meta-item meta-novedad">
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
						<?php endif ?>						
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

			<div id="sidebar-novedades" class="col-md-3 text-center">
			  <div id="scroller-anchor"></div> 
			  <div id="scroller"> 
				<h3 class="color-morado">Eventos</h3>
				<?php echo do_shortcode('[fullcalendar]') ?>
			  </div>
			</div>		    	
		</div>
	</div>
</section>

<script>
let prevUrl = document.referrer;
console.log(prevUrl)	
</script>
<?php get_footer(); ?>