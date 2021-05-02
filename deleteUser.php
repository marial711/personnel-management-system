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
	//Link to mysql database. May have to change port and database. Then checks if connect failed. If so exit.
	$link = new mysqli("localhost:3306","root","root","project");
	if(mysqli_connect_error())
	{
			die("connection failed: ".mysqli_connect_error());
	}
	
	//Deletes data from the table according to both the radio button selected and the text typed in the field
	$choice = $_POST["selection"];
	$deletion = $_POST["deletion"];
	$deleteQuery = "DELETE FROM personnelInfo WHERE $choice='$deletion'";
	$result = mysqli_query($link,$deleteQuery);

	//Tells you if the deletion was successful or not
	if ($link->query($deleteQuery) === TRUE)
	{
		echo " record deleted! ";
	}
	else
	{
		echo " Error! Abort! " . $link->error;
	}
	
	//Close the mysql link and go back to home
	mysqli_close($link);
	header('location: index.html');

	
?>