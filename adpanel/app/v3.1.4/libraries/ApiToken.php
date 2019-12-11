<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ApiToken {

    /*
    * Generate random iv for encrypt
    */
    private static function _randiv($length = 16, $add_dashes = false, $available_sets = 'luds')
    {
    	$sets = array();
		if(strpos($available_sets, 'l') !== false)
			$sets[] = 'abcdefghjkmnpqrstuvwxyz';
		if(strpos($available_sets, 'u') !== false)
			$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
		if(strpos($available_sets, 'd') !== false)
			$sets[] = '23456789';
		if(strpos($available_sets, 's') !== false)
			$sets[] = '!@#$%&*?';
		$all = '';
		$iv = '';
		foreach($sets as $set)
		{
			$iv .= $set[array_rand(str_split($set))];
			$all .= $set;
		}
		$all = str_split($all);
		for($i = 0; $i < $length - count($sets); $i++)
		{
			$iv .= $all[array_rand($all)];
		}
		$iv = str_shuffle($iv);
		if(!$add_dashes)
		{
			return $iv;
		}
		$dash_len = floor(sqrt($length));
		$dash_str = '';
		while(strlen($iv) > $dash_len)
		{
			$dash_str .= substr($iv, 0, $dash_len) . '-';
			$iv = substr($iv, $dash_len);
		}
		$dash_str .= $iv;
		return $dash_str;
    }
    
    /*
    * Generate random user api key
    */
    public static function random_key()
    {
    	return self::_randiv(16);
    }
    
    public static function test($private_key)
    {
    	$iv = self::_randiv(16);
    	$iv_for_iv = substr(md5($private_key), 0, 16);
    	$iv = openssl_encrypt($iv , 'AES-256-CBC', $private_key, OPENSSL_RAW_DATA, $iv_for_iv);
		echo mb_strlen($iv, 'utf-8');
		$iv = base64_encode($iv);
		$iv = str_replace(array('+', '/'), array('-', '_'), $iv);

		echo mb_strlen($iv, 'utf-8');
    }
    
    /*
    * Generate new token
    */
    public static function generate($userid, $username, $private_key)
    {
    	$rel = '';
    	$str_encrypt = date('Y-m-d H:i:s');
		$encrypt = md5($userid . $username);
    	for($i = 0; $i < 32; $i++)
    	{
    		if($i%2 == 1)
    		{
    			$str_encrypt .= $encrypt[$i];
    		}
    	}
		$chk = false;
		while(!$chk)
		{
			$iv = self::_randiv(16);
			$encrypt_key = hash_hmac('sha256', $private_key, $iv);
			$iv_for_iv = substr(md5($private_key), 0, 16);
			$token = openssl_encrypt($str_encrypt , 'AES-256-CBC', $encrypt_key, OPENSSL_RAW_DATA, $iv); 
			//$encoded = base64_encode($token);
			//$encoded = str_replace(array('+', '/'), array('-', '_'), $encoded);
			
			$iv = openssl_encrypt($iv , 'AES-256-CBC', $private_key, OPENSSL_RAW_DATA, $iv_for_iv);
			$iv = base64_encode($iv);
			$iv = str_replace(array('+', '/'), array('-', '_'), $iv);
			$rel = $token . $iv;
			
			if(self::validate($rel, $userid, $username, $private_key))
			{
				$chk = true;
			}
		}
		
		return $rel;
    }
    
    /*
    * Validate token
    */
    public static function validate($token, $userid, $username, $private_key, $expire_time = 0)
    {
    	$token = trim($token);
		$token_len = mb_strlen($token, 'UTF-8');
		if($token_len <= 44)
		{
			return false;
		}
		
		$iv_encrypt = substr($token, -44);
		$iv_encrypt = str_replace(array('-', '_'), array('+', '/'), $iv_encrypt);
		$iv_encrypt = base64_decode($iv_encrypt);
		
		
		$iv_for_iv = substr(md5($private_key), 0, 16);
		$iv = openssl_decrypt($iv_encrypt, 'AES-256-CBC', $private_key, OPENSSL_RAW_DATA, $iv_for_iv);
		
		$token = substr($token, 0, -44);
		//$token = str_replace(array('-', '_'), array('+', '/'), $token);
		//$token = base64_decode($token);
		
		$encrypt_key = hash_hmac('sha256', $private_key, $iv);
		$str_decrypted = openssl_decrypt($token, 'AES-256-CBC', $encrypt_key, OPENSSL_RAW_DATA, $iv);
		
		$valid_user_str = '';
		$valid_user_info = md5($userid . $username);
    	for($i = 0; $i < 32; $i++)
    	{
    		if($i%2 == 1)
    		{
    			$valid_user_str .= $valid_user_info[$i];
    		}
    	}
		$valid_user_str_len = strlen($valid_user_str);
		$valid_user_str_len = 0 - $valid_user_str_len;
		// validate time
		$time = substr($str_decrypted, 0, $valid_user_str_len);
		$time = strtotime($time);
		if($time ===-1 || $time === false)
		{
			return false;
		}
		
		// check product
		$user_info_valid = substr($str_decrypted, $valid_user_str_len);
		if($user_info_valid != $valid_user_str)
		{
			return false;
		}
		return true;
   	}
    // end new token
}