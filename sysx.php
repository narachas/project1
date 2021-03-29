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
#ax{
background:#ccefef;
top:10px;
width:1000px;
font:18px arial;
position:relative;
margin:auto;
padding:10px;
border-radius: 6px;
box-shadow: 1px 4px 7px rgba(27, 35, 38, 0.6);
display:table;
}
</style>
</head>
<body>
<center>
<div id="ax">
<?php
mysql_connect("localhost","root","");
mysql_select_db("synops");

	$txtddate=$_SESSION['txtddate'];
	//$txtsynoptime=$_SESSION['txtsynoptime'];
	
	$txtddate=mysql_real_escape_string($txtddate);
	//$txtsynoptime=mysql_real_escape_string($txtsynoptime);

	$sql=mysql_query("Select * from synops where ddate = '$txtddate' ");
	while ($row = mysql_fetch_assoc($sql)) 
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
		{ $txtsynop = $txtsynop."=";}		
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
		}
?>
</div>
</center>
</body>
</html>