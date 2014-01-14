<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/responsive.css" />
<link href='http://fonts.googleapis.com/css?family=Signika+Negative' rel='stylesheet' type='text/css'>


<!--[if IE 8]>
<style>
	#blocks .widget:first-child { background:@purple; padding: 0 15px }
				#blocks .widget:first-child + .widget { background:@yellow; } 
				#blocks .widget:first-child + .widget + .widget { background:@orange; }
</style>
<![endif]-->

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

    // Hijack click function of # navbar links
    $('.navbar .nav > li.title-link').click(function(){
        return false;
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
                
                
                
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <?php wp_nav_menu(array(
						'container_class' => 'nav-collapse collapse',
						'menu_class'=> 'nav'
					)); ?>
                
                </div><!--.container-->
            </div><!--.navbar-inner-->
        </div><!--.navbar-->

    </div><!--#header-->
