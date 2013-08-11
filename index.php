<?php

include "uinfo.class.php";

define("SITE_URL", "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
define("ENGINE_VERSION", "1.7");

$user = new uInfo($_SERVER["HTTP_USER_AGENT"]);

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="description" content="Узнать IP адрес, браузер и ОС">
	<meta name="keywords" content="ip адрес, узнать ip адрес, мой ip, мой браузер, моя ос, узнать браузер, узнать ОС">
	<meta name="viewport" content="width=device-width">
	<title>uInfo - Информация о вас</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div id="info">
	<span>uInfo v<?=ENGINE_VERSION?></span>
	<span><a href="https://github.com/ziggi/uInfo" target="_blank">GitHub</a></span>
	<span><a href="http://ziggi.org/" target="_blank">Home</a></span>
</div>

<div id="middle">
  <div id="content">
	<div id="text">
		<div id="ip"><?=$user->host("ip")?></div>
		<div id="list">
			<table>
				<tr><td>Computer name:</td><td><?=$user->host("name")?></td></tr>
				<tr><td>Operating system:</td><td><?=$user->os("name")." ".$user->os("version")?></td></tr>
				<tr><td>Browser:</td><td><?=$user->browser("name")." ".$user->browser("version")?></td></tr>
			</table>
		</div>
	</div>
	
	<div id="img">
		<div id="image">
			<img src="<?=SITE_URL?>image.jpg">
		</div>
		<div id="img_links">
			<div class="link">
				<div class="link_text">HTML code:</div>
				<textarea onClick="select()"><img src="<?=SITE_URL?>image.jpg"></textarea>
			</div>
			<div class="link">
				<div class="link_text">BB code:</div>
				<textarea onClick="select()">[BB]<?=SITE_URL?>image.jpg[/BB]</textarea>
			</div>
		</div>
	</div>
  </div>
</div>

</body>

</html>
