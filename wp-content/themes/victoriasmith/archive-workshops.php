<?php get_header(); ?>
    <!-- archive-workshops.php -->
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
    		$upcomingWorkshops = array();
    		$pastWorkshops = array();
			$workshopsAll = new WP_Query('post_type=workshops');
			if($workshopsAll->have_posts()) : while($workshopsAll->have_posts()) : $workshopsAll->the_post(); 
				$workshopExpiry = strtotime(get_custom_field('workshop_expiry'));
				$today = time();
				
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
					$workshopContact = get_custom_field('workshop_contact');
					$workshopContactSeparated = explode(" | ", $workshopContact);
					$workshopContactName = $workshopContactSeparated[0];
					$workshopContactEmail = $workshopContactSeparated[1];
                ?> 
                <div class="ws-content">
                    <h4><?php the_title(); ?></h4>
                        <p class="ws-meta"><?php if($workshopDate != '') { echo $workshopDate; } ?>
                        <?php if($workshopLocation != '') { echo '<br />' . $workshopLocation; } ?></p>
                        <?php the_content(); ?>
                        <?php if($workshopContact != '') { ?>
                        	<p>Contact: <a href="mailto:<?php echo $workshopContactEmail?>"><?php echo $workshopContactName; ?></a></p>
                        <?php } ?>
                </div>
			<?php } endif; ?>
			
    	</div><!--offset1 span10-->
    </div><!--.entry-container-->

<?php get_footer(); ?>