<!--	Names: 	 Brian Hafey, Jacob Kalat, Maria Leyva
      	Date: 	 4/15/2021
      	Purpose: To recieve search term and query database for all rows including that term. Print results in table format-->
<?php
//Set search term from POST
$search = $_POST["search"];

//Print search term to be sure it was passed correctly
echo "Search Term = '$search'";

//Link to mysql database. May have to change port and database. Then checks if connect failed. If so exit.
$link = new mysqli("localhost:8889","root","root","hello");
if(mysqli_connect_error())
{
		die("connection failed: ".mysqli_connect_error());
}

//Queries all rows from personnelInfo table in hello database. Stores result and number of rows
$query = "SELECT * from personnelInfo";
$result = mysqli_query($link,$query);
$numOfRows = mysqli_num_rows($result);
// Declares style for table
echo "<style> table, th, tr, td{ background-color:#DDEEFF; border:1px solid black; padding: 3px;}</style>";

//Print the header for the table
echo "<table><tr><th>Full Name</th><th>Photos</th><th>Date Joined</th><th>Department</th><th>Project Involved</th><th>Annual Salary</th></tr>";

//Creates a list values from array for each column
while($data=mysqli_fetch_assoc($result)){
  echo "<tr>";
  foreach($data as $key => $value)
  {
    if($key == 'Full Name')
    {
      $fullname = $value;
      echo "<td>$fullname</td>";
    }
    if($key == 'Photos')
    {
      $photo = $value;
      echo "<td>$photo</td>";
    }
    if($key == 'Date Joined')
    {
      $startingDate = $value;
      echo "<td>$startingDate</td>";
    }
    if($key == 'Department')
    {
        $dept = $value;
        echo "<td>$dept</td>";
    }
    if($key == 'Project Invloved')
    {
        $proj = $value;
        echo "<td>$proj</td>";
    }
    if($key == 'Annual Salary')
    {
        $salary = number_format($value, 2, '.', ',', ',');
        echo "<td>$$salary</td>";
    }
  }
    echo "</tr>";
}

echo "</table>"
?>
