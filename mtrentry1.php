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
width:800px;
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
#c1,#c2{padding-left:5px;}
#c1{width:10%;}
#c2{width:40%;}
</style>
<script src="nalert.js" type="text/javascript" language="javascript"></script> 
<script src="jquery.js"></script>
<script src="jquery-ui.js"></script>
</head>

<?php
$conn = new mysqli("localhost", "root", "", "wx");
if ($conn->connect_errno) 
{
    echo "Database connection failed. ".$conn->connect_error;
}
else
{
	$dterror="";
	$viserror="";
	$ddderror="";
	$fferror="";
	$ttterror="";
	$tdderror="";
	$txtutc = 0;
	$txtddate = date("Y-m-d");
	
	if ((isset($_POST['insert'])) || (isset($_POST['exit'])))
	{
		if ((isset($_POST['insert'])))
		{
			require_once('$_Session_$_post.php'); 
	
			if (($_POST['txtddate']>$txtddate) || (trim($_POST['txtvis'])=="") || (trim($_POST['txtddd'])=="") || (trim($_POST['txtff'])=="") || (trim($_POST['txtttt'])=="") || ($_POST['txtttt'] > 50) || (trim($_POST['txttdd'])==""))
				{
					if ($_POST['txtddate']>$txtddate){
					$dterror="    *FUTURE DATE..? <br>";}
				
					if (trim($_POST['txtvis'])==""){
					$viserror = "    *Enter Visibility <br>" ;}
						
					if (trim($_POST['txtddd'])==""){
					$ddderror="    *Enter direction <br>";}
					
					if (trim($_POST['txtff'])==""){
					$fferror="    *Enter wind speed <br>";}
					
					if ((trim($_POST['txtttt'])=="") || ($_POST['txtttt'] > 50)){
					$ttterror="    *Check temperature <br>";}
					
					if (trim($_POST['txttdd'])==""){
					$tdderror="    *Check dewpoint <br>";}
					
					$serror = $dterror.$viserror.$ddderror.$fferror.$ttterror.$tdderror;
					echo "<script> var serror = '$serror'</script>";
					echo "<script> sAlert(serror); </script>";
					
				}
			else
				{
				echo "Before Going to insert ....";
				if (($_POST['txtddate']==$txtddate) && (intval($_POST['txtutc']) > intval(gmdate("Hi"))))
					{
					echo "<script>sAlert('Check Date & Synop time');</script>";
					}
					else
					{
					echo "Going to insert ....";
					header("Location: metarinsert.php");exit;
					}
				}	
			require_once('$txt$_post.php');

		}
		else
		{
		header("Location: metarentry.php");exit;
		}
	}
	else
		{
			$txtddate = $_SESSION['txtddate'];
			$txtutc = $_SESSION['txtutc'];
			$txtstn = $_SESSION['txtstn'];
			$sql = "Select * from metar where dte = '$txtddate' and  utc = '$txtutc' ";
			if ($result = $conn->query($sql))
			{
				$row = $result->fetch_assoc();
				require_once('$txt$row.php'); 
			}
			else
			{
				require_once('$txtinit.php'); 
			}
		}	
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
<table width="100%" border='0' >
	<tr>
		<td style='color:#color:#080f51;font:16px arial;width:200px;'>DATE <span id='err'><?php echo $dterror ?></span></td>
		<td style='color:#080f51;width:200px;'>METAR TIME</td>
		<td style='color:#080f51;width:200px;'>Observatory</td>
		
	</tr>
	<tr height="40">
		<td valign='top'><input type="text" name="txtddate" id="txtddate" value="<?php echo $txtddate; ?>" readonly="readonly"></td> 
		<td valign='top'><input type="text" name="txtutc"   id="txtutc"   value="<?php echo $txtutc; ?>"   readonly="readonly">
		<td valign='top'><input type="text" name="txtstn"   id="txtstn"   value="<?php echo $txtstn; ?>"   readonly="readonly">
		<noscript><input type="submit" value="Submit"></noscript>
		</td> 
	</tr>
</table>

<table width="100%" border='1'>
<!--<tr height="40">-->
<tr>
	<td id="c1">Visibility</td>		<td id="c2"><input type='text' name='txtvis' id = 'txtvis' tabindex="3" width='50' maxlength="5" value='<?php echo $txtvis;?>'><span id='err'><?php echo $viserror ?></span></td>
	<td id="c1">Weather (0-99)</td>	<td id="c2"><input type='text' name='txtwx' id = 'txtwx' tabindex="4" width='50' maxlength="2" value='<?php echo $txtwx;?>'></td>
</tr>
<tr>
	<td id="c1">Wind Dir(ddd)</td>		<td id="c2"><input type='text' name='txtddd' id = 'txtddd' tabindex="5" width='50' maxlength="3" value='<?php echo $txtddd;?>'><span id='err'><?php echo $ddderror ?></span></td>
	<td id="c1">Wind speed(kt)</td>		<td id="c2"><input type='text' name='txtff' id = 'txtff' tabindex="6" width='50' maxlength="3" value='<?php echo $txtff;?>'><span id='err'><?php echo $fferror ?></span></td>
</tr>  

<tr height="20"></tr>
<tr>
	<td id="c1">Temperature(TT.T)</td>	<td id="c2"><input type='text' name='txtttt' id = 'txtttt' tabindex="20" width='50' maxlength="4" value='<?php echo $txtttt;?>'> <span id='err'><?php echo $ttterror ?></span></td>
	<td id="c1">Dewpoint(Td.d)</td>		<td id="c2"><input type='text' name='txttdd' id = 'txttdd' tabindex="21" width='50' maxlength="4" value='<?php echo $txttdd;?>'> <span id='err'><?php echo $tdderror ?></span></td>
</tr>
<tr>
	<td id="c1">Pressure(QNH)</td>		<td id="c2"><input type='text' name='txtqnh' id = 'txtqnh' tabindex="22" width='50' maxlength="6" value='<?php echo $txtqnh;?>'></td>
</tr>
</table>

<table width="70%" border='2' align="left">
<tr>
	<td >Total Cloud(N)</td><td   valign='top'><select name="txtnn" id="txtnn" tabindex="7" maxlength="5">
		<option value=0 <?php if($txtnn == '0'){echo("selected");}?>> 0 </option>
		<option value=1 <?php if($txtnn == '1'){echo("selected");}?>> 1 </option>
		<option value=2 <?php if($txtnn == '2'){echo("selected");}?>> 2 </option>
		<option value=3 <?php if($txtnn == '3'){echo("selected");}?>> 3 </option>
		<option value=4 <?php if($txtnn == '4'){echo("selected");}?>> 4 </option>
		<option value=5 <?php if($txtnn == '5'){echo("selected");}?>> 5 </option>
		<option value=6 <?php if($txtnn == '6'){echo("selected");}?>> 6 </option>
		<option value=7 <?php if($txtnn == '7'){echo("selected");}?>> 7 </option>
		<option value=8 <?php if($txtnn == '8'){echo("selected");}?>> 8 </option>
		<option value=9 <?php if($txtnn == '9'){echo("selected");}?>> 9 </option>
		</select>
		</td><td></td><td></td>
</tr>
<tr><td >Cloud</td><td >Type</td><td >Amount</td><td>Height</td></tr>

<tr>
		<td >Cloud 1</td><td   valign='top'><select name="txtcld1" id="txtcld1" tabindex="8" maxlength="5">
		<option value=99 <?php if($txtcld1 == '99'){echo("selected");}?>> CLs  </option>
		<option value=0 <?php if($txtcld1 == '0'){echo("selected");}?>> 0-Ci </option>
		<option value=1 <?php if($txtcld1 == '1'){echo("selected");}?>> 1-Cc </option>
		<option value=2 <?php if($txtcld1 == '2'){echo("selected");}?>> 2-Cs </option>
		<option value=3 <?php if($txtcld1 == '3'){echo("selected");}?>> 3-Ac </option>
		<option value=4 <?php if($txtcld1 == '4'){echo("selected");}?>> 4-As </option>
		<option value=5 <?php if($txtcld1 == '5'){echo("selected");}?>> 5-Ns </option>
		<option value=6 <?php if($txtcld1 == '6'){echo("selected");}?>> 6-Sc </option>
		<option value=7 <?php if($txtcld1 == '7'){echo("selected");}?>> 7-St </option>
		<option value=8 <?php if($txtcld1 == '8'){echo("selected");}?>> 8-Cu </option>
		<option value=9 <?php if($txtcld1 == '9'){echo("selected");}?>> 9-Cb </option>
		</select>
		</td> 
		<td  valign='top'><select name="txtn1" id="txtn1" tabindex="9" maxlength="5">
		<option value=0 <?php if($txtn1 == '0'){echo("selected");}?>> 0 </option>
		<option value=1 <?php if($txtn1 == '1'){echo("selected");}?>> 1 </option>
		<option value=2 <?php if($txtn1 == '2'){echo("selected");}?>> 2 </option>
		<option value=3 <?php if($txtn1 == '3'){echo("selected");}?>> 3 </option>
		<option value=4 <?php if($txtn1 == '4'){echo("selected");}?>> 4 </option>
		<option value=5 <?php if($txtn1 == '5'){echo("selected");}?>> 5 </option>
		<option value=6 <?php if($txtn1 == '6'){echo("selected");}?>> 6 </option>
		<option value=7 <?php if($txtn1 == '7'){echo("selected");}?>> 7 </option>
		<option value=8 <?php if($txtn1 == '8'){echo("selected");}?>> 8 </option>
		<option value=9 <?php if($txtn1 == '9'){echo("selected");}?>> 9 </option>
		</select>
		</td> 
		<td><input type='text' name='txtclht1' id = 'txtclht1' tabindex="10" width='50' maxlength="3" value='<?php echo $txtclht1;?>'> </td>
</tr>
<tr>
		<td>Cloud 2</td><td  valign='top'><select name="txtcld2" id="txtcld2" tabindex="11" maxlength="5">
		<option value=0 <?php if($txtcld2 == '0'){echo("selected");}?>> 0 </option>
		<option value=1 <?php if($txtcld2 == '1'){echo("selected");}?>> 1 </option>
		<option value=2 <?php if($txtcld2 == '2'){echo("selected");}?>> 2 </option>
		<option value=3 <?php if($txtcld2 == '3'){echo("selected");}?>> 3 </option>
		<option value=4 <?php if($txtcld2 == '4'){echo("selected");}?>> 4 </option>
		<option value=5 <?php if($txtcld2 == '5'){echo("selected");}?>> 5 </option>
		<option value=6 <?php if($txtcld2 == '6'){echo("selected");}?>> 6 </option>
		<option value=7 <?php if($txtcld2 == '7'){echo("selected");}?>> 7 </option>
		<option value=8 <?php if($txtcld2 == '8'){echo("selected");}?>> 8 </option>
		<option value=9 <?php if($txtcld2 == '9'){echo("selected");}?>> 9 </option>
		</select>
		</td> 
		<td  valign='top'><select name="txtn2" id="txtn2" tabindex="12" maxlength="5">
		<option value=0 <?php if($txtn2 == '0'){echo("selected");}?>> 0 </option>
		<option value=1 <?php if($txtn2 == '1'){echo("selected");}?>> 1 </option>
		<option value=2 <?php if($txtn2 == '2'){echo("selected");}?>> 2 </option>
		<option value=3 <?php if($txtn2 == '3'){echo("selected");}?>> 3 </option>
		<option value=4 <?php if($txtn2 == '4'){echo("selected");}?>> 4 </option>
		<option value=5 <?php if($txtn2 == '5'){echo("selected");}?>> 5 </option>
		<option value=6 <?php if($txtn2 == '6'){echo("selected");}?>> 6 </option>
		<option value=7 <?php if($txtn2 == '7'){echo("selected");}?>> 7 </option>
		<option value=8 <?php if($txtn2 == '8'){echo("selected");}?>> 8 </option>
		<option value=9 <?php if($txtn2 == '9'){echo("selected");}?>> 9 </option>
		</select>
		</td> 
		<td><input type='text' name='txtclht2' id = 'txtclht2' tabindex="13" width='50' maxlength="3" value='<?php echo $txtclht2;?>'> </td>
</tr>

<tr>
		<td>Cloud 3</td><td  valign='top'><select name="txtcld3" id="txtcld3" tabindex="14" maxlength="5">
		<option value=0 <?php if($txtcld3 == '0'){echo("selected");}?>> 0 </option>
		<option value=1 <?php if($txtcld3 == '1'){echo("selected");}?>> 1 </option>
		<option value=2 <?php if($txtcld3 == '2'){echo("selected");}?>> 2 </option>
		<option value=3 <?php if($txtcld3 == '3'){echo("selected");}?>> 3 </option>
		<option value=4 <?php if($txtcld3 == '4'){echo("selected");}?>> 4 </option>
		<option value=5 <?php if($txtcld3 == '5'){echo("selected");}?>> 5 </option>
		<option value=6 <?php if($txtcld3 == '6'){echo("selected");}?>> 6 </option>
		<option value=7 <?php if($txtcld3 == '7'){echo("selected");}?>> 7 </option>
		<option value=8 <?php if($txtcld3 == '8'){echo("selected");}?>> 8 </option>
		<option value=9 <?php if($txtcld3 == '9'){echo("selected");}?>> 9 </option>
		</select>
		</td> 
		<td  valign='top'><select name="txtn3" id="e" tabindex="15" maxlength="5">
		<option value=0 <?php if($txtn3 == '0'){echo("selected");}?>> 0 </option>
		<option value=1 <?php if($txtn3 == '1'){echo("selected");}?>> 1 </option>
		<option value=2 <?php if($txtn3 == '2'){echo("selected");}?>> 2 </option>
		<option value=3 <?php if($txtn3 == '3'){echo("selected");}?>> 3 </option>
		<option value=4 <?php if($txtn3 == '4'){echo("selected");}?>> 4 </option>
		<option value=5 <?php if($txtn3 == '5'){echo("selected");}?>> 5 </option>
		<option value=6 <?php if($txtn3 == '6'){echo("selected");}?>> 6 </option>
		<option value=7 <?php if($txtn3 == '7'){echo("selected");}?>> 7 </option>
		<option value=8 <?php if($txtn3 == '8'){echo("selected");}?>> 8 </option>
		<option value=9 <?php if($txtn3 == '9'){echo("selected");}?>> 9 </option>
		</select>
		</td> 
		<td><input type='text' name='txtclht3' id = 'txtclht3' tabindex="16" width='50' maxlength="3" value='<?php echo $txtclht3;?>'> </td>
</tr>

<tr>
		<td>Cloud 4</td><td  valign='top'><select name="txtcld4" id="e" tabindex="17" maxlength="5">
		<option value=0 <?php if($txtcld4 == '0'){echo("selected");}?>> 0 </option>
		<option value=1 <?php if($txtcld4 == '1'){echo("selected");}?>> 1 </option>
		<option value=2 <?php if($txtcld4 == '2'){echo("selected");}?>> 2 </option>
		<option value=3 <?php if($txtcld4 == '3'){echo("selected");}?>> 3 </option>
		<option value=4 <?php if($txtcld4 == '4'){echo("selected");}?>> 4 </option>
		<option value=5 <?php if($txtcld4 == '5'){echo("selected");}?>> 5 </option>
		<option value=6 <?php if($txtcld4 == '6'){echo("selected");}?>> 6 </option>
		<option value=7 <?php if($txtcld4 == '7'){echo("selected");}?>> 7 </option>
		<option value=8 <?php if($txtcld4 == '8'){echo("selected");}?>> 8 </option>
		<option value=9 <?php if($txtcld4 == '9'){echo("selected");}?>> 9 </option>
		</select>
		</td> 
		<td  valign='top'><select name="txtn4" id="e" tabindex="18" maxlength="5">
		<option value=0 <?php if($txtn4 == '0'){echo("selected");}?>> 0 </option>
		<option value=1 <?php if($txtn4 == '1'){echo("selected");}?>> 1 </option>
		<option value=2 <?php if($txtn4 == '2'){echo("selected");}?>> 2 </option>
		<option value=3 <?php if($txtn4 == '3'){echo("selected");}?>> 3 </option>
		<option value=4 <?php if($txtn4 == '4'){echo("selected");}?>> 4 </option>
		<option value=5 <?php if($txtn4 == '5'){echo("selected");}?>> 5 </option>
		<option value=6 <?php if($txtn4 == '6'){echo("selected");}?>> 6 </option>
		<option value=7 <?php if($txtn4 == '7'){echo("selected");}?>> 7 </option>
		<option value=8 <?php if($txtn4 == '8'){echo("selected");}?>> 8 </option>
		<option value=9 <?php if($txtn4 == '9'){echo("selected");}?>> 9 </option>
		</select>
		</td> 
		<td><input type='text' name='txtclht4' id = 'txtclht4' tabindex="19" width='50' maxlength="3" value='<?php echo $txtclht4;?>'> </td>
</tr>

</table>

<table width="100%" border='0'>
<tr height="80">
<td align='left'><input type="submit" value="Exit" name="exit" style='width:150px;height:35px;color:red;'></td>
<td align='right'><input type="submit" value="SUBMIT" tabindex="19" name="insert" style='width:150px;height:35px;color:#064f01'></td>
</tr>
</table>
</form>
</div>
<?php include 'ftr.php'; ?>
</center>
</body>


