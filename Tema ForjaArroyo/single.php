<?php
/**
 * Plantilla para mostrar articulos
 *
 * @package ForjaArroyo
 */

get_header();
get_template_part( 'template-parts/content', 'header_generic' );
$categories="";
?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v7.0" nonce="XBdCH1l1"></script>

<div class="content container">
   
   <div class="row" id="list_articulo">
	   <div class="col-md-8 shadow-lg container_articulo">
		   <?php
				while ( have_posts() ) :
				the_post();
				$categories = get_the_category();
				get_template_part( 'template-parts/content-contenido_articulo'); 
				
				endwhile; // End the loop.
		   ?>

			<hr>
		   <!-- Compartir del POST -->
		   	<div class="container">
			   <div class="fb-share-button" 
				data-href="https://developers.facebook.com/docs/plugins/" 
				data-layout="button_count" data-size="large">
				<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" 
				class="fb-xfbml-parse-ignore"></a>
			   </div>

			   <div class="fb-like" 
			   data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="button" data-action="like" 
			   data-size="large" data-share="false"></div>
				
			</div>

		   <hr>
		   <!-- Categorias del POST -->
		   	<div class="row">
				<div class="col-md-3"><h2>Categoria:  </h2></div>
				<div class="col-md-9">
					<h3>
					<?php 
						if ( ! empty( $categories ) ) {
							for($i = 0 ; $i < sizeof($categories);$i++){
								echo '<a class="link_post" href="' . esc_url( get_category_link( $categories[$i]->term_id ) ) . '">' . esc_html( $categories[$i]->name ) . '</a> ';	
							}
						} 
					?>
					</h3>
				</div>
			</div>	

		   <hr>
		   <!-- Relacionados del POST -->
		   <h2>Artículos relacionados:</h2>
	   </div>

	   <div class="col-md-3 shadow-lg container_articulo" id="content_sidebar">
		   <?php get_sidebar(); ?>
	   </div>
   </div><!-- #row -->
</div> <!-- #Container -->



<?php
get_footer();
?>
