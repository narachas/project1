<?php session_start(); ?>
<html>
<head>
<style>
body{background:#224685;}
#bx{
background:#ccefef;
min-height:80px;
top:100px;
width:480px;
font:18px arial;
position:relative;
margin:auto;
padding:40px 20px 40px 20px;
border-radius: 6px;
box-shadow: 1px 4px 7px rgba(27, 35, 38, 0.6);
}
</style>
</head>
<body>
<center>
<div id="bx">
<?php

$conn = new mysqli("localhost", "root", "", "wx");
if ($conn->connect_errno) {
    echo "Database connection failed. ".$conn->connect_error;
}
else
{
	
	$txtddate	= $conn->real_escape_string($_SESSION['txtddate']);
	$txtutc 	= $conn->real_escape_string($_SESSION['txtutc']);
	$txtvis 	= $conn->real_escape_string($_SESSION['txtvis']);
	$txtddd 	= $conn->real_escape_string($_SESSION['txtddd']);
	$txtff 		= $conn->real_escape_string($_SESSION['txtff']);
	$txtwx 		= $conn->real_escape_string($_SESSION['txtwx']);
	$txtcld1 	= $conn->real_escape_string($_SESSION['txtcld1']);
	$txtcld2 	= $conn->real_escape_string($_SESSION['txtcld2']);
	$txtcld3 	= $conn->real_escape_string($_SESSION['txtcld3']);
	$txtcld4 	= $conn->real_escape_string($_SESSION['txtcld4']);
	$txtn1 		= $conn->real_escape_string($_SESSION['txtn1']);
	$txtn2		= $conn->real_escape_string($_SESSION['txtn2']);
	$txtn3		= $conn->real_escape_string($_SESSION['txtn3']);
	$txtn4		= $conn->real_escape_string($_SESSION['txtn4']);
	$txtnn		= $conn->real_escape_string($_SESSION['txtnn']);
	$txtclht1 	= $conn->real_escape_string($_SESSION['txtclht1']);
	$txtclht2 	= $conn->real_escape_string($_SESSION['txtclht2']);
	$txtclht3 	= $conn->real_escape_string($_SESSION['txtclht3']);
	$txtclht4 	= $conn->real_escape_string($_SESSION['txtclht4']);
	$txtttt		= $conn->real_escape_string($_SESSION['txtttt']);
	$txttdd		= $conn->real_escape_string($_SESSION['txttdd']);
	$txtqnh		= $conn->real_escape_string($_SESSION['txtqnh']);
		
	//$sql=mysqli_query("Select * from metar where dte = '$txtddate' and  utc = '$txtutc'");
	
	$sql = "Select * from metar where dte = '$txtddate' and utc = '$txtutc'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{
		If ($_SESSION['txtstn']=="Waltair")
		{
		$rec="update metar set 
						dte = '$txtddate', 
						utc  = '$txtutc',
						vis  = '$txtvis',
						ddd  = '$txtddd',
						ff   = '$txtff',
						wx   = '$txtwx',
						cld1 = '$txtcld1',
						cld2 = '$txtcld2',
						cld3 = '$txtcld3',
						cld4 = '$txtcld4',
						n1   = '$txtn1',
						n2   = '$txtn2',
						n3   = '$txtn3',
						n4   = '$txtn4',
						nn   = '$txtnn',
						clht1 = '$txtclht1',
						clht2 = '$txtclht2',
						clht3 = '$txtclht3',
						clht4 = '$txtclht4',
						ttt  = '$txtttt',
						tdd  = '$txttdd',
						qnh  = '$txtqnh'
						
				where dte = '$txtddate' and  utc = '$txtutc'";
		}
		else
		{
		$rec="update metar set 
						dte = '$txtddate', 
						utc  = '$txtutc',
						visx  = '$txtvis',
						dddx  = '$txtddd',
						ffx   = '$txtff',
						wxx   = '$txtwx',
						cldx1 = '$txtcld1',
						cldx2 = '$txtcld2',
						cldx3 = '$txtcld3',
						cldx4 = '$txtcld4',
						nx1   = '$txtn1',
						nx2   = '$txtn2',
						nx3   = '$txtn3',
						nx4   = '$txtn4',
						nnx   = '$txtnn',
						clhtx1 = '$txtclht1',
						clhtx2 = '$txtclht2',
						clhtx3 = '$txtclht3',
						clhtx4 = '$txtclht4',
						tttx  = '$txtttt',
						tddx  = '$txttdd',
						qnhx  = '$txtqnh'
						
				where dte = '$txtddate' and  utc = '$txtutc'";
		}
	}
	else
	{
		If ($_SESSION['txtstn']=="Waltair")
		{
		$rec="INSERT INTO metar
		(dte, utc, vis, ddd, ff, wx, nn, cld1, cld2, cld3, cld4, n1, n2, n3, n4, clht1, clht2, clht3, clht4, ttt, tdd, qnh) 
		values 
		('$txtddate','$txtutc','$txtvis','$txtddd','$txtff','$txtwx','$txtnn','$txtcld1','$txtcld2','$txtcld3','$txtcld4','$txtn1','$txtn2','$txtn3','$txtn4','$txtclht1','$txtclht2','$txtclht3','$txtclht4','$txtttt','$txttdd','$txtqnh')";
		}
		else
		{
		$rec="INSERT INTO metar
		(dte, utc, visx, dddx, ffx, wxx, nnx, cldx1, cldx2, cldx3, cldx4, nx1, nx2, nx3, nx4, clhtx1, clhtx2, clhtx3, clhtx4, tttx, tddx, qnhx) 
		values 
		('$txtddate','$txtutc','$txtvis','$txtddd','$txtff','$txtwx','$txtnn','$txtcld1','$txtcld2','$txtcld3','$txtcld4','$txtn1','$txtn2','$txtn3','$txtn4','$txtclht1','$txtclht2','$txtclht3','$txtclht4','$txtttt','$txttdd','$txtqnh')";
		}
	}

	if ($conn->query($rec) === TRUE) 
	{
		echo "<table width='100%'><tr><td width='16%'><img src='right.png' height='50'></td><td style='color:#064303;'>SYNOP SUBMITTED SUCCESSFULLY</td><tr>";
		echo "<tr><td align='center' colspan='2'><a href='synopsentry.php'>BACK</a></td></tr></table>";
	}
	else
	{
		echo "<table width='100%'><tr><td><img src='ex.png' height='70'></td><td style='color:#081a60;'>SYNOP ALREADY SUBMITTED</td><tr>";
		echo "<tr><td align='center' colspan='2'><a href='synopsentry.php'>BACK</a></td></tr></table>";
	}
}	
?>
</div>
</center>
</body>
</html>