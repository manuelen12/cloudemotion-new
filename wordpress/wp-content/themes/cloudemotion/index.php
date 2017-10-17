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


<div class="qodef-title-holder">
    <div class="qodef-container clearfix">
        <div class="qodef-container-inner">
            <div class="qodef-title-subtitle-holder" style="">
                <div class="qodef-title-subtitle-holder-inner">
                    <h1><span>Blog Standard</span></h1>
                    <span class="qodef-subtitle"><span>Lorem ipsum dolor sit</span></span>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

while ( have_posts() ) : the_post();


?>
<div class="qodef-container">
    <div class="qodef-container-inner">
        <div class="qodef-blog-holder qodef-blog-type-standard">
            <div class="qodef-two-columns-75-25 qodef-content-has-sidebar  clearfix">
                <div class="qodef-column1 qodef-content-left-from-sidebar">
                    <div class="qodef-column-inner">

                        <?php  
                        get_template_part( 'template-parts/post/content-front', get_post_format() );
                        ?>

                    </div>
                </div>

                <div class="qodef-column2">
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
                                        ?>

                                        <li class="qodef-blog-list-item clearfix">
                                            <div class="qodef-blog-list-item-inner">
                                                <div class="qodef-item-image clearfix">
                                                    <a href="http://startit.select-themes.com/managing-office-culture-2/">
                                                        <img width="150" height="150" src="http://startit.select-themes.com/wp-content/uploads/2015/04/b-image-1a.jpg" class="attachment-full size-full wp-post-image" alt="b-image-1a">                
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
                                        echo array_keys($comment);
                                    ?>
                                    <li class="recentcomments">
                                        <span class="comment-author-link"><?php echo $comment["comment_author"] ?></span> on 
                                        <a href="http://startit.select-themes.com/product/limited-edition-headphones/#comment-56">Limited Edition Headphones</a>
                                    </li>
                                    <?php 
                                    endforeach;
                                    ?>

                                </ul>

                            </div>
                            <div class="widget widget_archive">
                                <h4>Archive</h4>
                                <ul>
                                    <li><a href="http://startit.select-themes.com/2016/07/">July 2016</a>&nbsp;(12)</li>
                                    <li><a href="http://startit.select-themes.com/2015/10/">October 2015</a>&nbsp;(6)</li>
                                    <li><a href="http://startit.select-themes.com/2015/09/">September 2015</a>&nbsp;(4)</li>
                                    <li><a href="http://startit.select-themes.com/2015/08/">August 2015</a>&nbsp;(5)</li>
                                    <li><a href="http://startit.select-themes.com/2015/07/">July 2015</a>&nbsp;(3)</li>
                                    <li><a href="http://startit.select-themes.com/2015/06/">June 2015</a>&nbsp;(3)</li>
                                    <li><a href="http://startit.select-themes.com/2015/05/">May 2015</a>&nbsp;(3)</li>
                                    <li><a href="http://startit.select-themes.com/2015/04/">April 2015</a>&nbsp;(4)</li>
                                </ul>
                            </div>    
                        </aside>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php  
                        // If comments are open or we have at least one comment, load up the comment template.
echo "hola mudno";
echo comments_open(get_the_ID());
if ( comments_open(get_the_ID()) || get_comments_number(get_the_ID()) ) :
    comments_template();
endif;
            // Previous/next post navigation.
the_post_navigation( array(
    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
    '<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
    '<span class="post-title">%title</span>',
    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
    '<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
    '<span class="post-title">%title</span>',
    ) );


endwhile;
?>



<?php get_footer(); ?>