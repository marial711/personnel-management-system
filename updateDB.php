<?php

//Set up arrays we will use to recieve post variables
$id = array();
$name = array();
$date = array();
$department = array();
$project = array();
$salary = array();

//Receive post variables and store them in their respective arrays
foreach($_POST as $key => $value)
{
	if(preg_match('/.*No.*/', $key))
	{
		$id[] = $value;
	}

	if(preg_match('/.*FullName.*/', $key))
	{
		$name[] = $value;
	}

	if(preg_match('/.*DateJoined.*/', $key))
	{
		$date[] = $value;
	}

	if(preg_match('/.*Department.*/', $key))
	{
		$department[] = $value;
	}

    if(preg_match('/.*ProjectInvolved.*/', $key))
	{
		$project[] = $value;
	}

    if(preg_match('/.*annualSalary.*/', $key))
	{
		$salary[] = $value;
	}
}
reset($_POST);

//Connect to the database
$link = new mysqli("localhost:3306","root","root","project");
if(mysqli_connect_error())
{
    die("connection failed: ".mysqli_connect_error());
}

//Get number of rows from ID array
//Update all rows changed
$count = count($id);
for($i = 0; $i < $count; $i++)
{
	$query = "UPDATE personnelInfo SET FullName='$name[$i]', DateJoined='$date[$i]', Department='$department[$i]',
				 ProjectInvolved='$project[$i]', annualSalary='$salary[$i]' WHERE No='$id[$i]';";
	$result = mysqli_query($link, $query) or die("Query failed" .mysqli_connect_error());
 }

//Close mysql link and redirect back to modifyData.php
mysqli_close($link);
header("Location: ./modifyData.php");

?>