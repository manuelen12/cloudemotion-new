<?php
get_header();
?>



<body ng-controller="MainCtrl as vm">

    <div class="loader in"></div>

    <div class="qodef-wrapper">
        <div class="qodef-wrapper-inner">
            <?php     get_template_part( 'template-parts/navigation/navigation-top', null ); ?>
            <div ng-show="vm.country=='en'">
                <?php putRevSlider("cloud") ?>
            </div>
            <div ng-show="vm.country=='es'">
                <?php putRevSlider("cloud_es") ?>
            </div>

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


                            <div class="wpb_row vc_row-fluid qodef-section qodef-content-aligment-left"  id="about_us">
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
                                                                    <div class="qodef-elements-holder-item-content qodef-elements-holder-custom-361605" style="padding: 40px 0px 50px 0px">

                                                                        <div class="mainTitle">
                                                                            <h1 ng-bind="'About Us' | translate"></h1>
                                                                            <p ng-bind="'We help to create your corporate image' | translate" ></p>
                                                                        </div>
                                                                        <div class="vc_empty_space"  style="height: 20px" >
                                                                            <span class="vc_empty_space_inner"></span>
                                                                        </div>
                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <h4 align="justify" ng-bind="'We are a team of professionals specialized in Marketing Strategies, Creation of mobile applications, and Web Development, We offer innovative strategies for the growth of your company.'| translate"></h4>.
                                                                                <br>

                                                                                <h4 align="justify" ng-bind="'We analyze your ideas and implement the appropriate methodologies to become your products in the best on the market.'| translate"></h4>.
                                                                            </div>
                                                                        </div>
                                                                        <div class="vc_empty_space"  style="height: 43px" >
                                                                            <span class="vc_empty_space_inner"></span>
                                                                        </div>
                                                                        <a href="#design" target="_self"  class="qodef-btn qodef-btn-medium qodef-btn-solid qodef-btn-icon"  >
                                                                            <span class="qodef-btn-text" ng-bind="'Contact us' | translate"></span>
                                                                            <span class="qodef-btn-text-icon">
                                                                                <i class="qodef-icon-simple-line-icon icon-rocket " ></i>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 qodef-elements-holder-item " >
                                                                <div class="qodef-elements-holder-item-inner">
                                                                    <div class="qodef-elements-holder-item-content qodef-elements-holder-custom-328163" style="padding: 48px 0px 0px 0px">
                                                                        <div class="wpb_single_image wpb_content_element vc_align_right wpb_bottom-to-top">
                                                                            <figure class="wpb_wrapper vc_figure">
                                                                                <div class="vc_single_image-wrapper   vc_box_border_grey">
                                                                                    <img width="504" height="457" src="<?php echo get_template_directory_uri(); ?>/assets/img/programadores.png" class="vc_single_image-img attachment-full" alt="a" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/programadores.png 504w, <?php echo get_template_directory_uri(); ?>/assets/img/graphic-1-home-main-300x272.png 300w" sizes="(max-width: 504px) 100vw, 504px" />
                                                                                </div>
                                                                            </figure>
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

                            <div class="qodef-section qodef-content-aligment-center qodef-grid-section" id="services">
                                <div >
                                    <div class="mainTitle">
                                        <h1 ng-bind="'Services' | translate"></h1>
                                        <p  ng-bind="'With an idea we offer you many solutions' | translate"></p>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="tab" role="tabpanel">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs" role="tablist" id="myTab1" style="text-align:center;">
                                                    <li role="presentation" ng-class="{'active':vm.service_t==2}"><a ng-click="vm.service_t=2" aria-controls="home" role="tab" data-toggle="tab">
                                                        <i><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icomobile.png" width="50px" height="50px" alt="Mobile"></i> Mobile</a></li>
                                                        <li role="presentation" ng-class="{'active':vm.service_t==1}"><a ng-click="vm.service_t=1" aria-controls="home" role="tab" data-toggle="tab">
                                                            <i><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icomarketing.png" width="50px" height="50px" alt="Marketing"></i> Marketing</a></li>
                                                            <li role="presentation" ng-class="{'active':vm.service_t==3}"><a ng-click="vm.service_t=3" aria-controls="home" role="tab" data-toggle="tab">
                                                                <i><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icoweb.png" width="50px" height="50px" alt="Web"></i> Web</a></li>
                                                            </ul>
                                                            <!-- Tab panes -->
                                                            <div class="tab-content tabs">
                                                                <!-- Tab 1 Marketing -->
                                                                <div role="tabpanel" class="tab-pane animated fadeIn" ng-class="{'active':vm.service_t==1}" id="Section1">
                                                                    <div class="row">

                                                                        <div class="col-md-7">
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <div class="serviceBox">
                                                                                        <div class="service-icon">
                                                                                            <img width="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/pay_advertising.png" alt="Marketing Digital" class="text-center">
                                                                                        </div>
                                                                                        <div class="service-content">
                                                                                            <h3 ng-bind="'Pay Advertising' | translate"></h3>
                                                                                            <p style="line-height:20px; font-size:16px;" ng-bind="'Advertise your products or services in the main digital media with Facebook Ads or Google Adwords with a budget adapted to your needs.' | translate">
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <div class="serviceBox" style="border-right:0px;">
                                                                                        <div class="service-icon">
                                                                                            <img width="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/email_marketing.png" alt="Marketing Digital" class="text-center">
                                                                                        </div>
                                                                                        <div class="service-content">
                                                                                            <h3 ng-bind="'Email Marketing' | translate">Email Marketing</h3>
                                                                                            <p style="line-height:20px; font-size:16px;" ng-bind="'Loyalty your subscribers with regular emails, we take care of cleaning your database, design templates and much more.' | translate">
                                                                                                Loyalty your subscribers with regular emails, we take care of cleaning your database, design templates and much more.
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <div class="serviceBox">
                                                                                        <div class="service-icon">
                                                                                            <img width="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/social_media.png" alt="Marketing Digital" class="text-center">
                                                                                        </div>
                                                                                        <div class="service-content">
                                                                                            <h3 ng-bind="'Social Media Marketing' | translate">Social Media Marketing</h3>
                                                                                            <p style="line-height:20px; font-size:16px;" ng-bind="'We use social networks to boost your brand, capture, retain and then convert your followers into potential customers.' | translate">
                                                                                                We use social networks to boost your brand, capture, retain and then convert your followers into potential customers.
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <div class="serviceBox" style="border-right:0px;">
                                                                                        <div class="service-icon">
                                                                                            <img width="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/brand_generation.png" alt="Marketing Digital" class="text-center">
                                                                                        </div>
                                                                                        <div class="service-content">
                                                                                            <h3 ng-bind="'Brand Generation' | translate">Brand Generation</h3>
                                                                                            <p style="line-height:20px; font-size:16px;" ng-bind="'We provide the best advice to define your corporate identity and the communicative values that connect you with your possible clients.' | translate">

                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <article style="zoom:.6;" class="general-cont"> 
                                                                                <div class="animation-content cloud-cont active">
                                                                                    <div class="marketing cloud-1" textAnimation>
                                                                                        <div class="line" data-count="2" data-sizes='["big","small"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["medium","small","small"]'></div>
                                                                                        <div class="line" data-count="2" data-sizes='["small","big"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["small","small","medium"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["medium","small","small"]'></div>
                                                                                    </div>
                                                                                    <div class="marketing cloud-3" textAnimation>
                                                                                        <div class="line" data-count="2" data-sizes='["big","small"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["medium","small","small"]'></div>
                                                                                        <div class="line" data-count="2" data-sizes='["small","big"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["small","small","medium"]'></div>
                                                                                        <div class="line" data-count="2" data-sizes='["big","small"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["medium","small","small"]'></div>
                                                                                        <div class="line" data-count="2" data-sizes='["small","big"]'></div>

                                                                                    </div>
                                                                                    <div class="marketing cloud-2" textAnimation>
                                                                                        <div class="line" data-count="3" data-sizes='["small","big"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["small","small","medium"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["medium","small","small"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["small","big"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["small","small","medium"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["medium","small","small"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["small","big"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["small","small","medium"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["medium","small","small"]'></div>
                                                                                        <div class="line" data-count="3" data-sizes='["medium","small","small"]'></div>
                                                                                    </div>
                                                                                    <div class="marketing count" autoIncrement data-min="0" data-max="10"></div>
                                                                                </div>

                                                                                <div class="animation-content click-cont active">
                                                                                    <div class="marketing count" autoIncrement data-min="0" data-max="10"></div>
                                                                                    <div class="marketing cursor spin">
                                                                                        <div class="marketing blink"></div>
                                                                                    </div>

                                                                                </div>


                                                                                <div class="animation-content barra-cont active">
                                                                                    <div class="barra-base">
                                                                                        <div class="marketing barra"></div>                                     
                                                                                        <div class="marketing barra"></div>                                     
                                                                                        <div class="marketing barra"></div>                                     
                                                                                    </div>
                                                                                </div>


                                                                                <div class="animation-content bomb-cont active">
                                                                                    <div class="light">
                                                                                        <div class="marketing bombilla"></div>                                      
                                                                                    </div>                                      
                                                                                </div>


                                                                                <div class="animation-content coin-cont active">
                                                                                    <div class="marketing coin"></div>                                          
                                                                                    <div class="marketing coin"></div>                                          
                                                                                    <div class="marketing coin"></div>                                          
                                                                                    <div class="marketing coin"></div>                                          
                                                                                </div>


                                                                                <div class="animation-content simple-cont active">
                                                                                    <div class="marketing spined spin"></div>           
                                                                                    <div class="row">
                                                                                        <div class="marketing count" style="position:initial;float:left;" autoIncrement data-min="0" data-max="200"></div>
                                                                                        <div style="position:relative;">
                                                                                            <div class="marketing graph"></div>                                         
                                                                                            <div class="marketing graph"></div>                                         
                                                                                            <div class="marketing graph"></div>                                         
                                                                                        </div>
                                                                                    </div>                              
                                                                                </div>


                                                                                <div class="animation-content blanco-cont active">
                                                                                    <div class="marketing blanco"></div>            
                                                                                </div>


                                                                            </article>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Tab 2 Landing Page -->
                                                                <div role="tabpanel" class="tab-pane animated fadeIn" ng-class="{'active':vm.service_t==2}" id="Section1">
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <article class="general-cont">

                                                                                <div class="mobil1 screen">
                                                                                    <div class="float">
                                                                                        <div class="mobil1 network"></div>
                                                                                    </div>
                                                                                    <div class="float msg">
                                                                                        <div class="mobil1 message"></div>
                                                                                    </div>
                                                                                    <div class="mobil1 screenData"></div>
                                                                                    <div class="mobil1 gear spin"></div>
                                                                                    <div class="mobil1 mobile">

                                                                                        <div class="micas">
                                                                                            <div class="mobil2 mica"></div>         
                                                                                            <div class="mobil2 mica"></div>         
                                                                                            <div class="mobil2 mica">
                                                                                                <div class="mobil1 icon"></div>
                                                                                                <div class="mobil1 icon"></div>
                                                                                                <div class="mobil1 icon"></div>
                                                                                                <div class="mobil1 icon"></div>
                                                                                                <div class="mobil1 icon"></div>
                                                                                                <div class="mobil1 icon"></div>
                                                                                                <div class="mobil1 icon"></div>
                                                                                                <div class="mobil1 icon"></div>
                                                                                            </div>          
                                                                                        </div>          
                                                                                        <div class="mobil2 hand"></div>         
                                                                                    </div>          
                                                                                </div>          

                                                                            </article>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <div class="serviceBox">
                                                                                        <div class="service-icon">
                                                                                            <img width="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/personalized_design.png" alt="Marketing Digital" class="text-center">
                                                                                        </div>
                                                                                        <div class="service-content">
                                                                                            <h3 ng-bind="'Personalized Design' | translate">Personalized Design</h3>
                                                                                            <p style="line-height:20px; font-size:16px;" ng-bind="'We develop an impact interface with animations to make your applications visually impressive for users.' | translate">
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <div class="serviceBox" style="border-right:0px;">
                                                                                        <div class="service-icon">
                                                                                            <img width="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/android_apple.png" alt="Marketing Digital" class="text-center">
                                                                                        </div>
                                                                                        <div class="service-content">
                                                                                            <h3 ng-bind="'Android and Apple' | translate">Android and Apple</h3>
                                                                                            <p style="line-height:20px; font-size:16px;" ng-bind="'We have experience in converting simple ideas into a complex reality for both mobile platforms.' | translate">
                                                                                                We have experience in converting simple ideas into a complex reality for both mobile platforms.
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4 col-sm-4">
                                                                                    <div class="serviceBox">
                                                                                        <div class="service-icon">
                                                                                            <img width="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/updates.png" alt="Marketing Digital" class="text-center">
                                                                                        </div>
                                                                                        <div class="service-content">
                                                                                            <h3 ng-bind="'Updates' | translate">Updates</h3>
                                                                                            <p style="line-height:20px; font-size:16px;" ng-bind="'We ensure that the components of your application will always be in their latest version and available in Appstore and Playstore.' | translate">
                                                                                                We ensure that the components of your application will always be in their latest version and available in Appstore and Playstore.
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4 col-sm-4">
                                                                                    <div class="serviceBox">
                                                                                        <div class="service-icon">
                                                                                            <img width="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/artificial_intelligence.png" alt="Marketing Digital" class="text-center">
                                                                                        </div>
                                                                                        <div class="service-content">
                                                                                            <h3 ng-bind="'Artificial intelligence' | translate">Artificial intelligence</h3>
                                                                                            <p style="line-height:20px; font-size:16px;" ng-bind="'We innovate solutions using automated systems that integrate GPS geolocation, device management by Bluethooth, among others.' | translate">
                                                                                                We innovate solutions using automated systems that integrate GPS geolocation, device management by Bluethooth, among others.
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4 col-sm-4">
                                                                                    <div class="serviceBox" style="border-right:0px;">
                                                                                        <div class="service-icon">
                                                                                            <img width="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/segurity.png" alt="Marketing Digital" class="text-center">
                                                                                        </div>
                                                                                        <div class="service-content">
                                                                                            <h3 ng-bind="'Security' | translate">Security</h3>
                                                                                            <p style="line-height:20px; font-size:16px;" ng-bind="'We integrate the best encryption methods to ensure the confidentiality of your data. A vital function for any application.' | translate">
                                                                                                We integrate the best encryption methods to ensure the confidentiality of your data. A vital function for any application.

                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Tab 3 Community -->
                                                                <div role="tabpanel" class="tab-pane animated fadeIn" ng-class="{'active':vm.service_t==3}" id="Section1">
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <article class="logo-cont">

                                                                                <div id="atomo" ng-show="vm.image_web==1">
                                                                                    <div id="nucleo"></div>
                                                                                    <div class="electron a"></div>
                                                                                    <div class="electron b"></div>
                                                                                    <div class="electron c"></div>
                                                                                    <div class="electron d"></div>
                                                                                    <div class="electron e"></div>
                                                                                    <div class="electron f"></div>
                                                                                    <div class="electron g"></div>
                                                                                </div>

                                                                                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/web_page_1.jpg" alt="Web Page" class="img-responsive text-center animated fadeIn" ng-show="vm.image_web==1"> -->

                                                                                <article class="web-cont animated bounceInDown" ng-show="vm.image_web==2">
                                                                                    <div class="web2 pc">
                                                                                        <div class="draw-base">
                                                                                            <div class="web3 draw"></div>
                                                                                            <div class="web3 draw"></div>
                                                                                            <div class="web3 draw"></div>
                                                                                        </div>
                                                                                    </div>

                                                                                </article>

                                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TEST3.png" alt="Customizable" class="img-responsive text-center animated bounceInLeft" ng-show="vm.image_web==3">

                                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TEST.png" alt="Fast and Adaptive" class="img-responsive text-center animated bounceInUp" ng-show="vm.image_web==4">

                                                                            </article>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <div class="row" ng-mouseenter="vm.image_web=2">
                                                                                <div class="col-md-12 col-sm-12" >
                                                                                    <div class="serviceBox" style="border-right:0px;" >
                                                                                        <div class="service-icon" >
                                                                                            <img width="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/simple_creative_1.png" alt="Web Page" class="text-center">
                                                                                        </div>
                                                                                        <div class="service-content">
                                                                                            <h3 ng-bind="'Simple and Creative' | translate">Simple and Creative</h3>
                                                                                            <p style="line-height:20px; font-size:16px;" ng-bind="'Defer from others with our original and innovative designs. We reflect your identity with the latest technologies.' | translate">
                                                                                                Defer from others with our original and innovative designs. We reflect your identity with the latest technologies.
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">

                                                                                <div class="col-md-6 col-sm-6" ng-mouseenter="vm.image_web=3">
                                                                                    <div class="serviceBox">
                                                                                        <div class="service-icon">
                                                                                            <img width="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/customizable_1.png" alt="Web Page" class="text-center">
                                                                                        </div>
                                                                                        <div class="service-content">
                                                                                            <h3 ng-bind="'Customizable' | translate">Customizable</h3>
                                                                                            <p style="line-height:20px; font-size:16px;" ng-bind="'We work so that your design is visually impressive and captures the immediate attention of your clients.' | translate">
                                                                                                We work so that your design is visually impressive and captures the immediate attention of your clients.
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6" ng-mouseenter="vm.image_web=4">
                                                                                    <div class="serviceBox" style="border-right:0px;">
                                                                                        <div class="service-icon">
                                                                                            <img width="80" src="<?php echo get_template_directory_uri(); ?>/assets/img/fast_adaptive.png" alt="Web Page" class="text-center">
                                                                                        </div>
                                                                                        <div class="service-content">
                                                                                            <h3 ng-bind="'Fast and adaptive' | translate">Fast and adaptive</h3>
                                                                                            <p style="line-height:20px; font-size:16px;" ng-bind="'We think about performance, we design pages that load fast and adapt to the resolution of the device.' | translate">
                                                                                                We think about performance, we design pages that load fast and adapt to the resolution of the device.
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
                                        </div>

                                        <div class="wpb_row vc_row-fluid qodef-section qodef-content-aligment-left">
                                            <section id="portfolio" class="section cover bg-black">

                                                <div class="mainTitle">
                                                    <h1 ng-bind="'Our Portfolio' | translate"></h1>
                                                    <p ng-bind="'Know our work and discover the quality with which we work' | translate" ></p>
                                                </div>

                                                <nav class="filter-bar bg-primary dark">
                                                    <div class="tabs-wrapper">
                                                        <ul class="filter nav nav-tabs owl-carousel category" data-filter-list="#hiddenCollapse">

                                                            <li class="item active" ng-class="{'active':vm.selected==''}" ng-click="vm.selected=''">
                                                                <a href="" data-filter="*" ng-bind="'Todos'"></a>
                                                            </li>
                                                            <li class="item" ng-repeat="categ in vm.category" ng-class="{'active':vm.selected==categ.id}" ng-click="vm.selected=cated.id">
                                                                <a href="" data-filter="{{'.'+categ.class | lowercase}}" ng-bind="categ.name"></a>
                                                            </li>

                                                        </ul>
                                                        <span class="selector"></span>
                                                    </div>
                                                </nav>

                                                <div id="hiddenCollapse" class="filter-list row masonry no-spaces collapse" aria-expanded="false">
                                                    <span class="collopen" data-toggle="collapse" data-target="#hiddenCollapse">Collapse</span>
                                                    <span class="collclose" data-toggle="collapse" data-target="#hiddenCollapse">Close collapse</span>
                                                    <div ng-repeat="portfolio in vm.portfolios"  style="padding: 0;" ng-show="portfolio.classification.id==vm.selected || !vm.selected" class="{{portfolio.class | lowercase}} col-md-4 col-sm-6 col-xs-12 animated fadeIn" >           
                                                        <div class="image-box">
                                                            <div class="image" >
                                                                <img ng-src="{{portfolio.image}}" />
                                                                <a href="" data-toggle="ajax-modal"></a>
                                                            </div>
                                                            <div class="hover"  ng-click="vm.openModal(portfolio)" >
                                                                <img src="{{portfolio.company.image}}" class="img-responsive" alt="Image">
                                                                <a class="text-center">
                                                                    <h4 class="mb-0" ng-bind="portfolio.company.name"></h4>
                                                                    <span class="text-muted" ng-bind="portfolio.name"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>                
