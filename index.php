<?php

include "uinfo.class.php";

define("SITE_URL","http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
define("ENGINE_VERSION","1.4");

$user = new uInfo($_SERVER["HTTP_USER_AGENT"]);

?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="description" content="Узнать IP адрес, браузер и ОС">
	<meta name="keywords" content="ip адрес, узнать ip адрес, мой ip, мой браузер, моя ос, узнать браузер, узнать ОС">
	<title>uInfo - Информация о вас</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link rel="stylesheet" type="text/css" href="zishell/style.css">
	<script type="text/javascript" src="jscripts/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="zishell/scripts.js"></script>
</head>

<body>
	<div id="zishell">
		<div class="menu">
			<div style="float:left"></div>
			<div style="float:right">
				<span>
					<a href="https://github.com/ziggi/uInfo" target="_blank">v<?=ENGINE_VERSION?></a>
					&nbsp;
					<a href="http://ziggi.org/" target="_blank">ziggi</a>
				</span>
			</div>
		</div>
	</div>
	<div class="div_form">
		<table>
			<tr>
				<td class="info_ip" colspan="2"><?=$user->host("ip")?></td>
			</tr>
			<tr>
				<td class="info_type">Имя компьютера:</td>
				<td class="info_result"><?=$user->host("name")?></td>
			</tr>
			<tr>
				<td class="info_type">Операционная система:</td>
				<td class="info_result"><?=$user->os("name")." ".$user->os("version")?></td>
			</tr>
			<tr>
				<td class="info_type">Браузер:</td>
				<td class="info_result"><?=$user->browser("name")." ".$user->browser("version")?></td>
			</tr>
		</table>
		
		<hr class="hr_0">
		
		<div class="info_image">
		<table>
			<tr>
				<td>
					<p class="p_center"><img src="<?=SITE_URL?>image.jpg" alt="image_banner"></p>
					<hr class="hr_0">
				</td>
			</tr>
			<tr>
				<td>
					<p class="p_center">HTML Код:</p>
					<textarea onClick="select()"><img src="<?=SITE_URL?>image.jpg"></textarea>
				</td>
			<tr>
				<td>
					<p class="p_center">BB Код:</p>
					<textarea onClick="select()">[img]<?=SITE_URL?>image.jpg[/img]</textarea>
				</td>
			</tr>
		</table>
		</div>
	</div>
</body>

</html>
