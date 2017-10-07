<?php



	if(!is_admin()){
	/*echo "<script>alert('".is_admin()."asd');</script>";
*/

		// wp_deregister_script('jquery');
		// wp_deregister_script('jquery-migrate');
			$routecss="/assets/css/";
			$routejs="/assets/js/libs/";
			$styles = array(
				'blog-responsive.min',
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
				'style',
				'style.min',
				'style_dynamic',
				'style_dynamic_responsive',
				'styles',
				'toolbar',
				'bootstrap.min',
				'woocommerce-responsive.min',
				'woocommerce.min',
				);

			$scripts = array(
				'jquery',
				'owl-carousel.min',
				'jquery.themepunch.tools.min',
				'jquery.themepunch.revolution.min',
				'add-to-cart.min',
				'analytics',
				'cart-fragments.min',
				'comment-reply.min',
				'core.min',
				'excanvas.compiled',
				'global',
				'greensock',
				'html5',
				'isotope.pkgd.min',
				'jquery.blockUI.min',
				'jquery.cookie.min',
				'jquery.form.min',
				'moment',
				'particles.min',
				'angular.min',
				'../angular/app',
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

