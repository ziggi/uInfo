<?php

include "uinfo.class.php";

define("SITE_URL","http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
define("ENGINE_VERSION","1.6");

$user = new uInfo($_SERVER["HTTP_USER_AGENT"]);

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="description" content="Узнать IP адрес, браузер и ОС">
	<meta name="keywords" content="ip адрес, узнать ip адрес, мой ip, мой браузер, моя ос, узнать браузер, узнать ОС">
	<title>uInfo - Информация о вас</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="zishell/style.css">
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

<div id="middle">
	<div id="text">
		<div id="ip"><?=$user->host("ip")?></div>
		<div id="list">
			<table>
				<tr><td>Имя компьютера:</td><td><?=$user->host("name")?></td></tr>
				<tr><td>Операционная система:</td><td><?=$user->os("name")." ".$user->os("version")?></td></tr>
				<tr><td>Браузер:</td><td><?=$user->browser("name")." ".$user->browser("version")?></td></tr>
			</table>
		</div>
	</div>
	
	<div id="img">
		<div id="image">
			<img src="<?=SITE_URL?>image.jpg">
		</div>
		<div id="img_links">
			<div class="link">
				<div class="link_text">HTML код:</div>
				<textarea onClick="select()"><img src="<?=SITE_URL?>image.jpg"></textarea>
			</div>
			<div class="link">
				<div class="link_text">BB код:</div>
				<textarea onClick="select()">[BB]<?=SITE_URL?>image.jpg[/BB]</textarea>
			</div>
		</div>
	</div>
</div>

</body>

</html>
