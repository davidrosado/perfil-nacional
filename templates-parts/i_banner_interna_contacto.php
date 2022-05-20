<section id="banner-nosotros" class="slider-interna">
	<div class="seccion-pagina pt-0 pb-3">
		<div class="container wow fadeInUp" data-wow-delay=".5s">
			<div class="row justify-content-center align-items-center">
				<div class="col-11 col-md-5 offset-md-1 col-lg-3 offset-lg-2">
					<h1 class="titulo-de-banner">Con<br>tac<br>to</h1>
					<h3>¿Dónde nos podrás encontrar?</h3>
				</div>
				<div class="col-md-6 col-lg-7">
					<figure>
						<img src="<?php the_post_thumbnail_url('full') ?>" alt="Portada" class="w100 d-none d-md-block">
						<img src="<?php the_post_thumbnail_url('medium') ?>" alt="Portada" class="w100 d-md-none">
					</figure>
					<div class="row mt-5">
						<?php $b=0; if (have_rows('direcciones')): ?>
							<?php while ( have_rows('direcciones') ) : the_row(); $b++ ?>
								<div class="col-md-6 item-direccion d-flex flex-wrap">
									<?php if ($b==1): ?>
										<img src="<?php echo get_stylesheet_directory_uri();?>/images/icn-lugar.png" class="mr-2" style="width: 35px; height: 44px">
									<?php endif ?>
									<h4 class="has-dot color-black"><?php the_sub_field('direccion') ?></h4>
								</div>
							<?php endwhile;?>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>