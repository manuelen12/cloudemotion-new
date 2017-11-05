<article id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> post type-post status-publish format-standard has-post-thumbnail hentry category-innovation category-optimization category-sustainable tag-potential tag-project tag-social">
    <div class="qodef-post-content">
        <div class="qodef-post-image">
            <a href="http://startit.select-themes.com/news-app-deliveres-fresh-ideas/" title="New Apps – Fresh Ideas">
                <img width="820" height="447" src="http://startit.select-themes.com/wp-content/uploads/2015/10/b-new-news-app-deliveres-fresh-ideas.jpg" class="attachment-full size-full wp-post-image" alt="image" srcset="http://startit.select-themes.com/wp-content/uploads/2015/10/b-new-news-app-deliveres-fresh-ideas.jpg 820w, http://startit.select-themes.com/wp-content/uploads/2015/10/b-new-news-app-deliveres-fresh-ideas-300x164.jpg 300w, http://startit.select-themes.com/wp-content/uploads/2015/10/b-new-news-app-deliveres-fresh-ideas-768x419.jpg 768w" sizes="(max-width: 820px) 100vw, 820px">      </a>
            </div>
            <div class="qodef-post-text">
                <div class="qodef-post-text-inner">
                    <div class="qodef-blog-standard-post-date">
                        <span class="date"><?php echo get_the_date("d"); ?></span>
                        <span class="month"><?php echo get_the_date("M"); ?></span>
                    </div>              
                    <div class="qodef-blog-standard-info-holder">
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
                    <p class="qodef-post-excerpt">
                        <?php
                            if ($home) {
                                echo wp_trim_words( get_the_content(), 40, '...' );
                            }else the_content(); 

                         ?>
                    </p>
                    <a href="http://startit.select-themes.com/news-app-deliveres-fresh-ideas/" target="_self" class="qodef-btn qodef-btn-small qodef-btn-default">
                        <span class="qodef-btn-text">Read More</span>    
                        <span class="qodef-btn-text-icon"></span>                    
                    </a>
                </div>
            </div>
        </div>
    </article>
    <?php  
    echo var_dump($home);
    if (!isset($home)) {
    get_template_part( 'template-parts/comments/comment-box', null );
    }
    ?>