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
mysql_connect("localhost","root","");
mysql_select_db("tsra");
if ($_POST['txtindex'] == "--Select--")
{
echo "<table width='100%'><tr><td><img src='wr.png' height='50'></td><td style='color:#720204;'>STATION NOT SELECTED ...? </td><tr>";
echo "<tr><td align='center' colspan='2'><a href='entertsra.php'>BACK</a></td></tr></table>";
}
else
{
	$txtdate=$_POST['txtddate'];
	$txtindex=$_POST['txtindex'];
	$txtts=$_POST['txtts'];
	$txtdate=mysql_real_escape_string($txtdate);
	$txtindex=mysql_real_escape_string($txtindex);
	$txtts=mysql_real_escape_string($txtts);
	$rec="INSERT INTO tsra(ddate,indexno,tsdetails) values ('$txtdate', '$txtindex','$txtts')";
	if(mysql_query($rec))
	{
	echo "<table width='100%'><tr><td width='16%'><img src='right.png' height='50'></td><td style='color:#064303;'>THUNDRSTORM DETAILS ADDED SUCCESSFULLY</td><tr>";
	echo "<tr><td align='center' colspan='2'><a href='entertsra.php'>BACK</a></td></tr></table>";
	}
	else
	{
	echo "<table width='100%'><tr><td><img src='ex.png' height='70'></td><td style='color:#081a60;'>THUNDERSTORM DETAILS ALAREADY ADDED</td><tr>";
	echo "<tr><td align='center' colspan='2'><a href='entertsra.php'>BACK</a></td></tr></table>";
	}
}
?>
</div>
</center>
</body>
</html>