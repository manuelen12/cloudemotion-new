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


<?php     get_template_part( 'template-parts/navigation/navigation-top', null ); ?>


<?php

while ( have_posts() ) : the_post();


?>
<div class="qodef-container" style="margin-top:100px;">
    <div class="qodef-container-inner single-container">
        <div class="qodef-blog-holder qodef-blog-type-standard">
            <div class="qodef-two-columns-75-25 qodef-content-has-sidebar  clearfix">
                <div class="col-md-8 col-lg-8 ">
                    <div class="qodef-column-inner">

                        <?php  
                        get_template_part( 'template-parts/post/content-front', get_post_format() );
                        ?>

                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <?php echo get_sidebar(); ?>
                </div>

            </div>
        </div>
    </div>
</div>

<?php  
/*                        // If comments are open or we have at least one comment, load up the comment template.

            // Previous/next post navigation.
the_post_navigation( array(
    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
    '<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
    '<span class="post-title">%title</span>',
    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
    '<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
    '<span class="post-title">%title</span>',
    ) );

*/
    endwhile;
    ?>

