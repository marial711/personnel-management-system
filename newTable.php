<!--	Team Name: Halava
		Names: 	 Brian Hafey, Jacob Kalat, Maria Leyva
      	Date: 	 5/2/2021
      	Purpose: To delete data from the table-->
		
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

$link = new mysqli("localhost:3306","root","root","project");
if(mysqli_connect_error())
{
        die("connection failed: ".mysqli_connect_error());
}
//Drop current table
$query = "drop table personnelInfo;";
$result = mysqli_query($link,$query);
//Create new table with the same blueprint
$query = "create table personnelInfo
    (No int(5) NOT NULL auto_increment,
    FullName char(50),
    image blob NOT NULL,
    DateJoined varchar(15),
    Department char(50),
    ProjectInvolved char(50),
    annualSalary int(5),
    PRIMARY KEY(No));";
$result = mysqli_query($link,$query);

mysqli_close($link);
header('location: index.html');

?>