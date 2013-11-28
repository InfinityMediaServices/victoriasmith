<?php get_header(); ?>

    <div id="home" class="entry-container">
    
    	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
        	<!--<div class="image-slider flexslider">
            	<ul class="slides">
				<?php 
                    $homeSliderImgs = get_custom_field('home_slider_images');
                    foreach($homeSliderImgs as $homeSliderImg) { 
					
					$imageAttributes = wp_get_attachment_image_src($homeSliderImg, 'home-slider');
				?>
                
                	<li><img src="<?php echo $imageAttributes[0]; ?>" width="<?php echo $imageAttributes[1]; ?>" height="<?php echo $imageAttributes[2]; ?>"></li>
            
				<?php } ?>
            	</ul>
            
            </div>--><!--.image-slider-->
        
        	<div class="image-slider">
            	<ul class="slides">
				<?php 
                    $homeSliderImgs = get_custom_field('home_slider_images');
                    foreach($homeSliderImgs as $homeSliderImg) { 
					
					$imageAttributes = wp_get_attachment_image_src($homeSliderImg, 'home-slider');
				?>
                
                	<li><img src="<?php echo $imageAttributes[0]; ?>" width="<?php echo $imageAttributes[1]; ?>" height="<?php echo $imageAttributes[2]; ?>"></li>
            
				<?php } ?>
            	</ul>
            
            </div><!--.image-slider-->
            
            <div class="home-content row">
            	<div class="span10 offset1">
        
                    <?php the_content(); ?>
                
                    <div id="blocks" class="row-fluid">
                        <div class="block block-one span4">
                        	<div class="row-fluid">
                                <div class="inner-wrapper">
                                    <h3>Upcoming Workshops</h3>
                                    
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta ut lorem gravida venenatis. Ut nec venenatis mauris. </p>
                                    
                                    <p><a href="#" class="read-more">Learn More</a></p>
                                 </div><!--.inner-wrapper-->
                             </div>
                        </div>
                        
                        <div class="block block-two span4">
                        	<div class="row-fluid">
                                <div class="inner-wrapper">
                                    <h3>Upcoming Workshops</h3>
                                    
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta ut lorem gravida venenatis. Ut nec venenatis mauris. </p>
                                    <p><a href="#" class="read-more">Read More</a></p>
                                 </div><!--.inner-wrapper-->
                             </div>
                        </div>
                        
                        <div class="block block-three span4">
                        	<div class="row-fluid">
                                <div class="inner-wrapper">
                                    <h3>Upcoming Workshops</h3>
                                    
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta ut lorem gravida venenatis. Ut nec venenatis mauris. Ut nec venenatis mauris. </p>
                                    <p><a href="#" class="read-more">Book Now</a></p>
                                 </div><!--.inner-wrapper-->
                             </div>
                        </div>
                        
                    </div><!--#blocks-->
            	</div><!--.span10 offset1-->
            </div><!--.home-content-->
        
        <?php endwhile; endif; ?>
    
    </div><!--.entry-container-->

<?php get_footer(); ?>