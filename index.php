<!--Header-->
	<?php 
		get_header();
		wp_head(); 
	?>
<!--End-Header-->
   
        <!--Take a look-->
        <div class="take-a-look"><?php echo $take_a_look; ?></div>
        <!--Header separate-->
        <div class="wrapper-content">
            
            <!--Top content-->           
            <div class="top-content">
            	<?php
					$args = array(
							'post_type' =>'service',
							'orderby'=>'date',
							'order' => 'asc',
							'posts_per_page'=>4,
						);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
				?>
                    <div class="items">
                        <?php the_post_thumbnail(); ?>
                        <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
                        <p class="short-title"><?php echo get_post_meta($post->ID, 'short-title', true); ?></p>
                        <p class="description"><?php echo get_post_meta($post->ID, 'short-description', true); ?></p>
                        <ul>
                        	<?php echo do_shortcode(get_post_meta($post->ID, 'short-detail', true)); ?>
                            <!--<li>Carpe diam decum solo</li>
                            <li>Vestibulum vel tempus est</li>
                            <li>Etiam eget bibendum</li>
                            <li>Donec consequat tellus </li>-->
                        </ul>
                        <a class="read-more" href="<?php the_permalink(); ?>"><?php echo $more_info; ?></a>                    
                    </div>
               <?php endwhile; ?>
                <div class="clear"></div>
            </div>
            
            <!--Bottom content-->
            <div class="bottom-content">
                <div class="short-about">
                	<?php
						$myposts = get_posts(	array('cat' => 6,
													'post_type'=>'post', 
												)
											);
						foreach( $myposts as $post ) : setup_postdata($post); 
					?>
                    <p class="title"><?php the_title(); ?></p>
                    <p class="short-title"><?php echo get_post_meta($post->ID, 'short-title', true); ?></p>
                    <div class="content"><?php  the_content();?></div>
    				<?php endforeach; ?>
                    
                    <?php
						$myposts = get_posts(	array(
													'post_type'=>'page',
													'p'=>78, 
												)
											);
						foreach( $myposts as $post ) : setup_postdata($post); 
					?>
                    	<a class="read-more" href="<?php the_permalink(); ?>"><?php echo $more_info; ?></a>
                   	<?php endforeach; ?>
                </div>
                
                <div class="our-team">
                	<?php
						$myposts = get_posts(
												array(
													'post_type'=>'page',
													'p'=>110, 
												)
											);
						foreach( $myposts as $post ) : setup_postdata($post);  
					?>
                        <p class="title"><?php the_title(); ?></p>
                        <p class="short-title"><?php echo get_post_meta($post->ID, 'short-title-page', true); ?></p>
                    <?php
						endforeach; 
					?>
                    
                    <ul>
                    	<?php
							$args = array(
								'post_type' =>'profile',
								'order' => 'DESC',
							);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();

						?>
                        <li>
                            <div><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
                            <p class="name"><?php the_title();?></p>
                            <p class="job-name"><?php echo get_post_meta($post->ID, 'job-name', true); ?></p>
                        </li>
                       <?php 
					   	endwhile; 
					   ?>
                    </ul>
                    
                    
                    <div class="clear"></div>
                    <?php
						$myposts = get_posts(
												array(
													'post_type'=>'page',
													'p'=>110, 
												)
											);
						foreach( $myposts as $post ) : setup_postdata($post);  
					?>
                    <a class="read-more" href="<?php the_permalink(); ?>"><?php echo $more_info;?></a>
                    <?php
						endforeach; 
					?>
                </div>
                <div class="clear"></div>                
            </div>
            
            <div class="our-clients">
            	<?php 
					$args=array(
						'post_type'=>'page',
						'p'=>292
					);
					$loop= new WP_Query($args);
					if($loop->have_posts()):$loop->the_post();
				?>
                <p class="title"><?php the_title(); ?></p>
                <p class="short-title"><?php echo get_post_meta($post->ID, 'short-title-page', true); ?></p>
                <?php
					endif; 
				?>
                <div class="client-wrapper-slider">
                    <div class="client-slider-wrapper">
                        <div class="client-slider">
                        	<?php
								 $args = array(
									'post_type' =>'client',
									'order' => 'DESC',
								);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
							?>
                                <a href="http://<?php echo get_post_meta($post->ID, 'link-client', true);?>"><?php the_post_thumbnail(); ?></a>
                            <?php
								endwhile; 
							?>
                        </div>
                    </div>
                    <a href="javascript:;"  id="client_left"></a><a href="javascript:;" id="client_right"></a>                    
                </div>
            </div>
                       
        </div>
    </div>
<!--Footer-->

<?php
	wp_footer(); 
	get_footer(); 
?>
<!--End-Footer-->

        
   