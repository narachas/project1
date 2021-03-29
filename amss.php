<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wx";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$metarpage = strip_tags(file_get_contents('http://amsschennai.gov.in/metarBltn.php'));
$mtrlen = strlen($metarpage);
$vdate = date( "Y-m-d", strtotime((preg_replace('/\s+/', '', substr($metarpage,(strpos($metarpage,"Dated :")+strlen("Dated :")+1),13)))));
$dtstring = preg_replace('/\s+/', '', substr($metarpage,(strpos($metarpage,"Dated :")+strlen("Dated :")+1),13));
$vmp = strpos($metarpage,"Vizag")+strlen("Vizag")+1;
$vmetar = substr($metarpage, $vmp);    
$vmtarry = explode("=",$vmetar);
$mdd = 0;
$mkt = 0;
$mvis = 0;
$mutc = 0;
$mtt = 0;
$mdp = 0;
$ttt=rand(1,1000);

for ($nn=0;$nn<count($vmtarry);$nn++)
	{
		$vmtr = "";
		$vzp = strpos($vmtarry[$nn],"VOVZ")+strlen("VOVZ")+1;
		$vmtr = substr($vmtarry[$nn], $vzp);
		$grparry = explode(" ",$vmtr);
		
		for ($mm=0;$mm<count($grparry);$mm++)
		{
			if ((strpos($grparry[$mm], 'Z') !== false) && $mm == 0)
			{
				$mutc = substr($grparry[$mm],2,4);
			}
			if ((strpos($grparry[$mm], 'KT') !== false) && $mm == 1)
			{
				
				$mdd = substr($grparry[$mm],0,3);
				if ($mdd == "VRB"){
					$mdd = 999;
				}
				$mkt = substr($grparry[$mm],3,2);
			}
			if ($mm == 2)
			{
				$mvis = $grparry[$mm];
			}
			if (strpos($grparry[$mm], '/') !== false) 
			{
				$spos = strpos($grparry[$mm],"/");
				$mtt = substr($grparry[$mm],$spos-2,2);
				$mdp = substr($grparry[$mm],$spos+1,2);
			}
		}
		echo $mutc.", ".$mdd.", ".$mkt.", ".$mvis.", ".$mtt.", ".$mdp.", ".$ttt ;
		echo "<br>";

	$sql = "Select * from metar149 where dte = '$vdate' and utc = '$mutc'";
	$result = $conn->query($sql);
	if ($result->num_rows == 0)
	{
		$rec = "INSERT INTO metar149 (dte, utc, vis, ddd, ff, ttt, tdd, qnh) VALUES ('$vdate', $mutc, $mvis, $mdd, $mkt, $mtt, $mdp, $ttt)";
			if ($conn->query($rec) === TRUE) 
		{
			echo "METAR SUBMITTED SUCCESSFULLY .. .. ";
		}
		else
		{
			echo "Error in saving data .. .. ";
		}
	}
}
$conn->close();
echo "Process complete..";
?> 