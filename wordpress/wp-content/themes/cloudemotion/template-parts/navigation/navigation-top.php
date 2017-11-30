<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>



<header class="qodef-page-header">
    <div class="qodef-menu-area" style="background-color:rgba(255, 255, 255, 0)">
        <div class="qodef-vertical-align-containers">
            <div class="qodef-position-left col-md-2">
                <div class="qodef-position-left-inner">
                    <div class="qodef-logo-wrapper">
                        <a href="http://startit.select-themes.com/">
                            <img width="200" class="qodef-normal-logo" src="./wp-content/themes/cloudemotion/assets/img/logo_header.jpg" alt="logo"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="qodef-position-right col-md-10 col-sm-11 col-xs-12">
                <div class="qodef-position-right-inner">
                    <nav class="qodef-main-menu qodef-drop-down qodef-default-nav">
                        <?php     get_template_part( 'template-parts/navigation/menu', null ); ?>
                    </nav>
                </div>
            </div>
                <span class="hamburger-menu fa show-small"></span>
        </div>
    </div>
</header>


