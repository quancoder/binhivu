<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myencrypt
{
	private static $code = "KEBq7xIT5Ww4R3uSAe1Fy-jiPVQs6X_UfJk0GcdDhH2m9LaMOrzlY8NovpZCbgtn";
	
	private static function _shiftLeft($pos, $shiftStep)
	{
		$charCodeCount = strlen(self::$code);

		if (($pos + $shiftStep) > ($charCodeCount - 1))
		{
			$pos = ($pos + $shiftStep) - $charCodeCount;
		}
		else
		{
			$pos = $pos + $shiftStep;
		}
		return $pos;
	}

	private static function _shiftRight($pos, $shiftStep)
	{
		$charCodeCount = strlen(self::$code);
		if ($pos - $shiftStep < 0)
		{
			$pos = $charCodeCount - ($shiftStep - $pos);
		}
		else
		{
			$pos = $pos - $shiftStep;
		}
		return $pos;
	}
	
	
	public static function Encode($inputID)
	{
		$output = "";
        $id = $inputID;
        $shift = $inputID%64;
        $quotient = $id;
		do
		{
			$id       = $quotient % 64;
			$quotient = $quotient >> 6; // divide by 64
			$output   = self::$code[$id] . $output;
		}
		while ($quotient>0);
		return $output;
	}
    public static function Decode($inputID)
	{
        $output = 0;
        $len = strlen($inputID);
        $i;
		for ($i=0; $i<$len; $i++)
		{
            $value = strpos(self::$code, $inputID[$i]);
			$output += $value*pow(64,$len-$i-1);
		}
		return $output;
	}
	
	public static function Encrypt($uid, $isLogin, $codeIndex = 1)
	{
		$datetime = date('Y-m-d H:i:s');
		$time = strtotime($datetime);
		$str = $uid . ',' . $isLogin . ',' . $datetime;
		$shift = $time%64;
		$charlinkcode = self::$code;
		
		$strLinkLen = strlen($str);
		$i = 0;
		$result = '';
		for ($i = 0; $i < $strLinkLen; $i++)
		{
			$asciiPos = ord($str[$i]);
			$pos = ($asciiPos % 64);
			$result .= $charlinkcode[self::_shiftLeft($pos, $shift, $charlinkcode)];
			
		}
		return $charlinkcode[$shift] . $result;
	}
	
	public static function Decrypt($str)
	{
		$result = "";
		$charlinkcode = self::$code;
		$shift = strpos($charlinkcode, $str[0]);
		$strLinkLen = strlen($str);
		$i = 0;
		while ($i < $strLinkLen)
		{
			$subCode = substr($str, $i, 1);
			$pos = strpos($charlinkcode, $subCode);
			$result .= chr(self::_shiftRight($pos, $shift, $charlinkcode));
			$i += 1;
		}
		return $result;
	}
}