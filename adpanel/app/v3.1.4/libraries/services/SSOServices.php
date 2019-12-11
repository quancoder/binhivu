<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SSOServices
{
    private static $_service_url = SSO_SERVICES;
    private static $_domain = SSO_DOMAIN;
    private static $_key = SSO_KEY;

    private static $_timeout = 30;

    public static function user_search($searchBy, $keyword, $groupid, $saleid, $issale, $status, $page, $numitem, $timeout = 30)
    {
        $timeout = $timeout == 0 ? self::$_timeout : $timeout;
        $data = array('lstUser' => array(), 'total' => 0);

        $param = 'domain=' . self::$_domain . '&sb=' . $searchBy . '&gid=' . $groupid . '&sid=' . $saleid . '&issale=' . $issale . '&status=' . $status . '&page=' . $page . '&numitem=' . $numitem . '&keyword=' . urlencode($keyword);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, self::$_service_url . 'user/search?' . $param);
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);

        //set header token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('SSOTOKEN: ' . JWT::ApiToken(self::$_domain, self::$_key)));
        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_POST, 0);
        //curl_setopt($ch,CURLOPT_POSTFIELDS, $postVal);

        //execute post
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        if (is_array($result)) {
            if ($result['err'] == '0') {
                $data['lstUser'] = $result['data']['lstUser'];
                $data['total'] = $result['data']['total'];
            }
        }

        return $data;
    }

    public static function group_list($timeout = 30)
    {
        $timeout = $timeout == 0 ? self::$_timeout : $timeout;
        $data = array();
        $param = 'domain=' . self::$_domain;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, self::$_service_url . 'user/group?' . $param);
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);

        //set header token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('SSOTOKEN: ' . JWT::ApiToken(self::$_domain, self::$_key)));
        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_POST, 0);
        //curl_setopt($ch,CURLOPT_POSTFIELDS, $postVal);

        //execute post
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        if (is_array($result)) {
            if ($result['err'] == '0') {
                $data = $result['data'];
            }
        }

        return $data;
    }

    public static function user_info($user_id, $timeout = 30)
    {
        $timeout = $timeout == 0 ? self::$_timeout : $timeout;
        $userInfo = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, self::$_service_url . 'user/info?user_id=' . $user_id . '&domain=' . self::$_domain);
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);

        //set header token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('SSOTOKEN: ' . JWT::ApiToken(self::$_domain, self::$_key)));

        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_POST, 0);
        //curl_setopt($ch,CURLOPT_POSTFIELDS, $postVal);

        //execute post
        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result, true);
        if (is_array($result)) {
            if ($result['err'] == 0 && $result['errmsg'] == '') {
                $userInfo = $result['data'];
            }
        }
        return $userInfo;
    }

}