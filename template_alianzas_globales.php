<?php
/**
Template name: Página Alianzas Globales
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>

<?php include 'templates-parts/i_banner_interna_alianzas.php' ?>

<section class="seccion">
	<div class="container wow fadeInUp" data-wow-delay="1s">
		<div class="row">
			<div class="col-12 text-center">
				<h2>¿Qué carrera estudias?</h2>
		       	<form id="searchform" method="get" action="<?php bloginfo('url'); ?>/continente">
					<select id="campo_carrera" name="carrera">
						<option value="">Seleccione</option>
						<?php $terms = get_terms('carrera', array('hide_empty' => 0, 'parent' =>0)); 
						   foreach($terms as $term) : 
						   ?>
					         <option value="<?php echo $term->term_id;?>" data-value="<?php echo $term->name;?>"><?php echo $term->name;?></option>
						<?php endforeach; ?>
					</select>
		            <input id="boton_buscar" type="submit" value="Buscar">
		        </form>
			</div>
		</div>
	</div>
</section>

<section id="resultados" class="seccion pt-0"> 
	<div class="container wow fadeInUp" data-wow-delay="1s">
		<div class="row">
			<div class="col-md-12">
                <?php
                $args = array(
                    'post_type'      => 'universidad',
                    'posts_per_page' => -1,                     
                    'order'          => 'DESC',
                    'orderby'        => 'date',
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