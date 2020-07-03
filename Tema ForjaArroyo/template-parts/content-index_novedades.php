<?php
/**
 * Novedades de portada
 *
 * @package ForjaArroyo
 */
?>

<!-- ---------------------------------------------------------------------------------------- Container (Novedades Section) -->
<div id="novedades" class="container-fluid text-center bg-grey">
  <div class="container">
    <h2>- NOVEDADES -</h2>
    <h4>Enterate de todas nuestras novedades, trabajos en curso y de todos nuestros proyectos futuros.</h4>
    <div class="row text-center">

      <?php
        if ( have_posts() ) :
        while ( have_posts() ) :

            the_post();
            get_template_part( 'template-parts/content-preview_post', get_post_type() );

        endwhile;

      ?>

      <?php else : ?>
        <h2>Sin publicaciones</h2>
      <?php endif; ?>
      
    </div>
    <a href="#" class="btn btn-grey btn-lg active" role="button" aria-pressed="true">Ver todas las entradas</a>

    </div><br > <!-- #Container-->  
</div>
<!-- ----------------------------------------------------------------------------------------------------- #FinNovedades -->
