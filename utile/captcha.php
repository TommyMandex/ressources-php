<?php
session_start();
$_SESSION['captcha'] = mt_rand(100000,999999);
$img = imagecreate(75, 30);
$font = '../assets/fonts/28DaysLater.ttf';

$bg = imagecolorallocate($img, 250, 250, 250);
$textcolor = imagecolorallocate($img, 0, 0, 0);

imagettftext($img, 16, 0, 3, 25, $textcolor, $font, $_SESSION['captcha']);
header('Content-type:image/jpeg');
imagejpeg($img);
imagedestroy($img);
?>
