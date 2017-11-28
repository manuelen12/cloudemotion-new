<?php
get_header();
?>



<body ng-controller="MainCtrl as vm">

    <div class="loader in"></div>
    <div class="qodef-wrapper">
        <div class="qodef-wrapper-inner">
            <?php     get_template_part( 'template-parts/navigation/navigation-top', null ); ?>
            <?php putRevSlider("cloud") ?>
            
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
                                                                    <div class="qodef-elements-holder-item-content qodef-elements-holder-custom-361605" style="padding: 90px 0px 50px 0px">

                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <h2><strong ng-bind="'We help to create your corporate image' | translate"></strong></h2>
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
                                    <br>
                                    <div >
                                        <h1 ng-bind="'Services' | translate"></h1>
                                        <p ng-bind="'With an idea we offer you many solutions' | translate"></p>
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
                                                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <br>
                                                                <br>
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/marketing_digital.jpg" alt="Marketing Digital" class="img-responsive text-center">
                                                            </div>
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
                                                        </div>
                                                    </div>
                                                    <!-- Tab 2 Landing Page -->
                                                    <div role="tabpanel" class="tab-pane fade" id="Section2">
                                                        <!-- SLIDER -->
                                                        <div id="landing-slider" class="owl-carousel owl-theme" style="opacity: 0; display: block;">
                                                            <div class="owl-wrapper-outer autoHeight" style="height: 0px;"><div class="owl-wrapper" style="width: 600px; left: 0px; display: block;"><div class="owl-item" style="width: 100px;"><div class="testimonial" style="height:200px;">
                                                                <div class="row">
                                                                    <div class="col-md-8 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-4 col-sm-6">
                                                                                <div class="serviceBox">
                                                                                    <div class="service-icon">
                                                                                        <img width="90" src="./landing1.jpg" alt="Marketing Digital" class="text-center">
                                                                                    </div>
                                                                                    <div class="service-content">
                                                                                        <h4>Contenido Relevante</h4>
                                                                                        <p style="line-height:20px; font-size:16px;">
                                                                                            Diseño y contenido en contexto a los enlaces y campañas correspondientes.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-6">
                                                                                <div class="serviceBox" style="border-right:0px;">
                                                                                    <div class="service-icon">
                                                                                        <img width="90" src="./landing2.jpg" alt="Marketing Digital" class="text-center">
                                                                                    </div>
                                                                                    <div class="service-content">
                                                                                        <h4>Impacto en la llamada</h4>
                                                                                        <p style="line-height:20px; font-size:16px;">
                                                                                            Obtener respuesta y comentarios de los usuarios a través de llamadas adecuadas a la acción.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-6">
                                                                                <div class="serviceBox" style="border-right:0px;">
                                                                                    <div class="service-icon">
                                                                                        <img width="90" src="./landing3.jpg" alt="Marketing Digital" class="text-center">
                                                                                    </div>
                                                                                    <div class="service-content">
                                                                                        <h4>Integración Multimedia</h4>
                                                                                        <p style="line-height:20px; font-size:16px;">
                                                                                            Videos, imágenes HD y audio para atraer a los usuarios de manera interactiva.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4 col-sm-6">
                                                                                <div class="serviceBox">
                                                                                    <div class="service-icon">
                                                                                        <img width="90" src="./landing4.jpg" alt="Marketing Digital" class="text-center">
                                                                                    </div>
                                                                                    <div class="service-content">
                                                                                        <h4>Diseño fácil de usar</h4>
                                                                                        <p style="line-height:20px; font-size:16px;">
                                                                                            Permitir que los usuarios naveguen fácilmente para obtener la información que buscan.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-6">
                                                                                <div class="serviceBox" style="border-right:0px;">
                                                                                    <div class="service-icon">
                                                                                        <img width="90" src="./landing5.jpg" alt="Marketing Digital" class="text-center">
                                                                                    </div>
                                                                                    <div class="service-content">
                                                                                        <h4>Arquitectura Planificada</h4>
                                                                                        <p style="line-height:20px; font-size:16px;">
                                                                                            Diseño de página web basado en marketing completo y datos de usuario.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-6">
                                                                                <div class="serviceBox" style="border-right:0px;">
                                                                                    <div class="service-icon">
                                                                                        <img width="90" src="./landing6.jpg" alt="Marketing Digital" class="text-center">
                                                                                    </div>
                                                                                    <div class="service-content">
                                                                                        <h4>Diseños Flexibles</h4>
                                                                                        <p style="line-height:20px; font-size:16px;">
                                                                                            Páginas Web que son fáciles de actualizar o modificar para diferentes estrategias.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-xs-12">
                                                                        <h4>Produciremos una página de aterrizaje que impactará a sus usuarios a primera vista.</h4>
                                                                        <br>
                                                                        <p>Nuestros objetivos son:</p>
                                                                        <ul style="text-align:left">
                                                                            <li>Convertir los visitantes en asociados o fidelizar los ya vinculados.</li>
                                                                            <li>Desplegar contenido destacado y relevante de los productos y servicios.</li>
                                                                            <li>Recoger información o actualizar datos de los asociados o nuevos prospectos.</li>
                                                                            <li>Promocionar las ventajas de adquirir el portafolio de productos y servicios de la compañía.</li>
                                                                            <li>Informar sobre concursos o premios.</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div></div><div class="owl-item" style="width: 100px;"><div class="testimonial">
                                                                <h3>Portafolio</h3>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-xs-6 col-md-3">
                                                                        <a href="http://132.148.131.58/abacoweb/#" class="thumbnail">
                                                                            <img src="./template1.jpg">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-xs-6 col-md-3">
                                                                        <a href="http://132.148.131.58/abacoweb/#" class="thumbnail">
                                                                            <img src="./template2.jpg">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-xs-6 col-md-3">
                                                                        <a href="http://132.148.131.58/abacoweb/#" class="thumbnail">
                                                                            <img src="./template3.jpg">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-xs-6 col-md-3">
                                                                        <a href="http://132.148.131.58/abacoweb/#" class="thumbnail">
                                                                            <img src="./template4.jpg">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-6 col-md-3">
                                                                        <a href="http://132.148.131.58/abacoweb/#" class="thumbnail">
                                                                            <img src="./template5.jpg">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-xs-6 col-md-3">
                                                                        <a href="http://132.148.131.58/abacoweb/#" class="thumbnail">
                                                                            <img src="./template6.jpg">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-xs-6 col-md-3">
                                                                        <a href="http://132.148.131.58/abacoweb/#" class="thumbnail">
                                                                            <img src="./template7.jpg">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-xs-6 col-md-3">
                                                                        <a href="http://132.148.131.58/abacoweb/#" class="thumbnail">
                                                                            <img src="./template8.jpg">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div></div><div class="owl-item" style="width: 100px;"><div class="testimonial">
                                                                <h4 style="font-size:18px">Características y Servicios Landing Page</h4>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Más de 500 paltillas 100% responsivas.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Formas diversas para encuentas o captura de información.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Optimización avanzada para móviles.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    informes gráficos de reportes analíticos sobre las gestiones realizadas.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Implementación de SEO en Landing Pages.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Servicios de Desarrollo y Soporte.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Hosting en servidores propios hasta 200Mb. por Landing Page.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Hasta cuatro (4) Landing Pages mensuales.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div></div></div></div>
                                                            
                                                            
                                                        <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div></div></div>
                                                    </div>
                                                    <!-- Tab 3 Community -->
                                                    <div role="tabpanel" class="tab-pane fade" id="Section3">
                                                        <div id="community-slider" class="owl-carousel owl-theme" style="opacity: 0; display: block;">
                                                            <div class="owl-wrapper-outer autoHeight" style="height: 0px;"><div class="owl-wrapper" style="width: 400px; left: 0px; display: block;"><div class="owl-item" style="width: 100px;"><div class="testimonial">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <img src="./communitymanager.jpg" alt="Marketing Digital" class="text-center img-responsive">
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <h4>Nuestra Gestión de Community Manager integra el mensaje que se desea dar al asociado con la tecnología para:</h4>
                                                                        <br>
                                                                        <hr>
                                                                        <ul style="text-align:left">
                                                                            <li>Hacer la captación de nuevos seguidores.</li>
                                                                            <li>Interactuar, escuchar, fidelizar e impulsar la marca.</li>
                                                                            <li>Publicar y actualizar información de interés general y promover la filosofía organizacional por medio de la misma.</li>
                                                                            <li>Recoger inquietudes, sugerencias y peticiones para dar respuesta correcta y oportuna.</li>
                                                                            <li>Recolectar y actualizar los datos de los asociados.</li>
                                                                            <li>Programar contenido nuevo en fines de semana, en eventos promocionales, concursos o fechas de acontecimientos importantes.</li>
                                                                            <li>Publicación de preguntas o cuestionarios para atraer la atención de los asociados o aquellos que no lo son.</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div></div><div class="owl-item" style="width: 100px;"><div class="testimonial">
                                                                <h4 style="font-size:18px">Servicios Community Manager</h4>
                                                                <p style="font-size:16px">Profesional experto con gestión de redes sociales y marketing digital.</p>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    (10) post mensuales en las redes con diseño especial (Facebook, Twitter, linkedIn, blog).
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Creación de contenido, redacción de mensajes adaptados según el contenido que usted envía al contratarnos.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    (1) post diario de contenido relacionado a (tema de elección por el cliente) (noticias)(Twitter, Facebook, LinkedIn).
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Diseño personalizado de portada Box / (Fondos de redes sociales).
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Moderación de contenidos en Blog.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Analíticos y listado de posibles clientes mensuales.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Creación de perfiles Twitter, Facebook, Instagram.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="serviceBox" style="border-right:0px;">
                                                                            <div class="service-icon">
                                                                                <i class="fa fa-check" style="color:limegreen" aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="service-content">
                                                                                <p style="font-size:18px">
                                                                                    Moderación de comentarios, depurar y contestar comentarios malintencionados hacia la empresa o perfiles profesionales.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div></div></div></div>
                                                            
                                                        <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div>
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
                                                                                    <img width="288" height="272" src="<?php echo get_template_directory_uri(); ?>/assets/img/graphic-2-home-main.png" class="vc_single_image-img attachment-full" alt="a" />
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
                                                                    <img width="551" height="497" src="<?php echo get_template_directory_uri(); ?>/assets/img/image-2-home-main.jpg" class="vc_single_image-img attachment-full" alt="a" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/image-2-home-main.jpg 551w, <?php echo get_template_directory_uri(); ?>/assets/img/image-2-home-main-300x271.jpg 300w, <?php echo get_template_directory_uri(); ?>/assets/img/image-2-home-main-550x497.jpg 550w" sizes="(max-width: 551px) 100vw, 551px" />
                                                                </div>
                                                            </figure>
                                                        </div>
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
                                <div class="vc_row wpb_row vc_row-fluid qodef-section qodef-content-aligment-left qodef-grid-section" id="design">
                                    <div class="container" >
                                        <div class="qodef-section-inner-margin clearfix">
                                            <div class="wpb_column vc_column_container col-lg-6 col-md-6">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class="wpb_single_image wpb_content_element vc_align_left">
                                                            <figure class="wpb_wrapper vc_figure">
                                                                <div class="vc_single_image-wrapper   vc_box_border_grey">
                                                                    <img width="525" height="477" src="<?php echo get_template_directory_uri(); ?>/assets/img/marketing1.jpg" class="vc_single_image-img attachment-full" />
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
