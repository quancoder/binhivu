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

        $data['info']['b_name']         = '';
        $data['info']['b_des']          = '';
        $data['info']['b_content']      = '';
        $data['info']['b_image']        = '' ;
        $data['info']['b_path_file']    = '';
        $data['info']['b_tag']          = '';
        $data['info']['b_free']         = 1;
        $data['info']['b_price']        = 0;
        $data['info']['b_author']       = '';
        $data['info']['b_nxb']          = '';
        $data['success'] = null;
        $data['error']= array();

        if(isset($_POST['b_name'])){
            $data = $this->_add_process($data);
        }

        $this->_loadHeader();
        $this->load->view($this->_template_f . 'book/book_add_view', $data);
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
        /**GET VALUE PARAMS**/
        $b_name     = $this->input->post('b_name');
        $b_des      = $this->input->post('b_des');
        $b_content  = $this->input->post('b_content');
        $b_image    = $this->input->post('b_image');
        $b_path_file= $this->input->post('b_path_file');
        $b_tag      = $this->input->post('b_tag');
        $b_free     = $this->input->post('b_free');
        $b_price    = $this->input->post('b_price');
        $b_author   = $this->input->post('b_author');
        $b_nxb      = $this->input->post('b_nxb');
        $b_status_1 = $this->input->post('b_status_1');//1 = public
        $b_status_4 = $this->input->post('b_status_4');//4 = trash

        /**VALIDATE**/
        $b_name     == '' ? $data['error']['b_name']    = TRUE : null;
        $b_des      == '' ? $data['error']['b_des']     = TRUE : null;
        $b_content  == '' ? $data['error']['b_content'] = TRUE : null;
        if(!is_file_in_public_folder ($b_image)){

            $data['error']['b_image'] = TRUE;
        }
        if(!is_file_in_public_folder($b_path_file)){
            $data['error']['b_path_file'] = TRUE;
        }
        if(!in_array($b_free, array(null, 'on')) ) {
            $data['error']['b_free'] = TRUE;
        }
        if($b_price != '' && !is_numeric($b_price)){
            $data['error']['b_price'] = TRUE ;
        }

        if($b_status_1 == "ok" && $b_status_4 == "" ){
            $b_status = 1;
        }else if($b_status_1 == "" && $b_status_4 == "ok"){
            $b_status = 4;
        }else{
            $b_status = '';
            $data['error']['b_status'] = TRUE;
        }

        /**SET VALUE **/
        $data['info']['b_name']         = $b_name;
        $data['info']['b_des']          = $b_des;
        $data['info']['b_content']      = $b_content;
        $data['info']['b_image']        = $b_image ;
        $data['info']['b_path_file']    = $b_path_file;
        $data['info']['b_tag']          = $b_tag;
        $data['info']['b_free']         = $b_free = $b_free == 'on' ? 1 : 0;
        $data['info']['b_price']        = $b_price;
        $data['info']['b_author']       = $b_author;
        $data['info']['b_nxb']          = $b_nxb;

        if (empty($data['error'])) {
            $user_id = $this->_session_uid();
            $newid = $this->Book_model->book_insert($b_name,$b_des,$b_content, $b_image, $b_path_file, 1, $b_tag, $b_free, $b_price, $b_author, $b_nxb, $b_status, $user_id);
            if ($newid > 0){
                $data['success'] = $newid;
            }else{
                $data['error']['execute'] = TRUE;
            }
        }
        return $data;
    }

    private function _edit_process($data, $b_id)
    {
        /**GET VALUE PARAMS**/
        $b_name     = $this->input->post('b_name');
        $b_des      = $this->input->post('b_des');
        $b_content  = $this->input->post('b_content');
        $b_image    = $this->input->post('b_image');
        $b_path_file= $this->input->post('b_path_file');
        $b_tag      = $this->input->post('b_tag');
        $b_free     = $this->input->post('b_free');
        $b_price    = $this->input->post('b_price');
        $b_author   = $this->input->post('b_author');
        $b_nxb      = $this->input->post('b_nxb');
        $b_status   = $this->input->post('b_status');

        /**VALIDATE**/
        $b_name     == '' ? $data['error']['b_name']    = TRUE : null;
        $b_des      == '' ? $data['error']['b_des']     = TRUE : null;
        $b_content  == '' ? $data['error']['b_content'] = TRUE : null;
        if(!is_file_in_public_folder ($b_image)){

            $data['error']['b_image'] = TRUE;
        }
        if(!is_file_in_public_folder($b_path_file)){
            $data['error']['b_path_file'] = TRUE;
        }
        if(!in_array($b_free, array(null, 'on')) ) {
            $data['error']['b_free'] = TRUE;
        }
        if($b_price != '' && !is_numeric($b_price)){
            $data['error']['b_price'] = TRUE ;
        }
        $b_status != in_array($b_status, array('1','2', '3', '4'))? $data['error']['b_status'] = TRUE : null;

        /**SET VALUE **/
        $data['info']['b_name']         = $b_name;
        $data['info']['b_des']          = $b_des;
        $data['info']['b_content']      = $b_content;
        $data['info']['b_image']        = $b_image ;
        $data['info']['b_path_file']    = $b_path_file;
        $data['info']['b_tag']          = $b_tag;
        $data['info']['b_free']         = $b_free = $b_free == 'on' ? 1 : 0;
        $data['info']['b_price']        = $b_price;
        $data['info']['b_author']       = $b_author;
        $data['info']['b_nxb']          = $b_nxb;
        $data['info']['b_status']       = $b_status;


        /**CHECK CALL STORE**/
        if (empty($data['error']))
        {
            $b_total_book = 1; //default
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