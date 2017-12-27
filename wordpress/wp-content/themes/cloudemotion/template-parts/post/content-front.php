<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');  ?>

<article id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> post type-post status-publish format-standard has-post-thumbnail hentry category-innovation category-optimization category-sustainable tag-potential tag-project tag-social">
    <div class="qodef-post-content">
        
        <?php if ($img) {
            ?>

            <div class="qodef-post-image">
                <a href="<?php echo get_permalink(get_the_ID()); ?>" title="<?php the_title(); ?>">
                    <img width="820" height="447" src="<?php echo $img[0]; ?>" class="attachment-full size-full wp-post-image" alt="image">
                </a>
            </div>
            <?php 
        }
        ?>

        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">

                <div class="row title-blog">
                    <div class="qodef-blog-standard-post-date">
                        <span class="date"><?php echo get_the_date("d"); ?></span>
                        <span class="month"><?php echo get_the_date("M"); ?></span>
                    </div>              
                    <div class="blog-standard-title">
                        <h2 class="qodef-post-title">
                            <a href="http://startit.select-themes.com/news-app-deliveres-fresh-ideas/" title="New Apps – Fresh Ideas"><?php the_title(); ?></a>
                        </h2> 
                        <div class="qodef-post-info">
                            <div class="qodef-post-info-author">by <a class="qodef-post-info-author-link" href="http://startit.select-themes.com/author/admin/"><?php the_author(); ?></a>
                            </div>
                            <div class="qodef-post-info-category">
                                in <a href="http://startit.select-themes.com/category/all/innovation/" rel="category tag">Innovation</a>, <a href="http://startit.select-themes.com/category/all/optimization/" rel="category tag">Optimization</a>, <a href="http://startit.select-themes.com/category/all/sustainable/" rel="category tag">Sustainable</a>
                            </div>
                            <div class="qodef-post-info-comments-holder">
                                <a class="qodef-post-info-comments" href="http://startit.select-themes.com/news-app-deliveres-fresh-ideas/#comments" target="_self">Comments</a>
                            </div>
                        </div>
                    </div>

                </div>
                <p class="qodef-post-excerpt">
                    <?php
                    if ($home) {
                        echo wp_trim_words( get_the_content(), 40, '...' );
                    }else the_content(); 

                    ?>
                </p>
                <?php if (is_home()) {
                   ?>
                   <div class="m_center text-center">
                       <a <?php echo 'href="' . get_permalink($recent["ID"]) . '"'; ?> target="_self" class="qodef-btn qodef-btn-small qodef-btn-default m_center">
                        <span class="qodef-btn-text">Read More</span>    
                        <span class="qodef-btn-text-icon"></span>                    
                    </a>
                </div>
                <?php 
            } ?>
        </div>
    </div>
</div>
</article>
<?php  
if (!isset($home)) {
    get_template_part( 'template-parts/comments/comment-box', null );
}
?>