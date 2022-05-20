<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<footer id="footer" class="seccion-menor wow fadeInUp" data-wow-delay=".45s">
	<div class="container">
		<div id="top-footer" class="row mb-3 justify-content-between">
			<div class="widget-footer col-md-3 col-sm-6 mb-3">
				<h3>NOSOTROS</h3>
				<?php wp_nav_menu( array(
				    'menu'   => 'menu-nosotros',
				    'menu_class' => 'menu-pie'
				) );?>					
			</div>
			<div id="menu-buscador" class="widget-footer col-md-3 col-sm-6 mb-3">
				<?php wp_nav_menu( array(
				    'menu'   => 'menu-buscador-alianzas',
				    'menu_class' => 'menu-pie'
				) );?>					
			</div>				
			<div class="widget-footer col-md-3 col-sm-6 mb-3">
				<h3>PROGRAMAS</h3>
				<?php wp_nav_menu( array(
				    'menu'   => 'menu-programas-footer',
				    'menu_class' => 'menu-pie'
				) );?>					
			</div>		
			<div id="menu-tres" class="widget-footer col-md-3 col-sm-6 mb-3">
				<?php wp_nav_menu( array(
				    'menu'   => 'menu-footer',
				    'menu_class' => 'menu-pie'
				) );?>					
			</div>					
		</div>
		<hr class="borde-white">

		<div id="bottom-footer" class="row justify-content-between">
			<div id="logo-footer" class="widget-footer">
				<img src="<?php the_field('logo_footer','option') ?>">
			</div>
			<div id="suscripcion" class="widget-footer">
				<?php echo do_shortcode('[contact-form-7 id="1259" title="Formulario de suscripción" html_id="form_suscripcion"]') ?>
			</div>
			<div id="redes-footer" class="widget-footer">
				<p>Visita nuestras redes sociales</p>
				<a href="http://facebook.com/usilinternational.peru" target="_blank"><i class="fab fa-facebook-f"></i></a>
				<a href="http://instagram.com/usilinternational/" target="_blank"><i class="fab fa-instagram"></i></a>
				<a href="http://youtube.com/user/usilinternational" target="_blank"><i class="fab fa-youtube"></i></a>
			</div>
		</div>		
	</div>
</footer>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/slick/slick-theme.css"/>

<script defer src="<?php echo get_stylesheet_directory_uri();?>/slick/slick.min.js"></script>

<script defer src="<?php echo get_stylesheet_directory_uri();?>/js/scripts.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<script src="<?php echo get_stylesheet_directory_uri()?>/js/wow.min.js"></script>
<script>new WOW().init();</script>

<script type="text/javascript">
    var $ = jQuery.noConflict();
    $(document).ready(function() {
        $('#programa').val('<?php echo $titulo ?>')
        $('#universidad').val('<?php echo $titulo ?>') 
    });

	
		var clickBotonEventos
		var botonActividades = document.getElementById("enlace-actividades")
		var botonNovedades = document.getElementById("enlace-novedades")
		var myform = document.getElementById("form-filtro");

		function myActividades() {
			var clickBotonEventos = true
			myform.submit();
		}
		botonActividades.addEventListener("click", myActividades);

		function myNovedades() {
			var clickBotonEventos = false
			console.log(clickBotonEventos)
			window.location.replace('<?php echo $home ?>/novedades')
		}
		botonNovedades.addEventListener("click", myNovedades);

</script>

<script src="https://descubre.usil.edu.pe/CDN/disclaimerV2/dist/usilterms.min.js"></script>    
<script>
  var termsOptions2 = {
      formid: "form_suscripcion",
      contentid : "appdpdc2", //Donde se contendrá los input option
      inputname : "ACEPTO_POLITICAS_2", //Atributo name de los input option
      inputid : "ACEPTO_POLITICAS_2", //Atributo id de los input option
      inputvalue : "SI", //Atributo value de los input option
      isrequired : false //True: agrega a los imput option el atributo required
  };
  new UsilTerms(termsOptions2).init();  

	  var termsOptions = {
      formid: "form_contacto",
      contentid : "appdpdc", //Donde se contendrá los input option
      inputname : "ACEPTO_POLITICAS", //Atributo name de los input option
      inputid : "ACEPTO_POLITICAS", //Atributo id de los input option
      inputvalue : "SI", //Atributo value de los input option
      isrequired : false //True: agrega a los imput option el atributo required
  };
  new UsilTerms(termsOptions).init();
</script>

<?php wp_footer(); ?>
</body>
</html>