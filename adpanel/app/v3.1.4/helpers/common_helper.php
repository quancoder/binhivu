<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

// define common function
function getDomainFromUrl($strUrl)
{
    $parse = parse_url($strUrl);
    $domain = isset($parse['host']) ? $parse['host'] : '';
    $domain = mb_strtolower($domain, 'UTF-8');
    if (preg_match('/^www\./i', $domain))
    {
        $domain = substr($domain, 4);
    }
    return $domain;
}

function isIdNumber($str)
{
    $len = strlen($str);
    if ($len >= 1)
    {
        if (preg_match('/^[1-9][0-9]*$/', $str))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    else
    {
        if (preg_match('/^[0-9]+$/', $str))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}

function show_custom_error($mess = '')
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
	
	$showCustomError = $CI->config->item('show_custom_error');
	if($showCustomError)
	{
		die($mess);
	}
	else
	{
		?>
		<script type="text/javascript">window.location = '/upgrade';</script>
		<?php
		die();
	}
}

function getListPaging($cPage, $pCount)
{
    $listPaging = array(0, 0, 0, 0, 0);
    $startShowPage = 0;
    $startShowPage = ($pCount > 5) ? (($cPage > 3) ? $cPage - 2 : 1) : 1;
    if (($cPage + 2) > $pCount && $pCount > 5)
    {
        $startShowPage -= ($cPage + 2) - $pCount;
    }
    $index = 0;
    $i = 0;
    for ($i = 0; $i < 5; $i++)
    {
        if (($startShowPage + $i) <= $pCount)
        {
            $listPaging[$index] = $startShowPage + $i;
            $index++;
        }
        else
        {
            break;
        }
    }
    return $listPaging;
}

function getCurrentUrl()
{
    return HTTP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];
}

function isUrl($url)
{
    return (preg_match('/^(http|https):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url)) ? TRUE : FALSE;
}

function getTimeAgo($currTime, $timeStamp)
{
	$data = array();
	$data['type'] = '';
	$data['value'] = '';
	$seconds = $currTime - $timeStamp;
	if($seconds < 60)
	{
		$data['type'] = 's';
		$data['value'] = $seconds;
	}
	else if($seconds >= 60 && $seconds <3600)
	{
		$data['type'] = 'i';
		$data['value'] = ($seconds - ($seconds%60)) / 60;
	}
	else if($seconds >= 3600 && $seconds < 86400)
	{
		$data['type'] = 'h';
		$data['value'] = ($seconds - ($seconds%3600)) / 3600;
	}
	else 
	{
		$data['type'] = 'd';
		$data['value'] = ($seconds - ($seconds%86400)) / 86400;
	}
	return $data;
}

function removeAllTags($text)
{
    $text = rawurldecode($text);
    $text = htmlspecialchars_decode(html_entity_decode($text, ENT_QUOTES | ENT_IGNORE, "UTF-8"),
                                    ENT_QUOTES | ENT_IGNORE);
    $text = trim($text);
    // PHP's strip_tags() function will remove tags, but it
    // doesn't remove scripts, styles, and other unwanted
    // invisible text between tags.  Also, as a prelude to
    // tokenizing the text, we need to insure that when
    // block-level tags (such as <p> or <div>) are removed,
    // neighboring words aren't joined.
    $text = preg_replace(
        array(
            // Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',

            // Add line breaks before & after blocks
            '@<((br)|(hr))@iu',
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
        ),
        array(
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            "\n\$0",
            "\n\$0",
            "\n\$0",
            "\n\$0",
            "\n\$0",
            "\n\$0",
            "\n\$0",
            "\n\$0",
        ),
        $text);
	$text = preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $text);
    // Remove all remaining tags and comments and return.
    return strip_tags($text);
}

function getContentFromTextAraUseTinyMce($str)
{
	$CI = &get_instance();
	return mysqli_real_escape_string($CI->db->conn_id, $str);
}

function getSaveSqlStr($str)
{
	$CI = &get_instance();
	return mysqli_real_escape_string($CI->db->conn_id, $str);
	/*
	if(get_magic_quotes_gpc())
	{
		return mysql_real_escape_string($str);
		//return $str;
	}
	else
	{
		return mysql_real_escape_string($str);
	}
	*/
}

function myEscapeStr($str)
{
	$str = trim(removeAllTags($str));
	return getSaveSqlStr($str);
}

function str_valid_phone($strNumber)
{
    $strNumber = trim($strNumber);
    $chk = FALSE;
    $len = strlen($strNumber);
    if ((
            ($len == 10 && substr($strNumber, 0, 2) == '09') ||
            ($len == 10 && substr($strNumber, 0, 3) == '088') ||
            ($len == 10 && substr($strNumber, 0, 3) == '086') ||
            ($len == 10 && substr($strNumber, 0, 3) == '089') ||
            ($len == 11 && substr($strNumber, 0, 2) == '01') ||
			($len == 10 && substr($strNumber, 0, 3) == '032') || 
			($len == 10 && substr($strNumber, 0, 3) == '033') || 
			($len == 10 && substr($strNumber, 0, 3) == '034') || 
			($len == 10 && substr($strNumber, 0, 3) == '035') || 
			($len == 10 && substr($strNumber, 0, 3) == '036') || 
			($len == 10 && substr($strNumber, 0, 3) == '037') || 
			($len == 10 && substr($strNumber, 0, 3) == '038') || 
			($len == 10 && substr($strNumber, 0, 3) == '039') || 
			
			($len == 10 && substr($strNumber, 0, 3) == '070') || 
			($len == 10 && substr($strNumber, 0, 3) == '076') || 
			($len == 10 && substr($strNumber, 0, 3) == '077') || 
			($len == 10 && substr($strNumber, 0, 3) == '078') || 
			($len == 10 && substr($strNumber, 0, 3) == '079') || 
			
			($len == 10 && substr($strNumber, 0, 3) == '081') || 
			($len == 10 && substr($strNumber, 0, 3) == '082') || 
			($len == 10 && substr($strNumber, 0, 3) == '083') || 
			($len == 10 && substr($strNumber, 0, 3) == '084') || 
			($len == 10 && substr($strNumber, 0, 3) == '085') || 
			
			($len == 10 && substr($strNumber, 0, 3) == '056') || 
			($len == 10 && substr($strNumber, 0, 3) == '058') || 
			
			($len == 10 && substr($strNumber, 0, 3) == '059')) 
        && !preg_match("/[^0-9]/", $strNumber)
    )
    {
        $chk = TRUE;
    }

    return $chk;
}

function br2nl($input) 
{
	return preg_replace('/<br(\s+)?\/?>/i', "\n", $input);
}


function validUsername($str)
{
    return preg_match('/^[a-z0-9_\-\.]+$/', $str);
}

function validEmail($email)
{
    return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email);
}

