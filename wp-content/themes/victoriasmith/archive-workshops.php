<?php get_header(); ?>
    
    <div class="entry-container row">
        
		<div class="offset1 span10"> 
        	<?php $workshopsOverview = new WP_Query('pagename=workshops'); 
				if($workshopsOverview->have_posts()) : while($workshopsOverview->have_posts()) : $workshopsOverview->the_post(); ?>
        
                <h2><?php the_title(); ?></h2>
                
                <?php the_content(); ?>
            
            <?php endwhile; endif; ?>

    	<?php 
			//run custom query and order it by date value custom meta
			//the loop through this and test it against current date, throw it in appropriate array based off of that result (store post variable) then do a for each on each of those
			$workshopsAll = new WP_Query('post_type=workshops');
			
			if($workshopsAll->have_posts()) : while($workshopsAll->have_posts()) : $workshopsAll->the_post(); 
				$workshopExpiry = str_replace('-','', get_custom_field('workshop_expiry'));
				$today = date('Ymd');
				
				if($workshopExpiry > $today) {
					$upcomingWorkshops[] = $post;
				} elseif($workshopExpiry < $today) {
					$pastWorkshops[] = $post;	
				}
				endwhile; endif;
<<<<<<< HEAD
				
=======
>>>>>>> eb830e979f2df7848fc67d8f15d19a0be44f53dc
				foreach($upcomingWorkshops as $upcomingWorkshop){ 
					$post = $upcomingWorkshop;
					$wsExpiry = get_custom_field('workshop_expiry');
				?> 
				<h3><?php the_title(); ?></h3>
				<div class="ws-content">
					<?php the_content(); ?>
				</div>
				<div class="ws-expire"><?php echo $wsExpiry; ?></div>
			<?php	}
				
			?>
			
    	</div><!--offset1 span10-->
    </div><!--.entry-container-->

<?php get_footer(); ?>