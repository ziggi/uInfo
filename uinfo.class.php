<?php
/**
 * A uInfo class
 *
 * This class getting information about your IP, browser and OS.
 *
 * @author Sergey Marochkin <me@ziggi.org>
 * @version 2.0
 * @copyright 2012-2013 Sergey Marochkin
 * @license The MIT License
 */

class uInfo {

    /**
     * A private variable
     *
     * @var string contains HTTP_USER_AGENT for the class
     */
    
    private $_userAgent;

    /**
     * A private variable
     *
     * @var string contains configuration for browsers
     */

    private $_browser = array(
        "Vivaldi" => array(
            "name" => "Vivaldi",
            "version" => 1,
            ),

        "Breach" => array(
            "name" => "Breach",
            "version" => 0,
            ),

        "Steam" => array(
            "name" => "Steam Browser",
            "version" => 1,
            ),

        "EVE-IGB" => array(
            "name" => "EVE Browser",
            "version" => 0,
            ),

        "Konqueror" => array(
            "name" => "Konqueror",
            "version" => 1,
            ),

        // opera on blink
        "OPR" => array(
            "name" => "Opera",
            "version" => 1,
            ),

        "YaBrowser" => array(
            "name" => "Yandex.Browser",
            "version" => 1,
            ),

        "UCBrowser" => array(
            "name" => "UC Browser",
            "version" => 1,
            ),

        "CriOS" => array(
            "name" => "Google Chrome",
            "version" => 1,
            ),

        "Chrome" => array(
            "name" => "Google Chrome",
            "version" => 1,
            ),

        "MSIE" => array(
            "name" => "Internet Explorer",
            "version" => 1,
            ),

        "Firefox" => array(
            "name" => "Mozilla Firefox",
            "version" => 1,
            ),

        "Safari" => array(
            "name" => "Safari",
            "version" => 1,
            ),

        // Opera Mini
        "Mini" => array(
            "name" => "Opera Mini",
            "version" => -1,
            ),

        "Opera" => array(
            "name" => "Opera",
            "version" => -1,
            ),
        );

    /**
     * A private variable
     *
     * @var string contains configuration for operating systems
     */

    private $_os = array(
        "Linux" => array(
            "name" => "GNU/Linux",
            "version" => null,
            ),

        "Ubuntu" => array(
            "name" => "Ubuntu",
            "version" => null,
            ),

        "Mac_PowerPC" => array(
            "name" => "Mac OS 9",
            "version" => null,
            ),

        "OS X" => array(
            "name" => "OS X",
            "version" => null,
            ),
            
        "Windows 95" => array(
            "name" => "Windows",
            "version" => "95",
            ),

        "Windows 98" => array(
            "name" => "Windows",
            "version" => "98",
            ),

        "Windows NT 5.0" => array(
            "name" => "Windows",
            "version" => "2000",
            ),

        "Windows NT 5.1" => array(
            "name" => "Windows",
            "version" => "XP",
            ),

        "Windows NT 5.2" => array(
            "name" => "Windows",
            "version" => "Server 2003",
            ),

        "Windows NT 6.0" => array(
            "name" => "Windows",
            "version" => "Vista",
            ),

        "Windows NT 6.1" => array(
            "name" => "Windows",
            "version" => "7",
            ),

        "Windows NT 6.2" => array(
            "name" => "Windows",
            "version" => "8",
            ),

        "Android" => array(
            "name" => "Android",
            "version" => null,
            ),

        "BlackBerry" => array(
            "name" => "BlackBerry",
            "version" => null,
            ),

        "iPod OS" => array(
            "name" => "iOS(iPod)",
            "version" => null,
            ),

        "CPU OS" => array(
            "name" => "iOS(iPad)",
            "version" => null,
            ),

        "iPhone OS" => array(
            "name" => "iOS(iPhone)",
            "version" => null,
            ),

        "SymbOS" => array(
            "name" => "Symbian",
            "version" => null,
            ),

        "Windows Phone OS" => array(
            "name" => "Windows Phone",
            "version" => null,
            ),
        );

    /**
     * Sets $user_agent to a new HTTP_USER_AGENT value
     *
     * @param string $http_user_agent a HTTP_USER_AGENT
     * @return void
     */
    
    function __construct($http_user_agent)
    {
        $this->_userAgent = $http_user_agent;
    }

    /**
     * Provides access to data with a view $user->host->ip
     *
     * @param string $param received
     * @return string result or pointer object
     */

    function __get($param)
    {
        if (isset($this->_pointer)) {
            $result = null;

            switch ($this->_pointer) {
                case "host":
                    $result = $this->get_host($param);
                    break;
                
                case "browser":
                    $result = $this->get_browser($param);
                    break;

                case "os":
                    $result = $this->get_os($param);
                    break;
            }

            $this->_pointer = null;
            return $result;
        } else {
            $this->_pointer = $param;
            return $this;
        }
    }
    
    /**
     * Getting host information
     * 
     * @param string $param type of information about the host
     * @return string your ip or hostname
     */
    
    public function get_host($param)
    {
        $result = null;
        
        switch ($param) {
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
     * @param string $param type of information about the browser
     * @return string your browser name or version
     */

    public function get_browser($param)
    {
        $result = null;
        
        switch ($param) {
            case "name":
                foreach ($this->_browser as $key => $value) {
                    if (preg_match("/".$key."/", $this->_userAgent)) {
                        $result = $value['name'];
                        break;
                    }
                }
                break;
            
            case "version":
                $pos = null;
                
                $array = preg_split("/[\/ ;]/", $this->_userAgent);
                foreach ($this->_browser as $key => $value) {
                    if (($pos = array_search($key, $array)) !== false) {
                        if ($value['version'] < 0) {
                            $result = end($array);
                        } else if ($value['version'] > 0) {
                            $result = $array[ $pos + $value['version'] ];
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
     * @param string $param type of information about the OS
     * @return string your OS name or version
     */

    public function get_os($param)
    {
        $result = null;
        
        switch ($param) {
            case "name":
                foreach ($this->_os as $key => $value) {
                    if (preg_match("/".$key."/", $this->_userAgent)) {
                        $result = $value['name'];
                    }
                }
                break;
            
            case "version":
                foreach ($this->_os as $key => $value) {
                    if (preg_match("/".$key."/", $this->_userAgent)) {
                        if ($value['version'] === null) {
                            $result = preg_replace("/.*".$key." ([0-9._]+)[\;\ \)].*/", "$1", $this->_userAgent);
                            if ($result == $this->_userAgent) {
                                $result = null;
                            } else {
                                $result = str_replace("_", ".", $result);
                            }
                        } else {
                            $result = $value['version'];
                        }
                    }
                }
                break;
        }
        
        return $result;
    }
}
