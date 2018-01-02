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
            <div>
                <div class="qodef-position-left-inner">
                    <div class="qodef-logo-wrapper">
                        <a href="http://startit.select-themes.com/">
                            <img width="200" class="b-lazy" data-src="<?php echo get_template_directory_uri(); ?>/build/img/logo_header.jpg" alt="logo"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="middle-menu">
                <div class="qodef-position-right-inner">
                    <nav id="home-nav" class="qodef-main-menu qodef-drop-down qodef-default-nav">
                        <?php     get_template_part( 'template-parts/navigation/menu', null ); ?>
                    </nav>
                </div>
            </div>
            <label class="show-small burger-u">
                <span class="hamburger-menu fa"></span>
            </label>
        </div>
    </div>
    <base href="<?php echo get_template_directory_uri(); ?>">
</header>
<?php     get_template_part( 'template-parts/navigation/menu-side', null ); ?>


