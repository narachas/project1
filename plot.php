<html>

<script>
function drawline(ang,mycan,img){
var c = document.getElementById(mycan);
var ctx = c.getContext("2d");
var imageObj = new Image();
    imageObj.onload = function() 
	{ context.drawImage(imageObj, x, y, width, height);
    };
imageObj.src = img;
lineAtAngle(50, 50, 50, ang);
function lineAtAngle(x1, y1, length, angle) {
angle = (angle-90)*Math.PI/180;
    ctx.moveTo(x1, y1);
    ctx.lineTo(x1 + length * Math.cos(angle), y1 + length * Math.sin(angle));
}
ctx.stroke();
}

</script>

<?php

$txtddate = date("Y-m-d");
showdata($txtddate);

function showdata($txtddate)
{
	
	mysql_connect("localhost","root","");
	mysql_select_db("wx");
	$con=mysqli_connect("localhost","root","","wx");
	$sql="Select * from metar order by utc desc";
	echo "<center><div id='bx'><table width='100%' border='1' style='border-collapse:collapse;text-align:center;font:16px arial;'>";
	$result=mysqli_query($con,$sql);
	if (mysqli_num_rows($result)==0)
		{
			echo "<tr height='50'><td align='center'><img src='ex.png' height='70'></td><td style='color:#081a60;'>No records found ...</td><tr>";
		}
	else
		{
			echo "<tr height='40' valign='middle'"."style='background:#02498c;color:#fff;'>";
			echo "<td>Date</td>";
			echo "<td>Indexno</td>";
			echo "<td>UTC</td>";
			echo "<td width='67%' align='left' style='padding-left:20px;'>Synop</td>";
			echo "<td width='5%'>H-Max</td>";
			echo "<td width='5%'>L-Min</td>";
			echo "</tr>";
			$nn = 0;
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
					
					echo "<tr height='40' valign='top'"."style='background:".";font:15px arial;'>";
					echo "<td>".$row['dte']."</td>";
					echo "<td>".$row['utc']."</td>";
					
					
					
					
					//echo '<td><img id="cld" src="img/n'.$row['nn'].'.png" height=50>';
					$img = 'img/n'.$row['nn'].'.png';
					//$mycan = "mycan".$row['dte'].$row['utc'];
					echo '<canvas id="'.$nn.'"width="100" height="100" style="border:1px solid #d3d3d3;"></canvas><script>drawline('.$row['ddd'].','.$nn.','.$img.');</script></td>';
					//echo '<canvas id="myCanvas'.$row['dte'].$row['utc'].' " width="100" height="100" style="border:1px solid #d3d3d3;"></canvas><script>lineAtAngle(50, 50, 50,'.$row['ddd'].')</script></td>';
					//echo '<td><img src="img/n'.$row['nn'].'.png" height=50></td>';//
					echo "<td>".$row['ttt']."</td>";
					echo "</tr>";
					echo "";
					$nn++;
					}
			echo "</table></div></center>";
			}
}



?>



</html>

