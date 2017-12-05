
<ul id="menu-main-menu" class="clearfix">
    <li class="menu-item qodef-active-item ">
        <a href="#general" parallax-cl class=" current ">
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
        <a href="#about_us" parallax-cl class="">
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
        <a href="#services" parallax-cl class="">
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
        <a href="#portfolio" parallax-cl class=" no_link">
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
        <a href="#testimonials" parallax-cl class=" no_link">
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
        <a href="#team" parallax-cl class="">
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
        <a href="#design" parallax-cl class="">
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
        <a parallax-cl class="" ng-click="vm.changeLanguage(vm.country)">
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
