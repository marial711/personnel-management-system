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
$query = "drop table personnelInfo;";
$result = mysqli_query($link,$query);
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


// $query = 'SELECT * from personnelInfo';
// $sth = mysqli_query($link, $query) or die('Query failed' .mysqli_connect_error());
// $numOfRows = mysqli_num_rows($sth);
// echo '<table><tr><th>Full Name</th><th>Photos</th><th>Date Joined</th><th>Department</th><th>Project Involved</th><th>Annual Salary</th></tr>';
// if(numOfRows >= 0)
// {
//     while($info = mysqli_fetch_assoc($sth))
//     {
//         echo '<tr>';
//         foreach($info as $key=>$value)
//         {
//             if($key == 'image')
//             {
//                 echo '<td>';
//                 echo '<img src="data:image/jpeg;base64,'.base64_encode($value).'" height="200" width="200"/>';
//                 echo '</td>';
//             }
//             elseif($key != 'No')
//             {
//                 echo '<td>$value</td>';
//             }
//         }
//     echo '</tr>';
//     }
// }
// echo '</table>';
mysqli_close($link);
header('location: index.html');

?>