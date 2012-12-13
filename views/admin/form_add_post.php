<?php 
$post_title = '';
$post_text = '';

?>

<h2>Add a post</h2>
<form action="actions/add_post.php" method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="post_title">Title</label>
			<input class="span4" type="text" name="post_title" placeholder="Title" value="<?php  echo $post_title?>"/>
	</div>
	<div class="control-group">
		<label class="control-label" for="post_text">Post</label>
			<textarea name="post_text"></textarea>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-success">Add</button>
		<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
	</div>
</form>