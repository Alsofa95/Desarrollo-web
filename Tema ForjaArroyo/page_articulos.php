<?php 
/*
*
* Template Name: Pagina listado articulos
*/
 
?>

<?php
get_header();
get_template_part( 'template-parts/content', 'header_generic' );
?>

<div class="content container">
   
    <div class="row">
        <div class="col-md-8" id="content_articulo">
            <!-- <h2 class="text-center">- Entradas recientes -</h2> -->
            <?php

            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 10,
            );
            $arr_posts = new WP_Query( $args );

            
            while ( $arr_posts->have_posts() ) :

                $arr_posts->the_post();
                get_template_part( 'template-parts/content-preview_post_page', get_post_type() );

            endwhile;
            wp_reset_query();
            ?>
        </div>

        <div class="col-md-4 bg-grey shadow-lg" id="content_sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div><!-- #row -->
</div> <!-- #Container -->


<?php
get_footer();

?>