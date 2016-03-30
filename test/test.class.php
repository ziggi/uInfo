<?php
/**
 * A uInfo Test class
 *
 * This class getting information about your IP, browser and OS.
 *
 * @author Sergei Marochkin <me@ziggi.org>
 * @version 1.0
 * @copyright 2012-2016 Sergei Marochkin
 * @license The MIT License
 */

include_once "../uinfo.class.php";

class Test {

	/**
	 * A private variable
	 *
	 * @var array contains all tests data
	 */

	private $_tests = array();

	/**
	 * Add test item
	 *
	 * @param string $userAgent a HTTP_USER_AGENT
	 * @param string $osName a OS name
	 * @param string $osVersion a OS version
	 * @param string $browserName a browser name
	 * @param string $browserVersion a browser version
	 * @return void
	 */

	public function add($userAgent, $osName, $osVersion, $browserName, $browserVersion)
	{
		$this->_tests[] = array(
				'user_agent' => $userAgent,
				'os_name' => $osName,
				'os_version' => $osVersion,
				'browser_name' => $browserName,
				'browser_version' => $browserVersion
			);
	}

	/**
	 * Get test item
	 *
	 * @param int key a tests key
	 * @return array with test info
	 */

	public function get($key)
	{
		return $this->_tests[$key];
	}


	/**
	 * Check all tests
	 *
	 * @return array with error info
	 */

	public function check()
	{
		$errors = array();

		foreach ($this->_tests as $key => $row) {
			$user = new uInfo($row['user_agent']);

			if ($user->os->name != $row['os_name']) {
				$errors[$key]['os_name'] = true;
			}

			if ($user->os->version != $row['os_version']) {
				$errors[$key]['os_version'] = true;
			}

			if ($user->browser->name != $row['browser_name']) {
				$errors[$key]['browser_name'] = true;
			}

			if ($user->browser->version != $row['browser_version']) {
				$errors[$key]['browser_version'] = true;
			}
		}

		return $errors;
	}
}
