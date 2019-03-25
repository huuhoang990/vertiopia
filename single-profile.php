<?php
	get_header();
	wp_head();   
?>
		 <!--Take a look-->
        <div class="take-a-look">Take a look at what we do</div>
        <!--Header separate-->
        <div class="wrapper-content">
            <div class="article-wrapper">
                <?php while ( have_posts() ) : the_post(); ?>
                <p class="title"><?php the_title(); ?></p>
                <div class="short-title">
                    <?php the_excerpt();?>
                </div>
                <div class="description">
                    <?php
                        //$my_thumb = get_the_post_thumbnail($post->ID);
                        
                        if(has_post_thumbnail( $post->ID) ){
                            
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full')  ;                          
                        }
                                
				    ?>
                    <div class="feature-image"><?php if(has_post_thumbnail( $post->ID)){?><img src="<?php  echo $image[0];?>" /><?php }?></div>
                    
                    <?php the_content();?>                
                </div>
				<?php endwhile; // end of the loop. ?>                
            </div>
        </div>
    </div>
<?php 
	wp_footer(); 
	get_footer(); 
?>