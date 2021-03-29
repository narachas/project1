<html>
<head>
<!--Modified by NCHas # 24 Sep 2013 -->
<title>Met Centre Hyderabad</title>
<link rel="stylesheet" href="jquery-ui.css" />
<style>
body{background:#224685;font:18px arial;background:url('g11.jpg');}

#tabn{border-collapse:collapse; border: none;}

#bx1{
position:relative;
margin:auto;
top:10px;
min-height:60px;
background:#91cbe3;
width:766px;
border-radius: 6px;
box-shadow: 2px 5px 8px rgba(27, 35, 38, 1.0);
padding:7px;
}

#fnt1{font:15px arial;color:#050568;}
#fnt2{font:30px Impact;color:#050568;}
#id1{
background:#91cbe3;
position:relative;
margin:auto;
top:20px;
width:700px;
min-height:400px;
padding:40px;
border-radius: 6px;
box-shadow: 2px 5px 8px rgba(27, 35, 38, 1.0);
}

#id2{
background:#91cbe3;
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


#txtindex,#txtddate{font:14px arial;width:120px;height:26px;border-radius:4px;padding:3px;border:solid 1px #10186b;}
#txtmts,#txtsts,#txtsquall,#txthailstorm{border-radius:5px;font:14px arial;width:100%;padding:10px;border:solid 1px #10186b;}
</style>

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
document.getElementById('txtddate').value=sdate;
}
</script>

<body onload="addDate()" >
<center>
<div id="bx1">
<table width="100%" border='0'><tr><td style='width:130px;'></td><td align='center'><a id='fnt2'>Thunderstorm Details Entry</a><br><a id='fnt1'>Meteorological Centre, Hyderabad</a></td>
<td align='Right' style='width:80px;'><a href='wxmenu.php'>Menu</a></td><td align='Right' style='width:20px;'><a href='wxmenu.php'><img src='bck.png' height='50'></a></td>
</tr>
</table>
</div >

<div id="id1">
<form method="post" name="myform" action="insertts.php" >

<table width="100%" id='tabn' >
<tr height="30"><td style='color:#080f51;font:16px arial'>DATE</td><td style='color:#080f51;'>INDEX NO</td><td rowspan="3" align="right" valign='top'><img src="cbcld.jpg" height="120"></td></tr>
<tr><td valign='top'><input type="text" maxlength="10" name="txtddate" id="txtddate" tabindex="1"></td>
<td valign='top'><select name="txtindex" id="txtindex" tabindex="2" maxlength="5">
<option>--Select--</option>
		<option value=43025 >43025</option>
		<option value=43081 >43081</option>
		<option value=43083 >43083</option>
		<option value=43086 >43086</option>
		<option value=43087 >43087</option>
		<option value=43105 >43105</option>
		<option value=43128 >43128</option>
		<option value=43133 >43133</option>
		<option value=43136 >43136</option>
		<option value=43137 >43137</option>
		<option value=43147 >43147</option>
		<option value=43149 >43149</option>
		<option value=43150 >43150</option>
		<option value=43168 >43168</option>
		<option value=43177 >43177</option>
		<option value=43181 >43181</option>
		<option value=43182 >43182</option>
		<option value=43185 >43185</option>
		<option value=43187 >43187</option>
		<option value=43189 >43189</option>
		<option value=43212 >43212</option>
		<option value=43213 >43213</option>
		<option value=43220 >43220</option>
		<option value=43221 >43221</option>
		<option value=43237 >43237</option>
		<option value=43241 >43241</option>
		<option value=43243 >43243</option>
		<option value=43245 >43245</option>
		<option value=43271 >43271</option>
		<option value=43275 >43275</option>
		<option value=00202 >00202</option>
</select>
</td>
</tr>
</table>
<table  width="100%" >
<tr ><td height=40 style='color:#080f51;' colspan='2'>THUNDERSTORM DETAILS:</td></tr>

<tr height="50"><td style='width:150px;'>Moderate TS</td><td valign='top'><textarea value='mts' name="txtmts" id="txtmts" tabindex="3" rows=1 cols=50>NIL</textarea></td></tr>

<tr height="50"><td>Severe TS</td><td valign='top'><textarea value='sts' name="txtsts" id="txtsts" tabindex="4" rows=1 cols=50>NIL</textarea></td></tr>

<tr height="50"><td>Squall</td><td valign='top'><textarea value='squall' name="txtsquall" id="txtsquall" tabindex="5" rows=1 cols=50>NIL</textarea></td></tr>

<tr height="50"><td>Hail Storm</td><td valign='top'><textarea value='hailstorm' name="txthailstorm" id="txthailstorm" tabindex="6" rows=1 cols=50>NIL</textarea></td></tr>

<tr>
<td align='right' colspan="3"><input type="submit" value="SUBMIT" name="insert" style='width:150px;height:35px;' >
</tr>
</table>
</form>
</div>
</center>
<?php include 'ftr.php'; ?>
</body>
</html>