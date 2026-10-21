<?php

include "uinfo.class.php";

$user = new uInfo(
	isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "",
	isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : null
);

header("Content-type: image/jpeg");

$img = imagecreatefromjpeg("img/type1.jpg");

imagewritestring($img, 14, $user->host->ip);
imagewritestring($img, 12, $user->host->city);
imagewritestring($img, 12, $user->os->name . " " . $user->os->version);
imagewritestring($img, 12, $user->browser->name . " " . $user->browser->version);

imagejpeg($img, NULL, 100);

function imagewritestring($img, $font_size, $string)
{
	$color = imagecolorallocate($img, 180, 180, 180);
	static $y = 2;
	$y += $font_size + 4;
	$x = 20;
	imagettftext($img, $font_size, 0, $x, $y, $color, __DIR__ . "/fonts/consola.ttf", (string)$string);
}
