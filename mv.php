<?php session_start(); 
date_default_timezone_set("Asia/Kolkata");
ob_start();
?>

<?php
$sutc = gmdate("h") *100;
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
		}
	$sutc = $sutc - 100;
	}
}










?>

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
				if (sspd > 7 && sspd <= 47)
				{
				barb(x1 + (length-2-lll) * Math.cos(angle),y1 + (length-2-lll) * Math.sin(angle),30,bang);
				}
				else
				{
				if (sspd > 2 && sspd <= 7){
				barb(x1 + (length-2-lll) * Math.cos(angle),y1 + (length-2-lll) * Math.sin(angle),20,bang);
				}
				else 
				{
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
var spd = 55;
var ang = 90;
var kk = 1;

var vis 	= <?php echo $txtvis[1]; 	?>;	
var ddd		= <?php echo $txtddd[1]; 	?>;
var ff		= <?php echo $txtff[1]; 	?>;
var wxn		= <?php echo $txtwx[1]; 	?>;
var cld1	= <?php echo $txtcld1[1];	?>;
var cld2	= <?php echo $txtcld2[1];	?>;
var cld3	= <?php echo $txtcld3[1];	?>;
var cld4	= <?php echo $txtcld4[1];	?>;
var n1		= <?php echo $txtn1[1];		?>;
var n2		= <?php echo $txtn2[1];		?>;
var n3		= <?php echo $txtn3[1];		?>;
var n4		= <?php echo $txtn4[1];		?>;
var clht1	= <?php echo $txtclht1[1]; 	?>;
var clht2	= <?php echo $txtclht2[1]; 	?>;
var clht3	= <?php echo $txtclht3[1]; 	?>;
var clht4	= <?php echo $txtclht4[1]; 	?>;
var nnn		= <?php echo $txtnn[1]; 	?>;
var ttt		= <?php echo $txtttt[1]; 	?>;
var tdd		= <?php echo $txttdd[1]; 	?>;
var qnh		= <?php echo $txtqnh[1]; 	?>;

for (can = 1; can <= 12; can++) {
img = 'img/n'+nn+'.png';
mycan = 'myCanvas'+can;
if (spd > 0) 
{
wind(ddd,ff,mycan);
}
//Dry
wtext(ttt,20,50,"blue",mycan);
//Dewpoint
wtext(tdd,20,80,"#c61f03",mycan);
//Visibility
wtext(vis,80,310,"#67310a",mycan);

wtexts("Max/Min",150,20,"#c70215",mycan);
//Max
wtext("36.2",150,50,"#c70215",mycan);
//Min
wtext("23.1",150,80,"#5d01d0",mycan);
//cld amt/ht

var clss = n1+"/"+clht1;
//wtexts("2/20",35,280,"#5d01d0",mycan);
wtexts(clss,35,280,"#5d01d0",mycan);
cldnn(nn,mycan);

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


