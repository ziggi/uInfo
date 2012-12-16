<?php

include "uinfo.class.php";

$user = new uInfo($_SERVER['HTTP_USER_AGENT']);
$img = "images/type0.jpeg";

$pic = ImageCreateFromjpeg($img);
header("Content-type: image/jpeg");

$image_width = ImageSX($pic);
$color = ImageColorAllocate($pic, 180, 180, 180);
$color_shadow = ImageColorAllocate($pic, 100, 100, 100);
$font = "fonts/verdana.ttf";

// IP
$text = $user->host('ip');
$h = 18;
$w = get_center_text_pos($image_width, 10, $text);
set_image_text($pic, 14, 0, $w, $h, $color_shadow, $color, $font, $text);

// host
$text = $user->host('name');
$w = get_center_text_pos($image_width, 10, $text);
$h += 8 + 4;
set_image_text($pic, 8, 0, $w, $h, $color_shadow, $color, $font, $text);

// OS
$text = $user->os('name')." ".$user->os('version');
$w = get_center_text_pos($image_width, 10, $text);
$h += 10 + 3;
set_image_text($pic, 10, 0, $w, $h, $color_shadow, $color, $font, $text);

// Browser
$text = $user->browser('name')." ".$user->browser('version');
$w = get_center_text_pos($image_width, 10, $text);
$h += 10 + 2;
set_image_text($pic, 10, 0, $w, $h, $color_shadow, $color, $font, $text);


Imagejpeg($pic);
ImageDestroy($pic);


function set_image_text($pic,$size,$angle,$weight,$height,$color_shadow,$color,$font,$text)
{
	ImageTTFtext($pic, $size, $angle, $weight + 1, $height + 1, $color_shadow, $font, $text);
	ImageTTFtext($pic, $size, $angle, $weight, $height, $color, $font, $text);
}

function get_center_text_pos($img_weight,$text_size,$text)
{
	return (($img_weight / 2) - (strlen($text) * ($text_size / 3)));
}
?>
