<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tintuc extends MY_Controller{
	
    function __construct() {
        parent::__construct();
        $this->_module = trim(strtolower(__class__));
        // model
        $this->load->model('news/News_model');
        $this->load->model('funs/Funs_model');
    }
    
    function index()
    {
        $data = array();
    	// load header
    	$header = array();
    	$header['title'] = 'Tin tức';

        $news_list = $this->News_model->news_list_paging(-1, 1, '', '', 0, 12);
        $funs_top_view = $this->Funs_model->funs_list_top_view();
        $data['news_list'] = $news_list['list'];
        $data['funs_top_view'] = $funs_top_view;
    	$this->_loadHeader($header);
    	$this->load->view($this->_template_f . 'tin-tuc/tin_tuc_list_view', $data);
    	$this->_loadFooter();
    }

    function detail($p, $p2){

    }
}
