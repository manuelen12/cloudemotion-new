
<div class="qodef-footer-inner clearfix">
    <div class="qodef-footer-top-holder">
        <div class="qodef-footer-top  qodef-footer-top-full">
            <div class="qodef-four-columns clearfix">
                <div class="qodef-four-columns-inner">
                    <div class="qodef-column">
                        <div class="qodef-column-inner">
                            <div id="text-2" class="widget qodef-footer-column-1 widget_text">

                                                <div class="textwidget">
                                                    <div class="vc_empty_space"  style="height: 24px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <a href="">
                                                        <img src="./wp-content/themes/cloudemotion/assets/img/logo-footer.png" alt="logo">
                                                    </a>
                                                    <div class="vc_empty_space"  style="height: 24px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <p>Valle Lindo - Turmero. Aragua, Venezuela</p>
                                                    

                                                    <p><strong>Email:</strong> cloudemotioninfo@gmail.com</p>
                                                    <p><strong>Phone:</strong> +54 (424) 0539 599 </p>
                                                    <p><strong>"Talento 100% Latino"</strong></p>
                                                    <div class="vc_empty_space"  style="height: 28px" >
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="custom-color-row-changer">
                                                        <span class="qodef-icon-shortcode square" style="margin: 0px -5px 0px 0px;width: 36px;height: 36px;line-height: 36px;background-color: rgba(255,255,255,0.01);border-style: solid;border-color: #b4b4b4;border-width: 1px" data-hover-border-color="#25cbf5" data-hover-background-color="#25cbf5" data-hover-color="#ffffff" data-color="#ffffff">
                                                            <a class=""  href="https://www.facebook.com/CloudEmotion-1608492516114619/" target="_blank">
                                                                <i class="qodef-icon-font-awesome fa fa-facebook qodef-icon-element" style="color: #ffffff;font-size:18px" ></i>
                                                            </a>
                                                        </span>
                                                        <span class="qodef-icon-shortcode square" style="margin: 0px -4px 0px 0px;width: 36px;height: 36px;line-height: 36px;background-color: rgba(255,255,255,0.01);border-style: solid;border-color: #b4b4b4;border-width: 1px" data-hover-border-color="#25cbf5" data-hover-background-color="#25cbf5" data-hover-color="#ffffff" data-color="#ffffff">
                                                            <a class=""  href="https://www.linkedin.com/organization/18029443/" target="_blank">
                                                                <i class="qodef-icon-font-awesome fa fa-linkedin qodef-icon-element" style="color: #ffffff;font-size:18px" ></i>
                                                            </a>
                                                        </span>
                                                       
                                                    </div>
                                                </div>
                                            
                            </div>
                        </div>
                    </div>
                    <div class="qodef-column">
                        <div class="qodef-column-inner">
                            <div id="recent-posts-2" class="widget qodef-footer-column-2 widget_recent_entries">
                                <h4 class="qodef-footer-widget-title">Latest Posts</h4>
                                <ul>

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
                                        echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> '; 

                                    }
                                    ?>




                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="qodef-column">
                        <div class="qodef-column-inner">
                            <?php echo do_shortcode("[custom-facebook-feed]"); ?>
                        </div>
                            </div>
                            <div class="qodef-column">
                                <div class="qodef-column-inner">
                                    <div id="text-3" class="widget qodef-footer-column-4 widget_text">
                                        <h4 class="qodef-footer-widget-title">Latest Posts</h4>
                                        <div class="textwidget"></div>
                                    </div>
                                    <div class="widget qodef-latest-posts-widget">
                                        <div class="qodef-blog-list-holder qodef-image-in-box ">
                                            <ul class="qodef-blog-list">

                                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                                                   <li class="qodef-blog-list-item clearfix">
                                                    <div class="qodef-blog-list-item-inner">
                                                        <div class="qodef-item-image clearfix">
                                                            <a href="http://startit.select-themes.com/managing-office-culture-2/">
                                                                <img width="150" height="150" src="./wp-content/themes/cloudemotion/assets/img/b-image-1a.jpg" class="attachment-full size-full wp-post-image" alt="b-image-1a" />
                                                            </a>
                                                        </div>
                                                        <div class="qodef-item-text-holder">
                                                            <h6 class="qodef-item-title ">
                                                                <a href="http://startit.select-themes.com/managing-office-culture-2/" >
                                                                    Managing Office Culture          </a>
                                                                </h6>
                                                                <div class="qodef-item-info-section">
                                                                    <div class="qodef-post-info-date">
                                                                        29th April 2015
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endwhile; endif; ?>

                                            </ul>
                                        </div>
                                    </div>
                                    <div id="text-4" class="widget qodef-footer-column-4 widget_text">
                                        <div class="textwidget">
                                            <div class="vc_empty_space"  style="height: 12px" >
                                                <span class="vc_empty_space_inner"></span>
                                            </div>
                                            <div class="qodef-custom-font-holder" style="font-family: Raleway;font-size: 22px;line-height: 22px;font-weight: 700;letter-spacing: 0px;text-align: left;color: #ffffff" data-font-size= 22 data-line-height= 22>
                                                Newsletter
                                            </div>
                                            <div class="vc_empty_space"  style="height: 7px" >
                                                <span class="vc_empty_space_inner"></span>
                                            </div>
                                            Lorem ipsum dolor sit amet

                                            <div class="vc_empty_space"  style="height: 20px" >
                                                <span class="vc_empty_space_inner"></span>
                                            </div>
                                            <div role="form" class="wpcf7" id="wpcf7-f1334-o1" lang="en-US" dir="ltr">
                                                <div class="screen-reader-response"></div>
                                                <form action="/#wpcf7-f1334-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                                                    <div style="display: none;">
                                                        <input type="hidden" name="_wpcf7" value="1334" />
                                                        <input type="hidden" name="_wpcf7_version" value="4.4.2" />
                                                        <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f1334-o1" />
                                                        <input type="hidden" name="_wpnonce" value="b1b2b2e095" />
                                                    </div>
                                                    <div class="qodef-subscription-form">
                                                        <span class="wpcf7-form-control-wrap your-email">
                                                            <input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your E-Mail" />
                                                        </span>
                                                        <input type="submit" value="&#xe079;" class="wpcf7-form-control wpcf7-submit" />
                                                    </div>
                                                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="qodef-footer-bottom-holder">
                <div class="qodef-footer-bottom-holder-inner">
                    <div class="qodef-column-inner">
                        <div id="text-5" class="widget qodef-footer-text widget_text">
                            <div class="textwidget">Copyright © Select Themes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        wp_footer();
        ?>