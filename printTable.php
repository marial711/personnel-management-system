<!--	Team Name: Halava
		Names: 	 Brian Hafey, Jacob Kalat, Maria Leyva
      	Date: 	 5/2/2021
      	Purpose: To print the contents of the table-->

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
    echo "<title>(Halava Personnel Table)</title>";
    echo "<a href='index.html'><h3>Click to return home</h3></a>";
    $link = new mysqli("localhost:3306","root","root","project");
    if(mysqli_connect_error())
    {
        die("connection failed: ".mysqli_connect_error());
    }

    //Query all rows from the table
    $query = "SELECT * from personnelInfo";
    $sth = mysqli_query($link, $query) or die("Query failed" .mysqli_connect_error());
    $numOfRows = mysqli_num_rows($sth);
    //Print the current state of the table
    echo "<table><tr><th>Full Name</th><th>Photos</th><th>Date Joined</th><th>Department</th><th>Project Involved</th><th>Annual Salary</th></tr>";
    if(numOfRows >= 0)
    {
        while($info = mysqli_fetch_assoc($sth))
        {
            echo "<tr>";
            foreach($info as $key=>$value)
            {
                //Display image using img tag
                if($key == 'image')
                {
                    echo "<td>";
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($value).'" height="200" width="200"/>';
                    echo "</td>";
                }
                elseif($key != 'No')
                {
                    echo "<td>$value</td>";
                }
            }
            echo "</tr>";
        }
    }
echo "</table>";

// Close our MySQL Link
mysqli_close($link);
?>