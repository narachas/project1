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
mysql_select_db("dak");

		$sdte=$_SESSION['sdte'];
		$fcat=$_SESSION['fcat'];
		$dnum=$_SESSION['dnum'];
		$sto=$_SESSION['sto'];
		$scc=$_SESSION['scc'];
		$desc=$_SESSION['desc'];
		$refnum=$_SESSION['refnum'];
		$tag=$_SESSION['tag'];

		$sdte=mysql_real_escape_string($sdte);
		$fcat=mysql_real_escape_string($fcat);
		$dnum=mysql_real_escape_string($dnum);
		$sto=mysql_real_escape_string($sto);
		$scc=mysql_real_escape_string($scc);
		$desc=mysql_real_escape_string($desc);
		$refnum=mysql_real_escape_string($refnum);
		$tag=mysql_real_escape_string($tag);

	
	$sql=mysql_query("Select * from sent where sdte = '$sdte' and dnum = '$dnum' ");
	if (mysql_num_rows($sql) > 0) 
	{
		$rec="update sent set sdte='$sdte', fcat='$fcat', dnum='$dnum', sto= '$sto', scc= '$scc', desc='$desc', refnum='$refnum', tag='$tag'";
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
		
		datins($txtddate,$txtindex,$txtsynoptime);
		
function datins($txtddate,$txtindex,$txtsynoptime){
	mysql_connect("localhost","root","");
	mysql_select_db("synops");
	
	$sql1=mysql_query("Select * from synops where ddate = '$txtddate' and indexno = '$txtindex'");
	while ($row = mysql_fetch_assoc($sql1)) 
	{
		$vv03=0;
		$cldn03=0;
		$dd03=0;
		$ff03=0;
		$db03=0;
		$dp03=0;
		$rh03=0;
		$slp03=0;
		$mslp03=0;
		$wx=0;
		$max=0;
		$min=0;
		$p24=0;
		$rf=0;
		$nn3 = 99;
		$nn5 = 99;
		
		$txtsynop=$row['synop'];
		$txtsynop=trim(preg_replace('/(\s\s+|\t|\n)/', ' ', $txtsynop));
		if (strpos($txtsynop,"=")>0){$txtsynop = substr($txtsynop,0,strpos($txtsynop,"=")+1);}
		else
		{$txtsynop = $txtsynop."=";}		
		$txtsynop = strstr($txtsynop,strval($row['indexno'])); 
		$arr = explode(" ",$txtsynop);
	
			for ($nn=0;$nn<count($arr);$nn++)
			{
				if($nn==1){$vv03=substr($arr[$nn],3,2);}
				if($nn==2){$cldn03=substr($arr[$nn],0,1);
						   $dd03=substr($arr[$nn],1,2);
						   $ff03=substr($arr[$nn],3,2);}
				if($nn==3){$db03=substr($arr[$nn],2,3);}
				if($nn==4){$dp03=substr($arr[$nn],2,3);
							$Es=6.11*pow(10.0,(7.5*$db03/(237.7+$db03)));
							$E=6.11*pow(10.0,(7.5*$dp03/(237.7+$dp03)));
							$rh03 = round(($E/$Es)*100,0);}
				if($nn==5 && substr($arr[$nn],0,1)==3){$slp03=substr($arr[$nn],1,4);
							if ($slp03<500){$slp03=$slp03+10000;}
						  }
				if(($nn==6 || $nn==5) && substr($arr[$nn],0,1)==4)
							{$mslp03=substr($arr[$nn],1,4);
							if ($mslp03<500){$mslp03=$mslp03+10000;}
							}
				if(($nn==6 || $nn==7) && substr($arr[$nn],0,1)==7){$wx=substr($arr[$nn],1,2);}
				if ($arr[$nn]==333){$nn3 = $nn;}
				if ($arr[$nn]==555){$nn5 = $nn;}
				if ($arr[$nn]==333){$nn3 = $nn;}
				
				if ($nn > $nn3 and $nn < $nn5){  
								if(substr($arr[$nn],0,1)==1){$max = substr($arr[$nn],2,3);}
								if(substr($arr[$nn],0,1)==2){$min = substr($arr[$nn],2,3);}
								if(substr($arr[$nn],0,2)==58){$p24 = substr($arr[$nn],2,3);}
								if(substr($arr[$nn],0,2)==59){$p24 = -1*substr($arr[$nn],2,3);}

								}
				if($nn > $nn5 && substr($arr[$nn],0,1)==0){$rf = substr($arr[$nn],1,4);}
				}
if ($txtsynoptime==300){

	$sql2=mysql_query("Select * from synops03 where ddate = '$txtddate' and indexno = '$txtindex' ");
	if (mysql_num_rows($sql2) > 0) 
	{
		$rec2="UPDATE synops03 set 
		ddate = '$txtddate', 
		indexno = '$txtindex', 
		vv03='$vv03',
		cloudn03='$cldn03',
		dd03='$dd03',
		windff03='$ff03',
		db03='$db03',
		dp03='$dp03',
		rh03='$rh03',
		slp03='$slp03',
		mslp03='$mslp03',
		wx='$wx',
		max='$max',
		min='$min',
		p24p24='$p24',
		rf='$rf";
		
	}
	else
	{
		$rec2="INSERT INTO synops03
		(ddate,
		indexno,
		vv03,
		cloudn03,
		dd03,
		windff03,
		db03,
		dp03,
		rh03,
		slp03,
		mslp03,
		wx,
		max,
		min,
		p24p24,
		rf ) 
		values 
		(
		'$txtddate',
		'$txtindex',
		'$vv03',
		'$cldn03',
		'$dd03',
		'$ff03',
		'$db03',
		'$dp03',
		'$rh03',
		'$slp03',
		'$mslp03',
		'$wx',
		'$max',
		'$min',
		'$p24',
		'$rf' )";
		
	}
	
	}
	
if ($txtsynoptime==1200){
	$sql2=mysql_query("Select * from synops12 where ddate = '$txtddate' and indexno = '$txtindex' ");
	if (mysql_num_rows($sql2) > 0) 
	{
		$rec2="UPDATE synops12 set 
		ddate = '$txtddate', 
		indexno = '$txtindex', 
		vv12='$vv03',
		cloudn12='$cldn03',
		dd12='$dd03',
		windff12='$ff03',
		db12='$db03',
		dp12='$dp03',
		rh12='$rh03',
		slp12='$slp03',
		mslp12='$mslp03',
		p24p24='$p24' ";
		
	}
	else
	{
		$rec2="INSERT INTO synops12
		(ddate,
		indexno,
		vv12,
		cloudn12,
		dd12,
		windff12,
		db12,
		dp12,
		rh12,
		slp12,
		mslp12,
		p24p24) 
		values 
		(
		'$txtddate',
		'$txtindex',
		'$vv03',
		'$cldn03',
		'$dd03',
		'$ff03',
		'$db03',
		'$dp03',
		'$rh03',
		'$slp03',
		'$mslp03',
		'$p24' )";
	}
	}
	mysql_query($rec2);
	}
   }		
?>
</div>
</center>
</body>
</html>