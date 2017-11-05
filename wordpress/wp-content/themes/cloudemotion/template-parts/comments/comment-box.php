
<div class="qodef-comment-form">
	<div id="respond" class="qodef-comment-holder clearfix">
		<?php 
		if ( comments_open(get_the_ID()) || get_comments_number(get_the_ID()) ) :
			comments_template();
		endif;

		?>
	</div>
	<!-- #respond -->
</div>