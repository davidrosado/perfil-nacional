<?php

/**

 * The header for our theme.

 *

 * Displays all of the <head> section and everything up till <div id="content">

 *

 * @package understrap

 */



if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	

	<?php // ANIMATE.CSS ?>

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/css/animate.css">

	

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/style.css">

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/custom.css?v=1">

	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/favicon.png">

	<link rel="dns-prefetch" href="https://code.jquery.com">

	<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script async src="<?php echo get_stylesheet_directory_uri()?>/js/bootstrap.min.js"></script>

	<script async src="<?php echo get_stylesheet_directory_uri()?>/js/popper.min.js"></script>



	<!-- Global site tag (gtag.js) - Google Analytics -->

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-19220814-54"></script>

	<script>

	  window.dataLayer = window.dataLayer || [];

	  function gtag(){dataLayer.push(arguments);}

	  gtag('js', new Date());



	  gtag('config', 'UA-19220814-54');

	</script>





	<?php wp_head(); ?>		

</head>



<body <?php body_class(); ?>>

	<div class="site" id="page">

		<header id="header" class="cabecera-site py-3">



<?php /*



$menu = array(

	1 => array('#','',''), // {#link} {nombre} {active}

);



*/ ?>

<div class="menu">

	<div class="container wow fadeInDown" data-wow-delay=".25s">

		<nav class="navbar navbar-expand-lg navbar-light">

			<a class="navbar-brand" href="<?php bloginfo('url')?>">

				<img src="<?php the_field('logo','option');?>" alt="" class="logo">

			</a>

			<?/* SEARCH MOVIL */?>

			<ul class="navbar-nav bold altas ml-auto search-navbar">

				<li class="nav-item dropdown buscar">

					<a href="" class="nav-link d-flex align-items-center justify-content-center" id="navbarSearchMovil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16">

						<path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path>

					</svg></a>

					<div class="dropdown-menu dropdown-menu-resalt" aria-labelledby="navbarSearchMovil">

						<form id="searchform-2" class="row search-form" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">

							<div class="col">

								<input type="text" id="search" name="s" value="" placeholder="Buscar tema" required class="search-field">

							</div>

							<div class="col-auto">

								<button type="submit" class="d-flex align-items-center"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16"><path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path></svg></button>

							</div>

						</form>

					</div>

				</li>

			</ul>

			<?/* FIN SEARCH MOVIL */?>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

				<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-bars fa-w-14"><path fill="currentColor" d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z" class=""></path></svg>

			</button>



			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<div id="enlace-top" class="d-desktop nav-item"><a href="https://internacional.usil.edu.pe/internacional/" target="_blank">Ir a alumnos internacionales</a></div>

				<ul class="navbar-nav bold altas ml-auto">

					<?/* d-movil: clase para que solo aparezca en móvil */?>

					<hr class="d-lg-none">

					<?php 

					$menu = array(

						1 => array('nosotros','Nosotros','nosotros'),

						2 => array('buscador-de-alianzas','Buscador de Alianzas','buscador-de-alianzas'),

						3 => array('taller-global','Taller Global','taller-global'),

						4 => array('programas/virtuales/intercambio-academico','Programas','programas'),

						5 => array('novedades','Novedades','novedades'),

					);

					foreach($menu as $m) { ?>

					<li id="<?=$m[2]?>" class="nav-item d-flex align-items-center <?=$m[2]?>">

						<a class="nav-link" href="<?php bloginfo('url') ?>/<?=$m[0]?>"><?=$m[1]?></a>

					</li>

					<?php } ?>

					<hr class="d-lg-none">

					<li class="d-lg-none nav-item d-flex align-items-center">

						<a class="nav-link" href="<?php bloginfo('url')?>/podcasts">Podcasts</a>

					</li>

					<li class="d-lg-none nav-item d-flex align-items-center">

						<a class="nav-link" href="<?php bloginfo('url')?>/newsletter">Newsletter</a>

					</li>										

					<li class="d-lg-none nav-item d-flex align-items-center">

						<a class="nav-link" href="<?php bloginfo('url')?>/contacto">Contacto</a>

					</li>

					<li class="d-lg-none nav-item d-flex align-items-center">

						<a class="nav-link" href="<?php bloginfo('url')?>/preguntas-frecuentes">Preguntas frecuentes</a>

					</li>

					<hr class="d-lg-none">

					<li class="nav-item d-none d-lg-block dropdown buscar">

						<a href="" class="nav-link" id="navbarSearch" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16">

							<path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path>

						</svg></a>

						<div class="dropdown-menu dropdown-menu-resalt" aria-labelledby="navbarSearch">



							<form id="searchform-2" class="row search-form" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">

								<div class="col">

									<input type="text" id="search" name="s" value="" placeholder="Buscar tema" required class="search-field">

								</div>

								<div class="col-auto">

									<button type="submit" class="d-flex align-items-center"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16"><path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path></svg></button>

								</div>							

							</form>



							<?php if (have_rows('sugerencias_buscador', 'option')): ?>

								<div id="sugerencias">

									<p style="font-style: italic; margin-top: 5px;">Búsquedas frecuentes</p>									

									<ul class="listado-sugerencias">

										<?php while ( have_rows('sugerencias_buscador', 'option') ) : the_row(); ?>

											<li class="item-listado-sugerencias"><a href="<?php the_sub_field('url_item') ?>"><?php the_sub_field('texto_item') ?></a></li>

										<?php endwhile;?>

									</ul>

								</div>	

							<?php endif ?>					

						</div>

					</li>

					<li class="nav-item d-none d-lg-block dropdown">

						<a href="" class="nav-link" id="navbarConfact" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-bars fa-w-14"><path fill="currentColor" d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z" class=""></path></svg></a>

						<div class="dropdown-menu dropdown-menu-resalt" aria-labelledby="navbarConfact">

							<div class="space-h">

								<a class="dropdown-item" href="<?php bloginfo('url')?>/podcasts"><b>Podcasts</b></a>

								<a class="dropdown-item" href="<?php bloginfo('url')?>/newsletter"><b>Newsletter</b></a>

								<a class="dropdown-item" href="<?php bloginfo('url')?>/contacto"><b>Contacto</b></a>

								<a class="dropdown-item" href="<?php bloginfo('url')?>/preguntas-frecuentes"><b>Preguntas frecuentes</b></a>

								<div class="redes">

									<p>Visita nuestras redes sociales</p>

									<ul class="nolist d-flex">

										<li><a href="//facebook.com/usilinternational.peru" target="_blank">

											<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-facebook-f fa-w-10"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" class=""></path></svg>

										</a></li>

										<li><a href="//instagram.com/usilinternational/" target="_blank">

											<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-instagram fa-w-14"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" class=""></path></svg>

										</a></li>

										<li><a href="//youtube.com/user/usilinternational" target="_blank">

											<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-youtube fa-w-18"><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" class=""></path></svg>

										</a></li>

										<li><a href="https://open.spotify.com/show/6oV2v24FrbixIUTy0t1UsI?si=3b8db4e7550d4931&nd=1" target="_blank">

											<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="spotify" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="svg-inline--fa fa-spotify fa-w-16"><path fill="currentColor" d="M248 8C111.1 8 0 119.1 0 256s111.1 248 248 248 248-111.1 248-248S384.9 8 248 8zm100.7 364.9c-4.2 0-6.8-1.3-10.7-3.6-62.4-37.6-135-39.2-206.7-24.5-3.9 1-9 2.6-11.9 2.6-9.7 0-15.8-7.7-15.8-15.8 0-10.3 6.1-15.2 13.6-16.8 81.9-18.1 165.6-16.5 237 26.2 6.1 3.9 9.7 7.4 9.7 16.5s-7.1 15.4-15.2 15.4zm26.9-65.6c-5.2 0-8.7-2.3-12.3-4.2-62.5-37-155.7-51.9-238.6-29.4-4.8 1.3-7.4 2.6-11.9 2.6-10.7 0-19.4-8.7-19.4-19.4s5.2-17.8 15.5-20.7c27.8-7.8 56.2-13.6 97.8-13.6 64.9 0 127.6 16.1 177 45.5 8.1 4.8 11.3 11 11.3 19.7-.1 10.8-8.5 19.5-19.4 19.5zm31-76.2c-5.2 0-8.4-1.3-12.9-3.9-71.2-42.5-198.5-52.7-280.9-29.7-3.6 1-8.1 2.6-12.9 2.6-13.2 0-23.3-10.3-23.3-23.6 0-13.6 8.4-21.3 17.4-23.9 35.2-10.3 74.6-15.2 117.5-15.2 73 0 149.5 15.2 205.4 47.8 7.8 4.5 12.9 10.7 12.9 22.6 0 13.6-11 23.3-23.2 23.3z" class=""></path></svg>

										</a></li>

									</ul>

								</div>

							</div>

						</div>

					</li>



					

					<li class="d-movil nav-item redes">

						<a>Visita nuestras redes</a>

						<ul class="nolist d-flex">

							<li><a href="//facebook.com/usilinternational.peru" target="_blank">

								<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-facebook-f fa-w-10"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" class=""></path></svg>

							</a></li>

							<li><a href="//instagram.com/usilinternational/" target="_blank">

								<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-instagram fa-w-14"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" class=""></path></svg>

							</a></li>

							<li><a href="//youtube.com/user/usilinternational" target="_blank">

								<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-youtube fa-w-18"><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" class=""></path></svg>

							</a></li>

							<li><a href="https://open.spotify.com/show/6oV2v24FrbixIUTy0t1UsI?si=3b8db4e7550d4931&nd=1" target="_blank">

								<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="spotify" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="svg-inline--fa fa-spotify fa-w-16"><path fill="currentColor" d="M248 8C111.1 8 0 119.1 0 256s111.1 248 248 248 248-111.1 248-248S384.9 8 248 8zm100.7 364.9c-4.2 0-6.8-1.3-10.7-3.6-62.4-37.6-135-39.2-206.7-24.5-3.9 1-9 2.6-11.9 2.6-9.7 0-15.8-7.7-15.8-15.8 0-10.3 6.1-15.2 13.6-16.8 81.9-18.1 165.6-16.5 237 26.2 6.1 3.9 9.7 7.4 9.7 16.5s-7.1 15.4-15.2 15.4zm26.9-65.6c-5.2 0-8.7-2.3-12.3-4.2-62.5-37-155.7-51.9-238.6-29.4-4.8 1.3-7.4 2.6-11.9 2.6-10.7 0-19.4-8.7-19.4-19.4s5.2-17.8 15.5-20.7c27.8-7.8 56.2-13.6 97.8-13.6 64.9 0 127.6 16.1 177 45.5 8.1 4.8 11.3 11 11.3 19.7-.1 10.8-8.5 19.5-19.4 19.5zm31-76.2c-5.2 0-8.4-1.3-12.9-3.9-71.2-42.5-198.5-52.7-280.9-29.7-3.6 1-8.1 2.6-12.9 2.6-13.2 0-23.3-10.3-23.3-23.6 0-13.6 8.4-21.3 17.4-23.9 35.2-10.3 74.6-15.2 117.5-15.2 73 0 149.5 15.2 205.4 47.8 7.8 4.5 12.9 10.7 12.9 22.6 0 13.6-11 23.3-23.2 23.3z" class=""></path></svg>

							</a></li>							

						</ul>

					</li>

				</ul>

			</div>

		</nav>

	</div>

