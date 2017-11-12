<?php
get_header();
?>



<body ng-controller="MainCtrl as vm">

    <div class="loader in"></div>
    <div class="qodef-wrapper">
        <div class="qodef-wrapper-inner">
            <?php     get_template_part( 'template-parts/navigation/navigation-top', null ); ?>
            <?php putRevSlider('prueba1', 'homepage'); ?>
            <!-- close .qodef-mobile-header -->
            <a id='qodef-back-to-top'  href='#'>
                <span class="qodef-icon-stack">
                    <i class="qodef-icon-font-awesome fa fa-chevron-up " ></i>
                </span>
            </a>
            <div class="qodef-content">
                <div class="qodef-content-inner">
                    <div class="qodef-full-width">
                        <div class="qodef-full-width-inner">
                            <div class=" qodef-content-aligment-center qodef-grid-section" id="home">
                                <div class="container">
                                    <div class="qodef-section-inner-margin clearfix">
                                        <div class="col-md-6">
                                            <div class="jumbotron home">
                                                <div class="container">
                                                    <img class="qodef-normal-logo" src="./wp-content/themes/cloudemotion/assets/img/logo_header.jpg" alt="logo">
                                                    <p>
                                                        Somos una empresa de tecnologia dedicada a solucionar las dificultades tecnologicas de nuestros clientes abarcando distintos tipos de areas tales como Desarrollo de aplicaciones(Web, Moviles), Gestion de Proyectos, Marketing Web entre otros..
                                                    </p>
                                                    <p>
                                                        A diario nuevas tecnologias salen al mercado y cada vez mas a los negocios los alejan de la actualidad. Cloudemotion tiene un compromiso total con el continuo aprendizaje y ejecuciones de las buenas practicas para mantener a tu negocio en la vanguardia tecnologica...
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contentTeam">
                                                <img src="./wp-content/themes/cloudemotion/assets/img/teamwork.png" class="img-responsive teamR" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" qodef-content-aligment-center qodef-grid-section" id="general">
                                <div class="container">
                                <h2><strong ng-bind="'We garantice you' | translate" class="ng-binding"></strong></h2>
                                    <div class="qodef-section-inner-margin clearfix">
                                        <div class="wpb_column vc_column_container col-sm-6 col-lg-3 col-md-6">
                                            <div class="vc_column-inner-350350 ">
                                                <div class="wpb_wrapper">
                                                    <span class="qodef-icon-animation-holder" >
                                                        <span class="qodef-icon-shortcode normal qodef-icon-animation" style="width: 72px;height: 72px;line-height: 72px" data-color="#25cbf5">
                                                            <i class="qodef-icon-font-awesome fa fa-bookmark-o qodef-icon-element" style="color: #25cbf5;font-size:72px" ></i>
                                                        </span>
                                                    </span>
                                                    <div class="vc_empty_space"  style="height: 30px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h3><strong ng-bind="'High quality on web develop' | translate"></strong></h3>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space"  style="height: 19px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p align="justify" ng-bind="'We develop Pro apps for various platform: web, mobile or desktop; we use the newest technology and you can trust on our quality'| translate"></p>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space"  style="height: 50px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container col-sm-6 col-lg-3 col-md-6">
                                            <div class="vc_column-inner-350">
                                                <div class="wpb_wrapper">
                                                    <span class="qodef-icon-animation-holder" style="transition-delay: 200ms;-webkit-transition-delay: 200ms;-moz-transition-delay: 200ms;-ms-transition-delay: 200ms">
                                                        <span class="qodef-icon-shortcode normal qodef-icon-animation" style="width: 72px;height: 72px;line-height: 72px" data-animation-delay="200" data-color="#25cbf5">
                                                            <i class="qodef-icon-font-awesome fa fa-commenting-o qodef-icon-element" style="color: #25cbf5;font-size:72px" ></i>
                                                        </span>
                                                    </span>
                                                    <div class="vc_empty_space"  style="height: 30px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h3><strong ng-bind="'Supporting and Services IT'|translate"></strong></h3>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space"  style="height: 19px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p align="justify" ng-bind="'IT training, tutorials and project management which help the clients according to their needs and suit to their information requirements'| translate"></p>
                                                        </div>
                                                    </div>

                                                    <div class="vc_empty_space"  style="height: 50px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container col-sm-6 col-lg-3 col-md-6">
                                            <div class="vc_column-inner-350">
                                                <div class="wpb_wrapper">
                                                    <span class="qodef-icon-animation-holder" style="transition-delay: 400ms;-webkit-transition-delay: 400ms;-moz-transition-delay: 400ms;-ms-transition-delay: 400ms">
                                                        <span class="qodef-icon-shortcode normal qodef-icon-animation" style="width: 72px;height: 72px;line-height: 72px" data-animation-delay="400" data-color="#25cbf5">
                                                            <i class="qodef-icon-font-awesome fa fa-hdd-o qodef-icon-element" style="color: #25cbf5;font-size:72px" ></i>
                                                        </span>
                                                    </span>
                                                    <div class="vc_empty_space"  style="height: 30px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h3><strong ng-bind="'Variety Platforms' | translate"></strong></h3><br>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space"  style="height: 19px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p align="justify" ng-bind="'We manage all of your hardware and software requirements what help you support your IT apps and services on free (Linux) or private (Windows) platform'| translate"></p>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space"  style="height: 50px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container col-sm-6 col-lg-3 col-md-6">
                                            <div class="vc_column-inner-350">
                                                <div class="wpb_wrapper">
                                                    <span class="qodef-icon-animation-holder" style="transition-delay: 600ms;-webkit-transition-delay: 600ms;-moz-transition-delay: 600ms;-ms-transition-delay: 600ms">
                                                        <span class="qodef-icon-shortcode normal qodef-icon-animation" style="width: 72px;height: 72px;line-height: 72px" data-animation-delay="600" data-color="#25cbf5">
                                                            <i class="qodef-icon-font-awesome fa fa-folder-open-o qodef-icon-element" style="color: #25cbf5;font-size:72px" ></i>
                                                        </span>
                                                    </span>
                                                    <div class="vc_empty_space"  style="height: 30px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h3><strong ng-bind="'Projects Portfolio'| translate"></strong></h3><br>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space"  style="height: 19px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p align="justify" ng-bind="'Meet our adaptable works high quality, made for various business models. Be part of our pleased customers list'|translate"></p>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space"  style="height: 50px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row wpb_row vc_row-fluid qodef-section qodef-content-aligment-left"  id="creative">
                                <div class="clearfix qodef-full-section-inner">
                                    <div class="wpb_column vc_column_container">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div id="qodef-particles" class="auto" style="background-color: #f8f8f8;" >
                                                    <div id="qodef-p-particles-container"></div>
                                                    <div class="container-fluid">
                                                        <div class="qodef-elements-holder " >
                                                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 qodef-elements-holder-item qodef-vertical-alignment-top qodef-horizontal-alignment-left" >
                                                                <div class="qodef-elements-holder-item-inner">
                                                                    <div class="qodef-elements-holder-item-content qodef-elements-holder-custom-361605" style="padding: 90px 0px 50px 0px">

                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <h2><strong ng-bind="'We help you to design your business image on web' | translate"></strong></h2>
                                                                            </div>
                                                                        </div>
                                                                        <div class="vc_empty_space"  style="height: 20px" >
                                                                            <span class="vc_empty_space_inner"></span>
                                                                        </div>
                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <h4 align="justify" ng-bind="'We use the newest technology and tools while your business page is designed. Thus we guarantee you an extraordinary, innovative and catching experience. This one will give you the oportunity to boots your brand on internet'| translate"></h4>
                                                                            </div>
                                                                        </div>
                                                                        <div class="vc_empty_space"  style="height: 43px" >
                                                                            <span class="vc_empty_space_inner"></span>
                                                                        </div>
                                                                        <a href="#" target="_self"  class="qodef-btn qodef-btn-medium qodef-btn-solid qodef-btn-icon"  >
                                                                            <span class="qodef-btn-text" ng-bind="'Know More' | translate"></span>
                                                                            <span class="qodef-btn-text-icon">
                                                                                <i class="qodef-icon-simple-line-icon icon-rocket " ></i>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 qodef-elements-holder-item " >
                                                                
                                            <div class="contentHand">
                                                <img src="./wp-content/themes/cloudemotion/assets/img/handTable.png" class="img-responsive handR" alt="Image">
                                            </div>
                                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="qodef-section qodef-content-aligment-center qodef-grid-section" id="portfolios">

                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column wpb_content_element ">
                                        <div class="wpb_wrapper">
                                            <h2><strong ng-bind="'Working with us is as simple as...' | translate"></strong></h2>
                                        </div>
                                    </div>
                                    <div class="vc_empty_space" style="height: 22px">
                                        <span class="vc_empty_space_inner"></span>
                                    </div>
                                </div>
                                <div class="qodef-section vc_custom_1462539692373 qodef-content-aligment-center qodef-grid-section" style="padding: 0;">
                                    <div class="container">
                                        <div class="qodef-section-inner-margin clearfix">
                                            <div class="wpb_column vc_column_container">
                                            
                                                <div class="vc_column-inner ">

                                                    <div class="wpb_wrapper">



                                                        <div class="qodef-process-holder columns-4">
                                                            <div class="qodef-process-holder-inner">
                                                                <div class="vc_column-inner-350 qodef-process-item col-md-3 col-lg-3 col-sm-6 col-xs-6 ">
                                                                    <div class="qodef-process-item-icon-holder-wrapper">
                                                                        <div class="qodef-process-item-icon-holder" style="background: url(./wp-content/themes/cloudemotion/assets/img/planing.jpg)">
                                                                            <span class="qodef-process-item-background-holder">
                                                                                <span class="qodef-icon-shortcode circle ">
                                                                                    <i class="qodef-icon-simple-line-icon icon-pencil qodef-icon-element" style=""></i>
                                                                                </span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qodef-process-item-content-holder">
                                                                        <div class="qodef-process-item-title-holder">
                                                                            <h4 ng-bind="'Plane' | translate"></h4>
                                                                        </div>
                                                                        <div class="qodef-process-item-text-holder">
                                                                            <p>Te haremos llegar un cuestionario con el cual identificaremos cuales son tus prioridades, modelo de negocios y objetivos y asi agilizar el proceso</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vc_column-inner-350 qodef-process-item col-md-3 col-lg-3 col-sm-6 col-xs-6 ">
                                                                    <div class="qodef-process-item-icon-holder-wrapper">
                                                                        <div class="qodef-process-item-icon-holder" style="background: url(./wp-content/themes/cloudemotion/assets/img/design.jpg)">
                                                                            <span class="qodef-process-item-background-holder">
                                                                                <span class="qodef-icon-shortcode circle ">
                                                                                    <i class="qodef-icon-simple-line-icon icon-screen-desktop qodef-icon-element" style=""></i>
                                                                                </span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qodef-process-item-content-holder">
                                                                        <div class="qodef-process-item-title-holder">
                                                                            <h4 ng-bind="'Design' | translate"></h4>
                                                                        </div>
                                                                        <div class="qodef-process-item-text-holder">
                                                                            <p>Te haremos llegar un listado de posibles diseños bajo los estandares actuales, para que seas participe en el proceso en todo momento</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vc_column-inner-350 qodef-process-item col-md-3 col-lg-3 col-sm-6 col-xs-6 ">
                                                                    <div class="qodef-process-item-icon-holder-wrapper">
                                                                        <div class="qodef-process-item-icon-holder" style="background: url(./wp-content/themes/cloudemotion/assets/img/backlog.jpg)">
                                                                            <span class="qodef-process-item-background-holder">
                                                                                <span class="qodef-icon-shortcode circle ">
                                                                                    <i class="qodef-icon-simple-line-icon icon-settings qodef-icon-element" style=""></i>
                                                                                </span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qodef-process-item-content-holder">
                                                                        <div class="qodef-process-item-title-holder">
                                                                            <h4 ng-bind="'Develop' | translate"></h4>
                                                                        </div>
                                                                        <div class="qodef-process-item-text-holder">
                                                                            <p>
                                                                                Etapa en la cual se realizaran pruebas de stress para determinar la funcionalidad del producto en cualquier ambito antes de la entrega final
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vc_column-inner-350 qodef-process-item col-md-3 col-lg-3 col-sm-6 col-xs-6 ">
                                                                    <div class="qodef-process-item-icon-holder-wrapper">
                                                                        <div class="qodef-process-item-icon-holder" style="background: url(./wp-content/themes/cloudemotion/assets/img/testing.jpg)">
                                                                            <span class="qodef-process-item-background-holder">
                                                                                <span class="qodef-icon-shortcode circle ">
                                                                                    <i class="qodef-icon-simple-line-icon icon-wrench qodef-icon-element" style=""></i>
                                                                                </span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qodef-process-item-content-holder">
                                                                        <div class="qodef-process-item-title-holder">
                                                                            <h4 ng-bind="'Test' | translate"></h4>
                                                                        </div>
                                                                        <div class="qodef-process-item-text-holder">
                                                                            <p>Existen tres estapas principales de prueba(Etapa de diseño, Etapa Alfa y Etapa beta) en la cual podras ver el avance progresivo de tu Producto</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">
                                    <h2 style="text-align: center;"><strong ng-bind="'Our Portfolio' | translate"></strong></h2>
                                </div>
                            </div>
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">
                                    <h4 style="text-align: center;" ng-bind="'Know our work and discover the quality with which we work' | translate"></h4>
                                </div>
                            </div>
                            <div class="vc_empty_space"  style="height: 22px" >
                                <span class="vc_empty_space_inner"></span>
                            </div>
                            
                            <div class="vc_row wpb_row vc_row-fluid qodef-section qodef-content-aligment-left">
                                <div class="clearfix qodef-full-section-inner">
                                    <div class="wpb_column vc_column_container">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div class = "qodef-portfolio-list-holder-outer qodef-ptf-gallery qodef-ptf-four-columns" >
                                                    <div class = "qodef-portfolio-list-holder clearfix" >


                                                        <article ng-repeat="portfolio in vm.portfolios" class="qodef-portfolio-item col-no-p" >
                                                            <a class ="qodef-portfolio-link" href="https://cloudemotionteam.com" target="_self"></a>
                                                            <div class = "qodef-item-image-holder" style="{{vm.setBackground(portfolio.image)}}">
                                                                <div class="qodef-portfolio-shader"></div>
                                                            </div>
                                                            <div class="qodef-item-text-overlay">
                                                                <div class="qodef-item-text-overlay-inner">
                                                                    <div class="qodef-item-text-holder">
                                                                        <h5 class="qodef-item-title" ng-bind="portfolio.name"></h5>
                                                                        <div class="qodef-ptf-category-holder">
                                                                            <span>Start up</span>
                                                                            <span>/</span>
                                                                            <span>Innovation</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445420473166 qodef-content-aligment-left qodef-grid-section" >
                                <div class="container">
                                    <div class="qodef-section-inner-margin clearfix">
                                        <div class="wpb_column vc_column_container">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h2 style="text-align: center;"><strong ng-bind="'Unity gives strength' | translate "></strong></h2>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h4 style="text-align: center;" ng-bind="'Planning, developing  projects and Marketing cannot be boarded separately...' | translate"></h4>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space"  style="height: 47px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="vc_row wpb_row vc_inner vc_row-fluid qodef-section qodef-content-aligment-left" style="">
                                                        <div class="qodef-full-section-inner">
                                                            <div class="wpb_column vc_column_container col-lg-4 col-md-12">
                                                                <div class="vc_column-inner ">
                                                                    <div class="wpb_wrapper">
                                                                        <div class="mobilec wpb_single_image wpb_content_element vc_align_left">
                                                                            <figure class="wpb_wrapper vc_figure">
                                                                                <div class="vc_single_image-wrapper   vc_box_border_grey">
                                                                                    <img width="288" height="272" src="./wp-content/themes/cloudemotion/assets/img/graphic-2-home-main.png" class="vc_single_image-img attachment-full" alt="a" />
                                                                                </div>
                                                                            </figure>
                                                                        </div>
                                                                        <div class="vc_empty_space"  style="height: 30px" >
                                                                            <span class="vc_empty_space_inner"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="wpb_column vc_column_container col-lg-8 col-md-12">
                                                                <div class="vc_column-inner ">
                                                                    <div class="wpb_wrapper">
                                                                        <div class="vc_empty_space"  style="height: 34px" >
                                                                            <span class="vc_empty_space_inner"></span>
                                                                        </div>
                                                                        <div class="qodef-tabs qodef-horizontal qodef-tab-text clearfix">
                                                                            <ul class="qodef-tabs-nav">
                                                                                <li class="ui-state-default ui-corner-top " ng-class="{'ui-state-hover':vm.tabs==1}">
                                                                                    <a ng-click="vm.tabs=1" ng-bind="'Project\'s Start' | translate"></a>
                                                                                </li>
                                                                                <li class="ui-state-default ui-corner-top " ng-class="{'ui-state-hover':vm.tabs==2}">
                                                                                    <a ng-click="vm.tabs=2" ng-bind="'Project\'s Management' | translate"></a>
                                                                                </li>
                                                                                <li class="ui-state-default ui-corner-top " ng-class="{'ui-state-hover':vm.tabs==3}">
                                                                                    <a ng-click="vm.tabs=3" ng-bind="'Marketing' | translate"></a>
                                                                                </li>
                                                                                <li class="ui-state-default ui-corner-top " ng-class="{'ui-state-hover':vm.tabs==4}">
                                                                                    <a ng-click="vm.tabs=4" ng-bind="'Development' | translate"></a>
                                                                                </li>
                                                                            </ul>
                                                                            <div  class="qodef-tab-container animated fadeIn" ng-show="vm.tabs==1" data-icon-pack="font_awesome" data-icon-html="&lt;i class=qodef-icon-font-awesome fa   &gt;&lt;/i&gt;">
                                                                                <div class="wpb_text_column wpb_content_element ">
                                                                                    <div class="wpb_wrapper">
                                                                                        <p align="justify" ng-bind="'The key for a successful project is the Client - Developer communication. While we show weekly progresses, we can develop quality products and delivery them in less time. That is how we have a larger chance to success than our competition, and additionally to a stunning start  on the mart we will earn a Successful Project.' | translate"></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div  class="qodef-tab-container animated fadeIn" ng-show="vm.tabs==2" data-icon-pack="font_awesome" data-icon-html="&lt;i class=qodef-icon-font-awesome fa   &gt;&lt;/i&gt;">
                                                                                <div class="wpb_text_column wpb_content_element ">
                                                                                    <div class="wpb_wrapper">
                                                                                        <p align="justify" ng-bind="'When starting a project it is very important to know what your target audience is, how strong the competition is and how feasible the proposal will be in terms of time and cost. What results in obtaining the best result to be able to Connect and Plan the following strategies to reach your goals.
                                                                                        '| translate"></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div  class="qodef-tab-container animated fadeIn" ng-show="vm.tabs==3" data-icon-pack="font_awesome" data-icon-html="&lt;i class=qodef-icon-font-awesome fa   &gt;&lt;/i&gt;">
                                                                                <div class="wpb_text_column wpb_content_element ">
                                                                                    <div class="wpb_wrapper">
                                                                                        <p align="justify" ng-bind="'Once the Target Public and the Goals can be determined, we can start working on social networks or advertising. Because What is not displayed, not sold, it is time to introduce your product to the market and with our analysis we can begin to apply the strategies to promote your project in the digital media you want. Managing your social networks to increase the visibility of your business, advertise on Facebook Ads and Google Adwords to attract potential customers to your business from before the project culminates.'| translate">
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div  class="qodef-tab-container animated fadeIn" ng-show="vm.tabs==4" data-icon-pack="font_awesome" data-icon-html="&lt;i class=qodef-icon-font-awesome fa   &gt;&lt;/i&gt;">
                                                                                <div class="wpb_text_column wpb_content_element ">
                                                                                    <div class="wpb_wrapper">
                                                                                        <p align="justify" ng-bind="'The success of a project is based on Client - Developer communication. As we show weekly progress, we can create quality products in the shortest delivery time, thus achieving a margin of success superior to the competition and if we incorporate an exit to the market shocking we will get a successful project.'| translate">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="vc_row wpb_row vc_row-fluid qodef-section qodef-content-aligment-left qodef-grid-section" id="planing">
                                    <div class="container">
                                        <div class="qodef-section-inner-margin clearfix">
                                            <div class="wpb_column vc_column_container col-lg-6 col-md-12">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class="vc_empty_space"  style="height: 78px" >
                                                            <span class="vc_empty_space_inner"></span>
                                                        </div>
                                                        <div class="wpb_text_column wpb_content_element  vc_custom_1446567667184">
                                                            <div class="wpb_wrapper">
                                                                <h2 ng-bind="'Planning is everything...'|translate"></h2>
                                                            </div>
                                                        </div>
                                                        <div class="vc_empty_space"  style="height: 18px" >
                                                            <span class="vc_empty_space_inner"></span>
                                                        </div>
                                                        <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                                <h4 align="justify" ng-bind="'Check out your requirements, manage them into a document, discuss about them with your crew and plan a comfortable model so that you can tell us about your ideas. This way your project will be successful from the beginning.' | translate"></h4>
                                                                <br>
                                                                <h4 ng-bind="'Be aware of this when you\'re planning:' | translate"></h4>
                                                            </div>
                                                        </div>
                                                        <div class="vc_empty_space"  style="height: 29px" >
                                                            <span class="vc_empty_space_inner"></span>
                                                        </div>
                                                        <div class="vc_row wpb_row vc_inner vc_row-fluid qodef-section qodef-content-aligment-left" style="">
                                                            <div class="qodef-full-section-inner">
                                                                <div class="wpb_column vc_column_container col-sm-6">
                                                                    <div class="vc_column-inner ">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="qodef-icon-list-item">
                                                                                <div class="qodef-icon-list-icon-holder">
                                                                                    <div class="qodef-icon-list-icon-holder-inner clearfix">
                                                                                        <i class="qodef-icon-font-awesome fa fa-check-circle " style="color:#25cbf5;font-size:14px" ></i>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="qodef-icon-list-text" ng-bind="'How many ideas like yours are there?' | translate"></p>
                                                                            </div>
                                                                            <div class="qodef-icon-list-item">
                                                                                <div class="qodef-icon-list-icon-holder">
                                                                                    <div class="qodef-icon-list-icon-holder-inner clearfix">
                                                                                        <i class="qodef-iczc-nfont-awesome fa fa-check-circle " style="color:#25cbf5;font-size:14px" ></i>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="qodef-icon-list-text" ng-bind="'Does that solution have weakness?' | translate"></p>
                                                                            </div>
                                                                            <div class="qodef-icon-list-item">
                                                                                <div class="qodef-icon-list-icon-holder">
                                                                                    <div class="qodef-icon-list-icon-holder-inner clearfix">
                                                                                        <i class="qodef-icon-font-awesome fa fa-check-circle " style="color:#25cbf5;font-size:14px" ></i>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="qodef-icon-list-text" ng-bind="'If you are a Startup: Have you anticipated to the possible impact your idea would have?' | translate"></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wpb_column vc_column_container col-sm-6">
                                                                    <div class="vc_column-inner ">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="qodef-icon-list-item">
                                                                                <div class="qodef-icon-list-icon-holder">
                                                                                    <div class="qodef-icon-list-icon-holder-inner clearfix">
                                                                                        <i class="qodef-icon-font-awesome fa fa-check-circle " style="color:#25cbf5;font-size:14px" ></i>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="qodef-icon-list-text" ng-bind="'Do you know well where is your idea helpful?' | translate"></p>
                                                                            </div>
                                                                            <div class="qodef-icon-list-item">
                                                                                <div class="qodef-icon-list-icon-holder">
                                                                                    <div class="qodef-icon-list-icon-holder-inner clearfix">
                                                                                        <i class="qodef-icon-font-awesome fa fa-check-circle " style="color:#25cbf5;font-size:14px" ></i>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="qodef-icon-list-text" ng-bind="'Do you have any sketch about how you want your solution looks?' | translate"></p>
                                                                            </div>
                                                                            <div class="qodef-icon-list-item">
                                                                                <div class="qodef-icon-list-icon-holder">
                                                                                    <div class="qodef-icon-list-icon-holder-inner clearfix">
                                                                                        <i class="qodef-icon-font-awesome fa fa-check-circle " style="color:#25cbf5;font-size:14px" ></i>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="qodef-icon-list-text" ng-bind="'Does your competition have any weakness you can take advantage of?'| translate">
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wpb_column vc_column_container col-sm-4">
                                                                    <div class="vc_column-inner ">
                                                                        <div class="wpb_wrapper"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 style="margin-top: 1em" ng-bind="'Remember: It\'s not about your service\'s quantity, but your service\'s quality.' | translate"></h5>
                                                        <div class="vc_empty_space"  style="height: 50px" >
                                                            <span class="vc_empty_space_inner"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container col-lg-6 col-md-12">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class="wpb_single_image wpb_content_element vc_align_left">
                                                            <figure class="wpb_wrapper vc_figure">
                                                                <div class="vc_single_image-wrapper   vc_box_border_grey">
                                                                    <img width="551" height="497" src="./wp-content/themes/cloudemotion/assets/img/image-2-home-main.jpg" class="vc_single_image-img attachment-full" alt="a" srcset="./wp-content/themes/cloudemotion/assets/img/image-2-home-main.jpg 551w, ./wp-content/themes/cloudemotion/assets/img/image-2-home-main-300x271.jpg 300w, ./wp-content/themes/cloudemotion/assets/img/image-2-home-main-550x497.jpg 550w" sizes="(max-width: 551px) 100vw, 551px" />
                                                                </div>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div data-qodef-parallax-speed="0.5" class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445345084553 qodef-content-aligment-left qodef-parallax-section-holder qodef-parallax-section-holder-touch-disabled" style="background-image:url(./wp-content/themes/cloudemotion/assets/img/parallax-2-home-main.jpg);">
                                    <div class="clearfix qodef-full-section-inner">
                                        <div class="wpb_column vc_column_container">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h2 style="text-align: center;">
                                                                <span style="color: #ffffff;" ng-bind="'We Innovate and Guarantee a Professional Quality Product' | translate"></span>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space"  style="height: 16px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h4 style="text-align: center;">
                                                                <span style="color: #dbdbdb;" ng-bind="'Meet some of the opinions of our satisfied customers' | translate"></span>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space"  style="height: 76px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="qodef-testimonials-holder container">
                                                        <div class="qodef-testimonials owl-carousel owl-theme qodef-section-inner transparent cards_carousel"  data-layout ="cards_carousel">
                                                            <div class="qodef-testimonials-slider-item item">
                                                                <div id="qodef-testimonials71" class="qodef-testimonial-content">
                                                                    <div class="qodef-testimonial-content-inner">
                                                                        <div class="qodef-testimonial-text-holder">
                                                                            <div class="qodef-testimonial-text-inner">
                                                                                <p class="qodef-testimonial-title" ng-bind="'Permanent Support' | translate"></p>
                                                                                <p class="qodef-testimonial-text" ng-bind="'They are always present when I have needed them, their familiar and friendly treatment facilitates the interaction with their extraordinary work team' | translate"></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="qodef-testimonial-info-holder">
                                                                            <div class="qodef-testimonial-image-holder">
                                                                                <img width="56" height="56" src="./wp-content/themes/cloudemotion/assets/img/testimonials-1.png" class="attachment-71 size-71 wp-post-image" alt="a" />
                                                                            </div>
                                                                            <div class = "qodef-testimonial-author">
                                                                                <p class="qodef-testimonial-author-text">
                                                                                    <span>Gustavo Ovalles </span>
                                                                                    <span class="qodef-testimonials-job">Manager at TechDream</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="qodef-testimonials79" class="qodef-testimonial-content">
                                                                    <div class="qodef-testimonial-content-inner">
                                                                        <div class="qodef-testimonial-text-holder">
                                                                            <div class="qodef-testimonial-text-inner">
                                                                                <p class="qodef-testimonial-title">
                                                                                    Diseño Asombroso.               
                                                                                </p>
                                                                                <p class="qodef-testimonial-text">Se lucieron con el diseño y entendieron a la perfección el modelo de negocios de mi empresa. Gracias a su ingenio hoy me siento más que satisfecho!.</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="qodef-testimonial-info-holder">
                                                                            <div class="qodef-testimonial-image-holder">
                                                                                <img width="56" height="56" src="./wp-content/themes/cloudemotion/assets/img/testimonials-2.png" class="attachment-79 size-79 wp-post-image" alt="a" />
                                                                            </div>
                                                                            <div class = "qodef-testimonial-author">
                                                                                <p class="qodef-testimonial-author-text">
                                                                                    <span>Scarlett Johansson </span>
                                                                                    <span class="qodef-testimonials-job">CEO at SNAP</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="qodef-testimonials81" class="qodef-testimonial-content">
                                                                    <div class="qodef-testimonial-content-inner">
                                                                        <div class="qodef-testimonial-text-holder">
                                                                            <div class="qodef-testimonial-text-inner">
                                                                                <p class="qodef-testimonial-title">
                                                                                    Flexibilidad Total               
                                                                                </p>
                                                                                <p class="qodef-testimonial-text">Nuestra aplicación se adapta a cualquier dispositivo: Teléfono Móvil, Tablet o PC lo que sin distorcionar su contenido y manteniendo una impecable interfaz para los usuarios</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="qodef-testimonial-info-holder">
                                                                            <div class="qodef-testimonial-image-holder">
                                                                                <img width="56" height="56" src="./wp-content/themes/cloudemotion/assets/img/testimonials-3.png" class="attachment-81 size-81 wp-post-image" alt="a" />
                                                                            </div>
                                                                            <div class = "qodef-testimonial-author">
                                                                                <p class="qodef-testimonial-author-text">
                                                                                    <span>Melvin Mora</span>
                                                                                    <span class="qodef-testimonials-job">PR at CTA</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="qodef-testimonials-slider-item item">
                                                                <div id="qodef-testimonials88" class="qodef-testimonial-content">
                                                                    <div class="qodef-testimonial-content-inner">
                                                                        <div class="qodef-testimonial-text-holder">
                                                                            <div class="qodef-testimonial-text-inner">
                                                                                <p class="qodef-testimonial-title">
                                                                                    Capacitación Profesional.             
                                                                                </p>
                                                                                <p class="qodef-testimonial-text"> Es muy gratificante encontrar instructores con tanto dominio del tema y con tanta facilidad para transmitir sus conocimientos, de verdad son extraordinarios, los Felicito.</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="qodef-testimonial-info-holder">
                                                                            <div class="qodef-testimonial-image-holder">
                                                                                <img width="56" height="56" src="./wp-content/themes/cloudemotion/assets/img/testimonials-4.png" class="attachment-88 size-88 wp-post-image" alt="a" />
                                                                            </div>
                                                                            <div class = "qodef-testimonial-author">
                                                                                <p class="qodef-testimonial-author-text">
                                                                                    <span>Albert Einstein </span>
                                                                                    <span class="qodef-testimonials-job">PR at CTA</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="qodef-testimonials89" class="qodef-testimonial-content">
                                                                    <div class="qodef-testimonial-content-inner">
                                                                        <div class="qodef-testimonial-text-holder">
                                                                            <div class="qodef-testimonial-text-inner">
                                                                                <p class="qodef-testimonial-title">
                                                                                    Excelentes &amp; Rápidos.               
                                                                                </p>
                                                                                <p class="qodef-testimonial-text">Gracias a las metodologías ágiles que utilizan, el desarrollo se realiza de manera rápida y sin sacrificar la calidad de la aplicación</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="qodef-testimonial-info-holder">
                                                                            <div class="qodef-testimonial-image-holder">
                                                                                <img width="56" height="56" src="./wp-content/themes/cloudemotion/assets/img/testimonials-5.png" class="attachment-89 size-89 wp-post-image" alt="a" />
                                                                            </div>
                                                                            <div class = "qodef-testimonial-author">
                                                                                <p class="qodef-testimonial-author-text">
                                                                                    <span>Katniss Everdeen </span>
                                                                                    <span class="qodef-testimonials-job">Architect at CUBE</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="qodef-testimonials90" class="qodef-testimonial-content">
                                                                    <div class="qodef-testimonial-content-inner">
                                                                        <div class="qodef-testimonial-text-holder">
                                                                            <div class="qodef-testimonial-text-inner">
                                                                                <p class="qodef-testimonial-title">
                                                                                    Todo en un solo lugar!               
                                                                                </p>
                                                                                <p class="qodef-testimonial-text"> Me asesoraron, diseñaron mi Sitio Web y se encargaron hasta del Hospedaje, tienen todo lo que se pueda necesitar en IT, lo que les da un valor agregado a sus servicios</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="qodef-testimonial-info-holder">
                                                                            <div class="qodef-testimonial-image-holder">
                                                                                <img width="56" height="56" src="./wp-content/themes/cloudemotion/assets/img/testimonials-6.png" class="attachment-90 size-90 wp-post-image" alt="a" />
                                                                            </div>
                                                                            <div class = "qodef-testimonial-author">
                                                                                <p class="qodef-testimonial-author-text">
                                                                                    <span>Bruce Holt </span>
                                                                                    <span class="qodef-testimonials-job">Manager at TechDream</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row wpb_row vc_row-fluid qodef-section qodef-content-aligment-left qodef-grid-section" id="design">
                                    <div class="container" >
                                        <div class="qodef-section-inner-margin clearfix">
                                            <div class="wpb_column vc_column_container col-lg-6 col-md-6">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class="wpb_single_image wpb_content_element vc_align_left">
                                                            <figure class="wpb_wrapper vc_figure">
                                                                <div class="vc_single_image-wrapper   vc_box_border_grey">
                                                                    <img width="525" height="477" src="./wp-content/themes/cloudemotion/assets/img/marketing1.jpg" class="vc_single_image-img attachment-full" />
                                                                </div>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container col-lg-6 col-md-6">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class="vc_empty_space"  style="height: 100px" >
                                                            <span class="vc_empty_space_inner"></span>
                                                        </div>
                                                        <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                                <h2 ng-bind="'More than a Design. It is an Artwork' | translate"></h2>
                                                            </div>
                                                        </div>
                                                        <div class="vc_empty_space"  style="height: 20px" >
                                                            <span class="vc_empty_space_inner"></span>
                                                        </div>
                                                        <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                                <h4 align="justify" ng-bind="'We care about highlighting your style keeping your being in the design . We have a  specialized professionals team to achieve this goal. We will give an unique and catching interface to your website to make it stands out.'|translate"></h4>
                                                            </div>
                                                        </div>
                                                        <div class="vc_empty_space"  style="height: 43px" >
                                                            <span class="vc_empty_space_inner"></span>
                                                        </div>
                                                        <a href="#" target="_self"  class="qodef-btn qodef-btn-medium qodef-btn-solid qodef-btn-icon"  >
                                                            <span class="qodef-btn-text" ng-bind="'See More' | translate"></span>
                                                            <span class="qodef-btn-text-icon">
                                                                <i class="qodef-icon-simple-line-icon icon-rocket " ></i>
                                                            </span>
                                                        </a>
                                                        <div class="vc_empty_space"  style="height: 40px" >
                                                            <span class="vc_empty_space_inner"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445414169321 qodef-content-aligment-center" id="team">
                                    <div class="clearfix qodef-full-section-inner">
                                        <div class="wpb_column vc_column_container">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h2 ng-bind="'Meet the professionals behind your projects' | translate"></h2>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space"  style="height: 22px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h4 ng-bind="'Take a look and certify the knowledge of our developers' | translate"></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445414638610 qodef-content-aligment-center qodef-grid-section" style="">
                                    <div class="container">
                                        <div class="qodef-section-inner-margin qodef-team2 owl-theme owl-carousel clearfix">

                                            <div ng-repeat="team in vm.team" class="col-md-3 col-sm-6 col-xs-6 col-lg-3 item text-center" style="margin-top:1em;margin-bottom:1em;">
                                                <div class="contenido">
                                                    <div class="team-box box-4">
                                                        <div class="team-img main-bg">
                                                            <img ng-src="{{team.image}}" sizes="(max-width: 443px) 100vw, 443px">
                                                        </div>
                                                        <div class="team-details main-bg">
                                                            <h3 class="team-name" ng-bind="team.first_name+' '+team.last_name">Luis García</h3>
                                                            <h5 class="team-pos white" ng-bind="team.position.name">Programador Front-End</h5>
                                                            <strong>Especialidades</strong>

                                                            <div class="social-buttons">
                                                                <a ng-href="www.linkedin.com/in/luis-garcía-rodriguez-a51998110" target="_blank" class="social-button google" href="www.linkedin.com/in/luis-garcía-rodriguez-a51998110">
                                                                    <i class="fa fa-linkedin"></i>    
                                                                </a>
                                                                <a ng-click="copylink('@rexuzsystems')" class="social-button skype">
                                                                    <i class="fa fa-skype"></i>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                        <!-- close div.content_inner -->
                                    </div>
                                    <!-- close div.content -->

                                    <div id="portfolios">

                                    </div>

                                    <footer >
                                        <?php get_footer();?>
                                    </footer>
                                </div>
                                <!-- close div.qodef-wrapper-inner  -->
                            </div>
                            <!-- close div.qodef-wrapper -->
                        </body>
                        </html>
