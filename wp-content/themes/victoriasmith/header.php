<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/responsive.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/flexslider.css" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700,400italic' rel='stylesheet' type='text/css'>

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
<script src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider.js"></script>

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
	   
	   //flexslider
		$('.flexslider').flexslider({
			controlNav: false,
			directionNav: false,
			animation: "slide",
    animationLoop: false,
    itemWidth: 210,
    itemMargin: 5
		});

});
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
                
                    <div class="nav-collapse collapse">
                        <ul id="menu-main-menu" class="nav">
                            <li id="menu-item-26" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26"><a href="http://victoriasmith.ca/dev/5-2/">Credentials</a></li>
                            <li id="menu-item-44" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44"><a href="http://victoriasmith.ca/dev/services/">Services</a></li>
                            <li id="menu-item-30" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-30"><a href="http://#">Collaborative Process</a></li>
                            <li id="menu-item-31" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31"><a href="http://#">Workshops</a></li>
                            <li id="menu-item-32" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-32"><a href="http://#">Articles</a></li>
                            <li id="menu-item-33" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-33"><a href="http://#">Testimonials</a></li>
                            <li id="menu-item-34" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-34"><a href="http://#">Links</a></li>
                            <li id="menu-item-35" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-35"><a href="http://#">Contacts</a></li>
                        </ul>
                    </div>
                </div><!--.container-->
            </div><!--.navbar-inner-->
        </div><!--.navbar-->

    </div><!--#header-->