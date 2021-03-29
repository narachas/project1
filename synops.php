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
min-height:300px;
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

#txtindex,#txtddate,#txtsynoptime,#txthm,#txtlm{font:14px arial;width:120px;height:26px;border-radius:4px;padding:3px;border:solid 1px #10186b;}
#txtsynop{border-radius:5px;font:14px arial;width:100%;padding:10px;border:solid 1px #10186b;}
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
</style>
<script src="nalert.js" type="text/javascript" language="javascript"></script> 
<script src="jquery.js"></script>
<script src="jquery-ui.js"></script>
<script>
$(function() {
$( "#txtddate" ).datepicker({ dateFormat: "yy-mm-dd" });
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
'document.getElementById('txtddate').value=sdate;
$txtdate=sdate;
}

</script>
<body onload="addDate()" >
<?php
$dterror="";
$tmerror="";
$ndxerror="";
$syperror="";
$stnerror="";
$stdate = date("Y-m-d");

if ((isset($_POST['insert'])))
{
	$_SESSION['txtddate']=$_POST['txtddate'];
	$_SESSION['txtsynoptime']=$_POST['txtsynoptime'];
	$_SESSION['txtindex']=$_POST['txtindex'];
	$_SESSION['txtsynop']=$_POST['txtsynop'];
	$_SESSION['txthm']=$_POST['txthm'];
	$_SESSION['txtlm']=$_POST['txtlm'];
	
		
	if (($_POST['txtddate']>$stdate) || ($_POST['txtindex'] == "--Select--") || (trim($_POST['txtsynop'])=="") || strrpos(" ".$_POST['txtsynop'],$_POST['txtindex']) == False )
	{
		if ($_POST['txtddate']>$stdate){
		$dterror="    *FUTURE DATE..? <br>";}
	
		if ($_POST['txtindex'] == "--Select--"){
		$ndxerror = "    *SELECT STATION <br>" ;}
			
		if (trim($_POST['txtsynop'])==""){
		$syperror="    *SYNOP BLANK ...? <br>";}
		
		if (strrpos(" ".$_POST['txtsynop'],$_POST['txtindex'])==False)
		{
		$stnerror="    *Check station index in synop .. !";	
		}
		
		$serror = $dterror.$ndxerror.$syperror.$stnerror;
		echo "<script> var serror = '$serror'</script>";
		echo "<script> sAlert(serror); </script>";
	}
	else
	{
		if (isset($_POST['insert']))
		{
			if (($_POST['txtddate']==$stdate) && (intval($_POST['txtsynoptime']) > intval(gmdate("Hi"))))
			{
			echo "<script>sAlert('Check Date & Synop time');</script>";
			}
			else
			{
			header("Location: synopinsert.php");exit;
			}
		}
	}	
	
	$txtindex=$_POST['txtindex'];
	$txtsynoptime=$_POST['txtsynoptime'];
	$txthm=$_POST['txthm'];
	$txtlm=$_POST['txtlm'];
	$txtsynop=trim($_POST['txtsynop']);
	$txtddate=$_POST['txtddate'];
	
}
else
{
$txtddate=$stdate;
$txtsynoptime="";
$txtindex="";
$txtsynop="";
$txthm="";
$txtlm="";
}
?>

<div id="bx1"><center>
<table width="100%" border='0' valign='center'><tr ><td style='width:130px;'></td><td align='center'><a id='fnt2'>Synops Entry Form</a><br><a id='fnt1'>Meteorological Centre, Hyderabad</a></td>
<td align='Right' style='width:80px;'><a href='wxmenu.php'>Menu</a></td><td align='Right' style='width:20px;'><a href='wxmenu.php'><img src='bck.png' height='50'></a></td>
</tr>
</table>
</center>
</div >

<center>
<div id="id1">
<form method="post" name="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<table width="100%" border='0' >
	<tr>
		<td style='color:#color:#080f51;font:16px arial;width:200px;'>DATE <span id='err'><?php echo $dterror ?></span></td>
		<td style='color:#080f51;width:200px;'>SYNOP TIME</td>
		<td style='color:#080f51;'>INDEX NO</td>
	</tr>

	<tr height="40">
		<td valign='top'><input type="text" maxlength="10" name="txtddate" id="txtddate" tabindex="1" value="<?php echo $txtddate; ?>"></td> 
		<td  valign='top'><select name="txtsynoptime" id="txtsynoptime" tabindex="2" maxlength="5">
		<option value=300 <?php if($txtsynoptime == '300'){echo("selected");}?>>0300 UTC</option>
		<option value=1200 <?php if($txtsynoptime == '1200'){echo("selected");}?>>1200 UTC</option>
		</select>
		</td> 

		<td valign='top'><select name="txtindex" id="txtindex" tabindex="3" maxlength="5" >
		<option>--Select--</option>
		<option value=43025 <?php if($txtindex == '43025'){echo("selected");}?>>43025</option>
		<option value=43081 <?php if($txtindex == '43081'){echo("selected");}?>>43081</option>
		<option value=43083 <?php if($txtindex == '43083'){echo("selected");}?>>43083</option>
		<option value=43086 <?php if($txtindex == '43086'){echo("selected");}?>>43086</option>
		<option value=43087 <?php if($txtindex == '43087'){echo("selected");}?>>43087</option>
		<option value=43105 <?php if($txtindex == '43105'){echo("selected");}?>>43105</option>
		<option value=43128 <?php if($txtindex == '43128'){echo("selected");}?>>43128</option>
		<option value=43133 <?php if($txtindex == '43133'){echo("selected");}?>>43133</option>
		<option value=43136 <?php if($txtindex == '43136'){echo("selected");}?>>43136</option>
		<option value=43137 <?php if($txtindex == '43137'){echo("selected");}?>>43137</option>
		<option value=43147 <?php if($txtindex == '43147'){echo("selected");}?>>43147</option>
		<option value=43149 <?php if($txtindex == '43149'){echo("selected");}?>>43149</option>
		<option value=43150 <?php if($txtindex == '43150'){echo("selected");}?>>43150</option>
		<option value=43168 <?php if($txtindex == '43168'){echo("selected");}?>>43168</option>
		<option value=43177 <?php if($txtindex == '43177'){echo("selected");}?>>43177</option>
		<option value=43181 <?php if($txtindex == '43181'){echo("selected");}?>>43181</option>
		<option value=43182 <?php if($txtindex == '43182'){echo("selected");}?>>43182</option>
		<option value=43185 <?php if($txtindex == '43185'){echo("selected");}?>>43185</option>
		<option value=43187 <?php if($txtindex == '43187'){echo("selected");}?>>43187</option>
		<option value=43189 <?php if($txtindex == '43189'){echo("selected");}?>>43189</option>
		<option value=43212 <?php if($txtindex == '43212'){echo("selected");}?>>43212</option>
		<option value=43213 <?php if($txtindex == '43213'){echo("selected");}?>>43213</option>
		<option value=43220 <?php if($txtindex == '43220'){echo("selected");}?>>43220</option>
		<option value=43221 <?php if($txtindex == '43221'){echo("selected");}?>>43221</option>
		<option value=43237 <?php if($txtindex == '43237'){echo("selected");}?>>43237</option>
		<option value=43241 <?php if($txtindex == '43241'){echo("selected");}?>>43241</option>
		<option value=43243 <?php if($txtindex == '43243'){echo("selected");}?>>43243</option>
		<option value=43245 <?php if($txtindex == '43245'){echo("selected");}?>>43245</option>
		<option value=43271 <?php if($txtindex == '43271'){echo("selected");}?>>43271</option>
		<option value=43275 <?php if($txtindex == '43275'){echo("selected");}?>>43275</option>
		<option value=00202 <?php if($txtindex == '00202'){echo("selected");}?>>00202</option>
		</select><span id='err'><?php echo $ndxerror ?></span>
		</td>
	</tr>

</table>
<table width="100%" border='0'>
<tr><td style='color:#080f51;'>ENTER SYNOP <span id='err'><?php echo $syperror ?></span></td></tr>
<tr height="170"><td valign='top'><textarea name="txtsynop" id="txtsynop" tabindex="4" rows=7 cols=75><?php echo $txtsynop;?></textarea></td></tr>
</table>

<table width="100%" border='0'>
<tr height="40">
	<td width="18%">Higher Maximum</td><td width="22%"><input type='text' name='txthm' id = 'txthm' tabindex="5" width='50' maxlength="3" value='<?php echo $txthm;?>'></td>
	<td width="17%">Lower Minimum</td><td width="18%"><input type='text' name='txtlm' id = 'txtlm' tabindex="6" width='50' maxlength="3" value='<?php echo $txtlm;?>'></td>
	<td style='font:Italic 12px arial;text-align:center;'>Without Decimal</td>
</tr>
</table>

<table width="100%" border='0'>
<tr height="80">
<td align='left'><input type="submit" value="SUBMIT" name="insert" style='width:150px;height:35px;color:green'></td>
<td align='right'><input type="reset" value="RESET" name="reset" style='width:150px;height:35px;color:red;'></td>
</tr>
</table>
</form>
</div>
<?php include 'ftr.php'; ?>
</center>
</body>


