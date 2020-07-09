<?php
/**
 * Plantilla para mostrar articulos
 *
 * @package ForjaArroyo
 */

get_header();
get_template_part( 'template-parts/content', 'header_generic' );
?>

<div class="content container">
   
   <div class="row">
	   <div class="col-md-8 shadow-lg" id="content_articulo">
		   <?php
				while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content-contenido_articulo'); 
				
				endwhile; // End the loop.
		   ?>

		   <hr>
		   <h2>Categoria:</h2>
		   <hr>
		   <h2>Artículos relacionados:</h2>
	   </div>

	   <div class="col-md-3 shadow-lg" id="content_sidebar">
		   <?php get_sidebar(); ?>
	   </div>
   </div><!-- #row -->
</div> <!-- #Container -->



<?php
get_footer();
?>
