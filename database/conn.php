<?php
	$conn = new mysqli('localhost', 'root', '', 'aircast');
 
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>