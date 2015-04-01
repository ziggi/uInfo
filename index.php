<?php

include "uinfo.class.php";

$site = array(
	"uri" => "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"],
	"version" => "2.1",
	);

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
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<div id="info">
	<span>uInfo v<?php echo $site['version']; ?></span>
	<span><a href="https://github.com/ziggi/uInfo" target="_blank">GitHub</a></span>
	<span><a href="http://ziggi.org/" target="_blank">Home</a></span>
</div>

<div id="middle">
  <div id="content">
	<div id="text">
		<div id="ip"><?php echo $user->host->ip; ?></div>
		<div id="list">
			<table>
				<tr><td>Computer name:</td><td><?php echo $user->host->name; ?></td></tr>
				<tr><td>Operating system:</td><td><?php echo $user->os->name . " " . $user->os->version; ?></td></tr>
				<tr><td>Browser:</td><td><?php echo $user->browser->name . " " . $user->browser->version; ?></td></tr>
			</table>
		</div>
	</div>
	
	<div id="img">
		<div id="image">
			<img src="<?php echo $site['uri']; ?>image.jpg">
		</div>
		<div id="img_links">
			<div class="link">
				<div class="link_text">HTML code:</div>
				<textarea onClick="select()"><img src="<?php echo $site['uri']; ?>image.jpg"></textarea>
			</div>
			<div class="link">
				<div class="link_text">BB code:</div>
				<textarea onClick="select()">[img]<?php echo $site['uri']; ?>image.jpg[/img]</textarea>
			</div>
		</div>
	</div>
  </div>
</div>

</body>

</html>
