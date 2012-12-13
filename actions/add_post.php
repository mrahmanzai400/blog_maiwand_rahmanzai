<?php
session_start();
require('../config/db.php');

extract($_POST);

if($post_title == '' || $post_text == '') {
	$_SESSION['flash'] = array (
	'message' => 'Pleas provide all information.' ,
	'type'	  => 'danger'
	);
	$_SESSION['post_title'] = $post_title;
	$_SESSION['post_text'] = $post_text;
}

// Connect
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);


$post_title = addslashes($post_title);
$post_text = addslashes($post_text);
$sql = "INSERT INTO posts (post_title,post_text) VALUES('$post_title','$post_text')";

$conn->query($sql);

if($conn->error !='') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed<h3><p>$sql</p>";
	echo '<pre>$_POST: ';
	print_r($_POST);
	echo '</pre>';
} else {
	$_SESSION['flash'] = array(
			'message'=> "You have posted $post_title",
			'type' => 'success'
	);		
	// Redirect
	header('Location:../?p=admin/list_posts');
}

