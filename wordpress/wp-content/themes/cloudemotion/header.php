<!DOCTYPE html>
<html lang="en-GB" >
<head>      
	<meta name="google-site-verification" content="TX0pA9o6vX5Tu3-wYfFthj7w1IYZTHFl95ZBeWMhjBw" /> 
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/cloud.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/cloud.png">
	<script id="getdata">
		window.static="<?php echo get_template_directory_uri(); ?>";
	</script>
 	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); echo ' | ';  bloginfo( 'name' ); ?></title>
	<meta name='robots' content='noindex,follow' />
	<noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
	<?php wp_head(); ?>
</head>
<style type="text/css">
	.loader.in{
		position: fixed;
		width: 100vw;
		height: 100vh;
		margin: 0 auto;
		text-align: center;
		vertical-align: middle;
		display: inline-block;
		z-index: 9999;
		background: white;
	}

	.loader.in:before{
		content: "";
		background-image: url(wp-content/themes/cloudemotion/assets/img/logo1.jpg);
		width: 300px;
		height: 300px;
		background-size:contain; 
		position: fixed;
		animation: pulse 2s infinite;
		left: calc(50% - 150px);
		top: 30%;
	}

</style>
<noscript>
	<style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style>
</noscript>
