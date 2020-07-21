<?php 
/*
*
* Template Name: Pagina generica
*/ 
?>

<?php
get_header();
get_template_part( 'template-parts/content', 'header_generic' );
?>

<div class="content container">
    <div>
        <h2><?php the_title(); ?></h2> 
    </div>
    
    <!-- CONTENIDO -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
        endwhile; else: ?>
        <p>Sorry, no posts matched your criteria.</p>
    <?php endif; ?>
    <!-- #CONTENIDO -->

</div> <!-- #Container -->

<?php

get_footer();

?>