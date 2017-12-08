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


<div class="qodef-title-holder">
    <div class="qodef-container clearfix">
        <div class="qodef-container-inner">
            <div class="qodef-title-subtitle-holder" style="">
                <div class="qodef-title-subtitle-holder-inner">
                    <h1><span><?php the_title(); ?></span></h1>
                    <span class="qodef-subtitle"><span><?php echo get_the_date(); ?></span></span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">

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
                <div class="qodef-column-inner">
                    <aside class="qodef-sidebar">
                        <div class="widget qodef-latest-posts-widget"><div class="qodef-blog-list-holder qodef-image-in-box ">
                            <ul class="qodef-blog-list">
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
                                    $img = wp_get_attachment_image_src(get_post_thumbnail_id(),'full'); 

                                    ?>

                                    <li class="qodef-blog-list-item clearfix">
                                        <div class="qodef-blog-list-item-inner">
                                            <div class="qodef-item-image clearfix">
                                                <a href="http://startit.select-themes.com/managing-office-culture-2/">
                                                    <img width="150" height="150" src="<?php echo $img; ?>" class="attachment-full size-full wp-post-image" alt="b-image-1a">                
                                                </a>
                                            </div>
                                            <div class="qodef-item-text-holder">            
                                                <h6 class="qodef-item-title ">
                                                    <?php       echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> '; ?>
                                                </h6>

                                                <div class="qodef-item-info-section">
                                                    <div class="qodef-post-info-date">
                                                        <?php echo $recent["post_date"]; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </li>
                                    <?php } ?>
                                </ul>   
                            </div>
                        </div>
                        <?php 
                        $categories = get_categories( array(
                            'orderby' => 'name',
                            'order'   => 'ASC'
                            ) );

                            if(count($categories)): ?>
                            <div class="widget widget_categories"><h4>Categories</h4>   
                                <ul>

                                    <?php

                                    foreach( $categories as $category ) {
                                        $category_link = sprintf( 
                                            '<li class="cat-item cat-item-93"><a href="%1$s" alt="%2$s">%3$s</a></li>',
                                            esc_url( get_category_link( $category->term_id ) ),
                                            esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
                                            esc_html( $category->name )
                                            );
                                        echo $category_link;
                                    } 
                                    ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="widget widget_recent_comments">

                            <h4>Recent Comments</h4>
                            <ul id="recentcomments">
                                <?php 

                                $args = array(
                                    'status' => 'approve',
                                    'number' => '5',
                                    'orderby'=> 'comment_date',
                                    );
                                $comments = get_comments($args);
                                foreach($comments as $comment) :
                                    ?>
                                <li class="recentcomments">
                                    <span class="comment-author-link"><?php echo $comment->comment_author; ?></span> on 
                                    <a href="<?php echo get_permalink($comment->comment_post_ID); ?>"><?php echo $comment->post_name; ?></a>
                                </li>
                                <?php 
                                endforeach;
                                ?>

                            </ul>

                        </div>
                        <div class="widget widget_archive">

                            <h4>Archive</h4>
                            <ul>
                                <?php wp_get_archives('type=monthly'); ?>
                            </ul>
                        </div>    
                    </aside>
                </div>
            </div>

        </div>
    </div>
    
</div>



