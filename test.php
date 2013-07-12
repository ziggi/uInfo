<?php
include "uinfo.class.php";

$handle = fopen(__DIR__ . "/for_test.txt", "r");

if (!$handle) {
	exit;
}

$line = 1;
while (($string = fgets($handle)) !== false) {
	$user = new uInfo($string);

	echo "String: $line<br>";
	echo "OS: " . $user->os("name")." ".$user->os("version") . "<br>";
	echo "BR: " . $user->browser("name")." ".$user->browser("version") . "<br><br>";
	$line++;
}

fclose($handle);