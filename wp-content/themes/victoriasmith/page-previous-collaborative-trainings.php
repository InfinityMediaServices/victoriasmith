<?php 
/* Template Name: Previous Collaborative Trainings */
get_header(); ?>
    
    <div id="collaborative-process" class="entry-container row">
    	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
		<div class="offset1 span7">  
        
            <h2><?php the_title(); ?></h2>
            
            <?php the_content(); ?>
    	<?php 
			//run custom query and order it by date value custom meta
			//the loop through this and test it against current date, throw it in appropriate array based off of that result (store post variable) then do a for each on each of those
    		$pastWorkshops = array();
			$workshopsAll = new WP_Query('post_type=workshops&showposts=-1&orderby=meta_value&meta_key=workshop_expiry');
			if($workshopsAll->have_posts()) : while($workshopsAll->have_posts()) : $workshopsAll->the_post(); 
				$workshopExpiry = strtotime(get_custom_field('workshop_expiry'));
				$today = time();
				if($workshopExpiry < $today) {
					$pastWorkshops[] = $post;	
				}
				endwhile; endif; 
			?>

            <?php if(!empty($pastWorkshops)): 
				$headerYear = '';
			?>

			<?php foreach($pastWorkshops as $pastWorkshop){ 
                    $post = $pastWorkshop;
					setup_postdata($post);
					$workshopDate = get_custom_field('workshop_date');
					$workshopLocation = get_custom_field('workshop_location');
					$year = substr($workshopDate, -4);
					
					if($year !== $headerYear){ 
						$headerYear = $year;
						echo "<h3>$year</h3>";
					}
                ?> 
                <div class="post-ws-content ws-content">
                    <h4><?php the_title(); ?></h4>
                        <?php if($workshopLocation != '') { echo $workshopLocation; } ?></p>
                        <?php the_content(); ?>
                </div>
			<?php } endif;?>

    	</div><!--.offset1 span7-->
        
        <div id="blocks" class="span3">
            <?php dynamic_sidebar( 'collab_pro' ); ?>
        </div>

        <?php endwhile; endif; ?>
    </div><!--.entry-container-->

<?php get_footer(); ?>