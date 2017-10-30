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
                        <div class="qodef-position-left">
                            <div class="qodef-position-left-inner">
                                <div class="qodef-logo-wrapper">
                                    <a href="http://startit.select-themes.com/">
                                        <img width="250" class="qodef-normal-logo" src="./wp-content/themes/cloudemotion/assets/img/logo_header.jpg" alt="logo"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="qodef-position-right">
                            <div class="qodef-position-right-inner">
                                <nav class="qodef-main-menu qodef-drop-down qodef-default-nav">
                                    <?php     get_template_part( 'template-parts/navigation/menu', null ); ?>
                                </nav>
                                <a        data-icon-close-same-position="yes"                        class="qodef-search-opener" href="javascript:void(0)"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>


