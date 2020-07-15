<?php
/**
 * ForjaArroyo funciones y definiciones
 *
 * @package ForjaArroyo
 */

/**
 * Version lanzada.
 */
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'web_wordpress_setup' ) ) :
	
	function web_wordpress_setup() {
		
		load_theme_textdomain( 'web_wordpress', get_template_directory() . '/languages' );

		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'web_wordpress' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'web_wordpress_setup' );

function forja_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'forja' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'forja' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'forja_widgets_init' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Incrusta scripts y styles.
 */
function forja_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri());
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/index_navigation.js', true );
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/index_slide.js', true );
}
add_action( 'wp_enqueue_scripts', 'forja_scripts' );

/**
 * Obtiene las imagenes de una galeria en pagina especifica
 */

function get_index_gallery_image_urls( $post_id, $number = false ) {

    $post = get_post($post_id);

	$xml = new SimpleXMLElement($post->post_content);
	$resultado = $xml->xpath('/figure/ul/li');

	$retorno = array();

	foreach($resultado as $imagen){
		array_push($retorno, $imagen->figure->img[0]->attributes()->src[0]);
	}
	
	return $retorno;
}

function get_index_gallery_image_names( $post_id, $number = false ) {

    $post = get_post($post_id);

	$xml = new SimpleXMLElement($post->post_content);
	$resultado = $xml->xpath('/figure/ul/li');

	$retorno = array();

	foreach($resultado as $imagen){
		$id = explode("-",$imagen->figure->img[0]->attributes()->class);
		array_push($retorno, get_the_title($id[2]));
	}
	
	return $retorno;
}

function get_index_gallery_image_leyenda( $post_id, $number = false ) {

    $post = get_post($post_id);

	$xml = new SimpleXMLElement($post->post_content);
	$resultado = $xml->xpath('/figure/ul/li');

	$retorno = array();

	foreach($resultado as $imagen){
		$id_imagen = ( $imagen->figure->img[0]->attributes());
		array_push($retorno, wp_get_attachment_caption( $id_imagen[2] ));
	}
	
	return $retorno;
}

// ------------------------------------------------------------------------------------------------------------------------  Pruebas

//Limitar las entradillas

function get_excerpt( $count ) {
	$permalink = get_permalink($post->ID);
	$excerpt = get_the_content();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	
	return $excerpt;
}

//PAGINACION de post
if ( ! function_exists( 'custom_paging_nav' ) ) :
	
	function custom_paging_nav() {
		
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
	
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );
	
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
	
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
	
		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
	
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 3,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => 'Entradas nuevas',
			'next_text' => 'Entradas anteriores',
			'type'      => 'list',
		) );
	
		if ( $links ) :
	
		?>
			<div class="col-12 p-0">
				<nav class="navigation paging-navigation" >
						<?php echo $links; ?>
				</nav><!-- #navigation -->
			</div>
		<?php
		endif;
	}
	endif;