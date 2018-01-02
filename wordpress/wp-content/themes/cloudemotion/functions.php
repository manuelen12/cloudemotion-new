<?php
if(!is_admin()){

	$routecss="/build/css/";
	$routejs="/build/js/";
	$styles = array(
		'style',
		'style.min',
		'estilo',
		'blog-responsive.min',
		'blogs',
		'font-awesome.min',
		'ionicons.min',
		'layerslider',
		'modules-responsive.min',
		'modules.min',
		'plugins.min',
		'settings',
		'owl.carousel',
		'animate.min',
		'simple-line-icons',
		'style_dynamic',
		'styles',
		'abacosystems',
		//'toolbar',
		'bootstrap.min',
		'flag',
		'nucleoo',
		'cloud-animation',
		'style_dynamic_responsive',
		'menu.min'
		);

	$scripts = array(
		'jquery-3.2.1.min',
		'blazy',
		'particles.min',
		'core.min',
		'bootstrap.min',
		'global',
		'angular.min',
		'angular-translate',
		'ng-flag',
		'html5',
		'owl-carousel.min',
		'moment',
		'pnotify.min',
		'pnotify.service',
		'app',
		'upload-error.directive',
		'validator.helper',
		'method.helper',
		'employee.service',
		'MainCtrl',
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
add_theme_support( 'post-thumbnails' );


