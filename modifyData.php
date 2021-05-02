<!--	Team Name: Halava
		Names: 	 Brian Hafey, Jacob Kalat, Maria Leyva
      	Date: 	 5/2/2021
      	Purpose: To modify individual elements from rows in the table-->
		
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
echo "<title>(Halava Modify Page)</title>";
//Provide a way to navigate back to the home page
echo "<a href='index.html'><h3>Click to return home</h3></a>";

//Connect to the database
$link = new mysqli("localhost:3306","root","root","project");
if(mysqli_connect_error())
{
    die("connection failed: ".mysqli_connect_error());
}

//Query all rows from the table
$query = "SELECT * from personnelInfo";
$sth = mysqli_query($link, $query) or die("Query failed" .mysqli_connect_error());
$numOfRows = mysqli_num_rows($sth);

//Print the table but as input fields... doesn't allow to change picture :(
echo "<form enctype=multipart/form-data action=./updateDB.php method=post>";
echo "<table><tr><th>No</th><th>Full Name</th><th>Photos</th><th>Date Joined</th><th>Department</th><th>Project Involved</th><th>Annual Salary</th></tr>";
$count = 0;
if(numOfRows >= 0)
{
    while($info = mysqli_fetch_assoc($sth))
    {   
        echo "<tr>";
        foreach($info as $key=>$value)
        {
                //If current column is 'No' display No
                if($key == 'No')
                {
                    echo "<td> <input type=hidden name=No$count value='$info[No]'/>$info[No]</td>";
                }
                //If current column is 'DateJoined' show current date in date input field
                else if($key == "DateJoined")
                {
                    echo "<td> <input type=date name=DateJoined$count value='$info[DateJoined]'/></td>";
                }
                //If current column is 'image', display image
                else if($key == "image")
                {
                    echo "<td>";
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($value).'" height="200" width="200"/>';
                    echo "</td>";
                }
                //If any other column, display as text in text input field
                else{
                    echo "<td> <input type=text name='$key.$count' value='$info[$key]'/></td>";
                }
        }
        echo "</tr>";
        $count++;
    }
}
//Submit changes to updateDB.php
echo "</table>";
echo "<input type=submit name=submit value=Submit>";
echo "<input type=reset name=reset value=Reset>";
echo "</form>";

?>