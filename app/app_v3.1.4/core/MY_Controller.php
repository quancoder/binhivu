<?php if (!defined('BASEPATH')){exit('No direct script access allowed');}

class MY_Controller extends CI_Controller
{
    var $_template_f = '';
    var $_langcode = '';
    var $_langcode_id = '';
    var $_languri = '';
    var $_module = '';
    var $_function = '';
    var $_product_name = '';
    var $_isMobile = false;
    var $_isTablet = false;
    
    // common lang
    var $_common_lang = NULL;
	
	public function __construct()
    {
		parent::__construct();
		
        $this->_langcode = get_langcode();
        $this->_langcode_id = get_langcode_id($this->_langcode);
		
        $this->_template_f = TEMPLATE_FOLDER;
        $this->_product_name = PRODUCT_NAME;
        $this->load->language('common', $this->_langcode);
        $this->_common_lang = $this->lang->line('common');
		
        $this->_validUrl();
        
        $this->_permission_role();
		
		$this->_isMobile = $this->config->item('isMobile');
		$this->_isTablet = $this->config->item('isTablet');
		
        // init and assign common value to view: language, common lang
        $preHeader = array();
		$preHeader['isMobile'] = $this->_isMobile;
		$preHeader['isTablet'] = $this->_isTablet;
		
        $preHeader['common_lang'] = $this->_common_lang;
        $preHeader['langcode'] = $this->_langcode;
        $preHeader['langcodeid'] = $this->_langcode_id;
        
        $preHeader['template_f'] = $this->_template_f;
        $preHeader['module'] = $this->_module;
        $preHeader['function'] = $this->_function;
        $preHeader['product_name'] = $this->_product_name;
        
        $preHeader['username'] = '';
        $preHeader['userid'] = 0;
        $preHeader['groupid'] = '';
        $preHeader['sesemail'] = '';
        $preHeader['sesphone'] = '';
        $preHeader['isp'] = 0;
        $preHeader['ispuname'] = 0;
		$preHeader['isLogin'] = false;
        $preHeader['role'] = '';
        $preHeader['issale'] = '';
        $preHeader['langcode_url'] = '';
        
        
        $preHeader['srvuid'] = 0;
		$preHeader['srvuname'] = '';
		$preHeader['sviewuid'] = 0;
		$preHeader['sviewuname'] = '';
		// view only
		$preHeader['vonid'] = 0;
		$preHeader['vonuname'] = '';
		
		// is superview
  		$preHeader['issuperview'] = FALSE;
		
        // set lang code for multi language url
        $arrLang = $this->config->item('lang_uri_abbr');
        $langcodeUrl = '';
        if (MULTI_LANGUAGE)
        {
            foreach ($arrLang as $key => $langItem)
            {
                if ($this->_langcode == $langItem)
                {
                    $langcodeUrl = $key;
                    break;
                }
            }
        }
        
        $preHeader['langcode_url'] = $langcodeUrl;
        
        if ($this->_islogin())
        {
        	$preHeader['isLogin'] = true;
        	
            $preHeader['username'] = $this->_session_uname();
            $preHeader['userid'] = $this->_session_uid();
            $preHeader['groupid'] = $this->_session_groupid();
			$preHeader['sesemail'] = $this->_session_email();
			$preHeader['sesphone'] = $this->_session_phone();
			$preHeader['issale'] = $this->_session_issale();
			
            $preHeader['role'] = $this->_session_role();
            
            $preHeader['isp'] = $this->_session_isp();
            // isp username
            $preHeader['ispuname'] = $this->_session_isp_uname();
            
            
            $preHeader['srvuid'] = $this->_session_serving_uid();
			$preHeader['srvuname'] = $this->_session_serving_uname();
			
		 	//supper view
			$preHeader['sviewuid'] = $this->_session_superview_uid();
			$preHeader['sviewuname'] = $this->_session_supperview_uname();
			// is superview
            $preHeader['issuperview'] = $this->_is_superview();
            
			// view only
			$preHeader['vonid'] = $this->_session_vonuid();
			$preHeader['vonuname'] = $this->_session_vonuname();
        }
        
        // assign all common param to view
        $this->load->view($this->_template_f . 'preheader_view', $preHeader);
    }

    protected function _loadHeader($data = NULL, $loadHeader = TRUE)
    {
        $header = array();
		$header['function'] = $this->_function;
        $header['title'] = isset($data['title']) ? $data['title'] : '';
        $header['metaTitle'] = isset($data['metaTitle']) ? $data['metaTitle'] : '';
        $header['metaKeyword'] = isset($data['metaKeyword']) ? $data['metaKeyword'] : '';
        $header['metaDesc'] = isset($data['metaDesc']) ? $data['metaDesc'] : '';
		$header['metaImage'] = isset($data['metaImage']) ? $data['metaImage'] : '';
        $header['loadHeader'] = $loadHeader;
       
        // load header
        $this->load->view($this->_template_f . 'header_view', $header);
    }

    protected function _loadFooter()
    {
    	$footerData = array();
    	$footerData['function'] = $this->_function;
    	$this->load->view($this->_template_f . 'footer_view', $footerData);
    }

    protected function _validUrl()
    {
        $url = HTTP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];
        $text = $url;

