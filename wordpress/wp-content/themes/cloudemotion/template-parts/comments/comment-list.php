


<?php 

$args = array(
	'status' => 'approve',
	'number' => '5',
	'orderby'=> 'comment_date',
	'post_id'=> (get_the_ID()),
	);
$comments = get_comments($args);

if (count($comments)>0) {


	?>

	<div class="qodef-comment-holder clearfix" id="comments">
		<div class="qodef-comment-number">
			<div class="qodef-comment-number-inner">
				<h6><?php echo count($comments); ?> Comment </h6>
			</div>
		</div>
		<div class="qodef-comments">
			<ul class="qodef-comment-list">

				<?php 

				foreach($comments as $comment) :
					echo array_keys($comment);
				?>

				<li>
					<div class="qodef-comment clearfix">
						<div class="qodef-comment-image">
							<img alt="" src="http://2.gravatar.com/avatar/279e22ae88264ca29a99c4a0f20fe65a?s=75&amp;d=mm&amp;r=g" class="avatar avatar-75 photo" height="75" width="75">
						</div>
						<div class="qodef-comment-text">
							<div class="qodef-comment-info">
								<h5 class="qodef-comment-name">
									Victor Jacobs											</h5>
									<a rel="nofollow" class="comment-reply-link" href="http://startit.select-themes.com/news-app-deliveres-fresh-ideas/?replytocom=44#respond" onclick="return addComment.moveForm( &quot;comment-44&quot;, &quot;44&quot;, &quot;respond&quot;, &quot;934&quot; )" aria-label="Reply to Victor Jacobs">Reply</a>
								</div>
								<div class="qodef-comment-date-holder">
									<span class="qodef-comment-date">Posted at 9:06 am, 26th October 2015</span>
								</div>
								<div class="qodef-text-holder" id="comment-44">
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
								</div>
							</div>
						</div>
					</li>
					<?php 
					endforeach;
					?>

					<!-- #comment-## -->
				</ul>
			</div>
		</div>
		<?php 

	}else{
		?>

		<blockquote class="qodef-blockquote-shortcode">
			<h4 class="qodef-blockquote-text">
			<span>Sorry but in this moments doesnt have any comment</span>
			</h4>
		</blockquote>
		<?php 
	}
	?>