<?php
		//get id banner
		if(have_posts()):the_post();
			 $id_banner = get_post_meta($post->ID, 'select-banner', true);
		endif;
		//
		$args = array(
					'post_type' =>'banner',
					'order' => 'ASC',
					'posts_per_page'=>1,
					'p' =>$id_banner
				);
		$loop = new WP_Query( $args );
		while($loop->have_posts()):$loop->the_post();
?>
            <div class="banner-content">
                <?php
                    the_content();
                    $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
                ?>
                <a class="circle">
                	<span>
						<?php
							if($_GET['lang']=='vi')
								echo $start="Hãy<br>bắt đầu!";
							else
								echo $start="get<br>started!";
                        ?>
                   </span>
                </a>                
            </div>
            <script type="text/javascript">
                $('.header').css('background',"url('<?php echo $url_thumbnail; ?>') no-repeat top center");
            </script>
<?php 
	endwhile;
?>    