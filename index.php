<!--	Names: 	 Brian Hafey, Jacob Kalat, Maria Leyva
      	Date: 	 4/15/2021
      	Purpose: To recieve search term and query database for all rows including that term. Print results in table format-->

<!-- Declares style for table -->
<style>
    table, th, tr, td{
        background-color:#DDEEFF;
        border:1px solid black;
        padding: 3px;
    }
</style>

<?php  
//Set search term from POST
$search = $_POST["search"];

//Print search term to be sure it was passed correctly
echo "Search Term = '$search'";

//Link to mysql database. May have to change port and database. Then checks if connect failed. If so exit.
$link = new mysqli("localhost:3306","root","root","hello");
if(mysqli_connect_error())
{
		die("connection failed: ".mysqli_connect_error());
}

//Queries all rows from personnelInfo table in hello database. Stores result and number of rows
$query = "SELECT * from personnelInfo";
$result = mysqli_query($link,$query);
$numOfRows = mysqli_num_rows($result);

//Print the header for the table 
echo "<table><tr><th>Full Name</th><th>Photos</th><th>Date Joined</th><th>Department</th><th>Project Involved</th><th>Annual Salary</th></tr>";

echo "</table>"
?>