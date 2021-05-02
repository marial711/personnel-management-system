<!--	Team Name: Halava
		Names: 	 Brian Hafey, Jacob Kalat, Maria Leyva
      	Date: 	 4/28/2021
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
    echo "<title>(Halava Search Page)</title>";
    echo "<a href='index.html'><h3>Return to home</h3></a>";
	
    //Set search term from POST
    $search = $_POST["search"];
    //Print search term to be sure it was passed correctly
    echo "Search Term = '$search'</br></br>";
	
	//Connects to DB
    $link = new mysqli("localhost:3306","root","root","project");
    if(mysqli_connect_error())
    {
        die("connection failed: ".mysqli_connect_error());
    }

    //Query all rows from the table
    $query = "SELECT * from personnelInfo";
    $sth = mysqli_query($link, $query) or die("Query failed" .mysqli_connect_error());
    $numOfRows = mysqli_num_rows($sth);

    //If there is no search phrase return to home page
    if($search == ""){
        mysqli_close($link);
        header('location: index.html');
    }else
    {
        //Print the current state of the table only including the search results
        
        //Set the regular expression
        $pattern = "/.*".$search.".*/";
        //Creates table of search results
        echo "<table><tr><th>Full Name</th><th>Photos</th><th>Date Joined</th><th>Department</th><th>Project Involved</th><th>Annual Salary</th><th>Delete Row</th></tr>";
        
        //Allows user to select the radio buttons and delete a row of data
        echo "<form action='deleteUser2.php' method='post'>";
        if(numOfRows >= 0)
        {
            while($info = mysqli_fetch_assoc($sth))
            {
                foreach($info as $key=>$value)
                {
                    //If we have a match and the key currently is not image
                    if(preg_match($pattern, $value) && $key != 'image')
                    {
                        $name = $info["FullName"];
                        $photo = $info["image"];
                        $date = $info["DateJoined"];
                        $department = $info["Department"];
                        $project = $info["ProjectInvolved"];
                        $salary = $info["annualSalary"];
                        $choice = $info["No"];
                        echo "<tr><td>$name</td>";

                        echo "<td>";
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($photo).'" height="200" width="200"/>';
                        echo "</td>";
                                
                        echo "<td>$date</td>
                                <td>$department</td>
                                <td>$project</td>
                                <td>$salary</td>";
                        echo "<td><input type='radio' name='selection' value='$choice'></input></td>";
                        echo "</tr>";
                        break;
                    }
                }
            }
            echo "</table>";
        }

        //Prompts user to delete the selected row if desired
        echo "Click Delete Sections after pressing the corresponding radio button to delete that row.</br>";
        echo "</br><input type='submit' name='submit' value='Delete Selections'>";
        echo "</form>";
    }
    mysqli_close($link);
    

?>