<?php
/** 
 *
Template Name: Pais
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<?php 
	$carrera =  $_GET['carrera'];
	$ubicacion =  $_GET['ubicacion'];
?>

<section class="seccion">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2>¿Qué carrera estudias?</h2>
		       	<form id="searchform" method="get" action="<?php bloginfo('url'); ?>/pais">					
					<div class="col-12">
						<select id="campo_carrera" name="carrera" required>
							<option value="">Seleccione</option>
							<?php $terms = get_terms('carrera', array('hide_empty' => 0, 'parent' =>0)); 
							   foreach($terms as $term) : 
							   ?>
						         <option value="<?php echo $term->term_id;?>" data-value="<?php echo $term->name;?>"><?php echo $term->name;?></option>
							<?php endforeach; ?>
						</select>						
					</div>

		            <div class="col-12">
						<select id="campo_ubicacion" name="ubicacion" required="">
							<option value="">Seleccione Continente</option>
							<?php $terms = get_terms('ubicacion', array('hide_empty' => 0, 'parent' =>0)); 
							   foreach($terms as $term) : 
							   ?>
						         <option value="<?php echo $term->term_id;?>" data-value="<?php echo $term->name;?>"><?php echo $term->name;?></option>
							<?php endforeach; ?>
						</select>		  
					</div>     

		            <div class="col-12">
						<select id="campo_pais" name="pais" required="">
							<option value="A">Seleccione País</option>
							<?php $terms = get_terms('ubicacion', array('hide_empty' => 0, 'parent' => $ubicacion)); 
							   foreach($terms as $term) : 
							   ?>
						         <option value="<?php echo $term->term_id;?>" data-value="<?php echo $term->name;?>"><?php echo $term->name;?></option>
							<?php endforeach; ?>
						</select>		  
					</div>     

		            <input id="boton_buscar" type="submit" value="Buscar">
		        </form>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$('#campo_carrera option[value="<?php echo $carrera ?>"]').attr("selected", "selected");
	$('#campo_ubicacion option[value="<?php echo $ubicacion ?>"]').attr("selected", "selected");
</script>

<section id="resultados" class="seccion pt-0"> 
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <?php
                $args = array(
                    'post_type'      => 'universidad',
                    'posts_per_page' => -1,                     
                    'order'          => 'DESC',
                    'orderby'        => 'date',
                    'tax_query' => array(
                    	'relation'	=> 'AND',
				        array(
				            'taxonomy' => 'carrera',
			              	'field'    => 'term_id',
			              	'terms'    => $carrera,
				        ),
				        array(
				            'taxonomy' => 'ubicacion',
			              	'field'    => 'term_id',
			              	'terms'    => $ubicacion,
			              	'operator'	=> 'IN'
				        )				        
				    )
                 );

                $myqueri = new WP_Query( $args );
                if ( $myqueri->have_posts() ) : ?>
                	<ul>
	                    <?php while ( $myqueri->have_posts() ) : $myqueri->the_post(); ?>
	                        <li>
	                        	<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2/>
	                        </li>
	                    <?php endwhile; ?>	
                    </ul>
                <?php endif; wp_reset_postdata(); ?> 			
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
