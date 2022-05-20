<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$post_id = get_the_ID();
?>

<section id="contenido" class="seccion-pagina bg-celeste-bajo">
	<div class="container wow fadeInUp" data-wow-delay="1s">
		<div class="row top-universidad justify-content-between align-items-center mb-5">
			<div class="col-md-4 col-lg-3">
				<h3>Alianzas</h3>
				<h1 class="titulo-de-banner">Globales</h1>
			</div>
			<div class="col-md-4 col-lg-3 back-buscador">
				<a href="<?php bloginfo('url') ?>/buscador-de-alianzas" class="d-flex align-items-center justify-content-between"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icono-back.png"> Realizar nueva búsqueda</a>
			</div>
		</div>

		<div class="row meta-universidad justify-content-center">
			<?php /*<div class="col-md-4 logo-universidad">
                <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('full'); ?> 
                <?php else: ?>
                	<img src="<?php echo get_stylesheet_directory_uri();?>/images/logo_universidad.jpg">
                <?php endif ?>					
			</div>*/?>
			<div class="col-md-10 text-center">
                <h2 class="titulo-universidad"><?php the_title(); ?></h2>
                <p class="site-web has-dot"><a href="<?php the_field('website');?>" target="_blank"><?php the_field('website');?></a></p>	
                <div class="descripcion mt-5 text-left">
					<?php 
						if (have_posts()) : while (have_posts()) : the_post(); ?>
				        	<?php the_content(); ?>		
						<?php endwhile; ?>		
					<?php endif; ?>                      	
                </div>			
			</div>				
		</div>
	</div>
</section>

<section id="imagen-ciudad">
	<div class="wow fadeInUp" data-wow-delay="0.75s">
	<?php the_post_thumbnail('full') ?>
	</div>
</section>

<section id="detalle-universidad" class="seccion-pagina">
	<div class="container wow fadeInUp" data-wow-delay="0.75s">
		<div id="cajas-detalle" class="row">	
			<div class="item-caja justify-content-end col-md-6 bg-gris px-5 py-5">
				<figure>
					<img src="<?php echo get_stylesheet_directory_uri();?>/images/icn-categoria-.png">
				</figure>
				<div class="meta-caja">
					<h4>CATEGORÍA:</h4>
					<?php 
					$categorias = get_the_terms( $post->ID , 'categoria_universidad' );
						if($categorias) {
						foreach( $categorias as $categoria ) {
							//Captura ID de cada term o categoría
							$categoria_name = $categoria->name;
							$categoria_url = get_term_link($categoria->slug, 'categoria_universidad');
						    $categoria_id = $categoria->term_id;
						    $categoria_descripcion = $categoria->description;
						     echo '<span>' .$categoria_name. '</span>';
							unset($categorias);
						}
					}
					?>							
				</div>
			</div>

			<div class="item-caja col-md-6 bg-celeste px-5 py-5">
				<figure>
					<img src="<?php echo get_stylesheet_directory_uri();?>/images/icn-idioma.png">
				</figure>			
				<div class="meta-caja meta-caja-right">	
					<h4>IDIOMA DE INSTRUCCIÓN:</h4>
					<?php
					$idiomas = get_the_terms( $post->ID , 'idioma' );
						if($idiomas) {
						foreach( $idiomas as $idioma ) {
							$idioma_id = $idioma->term_id;
							$idioma_name = $idioma->name;
							$idioma_url = get_term_link($idioma->slug, 'idioma');
						    $idioma_descripcion = $idioma->description;
						    echo '<span class="item-idioma">' .$idioma_name. '</span>';
							unset($idiomas);
						}
					} ?>	
				</div>		
			</div>

			<div class="item-caja justify-content-end col-md-6 px-5 py-5">
				<figure>
					<img src="<?php echo get_stylesheet_directory_uri();?>/images/icn-ciudad.png">
				</figure>	
				<div class="meta-caja">			
					<h4>CIUDAD:</h4>
					<?php 
					 $ciudades = get_the_terms($post->ID , 'ciudad');
						if($ciudades) {
						foreach( $ciudades as $ciudad ) {
							//Captura ID de cada term o categoría
							$ciudad_id = $ciudad->term_id;
							$ciudad_name = $ciudad->name;
							$ciudad_url = get_term_link($ciudad->slug, 'ciudad');
						    $ciudad_descripcion = $ciudad->description;
						    echo '<span>' .$ciudad_name. '</span>';
							unset($ciudades);
						}
					}
					?>			
				</div>
			</div>

			<div class="item-caja col-md-6 px-5 py-5">
				<figure>
					<img src="<?php echo get_stylesheet_directory_uri();?>/images/icn-quienes.png">
				</figure>			
				<div class="meta-caja meta-caja-right">	
					<h4>¿QUIENES PUEDEN POSTULAR?</h4>
					<?php the_field('quien_puede_postular') ?>		
				</div>
			</div>

			<div class="item-caja justify-content-end col-md-6 bg-gris px-5 py-5">
				<figure>
					<img src="<?php echo get_stylesheet_directory_uri();?>/images/icn-costo.png">
				</figure>				
				<div class="meta-caja">
					<h4>COSTO DE VIDA APROXIMADO:</h4>
					<?php 
					$autores = get_the_terms( $post->ID , 'ciudad' );
						if($autores) {
						foreach( $autores as $autor ) {
							$valor = get_field('costo_de_vida', $autor, false);
						}
					}
					?>				
					<?php echo $valor ?>
				</div>
			</div>

			<div class="item-caja col-md-6 bg-celeste px-5 py-5">
				<figure>
					<img src="<?php echo get_stylesheet_directory_uri();?>/images/icn-periodo.png">
				</figure>	
				<div class="meta-caja meta-caja-right">			
					<h4>PERIODO DE ESTUDIO:</h4>
					<?php the_field('periodo_de_estudio') ?>		
				</div>
			</div>	
		</div>		

		<div class="row">
			<div class="col-12 text-center mt-5">
				<a id="open-modal-universidad" class="boton boton-cta" data-toggle="modal" data-target="#modal">APLICAR AQUÍ</a>
			</div>
		</div>		
	</div>
</section>

<?php include 'templates-parts/i_novedades.php' ?>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php echo do_shortcode('[contact-form-7 id="1257" title="Formulario popup universidad" html_id="form_contacto"]') ?>
		</div>
	</div>
</div>

<?php 
$carrera = $_POST['carrera-enviar'];
$universidad = get_the_title();
?>

<script type="text/javascript">
	$('#open-modal-universidad').click(function() {
		$universidad = '<?php echo $universidad ?>'
		$carrera = '<?php echo $carrera ?>'
		console.log($universidad)
		console.log($carrera)
		$('#form_contacto #universidad').val($universidad)		
		$('#form_contacto #carrera').val($carrera)	
	})
</script>
<style>
	.meta-caja .item-idioma:after {content: ' / '}
	.meta-caja .item-idioma:last-child:after {content: ''}
</style>

<?php get_footer(); ?>