function realEmail($email)
{
    $chk = false;
    $email = trim($email);
    if($email == '')
    {
        return $chk;
    }
    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
    {
        return $chk;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return $chk;
    }

    list($userName, $mailDomain) = explode("@", $email);
    $mailDomain = trim($mailDomain);
    if(!checkdnsrr($mailDomain, "MX"))
    {
        return $chk;
    }
	/*
    $arr = dns_get_record($mailDomain);
    if(empty($arr))
    {
        return $chk;
    }
    else
    {
        if(isset($arr[1]) && isset($arr[1]['target']) && strtolower(trim($arr[1]['target'])) == 'thongbao.vnnic.vn')
        {
            return $chk;
        }
    }
    */
    return true;
}

function validMd5($md5)
{
    return !empty($md5) && preg_match('/^[a-f0-9]{32}$/', $md5);
}

function sendsms($data)
{
    if (SMS_SEND)
    {
        $url = SMS_URL;
        $number = $data['number'];
        $content = $data['content'];
        $myvars = '{"username":"' . SMS_ACCOUNT . '","password":"' . SMS_PASS . '","message":"' . $content . '","brandname":"' . SMS_BRAND_NAME . '","recipients":[{"message_id":"a0","number":"' . $number . '"}]}';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $myvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        curl_close($ch);
        return TRUE;
    }
    return FALSE;
}

function sendmail($data, $langcode = '')
{
	IF (MAIL_SEND)
	{
	    $configs = array(
	        'protocol'  =>  'smtp',
	        'smtp_host' =>  EMAIL_SMTP_HOST,
	        'smtp_user' =>  EMAIL_SMTP_USER,
	        'smtp_pass' =>  EMAIL_SMTP_PASS,
	        'smtp_port' =>  EMAIL_SMTP_PORT,
	        'mailtype'  => 'html'
	    );
	
	    $checkMail = TRUE;
	    if (strpos($data['to'], ','))
	    {
	        $emailList = explode(',', $data['to']);
	        foreach ($emailList as $eL)
	        {
	            if (($eL != '') && !(realEmail($eL)))
	            {
	                $checkMail = FALSE;
	                exit;
	            }
	        }
	    }
	    else
	    {
	        $checkMail = realEmail($data['to']);
	    }
	
	    if ($checkMail)
	    {
	        $ci = &get_instance();
	        $mail_from = MAIL_SENDER_MAIL;
	        $from_name = MAIL_SENDER_NAME;
	
	        $ci->load->library('email', $configs);
	        $ci->email->set_newline("\r\n");
	        $ci->email->from($mail_from, $from_name);
	        $ci->email->to($data['to']);
	        if (array_key_exists('cc', $data))
	        {
	            $ci->email->cc($data['cc']);
	        }
	        $ci->email->subject($data['subject']);
	        $ci->email->message($data['body']);
	
	        if($ci->email->send())
	        {
	            $ci->email->clear();
	            $res['success'] = TRUE;
	            return $res;
	        }
	        else
	        {
	            $res['success'] = false;
	            $res['message'] = $ci->email->print_debugger();
	            return $res;
	        }
	    }
 	}
}

function getRealIpAddr()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
    {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (isset($_SERVER['HTTP_X_CLIENT_RIP']))
    {
        $ipaddress = $_SERVER['HTTP_X_CLIENT_RIP'];
    }
    else
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            if (isset($_SERVER['HTTP_X_FORWARDED']))
            {
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            }
            else
            {
                if (isset($_SERVER['HTTP_FORWARDED_FOR']))
                {
                    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                }
                else
                {
                    if (isset($_SERVER['HTTP_FORWARDED']))
                    {
                        $ipaddress = $_SERVER['HTTP_FORWARDED'];
                    }
                    else
                    {
                        if (isset($_SERVER['REMOTE_ADDR']))
                        {
                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                        }
                        else
                        {
                            $ipaddress = '';
                        }
                    }
                }
            }
        }
    }
    return $ipaddress;
}

function api_key_encrypt($str) 
{
    $key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // Generate an initialization vector
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
    $encrypted = openssl_encrypt($str, 'aes-256-cbc', $encryption_key, 0, $iv);
    // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
    return base64_encode($encrypted . '::' . $iv);
}

function api_key_decrypt($key_encrypt) {
    $key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
    list($encrypted_data, $iv) = explode('::', base64_decode($key_encrypt), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}


function get_time_ago( $datetime, $full=false )
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'vừa xong';
}