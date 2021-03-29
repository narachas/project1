<?php session_start(); 
date_default_timezone_set("Asia/Kolkata");
ob_start();
?>
<html>
<head>
<link rel="stylesheet" href="jquery-ui.css" />
<style>
table{border-collapse:collapse;}
body{background:#224685;background:#9b945c;font:18px arial;background:url(g11.jpg);}
#bx1{
position:relative;
margin:auto;
top:10px;
min-height:80px;
background:#d9e5be;;
width:780px;
border-radius: 6px;
box-shadow: 2px 5px 8px rgba(27, 35, 38, 1.0);
padding-top:15px;
}
#fnt1{font:15px arial;color:#660066;}
#fnt2{font:32px impact;color:#660066;}
#id1{
background:#91cbe3;
background:#d9e5be;
position:relative;
margin:auto;
top:40px;
width:700px;
min-height:100px;
padding:40px;
border-radius: 6px;
box-shadow: 2px 5px 8px rgba(27, 35, 38, 1.0);
}

#id2{
background:#d9e5be;
position:relative;
margin:auto;
width:760px;
min-height:50px;
padding:10px;
border-radius: 3px;
box-shadow: 2px 5px 8px rgba(27, 35, 38, 1.0);
top:50px;
text-decoration:none;
}

a{text-decoration:none;}

#txtindex,#txtddate,#txtvis,#txtwx,#txtddd,#txtff,#txtttt,#txttdd,#txtqnh,#txtclht1,#txtclht2,#txtclht3,#txtclht4{font:14px arial;width:85px;height:24px;border-radius:2px;padding:3px;border:solid 1px #10186b;}
#txtutc{font:14px arial;width:100px;height:24px;border-radius:2px;padding:3px;border:solid 1px #10186b;}
#err{color:red;font:italic 14px arial;text-decoration: blink;}
.1alert
{
    font-size: 1.3em;
    padding: 1em;
    text-align: center;
    white-space: nowrap;
    width: auto;
    word-wrap: normal;
}

input[type=radio] {
  display: inline;
}
</style>
<script src="nalert.js" type="text/javascript" language="javascript"></script> 
<script src="jquery.js"></script>
<script src="jquery-ui.js"></script>
<script>
$(function() {
$( "#txtddate" ).datepicker({ dateFormat: "yy-mm-dd" });
});
</script>

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
'document.getElementById('txtddate').value=sdate;
$txtdate=sdate;
}

</script>
</head>
<body onload="addDate()" >
<?php
$conn = new mysqli("localhost", "root", "", "wx");
if ($conn->connect_errno) 
{
    echo "Database connection failed. ".$conn->connect_error;
}
else
{
	$dterror="";
	$txtcdate = date("Y-m-d");
		
	if ((isset($_POST['txtutc'])) || (isset($_POST['txtddate'])))
		{
			$txtddate = $_POST['txtddate'];
			$txtutc = $_POST['txtutc'];
			
			if ($_POST['txtddate']>$txtcdate)
			{
				$dterror="    *FUTURE DATE..? <br>";
			}
			else
			{
			if (($_POST['txtddate']==$txtcdate) && (intval($_POST['txtutc']) > intval(gmdate("Hi")))) 
					{
						echo "<script>sAlert('Check Date & Synop time');</script>";
					}
					else
					{
						if ($txtutc <> "Select") 
						{
							$_SESSION['txtddate']=$_POST['txtddate'];
							$_SESSION['txtutc']=  $_POST['txtutc'];
							$_SESSION['txtstn']= $_POST['txtstn'];
							header("Location: mtrentry1.php");exit;
						}
					}
			}	
			
		}
	else
	{
		$txtddate = date("Y-m-d");
		//$txtutc="Select";
		$txtutc= gmdate("H") *100;
	}
	echo gmdate("h");
}
?>