        $text = rawurldecode($text);
        $text = htmlspecialchars_decode(html_entity_decode($text, ENT_QUOTES | ENT_IGNORE, "UTF-8"),
                                        ENT_QUOTES | ENT_IGNORE);
        $text = trim($text);
        $url = $text;
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
        $text = strip_tags($text);
        if ($text != $url)
        {
            dbClose();
            show_404('', FALSE);
            die();
        }
    }
    
    protected function _getActionLogsUid()
    {
        // check switch user
        $supper_admin_uid = $this->_session_isp();
        $supper_view_uid = $this->_session_superview_uid();
        $serving_uid = $this->_session_serving_uid();
        $viewonly_uid = $this->_session_vonuid();

        if ($supper_admin_uid > 0)
        {
            $logsUid = $supper_admin_uid;
        }
        else
        {
            if ($serving_uid > 0)
            {
                $logsUid = $serving_uid;
            }
            else
            {
                if ($supper_view_uid > 0)
                {
                    $logsUid = $supper_view_uid;
                }
                else
                {
                    if ($viewonly_uid > 0)
                    {
                        $logsUid = $viewonly_uid;
                    }
                    else
                    {
                        $logsUid = $this->_session_uid();
                    }
                }
            }
        }

        return $logsUid;
    }
    
    protected function _session_uid()
    {
        $user_id = trim(@$_SESSION['uid']);
        $user_id = isIdNumber($user_id) ? $user_id : 0;
        return $user_id;
    }

    protected function _session_role()
    {
        $role = trim(@$_SESSION['role']);
        $role = $role >= -1 && $role <= 11 && is_numeric($role) ? $role : 3;
        return $role;
    }

    protected function _session_uname()
    {
        $uname = @$_SESSION['uname'];
        $uname = strtolower($uname);
        $uname = preg_match('/^[a-z0-9_\-\.]+$/',$uname) ? $uname : '';
        return $uname;
    }

	protected function _session_groupid()
    {
        $groupid = (int)trim(@$_SESSION['groupid']);
        $groupid = is_numeric($groupid) && $groupid >= 0 ? $groupid : 0;
        return $groupid;
    }

    protected function _session_isp()
    {
        $isp = trim(@$_SESSION['isp']);
        $isp =($isp);
        $isp = isIdNumber($isp) ? $isp : 0;
        return $isp;
    }
    
    protected function _session_email()
    {
        $email = trim(@$_SESSION['email']);
        $email = validEmail($email) ? $email : '';
        return $email;
    }
    
    protected function _session_phone()
    {
        $phone = trim(@$_SESSION['phone']);
        return $phone;
    }
    
    protected function _session_isp_uname()
    {
    	$isp_uname = trim(@$_SESSION['buname']);
    	$isp_uname = preg_match('/^[a-z0-9_\-\.]+$/', $isp_uname) ? $isp_uname : '';
        return $isp_uname;
    }
    
    protected function _session_issale()
    {
        // check is sale
        $is_sale = trim(@$_SESSION['issale']);
        $is_sale = $is_sale == '1' ? TRUE : FALSE;
        return $is_sale;
    }
    
    protected function _islogin()
    {
        $user_id = $this->_session_uid();
        $uname = $this->_session_uname();
        return ($user_id > 0 && $uname != '') ? TRUE : FALSE;
    }
    
    protected function _is_superview()
    {
        $super_view = trim(@$_SESSION['role']);
        $super_view = (isIdNumber($super_view) && $super_view == 9) ? TRUE : FALSE;
        return $super_view;
    }
    
    // session supper view user id
    protected function _session_superview_uid()
    {
        $supper_view_uid = trim(@$_SESSION['ispsview']);
        $supper_view_uid =($supper_view_uid);
        $supper_view_uid = isIdNumber($supper_view_uid) ? $supper_view_uid : 0;
        return $supper_view_uid;
    }
    
    protected function _session_supperview_uname()
    {
        $super_view_uname = trim(@$_SESSION['sviewuname']);
        $super_view_uname = preg_match('/^[a-z0-9_\.]+$/', $super_view_uname) ? $super_view_uname : '';
        return $super_view_uname;
    }
    
    // session user id serving
    protected function _session_serving_uid()
    {
        $serving_uid = trim(@$_SESSION['ispsrv']);
        $serving_uid =($serving_uid);
        $serving_uid = isIdNumber($serving_uid) ? $serving_uid : 0;
        return $serving_uid;
    }

    protected function _session_serving_uname()
    {
        $serving_uname = trim(@$_SESSION['srvuname']);
        $serving_uname = preg_match('/^[a-z0-9_\.]+$/', $serving_uname) ? $serving_uname : '';
        return $serving_uname;
    }
    
    // check user is view only
    protected function _session_vonuid()
    {
        $vonuid = trim(@$_SESSION['vonid']);
        $vonuid = isIdNumber($vonuid) ? $vonuid : 0;
        return $vonuid;
    }
    
    protected function _session_vonuname()
    {
        $von_uname = trim(@$_SESSION['vonuname']);
        $von_uname = preg_match('/^[a-z0-9_\.]+$/', $von_uname) ? $von_uname : '';
        return $von_uname;
    }
    
    protected function _permission_role()
    {
        if ($this->_islogin())
        {
            $permitid = $this->_session_role();
            $isp = $this->_session_isp();
            $user_id = $this->_session_uid();

            //Quyen cho publisher
            if (in_array($permitid, array(1)))
            {
                if (!in_array($this->uri->rsegment(1), array(
                    'breview',
                    'account',
                    'logout',
                    'suser',
                    'banner'
                ))
                )
                {	
                    redirect(site_url('breview', $this->_langcode));
                    die();
                }
                else
                {
                	if($this->uri->rsegment(1) == 'banner')
                	{
                		if($this->uri->rsegment(2) != 'preview')
                		{
                			redirect(site_url('breview', $this->_langcode));
                    		die();
                		}
                	}
                }
            }
        }
    }
}