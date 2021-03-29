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

//$firstname =  $mysqli -> real_escape_string($_POST['firstname']);


	$txtddate	= mysqli_real_escape_string($_SESSION['txtddate']);
	$txtutc 	= mysqli_real_escape_string($_SESSION['txtutc']);
	$txtvis 	= mysqli_real_escape_string($_SESSION['txtvis']);
	$txtddd 	= mysqli_real_escape_string($_SESSION['txtddd']);
	$txtff 		= mysqli_real_escape_string($_SESSION['txtff']);
	$txtwx 		= mysqli_real_escape_string($_SESSION['txtwx']);
	$txtcld1 	= mysqli_real_escape_string($_SESSION['txtcld1']);
	$txtcld2 	= mysqli_real_escape_string($_SESSION['txtcld2']);
	$txtcld3 	= mysqli_real_escape_string($_SESSION['txtcld3']);
	$txtcld4 	= mysqli_real_escape_string($_SESSION['txtcld4']);
	$txtn1 		= mysqli_real_escape_string($_SESSION['txtn1']);
	$txtn2		= mysqli_real_escape_string($_SESSION['txtn2']);
	$txtn3		= mysqli_real_escape_string($_SESSION['txtn3']);
	$txtn4		= mysqli_real_escape_string($_SESSION['txtn4']);
	$txtnn		= mysqli_real_escape_string($_SESSION['txtnn']);
	$txtclht1 	= mysqli_real_escape_string($_SESSION['txtclht1']);
	$txtclht2 	= mysqli_real_escape_string($_SESSION['txtclht2']);
	$txtclht3 	= mysqli_real_escape_string($_SESSION['txtclht3']);
	$txtclht4 	= mysqli_real_escape_string($_SESSION['txtclht4']);
	$txtttt		= mysqli_real_escape_string($_SESSION['txtttt']);
	$txttdd		= mysqli_real_escape_string($_SESSION['txttdd']);
	$txtqnh		= mysqli_real_escape_string($_SESSION['txtqnh']);
		
	//$sql=mysqli_query("Select * from metar where dte = '$txtddate' and  utc = '$txtutc'");
	
	$sql = "Select * from metar where dte = '$txtddate' and utc = '$txtutc'";
	if ($result = $mysqli->query($sql)) 
//	if (mysql_num_rows($sql) > 0) 
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
		$rec="INSERT INTO metar
		(dte, utc, vis, ddd, ff, wx, nn, cld1, cld2, cld3, cld4, n1, n2, n3, n4, clht1, clht2, clht3, clht4, ttt, tdd, qnh) 
		values 
		('$txtddate','$txtutc','$txtvis','$txtddd','$txtff','$txtwx','$txtnn','$txtcld1','$txtcld2','$txtcld3','$txtcld4','$txtn1','$txtn2','$txtn3','$txtn4','$txtclht1','$txtclht2','$txtclht3','$txtclht4','$txtttt','$txttdd','$txtqnh')";
	}

/* Prepare statement */
$stmt     = $conn->prepare($rec);
if(!$stmt) {
   echo 'Error: '.$conn->error;
}
 
/* Bind parameters */
$stmt->bind_param('sss',$product,$price, $category);
 
/* Execute statement */
$stmt->execute();
 
echo $stmt->insert_id;
$stmt->close();





	if(mysqli_query($rec))
		{
		echo "<table width='100%'><tr><td width='16%'><img src='right.png' height='50'></td><td style='color:#064303;'>SYNOP SUBMITTED SUCCESSFULLY</td><tr>";
		echo "<tr><td align='center' colspan='2'><a href='synopsentry.php'>BACK</a></td></tr></table>";
		}
		else
		{
		echo "<table width='100%'><tr><td><img src='ex.png' height='70'></td><td style='color:#081a60;'>SYNOP ALAREADY SUBMITTED</td><tr>";
		echo "<tr><td align='center' colspan='2'><a href='synopsentry.php'>BACK</a></td></tr></table>";
		}
}	
?>
</div>
</center>
</body>
</html>