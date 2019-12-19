<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Gocthugian extends MY_Controller{

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
        $header['title'] = 'Góc thư giãn';

        $status  = 1;
        $start = 0;
        $limit = 12;
        $search_tt = $this->input->get('search');
        $funs_list = $this->Funs_model->funs_list_paging(ALL_USER, $status, $search_tt, '', $start, $limit);
        $funs_top_view = $this->Funs_model->funs_list_top_view(TOP_VIEW);
        $doc_top_view = $this->Document_model->document_list_top_view();
        $book_top_view = $this->Book_model->book_list_top_view();

        $data['funs_list'] = $funs_list['list'];
        $data['funs_top_view'] = $funs_top_view;
        $data['doc_top_view'] = $doc_top_view;
        $data['book_top_view'] = $book_top_view;
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'goc-thu-gian/goc_thu_gian_list_view', $data);
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
        $funs_list = $this->Funs_model->funs_list_paging(ALL_USER, $status, $search_tt, '', $start, $limit);
        $doc_top_view = $this->Document_model->document_list_top_view();
        $book_top_view = $this->Book_model->book_list_top_view();

        $data['doc_top_view'] = $doc_top_view;
        $data['book_top_view'] = $book_top_view;
        $data['funs_list'] = $funs_list['list'];
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'goc-thu-gian/search_view', $data);
        $this->_loadFooter();
    }

    function detail($p1, $id){
        $data= array();
        $info = $this->Funs_model->funs_info($id);

        if(empty($info)){
            redirect(site_url('goc-thu-gian.html'));
            die;
        }
        $seo = toURLFriendly($info['funs_title'], 'gtg', $info['funs_id']);
        if(current_url() != $seo)
        {
            redirect($seo);
            die;
        }

        //up view
        $sessionKey = 'ss_up_view_funs' . $id;
        if (!isset($_SESSION[$sessionKey])) {
            $_SESSION[$sessionKey] = 1;
            $this->Funs_model->funs_up_view($id);
        }

        $news_top = $this->News_model->news_list_top_view(10);
        $funs_top = $this->Funs_model->funs_list_top_view(10);
        $funs_top_view = $this->Funs_model->funs_list_top_view(TOP_VIEW);
        $doc_top_view = $this->Document_model->document_list_top_view();
        $book_top_view = $this->Book_model->book_list_top_view();

        $data['info'] = $info;
        $data['news_top'] = $news_top;
        $data['funs_top'] = $funs_top;
        $data['funs_top_view'] = $funs_top_view;
        $data['doc_top_view'] = $doc_top_view;
        $data['book_top_view'] = $book_top_view;
        $header['title'] = $info['funs_title'];
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'goc-thu-gian/goc_thu_gian_chi_tiet_view', $data);
        $this->_loadFooter();
    }
}
