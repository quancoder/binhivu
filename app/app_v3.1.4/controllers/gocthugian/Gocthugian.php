<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
define('ALL_USER',  '-1');
class Gocthugian extends MY_Controller{

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

        $top_view = 10;
        $status  = 1;
        $start = 0;
        $limit = 12;

        $funs_list = $this->Funs_model->funs_list_paging(ALL_USER, $status, '', '', $start, $limit);
        $funs_top_view = $this->Funs_model->funs_list_top_view($top_view);
        $data['funs_list'] = $funs_list['list'];
        $data['funs_top_view'] = $funs_top_view;
    	$this->_loadHeader($header);
    	$this->load->view($this->_template_f . 'goc-thu-gian/goc_thu_gian_list_view', $data);
    	$this->_loadFooter();
    }

    function detail($p1, $p2){
        var_dump($p1, $p2);
    }
}
