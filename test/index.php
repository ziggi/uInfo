<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<style>
		table {
			border-collapse: collapse;
		}
		table td {
			padding: 5px;
			border: 1px solid grey;
		}
		table thead {
			background-color: #dedede;
		}
		table tbody td:first-child {
			background-color: #eee;
		}
		table tbody td:nth-child(2) {
			background-color: #ffdddd;
		}
		table tbody td:nth-child(3) {
			background-color: #ddffdd;
		}
	</style>
</head>

<body>

<?php

include "test.class.php";

$test = new Test();
$test->add(
	"Mozilla/5.0 (iPad; CPU OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) CriOS/27.0.1453.10 Mobile/10B329 Safari/8536.25",
	"iOS(iPad)",
	"6.1.3",
	"Google Chrome",
	"27.0.1453.10"
);

$test->add(
	"Mozilla/5.0 (iPad; CPU OS 6_1_3 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10B329 Safari/8536.25",
	"iOS(iPad)",
	"6.1.3",
	"Safari",
	"8536.25"
);

$test->add(
	"Mozilla/5.0(iPad; U;CPU OS 6_1 like Mac OS X; zh-CN; iPad3,3) AppleWebKit/534.46 (KHTML, like Gecko) UCBrowser/2.0.0.164 U3/0.8.0 Safari/7543.48.3",
	"iOS(iPad)",
	"6.1",
	"UC Browser",
	"2.0.0.164"
);

$test->add(
	"Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3) AppleWebKit/534.31 (KHTML, like Gecko) Chrome/17.0.558.0 Safari/534.31 UCBrowser/2.3.2.300",
	"OS X",
	"10.6.3",
	"UC Browser",
	"2.3.2.300"
);

$test->add(
	"Mozilla/5.0 (Linux; Android 4.2.2; Nexus 7 Build/JDQ39) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.64 Safari/537.36",
	"Android",
	"4.2.2",
	"Google Chrome",
	"28.0.1500.64"
);

$test->add(
	"Mozilla/5.0 (Android; Tablet; rv:22.0) Gecko/22.0 Firefox/22.0",
	"Android",
	"",
	"Mozilla Firefox",
	"22.0"
);

$test->add(
	"Mozilla/5.0 (X11; Linux x86_64; rv:22.0) Gecko/20100101 Firefox/22.0",
	"GNU/Linux",
	"",
	"Mozilla Firefox",
	"22.0"
);

$test->add(
	"Opera/9.80 (X11; Linux x86_64) Presto/2.12.388 Version/12.16",
	"GNU/Linux",
	"",
	"Opera",
	"12.16"
);

$test->add(
	"Opera/9.80 (Android 4.2.2; Linux; Opera Tablet/ADR-1306261156) Presto/2.11.355 Version/12.10",
	"Android",
	"4.2.2",
	"Opera",
	"12.10"
);

$test->add(
	"Opera/9.80 (Android; Opera Mini/7.5.33361/30.3442; U; ru) Presto/2.8.119 Version/11.10",
	"Android",
	"",
	"Opera Mini",
	"11.10"
);

$test->add(
	"Mozilla/5.0 (Linux; Android 4.2.2; Nexus 7 Build/JDQ39) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.63 Safari/537.36 OPR/15.0.1162.60140",
	"Android",
	"4.2.2",
	"Opera",
	"15.0.1162.60140"
);

$test->add(
	"Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36",
	"Windows",
	"XP",
	"Google Chrome",
	"28.0.1500.71"
);

$test->add(
	"Opera/9.80 (Windows NT 5.1; MRA 6.0 (build 6011)) Presto/2.12.388 Version/12.16",
	"Windows",
	"XP",
	"Opera",
	"12.16"
);

$test->add(
	"Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0",
	"Windows",
	"XP",
	"Mozilla Firefox",
	"22.0"
);

$test->add(
	"Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:14.0; ips-agent) Gecko/20100101 Firefox/14.0.1",
	"Ubuntu",
	"",
	"Mozilla Firefox",
	"14.0.1"
);

$test->add(
	"Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_1 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8B117 Safari/6531.22.7 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)",
	"iOS(iPhone)",
	"4.1",
	"Safari",
	"6531.22.7"
);

$test->add(
	"Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3",
	"iOS(iPhone)",
	"5.0",
	"Safari",
	"7534.48.3"
);

$test->add(
	"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36",
	"Windows",
	"7",
	"Google Chrome",
	"27.0.1453.110"
);

$test->add(
	"Mozilla/5.0 (Linux; U; Android 2.3.7; ru-ru; Liquid MT Build/GRK39F; CyanogenMod-7.1.0) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1",
	"Android",
	"2.3.7",
	"Safari",
	"533.1"
);

