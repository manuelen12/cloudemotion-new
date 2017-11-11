<?php
if(!is_admin()){

	$routecss="/assets/css/";
	$routejs="/assets/js/libs/";
	$styles = array(
		'style',
		'style.min',
		'estilo',
		'blog-responsive.min',
		'blogs',
		'dripicons',
		'font-awesome.min',
		'ionicons.min',
		'js_composer.min',
		'layerslider',
		'modules-responsive.min',
		'modules.min',
		'plugins.min',
		'settings',
		'owl.carousel',
		'animate.min',
		'simple-line-icons',
		'style_dynamic',
		'style_dynamic_responsive',
		'styles',
		//'toolbar',
		'bootstrap.min',
		'woocommerce-responsive.min',
		'woocommerce.min',
		'flag'
		);

	$scripts = array(
		'jquery-3.2.1.min',
		'jquery-migrate.min',
		'scrolltoplugin.min',
		'greensock',
		'layerslider.kreaturamedia.jquery',
		'layerslider.transitions',
		'jquery.themepunch.tools.min',
		'jquery.themepunch.revolution.min',
		'particles.min',
		'analytics',
		'underscore.min',
		'excanvas.compiled',
		'spinners.min',
		'jquery.form.min',
		'scripts',
		'jquery.blockUI.min',
		'jquery.cookie.min',
		'cart-fragments.min',
		'core.min',
		'widget.min',
		'tabs.min',
		'mediaelement-and-player.min',
		'wp-mediaelement.min',
		'mouse.min',
		'slider.min',
		'isotope.pkgd.min',
		'smoothPageScroll',
		'comment-reply.min',
		'js_composer_front.min',
		'like.min',
		'wp-embed.min',
		'waypoints.min',
		'global',
		'angular.min',
		'angular-translate',
		'angular/ng-flag',
		'html5',
		'owl-carousel.min',
		'moment',
		'pnotify.min',
		'../angular/services/pnotify.service',
		'../angular/app',
		'../angular/helper/validator.helper',
		'../angular/helper/method.helper',
		'../angular/services/employee.service',
		'../angular/controller/MainCtrl',
		);

	foreach($styles as $key => $style){
		wp_enqueue_style(substr($style, -5).$key, get_template_directory_uri().$routecss.$style.'.css');
	}
	foreach($scripts as $key => $script){
		wp_enqueue_script(substr($script, -7).$key, get_template_directory_uri().$routejs.$script.'.js', false, 1.0, false );
	}
	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );



}

