<?php
header("Content-type: image/jpeg");
$imgPath = 'imag1.jpg';
$image = imagecreatefromjpeg($imgPath);
$color = imagecolorallocate($image, 255, 255, 255);
$string = "Lavanya boobs";
$fontSize = 30;
$x = 115;
$y = 185;
imagestring($image, $fontSize, $x, $y, $string, $color);
imagejpeg($image);

//header('Content-type: image/jpeg');
//$jpg_image = imagecreatefromjpeg('imag1.jpg');
//$white = imagecolorallocate($jpg_image, 255, 255, 255);
//$font_path = 'arial.ttf';
//$text = "This is a sunset!";
//imagettftext($jpg_image, 25, 0, 75, 300, $white, $font_path, $text);
//imagejpeg($jpg_image);
//imagedestroy($jpg_image);
?>
