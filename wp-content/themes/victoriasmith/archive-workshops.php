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
				endwhile; endif; ?>
                <?php if(!empty($upcomingWorkshops)): ?>
            <h3>Upcoming Collaborative Workshops</h3>

			<?php foreach($upcomingWorkshops as $upcomingWorkshop){ 
                    $post = $upcomingWorkshop;
					setup_postdata($post);
					$workshopDate = get_custom_field('workshop_date');
					$workshopLocation = get_custom_field('workshop_location');
                ?> 
                <div class="ws-content">
                    <h4><?php the_title(); ?></h4>
                        <p class="ws-meta"><?php if($workshopDate != '') { echo $workshopDate; } ?>
                        <?php if($workshopLocation != '') { echo '<br />' . $workshopLocation; } ?></p>
                        <?php the_content(); ?>
                </div>
			<?php } endif; ?>

            <?php if(!empty($upcomingWorkshops)): ?>
            <h3>Past Collaborative Workshops</h3>

			<?php foreach($pastWorkshops as $pastWorkshop){ 
                    $post = $pastWorkshop;
					setup_postdata($post);
					$workshopDate = get_custom_field('workshop_date');
					$workshopLocation = get_custom_field('workshop_location');
					$year = substr($workshopDate, -4);
                ?> 
                <div class="post-ws-content ws-content">
                    <h4><?php the_title(); ?></h4>
                        <?php if($workshopLocation != '') { echo $workshopLocation; } ?></p>
                        <?php the_content(); ?>
                        <?php echo $year; ?>
                </div>
			<?php } endif;?>
			
    	</div><!--offset1 span10-->
    </div><!--.entry-container-->

<?php get_footer(); ?>