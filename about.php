<?php
/*
	Template Name:About Us
*/

get_header(); ?>
		 <!--Take a look-->
        <div class="take-a-look">Take a look at what we do</div>        
        <div class="wrapper-content">
            <div class="article-wrapper">
                <div class="top-about-message">
                    Our obsession to build <span>beautiful & meaningful</span> projects 
drives us forward <span>every single day.</span>
                </div>
                <div class="about-separate"></div>
                
            	<?php if(have_posts()) : the_post(); ?> 
                    <p class="about-title"></p>
                    <div class="about-description"><?php the_content(); ?></div>
                    <br /><br />
                <?php endif;?>	
                
                <div>
                	<?php
						$myposts = get_posts(
												array(
													'numberposts'=>4,
													'post_type'=>'page',
													'post_parent'=>78, 
												)
											);
						foreach( $myposts as $post ) :	setup_postdata($post); 
					?>	  	
                        <div class="quality-item">
                            <p class="about-title"><?php the_title(); ?></p>
                            <div class="about-description"><?php the_content(); ?></div>                        
                        </div>
  					<?php endforeach; ?>	                
                </div>
                <div class="clear"></div>
                
                
                <div class="about-separate"></div>
                <p class="dynamic-link about-us-dynamic-link">
                	<a href="<?php echo get_permalink(95);?>">
                    	<span>Contact us today</span>
                    </a>
                </p>
                <div class="about-separate"></div>
                
              	<?php
					$myposts = get_posts(
											array(
												'post_type'=>'page',
												'p'=>110, 
											)
										);
					foreach( $myposts as $post ) :	setup_postdata($post);  
				?>
                    <p class="about-title about-our-team"><?php the_title(); ?></p>
                    <div class="about-description"><?php the_content();?></div>
                    <br /><br />
                <?php 
					endforeach;
				?>
                
                  
                <div>
                    <?php
						$args = array(
								'post_type' =>'profile',
								'order' => 'DESC',
							);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
					?>
                        <div class="employee-item">
                            <a href="<?php the_permalink(); ?>">
                            	<div>
                            		<?php the_post_thumbnail(); ?>
                            	</div>
                            </a>
                            <p class="about-title"><?php the_title(); ?></p>
                            <div class="about-description"><?php the_excerpt(); ?></div>
                        </div>
                        <div class="job-title">
                            <p class="about-title"><?php echo get_post_meta($post->ID, 'job-name', true); ?></p>
                            <div class="about-description"><?php echo get_post_meta($post->ID, 'job-description', true); ?></div>
                            <ul>
                                <?php echo do_shortcode(get_post_meta($post->ID, 'job-detail', true)); ?>
                            </ul>
                        </div>
               		<?php
						endwhile; 
					?>
                        <div class="clear"></div>        
                </div>                                                
                <div class="about-separate"></div>
                <p class="dynamic-link about-us-dynamic-link"><a href="#"><span>How about meeting us?</span></a></p>                     
            </div>
        </div>
    </div>
<?php get_footer(); ?>