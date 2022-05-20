<?php
/**
Template name: Página FAQs
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>

<section id="contenido" class="seccion-pagina bg-celeste-bajo">
	<div class="container wow fadeInUp" data-wow-delay=".75s">
		<div class="row top-universidad justify-content-center mb-5">
			<div class="col-md-12 d-flex flex-wrap justify-content-between align-items-center ">
				<div class="col-md-4 col-lg-3">
					<h3>Preguntas</h3>
					<h1 class="titulo-de-banner">Frecuentes</h1>
				</div>
				<div class="col-md-4 col-lg-3 text-right">
					<img src="<?php echo get_stylesheet_directory_uri();?>/images/arrow-right.png">
				</div>				
			</div>
		</div>

		<div class="row">
			<div id="acordeon-faq" class="col-md-12">
				<?php $a=0; if (have_rows('items')): ?>
					<?php while ( have_rows('items') ) : the_row(); $a++ ?>
						  <div id="card-<?php echo $a ?>" class="card mb-3">
						    <div class="card-header" id="heading<?php echo $a ?>">
						      <h5 class="mb-0">
						        <button class="btn btn-link <?php if ($a!==1): ?>collapsed<?php endif ?>" data-toggle="collapse" data-target="#collapse<?php echo $a ?>" aria-expanded="<?php if ($a==1): ?> true <?php else: ?>false<?php endif ?>" aria-controls="collapse<?php echo $a ?>"><span class="numero-faq"><?php echo $a ?></span> <?php the_sub_field('titulo') ?></button>
						      </h5>
						    </div>

						    <div id="collapse<?php echo $a ?>" class="collapse <?php if ($a==1): ?> show <?php endif ?>" aria-labelledby="heading<?php echo $a ?>" data-parent="#acordeon-faq">
						      <div class="card-body bg-celeste-bajo">
						      	<?php the_sub_field('bajada') ?>
						    </div>
						  </div>
						</div>
					<?php endwhile;?>
				<?php endif ?>				
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>