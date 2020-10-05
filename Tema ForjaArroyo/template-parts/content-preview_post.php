

<!-- Articulo -->
<div class="col-sm-3" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="thumbnail shadow">
        <a href="<?php echo esc_url( get_permalink()); ?>">
            <img class="img-preview img-responsive img-rounded" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" width="400" height="300">
        </a>
        <a href="<?php echo esc_url( get_permalink()); ?>">
            <p><strong><?php the_title();?></strong></p>
        </a>
        <p>  <?php echo the_time('j \d\e\ F, Y'); ?></p>
    </div>
</div>