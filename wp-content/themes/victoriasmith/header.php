<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/responsive.css" />
<link href='http://fonts.googleapis.com/css?family=Signika+Negative' rel='stylesheet' type='text/css'>

<title><?php
        if ( is_single() ) { single_post_title(); print ' | '; bloginfo('name'); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); }
        elseif ( is_page() ) { single_post_title(''); print ' | '; bloginfo('name'); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { wp_title(''); print ' | '; bloginfo('name'); }
    ?></title>
    
<?php wp_head(); ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>

<script type="text/javascript">
jQuery(document).ready(function($){	   
	/* Home Image Slider slider */
		var scrollSpeed = 30;
	   
		// set default position
		var current = 0;
	   
		var containerWidth = 0;   
		$('.image-slider ul').children().each(function(){
			containerWidth += $(this).width() + 10;
		});
		//console.log(containerWidth);
	   
		$('.image-slider ul').children().each(function(){
			$(this).clone().appendTo('.image-slider ul');
		});
	   
		function bgscroll(){
	   
			if(current == containerWidth){
				current = 0;
			}
		   
			//move the slideshow
			$('.image-slider ul').css('margin-left', '-'+current+'px');
			current += 1;
		}
	   
		//Calls the scrolling function repeatedly
		
		slideshowInterval = setInterval(bgscroll, scrollSpeed);
	   
		$('.image-sliders ul').hover(
			function(){
				clearInterval(slideshowInterval);
			}, function() {
				slideshowInterval = setInterval(bgscroll, scrollSpeed);
			});  
			
	//fix firefox submenu bug
	$("#menu-main-menu > li").iWouldLikeToAbsolutelyPositionThingsInsideOfFrickingTableCellsPlease();
	
	//mobile submenus
	$('.navbar .nav .sub-menu').siblings('a').click(function(e){
		$submenu = $(this).siblings('.sub-menu');
		if($submenu.is(':visible')){
			return;
		}
		e.preventDefault();
		$submenu.slideToggle('fast');
		return false;
	});
});


$.fn.iWouldLikeToAbsolutelyPositionThingsInsideOfFrickingTableCellsPlease = function() {
    var $el;
    return this.each(function() {
    	$el = $(this);
    	var newDiv = $("<div />", {
    		"class": "innerWrapper",
    		"css"  : {
    			// "height"  : $el.height(),
    			// "width"   : "100%",
    			"position": "relative"
    		}
    	});
    	$el.wrapInner(newDiv);    
    });
};

</script>

</head>

<body>

<div class="container">

	<div id="header">
    	<div class="row">    
            <h1 id="logo" class="pull-right">
                <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
            </h1>
        </div>
        
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                
                
                
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    
                    <?php wp_nav_menu(array(
						'container_class' => 'nav-collapse collapse',
						'menu_class'=> 'nav'
					)); ?>
                
                </div><!--.container-->
            </div><!--.navbar-inner-->
        </div><!--.navbar-->

    </div><!--#header-->