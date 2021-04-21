<?php
	$link = mysqli_connect("localhost:3306", "root", "root", "hello") or die("Unable to connect mysql" .mysqli_connect_error());

	$query = "SELECT * from tbl_images where id = 1";

	$sth = mysqli_query($link, $query) or die("Query failed" .mysqli_connect_error());
	
	$result = mysqli_fetch_array($sth);
	//set the header for the image
	// header("Content-type: image/jpeg");
	echo 'HELLO</br>';
	echo '<img src="data:image/jpeg;base64,'.base64_encode($result['image']).'" height="200" width="200"/>';
	mysqli_close($link);
	
?>