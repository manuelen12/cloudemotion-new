<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<link href="<?php echo get_bloginfo( 'template_directory' );?>/assets/css/modules.min.css" rel="stylesheet">
<link href="<?php echo get_bloginfo( 'template_directory' );?>/assets/css/blogs.css" rel="stylesheet">
<link href="<?php echo get_bloginfo( 'template_directory' );?>/assets/css/style.css" rel="stylesheet">
<link href="<?php echo get_bloginfo( 'template_directory' );?>/assets/css/bootstrap.min.css" rel="stylesheet">


<?php     get_template_part( 'template-parts/navigation/navigation-top', null ); ?>


<div class="qodef-title-holder single_post">
    <div class="qodef-container clearfix">
        <div class="qodef-container-inner">
            <div class="qodef-title-subtitle-holder" style="">
                <div class="qodef-title-subtitle-holder-inner">
                    <h3><span>Home Blogs</span></h3>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid">

    <div class="qodef-blog-holder qodef-blog-type-standard">
        <div class="col-md-12 qodef-content-has-sidebar  clearfix">
            <div class="col-lg-9 col-md-8 qodef-content-left-from-sidebar">

                <?php

                while ( have_posts() ) : the_post();


                ?>
                <div class="qodef-column-inner">

                    <?php 
                    set_query_var( 'home', true );
                    get_template_part( 'template-parts/post/content-front', get_post_format() );
                    ?>

                </div>

                <?php  


                endwhile;
                ?>
            </div>

            <div class="col-lg-3 col-md-4">
                    <?php echo get_sidebar(); ?>
            </div>

        </div>
    </div>
    
</div>



