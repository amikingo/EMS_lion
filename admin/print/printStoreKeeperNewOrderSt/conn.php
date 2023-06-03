<?php
	$conn = new mysqli('localhost', 'root', '', 'lion');
	
	if(!$conn){
		die("Error: Can't connect to database");
	}
?>