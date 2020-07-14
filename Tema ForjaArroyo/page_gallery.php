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
$imagenes = get_index_gallery_image_urls(42);
$nombres = get_index_gallery_image_names(42);
$php_array = array();

foreach($imagenes as $imagen){
    array_push($php_array,strval($imagen[0]));
}
?>

<div class="shadow-lg bg-more_grey" id="gallery"></div> <!-- #Container -->

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
    window.addEventListener('load', function() {
        var options = {
            gap: 4,
            rowsPerPage: 0,
            showLabels: 'hover',
            lightbox: true,
            minRowsAtStart: 2,
            selectable: false,
            infiniteScrollOffset: 0 ,
            activable : true,
            itemsPerRow: 6,
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

        var gallery = new NaturalGallery.Square(elementRef,options,photoswipeRef);
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
        echo "var imagenes = ". $js_array . ";\n";
    ?>
   
    var items = [];

    for (var i = 0; i < imagenes.length; i++) {
        var item = [
        {
            thumbnailSrc: imagenes[i],
            // thumbnailWidth: 400,
            // thumbnailHeight: 300,
            enlargedSrc: imagenes[i],
            enlargedWidth: 1500,
            enlargedHeight: 900,
            title: 'Image 123123', 
            linkTarget: '_blank', // _blank | _top | _self | _parent
            color: '#FF5733', // bg color
            link : '#',
        }
        ];
        items.push(item);
    }
</script>

<?php
get_footer();
?>