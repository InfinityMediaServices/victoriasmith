<?php 
/* Template Name: Collaborative Practice and Mediation Pages */
get_header(); ?>
    
    <div id="collaborative-process" class="entry-container row">
    	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
		<div class="offset1 span7">  
        
            <h2><?php the_title(); ?></h2>
            
            <?php the_content(); ?>
    	</div>
        
        <div id="blocks" class="span3">
            <?php dynamic_sidebar( 'collab_mediation' ); ?>
        </div>
        
        <?php endwhile; endif; ?>
    </div><!--.entry-container-->

<?php get_footer(); ?>