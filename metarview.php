<?php session_start(); 
date_default_timezone_set("Asia/Kolkata");
ob_start();
?>
<html>
<head>
<style>
#myCanvas1,#myCanvas2,#myCanvas3,#myCanvas4,#myCanvas5,#myCanvas6
{
border:1px solid #d3d3d3;
background:#f9fddb;
box-shadow: 2px 3px 2px rgba(27, 35, 38, 0.8);
}

#myCanvas7,#myCanvas8,#myCanvas9,#myCanvas10,#myCanvas11,#myCanvas12
{
border:1px solid #d3d3d3;
background:#c0f4f1;
box-shadow: 2px 3px 2px rgba(27, 35, 38, 0.8);
}

#tp1{
position:relative;margin:auto;
min-height:70px;
display:block;
background:#ddfac4;
box-shadow: 2px 3px 2px rgba(27, 35, 38, 0.8);
}

#ax1,#ax2{
position:relative;
margin:auto;
margin-top:5px;
}

#bx1{
position:relative;
margin:auto;
width:1355px;
}

#bx2{
position:relative;
margin:auto;
width:1355px;
}
</style>
</head>
<?php
$sutc = gmdate("H") *100;
$sdte = date("Y-m-d");
$conn = new mysqli("localhost", "root", "", "wx");
$can = 6;

$txtvis		=array();
$txtddd		=array();
$txtff		=array();
$txtwx		=array();
$txtcld1	=array();
$txtcld2	=array();
$txtcld3	=array();
$txtcld4	=array();
$txtn1		=array();
$txtn2		=array();
$txtn3		=array();
$txtn4		=array();
$txtclht1	=array();
$txtclht2	=array();
$txtclht3	=array();
$txtclht4	=array();
$txtnn		=array();
$txtttt		=array();
$txttdd		=array();
$txtqnh		=array();

