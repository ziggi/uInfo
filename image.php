<?php

include "uinfo.class.php";

$user = new uInfo($_SERVER['HTTP_USER_AGENT']);

header("Content-type: image/jpeg");

$img = imagecreatefromjpeg("img/type1.jpg");

imagewritestring($img, 14, $user->host('ip'));
imagewritestring($img, 12, $user->host('name'));
imagewritestring($img, 12, $user->os('name')." ".$user->os('version'));
imagewritestring($img, 12, $user->browser('name')." ".$user->browser('version'));

imagejpeg($img, NULL, 100);
imagedestroy($img);

function imagewritestring($img, $font_size, $string)
{
	$color = imagecolorallocate($img, 180, 180, 180);
	static $y = 2;
	$y += $font_size + 4;
	$x = 20;
	imagettftext($img, $font_size, 0, $x, $y, $color, "fonts/consola.ttf", $string);
}
