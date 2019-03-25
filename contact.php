<?php
/* 
	Template Name: Contact Page
*/

get_header(); ?>
		<!--Take a look-->
        <div class="take-a-look">Take a look at what we do</div>
		<div class="wrapper-content">     
            <?php while ( have_posts() ) : the_post();?>
            	<div class="contact-form">
					<p class="title">Let's be mighty <span>(together)!</span></p>
                    <?php echo do_shortcode(get_post_meta($post->ID, 'shortcode-contact', true)); ?>
				</div>
                <div class="contact-right">
                    <div class="email-info">
                        <ul>
                       		<?php echo do_shortcode(get_post_meta($post->ID, 'contact-info', true)); ?>
                        </ul>
                    <div class="clear"></div>
                    </div>
                    <div class="where-we-are">
                    <div class="map">
                   		<iframe width="254" height="470" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=vi&amp;geocode=&amp;q=<?php echo get_post_meta($post->ID,'address',true) ?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo get_post_meta($post->ID,'address',true) ?>&amp;t=m&amp;iwloc=&amp;output=embed"></iframe>
                    </div>
                  	<?php the_content(); ?>
                    <div class="clear"></div>
                    </div>
                </div>	   
			<?php endwhile; // end of the loop. ?>                    
        </div>
    </div>
<?php get_footer(); ?>