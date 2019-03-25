    <div class="footer">
        <div class="footer-content">
           		<?php include(TEMPLATEPATH.'/bottom-menu.php'); ?>
            </ul>        
				<?php $ws_options = get_option( 'ws_theme_options' ); ?>
            	<ul class="social">                
                    <li><a href="http://<?php echo $ws_options['facebook'];?>" class="fb-icon"></a></li>
                    <li><a href="http://<?php echo $ws_options['twitter'];?>" class="t-icon"></a></li>
                    <li><a href="http://<?php  echo $ws_options['linkedin'];?>" class="in-icon"></a></li>                
            	</ul>			             
            <div class="copyright">Copyright © 2012. All rights reserved - Vertiopia Designs</div>
        </div>
    </div>
</body>
</html>