<?php get_header(); ?>
    
    <div id="home" class="entry-container">
    
    	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
        	<div class="image-slider">
            
            </div><!--.image-slider-->
            
            <div class="home-content">
        
                <h2><?php the_title(); ?></h2>
                
                <?php the_content(); ?>
            
                <div id="blocks">
                    <div class="block block-one">
                        <div class="inner-wrapper">
                            <h3>Upcoming Workshops</h3>
                            
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta ut lorem gravida venenatis. Ut nec venenatis mauris. </p>
                         </div><!--.inner-wrapper-->
                    </div>
                    
                    <div class="block block-two">
                        <div class="inner-wrapper">
                            <h3>Upcoming Workshops</h3>
                            
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta ut lorem gravida venenatis. Ut nec venenatis mauris. </p>
                         </div><!--.inner-wrapper-->
                    </div>
                    
                    <div class="block block-three">
                        <div class="inner-wrapper">
                            <h3>Upcoming Workshops</h3>
                            
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta ut lorem gravida venenatis. Ut nec venenatis mauris. Ut nec venenatis mauris. </p>
                         </div><!--.inner-wrapper-->
                    </div>
                    
                    <div style="clear:left;"></div>
                </div><!--#blocks-->
            </div><!--.home-content-->
        
        <?php endwhile; endif; ?>
    
    </div><!--.entry-container-->

<?php get_footer(); ?>