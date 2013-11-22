<?php get_header(); ?>
    
    <div class="entry-container row">
    	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
        <?php if(has_post_thumbnail()) { ?>
			<div class="post-thumbnail span2">
            	<?php the_post_thumbnail('featured-siderail');	 ?>
            </div><!--.post-thumbnail-->
		
            <div class="shifted-content span10">
                <h2><?php the_title(); ?></h2>
            
                <?php the_content(); ?>
            
            </div><!--shifted-content-->
		<?php } else { ?>
		<div class="offset1 span10">  
        
            <h2><?php the_title(); ?></h2>
            
            <?php the_content(); ?>
    	</div>
        
        <?php } ?>
                
        <?php endwhile; endif; ?>
    </div><!--.entry-container-->

<?php get_footer(); ?>