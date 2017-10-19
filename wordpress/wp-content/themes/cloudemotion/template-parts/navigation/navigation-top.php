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
                    <form role="search" action="http://startit.select-themes.com/" class="qodef-search-cover" method="get">
                        <div class="qodef-form-holder-outer">
                            <div class="qodef-form-holder">
                                <div class="qodef-form-holder-inner">
                                    <input type="text" placeholder="Search" name="s" class="qode_search_field" autocomplete="off" />
                                    <div class="qodef-search-close">
                                        <a href="#">
                                            <i class="qodef-icon-ion-icon ion-close " ></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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