<div id="bx1"><center>
<table width="100%" border='0' valign='center'><tr ><td style='width:130px;'></td><td align='center'><a id='fnt2'>METAR Entry Form</a><br><a id='fnt1'>Cyclone Warning Centre, Visakhapatnam</a></td>
<td align='Right' style='width:80px;'><a href='wxmenu.php'>Menu</a></td><td align='Right' style='width:20px;'><a href='wxmenu.php'><img src='bck.png' height='50'></a></td>
</tr>
</table>
</center>
</div >

<center>
<div id="id1">
<form method="post" name="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<table width="100%" border='1' >
	<tr>
		<td style='color:#080f51;font:16px arial;'>DATE <span id='err'><?php echo $dterror ?></span></td>
		<td style='color:#080f51;font:16px arial;'>METAR TIME</td>
		<td colspan=2 ></td>
	</tr>
	<tr height="40">
		<td valign='middle' width="30%"><input type="text" maxlength="10" name="txtddate" id="txtddate" tabindex="1" value="<?php echo $txtddate; ?>"></td> 
		<!--<td valign='top' width="33%"><input type="text" maxlength="10" name="txtddate" id="txtddate" tabindex="1" value="< ?php echo $txtddate; ?>" onchange='this.form.submit()'></td>
		<!--<td  valign='top'><select name="txtutc" id="txtutc" tabindex="2" maxlength="5" onchange='this.form.submit()'> -->
		<td  valign='middle' width="30%"><select name="txtutc" id="txtutc" tabindex="2" maxlength="5" >
		<option 		   <?php if($txtutc == 'Select'){echo("selected");}?>>Select</option>
		<option value=0000 <?php if($txtutc == '0000'){echo("selected");}?>>0000 UTC</option>
		<option value=0100 <?php if($txtutc == '0100'){echo("selected");}?>>0100 UTC</option>
		<option value=0200 <?php if($txtutc == '0200'){echo("selected");}?>>0200 UTC</option>
		<option value=0300 <?php if($txtutc == '0300'){echo("selected");}?>>0300 UTC</option>
		<option value=0400 <?php if($txtutc == '0400'){echo("selected");}?>>0400 UTC</option>
		<option value=0500 <?php if($txtutc == '0500'){echo("selected");}?>>0500 UTC</option>
		<option value=0600 <?php if($txtutc == '0600'){echo("selected");}?>>0600 UTC</option>
		<option value=0700 <?php if($txtutc == '0700'){echo("selected");}?>>0700 UTC</option>
		<option value=0800 <?php if($txtutc == '0800'){echo("selected");}?>>0800 UTC</option>
		<option value=0900 <?php if($txtutc == '0900'){echo("selected");}?>>0900 UTC</option>
		<option value=1000 <?php if($txtutc == '1000'){echo("selected");}?>>1000 UTC</option>
		<option value=1100 <?php if($txtutc == '1100'){echo("selected");}?>>1100 UTC</option>
		<option value=1200 <?php if($txtutc == '1200'){echo("selected");}?>>1200 UTC</option>
		<option value=1300 <?php if($txtutc == '1300'){echo("selected");}?>>1300 UTC</option>
		<option value=1400 <?php if($txtutc == '1400'){echo("selected");}?>>1400 UTC</option>
		<option value=1500 <?php if($txtutc == '1500'){echo("selected");}?>>1500 UTC</option>
		</select>
		<noscript><input type="submit" value="Submit"></noscript>
		</td> 
		<td width="20%"><label class="radio-inline">
      <input type="radio" name="txtstn" value="Waltair" checked>Waltair
    </label></td>
    
	<td width="20%"><label class="radio-inline">
      <input type="radio" name="txtstn" value="Airport">Airport
    </label></td>
	</tr>
	<tr>
	
	<td align='right' colspan=4><input type="submit" value="SUBMIT" tabindex="19" name="insert" style='width:150px;height:35px;color:#064f01'></td>
	</tr>
</table>
</form>
</div>
<?php include 'ftr.php'; ?>
</center>
</body>