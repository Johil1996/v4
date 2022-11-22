<?php
	require_once 'database/conn.php';
 
	if($_POST['blog_id'] == ""){
		$title = $_POST['title'];
 
		$conn->query("INSERT INTO site_on_off VALUE('', '$title', '')");
		echo $conn->insert_id;

	} else {
		
        date_default_timezone_set('Asia/Manila');
    	$time = date('y-m-d-h:i:s');

    	$time_status_end = time();

		$title = $_POST['title'];
		$blog_id = $_POST['blog_id'];
		$conn->query("UPDATE site_on_off SET `site_name` = '$title', `time_off` = '$time', 
			                                 `time_status_end` = '$time_status_end' WHERE `id` = '$blog_id'");
	}
?>