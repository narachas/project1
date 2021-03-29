<?php
// example2.php
// set the HTTP header type to PNG
header("Content-type: image/png"); 
// set the width and height of the new image in pixels
$width = 350;
$height = 360;
 
// create a pointer to a new true colour image
$im = ImageCreateTrueColor($width, $height); 
$im2 = ImageCreateTrueColor($width, $height); 
 
// switch on image antialising if it is available
ImageAntiAlias($im, true);
ImageAntiAlias($im2, true);
 
// sets background to white
$white = ImageColorAllocate($im, 255, 255, 255); 
ImageFillToBorder($im, 0, 0, $white, $white);
ImageFillToBorder($im, 0, 0, $white, $white);
 
// define a black colour
$black = ImageColorAllocate($im, 0, 0, 0);
 
// make a new line and add it to the image
ImageLine($im, 10, 10, 250, 300, $black);

ImageLine($im2, 250, 100, 25, 30, $black);
 
// add another line, this time a dashed line!
ImageDashedLine($im, 30, 10, 280, 300, $black);
 
ImageFillToBorder($im, 0, 0, $white, $white);
 
// define black and blue colours
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
 
// define the dimensions of our rectangle
$r_width = 150;
$r_height = 100;
$r_x = 100;
$r_y = 50;
 
ImageRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $black);
 
 ImageLine($im, 50, 305, 200, 100, $blue);
 
// define the dimensions of our filled rectangle
$r_width = 150;
$r_height = 100;
$r_x = 100;
$r_y = 200;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $blue);
 
 
// send the new PNG image to the browser
ImagePNG($im); 
ImagePNG($im2);

// destroy the reference pointer to the image in memory to free up resources
ImageDestroy($im); 
ImageDestroy($im2); 
?>