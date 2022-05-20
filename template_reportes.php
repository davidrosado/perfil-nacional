<?php
/** Template name: Página Reportes  */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

	<section class="descripcion">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 col-md-10 col-lg-8">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content() ?>
					<?php endwhile; // end of the loop. ?>

					<?php echo do_shortcode('[cfdb-datatable]') ?>
				</div>					
			</div>
		</div>
	</section>

<?php get_footer(); ?>
