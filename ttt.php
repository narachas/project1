<?php
$ch = curl_init("http://amsschennai.gov.in/metarBltn.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$output = curl_exec($ch);
echo $output;
?>