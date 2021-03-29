<?php
$db=28.0;
$dp=18.0;
$Es=6.11*pow(10.0,(7.5*$db/(237.7+$db)));
$E=6.11*pow(10.0,(7.5*$dp/(237.7+$dp)));
$rh = round(($E/$Es)*100,0);
echo $db,$dp;
echo "<BR>";
echo "Rh is ".$rh;
?>
