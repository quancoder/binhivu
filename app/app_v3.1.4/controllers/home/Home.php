<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
    function __construct() {
        parent::__construct();
        $this->_module = trim(strtolower(__class__));
    }
    
    function index()
    {
        $data = array();
    	// load header
    	$header = array();
    	$header['title'] = 'Trang chủ';
    
    	$this->_loadHeader($header);
    
    	$this->load->view($this->_template_f . 'home/home_view', $data);
    	$this->_loadFooter();
    }
    
}
