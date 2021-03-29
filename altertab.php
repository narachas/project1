<html>
<head>
<style>
body{}
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
<div >

<?php

$conn = new mysqli("localhost", "root", "", "wx");

if ($conn->connect_errno) {
    echo "Database connection failed. ".$conn->connect_error;
}
else
{

$rec = "ALTER TABLE metar151 ADD COLUMN visx int(5) ";    if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN dddx int(3) ";    if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN ffx  int(3) ";    if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN wxx  int(2) ";    if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN cldx1 int(1) ";   if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN cldx2 int(1) ";   if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN cldx3 int(1) ";   if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN cldx4 int(1) ";   if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN nx1 int(1) ";     if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN nx2 int(1) ";     if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN nx3 int(1) ";     if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN nx4 int(1) ";     if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN nnx int(1) ";     if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN clhtx1 int(1) ";  if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN clhtx2 int(1) ";  if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN clhtx3 int(1) ";  if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN clhtx4 int(1) ";  if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN tttx decimal(4,1)  ";    if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN tddx decimal(4,1)  ";    if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
$rec = "ALTER TABLE metar151 ADD COLUMN qnhx decimal(6,1)  ";    if ($conn->query($rec) === TRUE) { echo "Table alter added <br>"; }else{	echo "ERROR IN ... Table alter added ";}
}

?>
</div>
</center>
</body>
</html>