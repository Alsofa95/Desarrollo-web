

<div class="row">
                        
                                 
    <div class="col-md-12">
        <div class="col-md-12 blog-content" style="display: block;">

            <!-- Post Headline Start -->
            <div class="post-title">
                <h2><?php the_title(); ?></h2> 
            </div>
            <!-- Post Headline End -->
                
                
            <!-- Post Detail Start -->
            <div class="post-info">
                <i class="far fa-calendar"></i> 
                <span>
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
                </span>
            </div>
            <!-- Etiquetas -->
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

            <hr>
            <!-- Post Detail End -->
            <p><?php the_content();?></p>


        </div>  
    </div>
</div>