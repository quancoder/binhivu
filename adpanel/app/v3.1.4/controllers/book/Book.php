<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends MY_Controller {
	
	function __construct()
	{
		$this->_module = trim(strtolower(__class__));
		parent::__construct();
		
		$this->_checkAdminPermission();
        // model
        $this->load->model('book/Book_model');
	}
	
	function index()
	{
	    $data = array();

        //get value
        $status = trim($this->input->get('status'));
        $search = trim($this->input->get('search'));
        $tag = trim($this->input->get('tag'));
        $author = trim($this->input->get('author'));
        $nxb = trim($this->input->get('nxb'));
        $page = trim($this->input->get('page'));
        $num = trim($this->input->get('num'));

        //validate value
        $status = in_array($status, array('-1','1','2','3','4')) ? $status : '-1';
        $page = is_numeric($page) && $page > 0  ? $page : 1;
        $num = is_numeric($num) && $num > 0  ? $num : 30;

        //get data
        $user_id = $this->_session_uid();

	    $list = $this->Book_model->book_list_paging($user_id, $status, $search, $tag, $author, $nxb, ($page-1)*$num, $num);

        //set value
        $data['status'] = $status;
        $data['search'] = $search;
        $data['tag'] = $tag;
        $data['page'] = $page;
        $data['author'] = $author;
        $data['nxb'] = $nxb;
        $data['num'] = $num;
	    $data['list'] = $list['list'];

		$this->_loadHeader();
		$this->load->view($this->_template_f . 'book/book_view', $data);
		$this->_loadFooter();
	}

    function add()
    {
        $data = array();

        $data['doc_name'] = '';
        $data['doc_des'] = '';
        $data['doc_content'] = '';
        $data['doc_image'] = '';
        $data['doc_path_file'] = '';
        $data['doc_tag'] = '';
        $data['doc_free'] = '';
        $data['doc_price'] = 0;
        $data['doc_id'] = 0;
        $data['error']= array();

        if(isset($_POST['doc_name'])){
            $data = $this->_add_process($data);
        }

        $this->_loadHeader();
        $this->load->view($this->_template_f . 'document/document_add_view', $data);
        $this->_loadFooter();
    }

    function edit($id)
    {
        $data = array();
        $data['success'] = null;
        $data['error']= array();

        $info  = $this->Book_model->book_info($id);
        if(empty($info)){
            redirect(site_url('Book'));
            die;
        }
        $data['info'] = $info;
        if(isset($_POST['b_name'])){
            $data = $this->_edit_process($data, $id);
        }

        $this->_loadHeader();
        $this->load->view($this->_template_f . 'book/book_edit_view', $data);
        $this->_loadFooter();
    }

    private function _add_process($data)
    {
        $doc_name = $this->input->post('doc_name', true);
        $doc_des = $this->input->post('doc_des', true);
        $doc_tag = $this->input->post('doc_tag', true);
        $doc_price = $this->input->post('doc_price', true);
        $doc_free = $this->input->post('doc_free', true);
        $doc_path_file = $this->input->post('doc_path_file', true);
        $doc_image = $this->input->post('doc_image', true);
        $doc_content = $this->input->post('doc_content', true);
        $doc_status_1 = $this->input->post('doc_status_1', true);//news_status_1 = public
        $doc_status_4 = $this->input->post('doc_status_4', true);//news_status_4 = trash

        $doc_name == '' ? $data['error']['doc_name'] = TRUE : $data['doc_name'] = $doc_name;
        $doc_des == '' ? $data['error']['doc_des'] = TRUE :  $data['doc_des'] = $doc_des;
        !is_numeric($doc_price) || $doc_price < 0  ? $data['error']['doc_price'] = TRUE :  $data['doc_price'] = $doc_price;
        !in_array($doc_free, array(null, 'on'))  ? $data['error']['doc_free'] = TRUE :  $data['doc_free'] = $doc_price = $doc_free =='on' ? 1 : 0;;
        !is_file_in_public_dir ($doc_path_file, ROOT_DOMAIN.'/public/images')? $data['error']['doc_path_file'] = TRUE : $data['doc_path_file'] = $doc_path_file;
        !is_file_in_public_dir ($doc_image, ROOT_DOMAIN.'/public/images')? $data['error']['doc_image'] = TRUE : $data['doc_image'] = $doc_image;
        $doc_content == '' ? $data['error']['doc_content'] = TRUE : $data['doc_content'] = $doc_content;

        if($doc_status_1 == "ok" && $doc_status_4 == "" ){
            $doc_status = 1;
        }else if($doc_status_1 == "" && $doc_status_4 == "ok"){
            $doc_status = 4;
        }else{
            $doc_status = '';
            $data['error']['news_status'] = TRUE;
        }

        if (empty($data['error'])) {
            $user_id = $this->_session_uid();
            $newid = $this->Book_model->book_insert($doc_name, $doc_des, $doc_content, get_path_file($doc_image), $doc_tag, get_path_file($doc_path_file),$doc_free , $doc_price, $doc_status, $user_id);
            if ($newid > 0){
                $data['doc_id'] = $newid;
            }else{
                $data['error']['execute'] = TRUE;
            }
        }
        return $data;
    }

    private function _edit_process($data, $b_id)
    {
        $b_name = $this->input->post('b_name');
        $b_des = $this->input->post('b_des');
        $b_content = $this->input->post('b_content');
        $b_image = $this->input->post('b_image');
        $b_path_file = $this->input->post('b_path_file');
        $b_total_book = 1;
        $b_tag= $this->input->post('b_tag');
        $b_free= $this->input->post('b_free', false);
        $b_price = $this->input->post('b_price', false);
        $b_author= $this->input->post('b_author');
        $b_nxb= $this->input->post('b_nxb');
        $b_status = $this->input->post('b_status');


        $b_name == '' ? $data['error']['b_name'] = TRUE : $data['info']['b_name'] = $b_name;
        $b_des == '' ? $data['error']['b_des'] = TRUE :  $data['info']['b_des'] = $b_des;
        $b_content == '' ? $data['error']['b_content'] = TRUE : $data['info']['b_content'] = $b_content;
        /****/
        if(is_file_in_public_dir ($b_image, ROOT_DOMAIN.'/public/images')){
            $data['info']['b_image'] = $b_image = get_path_file($b_image);
        }
        else
        {
            $data['error']['b_image'] = TRUE;
        }
        /****/
        if(is_file_in_public_dir($b_path_file, ROOT_DOMAIN.'/public/images'))
        {
            $data['info']['b_path_file'] = $b_path_file = get_path_file($b_path_file);
        }
        else
        {
            $data['error']['b_path_file'] = TRUE;
        }
        /****/
        $data['info']['b_tag'] = $b_tag;
        /****/
        if(!in_array($b_free, array(null, 'on')) ) {
            $data['error']['b_free'] = TRUE;
        }else {
            $b_free = $b_free == 'on' ? 1 : 0;
            $data['info']['b_free'] = $b_free;
        }
        /****/
        if(!is_numeric($b_price) || $b_price < 0){
            $data['error']['b_price'] = TRUE ;
        }else{
            $data['info']['b_price'] = $b_price;
        }
        /****/
        $data['info']['b_author'] = $b_author;
        $data['info']['b_nxb'] = $b_nxb;
        /****/

        $b_status != in_array($b_status, array('1','2', '3', '4')) ?
            $data['error']['b_status'] = TRUE :
            $data['info']['b_status'] = $b_status;

        if (empty($data['error'])) {
            var_dump($b_id, $b_name, $b_des, $b_content, $b_image, $b_path_file, $b_total_book, $b_tag, $b_free, $b_price,$b_author, $b_nxb, $b_status);die;
            $isUpdate = $this->Book_model->book_update($b_id, $b_name, $b_des, $b_content, $b_image, $b_path_file, $b_total_book, $b_tag, $b_free, $b_price,$b_author, $b_nxb, $b_status);
            if ($isUpdate == TRUE){
                $data['success'] = TRUE;
            }else{
                $data['success'] = FALSE;
                $data['error']['execute'] = TRUE;
            }
        }
        return $data;
    }
}