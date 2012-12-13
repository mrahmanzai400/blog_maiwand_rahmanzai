<?php
session_start();

require('../config/db.php');

$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

$sql = "SELECT post_title FROM posts WHERE post_id={$_GET['id']}";

// Execute select query
$result = $conn->query($sql);
$posts = $result->fetch_assoc();
extract($posts);

// Construct delete query
$sql = 'DELETE FROM posts WHERE post_id='.$_GET['id'];

// Execute query
$conn->query($sql);

// Echo error
if($conn->error != '') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed</h3><p>$sql</p>";
	echo '<pre>$_POST: ';
	print_r($_POST);
	echo '</pre>';
} else {
// Message to display upon redirection
	$_SESSION['flash'] = array(
		'message'=>	 "You have delted $post_name",
		'type'	=>'info'	
	);
	
	// Redirect
	header('Location:../?p=admin/list_posts');
}

// Close DB connection
$conn->close();