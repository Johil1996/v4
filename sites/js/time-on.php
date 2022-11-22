<?php
	require_once 'database/conn.php';
 
	if($_POST['blog_id'] == ""){
		$title = $_POST['title'];
		$time_on = $_POST['time_on'];

		$time_status = time();
    	
		$conn->query("INSERT INTO site_on_off VALUE('', '$title', '$time_on', '', '$time_status', '')");
		echo $conn->insert_id;

	} 
?>