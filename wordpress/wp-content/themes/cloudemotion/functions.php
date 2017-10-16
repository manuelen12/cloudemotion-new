<?php
	if(!is_admin()){
	/*echo "<script>alert('".is_admin()."asd');</script>";
*/
		// wp_deregister_script('jquery');
		// wp_deregister_script('jquery-migrate');
			$routecss="/assets/css/";
			$routejs="/assets/js/libs/";
			$styles = array(
				'estilo',
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
				//'toolbar',
				'bootstrap.min',
				'woocommerce-responsive.min',
				'woocommerce.min',
				);

			$scripts = array(
				'jquery-3.2.1.min',
				//'jquery',
				'jquery-migrate.min',
				'scrolltoplugin.min',
				'greensock',
				'layerslider.kreaturamedia.jquery',
				'layerslider.transitions',
				'jquery.themepunch.tools.min',
				'jquery.themepunch.revolution.min',
				'add-to-cart.min',
				'particles.min',
				'woocommerce-add-to-cart',
				'revolution.addon.whiteboard.min',
				'wp-emoji-release.min',
				'analytics',
				'underscore.min',
				'excanvas.compiled',
				'spinners.min',
				'jquery.form.min',
				'scripts',
				'jquery.blockUI.min',
				'woocommerce.min',
				'jquery.cookie.min',
				'cart-fragments.min',
				'core.min',
				'widget.min',
				'tabs.min',
				'accordion.min',
				'mediaelement-and-player.min',
				'wp-mediaelement.min',
				'mouse.min',
				'slider.min',
				'third-party.min',
				'isotope.pkgd.min',
				'smoothPageScroll',
				'comment-reply.min',
				'js_composer_front.min',
				'like.min',
				'wp-embed.min',
				'waypoints.min',
				'global',
				'angular.min',
				'html5',
				'owl-carousel.min',
				'fluidvids',
				'moment',
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

