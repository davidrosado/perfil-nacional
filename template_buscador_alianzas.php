<?php
/**
Template name: Página Buscador de Alianzas
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>

<?php include 'templates-parts/i_banner_interna_alianzas.php' ?>

<section id="alianzas-internacionales" class="seccion-pagina pb-2 pt-2" style="background: none">
    <div id="selector-carreras" class="bg-celeste pb-3">
        <div class="container wow fadeInUp" data-wow-delay="1s">
            <div class="row justify-content-center text-center">
                <div class="col-md-6 mt-5 mb-3">
                    <h3 class="subtitulo-seccion has-dot">¿QUÉ CARRERA ESTUDIAS?</h3>
                    <?php 
                        $_ID_CARRERA = $_POST['carrera'];
                        $_ID_CONTINENTE = $_POST['id-continente-seleccionado'];
                        $_NOMBRE_CARRERA = $_POST['carrera-seleccionada']; 
                        $_NOMBRE_CONTINENTE = $_POST['continente-seleccionado']; 
                        /*echo $_NOMBRE_CARRERA;
                        echo $_ID_CARRERA;
                        echo ' ';
                        echo $_ID_CONTINENTE;
                        echo $_NOMBRE_CONTINENTE*/
                        ?>

                        <form id="searchform" method="post" action="<?php bloginfo('url') ?>/buscador-de-alianzas/">
                            <div class="select">
                            <select id="campo_carrera" name="carrera" required onclick="universidades()">
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
                        </form>           
                </div>      
            </div>
        </div>
    </div>  

    <div id="selector-continente" class="pb-5">
        <div class="container wow fadeInUp" data-wow-delay="0.75s">
            <div class="row">
                <div class="col-md-12 text-center seccion-pagina pb-0">
                    <h3 class="subtitulo-seccion has-dot">SELECCIONA UN DESTINO</h3>
                </div>
            </div>  

            <div id="listado-continentes" class="row flex-wrap justify-content-center">
                <?php $terms = get_terms('continente', array('hide_empty' => 0, 'parent' =>0)); 
                   foreach($terms as $term) : ?>
                        <?php 
                            $term_id = $term->term_id;
                            $queried_object = get_queried_object(); 
                            $image_id = get_field('bandera', $term, false); 
                            $image = wp_get_attachment_image_src($image_id, $size);
                        ?>
                        <div id="contenedor-continente-<?php echo $term_id ?>" class="item-listado-continentes col-lg-2 col-md-4 col-4 text-center">
                            <h4 id="continente-<?php echo $term_id ?>" data-nombre="<?php echo $term->name;?>">
                                <img src="<?php echo $image[0]; ?>" alt="" title="">
                                <?php echo $term->name;?>
                            </h4>
                        </div>                      
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

                            $('.item-listado-paises.mostrarprevio.mostrarpais').removeClass('mostrarpais')   
                            $('.item-listado-paises.continente-<?php echo $term_id ?>.mostrarprevio').addClass('mostrarpais')    
                            //$('.item-listado-paises.mostrarprevio.mostrarpais').removeClass('mostrarpais')   

                            $continente = $(this).attr('data-nombre')
                            $nombrecarrera = $('#campo_carrera').find(":selected").attr('data-value')
                            $('#resultado-titulo').text('Resultados para: <?php echo $_NOMBRE_CARRERA ?> / ' + $continente)    

                            $('html, body').animate({scrollTop: $("#selector-pais").offset().top}, 1000);
                        });    
                    <?php endforeach; ?>  
                </script>  

            </div>      
        </div>
    </div>
    <hr class="divisor">

    <div id="selector-pais">
        <div class="container wow fadeInUp" data-wow-delay="0.75s">
            <div class="row">
                <div class="col-md-12 text-center py-5">
                    <h3 class="subtitulo-seccion has-dot">SELECCIONA UN PAÍS</h3>
                </div>
            </div>  

            <div id="listado-paises" class="row flex-wrap justify-content-center">
                <?php $terms = get_terms('pais', array('hide_empty' => 0, 'parent' =>0)); 
                   foreach($terms as $term) : ?>
                        <?php 
                            $queried_object = get_queried_object(); 
                            $continente = get_field('continente', $term, false); 
                            $image_id = get_field('bandera', $term, false); 
                            $image = wp_get_attachment_image_src($image_id, $size);
                        ?>
                        <div id="pais-<?php echo $term->slug;?>" class="pais-<?php echo $term->slug;?> item-listado-paises text-center continente-<?php echo esc_html( $continente ); ?>">
                            <figure><img src="<?php echo $image[0]; ?>"/></figure>
                            <h4><?php echo $term->name;?></h4>
                        </div>                        
                <?php endforeach; ?>    

                <script type="text/javascript">
                    <?php $terms = get_terms('pais', array('hide_empty' => 0, 'parent' =>0)); 
                   foreach($terms as $term) : ?>                  
                        $( "#pais-<?php echo $term->slug;?>" ).click(function() {
                            $('.item-listado-paises').removeClass('activado');
                            $(this).toggleClass('activado');
                            $('.fila-universidad').css('display','none')
                            $('.fila-universidad.pais-<?php echo $term->slug;?>').css('display','table-row')
                            $('html, body').animate({scrollTop: $("#resultados").offset().top}, 1000);
                        });  
                    <?php endforeach; ?>  
                </script>  

            </div>      
        </div>
    </div>  
