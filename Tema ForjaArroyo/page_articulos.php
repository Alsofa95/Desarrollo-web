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
        <div class="col-md-8 shadow-lg" id="content_articulo">
            <!-- <h2 class="text-center">- Entradas recientes -</h2> -->
            <?php

            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'paged' => $paged,
            );
            $query = new WP_Query( $args );

            
            while ( $query->have_posts() ) :

                $query->the_post();
                get_template_part( 'template-parts/content-preview_post_page', get_post_type() );

            endwhile;
            ?>

            <div class="pagination text-center w-100">
                <?php 
                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $query->max_num_pages,
                        'current'      => max( 1, get_query_var( 'paged' ) ),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 2,
                        'mid_size'     => 1,
                        'prev_next'    => true,
                        'prev_text'    => sprintf( '<strong class="pagination_next"> %1$s </strong>', __( 'Artículos recientes', 'text-domain' ) ),
                        'next_text'    => sprintf( '<strong class="pagination_prev"> %1$s </strong>', __( 'Artículos anteriores', 'text-domain' ) ),
                        'add_args'     => false,
                        'add_fragment' => '',
                        'before_page_number' => '<strong> ',
                        'after_page_number' => '</strong>',
                    ) );
                ?>
            </div>
        </div>

        <div class="col-md-3 shadow-lg" id="content_sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div><!-- #row -->
</div> <!-- #Container -->



<?php

get_footer();

?>