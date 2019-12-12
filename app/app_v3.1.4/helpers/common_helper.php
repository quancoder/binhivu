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

function trimTitle($title, $limit = 20)
{
    $newTitle = '';
    if (mb_strlen($title) > $limit)
    {
        $newTitle = mb_substr($title, 0, $limit);
    }
    else
    {
        $newTitle = $title;
    }
    return $newTitle;
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
function is_date($date)
{
    $date = str_replace(array('\'', '-', '.', ','), '/', $date);
    $date = explode('/', $date);
    if (count($date) == 1 // No tokens
        && is_numeric($date[0])
        && $date[0] < 20991231
        && (checkdate(substr($date[0], 4, 2), substr($date[0], 6, 2), substr($date[0], 0, 4)))
    )
    {
        return TRUE;
    }
    if (count($date) == 3
        && is_numeric($date[0])
        && is_numeric($date[1])
        && is_numeric($date[2])
        && (checkdate($date[0], $date[1], $date[2]) //mmddyyyy
            OR checkdate($date[1], $date[0], $date[2]) //ddmmyyyy
            OR checkdate($date[1], $date[2], $date[0])) //yyyymmdd
    )
    {
        return TRUE;
    }
    return FALSE;
}

function show_custom_error($mess = '')
{
    $CI =& get_instance();
    $langcode = get_langcode();
    if (class_exists('CI_DB') AND isset($CI->db))
    {
        $CI->db->close();
    }
	
	if (class_exists('CI_DB') AND isset($CI->db_slave))
	{
		$CI->db_slave->close();
	}
	
    $showCustomError = $CI->config->item('show_custom_error');
    if ($showCustomError)
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

function getSaveSqlStr($str)
{
	return $str;
	/* $CI = &get_instance();
	return mysqli_real_escape_string($CI->db->conn_id, $str); */
	
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

function cutWord($str, $limit = 20, $comm = '...')
{
    if ($str == '')
    {
        return $str;
    }
    $str2arr = explode(' ', $str);
    if ($limit >= count($str2arr))
    {
        return $str;
    }
    $return = array();
    for ($i = 0; $i < $limit; $i++)
    {
        $return[] = $str2arr[$i];
    }
    return implode(' ', $return) . $comm;
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

// get url page title
function url_page_title()
{
	$title = '';
	//$uri = $_SERVER['PHP_SELF'];
	$uri = $_SERVER['REQUEST_URI'];
	if($uri != '')
	{
		$tmp = parse_url($uri);
		$uri = $tmp['path'];
	}
	
	if(preg_match("/\.html\z/i", $uri))
	{
		$pos = strripos($uri, '/');
		$pos = $pos + 1;
		$title = substr($uri, $pos);
	}
	return $title;
}

function getUri()
{
	$url = getCurrentUrl();
	$rel = '';
	$arr2 = parse_url($url);
	if(isset($arr2['scheme']))
	{
		$rel = $arr2['scheme'] . '://';
	}
	
	if(isset($arr2['host']))
	{
		$rel .= $arr2['host'];
	}
	
	if(isset($arr2['path']))
	{
		$rel .= $arr2['path'];
	}
	return $rel;
}

function fixThumb($img_w, $img_h, $box_w = 0, $box_h = 0)
{
	$box_w = $box_w == 0 || $box_h == 0 ? 16 : $box_w;
	$box_h = $box_w == 0 || $box_h == 0 ? 9 : $box_h;
	// for 16:9 ratio
	if($img_w/$box_w > $img_h/$box_h)
	{
		return 'h';
	}
	else if($img_w/$box_w < $img_h/$box_h)
	{
		return 'w';
	}
	else
	{
		return $img_w >= $img_h ? 'w' : 'h';
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


function nhanh_border_width($floatVal)
{
	return round($floatVal, 0);
}

function isDomain($str)
{
	$temp = explode('?', $str);

	$domain = isset($temp[0]) ? $temp[0] : '';
	if($domain == '')
	{
		return false;
	}
	else
	{
		$patterns = array();
		$patterns[] = '/http:\/\//';
		$patterns[] = '/https:\/\//';
		$domain = preg_replace($patterns, '', $domain);
		$domain = preg_replace("/www\./", '', $domain);

		if(isUrl('http://' . $domain))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

function getViewWidthHeight($maxW, $maxH, $width, $height, $minW = 0, $minH = 0)
{
    $newW = 0;
    $newH = 0;
    if ($maxW == 0 OR $maxH == 0)
    {
        // resize theo height
        if ($maxW == 0)
        {
            if ($height > $maxH)
            {
                $newH = $maxH;
                $newW = (int)(($newH * $width) / $height);
            }
            else
            {
                $newH = $height;
                $newW = $width;
            }
        }
        // maxH = 0 => resize theo width
        else
        {
            if ($width > $maxW)
            {
                $newW = $maxW;
                $newH = (int)(($maxW * $height) / $width);
            }
            else
            {
                $newH = $height;
                $newW = $width;
            }
        }
    }
    else
    {
        // check file view max width and max height
        if ($height > $maxH OR $width > $maxW)
        {
            if ($height > $maxH && $width > $maxW)
            {
                if (($height / $maxH) > ($width / $maxW))
                {
                    $newH = $maxH;
                    $newW = (int)(($maxH * $width) / $height);
                }
                else
                {
                    $newW = $maxW;
                    $newH = (int)(($maxW * $height) / $width);
                }
            }
            else
            {
                if ($height > $maxH)
                {
                    $newH = $maxH;
                    $newW = (int)(($maxH * $width) / $height);
                }
                else
                {
                    $newW = $maxW;
                    $newH = (int)(($maxW * $height) / $width);
                }
            }
        }
        else
        {
            $newW = $width;
            $newH = $height;
        }
    }

    if ($minW > 0)
    {
        $newW = $newW < $minW ? $minW : $newW;
    }

    if ($minH > 0)
    {
        $newH = $newH < $minH ? $minH : $newH;
    }

    return array('w' => $newW, 'h' => $newH);
}

function getBannerImagePath($year, $month, $filename, $timeStemp = 0)
{
    if ($filename == '')
    {
        return '';
    }
    // luu file local
    // danh cho viec dev luu file o local. khi len ban san pham thi bo phan nay
    $CI = &get_instance();
    if ($CI->config->item('cf_upload_local') != '')
    {
        if ($timeStemp == 0)
        {
            return $CI->config->item('base_url') . $CI->config->item('cf_upload_local') . "$year/$month/$filename";
        }
        else
        {
            $createdTimeInfo = getdate($timeStemp);
            $yearFolder = $createdTimeInfo['year'];
            $monthFolder = $createdTimeInfo['mon'];
            $monthFolder = ($monthFolder < 10) ? "0" . $monthFolder : $monthFolder;

            return $CI->config->item('base_url') . $CI->config->item('cf_upload_local') . "$yearFolder/$monthFolder/$filename";
        }
    }// end luu file local
    else
    {
        if ($timeStemp == 0)
        {
            return CLOUD_IMG_DOMAIN . "$year/$month/$filename";
        }
        else
        {
            $createdTimeInfo = getdate($timeStemp);
            $yearFolder = $createdTimeInfo['year'];
            $monthFolder = $createdTimeInfo['mon'];
            $monthFolder = ($monthFolder < 10) ? "0" . $monthFolder : $monthFolder;

            return CLOUD_IMG_DOMAIN . "$yearFolder/$monthFolder/$filename";
        }
    }
}

function getFilePath($userid, $filename)
{
    if ($filename == '')
    {
        return '';
    }
    // luu file local
    // danh cho viec dev luu file o local. khi len ban san pham thi bo phan nay
    $CI = &get_instance();
    if ($CI->config->item('cf_upload_local') != '')
    {
        return $CI->config->item('base_url') . "udata/$userid/$filename";
    }// end luu file local
    else
    {
        return "https://remarketing.admicro.vn/udata/$userid/$filename";
    }
}

// show banner script
function show_script_banner($bannerid, $campaignid, $width, $height, $desc_url, $script)
{
	$bannerid = mt_rand(1,500);
	$campaignid = mt_rand(1,500);
    $script = trim($script);
    if ($script == '')
    {
        return '';
    }
    $script = str_replace("\r", "", $script);
    $script = str_replace("\n", "", $script);
    $script = trim(preg_replace('/\s\s+/', ' ', $script));
    $script = str_replace("/", "\\/", $script);
    $script = str_replace("'", "\\'", $script);

    $str2 = '<div id="adnzone_' . $bannerid . '"></div>';
    $str2 .= '<script type="text/javascript">';
    $str2 .= 'var __adnZone' . $bannerid . 'chk = false;';
    $str2 .= 'var adnZone_' . $bannerid . 'Data = {
    			"type": "7k",
    			"size": "' . $width . 'x' . $height . '",
    			"adn": true,
    			"is_db": 0,
    			"ext": {
        			"logo": 0
    			},
    			"df": [{
        			"src_bk": "",
        			"width": ' . $width . ',
					"link": "' . $desc_url . '",
        			"is_default": 1,
        			"l": "",
        			"type": "iframe",
        			"cid": ' . $campaignid . ',
        			"title": "",
        			"link3rd": "",
        			"tablet": 0,
        			"height": ' . $height . ',
        			"link_views": "",
        			"r": 1,
        			"isview": "1",
        			"src_exp": "",
        			"cpa": 0,
        			"src": \'' . $script . '\',
        			"bid": ' . $bannerid . '
    			}],
    			"lst": []
			};';
    $str2 .= 'window.adnzone' . $bannerid . ' = new cpmzone(' . $bannerid . ');';
    $str2 .= 'adnzone' . $bannerid . '.show(adnZone_' . $bannerid . 'Data);';
    $str2 .= '</script>';

    return $str2;
}

// end show banner script

function validKey($k1, $k2, $uid = '', $pid = '', $isGetId = false)
{
    $data = array();
    $fromdate = '';
    $todate = '';
    $key = trim($k1);
    $enc_id = trim($k2);
    $enc_id = EncryptData::Decode($enc_id);
    $enc_id = json_decode($enc_id, true);
    $chk_key = false;
    if(is_array($enc_id))
    {
        $tmp_ctt = isset($enc_id['ctt']) ? $enc_id['ctt'] : '';
        $tmp_userid = isset($enc_id['uid']) ? $enc_id['uid'] : '';
        $tmp_fromDate = isset($enc_id['fdate']) ? $enc_id['fdate'] : '';
        $tmp_toDate = isset($enc_id['tdate']) ? $enc_id['tdate'] : '';
        $tmp_id = isset($enc_id['id']) ? $enc_id['id'] : '';
        $lstid = isset($enc_id['lstid']) ? $enc_id['lstid'] : '';
        $getid = ($lstid == '') ? $tmp_id : $lstid;
        $key_id = $tmp_ctt . $tmp_userid . $tmp_fromDate . $tmp_toDate . $getid;
        
        $key_id = EncryptData::Encode($key_id);
        $chk_key = (($key_id == $key) && ($uid == $tmp_userid) && ($pid == $lstid || $pid == $tmp_id)) ? true : false;
        $fromdate = $tmp_fromDate;
        $todate = $tmp_toDate;
        $data['enc_data'] = $enc_id;
    }

    $data['chk_key'] = $chk_key;
    $data['fromdate'] = $fromdate;
    $data['todate'] = $todate;

    return $data;
}

//GET DOMAIN FINAL FROM REDIRECT URL
function get_redirect_url($url)
{
	$redirect_url = null;

	$url_parts = @parse_url($url);
	if (!$url_parts) return false;
	if (!isset($url_parts['host'])) return false;
	if (!isset($url_parts['path'])) $url_parts['path'] = '/';

    $file_headers = @get_headers($url_parts['host']);
    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        return false;
        die;
    }

	$sock = fsockopen($url_parts['host'], (isset($url_parts['port']) ? (int)$url_parts['port'] : 80), $errno, $errstr, 30);
	if (!$sock)
    {
        return false;
        die;
    }

	$request = "HEAD " . $url_parts['path'] . (isset($url_parts['query']) ? '?'.$url_parts['query'] : '') . " HTTP/1.1\r\n";
	$request .= 'Host: ' . $url_parts['host'] . "\r\n";
	$request .= "Connection: Close\r\n\r\n";
	fwrite($sock, $request);
	$response = '';
	while(!feof($sock)) $response .= fread($sock, 8192);
	fclose($sock);

	if (preg_match('/^Location: (.+?)$/m', $response, $matches))
	{
		if ( substr($matches[1], 0, 1) == "/" )
		{
			return $url_parts['scheme'] . "://" . $url_parts['host'] . trim($matches[1]);
		}
		else
		{
			return trim($matches[1]);
		}

	}
	else
	{
		return false;
        die;
	}
    
}

function get_all_redirects($url)
{
	$redirects = array();
	while ($newurl = get_redirect_url($url))
	{
            
		if (!$newurl || in_array($newurl, $redirects))
		{
			break;
		}
		$redirects[] = $newurl;
		$url = $newurl;
	}
	return $redirects;
}

function get_domain_from_final_url($url)
{
	$redirects = get_all_redirects($url);
	if (count($redirects)>0)
	{
		$final_url =  array_pop($redirects);
		$parse_url = parse_url($final_url);
		return $parse_url['host'];
	}
	else
	{
        $parse_url = parse_url($url);
        return $parse_url['host'];
	}
}

//END GET DOMAIN FINAL FROM REDIRECT URL

function isWideView($width, $height)
{
    return ($width / $height) > 4 ? TRUE : FALSE;
}

function real_exist_domain($domain)
{
	if (filter_var(gethostbyname($domain), FILTER_VALIDATE_IP) == true)
	{
		return true;
	}
	else
	{
		return false;
	}
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

function toURLFriendly($text, $mask, $id, $ext='.html')
{
    $tmp = slugify($text);
    $tmp = $tmp.'-'.$mask.($id).'.html';

    return site_url($tmp);
}

function slugify($string, $slug = '-', $extra = null) {
    if (strpos($string = htmlentities($string, ENT_QUOTES, 'UTF-8'), '&') !== false) {
        $string = html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|caron|cedil|circ|grave|lig|orn|ring|slash|tilde|uml);~i', '$1', $string), ENT_QUOTES, 'UTF-8');
    }

    if (preg_match('~[^[:ascii:]]~', $string) > 0) {
        $latin = array(
            'a' => '~[àáảãạăằắẳẵặâầấẩẫậÀÁẢÃẠĂẰẮẲẴẶÂẦẤẨẪẬą]~iu',
            'ae' => '~[ǽǣ]~iu',
            'b' => '~[ɓ]~iu',
            'c' => '~[ćċĉč]~iu',
            'd' => '~[ďḍđɗð]~iu',
            'e' => '~[èéẻẽẹêềếểễệÈÉẺẼẸÊỀẾỂỄỆęǝəɛ]~iu',
            'g' => '~[ġĝǧğģɣ]~iu',
            'h' => '~[ĥḥħ]~iu',
            'i' => '~[ìíỉĩịÌÍỈĨỊıǐĭīįİ]~iu',
            'ij' => '~[ĳ]~iu',
            'j' => '~[ĵ]~iu',
            'k' => '~[ķƙĸ]~iu',
            'l' => '~[ĺļłľŀ]~iu',
            'n' => '~[ŉń̈ňņŋ]~iu',
            'o' => '~[òóỏõọôồốổỗộơờớởỡợÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢǒŏōőǫǿ]~iu',
            'r' => '~[ŕřŗ]~iu',
            's' => '~[ſśŝşșṣ]~iu',
            't' => '~[ťţṭŧ]~iu',
            'u' => '~[ùúủũụưừứửữựÙÚỦŨỤƯỪỨỬỮỰǔŭūűůų]~iu',
            'w' => '~[ẃẁŵẅƿ]~iu',
            'y' => '~[ỳýỷỹỵYỲÝỶỸỴŷȳƴ]~iu',
            'z' => '~[źżžẓ]~iu',
        );

        $string = preg_replace($latin, array_keys($latin), $string);
    }

    return strtolower(trim(preg_replace('~[^0-9a-z' . preg_quote($extra, '~') . ']++~i', $slug, $string), $slug));
}

function srcImgPublic($name)
{
    return base_url()." public/images/ ". $name;
}