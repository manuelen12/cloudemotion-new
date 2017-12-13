<?php 
    $baseurl=(is_home() || is_single())?get_site_url()."/":""; 
    $parallax=(is_home() || is_single())?"":"parallax-cl"; 
?>
<ul id="menu-main-menu" class="clearfix">
    <li class="menu-item qodef-active-item ">
        <a href="<?php echo $baseurl;  ?>#general" <?php echo $parallax; ?> class=" current ">
            <span class="item_outer">
                <span class="item_inner">
                    <span class="menu_icon_wrapper">
                        <i class="menu_icon null fa"></i>
                    </span>
                    <span class="item_text" ng-bind="'Home' | translate">Inicio</span>
                </span>
                <span class="plus"></span>
            </span>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?php echo $baseurl;  ?>#about_us" <?php echo $parallax; ?> class="">
            <span class="item_outer">
                <span class="item_inner">
                    <span class="menu_icon_wrapper">
                        <i class="menu_icon null fa"></i>
                    </span>
                    <span class="item_text" ng-bind="'About us' | translate">About Us</span>
                </span>
                <span class="plus"></span>
            </span>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?php echo $baseurl;  ?>#services" <?php echo $parallax; ?> class="">
            <span class="item_outer">
                <span class="item_inner">
                    <span class="menu_icon_wrapper">
                        <i class="menu_icon null fa"></i>
                    </span>
                    <span class="item_text" ng-bind="'Services' | translate">Servicios</span>
                </span>
                <span class="plus"></span>
            </span>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?php echo $baseurl;  ?>#portfolio" <?php echo $parallax; ?> class=" no_link">
            <span class="item_outer">
                <span class="item_inner">
                    <span class="menu_icon_wrapper">
                        <i class="menu_icon null fa"></i>
                    </span>
                    <span class="item_text" ng-bind="'Portfolio' | translate">Portafolio</span>
                </span>
                <span class="plus"></span>
            </span>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?php echo $baseurl;  ?>#blog" <?php echo $parallax; ?> class=" no_link">
            <span class="item_outer">
                <span class="item_inner">
                    <span class="menu_icon_wrapper">
                        <i class="menu_icon null fa"></i>
                    </span>
                    <span class="item_text" ng-bind="'Blog' | translate">Blog</span>
                </span>
                <span class="plus"></span>
            </span>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?php echo $baseurl;  ?>#team" <?php echo $parallax; ?> class="">
            <span class="item_outer">
                <span class="item_inner">
                    <span class="menu_icon_wrapper">
                        <i class="menu_icon null fa"></i>
                    </span>
                    <span class="item_text" ng-bind="'Team' | translate">Equipo</span>
                </span>
                <span class="plus"></span>
            </span>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?php echo $baseurl;  ?>#contact-us" <?php echo $parallax; ?> class="">
            <span class="item_outer">
                <span class="item_inner">
                    <span class="menu_icon_wrapper">
                        <i class="menu_icon null fa"></i>
                    </span>
                    <span class="item_text" ng-bind="'Contact us' | translate ">Contactanos</span>
                </span>
                <span class="plus"></span>
            </span>
        </a>
    </li>
    <li>
        <a <?php echo $parallax; ?> class="" ng-click="vm.changeLanguage(vm.country)">
            <span class="item_outer">
                <span class="item_inner">
                <span class="item_text show-small" ng-bind="vm.country"></span>
                    <flag country="vm.country"  size="32"></flag>
                </span>
                <span class="plus"></span>
            </span>
        </a>
    </li>                            

</ul>