<!--                                                     <p >Sorry, no posts matched your criteria.</p> -->
                                                </div>
                                            </section>
                                        </div>




                                        <div data-qodef-parallax-speed="0.5" id="testimonials" class="wpb_row vc_row-fluid qodef-section vc_custom_1445345084553 qodef-content-aligment-left qodef-parallax-section-holder qodef-parallax-section-holder-touch-disabled" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/parallax-2-home-main.jpg);">
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

                                                            <div class="qodef-testimonials-holder">
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
                                                                                        <img width="56" height="56" src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials-1.png" class="attachment-71 size-71 wp-post-image" alt="a" />
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
                                                                                        <img width="56" height="56" src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials-2.png" class="attachment-79 size-79 wp-post-image" alt="a" />
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
                                                                                        <img width="56" height="56" src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials-3.png" class="attachment-81 size-81 wp-post-image" alt="a" />
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
                                                                                        <img width="56" height="56" src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials-4.png" class="attachment-88 size-88 wp-post-image" alt="a" />
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
                                                                                        <img width="56" height="56" src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials-5.png" class="attachment-89 size-89 wp-post-image" alt="a" />
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
                                                                                        <img width="56" height="56" src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials-6.png" class="attachment-90 size-90 wp-post-image" alt="a" />
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


                                        <div class="wpb_row vc_row-fluid qodef-section qodef-content-aligment-center" id="blog">

                                            <div class="mainTitle">
                                                <h1 ng-bind="'Blogs' | translate"></h1>
                                                <p ng-bind="'Keep in touch with the latest technologie post' | translate"></p>
                                            </div>


                                            <div class="row owl-carousel owl-blog owl-theme">
                                                <?php
                                                $args = array(
                                                    'numberposts' => 10,
                                                    'offset' => 0,
                                                    'category' => 0,
                                                    'orderby' => 'post_date',
                                                    'order' => 'DESC',
                                                    'include' => '',
                                                    'exclude' => '',
                                                    'meta_key' => '',
                                                    'meta_value' =>'',
                                                    'post_type' => 'post',
                                                    'post_status' => 'draft, publish, future, pending, private',
                                                    'suppress_filters' => true
                                                    );

                                                $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
                                                foreach ($recent_posts as $recent) { 
                                                    $img = get_the_post_thumbnail_url($recent["ID"],'full'); 
                                                    ?>

                                                    <article id="post-" class="tag-post item">
                                                        <div class="qodef-post-content">
                                                            <?php if ($img) {?>
                                                            <div class="qodef-post-image">

                                                                <a  <?php echo 'href="' . get_permalink($recent["ID"]) . '" title="'.$recent["post_title"].'"  '; ?>
                                                                    >

                                                                    <img  height="447" src="<?php echo $img; ?>" class="m_center img-responsive" alt="image" />    
                                                                </a>
                                                            </div>
                                                            <?php }; ?>
                                                            <div class="qodef-post-text">
                                                                <div class="qodef-post-text-inner">
                                                                    <h2 class="qodef-post-title">
                                                                        <a href="http://startit.select-themes.com/news-app-deliveres-fresh-ideas/" title="New Apps &#8211; Fresh Ideas"><?php echo $recent["post_title"]; ?></a>
                                                                    </h2>               
                                                                    <div class="qodef-post-info">
                                                                        <div class="qodef-post-info-date">
                                                                            <?php echo date('n-j-Y', strtotime($recent['post_date'])); ?>
                                                                        </div>
                                                                    </div>
                                                                    <p class="qodef-post-excerpt"><?php echo wp_trim_words($recent["post_content"]); ?></p>
                                                                    <a href="<?php echo get_permalink($recent["ID"]); ?>" target="_self"  class="qodef-btn qodef-btn-small qodef-btn-default"  >
                                                                        <span class="qodef-btn-text" ng-bind="'Read More' | translate"></span>   
                                                                        <span class="qodef-btn-text-icon"></span>
                                                                    </a>       
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <?php } ?>


                                                </div>


                                            </div>
                                            <div class="wpb_row vc_row-fluid qodef-section qodef-content-aligment-center" id="team">

                                                <div class="clearfix qodef-full-section-inner">
                                                    <div class="wpb_column vc_column_container">
                                                        <div class="vc_column-inner ">
                                                            <div class="wpb_wrapper">
                                                                <div class="mainTitle">
                                                                        <h1 ng-bind="'Team' | translate"></h1>
                                                                        <p ng-bind="'Take a look and certify the knowledge of our developers' | translate"></p>
                                                                </div>
                                                                <div class="team owl-carousel owl-theme">

                                                                    <div class="card item" ng-class="{'active' : team.active}" ng-repeat="team in vm.team">
                                                                        <div class="photo">
                                                                            <img on-error-src="./wp-content/themes/cloudemotion/assets/img/default_p.png" ng-src="{{team.image}}" class="img-responsive" alt="Image">
                                                                        </div>
                                                                        <div class="banner"></div>
                                                                        <ul class="title-team">
                                                                            <li><label ng-bind="team.first_name+' '+team.last_name" class="ttl"></label></li>
                                                                            <li ng-bind="team.position.name"></li>

                                                                        </ul>
                                                                        <button class="contact" id="main-button" ng-click="team.active=!team.active">Skills</button>
                                                                        <div class="social-media-banner">
                                                                            <a ng-if="team.linkedin" ng-href="team.linkedin"><i class="fa fa-linkedin"></i></a>
                                                                            <a ng-if="team.twitter" ng-href="team.twitter"><i class="fa fa-twitter"></i></a>
                                                                            <a ng-if="team.skype" title="{{team.skype}}"><i class="fa fa-skype"></i></a>
                                                                            <a ng-if="team.youtube" ng-href="team.youtube"><i class="fa fa-youtube"></i></a>
                                                                        </div>
                                                                        <form class="email-form">
                                                                            <div class="row">
                                                                                <ul>
                                                                                    <li ng-if="!team.user_skill.length"><label class="label label-default">No skills registered yet</label></li>
                                                                                    <li ng-if="team.user_skill.length" ng-repeat="skill in team.user_skill">
                                                                                        <label class="label label-primary" ng-bind="skill.name"></label>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="wpb_row vc_row-fluid qodef-section qodef-content-aligment-center" id="contact-us">

                                                <footer class="foot" >
                                                    <?php get_footer();?>
                                                </footer>
                                            </div>
                                            <!-- close div.qodef-wrapper-inner  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalportfolio">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" >Portafolio View</h4>
                                </div>
                                <div class="modal-body">
                                    <img ng-src="{{vm.seeData.image}}" width="400" height="400" style="margin:0 auto;" class="img-responsive" alt="Image">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <a ng-href="{{vm.seeData.url}}"  class="btn btn-primary"  target="_blank">Go to Proyect</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </body>
                </html>
