<?php
/*
Jonathon McDonald
07/19/12
Displays comments, and a comment form 
*/
$comments = get_comments();
?>
<?php foreach($comments as $comment): ?>
	<div class="comment">
		<strong><?php echo $comment->comment_author; ?></strong>
		<br />
		<?php echo $comment->comment_content; ?>
	</div>
<?php endforeach; ?>
<?php comment_form(); ?>