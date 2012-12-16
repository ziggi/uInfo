<?php

class uInfo {
	private $user_agent;
	
	function __construct($http_user_agent)
	{
		$this->user_agent = $http_user_agent;
	}
	
	public function host($in_param)
	{
		$result = null;
		
		switch ($in_param) {
			case "ip":
				$result = $_SERVER["REMOTE_ADDR"];
				break;
			
			case "name":
				$result = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
				break;
		}
		
		return $result;
	}
	/*
Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11
Opera/9.80 (X11; Linux x86_64) Presto/2.12.388 Version/12.11
Mozilla/5.0 (X11; Linux x86_64; rv:17.0) Gecko/20100101 Firefox/17.0
Mozilla/5.0 (Linux; Android 4.2.1; Nexus 7 Build/JOP40D) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166  Safari/535.19
Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11
Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022)
	*/
	public function browser($in_param)
	{
		$result = null;
		$u_agent = $this->user_agent;
		$browser_name = array(
			"Chrome" => "Google Chrome",
			"MSIE" => "Internet Explorer",
			"Firefox" => "Mozilla Firefox",
			"Safari" => "Safari",
			"Opera" => "Opera",
		);
		$browser_version = array(
			"Chrome" => 1,
			"MSIE" => 1,
			"Firefox" => 1,
			"Safari" => 1,
			"Opera" => -1,
		);
		
		switch ($in_param) {
			case "name":
				foreach ($browser_name as $key => $value) {
					if (preg_match("/".$key."/i", $this->user_agent)) {
						$result = $value;
						break;
					}
				}
				break;
			
			case "version":
				$pos = null;
				
				$array = preg_split("/[\/ ;]/", $this->user_agent);
				foreach ($browser_version as $key => $value) {
					if (($pos = array_search($key, $array)) !== false) {
						if ($value < 0) {
							$result = end($array);
						} else {
							$result = $array[$pos + $value];
						}
						break;
					}
				}
				break;
		}
		
		return $result;
	}
	
	public function os($in_param)
	{
		$result = null;
		$os_name = array(
			"linux" => "GNU/Linux",
			"mac_powerpc" => "Mac OS 9",
			"macintosh|mac os x|os x" => "OS X",
			"windows|win32" => "Windows",
			"android" => "Android",
			"blackberry" => "BlackBerry",
			"ipod" => "iOS for iPod",
			"ipad" => "iOS for iPad",
			"iphone" => "iOS for iPhone",
		);
		$os_version = array(
			"windows 95" => "95",
			"Windows 98" => "98",
			"Windows NT 5.0" => "2000",
			"Windows NT 5.1" => "XP",
			"Windows NT 5.2" => "Server 2003",
			"Windows NT 6.0" => "Vista",
			"Windows NT 6.1" => "7",
			"Windows NT 6.2" => "8",
			"Android" => null,
		);
		
		
		switch ($in_param) {
			case "name":
				foreach ($os_name as $key => $value) {
					if (preg_match("/".$key."/i", $this->user_agent)) {
						$result = $value;
					}
				}
				break;
			
			case "version":
				foreach ($os_version as $key => $value) {
					if (preg_match("/".$key."/i", $this->user_agent)) {
						if ($value == null) {
							$result = preg_replace("/.*".$key." (.*)\;.*/", "$1", $this->user_agent);
						} else {
							$result = $value;
						}
					}
				}
				break;
		}
		
		return $result;
	}
}


?>
