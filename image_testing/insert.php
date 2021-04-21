
<?php
	$link = mysqli_connect("localhost:3306", "root", "root", "hello") or die("Unable to connect mysql" .mysqli_connect_error());

	echo "File: $_FILES['image']['name']";
	echo "<br />";

	$fileCount = count($_FILES['image']['name']);
	echo "$fileCount file selected.";
	echo "<br />";
	
	echo "File size: $_FILES['image']['size']";
	echo "<br />";
	
	echo "Path to temp file on server: $_FILES['image']['tmp_name']";
	echo "<br />";
	
	// selected and uploaded a file
	if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) 
	{
		//Filename
		$filename = $_FILES['image']['name'];
		// Temporary file name stored on the server
		$tmpName = $_FILES['image']['tmp_name'];
		// $folder = "image/".$filename;

		// Read the file
		$fp = fopen($tmpName, 'r');
		$data = fread($fp, filesize($tmpName));
		$data = addslashes($data);
		fclose($fp);

		$query = "INSERT INTO tbl_images (image) VALUES ('$data')";

		$result = mysqli_query($link, $query) or die("Query failed" .mysqli_connect_error());

		if(move_uploaded_file($tmpName, $folder))
		{
			$msg = "Image uploaded successfully";
		}
		else
		{
			$msg = "Failed to upload image";
		}

		


		}

	else 
	{

		echo "No image selected/uploaded";

	}


// Close our MySQL Link

mysqli_close($link);


?>