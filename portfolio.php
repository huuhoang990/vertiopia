<?php
/*
	Template name:portfolio page
*/

get_header(); ?>
		  <!--Take a look-->
        <div class="take-a-look">Take a look at what we do</div>
        <div class="wrapper-content"> 
            <div class="porfolio-link">
                <ul>
                    <?php
						$args = array(
							'taxonomy'=> 'portfolio-category',
							'title_li'           => __( '' ),
						); 
						wp_list_categories($args); 
					?>
                </ul>
            </div>
            
            <div class="clear"></div>
            <div class="portfolio-text"><img src="<?php echo get_template_directory_uri(); ?>/images/star-icon.png"/>&nbsp;Web & Mobile Design</div>
            <div class="project-list">
              	<?php
					$args = array(
						'post_type' =>'portfolio',
						'order' => 'DESC',
						
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
				?>
                         <div class="project-item">
                            <div class="title"><?php the_title(); ?></div>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            <a href="#" class="sample-link"></a>
                            <div class="description">
                                <b>Project type:</b><?php echo get_post_meta($post->ID, 'project-type', true); ?><br /><br />
                                <b>Industry:</b><?php echo get_post_meta($post->ID, 'industry', true); ?>
                            </div>
                            <div class="task">
                                <ul>
                                    <li><a href="<?php echo 'http://'.get_post_meta($post->ID, 'visit-site', true); ?>">visit site</a></li>
                                    <li class="or">-or-</li>
                                    <li><a href="<?php the_permalink(); ?>">view info & screenshots</a></li>
                                </ul>
                            </div>
                        </div>
              
            	 <?php 
					endwhile; 
				?>
                
                <div class="clear"></div>
                <!--<div class="paging">
                    <ul>
                        <li><a href="#" class="pre"></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#" class="active">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#" class="next"></a></li>
                    </ul>
                </div>-->
                <!--<div class="clear"></div>-->
                           
            </div>
                       
        </div>
    </div>
<?php get_footer(); ?>