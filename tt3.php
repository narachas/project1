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
<div id = "tp1">
</div>

<div id = "ax1">
	<div id = "bx1">
	<canvas id="myCanvas1" width="220" height="320"></canvas>
	<canvas id="myCanvas2" width="220" height="320"></canvas>
	<canvas id="myCanvas3" width="220" height="320"></canvas>
	<canvas id="myCanvas4" width="220" height="320"></canvas>
	<canvas id="myCanvas5" width="220" height="320"></canvas>
	<canvas id="myCanvas6" width="220" height="320"></canvas>
	</div>
</div>

<div id = "ax2">
	<div id = "bx2">
	<canvas id="myCanvas7" width="220" height="320"></canvas>
	<canvas id="myCanvas8" width="220" height="320"></canvas>
	<canvas id="myCanvas9" width="220" height="320"></canvas>
	<canvas id="myCanvas10" width="220" height="320"></canvas>
	<canvas id="myCanvas11" width="220" height="320"></canvas>
	<canvas id="myCanvas12" width="220" height="320"></canvas>
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
var spd = 55;
var ang = 90;
for (can = 1; can <= 12; can++) {
img = 'img/n'+nn+'.png';
mycan = 'myCanvas'+can;
if (spd > 0) 
{
wind(ang,spd,mycan);
}
//Dry
wtext("32",20,50,"blue",mycan);
//Dewpoint
wtext("28",20,80,"#c61f03",mycan);
//Visibility
wtext("8000",80,310,"#67310a",mycan);
//Max
wtext("36.2",150,50,"#c70215",mycan);
//Min
wtext("23.1",150,80,"#5d01d0",mycan);
//cld amt/ht
wtexts("2/20",35,280,"#5d01d0",mycan);
cldnn(nn,mycan);


cldtype(1,1,mycan);
cldtype(3,2,mycan);
cldtype(1,3,mycan);
cldtype(3,4,mycan);
cldtype(1,5,mycan);
cldtype(3,6,mycan);
cldtype(1,7,mycan);
cldtype(3,8,mycan);



wx(17,mycan);

}
</script>

</html>

