<?php
/**
 * Galeria de portada
 *
 * @package ForjaArroyo
 */
?>

<?php
  // Cambiar al identificador de la pagina
  $imagenes = get_index_gallery_image_urls(33);
  $nombres = get_index_gallery_image_names(33);
  $count = count($imagenes);

?>

<br id="galeria">
<div class="container gallery text-center">

  <?php 
    foreach($imagenes as $imagen){
      echo "<div class='mySlides shadow-lg'>";
      echo "  <img src='".$imagen."' style=width:80%>";
      echo "</div>";
    }
  ?>

  <div class="caption-container">
    <h2 id="caption"></h2>
  </div>

  <div class="row">

    <?php 
      $contador = 1;
     for($i=0; $i < $count ; $i++){
        echo "<div class='col-xs-4 col-sm-2'>";
        echo "  <img class='demo cursor' src='".$imagenes[$i]."' style='width:100%' onclick='currentSlide(".$contador.")' alt='".$nombres[$i]."'>";
        echo "</div>";
        $contador++;
      }
    ?>

  </div> 

  <br>
  <a href="#" class="btn btn-grey btn-lg active" role="button" aria-pressed="true">Ver la galeria completa</a>
</div>