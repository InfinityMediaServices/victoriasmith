<?php get_header(); ?>

    <div id="home" class="entry-container">
    
    	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
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
						<?php dynamic_sidebar( 'home_cta' ); ?>
                    </div>
                    
            	</div><!--.span10 offset1-->
            </div><!--.home-content-->
        
        <?php endwhile; endif; ?>
    
    </div><!--.entry-container-->

<?php get_footer(); ?>