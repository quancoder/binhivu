<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webconfig {
	
	function __construct()
	{
		
	}
	
	function init()
	{
		$config = & load_class('Config', 'core');
		
		$mobileDetect = & load_class('MobileDetect', 'libraries');
		$config->config['isMobile'] = $mobileDetect->isMobile();
		$config->config['isTablet'] = $mobileDetect->isTablet();
		/*

		$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DBNAME, DB_PORT);
		$sql = "SELECT * FROM tbl_config";
		$result = $db->query($sql);
		$data = $result->fetch_array(MYSQLI_ASSOC);
		$result->free_result();
		$db->close();
		$config->config['cfConfig'] = $data;
		*/
	}
}