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
				echo $today;
				
				if($workshopExpiry > $today) {
					$upcomingWorkshops[] = $post;
				} elseif($workshopExpiry < $today) {
					$pastWorkshops[] = $post;	
				}
				foreach($upcomingWorkshops as $upcomingWorkshop){ 
					$post = $upcomingWorkshop;
				?>
					<h3><?php echo $workshopExpiry; ?></h3>
			<?php	}
				endwhile; endif;
				
			?>
			
    	</div><!--offset1 span10-->
    </div><!--.entry-container-->

<?php get_footer(); ?>