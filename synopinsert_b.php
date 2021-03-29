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
mysql_connect("localhost","root","");
mysql_select_db("synops");

	$txtddate=$_SESSION['txtddate'];
	$txtsynoptime=$_SESSION['txtsynoptime'];
	$txtindex=$_SESSION['txtindex'];
	$txtsynop=$_SESSION['txtsynop'];
	$txthm=$_SESSION['txthm'];
	$txtlm=$_SESSION['txtlm'];

	$txtddate=mysql_real_escape_string($txtddate);
	$txtsynoptime=mysql_real_escape_string($txtsynoptime);
	$txtindex=mysql_real_escape_string($txtindex);
	$txtsynop=mysql_real_escape_string($txtsynop);
	$txthm=mysql_real_escape_string($txthm);
	$txtlm=mysql_real_escape_string($txtlm);

	$txtsynop=trim(preg_replace('/(\s\s+|\t|\n)/', ' ', $txtsynop));
	if (strpos($txtsynop,"=")>0){$txtsynop = substr($txtsynop,0,strpos($txtsynop,"=")+1);}
	else
	{ $txtsynop = $txtsynop."=";}		
	$txtsynop = strstr($txtsynop,strval($txtindex)); 
	
	if  ($txthm == "") {$txthm = -99;} 
	if  ($txtlm == "") {$txtlm = -99;}
	
	$sql=mysql_query("Select * from synops where ddate = '$txtddate' and indexno = '$txtindex' and synoptime = '$txtsynoptime'");
	if (mysql_num_rows($sql) > 0) 
	{
		$rec="update synops set ddate = '$txtddate', indexno = '$txtindex', synoptime='$txtsynoptime',synop='$txtsynop',hmax='$txthm',lmin='$txtlm' where ddate = '$txtddate' and indexno = '$txtindex' and synoptime = '$txtsynoptime'";
	}
	else
	{
		$rec="INSERT INTO synops(ddate,indexno,synoptime,synop,hmax,lmin) values ('$txtddate', '$txtindex','$txtsynoptime','$txtsynop','$txthm','$txtlm')";
	}
	if(mysql_query($rec))
		{
		echo "<table width='100%'><tr><td width='16%'><img src='right.png' height='50'></td><td style='color:#064303;'>SYNOP SUBMITTED SUCCESSFULLY</td><tr>";
		echo "<tr><td align='center' colspan='2'><a href='synopsentry.php'>BACK</a></td></tr></table>";
		}
		else
		{
		echo "<table width='100%'><tr><td><img src='ex.png' height='70'></td><td style='color:#081a60;'>SYNOP ALAREADY SUBMITTED</td><tr>";
		echo "<tr><td align='center' colspan='2'><a href='synopsentry.php'>BACK</a></td></tr></table>";
		}
		
?>
</div>
</center>
</body>
</html>