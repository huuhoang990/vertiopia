<?php
/*
	Template name:Our Team
*/
	get_header(); 
	wp_head(); 
?>
		 <!--Take a look-->
        <div class="take-a-look">Take a look at what we do</div>
        <!--Header separate-->
        <div class="wrapper-content">
            <div class="article-wrapper">
                <?php if(have_posts()): the_post();?>
                	<p class="title"><?php the_title(); ?></p>
                	<div class="description">
                    	<?php the_content();?>                
                	</div>
				<?php endif;?>
      		<div>
            	<?php
			
					$myposts = get_posts(
										 array(
												'post_type'=>'profile', 
											)
										);
					foreach( $myposts as $post ) :	setup_postdata($post); 
				?>             
                <div class="member-list">
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                    <p class="title"><?php the_title(); ?></p>
                    <p class="short-title"><?php echo get_post_meta($post->ID, 'job-name', true); ?></p>
                </div>
                <?php
					endforeach; 
				?>
                </div>                 
            </div>
        </div>
    </div>
<?php
	wp_footer();  
	get_footer(); 
?>