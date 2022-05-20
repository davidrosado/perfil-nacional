<?php

remove_action('future_post', '_future_post_hook');
add_filter( 'wp_insert_post_data', 'nacin_do_not_set_posts_to_future' );

function nacin_do_not_set_posts_to_future( $data ) {
    if ( $data['post_status'] == 'future' && $data['post_type'] == 'post' )
        $data['post_status'] = 'publish';
    return $data;
}

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
	        <?php while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
              <?php 
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
                    <td  class="qs_universidad"></th>
                    <td class="categoria_universidad"><?php echo $categoria_universidad ?></td>
                    <td class="enlace_universidad"><a href="<?php the_permalink();?>">Ver Universidad</a></td>
	                </tr>  
                  <script type="text/javascript">
                    $('#pais-<?php echo $slug_pais_universidad ?>.item-listado-paises.pais-<?php echo $slug_pais_universidad ?>').addClass('mostrarprevio') 
                    /*$("#pais-<?php //echo $slug_pais_universidad ?>.continente-<?php //echo $continente_id ?>").css('display','flex!important')    
                    $("#pais-<?php //echo $slug_pais_universidad ?>").css('text-decoration','underline')   
                    $("#pais-<?php //echo $slug_pais_universidad ?>.continente-<?php //echo $continente_id ?>").css('flex-direction','column')*/
                  </script>                  
	        <?php endwhile; ?>
            </tbody>
        </table>            
        <?php
    endif;
    wp_die();
}


add_action('wp_enqueue_scripts', function() {
  wp_enqueue_script('autocomplete-search', get_stylesheet_directory_uri() . '/js/autocomplete.js', 
    ['jquery', 'jquery-ui-autocomplete'], null, true);
  wp_localize_script('autocomplete-search', 'AutocompleteSearch', [
    'ajax_url' => admin_url('admin-ajax.php'),
    'ajax_nonce' => wp_create_nonce('autocompleteSearchNonce')
  ]);
 
  $wp_scripts = wp_scripts();
  wp_enqueue_style('jquery-ui-css',
        '//ajax.googleapis.com/ajax/libs/jqueryui/' . $wp_scripts->registered['jquery-ui-autocomplete']->ver . '/themes/smoothness/jquery-ui.css',
        false, null, false
    );
});
 
add_action('wp_ajax_nopriv_autocompleteSearch', 'awp_autocomplete_search');
add_action('wp_ajax_autocompleteSearch', 'awp_autocomplete_search');
function awp_autocomplete_search() {
  check_ajax_referer('autocompleteSearchNonce', 'security');
 
  $search_term = $_REQUEST['term'];
  if (!isset($_REQUEST['term'])) {
    echo json_encode([]);
  }
 
  $suggestions = [];
  $query = new WP_Query([
    's' => $search_term,
    'posts_per_page' => -1,
  ]);
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $suggestions[] = [
        'id' => get_the_ID(),
        'label' => get_the_title(),
        'link' => get_the_permalink()
      ];
    }
    wp_reset_postdata();
  }
  echo json_encode($suggestions);
  wp_die();
}

?>