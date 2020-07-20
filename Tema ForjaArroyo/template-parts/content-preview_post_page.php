
<!-- Lista post -->
<div class="col-md-12" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            	
    <div class="col-md-12 blog-post">
        <div class="post-image">
            <a href="<?php echo esc_url( get_permalink()); ?>">
                <img class="img-post shadow" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">   
            </a>                                    
        </div> 
        <div class="post-title">
            <a href="<?php echo esc_url( get_permalink()); ?>"><h2><?php the_title();?></h2></a>
        </div>  
        <div class="post-info">

            <span>
                <i class="far fa-calendar"></i> 
                <?php echo the_time('j \d\e\ F, Y'); ?> / 
                <i class="far fa-user"></i> 
                <?php 
                //the_author_meta( 'user_nicename' , $post->post_author );
                $fname = get_the_author_meta('first_name');
                $lname = get_the_author_meta('last_name');
                $full_name = '';

                if( empty($fname)){
                    $full_name = $lname;
                } elseif( empty( $lname )){
                    $full_name = $fname;
                } else {
                    $full_name = "{$fname} {$lname}";
                }

                echo $full_name;
                ?>

                
                
                <h6>
                    <?php 
                        $post_tags = get_the_tags();
                        if ( $post_tags ) {
                            foreach( $post_tags as $tag ) {
                                echo "<a href='".get_site_url()."/tag/".$tag->slug."'>";
                                echo "<span class='badge badge-secondary p-1 mr-1'>".$tag->name."</span>";
                                echo "</a>";
                            }
                        }
                    ?>
                </h6>
            </span>
        </div>  
        <p><?php echo get_excerpt( 300 )?>... 
        <a href="<?php echo esc_url( get_permalink()); ?>" class="boton_articulo"><h4>- Leer articulo -</h4></a></p> 

        <?php
            $categories = get_the_category();
            
            if ( ! empty( $categories ) ) {
                for($i = 0 ; $i < sizeof($categories);$i++){
                    echo '<a class="link_preview_post" href="' . esc_url( get_category_link( $categories[$i]->term_id ) ) . '">' . esc_html( $categories[$i]->name ) . '</a> ';	
                }
            }
        ?> 
        
    </div>
    

</div>
