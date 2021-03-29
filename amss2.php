<?php
$conn = new mysqli("localhost", "root", "", "wx");
if ($conn->connect_errno) {
    echo "Database connection failed. ".$conn->connect_error;
}
else
{

$vdate = '2020-07-23';
$vdate = date("Y-m-d");

$vdate	= $conn->real_escape_string($vdate);
echo $vdate;

$rec="INSERT INTO metar149 (dte) values ('$vdate')";

	if ($conn->query($rec) === TRUE) 
	{
		echo "SUBMITTED SUCCESSFULLY";
	}
	else
	{
		echo "Failed .. .. .. .. .. !!!! ";
	}
}	
?>
