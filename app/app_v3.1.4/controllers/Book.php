<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Book extends MY_Controller{

    function __construct() {
        parent::__construct();
        $this->_module = trim(strtolower(__class__));
        // model
        $this->load->model('News_model');
        $this->load->model('Funs_model');
        $this->load->model('Document_model');
        $this->load->model('Book_model');
        $this->load->model('Document_model');
    }
    
    function index()
    {
        $data = array();
    	// load header
    	$header = array();
    	$header['title'] = 'Sách';
        $data['q'] ='';
        $data['order'] ='';

        $search=$tag=$author=$nxb = '';
        $status  = 1;
        $start = 0;
        $limit = 12;
        $q = $this->input->get('q');
        $order = $this->input->get('order');
        $tag = $this->input->get('tag');
        if(in_array($q, array('-1', '0','1')) and in_array($order, array('asc','desc')))
        {
            $book_list = $this->Book_model->book_filter($q, $order);
            $data['book_list'] = $book_list;
            $data['q'] =$q;
            $data['order'] =$order;
        }
        else
        {
            $book_list = $this->Book_model->book_list_paging(ALL_USER, $status, $search, $tag,$author,$nxb, $start, $limit);
            $data['book_list'] = $book_list['list'];
        }

        $book_top = $this->Book_model->book_list_top_view();
        $data['book_top'] = $book_top;
    	$this->_loadHeader($header);
    	$this->load->view($this->_template_f . 'book/book_list_view', $data);
    	$this->_loadFooter();
    }

    function search(){
        $data = array();
        // load header
        $header = array();
        $header['title'] = 'Tìm kiếm';

        $status  = 1;
        $start = 0;
        $limit = 12;
        $search = $this->input->get('search');
        $tag = $this->input->get('tag');
        $author = $this->input->get('author');
        $nxb = $this->input->get('nxb');
        $list = $this->Book_model->book_list_paging(ALL_USER, $status, $search, $tag,$author,$nxb, $start, $limit);

        $data['list'] = $list['list'];
        $data['search'] = $search;
        $data['tag'] = $tag;
        $data['author'] = $author;
        $data['nxb'] = $nxb;
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'book/book_search_view', $data);
        $this->_loadFooter();
    }

    function detail($p1, $id){
        $data= array();
        $info = $this->Book_model->book_info($id);

        if(empty($info) || $info['b_status'] !=1){
            redirect(site_url('book.html'));
            die;
        }
        $seo = toURLFriendly($info['b_name'], 'book', $info['b_id']);
        if(current_url() != $seo)
        {
            redirect($seo);
            die;
        }

        //up view
        $spam = is_ip_address_spam('book-'.$id, TIME_SPAM);
        if ($spam == false){

            $this->Book_model->book_up_view($id);
        }

        $search=$tag=$author =$nxb = '';
        $status  = 1;
        $start = 0;
        $limit = 12;
        $book_list = $this->Book_model->book_list_paging(ALL_USER, $status, $search, $tag,$author,$nxb, $start, $limit);
        $data['book_list'] = $book_list['list'];

        $data['info'] = $info;
        $header['title'] = $info['b_name'];
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'book/book_detail_view', $data);
        $this->_loadFooter();
    }
}
