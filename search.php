<!--	Names: 	 Brian Hafey, Jacob Kalat, Maria Leyva
      	Date: 	 4/15/2021
      	Purpose: To search the database for a given search term-->

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
    echo "<a href='index.html'><h3>Return to home</h3></a>";
    
    //Set search term from POST
    $search = $_POST["search"];
    //Print search term to be sure it was passed correctly
    echo "Search Term = '$search'";

    $link = new mysqli("localhost:3306","root","root","project");
    if(mysqli_connect_error())
    {
        die("connection failed: ".mysqli_connect_error());
    }

    $query = "SELECT * from personnelInfo";
    $sth = mysqli_query($link, $query) or die("Query failed" .mysqli_connect_error());
    $numOfRows = mysqli_num_rows($sth);
    //Print the current state of the table
    $pattern = "/.*".$search.".*/";
    echo "<table><tr><th>Full Name</th><th>Photos</th><th>Date Joined</th><th>Department</th><th>Project Involved</th><th>Annual Salary</th></tr>";
    if(numOfRows >= 0)
    {
        $rowCount = 0;
        while($info = mysqli_fetch_assoc($sth))
        {
            foreach($info as $key=>$value)
            {
                if(preg_match($pattern, $value) && $key != 'image')
				{
                    $name = $info["FullName"];
                    $photo = $info["image"];
                    $date = $info["DateJoined"];
                    $department = $info["Department"];
                    $project = $info["ProjectInvolved"];
                    $salary = $info["annualSalary"];
					echo "<tr><td>$name</td>";

                    echo "<td>";
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($photo).'" height="200" width="200"/>';
                    echo "</td>";
                            
                    echo "<td>$date</td>
                            <td>$department</td>
                            <td>$project</td>
                            <td>$salary</td>";
                    echo "</tr>";
				}
            }
        }
        echo "</table>";
    }

?>