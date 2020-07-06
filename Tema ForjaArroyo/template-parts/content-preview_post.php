

<!-- Articulo -->
<div class="col-sm-3" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="thumbnail">
        <a href="<?php echo esc_url( get_permalink()); ?>">
            <img class="img-preview img-responsive img-rounded" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" width="400" height="300">
        </a>
        <a href="<?php echo esc_url( get_permalink()); ?>">
            <p><strong><?php the_title();?></strong></p>
        </a>
        <p>Fecha de la entrada</p>
    </div>
</div>