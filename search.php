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
    //Set search term from POST
    $search = $_POST["search"];
    //Print search term to be sure it was passed correctly
    echo "Search Term = '$search'";
    
?>