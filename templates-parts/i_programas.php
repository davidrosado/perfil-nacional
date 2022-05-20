<section class="bg-white py-5"></section>

<section id="programas" class="seccion-pagina seccion-programas">
	<div class="container wow fadeInUp" data-wow-delay=".75s">
		<div class="row top-negativo">
			<div class="col text-center">
				<h2 class="titulo-seccion color-black">Programas Disponibles 2022</h2>
			</div>
		</div>

		<div id="slider-programas" class="row justify-content-center">
			<?php 
			  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			  $custom_args = array(
			    'post_type'      => 'page',
			    'posts_per_page' => -1,
			    'post_parent'   => array(2178,2180),
			    //'order'          => 'ASC',
			    //'orderby'        => 'menu_order'/
			      'paged' => $paged
			   );

			  $custom_query = new WP_Query( $custom_args ); ?>

			<?php if ( $custom_query->have_posts() ) : ?>
			      <!-- the loop -->
			      <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>	
				  	<?php
						$mostrarHome = get_field('home');
						if($mostrarHome == 'si') :?>
						<div class="item-blog item-novedades">
							<div class="contenedor-item d-flex flex-wrap bg-white flex-column">
								<?php 
									$enlace = get_the_permalink();		
									$opcional = get_field('url_opcional');
									if ($opcional) {
										$enlace = $opcional;
									}	
								?>

								<figure class="imagen-item mb-0">
									<?php					
									if (get_field('imagen_listado')): ?>
										<a href="<?php echo $enlace ?>"><img src="<?php the_field('imagen_listado') ?>"></a>
									<?php else:?>
										<a href="<?php echo $enlace ?>"><?php the_post_thumbnail('large'); ?></a>
									<?php endif ?>
									
								</figure>

								<div class="resumen-item">
									<div class="tag-item"><span class="text-center">Virtual</span></div>
									<div class="py-3 px-3">
										<h3 class="titulo-item"><a href="<?php echo $enlace ?>"><?php the_title() ?></a></h3>
										<?php /*<div class="resumen-programa my-2"><?php the_field('resumen_programa') ?></div> */?>
									</div>		
									<div class="fecha-programa text-center">Inicio: <?php the_field('fecha_inicio') ?></div>		
								</div>
							</div>
						</div>							
					<?php endif ?>
	
			      <?php endwhile; ?>
			      <!-- end of the loop -->

			<?php wp_reset_postdata(); ?>

			<?php else:  ?>
			    <p><?php _e( 'Lo sentimos, no se encontraron posts.' ); ?></p>
			<?php endif; ?>		
		</div>
	</div>
</section>

<style type="text/css">
.home #slider-programas .item-blog.item-novedades {
	padding: 0 15px;
    position: relative;
}
.home #slider-programas .item-blog.item-novedades:hover .contenedor-item {
	box-shadow: none;
}
.home #slider-programas .item-blog.item-novedades figure {
    max-height: none;
    overflow: none;
    padding-top: 20px;
}
.home #slider-programas .item-blog.item-novedades figure img {
    width: 100%;
    min-height: 300px;
    object-fit: cover;	
}
.home #slider-programas .item-blog.item-novedades .resumen-item {
    background: none;
    display: block!important;
    position: absolute;
    bottom: 0;
    width: calc(100% - 20px);
}
.home #slider-programas .item-blog.item-novedades:hover .resumen-item {
    background-color: transparent!important;
}
.home #slider-programas .item-blog.item-novedades .resumen-item .tag-item {
    position: relative;
    padding-left: 15px;
    text-align: left;
}
.home #slider-programas .item-blog.item-novedades .resumen-item .titulo-item {
    font-weight: 600;
    min-height: auto;
}
.home #slider-programas .item-blog.item-novedades .resumen-item .titulo-item a {
    color: #fff;
    text-shadow: 1px 2px 4px #000;
    font-size: 1.2em;
}
.home #slider-programas .item-blog.item-novedades .resumen-item .fecha-programa {
    background: #4fc0db;
    padding: 10px 15px;
    color: #fff;
    font-weight: 500;
    max-width: 220px;
    margin: 0 auto;
}
.home #slider-programas .slick-dots {
    bottom: -50px!important;
    position: absolute;    
}	
</style>