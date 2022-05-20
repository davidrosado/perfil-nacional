
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function load_posts_by_ajax_callback() {
    check_ajax_referer('load_posts_by_ajax', 'security');

    $carreras = json_decode(stripslashes($_POST['carreras']));
    $continentes = json_decode(stripslashes($_POST['continentes']));
    $paises = json_decode(stripslashes($_POST['paises']));

    $args = array(
      'post_type'      => 'universidad',
      'posts_per_page' => -1,
      'order'          => 'DESC',
      'orderby'        => 'date',
    );

    if((is_array($carreras)  && count($carreras) > 0) || (is_array($continentes) && count($continentes) > 0) || (is_array($paises) && count($paises) > 0)){ 

      $temp = array('relation' => 'AND');
      
      if(count($carreras) > 0){ 
        $temp[] = array(
            'taxonomy' => 'carrera',
            'field'    => 'term_id',
            'terms'    =>  $carreras
        );
      }

      if(count($continentes) > 0){ 
          $temp[] = array(
              'taxonomy' => 'continente',
              'field'    => 'term_id',
              'terms'    => $continentes
          );
      }

      if(count($paises) > 0){ 
          $temp[] = array(
              'taxonomy' => 'pais',
              'field'    => 'term_id',
              'terms'    => $paises
          );
      }      

      $args['tax_query'] = $temp;
    }

    $my_posts = new WP_Query( $args );
    if ( $my_posts->have_posts() ) : ?>
        <table class="table table-striped">
            <thead>
                <tr scope="row">
                    <th scope="col">CONTINTENTE</th>
                    <th scope="col">CIUDAD</th>
                    <th scope="col">PAÍS</th>
                    <th scope="col">UNIVERSIDAD</th>
                    <th scope="col">QR</th>
                    <th scope="col">CATEGORÍA</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody>    	
	        <?php while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
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
	                    <th class="qr_universidad"></th>
	                    <th class="categoria_universidad"><?php echo $categoria_universidad ?></th>
	                    <th class="enlace_universidad"><a href="<?php the_permalink();?>">VER UNIVERSIDAD</a></th>
	                </tr>  
	        <?php endwhile; ?>
            </tbody>
        </table>            
        <?php
    endif;
    wp_die();
}



add_action('wp_ajax_load_continentes_by_ajax', 'load_continentes_by_ajax_callback');
add_action('wp_ajax_nopriv_load_continentes_by_ajax', 'load_continentes_by_ajax_callback');

function load_continentes_by_ajax_callback() {

  check_ajax_referer('load_continentes_by_ajax', 'security');

  //$carreras = json_decode(stripslashes($_POST['carreras']));

  $carreras = array(3);
  $continentes = array(45);
  //$continentes = array();

  /*foreach (get_terms( 'carrera', array( 'hide_empty' => true, 'parent' => 0, 'include' => $carreras)) as $term){
    if( have_rows('filtro_continente', $term->taxonomy . '_' . $term->term_id)){
      while ( have_rows('filtro_continente', $term->taxonomy . '_' . $term->term_id)){
        the_row();
        $continentes[] = get_sub_field('continente')->term_id;
      }
    }
  }*/
  
  $continentes = array_unique($continentes);
  ?>

    <div id="continentes-universidades">
        <h2>Continentes</h2>
        <div id="botones-continentes" class="d-flex">
			<?php
			foreach (get_terms( 'continente', array( 'hide_empty' => true, 'parent' => 0 )) as $term){
			if (in_array($term->term_id, $continentes) || count( $carreras) == 0) {
			?>
			    <div class="item-continente px-3 my-3"><input type="checkbox" id="term-<?php echo $term->term_id; ?>" class="check-continente" name="elcontinente" data-value="<?php echo $term->term_id; ?>" onclick="universidades('continentes');"> <label for="term-<?php echo $term->term_id; ?>"><?php echo $term->name; ?></label></div>
			<?php }
			} ?>
		</div>
	</div>

<?php 
  wp_die();
}

/* CARGAR PAISES EN SU DIV DE FILTRO CORRESPONDIENTE */

add_action('wp_ajax_load_paises_by_ajax', 'load_paises_by_ajax_callback');
add_action('wp_ajax_nopriv_load_paises_by_ajax', 'load_paises_by_ajax_callback');

function load_paises_by_ajax_callback() {

  check_ajax_referer('load_paises_by_ajax', 'security');

  //$continentes = json_decode(stripslashes($_POST['continentes']));

  $continentes = array(45);
  $paises = array(113);
  //$paises = array();

  /*foreach (get_terms( 'pais', array( 'hide_empty' => true, 'parent' => 0, 'include' => $continentes)) as $term){
    if( have_rows('filtro_pais', $term->taxonomy . '_' . $term->term_id)){
      while ( have_rows('filtro_pais', $term->taxonomy . '_' . $term->term_id)){
        the_row();
        $paises[] = get_sub_field('pais')->term_id;
      }
    }
  }*/
  
  $paises = array_unique($paises);
  ?>

    <?php /*
    <div id="paises-universidades">
        <h2>Países</h2>
        <div id="botones-continentes" class="d-flex">
			<?php
			foreach (get_terms( 'pais', array( 'hide_empty' => true, 'parent' => 0 )) as $term){
			if (in_array($term->term_id, $paises) || count( $continentes) == 0) {
			?>
			    <div class="item-continente px-3 my-3"><input type="checkbox" id="term-<?php echo $term->term_id; ?>" class="check-continente" name="elcontinente" data-value="<?php echo $term->term_id; ?>" onclick="universidades('paises');"> <label for="term-<?php echo $term->term_id; ?>"><?php echo $term->name; ?></label></div>
			<?php }
			} ?>
		</div>
	</div>
  */?>

<?php 
  wp_die();
}