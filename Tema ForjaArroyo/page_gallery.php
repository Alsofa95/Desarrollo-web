<?php 
/*
*
* Template Name: Pagina Galeria
*/ 
?>

<?php
get_header();
?>

<!-- ------------------------------------------------------------------ -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/natural-gallery-js/natural-gallery.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/natural-gallery-js/themes/natural.css">
<script src="<?php echo get_template_directory_uri(); ?>/assets/natural-gallery-js/natural-gallery.js" defer></script>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/photoswipe/photoswipe.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/photoswipe/default-skin/default-skin.css">
<script src="<?php echo get_template_directory_uri(); ?>/assets/photoswipe/photoswipe.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/photoswipe/photoswipe-ui-default.min.js"></script>
<!-- ------------------------------------------------------------------ -->

<?php
get_template_part( 'template-parts/content', 'header_generic' );
$page = get_page_by_path( 'galeria' );
$ID_Page = $page->ID;

$imagenes = get_index_gallery_image_urls($ID_Page);
$nombres = get_index_gallery_image_names($ID_Page);
$leyendas = get_index_gallery_image_leyenda($ID_Page);

$php_array = array();
$php_array_names = array();
$php_array_categories = array();
$listado_categorias = array();

foreach($imagenes as $imagen){
    array_push($php_array,strval($imagen[0]));
}

foreach($nombres as $nombre){
    array_push($php_array_names,$nombre);
}

foreach($leyendas as $leyenda){
    array_push($php_array_categories,$leyenda);
    array_push($listado_categorias,$leyenda);
}

$listado_categorias = array_unique($listado_categorias);
?>

<div class="row" id="contenedor_galeria">
    <div class="col-md-2 col-sm-12 clean_padding">
        <div id="option_gallery">
            <div class="shadow-lg list-group text-center">
                <strong id="title_options_cat" class='list-group-item list-group-item-action'>- Nuestros productos -</strong>
                <input type="email" oninput="buscador()" class="form-control list-group-item list-group-item-action" id="buscador_producto" placeholder="Introduce nombre del artículo">
                <br>
                <a onclick='mostrarTodo()' class='list-group-item list-group-item-action' role='button'><strong>Mostrar todo</strong></a>
                <?php
                    foreach($listado_categorias as $categoria){
                        echo "<a onclick='filtrar(this)' class='list-group-item list-group-item-action' role='button'><strong>".$categoria."</strong></a>";
                    }
                ?>
                
            </div>
        </div>
    </div>
    <div class="col-md-10 col-sm-12">
        <div class="shadow-lg bg-more_grey" id="gallery"></div> <!-- #Container -->
    </div>
</div>


<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var gallery;
    var items = [];

    window.addEventListener('load', function() {
        var options = {
            gap: 2,
            rowsPerPage: 0,
            showLabels: 'hover',
            lightbox: true,
            minRowsAtStart: 2,
            selectable: false,
            infiniteScrollOffset: 0 ,
            activable : false,
            columnWidth: 400,
            photoSwipeOptions: {
                escKey: true,
                timeToIdle: 4000,
                fullscreenEl: true,
                zoomEl: true,
                history: false,
                focus: false,
                showAnimationDuration: 0,
                hideAnimationDuration: 0,
                fullscreenEl: true,
                zoomEl: true,
                shareEl: true,
                maxSpreadZoom :2,
            },
        };

        var elementRef = document.getElementById('gallery');
        var photoswipeRef = document.getElementsByClassName('pswp')[0];

        gallery = new NaturalGallery.Masonry(elementRef,options,photoswipeRef);
        gallery.init();
    
        gallery.addEventListener('zoom', function(ev) {
            console.log(ev.detail);
        });

        for (var i = 0; i < items.length; i++) {
            gallery.addItems(items[i]);
        }
    })

    /* ------------------- Array de items ----------------------------- */
    <?php
        $js_array = json_encode($php_array,JSON_UNESCAPED_SLASHES);
        $js_array_names = json_encode($php_array_names,JSON_UNESCAPED_SLASHES);
        $js_array_categories = json_encode($php_array_categories,JSON_UNESCAPED_SLASHES);

        echo "var imagenes = ". $js_array . ";\n";
        echo "var names = ". $js_array_names . ";\n";
        echo "var categorias = ". $js_array_categories . ";\n";
    ?>
   
    

    for (var i = 0; i < imagenes.length; i++) {
        var item = [
        {
            thumbnailSrc: imagenes[i],
            enlargedSrc: imagenes[i],
            enlargedWidth: 1500,
            enlargedHeight: 900,
            title: names[i], 
            linkTarget: '_blank', // _blank | _top | _self | _parent
            color: '#FF5733', // bg color
            category : categorias[i],
        }
        ];
        items.push(item);
    }
</script>

<script>
    function filtrar(categoria) {
        gallery.clear();
        for (var i = 0; i < items.length; i++) {
            if(items[i][0].category == categoria.textContent){
                gallery.addItems(items[i]);
            } 
        }
    }

    function mostrarTodo() {
        gallery.clear();
        for (var i = 0; i < items.length; i++) {
            gallery.addItems(items[i]);
        }
    }

    function buscador(){
        var busqueda = document.getElementById("buscador_producto").value;
        gallery.clear();
        for (var i = 0; i < items.length; i++) {
            console.log(items[i]);
            if(items[i][0].title.includes(busqueda)){
                gallery.addItems(items[i]);
            } 
        }
    }
</script>


<?php
get_footer();
?>