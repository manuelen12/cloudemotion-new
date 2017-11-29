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
                            

                            <div class="vc_row wpb_row vc_row-fluid qodef-section qodef-content-aligment-left"  id="about_us">
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

                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <h2 style="font-size: 55px;"><strong ng-bind="'About us' | translate">About Us</strong></h2>
                                                                                <h2 style="font-size: 25px; color:grey"><strong ng-bind="'We help to create your corporate image' | translate"></strong></h2>
                                                                            </div>
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
                                <div class="container">
                                    <div >
                                        <h1 style="font-size: 55px" ng-bind="'Services' | translate"></h1>
                                        <p style="color:grey; font-size: 25px" ng-bind="'With an idea we offer you many solutions' | translate"></p>
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
                                                                <br>
                                                                <br>
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/marketing_digital.png" alt="Marketing Digital" class="img-responsive text-center">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Tab 2 Landing Page -->
                                                    <div role="tabpanel" class="tab-pane animated fadeIn" ng-class="{'active':vm.service_t==2}" id="Section1">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <br>
                                                                <br>
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mobile_phone.png" alt="Marketing Digital" class="img-responsive text-center">
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
                                                                <br>
                                                                <br>
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

                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TEST5.png" alt="Simple and Creative" class="img-responsive text-center animated bounceInDown" ng-show="vm.image_web==2">
                                                                
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TEST3.png" alt="Customizable" class="img-responsive text-center animated bounceInLeft" ng-show="vm.image_web==3">
                                                                
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TEST.png" alt="Fast and Adaptive" class="img-responsive text-center animated bounceInUp" ng-show="vm.image_web==4">
                                                                
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
                                                <div class="owl-carousel owl-theme portfolio">
                                                      <article ng-repeat="portfolio in vm.portfolios" class="qodef-portfolio-item col-no-p item" >
                                                            <a class ="qodef-portfolio-link" href="https://cloudemotionteam.com" target="_self"></a>
                                                            <div class = "qodef-item-image-holder" style="background-image:'http://cloudemotion.com.ve:8561/api/v0/tmp_media/Email-Uk-Trending.jpg'">
                                                                <img src="{{portfolio.image}}" alt="">
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

                            
                                

                                <div data-qodef-parallax-speed="0.5" id="testimonials" class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445345084553 qodef-content-aligment-left qodef-parallax-section-holder qodef-parallax-section-holder-touch-disabled" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/parallax-2-home-main.jpg);">
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
                               

                                <?php echo do_shortcode('[amo_member id="50,52,51,53" item-width="250" align="left" item-margin="20" full-width="no" panel="center"]'); ?>
                                   
                               
                                <div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445414638610 qodef-content-aligment-center qodef-grid-section" style="">
                                    <div class="container">
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
