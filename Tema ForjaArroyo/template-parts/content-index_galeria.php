<?php
/**
 * Galeria de portada
 *
 * @package ForjaArroyo
 */
?>

<?php
  // Cambiar al identificador de la pagina
  $page = get_page_by_path( 'galeria-portada' );
  $ID_Page = $page->ID;

  $imagenes = get_index_gallery_image_urls( $ID_Page);
  $count = count($imagenes);
?>

<br id="galeria">
<div class="container text-center" id="index_gallery">
    <h2>- Algunos Trabajos en Forja -</h2>
    <h4>Descubra la gran variedad de trabajos en forja artesanal que le ofrecemos</h4>

    <div class="row">

      <?php 
        $contador = 1;
        for($i=0; $i < $count ; $i++){
          echo "<div class='col-xs-12 col-sm-4 img-galleryPort' style='background-image: url(".$imagenes[$i].");'>";
          echo "</div>";
          $contador++;
        }
      ?>

    </div> 

  <br>
  <a href="<?php echo get_home_url(); ?>/galeria/" class="button_anim" role="button" aria-pressed="true">Ver la galeria completa</a>
</div>