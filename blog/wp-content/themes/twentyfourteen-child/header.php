<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <base href="https://micocina.cat/">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	
  
   <!-- CODIGO DE MI WEB -->
       <?php include ("../apartados/header.php"); ?>
	    <link rel="shortcut icon" type="image/png" href="images/ficon.png"/>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!----------------- LINA QUE CARGA CSS DE LA WEB -------------->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		
		
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' /> <!----------------- LINA QUE CARGA CSS DE LA WEB -------------->
   		 <!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!----webfonts--->
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic|Roboto+Slab:400,100,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> <!----------------- LINA QUE CARGA CSS DEL BLOG -------------->
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/res-style.css" />  <!--------- LINA QUE CARGA CSS MODIFICADO DEL BLOG ------------->


		<!---//webfonts--->
		<!----Menu movil--->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//Menu movil---->
		<!-- FIN CODIGO DE MI WEB -->
		<?php include ("../cookies/cookies.php"); ?>
		
</head>

<!-------------------- direcciones de la página web --------------------->
<!---<base href="<a class="vglnk" href="http://micocina.cat"  rel="nofollow" ><span>https</span><span>://</span><span>micocina</span><span>.</span><span>cat</span></a>" /> -->
		
<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
	
	<!-- CODIGO DE MI WEB -->
			<?php include ("../apartados/menu.php"); ?>
			
			<div class="Pricing">
				<!----- header-section ---->
				<div class="header-section">
					<div class="container">
						<h1>Blog</h1>
					</div>
				</div>
			</div>
			<!-- FIN CODIGO DE MI WEB -->
    <div id="main" style="position:relative;float:right"></div>
		<div id="main" class="site-main">
