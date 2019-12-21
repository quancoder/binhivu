<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Document extends MY_Controller{

    function __construct() {
        parent::__construct();
        $this->_module = trim(strtolower(__class__));
        // model
        $this->load->model('news/News_model');
        $this->load->model('funs/Funs_model');
        $this->load->model('document/Document_model');
        $this->load->model('book/Book_model');
        $this->load->model('document/Document_model');
    }
    
    function index()
    {
        $data = array();
    	// load header
    	$header = array();
    	$header['title'] = 'Tài liệu';
        $data['q'] ='';
        $data['order'] ='';

        $status  = 1;
        $start = 0;
        $limit = 12;
        $q = $this->input->get('q');
        $order = $this->input->get('order');
        if(in_array($q, array('-1', '0','1')) and in_array($order, array('asc','desc')))
        {
            $doc_list = $this->Document_model->document_filter($q, $order);
            $data['doc_list'] = $doc_list;
            $data['q'] =$q;
            $data['order'] =$order;
        }
        else
        {
            $doc_list = $this->Document_model->document_list_paging(ALL_USER, $status, '', '', $start, $limit);
            $data['doc_list'] = $doc_list['list'];
        }
        $book_top = $this->Book_model->book_list_top_view();

        $data['book_top'] = $book_top;
    	$this->_loadHeader($header);
    	$this->load->view($this->_template_f . 'document/document_list_view', $data);
    	$this->_loadFooter();
    }

    function search(){
        $data = array();
        // load header
        $header = array();
        $header['title'] = 'Tin tức';

        $status  = 1;
        $start = 0;
        $limit = 12;
        $search_tt = $this->input->get('search');
        $news_list = $this->News_model->news_list_paging(ALL_USER, $status, $search_tt, '', $start, $limit);
        $doc_top_view = $this->Document_model->document_list_top_view();
        $book_top_view = $this->Book_model->book_list_top_view();

        $data['doc_top_view'] = $doc_top_view;
        $data['book_top_view'] = $book_top_view;
        $data['news_list'] = $news_list['list'];
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'tin-tuc/search_view', $data);
        $this->_loadFooter();
    }

    function detail($p1, $id){
        $data= array();
        $info = $this->Document_model->document_info($id);

        if(empty($info)){
            redirect(site_url('tai-lieu.html'));
            die;
        }
        $seo = toURLFriendly($info['doc_name'], 'document', $info['doc_id']);
        if(current_url() != $seo)
        {
            redirect($seo);
            die;
        }

        //up view
        $sessionKey = 'ss_up_view_news_' . $id;
        if (!isset($_SESSION[$sessionKey])) {
            $_SESSION[$sessionKey] = 1;
            //$this->News_model->news_up_view($id);
        }

        $data['info'] = $info;
        $header['title'] = $info['doc_name'];
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'document/document_detail_view', $data);
        $this->_loadFooter();
    }
}
