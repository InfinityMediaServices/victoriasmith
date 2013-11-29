<?php get_header(); ?>
    
    <div class="entry-container row">
    	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
		<div class="offset1 span10">  
        
            <h2><?php the_title(); ?></h2>
            
            <?php the_content(); ?>
    	</div>
                        
        <?php endwhile; endif; ?>
    </div><!--.entry-container-->

<?php get_footer(); ?>