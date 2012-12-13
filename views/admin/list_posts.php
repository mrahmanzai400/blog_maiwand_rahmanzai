<?php

$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

$sql = "SELECT * FROM posts ORDER BY post_id DESC";

$results = $conn->query($sql);

?>
<h2>Posts</h2>
<table class="table table-striped table-condensed table-bordered">
	<tr>
		<th>Post Title</th>
		<th>Date Published</th>
		<th>Post Text</th>
	</tr>
<?php while($posts = $results->fetch_assoc()): ?>
	<tr>
		<td><?php echo $posts['post_title']?></td>
		<td><?php echo $posts['post_datepublished']?></td>
		<td class="actions">
			<a class="btn btn-warning btn-mini" title="EDIT" href="./?p=admin/form_edit_post&amp;id=<?php echo $posts['post_id']?>"><i class="icon-edit icon-white"></i></a>
			<a class="btn btn-danger btn-mini" title="DELETE" href="actions/delete_post.php?id=<?php echo $posts['post_id']?>"><i class="icon-trash icon-white"></i></a>
	</tr>
<?php  endwhile; ?>
</table>
<a class="btn btn-primary" href="./?p=admin/form_add_post.php"><i class="icon-plus icon-white"></i>Post</a>
