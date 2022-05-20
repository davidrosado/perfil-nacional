<?php
/**
Template name: Página Inicio
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>

<section id="banner" class="slider-home wow fadeInUp" data-wow-delay=".5s">
	<?php 
		$b = 0;
		if (have_rows('banner')): ?>
		    <?php while ( have_rows('banner') ) : the_row(); $b++ ?>
		    	<?php if (have_rows('seccion_imagen')): ?>
				    <?php while ( have_rows('seccion_imagen') ) : the_row();
				    	$imagen_desktop = get_sub_field('imagen_desktop');
				    	$imagen_mobile = get_sub_field('imagen_mobile');
				    	$target = get_sub_field('target');
				    	$url = get_sub_field('url');
				    	?>
						<div>
							<a href="<?php echo $url ;?>" target="_<?php echo $target ;?>">
								<img class="imagen-desktop" src="<?php echo $imagen_desktop ;?>">
								<img class="imagen-mobile" src="<?php echo $imagen_mobile ;?>">
							</a>
						</div>
		    		<?php endwhile;?>
		    		
		    	<?php else: ?>
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
		    	<?php endif ?>
			<?php endwhile;?>
	<?php endif ?>	
</section>

<section id="alianzas-internacionales" class="seccion-pagina wow fadeInUp" data-wow-delay="1s">
	<div class="container">
		<div class="row justify-content-end pt-5">
			<div class="col-md-5">
				<h2 class="titulo-seccion">Alianzas <br>Internacionales</h2>
				<p>Desarrolla relaciones institucionales para los diferentes niveles de estudio y proyectos con nuestros socios estratégicos.</p>
			</div>
			<div class="col-md-1"></div>
		</div>

		<div class="row justify-content-end">
			<div class="col-md-5 mt-5 mb-3">
				<h3 class="subtitulo-seccion">¿QUÉ CARRERA ESTUDIAS?</h2>
		       	<form id="searchform" method="post" action="<?php bloginfo('url') ?>/buscador-de-alianzas/">
			       	<div class="select">
					<select id="campo_carrera" name="carrera" required >
						<option value="">ELEGIR UNA CARRERA</option>
						<?php $terms = get_terms('carrera', array('hide_empty' => 0, 'parent' =>0)); 
						   foreach($terms as $term) : 
						   ?>
					         <option id="carrera-<?php echo $term->slug;?>" data-value="<?php echo $term->name;?>" value="<?php echo $term->term_id;?>"><?php echo $term->name;?></option>
						<?php endforeach; ?>
					</select>            
			       	</div>
					<input id="carrera-seleccionada" type="hidden" name="carrera-seleccionada" value="">    
					<input id="continente-seleccionado" type="hidden" name="continente-seleccionado" value="">   
					<input id="id-continente-seleccionado" type="hidden" name="id-continente-seleccionado" value="">
		            <?php /*<input class="mt-3 boton boton-cta" id="boton_buscar" type="submit" value="BUSCAR ALIANZAS" style="border:none;">*/?>
		            <script type="text/javascript">
						$('#campo_carrera').on('change', function() {
							$valor = $(this).find(":selected").attr('data-value')
							$('#carrera-seleccionada').val($valor)
							console.log($valor)

							$('#titulo-continentes').css('display','block')
							$('#listado-continentes').css('display','flex')
						    //alert($valor);
						});		            	
		            </script>
		        </form>			
		    </div>
		    <div class="col-md-1"></div>
		</div>
		<div class="clearfix"></div>

		<div id="titulo-continentes" class="row" style="display: none">
			<div class="col-md-12 text-center seccion-pagina pb-0">
				<h3 class="subtitulo-seccion">ELIGE TU DESTINO</h2>
			</div>
		</div>

		<div id="listado-continentes" class="row flex-wrap justify-content-center" style="display: none">
            <?php $terms = get_terms('continente', array('hide_empty' => 0, 'parent' =>0)); 
               foreach($terms as $term) : ?>
                    <?php 
                        $term_id = $term->term_id;
                        $queried_object = get_queried_object(); 
                        $image_id = get_field('bandera', $term, false); 
                        $image = wp_get_attachment_image_src($image_id, $size);
                    ?>
                    <div id="contenedor-continente-<?php echo $term_id ?>" class="item-listado-continentes col-lg-2 col-md-4 col-4 text-center">
                        <h4 id="continente-<?php echo $term_id ?>" data-value="<?php echo $term_id ?>" data-nombre="<?php echo $term->name;?>">
                            <img src="<?php echo $image[0]; ?>" alt="" title="">
                            <?php echo $term->name;?>
                        </h4>
                    </div>    
		            <script type="text/javascript">
                        $( "#continente-<?php echo $term_id ?>" ).click(function() {
                        	$continente = $(this).attr('data-nombre')
							$idcontinente = $(this).attr('data-value')
							$('#id-continente-seleccionado').val($idcontinente)
							$('#continente-seleccionado').val($continente)
							console.log($continente)
							console.log($idcontinente)

							$('#boton-buscador').css('display','inline-block');
                        });              	
		            </script>                                      
            <?php endforeach; ?>    	

            <script type="text/javascript">
                <?php $terms = get_terms('continente', array('hide_empty' => 0, 'parent' =>0)); 
               foreach($terms as $term) : ?>  
                    <?php $term_id = $term->term_id; ?>                  
                    $( "#continente-<?php echo $term_id ?>" ).click(function() {
                        $('.item-listado-continentes').removeClass('activado');
                        $('#contenedor-continente-<?php echo $term_id ?>').toggleClass('activado');
                        $('.fila-universidad').css('display','none')
                        $('.fila-universidad.continente-<?php echo $term_id ?>').css('display','table-row')

                        $('#selector-pais').css('display','revert')
                        $('.item-listado-paises').removeClass('activado')
                        $('.item-listado-paises').css('display','none')
                        $('.item-listado-paises.continente-<?php echo $term_id ?>').css('display','revert')        
                    });    
                <?php endforeach; ?>  
            </script>  
		</div>	

		<div class="row">
			<div class="col-md-12 text-center caja-cta mt-5">
				<button id="boton-buscador" class="cta" style="display: none">BUSCAR ALIANZAS</button>
			</div>
		</div>	
	</div>
