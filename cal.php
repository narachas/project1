<html>
<head>
<link rel="stylesheet" href="jquery-ui.css" />
<script src="jquery.js"></script>
<script src="jquery-ui.js"></script>
<script>
$(function() {
$( "#sdte" ).datepicker({ dateFormat: "yy-mm-dd" });
});
</script>
</head>
<script>
function addDate()
{
var date= new Date();
var y=date.getFullYear()
var m=date.getMonth()
m=m+1;
if(m<10)
m='0'+m;
var d=date.getDate()
if(d<10)
d='0'+d;
var sdate=y+'-'+m+'-'+d;
'document.getElementById('sdte').value=sdate;
$sdte=sdate;
}
</script>
<body onload="addDate()" >
<?php
$stdate = date("Y-m-d");
$sdte=$stdate;
?>
<center>
<input type="text" maxlength="10" name="sdte" id="sdte" tabindex="1" value="<?php echo $sdte; ?>">
</body>


