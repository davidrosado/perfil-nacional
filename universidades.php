<?php
/*Template Name: Universidades*/
get_header(); ?>

<div id="banner" class="banner-interna col-md-12">
	<?php the_post_thumbnail('full'); ?>
	<h1 class="text-center"><?php the_title();?></h1>
</div>

<section id="productos" class="seccion">
    <div class="container">

        <div class="row">
            <div id="sidebar-productos" class="col-md-12">
                <div class="filtros-fijos">
                    <div id="carreras-universidades" class="mb-3">
                        <h2>Carreras</h2>
                        <div id="botones-carreras">
                            <select id="campo_carrera" name="carrera" onclick="universidades('carreras');" <?php echo (@$_GET['carrera'] == $term->term_id) ? 'selected' : ''; ?> required>
                                <option value="">Seleccione</option>
                                <?php $terms = get_terms('carrera', array('hide_empty' => 0, 'parent' =>0)); 
                                   foreach($terms as $term) : 
                                   ?>
                                     <option value="<?php echo $term->term_id;?>" id="term-<?php echo $term->term_id; ?>" class="checkbox-categoria"><?php echo $term->name;?></option>
                                <?php endforeach; ?>
                            </select>  

                            <?php /*
                            foreach (get_terms( 'carrera', array( 'hide_empty' => true, 'parent' => 0 )) as $term){
                            ?>
                                <input type="checkbox" class="check-carrera" data-value="<?php echo $term->term_id; ?>" <?php echo (@$_GET['carrera'] == $term->term_id) ? 'checked' : ''; ?> id="term-<?php echo $term->term_id; ?>" name="check-carrera" onclick="universidades('carreras');" /> <label for="term-<?php echo $term->term_id; ?>"><?php echo $term->name; ?></label>
                            <?php } */?>   
                        </div>               
                    </div>

                    <div id="continentes-universidades">
                        <h2>Continentes</h2>
                        <div id="botones-continentes" class="d-flex">
                            <?php 
                            foreach (get_terms( 'continente', array( 'hide_empty' => true, 'parent' => 0 )) as $term){
                            ?>
                            <div class="item-continente px-3 my-3"><input type="checkbox" id="term-<?php echo $term->term_id; ?>" class="check-continente" name="elcontinente" data-value="<?php echo $term->term_id; ?>" onclick="universidades('continentes');"> <label for="term-<?php echo $term->term_id; ?>"><?php echo $term->name; ?></label></div>
                            <?php  } ?>
                        </div>       
                    </div>             

                    <?php /*
                        <div id="paises-universidades">
                            <h2>Países</h2>
                            <div id="botones-continentes" class="d-flex">
                                <?php 
                                foreach (get_terms( 'pais', array( 'hide_empty' => true, 'parent' => 0 )) as $term){
                                ?>
                                <div class="item-pais px-3 my-3"><input type="checkbox" id="term-<?php echo $term->term_id; ?>" class="check-pais" name="elpais" data-value="<?php echo $term->term_id; ?>" onclick="universidades('paises');"> <label for="term-<?php echo $term->term_id; ?>"><?php echo $term->name; ?></label></div>
                                <?php  } ?>
                            </div>       
                        </div>   
                    */?>                   
                </div>
            </div>
        </div>

        <div class="row">
            <div id="seccion-universidades" class="col-md-12 mt-5">
                <?php
                $args = array(
                    'post_type'      => 'universidad',
                    'posts_per_page' => -1,
                    'order'          => 'DESC',
                    'orderby'        => 'date'    
                 );

                $parent = new WP_Query( $args );
                if ( $parent->have_posts() ) : ?>
                    <table class="table table-striped">
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
                        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                        <?php 
                        $terms2 = get_the_terms( $post->ID , 'continente' );
                        if ( $terms2 != null ){
                            foreach( $terms2 as $term2 ) {
                                $continente_universidad = $term2->name;
                                unset($term2);
                            } 
                        } 
                        $terms3 = get_the_terms( $post->ID , 'pais' );
                        if ( $terms3 != null ){
                            foreach( $terms3 as $term3 ) {
                                $pais_universidad = $term3->name;
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
                        }?>
                            <tr>
                                <th class="continente_universidad"><?php echo $continente_universidad ?></th>
                                <th class="pais_universidad"><?php echo $pais_universidad ?></th>
                                <th class="ciudad_universidad"><?php echo $ciudad_universidad ?></th>
                                <th class="nombre_universidad"><h4><?php the_title();?></h4></th>
                                <th class="qs_universidad"></th>
                                <th class="categoria_universidad"><?php echo $categoria_universidad ?></th>
                                <th class="enlace_universidad"><a href="<?php the_permalink();?>">VER UNIVERSIDAD</a></th>
                            </tr>  
                                          
                        <?php endwhile; ?>  
                        </tbody>
                    </table>                       
                <?php endif; wp_reset_postdata(); ?>
            </div>            
        </div>
    </div>
</section>

<script type="text/javascript">

        var $ = jQuery.noConflict();
        var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";

        function universidades(type){
            var carreras = []
            var continentes = []
            var paises = []

            if(type == 'carreras'){
                $('#campo_carrera').each(function() {
                    carreras.push($(this).attr('value'))
                    console.log(carreras)
                })
            }

            if(type == 'continentes'){
                $('.check-continente:checked').each(function() {
                    continentes.push($(this).attr('data-value'))
                    console.log(continentes)
                })
            }

            if(type == 'paises'){
                $('.check-pais:checked').each(function() {
                    paises.push($(this).attr('data-value'))
                    console.log(paises)
                })
            }

            if(type == 'carreras'){
                var data = {
                    'action': 'load_continentes_by_ajax',
                    'security': '<?php echo wp_create_nonce("load_continentes_by_ajax"); ?>',
                    'carreras': JSON.stringify(carreras)
                }

                $.post(ajaxurl, data, function(response) {
                    $('#continentes-universidades').html(response);
                });     
            }

            if(type == 'continentes'){
                var data = {
                    'action': 'load_paises_by_ajax',
                    'security': '<?php echo wp_create_nonce("load_paises_by_ajax"); ?>',
                    'continentes': JSON.stringify(continentes)
                }

                $.post(ajaxurl, data, function(response) {
                    $('#paises-universidades').html(response);
                });     
            }

            var data = {
                'action': 'load_posts_by_ajax',
                'security': '<?php echo wp_create_nonce("load_posts_by_ajax"); ?>',
                'carreras': JSON.stringify(carreras),
                'continentes': JSON.stringify(continentes),
                'paises': JSON.stringify(paises)
            }

            $.post(ajaxurl, data, function(response) {
                $('#seccion-universidades').html(response);
            });  
        }      

        <?php echo (isset($_GET['carrera'])) ? "universidades('carreras')" : ""; ?>
</script>

<?php get_footer(); ?>