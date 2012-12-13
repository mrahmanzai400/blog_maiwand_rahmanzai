<?php

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct query
$sql = "SELECT * FROM posts ORDER BY post_datepublished DESC";

// Execute query
$results = $conn->query($sql);

// Get the band


// Close the connection
$conn->close();
?>

<body></body>

<h2>Home</h2>
<?php while($post = $results->fetch_assoc()):?>
<h3><?php echo $post['post_title']?></h3>
<h5><?php echo $post['post_datepublished']?></h5>
<p><?php echo $post['post_text']?></p>
<?php endwhile ?>