</section>

<section id="testimonios" class="seccion-pagina bg-celeste">
	<div class="container wow fadeInUp" data-wow-delay=".75s">
		<div class="row top-negativo">
			<div class="col">
				<h2 class="titulo-seccion">Testimonios</h2>
			</div>
		</div>

		<div class="row">
			<div id="slider-testimonios" class="w-100 carrusel-site">

                <?php
                $c = 0;
                $d=0;
                $args = array(
                    'post_type'      => 'testimonio',
                    'posts_per_page' => -1,
                    'order'          => 'DESC',
                    'orderby'        => 'date'         
                 );

                $parent = new WP_Query( $args );
                if ( $parent->have_posts() ) : ?>

                    <?php while ( $parent->have_posts() ) : $parent->the_post(); $c++; ?>				
                    	<div class="item-slider item-slider-testimonios" data-toggle="modal" data-target="#testimonio<?php echo $c ?>">
							<div class="contenedor-item">
								<figure>
									<img src="<?php the_post_thumbnail_url('full') ?>">
								</figure>
								<div class="caption-item">
									<h3 class="nombre-caption"><?php the_title() ?></h3>
									<p class="categoria-caption"><?php the_field('categoria_testimonio') ?></p>
								</div>
								<div class="enlace-item">
									<span>
										<i class="far fa-play-circle"></i>
									</span>
								</div>						
							</div>
						</div>                                          
                    <?php endwhile; ?>  
                      
                <?php endif; wp_reset_postdata(); ?>															

			</div>

                <?php if ( $parent->have_posts() ) : ?>

                    <?php while ( $parent->have_posts() ) : $parent->the_post(); $d++; ?>				
					<div class="modal fade item-testimonio-modal" id="testimonio<?php echo $d?>" tabindex="-1" aria-hidden="true">
						<?php if(get_field('video')) { ?>
						<div class="modal-dialog modal-dialog-centered modal-xl position-relative">
							<div class="modal-content">
								<button type="button" class="close position-absolute" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<div class="modal-body"><div class="r16-9">
									<iframe id="ytplayer" width="560" height="315" src="https://www.youtube.com/embed/<?php the_field('video') ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div></div>
							</div>
						</div>
						<?php } else { ?>
						<div class="modal-dialog modal-dialog-centered modal-lg position-relative">
							<div class="modal-content">
								<button type="button" class="close position-absolute" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<div class="modal-body modal-texto">
									<div class="row">
										<div class="col-md-5">
											<div class="d-none d-md-block">
											<img src="<?php the_post_thumbnail_url('full') ?>" alt="<?php the_title()?>" class="w-100">
											</div>
										</div>
										<div class="col-md-7 px-md-2 px-lg-3">
											<p><?php the_content() ?></p>
											<ul class="nolist" style="display: none">
												<li><strong class="altas">Alumn<?php if(get_field('genero') == 'masculino') {echo 'o';} else {echo 'a';}?>:</strong> <?php the_title() ?></li>
												<li><strong class="altas">Universidad:</strong> <?php the_field('universidad') ?></li>
												<li><strong class="altas">País:</strong> <?php the_field('pais') ?></li>
												<li><strong class="altas">Carrera:</strong> <?php the_field('carrera') ?></li>
												<li></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>                                       
                    <?php endwhile; ?>  
                      
                <?php endif; wp_reset_postdata(); ?>			
		</div>
	</div>
</section>

<?php /*
<section id="descripcion" class="seccion-pagina align-items-center">
	<div class="container wow fadeInUp" data-wow-delay=".75s">
		<div class="row">
			<div class="col-md-5 py-5">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>					
			</div>
		</div>
	</div>
</section>

<section id="video-home">
	<div class="wow fadeInUp" data-wow-delay=".75s">
	<?php if (have_rows('video_html_home')): ?>
		<?php while ( have_rows('video_html_home') ) : the_row(); ?>
			<video id="videohome" muted autoplay loop playsinline poster="<?php the_sub_field('poster') ?>">
	            <source src="<?php the_sub_field('video_mp4') ?>" type="video/mp4">
	            <source src="<?php the_sub_field('video_webm') ?>" type="video/webm">
	            <source src="<?php the_sub_field('video_ogv') ?>" type="video/ogg">
	         Tu navegador no soporta HTML5 Video
	        </video>	
		<?php endwhile;?>
	<?php endif ?>		
	</div>
</section>
*/?>

<?php include 'templates-parts/i_programas.php' ?>
<?php include 'templates-parts/i_internacionalizacion_de_facultades.php' ?>
<?php include 'templates-parts/i_novedades.php' ?>

<script type="text/javascript">
   $('#boton-buscador').click(function(e) {
        e.preventDefault();
        $("#searchform").submit();
    });
</script>

<style type="text/css">
	.item-listado-continentes.activado,
    .item-listado-paises.activado {border: 1px solid #ccc}
</style>

<?php get_footer(); ?>