</div>



<?php /*

			<div class="container">

				<div class="row">

					<div class="col-md-12">

						<div id="contenedor-cabecera" class="d-flex justify-content-between align-items-center flex-xs-column">		

							<div class="div-header-1">		

								<div id="logo-site">

									<h1 class="navbar-brand mb-0">

										<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">

											<img src="<?php the_field('logo','option');?>">

										</a>

									</h1>						

								</div>



								<button id="open-menu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

									<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-bars fa-w-14"><path fill="currentColor" d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z" class=""></path></svg>

								</button>

							</div>



							<!-- ******************* The Navbar Area ******************* -->

							<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

								<nav class="navbar">

									<!-- The WordPress Menu goes here -->

									<?php wp_nav_menu(

										array(

											'theme_location'  => 'primary',

											'menu_class'      => 'navbar',

											'fallback_cb'     => '',

											'menu_id'         => 'main-menu',

											'depth'           => 2,

											//'walker'          => new Understrap_WP_Bootstrap_Navwalker(),

										)

									); ?>

								</nav><!-- .site-navigation -->		

							</div><!-- #wrapper-navbar end -->		

						</div>

						

					</div>						

				</div>

			</div>

*/?>





	<script type="text/javascript">

		<?php if (is_page(array(174, 207, 209))): ?>$('li#nosotros').addClass('active')<?php endif ?>

		<?php if (is_page(237)): ?>$('li#buscador-de-alianzas').addClass('active')<?php endif ?>

		<?php if (is_page(239)): ?>$('li#taller-global').addClass('active')<?php endif ?>

		<?php if (is_page(array(2396, 2410, 2212, 2198, 2413, 2196, 2433, 998, 2440, 2444))): ?>$('li#programas').addClass('active')<?php endif ?>

		<?php if (is_page('novedades')  || is_single()): ?>$('li#novedades').addClass('active')<?php endif ?>



	</script>





		</header>





		<div id="content">