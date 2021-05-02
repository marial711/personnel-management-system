<!--	Team Name: Halava
		Names: 	 Brian Hafey, Jacob Kalat, Maria Leyva
      	Date: 	 4/15/2021
      	Purpose: To add a new employee to the database-->

<!-- Declares style for table -->
<style>
    table{
        background-color:#DDEEFF;
        border:1px solid black;
        padding: 3px;
    }
	th{
		background-color:#DDEEFF;
        border:1px solid black;
        padding: 3px;
	}
	tr{
		background-color:#DDEEFF;
        border:1px solid black;
        padding: 3px;
	}
	td{
		background-color:#DDEEFF;
        border:1px solid black;
        padding: 3px;
	}
</style>


<?php
    //Receive variables from post
    $fullName = $_POST["fullName"];
    $photo = $_POST["image"];
    $date = $_POST["dateJoined"];
    $department = $_POST["department"];
    $project = $_POST["projectInvolved"];
    $salary = $_POST["salary"];

    //Link to mysql database. May have to change port and database. Then checks if connect failed. If so exit.
    $link = new mysqli("localhost:3306","root","root","project");
    if(mysqli_connect_error())
    {
            die("connection failed: ".mysqli_connect_error());
    }

    $query = "SELECT * from personnelInfo";
    $result = mysqli_query($link,$query);
    $numOfRows = mysqli_num_rows($result);


    // Selected and uploaded a file
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) 
    {
        // Temporary file name stored on the server
        $tmpName = $_FILES['image']['tmp_name'];
        // Read the file
        $fp = fopen($tmpName, 'r');
        $data = fread($fp, filesize($tmpName));
        $data = addslashes($data);
        fclose($fp);

        $query = "INSERT INTO personnelInfo VALUES (NULL,'$fullName','$data','$date','$department','$project','$salary')";
        $result = mysqli_query($link, $query) or die("Query failed" .mysqli_connect_error());
        }
    else 
    {
        echo "No image selected/uploaded";
    }



// Close our MySQL Link
mysqli_close($link);
header('location: index.html');
?>