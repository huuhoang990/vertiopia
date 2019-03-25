<?php
	get_header();
	wp_head();  
?>
    	<!--Take a look-->
        <div class="take-a-look">Take a look at what we do</div>
        <div class="wrapper-content">
            <div class="article-wrapper">
                <?php while ( have_posts() ) : the_post(); ?>
                <p class="title"><?php the_title(); ?></p>
                <div class="short-title">
                   <?php echo get_post_meta($post->ID, 'short-title', true); ?>
                </div>
                <div class="description">
                	<?php 
						if ( has_post_thumbnail() ) {
							echo '<div class="feature-image">';
							the_post_thumbnail();
							echo '</div>';
						}
					?>
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