$test->add(
	"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/536.30.1 (KHTML, like Gecko) Version/6.0.5 Safari/536.30.1",
	"OS X",
	"10.8.4",
	"Safari",
	"536.30.1"
);

$test->add(
	"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36",
	"GNU/Linux",
	"",
	"Google Chrome",
	"28.0.1500.71"
);

$test->add(
	"Opera/9.80 (Android; Opera Mini/7.5.33361/30.3442; U; ru) Presto/2.8.119 Version/11.10",
	"Android",
	"",
	"Opera Mini",
	"11.10"
);

$test->add(
	"Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0)",
	"Windows Phone",
	"7.5",
	"Internet Explorer",
	"9.0"
);

$test->add(
	"Opera/9.80 (J2ME/MIDP; Opera Mini/9.80 (S60; SymbOS; Opera Mobi/23.348; U; en) Presto/2.5.25 Version/10.54",
	"Symbian",
	"",
	"Opera Mini",
	"10.54"
);

$test->add(
	"Mozilla/5.0 (Linux; U; X11; en-US; Valve Steam Tenfoot/1380931870; ) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Safari/535.19",
	"GNU/Linux",
	"",
	"Steam Browser",
	""
);

$test->add(
	"Mozilla/5.0 (X11; Linux x86_64) KHTML/4.11.2 (like Gecko) Konqueror/4.11",
	"GNU/Linux",
	"",
	"Konqueror",
	"4.11"
);

$test->add(
	"Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US) AppleWebKit/532.0 (KHTML, like Gecko) Chrome/3.0.195.27 Safari/532.0 EVE-IGB",
	"Windows",
	"Vista",
	"EVE Browser",
	""
);

$test->add(
	"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.89 Vivaldi/1.0.83.38 Safari/537.36",
	"GNU/Linux",
	"",
	"Vivaldi",
	"1.0.83.38"
);

$test->add(
	"Mozilla/5.0 (Linux; Android 4.4.4; Nexus 7 Build/KTU84Q) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/33.0.0.0 Safari/537.36 SputnikBrowser/0.6.0",
	"Android",
	"4.4.4",
	"Sputnik Browser",
	"0.6.0"
);

$test->add(
	"Mozilla/5.0 (X11; Linux) AppleWebKit/538.15 (KHTML, like Gecko) Chrome/18.0.1025.133 Safari/538.15 Midori/0.5",
	"GNU/Linux",
	"",
	"Midori",
	"0.5"
);

$test->add(
	"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.9600",
	"Windows",
	"10",
	"Microsoft Edge",
	"12.9600"
);

$test->add(
	"Mozilla/5.0 (iPhone; CPU iPhone OS 9_3 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Coast/5.02.99991 Mobile/13E237 Safari/7534.48.3",
	"iOS(iPhone)",
	"9.3",
	"Opera Coast",
	"5.02.99991"
);

$errors = $test->check();

if (count($errors) == 0) {
	echo 'All tests passed.';
} else {
	foreach ($errors as $key => $errorInfo) {
		$testInfo = $test->get($key);
		$user = new uInfo($testInfo['user_agent']);

		echo '<h1>Test ' . $key . ' failed</h1>';
		echo '<p>' . $testInfo['user_agent'] .'</p>';
		echo '
		<table>
			<thead>
				<tr>
					<td>Type</td>
					<td>Actual</td>
					<td>Expected</td>
				</tr>
			</thead>
			<tbody>';

		if (isset($errorInfo['os_name']) && $errorInfo['os_name']) {
			echo '
				<tr>
					<td>OS Name</td>
					<td>' . $testInfo['os_name'] . '</td>
					<td>' . $user->os->name . '</td>
				</tr>';
		}

		if (isset($errorInfo['os_version']) && $errorInfo['os_version']) {
			echo '
				<tr>
					<td>OS Version</td>
					<td>' . $testInfo['os_version'] . '</td>
					<td>' . $user->os->version . '</td>
				</tr>';
		}

		if (isset($errorInfo['browser_name']) && $errorInfo['browser_name']) {
			echo '
				<tr>
					<td>Browser Name</td>
					<td>' . $testInfo['browser_name'] . '</td>
					<td>' . $user->browser->name . '</td>
				</tr>';
		}

		if (isset($errorInfo['browser_version']) && $errorInfo['browser_version']) {
			echo '
				<tr>
					<td>Browser Version</td>
					<td>' . $testInfo['browser_version'] . '</td>
					<td>' . $user->browser->version . '</td>
				</tr>';
		}

		echo '</tbody>
			</table>
			<br>';
	}
}
?>

</body>
</html>