if ($conn->connect_errno) 
{
    echo "Database connection failed. ".$conn->connect_error;
}
else
{
	for ($nn = 1; $nn <= 6; $nn++) 
	{
		$sql = "Select * from metar where dte = '$sdte' and  utc = '$sutc' ";
		// $sql = "Select * from metar where dte = '$txtddate' and utc = '$txtutc'";
		
		$result = $conn->query($sql);
		if ($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			//require_once('$txt$row.php'); 
			$txtvis[$nn] 	 =$row['vis'];
			$txtddd[$nn] 	 =$row['ddd'];
			$txtff[$nn] 	 =$row['ff'];
			$txtwx[$nn] 	 =$row['wx'];
			$txtcld1[$nn] 	 =$row['cld1'];
			$txtcld2[$nn] 	 =$row['cld2'];
			$txtcld3[$nn] 	 =$row['cld3'];
			$txtcld4[$nn] 	 =$row['cld4'];
			$txtn1[$nn] 	 =$row['n1'];
			$txtn2[$nn] 	 =$row['n2'];
			$txtn3[$nn] 	 =$row['n3'];
			$txtn4[$nn] 	 =$row['n4']; 
			$txtclht1[$nn] 	 =$row['clht1'];
			$txtclht2[$nn] 	 =$row['clht2'];
			$txtclht3[$nn] 	 =$row['clht3'];
			$txtclht4[$nn] 	 =$row['clht4'];
			$txtnn[$nn] 	 =$row['nn'];
			$txtttt[$nn] 	 =$row['ttt']; 
			$txttdd[$nn] 	 =$row['tdd'];
			$txtqnh[$nn] 	 =$row['qnh'];
			
			$txtvis[$nn+6] 	 =$row['visx'];
			$txtddd[$nn+6] 	 =$row['dddx'];
			$txtff[$nn+6] 	 =$row['ffx'];
			$txtwx[$nn+6] 	 =$row['wxx'];
			$txtcld1[$nn+6] 	 =$row['cldx1'];
			$txtcld2[$nn+6] 	 =$row['cldx2'];
			$txtcld3[$nn+6] 	 =$row['cldx3'];
			$txtcld4[$nn+6] 	 =$row['cldx4'];
			$txtn1[$nn+6] 	 =$row['nx1'];
			$txtn2[$nn+6] 	 =$row['nx2'];
			$txtn3[$nn+6] 	 =$row['nx3'];
			$txtn4[$nn+6] 	 =$row['nx4']; 
			$txtclht1[$nn+6] 	 =$row['clhtx1'];
			$txtclht2[$nn+6] 	 =$row['clhtx2'];
			$txtclht3[$nn+6] 	 =$row['clhtx3'];
			$txtclht4[$nn+6] 	 =$row['clhtx4'];
			$txtnn[$nn+6] 	 =$row['nnx'];
			$txtttt[$nn+6] 	 =$row['tttx']; 
			$txttdd[$nn+6] 	 =$row['tddx'];
			$txtqnh[$nn+6] 	 =$row['qnhx'];
		}
		else
		{
			$txtvis[$nn] 	 = 0;
			$txtddd[$nn] 	 = 0;
			$txtff[$nn] 	 = 0;
			$txtwx[$nn] 	 = 0;
			$txtcld1[$nn] 	 = 0;
			$txtcld2[$nn] 	 = 0;
			$txtcld3[$nn] 	 = 0;
			$txtcld4[$nn] 	 = 0;
			$txtn1[$nn] 	 = 0;
			$txtn2[$nn] 	 = 0;
			$txtn3[$nn] 	 = 0;
			$txtn4[$nn] 	 = 0; 
			$txtclht1[$nn] 	 = 0;
			$txtclht2[$nn] 	 = 0;
			$txtclht3[$nn] 	 = 0;
			$txtclht4[$nn] 	 = 0;
			$txtnn[$nn] 	 = 0;
			$txtttt[$nn] 	 = 0; 
			$txttdd[$nn] 	 = 0;
			$txtqnh[$nn] 	 = 0;
			
			$txtvis[$nn+6] 	= 0 ;
			$txtddd[$nn+6] 	= 0 ;
			$txtff[$nn+6] 	= 0 ;
			$txtwx[$nn+6] 	= 0 ;
			$txtcld1[$nn+6] = 0 ;
			$txtcld2[$nn+6] = 0 ;
			$txtcld3[$nn+6] = 0 ;
			$txtcld4[$nn+6] = 0 ;
			$txtn1[$nn+6] 	= 0 ;
			$txtn2[$nn+6] 	= 0 ;
			$txtn3[$nn+6] 	= 0 ;
			$txtn4[$nn+6] 	= 0 ;
			$txtclht1[$nn+6]= 0 ;
			$txtclht2[$nn+6]= 0 ;
			$txtclht3[$nn+6]= 0 ;
			$txtclht4[$nn+6]= 0 ;
			$txtnn[$nn+6] 	= 0 ;
			$txtttt[$nn+6] 	= 0 ;
			$txttdd[$nn+6] 	= 0 ;
			$txtqnh[$nn+6] 	= 0 ;
		}
	$sutc = $sutc - 100;
	}
}
?>

<div id = "tp1">
</div>

<div id = "ax1">
	<div id = "bx1">
	<canvas id="myCanvas6" width="220" height="320"></canvas>
	<canvas id="myCanvas5" width="220" height="320"></canvas>
	<canvas id="myCanvas4" width="220" height="320"></canvas>
	<canvas id="myCanvas3" width="220" height="320"></canvas>
	<canvas id="myCanvas2" width="220" height="320"></canvas>
	<canvas id="myCanvas1" width="220" height="320"></canvas>
	</div>
</div>

<div id = "ax2">
	<div id = "bx2">
	<canvas id="myCanvas12" width="220" height="320"></canvas>
	<canvas id="myCanvas11" width="220" height="320"></canvas>
	<canvas id="myCanvas10" width="220" height="320"></canvas>
	<canvas id="myCanvas9" width="220" height="320"></canvas>
	<canvas id="myCanvas8" width="220" height="320"></canvas>
	<canvas id="myCanvas7" width="220" height="320"></canvas>
	</div>
</div>

