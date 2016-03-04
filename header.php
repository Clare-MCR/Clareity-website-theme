<?php if (get_option('wgcp_open_banner_468')=='open_468') { if (get_option('wgcp_open_banner_468')=='open_468') { webello_close_banner_cookie();  } } ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php wegraphics_title(); ?></title>
<?php if(get_option('wgcp_activate_seo') == "activate_seo_yes") { ?>  
<?php wegraphics_description(); ?>
<?php wegraphics_keywords();?>
<?php wegraphics_additional_headers();
wegraphics_noindex();
} ?>

<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
<link href="<?php echo get_bloginfo('template_url'); ?>/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_bloginfo('template_url'); ?>/css/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen" title="prettyPhoto main stylesheet" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!-- Begin wp_head() -->
<?php wp_head(); ?>
<!-- End wp_head() -->

<!--[if IE]>
<link href="css/ie-styles.css" rel="stylesheet" type="text/css">
<![endif]-->

<!--[if IE 7]>
<style>
	#bg{display:none;}
    body{background:url(images/bg-grid.png) #b3b6bb;}
    #menu-container{float:left;}
	#container{float:right;}
    div.grid{display:none;}
</style>
<![endif]-->

   
<!--[if !IE]><!-->
<script type='text/javascript' src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.defaultvalue.js"></script>
<script type='text/javascript'>
	$('document').ready(function() {
		// HTML5 FALLBACK: Default values for input fields		
		$('#search').defaultValue();
	});
 </script>
<!--<![endif]--> 


<?php if (get_option('wgcp_google_analytics') != '') { echo stripslashes(get_option('wgcp_google_analytics')); } ?>



<?php get_custom_favicon(); ?>

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=349625931807665";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php if (get_option('wgcp_enable_banner_468')=='enable_468') { ?>
<!-- Top Banner -->
<div class="top-banner">
	<div id="banner-content">
        <p><?php echo get_option('wgcp_custom_ads_code_468'); ?></p>
    </div>
    <span id="open-banner"></span>
    <span id="close-banner"></span>
</div>

	<?php if (get_option('wgcp_open_banner_468')=='open_468') { ?>
		<?php if (get_option('wgcp_open_banner_468')=='open_468') { ?>
		<?php if (!isset($_COOKIE['webello_close_banner'])) { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$("span#open-banner").trigger("click");
			});
		</script>	
		<?php } ?>
		<?php } ?>			
	<?php } ?>
	
<?php } ?>

<!-- Begin Site Wrapper -->
<div id="wrapper">

<!-- Begin Main Nav Menu -->
<div id="menu-container" class="shadow">
	<div id="logo-container"><a href="<?php bloginfo('siteurl'); ?>" class="logo-link">
		<img src="<?php if (get_option('wgcp_logo_url') != '') { echo get_option('wgcp_logo_url'); } else { echo bloginfo('template_url').'/images/clareitylogo.png'; } ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a>
	</div>
	
	<?php echo $heading_html_tag; ?>

    	<?php wp_nav_menu( array('depth' => 3)); ?>
    	    
    <?php dynamic_sidebar('Left'); ?>
      
</div>
<!-- End Main Nav Menu -->
