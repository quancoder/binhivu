<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

define('ALL_USER',  '-1');
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

        $top_view = 10;
        $status  = 1;
        $start = 0;
        $limit = 12;

        $news_list = $this->News_model->news_list_paging(ALL_USER, $status, '', '', $start, $limit);
        $news_top_view = $this->News_model->news_list_top_view($top_view);
        $data['news_list'] = $news_list['list'];
        $data['news_top_view'] = $news_top_view;
    	$this->_loadHeader($header);
    	$this->load->view($this->_template_f . 'tin-tuc/tin_tuc_list_view', $data);
    	$this->_loadFooter();
    }

    function detail($p, $p2){

    }
}
