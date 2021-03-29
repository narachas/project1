<?php session_start(); 
date_default_timezone_set("Asia/Kolkata");
ob_start();
?>
<html>
<head>

<style>
body{background:#bce2e5;background:url('g11.jpg');background-repeat:repeat;}
#ax{
position:relative;margin:auto;
top:30px;width:850px;height:500px;
background:#eaecdc;
border-radius:4px;
background:#ebf2d7;
box-shadow: 2px 3px 5px rgba(27, 35, 38, 0.8);

}

#bx{
position:relative;margin:auto;
padding-top:30px;
text-align:center;
}
#ab{
position:relative;margin:auto;
width:200px;
min-height:120px;
display:inline;
float:right;
margin-right:40px;
margin-top:60px;

}
#aa{
position:relative;
width:400px;
min-height:120px;
display:inline;
float:left;
margin-left:30px;
margin-top:30px;
}
/* Begin Side menu Styling */
   	#smn {font:24px arial,sans-serif;width:370px;position:relative;left:2px;text-align:left;float:left;padding:10px;}
	#smn ul {margin:0px; padding:0px;}
	#smn li {list-style: none;} 
	#smn a {color: #163875; padding-left:15px; display:block; height:70px; line-height: 65px; text-indent: 1px; text-decoration:none; margin:2px;}
	#smn a:hover{background:#a80597; position: relative;margin:2px;color:#fff;box-shadow: 0 1px 3px rgba(27, 35, 38, 0.9);}
	#smn li.sel a {background:#069; position: relative;margin:2px;color:#fff;box-shadow: 0 1px 3px rgba(27, 35, 38, 0.9);}
/* End Side menu Styling */
/* Clock style */
#wrap {
position: relative;
width: 220px;
height: 35px;
background: url(black.png);

text-align: left;
overflow: hidden;
}
#wrap img.time {
float: left;
}
#wrap #cover {
position: absolute;
top: 0;
left: 0;
width: 220px;
height: 35px;
background: url(fade.png) repeat-x;
}
</style>
<script src="jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    $('#wrap').animate({opacity: 0.0}, 0);
    function middle(){
      wrapTop = ($(window).height() - $('#wrap').height())/2;
      wrapLeft = ($(window).width() - $('#wrap').width())/2;
      $('#wrap').animate({marginTop: wrapTop, marginLeft: wrapLeft}, 125);
    };
     //middle(); //Position clock at centre of wrap div //
    $(window).bind('resize', middle);
    function checktime(prevhour,prevmins,prevsecs){
		var now = new Date();
		var hour = now.getHours();
		if(hour < 10) hour = "0" + hour;
			var mins = now.getMinutes();
		if(mins < 10) mins = "0" + mins;
			var secs = now.getSeconds();
		if(secs < 10) secs = "0" + secs;  
			var hour = hour + "";
			var mins = mins + "";
			var secs = secs + "";

		if(prevhour != hour) {
			var prevhour = prevhour + ""
			var hoursplit = hour.split("");
			var prevhoursplit = prevhour.split("");
			if(prevhoursplit[0] != hoursplit[0]) numberflip('#hourl',hoursplit[0]);
			if(prevhoursplit[1] != hoursplit[1]) numberflip('#hourr',hoursplit[1]);
		};

		if(prevmins != mins) {
			var prevmins = prevmins + ""
			var minsplit = mins.split("");
			var prevminsplit = prevmins.split("");
			if(prevminsplit[0] != minsplit[0]) numberflip('#minl',minsplit[0]);
			if(prevminsplit[1] != minsplit[1]) numberflip('#minr',minsplit[1]);
		};

		if(prevsecs != secs) {
			var prevsecs = prevsecs + ""
			var secsplit = secs.split("");
			var prevsecsplit = prevsecs.split("");
			if(prevsecsplit[0] != secsplit[0]) numberflip('#secl',secsplit[0]);
			if(prevsecsplit[1] != secsplit[1]) numberflip('#secr',secsplit[1]);
		};

		function numberflip(which,number){
			if(number != 0) $(which).animate({marginTop: '-'+parseInt((number*35),10)+'px'},125, 'linear');
			if(number == 0) {
				var getmargin = parseInt(($(which).css('margin-top')), 10);
				$(which).animate({marginTop: parseInt((getmargin-35),10)+'px'}, 125, 'linear', function(){
                $(this).css("margin-top","0px")
				});

			};

		};

		setTimeout(function(){checktime(hour,mins,secs);}, 200);

	};

    checktime(00,00,00);
    $('#wrap').animate({opacity: 1.0}, 1000);
  });
  
  function closeWin()
{
open(location, '_self').close();
}
</script>
</head>
<body>
<center>
<div id='ax'>
	<div id='bx'>
	<span style='font:30px Impact;color:#a80597'>METAR Entry</span><br>
	<span style='font:14px arial ;'>Cyclone Warning Centre, Visakhapatnam</span>
	</div>
	<div id='aa'>
		<div id='smn'>
			<li><a href="metarentry.php">Enter METAR</a></li>
			<li><a href="metarview.php">View METARS</a></li>
		</div>
	</div>
	<div id='ab'>
		<div id="wrap"> 
			<img id="hourl" class="time" src="nums2.png" /> <img id="hourr" class="time" src="nums10.png" /> <img class="time" src="colon.png" /> <img id="minl" class="time" src="nums6.png" /> <img id="minr" class="time" src="nums10.png" /> <img class="time" src="colon.png" /> <img id="secl" class="time" src="nums6.png" /> <img id="secr" class="time" src="nums10.png" />
			<div style="clear:left;"> </div>
			<div id="cover"></div>
		</div>
	</div>

</div>
</center>
<?php include 'ftr.php'; ?>
</body>
</html>