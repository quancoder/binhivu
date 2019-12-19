<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class News extends MY_Controller{

    function __construct() {
        parent::__construct();
        $this->_module = trim(strtolower(__class__));
        // model
        $this->load->model('news/News_model');
        $this->load->model('funs/Funs_model');
        $this->load->model('document/Document_model');
        $this->load->model('book/Book_model');
    }
    
    function index()
    {
        $data = array();
    	// load header
    	$header = array();
    	$header['title'] = 'Tin tức';

        $status  = 1;
        $start = 0;
        $limit = 12;
        $search_tt = $this->input->get('search');
        $news_list = $this->News_model->news_list_paging(ALL_USER, $status, $search_tt, '', $start, $limit);
        $news_top_view = $this->News_model->news_list_top_view(TOP_VIEW);
        $doc_top_view = $this->Document_model->document_list_top_view();
        $book_top_view = $this->Book_model->book_list_top_view();
        
        $data['news_list'] = $news_list['list'];
        $data['news_top_view'] = $news_top_view;
        $data['doc_top_view'] = $doc_top_view;
        $data['book_top_view'] = $book_top_view;
    	$this->_loadHeader($header);
    	$this->load->view($this->_template_f . 'news/news_list_view', $data);
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
        $this->load->view($this->_template_f . 'news/search_view', $data);
        $this->_loadFooter();
    }

    function detail($p1, $id){
        $data= array();
        $info = $this->News_model->news_info($id);

        if(empty($info)){
            redirect(site_url('tin-tuc.html'));
            die;
        }
        $seo = toURLFriendly($info['news_title'], 'tt', $info['news_id']);
        if(current_url() != $seo)
        {
            redirect($seo);
            die;
        }

        //up view
        $sessionKey = 'ss_up_view_news_' . $id;
        if (!isset($_SESSION[$sessionKey])) {
            $_SESSION[$sessionKey] = 1;
            $this->News_model->news_up_view($id);
        }

        $news_top = $this->News_model->news_list_top_view(10);
        $funs_top = $this->Funs_model->funs_list_top_view(10);
        $news_top_view = $this->News_model->news_list_top_view(TOP_VIEW);
        $doc_top_view = $this->Document_model->document_list_top_view();
        $book_top_view = $this->Book_model->book_list_top_view();

        $data['info'] = $info;
        $data['news_top'] = $news_top;
        $data['funs_top'] = $funs_top;
        $data['news_top_view'] = $news_top_view;
        $data['doc_top_view'] = $doc_top_view;
        $data['book_top_view'] = $book_top_view;
        $header['title'] = $info['news_title'];
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'news/news_detail_view', $data);
        $this->_loadFooter();
    }
}
