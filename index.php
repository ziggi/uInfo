<?php

include "uinfo.class.php";

define("SITE_URL","http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
define("SITE_VERSION","1.1.0");

$user = new uInfo($_SERVER['HTTP_USER_AGENT']);

echo "<!DOCTYPE html>
<html>

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
	<meta name='description' content='Узнать IP адрес, браузер и ОС'>
	<meta name='keywords' content='ip адрес, узнать ip адрес, мой ip, мой браузер, моя ос, узнать браузер, узнать ОС'>
	<title>uInfo - Информация о вас</title>
	<link rel='stylesheet' type='text/css' href='style.css'> 
	<link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico'>
</head>

<body>
	<div class='info_table'>
		<div class='div_form'>
			<table>
				<tr>
					<td class='info_ip' colspan=2>".$user->host('ip')."</td>
				</tr>
				<tr>
					<td class='info_type'>Имя компьютера:</td>
					<td class='info_result'>".$user->host('name')."</td>
				</tr>
				<tr>
					<td class='info_type'>Операционная система:</td>
					<td class='info_result'>".$user->os('name')." ".$user->os('version')."</td>
				</tr>
				<tr>
					<td class='info_type'>Браузер:</td>
					<td class='info_result'>".$user->browser('name')." ".$user->browser('version')."</td>
				</tr>
			</table>
			
			<hr class='hr_0'>

			<div class='info_image'>
			<table>
				<tr>
					<td>
						<p class='p_center'><img src='".SITE_URL."image.jpg' alt='image_banner'></p>
						<hr class='hr_0'>
					</td>
				</tr>
				<tr>
					<td>
						<p class='p_center'>HTML Код:</p>
						<textarea onClick='select()'><img src='".SITE_URL."image.jpg'></textarea>
					</td>
				<tr>
					<td>
						<p class='p_center'>BB Код:</p>
						<textarea onClick='select()'>[img]".SITE_URL."image.jpg[/img]</textarea>
					</td>
				</tr>
			</table>
			</div>
		</div>
		<div id='footer'>
			<div class='text_a' style='text-align:left;float:left;'><a href='http://ziggi.org/category/developments/uInfo/' target='_blank'>v".SITE_VERSION."</a></div>
			<div class='text_a' style='text-align:right;float:right;'><a href='http://ziggi.org/' target='_blank'>ZiGGi</a></div>
		</div>
		
	</div>
</body>

</html>
";
?>
