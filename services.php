<?php
/*
	Template name: Service page
*/
get_header(); ?>
		 <!--Take a look-->
        <div class="take-a-look">Take a look at what we do</div>        
        <div class="wrapper-content">
            <div class="article-wrapper">
                <div>
                	<?php
						$count=0;
						$args = array(
							'post_type' =>'service',
							'order' => 'ASC',
							'posts_per_page'=>4,
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
						$count++; 
					?>
                    <div class="service-list">
                        <p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                        <p class="short-title"><?php echo get_post_meta($post->ID, 'short-title', true); ?></p>
                        <a href="<?php the_permalink(); ?>">
                        	<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('service', 'secondary-image'); endif; ?>
                      	</a> 
                        <div class="description"><?php the_excerpt();?></div>                       
                    </div>
                    <?php
						if($count%2==0){
							echo '<div class="clear"></div>';
							echo  '<div class="service-separate"></div>';                    
						}
						endwhile;
					?>      
                </div>
                
                <p class="dynamic-link"><a href="<?php echo get_permalink(15);?>"><span>Here is our portfolio</span></a></p>
                                
            </div>
        </div>
    </div>
<?php get_footer(); ?>