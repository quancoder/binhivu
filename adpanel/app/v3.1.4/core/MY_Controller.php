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
        $this->_langcode_id = $this->config->get_langcode_id($this->_langcode);
		
        $this->_template_f = $this->config->item('template_f');
        $this->_product_name = PRODUCT_NAME;
        $this->load->language('common', $this->_langcode);
        $this->_common_lang = $this->lang->line('common');
		
        $this->_validUrl();
		
		$mobileDetect = new MobileDetect();
		$this->_isMobile = $mobileDetect->isMobile();
		$this->_isTablet = $mobileDetect->isTablet();
		
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
        $preHeader['sesemail'] = '';
        $preHeader['sesphone'] = '';
        
		$preHeader['isLogin'] = false;
        $preHeader['role'] = '';
        $preHeader['langcode_url'] = '';
        
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
			$preHeader['sesemail'] = $this->_session_email();
			$preHeader['sesphone'] = $this->_session_phone();
			
            $preHeader['role'] = $this->_session_role();
        }
        
        // assign all common param to view
        $this->load->view($this->_template_f . 'preheader_view', $preHeader);
    }

    protected function _loadHeader($title = '')
    {
        $this->load->model('contact/Contact_model');
        $new_contact = $this->Contact_model->contact_list(0);

        $header = array();
		$header['title'] = $title == '' ? $this->_product_name . ' - Administartor' : $this->_product_name . ' - ' . $title;
		$header['function'] = $this->_function;
        $header['module'] = $this->router->class;
        $header['new_contact'] = count($new_contact);
		// load header
		$this->load->view($this->_template_f . 'header_view', $header);
    }

    protected function _loadFooter()
    {
        $this->load->view($this->_template_f . 'footer_view');
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
    
    function _session_uid()
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

    protected function _session_groupid()
    {
        $groupid = (int)trim(@$_SESSION['groupid']);
        $groupid = is_numeric($groupid) && $groupid >= 0 ? $groupid : 0;
        return $groupid;
    }

    function _session_uname()
    {
        $uname = @$_SESSION['uname'];
        $uname = strtolower($uname);
        $uname = preg_match('/^[a-z0-9_\-\.]+$/',$uname) ? $uname : '';
        return $uname;
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
    
    protected function _islogin()
    {
        $user_id = $this->_session_uid();
        $uname = $this->_session_uname();
        return ($user_id > 0 && $uname != '') ? TRUE : FALSE;
    }
    
    protected function _isadmin()
    {
    	$role = $this->_session_role();
		
		// la supper admin
		if($role == -1)
		{
			return true;
		}
		else
		{
			return false;
		}
    }
    
    /*
    * Check xem user da login hay chua va neu da login thi co phai la admin hay khong
    * Neu ajax request:
	* 	chua login se tra lai string: NOT_LOGIN
	* 	khong phai admin tra lai string: NOT_RIGHT
	* Neu khong phai ajax request:
	* 	chua login => redirect to login 
	*	khong phai admin => redirect to front-end page
    */
    function _checkAdminPermission()
    {
    	if($this->input->is_ajax_request())
    	{
    		if(!$this->_islogin())
    		{
				dbClose();
				echo NOT_LOGIN;
				die();
    		}
    		else if(!$this->_isadmin())
    		{
    			dbClose();
				echo NOT_RIGHT;
				die();
    		}
    	}
    	else
    	{
    		if(!$this->_islogin())
    		{
    			$currUrl = getCurrentUrl();
				dbClose();
				redirect(site_url('authenticate/sign?url=' . urlencode($currUrl), $this->_langcode));
				die();
    		}
    		else if(!$this->_isadmin())
    		{
    			dbClose();
				redirect(ROOT_DOMAIN);
				die();
    		}
    	}
    }
}