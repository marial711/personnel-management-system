<!--	Names: 	 Brian Hafey, Jacob Kalat, Maria Leyva
      	Date: 	 5/2/2021
      	Purpose: To delete data from the search results with the checkboxes-->

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
	//Connects to DB
	$link = new mysqli("localhost:3306","root","root","project");
	if(mysqli_connect_error())
	{
			die("connection failed: ".mysqli_connect_error());
	}
	
	//Creates variables for deletion from POST
	$deletion = $_POST["selection"];
	
	//Deletes data from the user's selected radio button from the search page
	echo "Deleting data: '$deletion'";
	$deleteQuery = "DELETE FROM personnelInfo WHERE No='$deletion'";
	$action = mysqli_query($link,$query);
	
	//Tells you if the deletion was successful or not
	if ($link->query($deleteQuery) === TRUE)
	{
		echo " record deleted! ";
	}
	else
	{
		echo " Error! Abort! " . $link->error;
	}
	
	//Close sql link
	mysqli_close($link);
	header('location: search.php');
?>