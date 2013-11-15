<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

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

<script type="text/javascript">
jQuery(document).ready(function($){

	// set home featured boxes to same height
	var maxHeight = -1;

	$('.block').each(function() {
		maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
	});
	
	$('.block').each(function() {
		$(this).height(maxHeight);
	});
});
</script>

</head>

<body>

<div id="container">

	<div id="header">
    
    	<h1 id="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        
        <?php wp_nav_menu(); ?>
    
    </div><!--#header-->