<script>
function wind(angl,spd,mycan){

	var c = document.getElementById(mycan);
	var ctx = c.getContext("2d");

	var x1 = 110;
	var y1 = 160;
	var length = 80
	bang = ((angl+50)-90)*Math.PI/180;
	angle = (angl-90)*Math.PI/180;
    ctx.moveTo(x1, y1);
	ctx.lineWidth=3;
    ctx.lineTo(x1 + length * Math.cos(angle), y1 + length * Math.sin(angle));
	ctx.stroke();
	
		if (spd > 7){
			var sspd = spd;
			var lll = 0;

			while (sspd>2){
				if (sspd > 7 && sspd <= 47){
				barb(x1 + (length-2-lll) * Math.cos(angle),y1 + (length-2-lll) * Math.sin(angle),30,bang);
				}
				else
				{
				if (sspd > 2 && sspd <= 7){
				barb(x1 + (length-2-lll) * Math.cos(angle),y1 + (length-2-lll) * Math.sin(angle),20,bang);
				}
				else {
				barb2(x1 + (length-2-lll) * Math.cos(angle),y1 + (length-2-lll) * Math.sin(angle),30,bang,angl);
				sspd = sspd-40;
				lll=lll+12;
				}
				}
				
				lll = lll+12;
				sspd = sspd-10;
				}
		}
		else
		{
			
			length= length-30;
			barb(x1 + (length) * Math.cos(angle),y1 + (length) * Math.sin(angle),30,bang);
			//barb2(x1 + (length) * Math.cos(angle),y1 + (length) * Math.sin(angle),30,bang,angl);
			
		}
		
		function barb(x2, y2, blen, bang) {
			ctx.moveTo(x2, y2);
			ctx.lineWidth=3;
			ctx.lineTo(x2 + blen * Math.cos(bang), y2 + blen * Math.sin(bang));
			ctx.stroke();
		}

			
		function barb2(x2, y2, blen, bang,angl) {
			ctx.fillStyle = '#f00';
			ctx.beginPath();
			x3 = x2 + blen * Math.cos(bang);
			y3 = y2 + blen * Math.sin(bang);
			bang = ((angl+210)-90)*Math.PI/180;
			blen = blen+16;
			x4 = x3 + blen * Math.cos(bang);
			y4 = y3 + blen * Math.sin(bang)
			ctx.moveTo(x2, y2);
			ctx.lineTo(x3, y3);
			ctx.lineTo(x4, y4);
			ctx.strokeStyle = "#000";
			ctx.closePath();
			ctx.fill();
			ctx.stroke();
		}
		
		ctx.stroke();
}

function wtext(txt,xx,yy,clr,mycan){
	var c = document.getElementById(mycan);
	var ctx = c.getContext("2d");
	ctx.font = "30px arial";
	ctx.fillStyle = clr;
	ctx.fillText(txt, xx, yy);
}

function wtexts(txt,xx,yy,clr,mycan){
	var c = document.getElementById(mycan);
	var ctx = c.getContext("2d");
	ctx.font = "16px arial";
	ctx.fillStyle = clr;
	ctx.fillText(txt, xx, yy);
}

function cldnn(nn,mycan){
	var c = document.getElementById(mycan);
	var ctx = c.getContext("2d");
	var img = 'img/n'+nn+'.png';
	var imageObj = new Image();
		  imageObj.onload = function() {
			ctx.drawImage(imageObj, 90, 140,40,40);
		  };
		imageObj.src = img;
}

function cldtype(nn,pos,mycan){
	var c = document.getElementById(mycan);
	var ctx = c.getContext("2d");
	var img = 'img/cl'+nn+'.png';
	var xx;
	var yy;
	var imageObj = new Image();
			switch(pos) {
			case 1:
				xx = 30;
				yy = 230;
				break;
			case 2:
				xx = 150;
				yy = 230;
				break;
			case 3:
				xx = 90;
				yy = 230;
				break;
			case 4:
				xx = 90;
				yy = 190;
				break;
			case 5:
				xx = 35;
				yy = 90;
				break;
			case 6:
				xx = 150;
				yy = 90;
				break;
			case 7:
				xx = 90;
				yy = 90;
				break;
			case 8:
				xx = 90;
				yy = 40;
				break;
			}

	imageObj.onload = function() {
			ctx.drawImage(imageObj,xx,yy,40,40);
		  };
		imageObj.src = img;
}

function wx(nn,mycan){
	var c = document.getElementById(mycan);
	var ctx = c.getContext("2d");
	var img = 'img/'+nn+'.png';
	var imageObj = new Image();
		  imageObj.onload = function() {
			ctx.drawImage(imageObj, 50,135,40,40);
		  };
		imageObj.src = img;
}

</script>

