<?php 
$im 	= ImageCreate(1750,850);  
$white 	= ImageColorAllocate($im,0xFF,0xFF,0xFF);  
$black 	= ImageColorAllocate($im,0x00,0x00,0x00);  
$grey 	= ImageColorAllocate($im,0xdd,0xdd,0xDD); 
$red   	= imagecolorallocate($im,255,0,0);
$blu   	= imagecolorallocate($im,10,10,255);

//$clsz = getimagesize("img/n9.png");

$nnn = 6;
$nns = "img/n".$nnn.".png";
$clsz = getimagesize($nns);
$clnn = imagecreatefrompng($nns);

imageresolution($im, 2000);
ImageFilledRectangle($im,50,50,1700,800,$grey);  
//imagepolarline($im,275,220,100,225,$red);
$x1 	= 0;
$y1 	= 230;

function polarx($x1,$len,$ang)
{
$polarx = $x1 + sin( deg2rad($ang) ) * $len;	
return $polarx;
}

function polary($y1,$len,$ang)
{
$polary = $y1 + cos( deg2rad($ang+180) ) * $len;
return $polary;
}

for ($nn = 0; $nn <= 5; $nn++)
{
$ang 	= 50;
$len 	= 65;
$blen   = 30;
$ang0  	= $ang+45;
$spd 	= 34;

$rw = 250;
$rh = 350;
$rx1 = 50+$nn*$rw;
$ry1 = 70;
$gap = 20;

$txt = "32.8";
//imagettftext($im, 24, 0, 100, 100, $red, 'arial.ttf', $txt);

$x1 = ($rx1+$gap)+($rw/2);

ImageFilledRectangle($im,$rx1+$gap,$ry1,$rx1+$rw,$ry1+$rh,$white);
imagearc($im, $x1, $y1, 30, 30,  0, 360, $red);

$x2 = polarx($x1,$len,$ang);
$y2 = polary($y1,$len,$ang);
$x3 = polarx($x2,$blen,$ang0);
$y3 = polary($y2,$blen,$ang0);

imagesetthickness($im, 2);
//imagecopy($im,$clnn,$x1,$y1,0,0,150,150);
//imagealphablending($im, false);
//imagesavealpha($im, true);

imagecopyresampled($im, $clnn, $x1-15, $y1-15, 0, 0, 30, 30,$clsz[0] ,$clsz[1]);
//imageline($im,$x1,$y1,$x2,$y2,$red);
imageline($im,polarx($x1,15,$ang),polary($y1,15,$ang),$x2,$y2,$red);

//imageline($im,$x1,$y1,polarx($x1,30,$ang),polary($y1,30,$ang),$white);

$sspd = $spd;
$lll = 0;
if ($spd > 7)
{
	while ($sspd > 2)
	{
		$x2 = polarx($x1,$len-$lll,$ang);
		$y2 = polary($y1,$len-$lll,$ang);
		$x3 = polarx($x2,$blen,$ang0);
		$y3 = polary($y2,$blen,$ang0);
		
		if ($sspd > 7 and $sspd <= 47)
		{
			imageline($im,$x2,$y2,polarx($x2,$blen,$ang0),polary($y2,$blen,$ang0),$red);
		}
		else
		{
			if ($sspd > 2 and $sspd <= 7)
			{
				imageline($im,$x2,$y2,polarx($x2,$blen-10,$ang0),polary($y2,$blen-10,$ang0),$red);
			}
			else
				{
				$lll = $lll+12;
				
				$values = array ($x2,  $y2, $x3,  $y3, polarx($x1,$len-$lll,$ang),polary($y1,$len-$lll,$ang));
				imagefilledpolygon($im, $values, 3, $blu);
				//imageline($im,$x2,$y2,polarx($x2,$blen,$ang0),polary($y2,$blen,$ang0),polarx($x1,$len-$lll,$ang),polarx($y1,$len-$lll,$ang)$blu);
				
				//imageline($im,$x2,$y2,polarx($x2,$blen,$ang0),polary($y2,$blen,$ang0),$blu);
				
				
				//imageline($im,polarx($x1,$len-$lll,$ang),polary($y1,$len-$lll,$ang),polarx($x2,$blen,$ang0),polary($y2,$blen,$ang0),$red);
				
				//imageline($im,polarx($x2,$blen,$ang0),polary($y2,$blen,$ang0),200,200,$blu);
				
				$sspd = $sspd-40;
				
				}
		}
		$lll = $lll+8;
		$sspd = $sspd-10;
	}
}
else
{
	$len = $len-30;
	imageline($im,$x2+($len-2-$lll),$y2+($len-2-$lll),$x3,$y3,$red);
}

//imageline($im,$x2,$y2,$x3,$y3,$red);

//imagesetthickness($image, 5);
//imagearc($image,  250,  250,  300,  300,  0, 360, $yellow);
//imagefilledarc($image, 250, 250, 300, 300, 0,0, $yellow, IMG_ARC_PIE);

//imagesetthickness($image, 25);
//imageline($image,250,250-150,250,250+150,$red);

}
header('Content-Type: image/png');  
ImagePNG($im);  
imagedestroy($im);

?>
