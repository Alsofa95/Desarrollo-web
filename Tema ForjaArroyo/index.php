<?php
/**
 * Pagina principal del tema
 *
 * @package ForjaArroyo
 */

get_header();
?>

<?php
get_template_part( 'template-parts/content', 'header_index' );
get_template_part( 'template-parts/content', 'index_cartelera' );
get_template_part( 'template-parts/content', 'index_novedades' );
get_template_part( 'template-parts/content', 'index_about' );
get_template_part( 'template-parts/content', 'index_galeria' );
get_template_part( 'template-parts/content', 'index_opiniones' );
get_template_part( 'template-parts/content', 'index_contacto' );
?>

<?php
get_footer();
