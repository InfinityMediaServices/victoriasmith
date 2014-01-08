<?php get_header(); ?>
    
<script type="text/javascript">
$(document).ready(function(){

	$('.testimonial-entry').each(function(){

		$(this).find('p').last().addClass('end-quote');	

	});

	$('p.end-quote').append('<img src="<?php bloginfo('template_url'); ?>/images/right-quote.png" width="20" height="15" style="margin-left:5px; position:absolute;" />');

});
</script>
    
    <div id="testimonials" class="entry-container row">

		<div class="offset1 span10">  
        
        	<h2>Client Testimonials</h2>
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            	
                <div class="testimonial">
                    <div class="left-quote"></div>
                    
                    <div class="testimonial-entry">
        
						<?php the_content(); ?>
                    
                        <h4>- <?php the_title(); ?></h4>
                    </div>
                </div>
        
			<?php endwhile; endif; ?>
    	</div>
    </div><!--.entry-container-->

<?php get_footer(); ?>