</section>

<section id="resultados" class="seccion pt-0 mb-5"> 
    <div class="container wow fadeInUp" data-wow-delay="0.75s">

        <div class="row">
            <div class="col-md-12">
                <h3 id="resultado-titulo" class="subtitulo-seccion">Resultados: <?php echo $_NOMBRE_CARRERA ?> /  <?php echo $_NOMBRE_CONTINENTE ?></h3>
            </div>
        </div>  

        <div class="row">
            <div id="seccion-universidades" class="col-md-12">
                <?php
                $c = 0;
                $args = array(
                    'post_type'      => 'universidad',
                    'posts_per_page' => -1,
                    'order'          => 'DESC',
                    'orderby'        => 'date',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'carrera',
                            'field'    => 'term_id',
                            'terms'    => $_ID_CARRERA,
                            ),                        
                    ),             
                 );

                $parent = new WP_Query( $args );
                if ( $parent->have_posts() ) : ?>
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr scope="row">
                                <th scope="col">CONTINENTE</th>
                                <th scope="col">PAÍS</th>
                                <th scope="col">CIUDAD</th>
                                <th scope="col">UNIVERSIDAD</th>
                                <th scope="col">QS</th>
                                <th scope="col">CATEGORÍA</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ( $parent->have_posts() ) : $parent->the_post(); $c++;
                            $terms2 = get_the_terms( $post->ID , 'continente' );
                                if ( $terms2 != null ){
                                foreach( $terms2 as $term2 ) {
                                    $continente_universidad = $term2->name;
                                    $continente_id = $term2->term_id;
                                    unset($term2);
                                } 
                            } 
                            $terms3 = get_the_terms( $post->ID , 'pais' );
                                if ( $terms3 != null ){
                                foreach( $terms3 as $term3 ) {
                                    $pais_universidad = $term3->name;
                                    $slug_pais_universidad = $term3->slug;
                                    $continente_pais = get_field('continente');
                                    unset($term3);
                                } 
                            } 
                            $terms4 = get_the_terms( $post->ID , 'ciudad' );
                                if ( $terms4 != null ){
                                foreach( $terms4 as $term4 ) {
                                    $ciudad_universidad = $term4->name;
                                    unset($term4);
                                } 
                            }    
                            $terms5 = get_the_terms( $post->ID , 'categoria_universidad' );
                                if ( $terms5 != null ){
                                foreach( $terms5 as $term5 ) {
                                    $categoria_universidad = $term5->name;
                                    unset($term5);
                                } 
                            } 
                        ?>
                            <tr class="fila-universidad continente-<?php echo $continente_id ?> pais-<?php echo $slug_pais_universidad ?>" data-pais="pais-<?php echo $slug_pais_universidad ?>">
                                <td class="continente_universidad"><?php echo $continente_universidad ?></td>
                                <td class="pais_universidad"><?php echo $pais_universidad ?></td>
                                <td class="ciudad_universidad"><?php echo $ciudad_universidad ?></td>
                                <td class="nombre_universidad"><h4><?php the_title();?></h4></td>
                                <td class="qs_universidad"><?php the_field('qs') ?></th>
                                <td class="categoria_universidad"><?php echo $categoria_universidad ?></td>
                                <td class="enlace_universidad"><a style="color:#fff; cursor: pointer;" class="open-universidad" data-value="<?php echo $_NOMBRE_CARRERA ?>" data-enlace="<?php the_permalink();?>">Ver Universidad</a></td>
                            </tr>                                            
                        <?php endwhile; ?>  

                        <script type="text/javascript">
                            <?php while ( $parent->have_posts() ) : $parent->the_post(); 
                                $terms22 = get_the_terms( $post->ID , 'pais' );
                                if ( $terms22 != null ){
                                    foreach( $terms22 as $term22 ) {
                                        $pais_universidad = $term22->name;
                                        $slug_pais_universidad = $term22->slug;
                                        $continente_pais = get_field('continente');
                                        unset($term22);
                                    } 
                                }
                            ?>                            
                            $('#pais-<?php echo $slug_pais_universidad ?>.item-listado-paises.pais-<?php echo $slug_pais_universidad ?>').addClass('mostrarprevio')
                            <?php endwhile; ?> 
                        </script>   

                        </tbody>
                    </table>                       
                <?php endif; wp_reset_postdata(); ?>
            </div>            
        </div>
    </div>
