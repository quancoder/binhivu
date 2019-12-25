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
        $header['title'] = 'Tìm kiếm tài liệu';

        $status  = 1;
        $start = 0;
        $limit = 12;
        $search = $this->input->get('search');
        $tag = $this->input->get('tag');
        $author = $this->input->get('author');
        $list = $this->Document_model->document_list_paging(ALL_USER, $status, $search, $tag, $start, $limit);

        $data['search'] = $search;
        $data['tag'] = $tag;
        $data['author'] = $author;
        $data['list'] = $list['list'];
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'document/document_search_view', $data);
        $this->_loadFooter();
    }

    function detail($p1, $id){
        $data= array();
        $info = $this->Document_model->document_info($id);

        if(empty($info)|| $info['doc_status'] !=1){
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
        if(!is_ip_address_spam('book-view-'.$id)){

            $this->Document_model->document_up_view($id);
        }
        $status  = 1;
        $start = 0;
        $limit = 12;
        $doc_list = $this->Document_model->document_list_paging(ALL_USER, $status, '', '', $start, $limit);
        $data['doc_list'] = $doc_list['list'];

        $data['info'] = $info;
        $header['title'] = $info['doc_name'];
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'document/document_detail_view', $data);
        $this->_loadFooter();
    }
}
