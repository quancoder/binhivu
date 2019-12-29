<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
    function __construct() {
        parent::__construct();
        $this->_module = trim(strtolower(__class__));
        // model
        $this->load->model('News_model');
        $this->load->model('Funs_model');
        $this->load->model('Document_model');
        $this->load->model('Book_model');
    }

    function index()
    {
        $data = array();
    	// load header
    	$header = array();
    	$header['title'] = 'Trang chủ';

        $news_list = $this->News_model->news_list_paging(-1, 1, '', '', 0, 12);
        $news_top_view = $this->News_model->news_list_top_view();
        $funs_list = $this->Funs_model->funs_list_paging(-1, 1, '', '', 0, 12);
        $funs_top_view = $this->Funs_model->funs_list_top_view();
        $doc_top_view = $this->Document_model->document_list_top_view();
        $book_top_view = $this->Book_model->book_list_top_view();
        $data['news_list'] = $news_list['list'];
        $data['news_top_view'] = $news_top_view;
        $data['funs_list'] = $funs_list['list'];
        $data['funs_top_view'] = $funs_top_view;
        $data['doc_top_view'] = $doc_top_view;
        $data['book_top_view'] = $book_top_view;
    	$this->_loadHeader($header);
    	$this->load->view($this->_template_f . 'home/home_view', $data);
    	$this->_loadFooter();
    }
    function search(){
        $search = $this->input->get('search');
        $tag = $this->input->get('tag');
        $type = $this->input->get('type');
        if($type==1){
            redirect('tim-kiem-tin-tuc.html?tag='.$tag.'&search='.$search.'&type='.$type);die;
        } if($type==2){
            redirect('tim-kiem-thu-gian.html?tag='.$tag.'&search='.$search.'&type='.$type);die;
        }else if($type==3){
            redirect('tim-kiem-sach.html?tag='.$tag.'&search='.$search.'&type='.$type);die;
        }else if($type==4){
            redirect('tim-kiem-tai-lieu.html?tag='.$tag.'&search='.$search.'&type='.$type);die;
        }else{
            redirect(site_url());
        }
    }
}
