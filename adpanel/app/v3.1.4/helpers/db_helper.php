<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// close all db connection
function dbClose()
{
	$CI =& get_instance();
	if (class_exists('CI_DB') AND isset($CI->db))
	{
		$CI->db->close();
	}
	
	if (class_exists('CI_DB') AND isset($CI->db_slave))
	{
		$CI->db_slave->close();
	}
}