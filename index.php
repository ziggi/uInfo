<?php

include "uinfo.class.php";

$site = array(
	"uri" => "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"],
	"version" => "2.2",
	);

$user = new uInfo($_SERVER["HTTP_USER_AGENT"], $_SERVER["REMOTE_ADDR"]);

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="description" content="Узнать IP адрес, браузер и ОС">
	<meta name="keywords" content="ip адрес, узнать ip адрес, мой ip, мой браузер, моя ос, узнать браузер, узнать ОС">
	<meta name="viewport" content="width=device-width">
	<title></title>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
</head>

<body>

<div id="info">
	<span data-i18n="app.fullname"><?php echo $site['version']; ?></span>
	<span><a href="https://github.com/ziggi/uInfo" target="_blank" data-i18n="app.github"></a></span>
	<span><a href="http://ziggi.org/" target="_blank" data-i18n="app.home"></a></span>
</div>

<div id="middle">
  <div id="content">
	<div id="text">
		<div id="ip"><?php echo $user->host->ip; ?></div>
		<div id="list">
			<table>
				<tr><td data-i18n="info.computer_name"></td><td><?php echo $user->host->name; ?></td></tr>
				<tr><td data-i18n="info.os"></td><td><?php echo $user->os->name . " " . $user->os->version; ?></td></tr>
				<tr><td data-i18n="info.browser"></td><td><?php echo $user->browser->name . " " . $user->browser->version; ?></td></tr>
				<tr><td data-i18n="info.city"></td><td><?php echo $user->host->city; ?></td></tr>
				<tr><td data-i18n="info.region"></td><td><?php echo $user->host->region; ?></td></tr>
				<tr><td data-i18n="info.country"></td><td><?php echo $user->host->country; ?></td></tr>
				<tr><td data-i18n="info.location"></td><td><?php echo $user->host->loc; ?></td></tr>
				<tr><td data-i18n="info.organization"></td><td><?php echo $user->host->org; ?></td></tr>
			</table>
		</div>
	</div>
	
	<div id="img">
		<div id="image">
			<img src="<?php echo $site['uri']; ?>image.jpg">
		</div>
		<div id="img_links">
			<div class="link">
				<div class="link_text" data-i18n="app.htmlcode"></div>
				<textarea onClick="select()"><img src="<?php echo $site['uri']; ?>image.jpg"></textarea>
			</div>
			<div class="link">
				<div class="link_text" data-i18n="app.bbcode"></div>
				<textarea onClick="select()">[img]<?php echo $site['uri']; ?>image.jpg[/img]</textarea>
			</div>
		</div>
	</div>
  </div>
</div>

<link rel="stylesheet" type="text/css" href="css/style.css">

<script src="js/i18next-1.8.0.min.js"></script>
<script src="js/init.js"></script>

</body>

</html>
