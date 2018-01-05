
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
                    $img = get_the_post_thumbnail_url($recent["ID"],'full'); 

                    ?>

                    <li class="qodef-blog-list-item clearfix">
                        <div class="qodef-blog-list-item-inner">
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
