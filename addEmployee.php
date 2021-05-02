<!--	Names: 	 Brian Hafey, Jacob Kalat, Maria Leyva
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
    //Recieve variables from post
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


    // selected and uploaded a file
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

//     $query = "SELECT * from personnelInfo";

//     $sth = mysqli_query($link, $query) or die("Query failed" .mysqli_connect_error());

//     //Print the current state of the table
//     echo "<table><tr><th>Full Name</th><th>Photos</th><th>Date Joined</th><th>Department</th><th>Project Involved</th><th>Annual Salary</th></tr>";
//     if(numOfRows >= 0)
//     {
//         while($info = mysqli_fetch_assoc($sth))
//         {
//             echo "<tr>";
//             foreach($info as $key=>$value)
//             {
//                 if($key == 'image')
//                 {
//                     echo "<td>";
//                     echo '<img src="data:image/jpeg;base64,'.base64_encode($value).'" height="200" width="200"/>';
//                     echo "</td>";
//                 }
//                 elseif($key != 'No')
//                 {
//                     echo "<td>$value</td>";
//                 }
//             }
//             echo "</tr>";
//         }
//     }
// echo "</table>";

// Close our MySQL Link
mysqli_close($link);
header('location: index.html');
?>