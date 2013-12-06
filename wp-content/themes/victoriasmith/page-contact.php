<?php 
/* Template Name: Contact Page */
get_header(); ?>

<script type="text/javascript">
function do_box_resize(){
   var maxHeight = -1;
   $('.block').height('auto').each(function() {
		   maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
   });
   $('.block').each(function() {
		   $(this).height(maxHeight);
   });
}

jQuery(document).ready(function($){
	// set featured boxes to same height
	$(window).resize(do_box_resize);
	do_box_resize();
});
</script>
    
    <div class="entry-container row">
    	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
		<div class="offset1 span10">  
        
            <h2><?php the_title(); ?></h2>
            
            <?php the_content(); ?>

            <div id="blocks" class="row-fluid">
                <?php dynamic_sidebar( 'contact_cta' ); ?>
            </div>
    	</div>
        
        <?php endwhile; endif; ?>
    </div><!--.entry-container-->

<?php get_footer(); ?>