</section>

<section id="doble-grado" class="bloque-parallax d-flex align-items-center justify-content-center">
    <div class="texto-banner col-md-6 text-center">
        <?php the_field('texto_doble_grado'); ?>
    </div>
</section>

<?php include 'templates-parts/i_novedades.php' ?>

<style type="text/css">
    #selector-continente, #selector-pais {display: none}
    .mostrar {display: inline-block;}
    #selector-continente.mostrar, #selector-pais.mostrar {display: revert;}
    .fila-universidad.mostrar {display: table-row;}
    .item-listado-paises {
        padding: 0 15px;
        width: 100px;
        font-size: 12px;
        margin-bottom: 15px;
    }    
    .item-listado-continentes.activado,
    .item-listado-paises.activado {border: 1px solid #ccc}
    .mostrarprevio.mostrarpais {
        display: revert!important;
    }
</style>

<?php if ($_NOMBRE_CARRERA != '' || $_NOMBRE_CONTINENTE != ''): ?>
    <script type="text/javascript">
        $('#selector-continente').css('display','block')
        $('#resultado-titulo').text('<?php echo $_NOMBRE_CARRERA ?> / <?php echo $_NOMBRE_CONTINENTE ?>')
        //$("#campo_carrera option[value=<?php //echo $_ID_CARRERA ?>]").attr('selected', 'selected');
        $("#contenedor-continente-<?php echo $_ID_CONTINENTE ?>").addClass('activado')
    </script> 
<?php endif ?>

<?php if ($_ID_CARRERA != '' || $_ID_CONTINENTE !=''): ?>
    <script type="text/javascript">
        $("#campo_carrera option[value=<?php echo $_ID_CARRERA ?>]").attr('selected', 'selected');
        $("#contenedor-continente-<?php echo $_ID_CONTINENTE ?>").addClass('activado')
        $(".fila-universidad.continente-<?php echo $_ID_CONTINENTE ?>").css('display', 'table-row')
        $(".item-listado-paises").css('display','none')   
    </script> 
    <?php if ($_ID_CONTINENTE != ' ' ): ?>
        <script type="text/javascript">
            $("#selector-pais").css('display', 'revert')
            $(".item-listado-paises.continente-<?php echo $_ID_CONTINENTE ?>.mostrarprevio").css('display', 'flex')    
            $(".item-listado-paises.continente-<?php echo $_ID_CONTINENTE ?>.mostrarprevio").css('flex-direction', 'column')  
        </script>
    <?php endif ?>
<?php endif ?>

<form id="form-oculto" style="display: none" method="POST" >
    <input type="hidden" name="carrera-enviar" id="carrera-enviar">
</form>

<script type="text/javascript">

    var $ = jQuery.noConflict();

    $(document).ready(function() {
        // document is loaded and DOM is ready
        //alert("document is ready");
        $('html, body').animate({scrollTop: $("#selector-continente").offset().top}, 1000);
    });

    function universidades(){
        $('#campo_carrera').on('change', function() {
            $valor = $(this).find(":selected").attr('data-value')
            $('#carrera-seleccionada').val($valor)    
            $("#searchform").submit();            
        });
        
    }      

    $('.open-universidad').click(function() {
        $carreraenviar = $(this).attr('data-value')
        $action = $(this).attr('data-enlace')
        $('#form-oculto #carrera-enviar').val($carreraenviar)
        $('#form-oculto').attr('action', $action);
        console.log($action)
        $("#form-oculto").submit();
    })
</script>

<?php get_footer(); ?>