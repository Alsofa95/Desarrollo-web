<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ForjaArroyo
 */

get_header();
get_template_part( 'template-parts/content', 'header_generic' );
?>
<div class="content container">
   
    <div class="row" id="list_articulo">
        <div class="col-md-8 shadow-lg container_articulo">
            <!-- <h2 class="text-center">- Entradas recientes -</h2> -->
            <?php
			global $wp_query;
			while ( have_posts() ) :
				the_post();
                get_template_part( 'template-parts/content-preview_post_page', get_post_type() );
            endwhile;
            ?>

            <div class="pagination text-center w-100">
				<?php 
                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $wp_query->max_num_pages,
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

        <div class="col-md-3 shadow-lg container_articulo" id="content_sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div><!-- #row -->
</div> <!-- #Container -->



<?php

get_footer();

?>