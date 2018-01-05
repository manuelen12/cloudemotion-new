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
                        <h1 class="qodef-post-title">
                            <?php 
                            if ($home) {
                                echo "<a href='".get_permalink(get_the_ID())."'>".get_the_title()."</a>";
                            }else{
                                the_title(); 
                            }

                            ?>
                        </h1> 
                        <div class="qodef-post-info">
                            <div class="qodef-post-info-author">by <?php the_author_posts_link(); ?>
                            </div>
                            <div class="qodef-post-info-category">
                                in 
                                <?php 
                                $tags = wp_get_post_tags(get_the_ID());
                                foreach ($tags as $tag) {
                                 ?>
                                 <a rel="category tag"><?php echo $tag->name ?></a>,
                                 <?php 

                             }
                             ?>
                         </div>
                         <div class="qodef-post-info-comments-holder">
                            <a class="qodef-post-info-comments" href="<?php echo get_permalink(get_the_ID()); ?>/#comments" target="_self">Comments</a>
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
<?php if (is_single()): 
$author_id = get_the_author_meta('ID');
$social=array(
    "facebook" => get_the_author_meta('facebook', $author_id),
    "twitter" => get_the_author_meta('twitter', $author_id),
    "instagram" => get_the_author_meta('instagram', $author_id),
    "pinterest" => get_the_author_meta('pinterest', $author_id),
    "youtube" => get_the_author_meta('youtube', $author_id),
    "google-plus" => get_the_author_meta('google-plus', $author_id),
);
?>
<div class="author-box">
    <div class="author-image" data-moderator="moderator">

        <?php echo get_avatar(get_the_author_meta( "email" ), 70); ?>
        <label for=""><?php the_author(); ?></label>
    </div>
    <div class="author-content">
        <?php echo get_the_author_meta( "description" ); ?>

        <div class="social-networks">
            <ul class="social-icons icon-circle list-unstyled list-inline">

                <?php foreach ($social as $key => $value): ?>
                    <?php if ($value):  $valid=true;?>
                        <li><a href="<?php echo $value; ?>"><i class="fa fa-<?php echo $key;?>"></i></a></li>
                    <?php endif ?>
                <?php endforeach ?>

                <?php if (!$valid): ?>
                   <img width="200" src="<?php echo get_template_directory_uri(); ?>/build/img/logo_header.jpg" alt="logo"/>

               <?php endif ?>
           </ul>
       </div>
   </div>
</div>
<?php endif ?>

<?php  
if (!isset($home)) {
    get_template_part( 'template-parts/comments/comment-box', null );
}
?>