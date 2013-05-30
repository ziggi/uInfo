<?php
/**
 * A uInfo class
 *
 * This class getting information about your IP, browser and OS.
 *
 * @author Sergey Marochkin <xziggix@gmail.com>
 * @version 1.0
 * @copyright 2012 Sergey Marochkin
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3
 */

class uInfo {
    /**
     * A private variable
     *
     * @var string stores HTTP_USER_AGENT for the class
     */
    
	private $user_agent;
	
    /**
     * Sets $user_agent to a new HTTP_USER_AGENT value
     *
     * @param string $http_user_agent a HTTP_USER_AGENT
     * @return void
     */
    
	function __construct($http_user_agent)
	{
		$this->user_agent = $http_user_agent;
	}
	
    /**
     * Getting host information
     * 
     * @param string $in_param type of information about the host
     * @return string your ip or hostname
     */
    
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
	
    /**
     * Getting browser information
     * 
     * @param string $in_param type of information about the browser
     * @return string your browser name or version
     */
    
	public function browser($in_param)
	{
		$result = null;
		$u_agent = $this->user_agent;
		$browser_name = array(
			"YaBrowser" => "Яндекс.Браузер",
			"Chrome" => "Google Chrome",
			"MSIE" => "Internet Explorer",
			"Firefox" => "Mozilla Firefox",
			"Safari" => "Safari",
			"Opera" => "Opera",
		);
		$browser_version = array(
			"YaBrowser" => 1,
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
	
    /**
     * Getting operating system information
     * 
     * @param string $in_param type of information about the OS
     * @return string your OS name or version
     */
    
	public function os($in_param)
	{
		$result = null;
		$os_name = array(
			"linux" => "GNU/Linux",
			"ubuntu" => "Ubuntu",
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
							$result = preg_replace("/.*".$key." ([0-9.]+)\;.*/", "$1", $this->user_agent);
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