<script> 
var img = '';
var nn = 3;
var mycan ='';
var can = 1;
//var spd = 55;
//var ang = 90;
var kk = 1;

var vis 	= 0;	
var ddd		= 0;
var ff		= 0;
var wxn		= 0;
var cld1	= 0;
var cld2	= 0;
var cld3	= 0;
var cld4	= 0;
var n1		= 0;
var n2		= 0;
var n3		= 0;
var n4		= 0;
var clht1	= 0;
var clht2	= 0;
var clht3	= 0;
var clht4	= 0;
var nnn		= 0;
var ttt		= 0;
var tdd		= 0;
var qnh		= 0;

<?php $nn = 1; ?>
for (can = 1; can <= 12; can++) 
{
img = 'img/n'+nn+'.png';
mycan = 'myCanvas'+can;

var vis 	= 0;	
var ddd		= 0;
var ff		= 0;
var wxn		= 0;
var cld1	= 0;
var cld2	= 0;
var cld3	= 0;
var cld4	= 0;
var n1		= 0;
var n2		= 0;
var n3		= 0;
var n4		= 0;
var clht1	= 0;
var clht2	= 0;
var clht3	= 0;
var clht4	= 0;
var nnn		= 0;
var ttt		= 0;
var tdd		= 0;
var qnh		= 0;

switch(can){
case 1:
vis 	= <?php echo $txtvis[1]; 	?>;	
ddd		= <?php echo $txtddd[1]; 	?>;
ff		= <?php echo $txtff[1]; 	?>;
wxn		= <?php echo $txtwx[1]; 	?>;
cld1	= <?php echo $txtcld1[1];	?>;
cld2	= <?php echo $txtcld2[1];	?>;
cld3	= <?php echo $txtcld3[1];	?>;
cld4	= <?php echo $txtcld4[1];	?>;
n1		= <?php echo $txtn1[1];	?>;
n2		= <?php echo $txtn2[1];	?>;
n3		= <?php echo $txtn3[1];	?>;
n4		= <?php echo $txtn4[1];	?>;
clht1	= <?php echo $txtclht1[1];?>;
clht2	= <?php echo $txtclht2[1];?>;
clht3	= <?php echo $txtclht3[1];?>;
clht4	= <?php echo $txtclht4[1];?>;
nnn		= <?php echo $txtnn[1]; 	?>;
ttt		= <?php echo $txtttt[1]; 	?>;
tdd		= <?php echo $txttdd[1]; 	?>;
qnh		= <?php echo $txtqnh[1]; 	?>;
break;	
case 2:
vis 	= <?php echo $txtvis[2]; 	?>;	
ddd		= <?php echo $txtddd[2]; 	?>;
ff		= <?php echo $txtff[2]; 	?>;
wxn		= <?php echo $txtwx[2]; 	?>;
cld1	= <?php echo $txtcld1[2];	?>;
cld2	= <?php echo $txtcld2[2];	?>;
cld3	= <?php echo $txtcld3[2];	?>;
cld4	= <?php echo $txtcld4[2];	?>;
n1		= <?php echo $txtn1[2];	?>;
n2		= <?php echo $txtn2[2];	?>;
n3		= <?php echo $txtn3[2];	?>;
n4		= <?php echo $txtn4[2];	?>;
clht1	= <?php echo $txtclht1[2];?>;
clht2	= <?php echo $txtclht2[2];?>;
clht3	= <?php echo $txtclht3[2];?>;
clht4	= <?php echo $txtclht4[2];?>;
nnn		= <?php echo $txtnn[2]; 	?>;
ttt		= <?php echo $txtttt[2]; 	?>;
tdd		= <?php echo $txttdd[2]; 	?>;
qnh		= <?php echo $txtqnh[2]; 	?>;
break;
case 3:
vis 	= <?php echo $txtvis[3]; 	?>;	
ddd		= <?php echo $txtddd[3]; 	?>;
ff		= <?php echo $txtff[3]; 	?>;
wxn		= <?php echo $txtwx[3]; 	?>;
cld1	= <?php echo $txtcld1[3];	?>;
cld2	= <?php echo $txtcld2[3];	?>;
cld3	= <?php echo $txtcld3[3];	?>;
cld4	= <?php echo $txtcld4[3];	?>;
n1		= <?php echo $txtn1[3];	?>;
n2		= <?php echo $txtn2[3];	?>;
n3		= <?php echo $txtn3[3];	?>;
n4		= <?php echo $txtn4[3];	?>;
clht1	= <?php echo $txtclht1[3];?>;
clht2	= <?php echo $txtclht2[3];?>;
clht3	= <?php echo $txtclht3[3];?>;
clht4	= <?php echo $txtclht4[3];?>;
nnn		= <?php echo $txtnn[3]; 	?>;
ttt		= <?php echo $txtttt[3]; 	?>;
tdd		= <?php echo $txttdd[3]; 	?>;
qnh		= <?php echo $txtqnh[3]; 	?>;
break;
case 4:
vis 	= <?php echo $txtvis[4]; 	?>;	
ddd		= <?php echo $txtddd[4]; 	?>;
ff		= <?php echo $txtff[4]; 	?>;
wxn		= <?php echo $txtwx[4]; 	?>;
cld1	= <?php echo $txtcld1[4];	?>;
cld2	= <?php echo $txtcld2[4];	?>;
cld3	= <?php echo $txtcld3[4];	?>;
cld4	= <?php echo $txtcld4[4];	?>;
n1		= <?php echo $txtn1[4];	?>;
n2		= <?php echo $txtn2[4];	?>;
n3		= <?php echo $txtn3[4];	?>;
n4		= <?php echo $txtn4[4];	?>;
clht1	= <?php echo $txtclht1[4];?>;
clht2	= <?php echo $txtclht2[4];?>;
clht3	= <?php echo $txtclht3[4];?>;
clht4	= <?php echo $txtclht4[4];?>;
nnn		= <?php echo $txtnn[4]; 	?>;
ttt		= <?php echo $txtttt[4]; 	?>;
tdd		= <?php echo $txttdd[4]; 	?>;
qnh		= <?php echo $txtqnh[4]; 	?>;
break;
case 5:
vis 	= <?php echo $txtvis[5]; 	?>;	
ddd		= <?php echo $txtddd[5]; 	?>;
ff		= <?php echo $txtff[5]; 	?>;
wxn		= <?php echo $txtwx[5]; 	?>;
cld1	= <?php echo $txtcld1[5];	?>;
cld2	= <?php echo $txtcld2[5];	?>;
cld3	= <?php echo $txtcld3[5];	?>;
cld4	= <?php echo $txtcld4[5];	?>;
n1		= <?php echo $txtn1[5];	?>;
n2		= <?php echo $txtn2[5];	?>;
n3		= <?php echo $txtn3[5];	?>;
n4		= <?php echo $txtn4[5];	?>;
clht1	= <?php echo $txtclht1[5];?>;
clht2	= <?php echo $txtclht2[5];?>;
clht3	= <?php echo $txtclht3[5];?>;
clht4	= <?php echo $txtclht4[5];?>;
nnn		= <?php echo $txtnn[5]; 	?>;
ttt		= <?php echo $txtttt[5]; 	?>;
tdd		= <?php echo $txttdd[5]; 	?>;
qnh		= <?php echo $txtqnh[5]; 	?>;
break;
case 6:
vis 	= <?php echo $txtvis[6]; 	?>;	
ddd		= <?php echo $txtddd[6]; 	?>;
ff		= <?php echo $txtff[6]; 	?>;
wxn		= <?php echo $txtwx[6]; 	?>;
cld1	= <?php echo $txtcld1[6];	?>;
cld2	= <?php echo $txtcld2[6];	?>;
cld3	= <?php echo $txtcld3[6];	?>;
cld4	= <?php echo $txtcld4[6];	?>;
n1		= <?php echo $txtn1[6];	?>;
n2		= <?php echo $txtn2[6];	?>;
n3		= <?php echo $txtn3[6];	?>;
n4		= <?php echo $txtn4[6];	?>;
clht1	= <?php echo $txtclht1[6];?>;
clht2	= <?php echo $txtclht2[6];?>;
clht3	= <?php echo $txtclht3[6];?>;
clht4	= <?php echo $txtclht4[6];?>;
nnn		= <?php echo $txtnn[6]; 	?>;
ttt		= <?php echo $txtttt[6]; 	?>;
tdd		= <?php echo $txttdd[6]; 	?>;
qnh		= <?php echo $txtqnh[6]; 	?>;
break;
case 7:
vis 	= <?php echo $txtvis[7]; 	?>;	
ddd		= <?php echo $txtddd[7]; 	?>;
ff		= <?php echo $txtff[7]; 	?>;
wxn		= <?php echo $txtwx[7]; 	?>;
cld1	= <?php echo $txtcld1[7];	?>;
cld2	= <?php echo $txtcld2[7];	?>;
cld3	= <?php echo $txtcld3[7];	?>;
cld4	= <?php echo $txtcld4[7];	?>;
n1		= <?php echo $txtn1[7];	?>;
n2		= <?php echo $txtn2[7];	?>;
n3		= <?php echo $txtn3[7];	?>;
n4		= <?php echo $txtn4[7];	?>;
clht1	= <?php echo $txtclht1[7];?>;
clht2	= <?php echo $txtclht2[7];?>;
clht3	= <?php echo $txtclht3[7];?>;
clht4	= <?php echo $txtclht4[7];?>;
nnn		= <?php echo $txtnn[7]; 	?>;
ttt		= <?php echo $txtttt[7]; 	?>;
tdd		= <?php echo $txttdd[7]; 	?>;
qnh		= <?php echo $txtqnh[7]; 	?>;
break;
case 8:
vis 	= <?php echo $txtvis[8]; 	?>;	
ddd		= <?php echo $txtddd[8]; 	?>;
ff		= <?php echo $txtff[8]; 	?>;
wxn		= <?php echo $txtwx[8]; 	?>;
cld1	= <?php echo $txtcld1[8];	?>;
cld2	= <?php echo $txtcld2[8];	?>;
cld3	= <?php echo $txtcld3[8];	?>;
cld4	= <?php echo $txtcld4[8];	?>;
n1		= <?php echo $txtn1[8];	?>;
n2		= <?php echo $txtn2[8];	?>;
n3		= <?php echo $txtn3[8];	?>;
n4		= <?php echo $txtn4[8];	?>;
clht1	= <?php echo $txtclht1[8];?>;
clht2	= <?php echo $txtclht2[8];?>;
clht3	= <?php echo $txtclht3[8];?>;
clht4	= <?php echo $txtclht4[8];?>;
nnn		= <?php echo $txtnn[8]; 	?>;
ttt		= <?php echo $txtttt[8]; 	?>;
tdd		= <?php echo $txttdd[8]; 	?>;
qnh		= <?php echo $txtqnh[8]; 	?>;
break;
case 9:
vis 	= <?php echo $txtvis[9]; 	?>;	
ddd		= <?php echo $txtddd[9]; 	?>;
ff		= <?php echo $txtff[9]; 	?>;
wxn		= <?php echo $txtwx[9]; 	?>;
cld1	= <?php echo $txtcld1[9];	?>;
cld2	= <?php echo $txtcld2[9];	?>;
cld3	= <?php echo $txtcld3[9];	?>;
cld4	= <?php echo $txtcld4[9];	?>;
n1		= <?php echo $txtn1[9];	?>;
n2		= <?php echo $txtn2[9];	?>;
n3		= <?php echo $txtn3[9];	?>;
n4		= <?php echo $txtn4[9];	?>;
clht1	= <?php echo $txtclht1[9];?>;
clht2	= <?php echo $txtclht2[9];?>;
clht3	= <?php echo $txtclht3[9];?>;
clht4	= <?php echo $txtclht4[9];?>;
nnn		= <?php echo $txtnn[9]; 	?>;
ttt		= <?php echo $txtttt[9]; 	?>;
tdd		= <?php echo $txttdd[9]; 	?>;
qnh		= <?php echo $txtqnh[9]; 	?>;
break;
case 10:
vis 	= <?php echo $txtvis[10]; 	?>;	
ddd		= <?php echo $txtddd[10]; 	?>;
ff		= <?php echo $txtff[10]; 	?>;
wxn		= <?php echo $txtwx[10]; 	?>;
cld1	= <?php echo $txtcld1[10];	?>;
cld2	= <?php echo $txtcld2[10];	?>;
cld3	= <?php echo $txtcld3[10];	?>;
cld4	= <?php echo $txtcld4[10];	?>;
n1		= <?php echo $txtn1[10];	?>;
n2		= <?php echo $txtn2[10];	?>;
n3		= <?php echo $txtn3[10];	?>;
n4		= <?php echo $txtn4[10];	?>;
clht1	= <?php echo $txtclht1[10];?>;
clht2	= <?php echo $txtclht2[10];?>;
clht3	= <?php echo $txtclht3[10];?>;
clht4	= <?php echo $txtclht4[10];?>;
nnn		= <?php echo $txtnn[10]; 	?>;
ttt		= <?php echo $txtttt[10]; 	?>;
tdd		= <?php echo $txttdd[10]; 	?>;
qnh		= <?php echo $txtqnh[10]; 	?>;
break;
case 11:
vis 	= <?php echo $txtvis[11]; 	?>;	
ddd		= <?php echo $txtddd[11]; 	?>;
ff		= <?php echo $txtff[11]; 	?>;
wxn		= <?php echo $txtwx[11]; 	?>;
cld1	= <?php echo $txtcld1[11];	?>;
cld2	= <?php echo $txtcld2[11];	?>;
cld3	= <?php echo $txtcld3[11];	?>;
cld4	= <?php echo $txtcld4[11];	?>;
n1		= <?php echo $txtn1[11];	?>;
n2		= <?php echo $txtn2[11];	?>;
n3		= <?php echo $txtn3[11];	?>;
n4		= <?php echo $txtn4[11];	?>;
clht1	= <?php echo $txtclht1[11];?>;
clht2	= <?php echo $txtclht2[11];?>;
clht3	= <?php echo $txtclht3[11];?>;
clht4	= <?php echo $txtclht4[11];?>;
nnn		= <?php echo $txtnn[11]; 	?>;
ttt		= <?php echo $txtttt[11]; 	?>;
tdd		= <?php echo $txttdd[11]; 	?>;
qnh		= <?php echo $txtqnh[11]; 	?>;
break;
case 12:
vis 	= <?php echo $txtvis[12]; 	?>;	
ddd		= <?php echo $txtddd[12]; 	?>;
ff		= <?php echo $txtff[12]; 	?>;
wxn		= <?php echo $txtwx[12]; 	?>;
cld1	= <?php echo $txtcld1[12];	?>;
cld2	= <?php echo $txtcld2[12];	?>;
cld3	= <?php echo $txtcld3[12];	?>;
cld4	= <?php echo $txtcld4[12];	?>;
n1		= <?php echo $txtn1[12];	?>;
n2		= <?php echo $txtn2[12];	?>;
n3		= <?php echo $txtn3[12];	?>;
n4		= <?php echo $txtn4[12];	?>;
clht1	= <?php echo $txtclht1[12];?>;
clht2	= <?php echo $txtclht2[12];?>;
clht3	= <?php echo $txtclht3[12];?>;
clht4	= <?php echo $txtclht4[12];?>;
nnn		= <?php echo $txtnn[12]; 	?>;
ttt		= <?php echo $txtttt[12]; 	?>;
tdd		= <?php echo $txttdd[12]; 	?>;
qnh		= <?php echo $txtqnh[12]; 	?>;
break;
}

if (ff > 0) 
{
wind(ddd,ff,mycan);
}
//Dry
if (ttt>0){
wtext(ttt.toFixed(1),20,50,"blue",mycan);
}
if (tdd>0){
//Dewpoint
wtext(tdd.toFixed(1),20,80,"#c61f03",mycan);
}
if (vis>0){
//Visibility
wtext(vis,80,310,"#67310a",mycan);
}
wtexts("Max/Min",150,20,"#c70215",mycan);
//Max
wtext("36.2",150,50,"#c70215",mycan);
//Min
wtext("23.1",150,80,"#5d01d0",mycan);
//cld amt/ht

var clss = n1+"/"+clht1;
//wtexts("2/20",35,280,"#5d01d0",mycan);
wtexts(clss,35,280,"#5d01d0",mycan);

cldnn(nnn,mycan);

cldtype(cld1,1,mycan);
cldtype(cld2,2,mycan);
cldtype(cld3,3,mycan);
cldtype(cld4,4,mycan);

cldtype(cld1,5,mycan);
cldtype(cld2,6,mycan);
cldtype(cld3,7,mycan);
cldtype(cld4,8,mycan);

wx(wxn,mycan);

}
</script>

</html>

