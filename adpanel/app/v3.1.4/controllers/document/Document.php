<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document extends MY_Controller {
	
	function __construct()
	{
		$this->_module = trim(strtolower(__class__));
		parent::__construct();
		
		$this->_checkAdminPermission();
        // model
        $this->load->model('document/Document_model');
	}
	
	function index()
	{
	    $data = array();

        //get value
        $status = trim($this->input->get('status'));
        $search = trim($this->input->get('search'));
        $tag = trim($this->input->get('tag'));
        $page = trim($this->input->get('page'));
        $num = trim($this->input->get('num'));

        //validate value
        $status = in_array($status, array('-1','1','2','3','4')) ? $status : '-1';
        $page = is_numeric($page) && $page > 0  ? $page : 1;
        $num = is_numeric($num) && $num > 0  ? $num : 30;

        //get data
        $user_id = $this->_session_uid();

	    $list = $this->Document_model->document_list_paging($user_id, $status, removeAllTags($search), removeAllTags($tag), ($page-1)*$num, $num);

        //set value
        $data['status'] = $status;
        $data['search'] = $search;
        $data['tag'] = $tag;
        $data['page'] = $page;
        $data['num'] = $num;
	    $data['list'] = $list['list'];

		$this->_loadHeader();
		$this->load->view($this->_template_f . 'document/document_view', $data);
		$this->_loadFooter();
	}

    function add()
    {
        $data = array();
        $data['info']['doc_name']       = '';
        $data['info']['doc_des']        = '';
        $data['info']['doc_content']    = '';
        $data['info']['doc_image']      = '';
        $data['info']['doc_path_file']  = '';
        $data['info']['doc_tag']        = '';
        $data['info']['doc_free']       = 1;
        $data['info']['doc_price']      = 0;
        $data['success']                = null;
        $data['error']                  = array();

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

        $info  = $this->Document_model->document_info($id);
        if(empty($info)){
            redirect(site_url('document'));
            die;
        }
        $data['info'] = $info;
        if(isset($_POST['doc_name'])){
            $data = $this->_edit_process($data, $id);
        }

        $this->_loadHeader();
        $this->load->view($this->_template_f . 'document/document_edit_view', $data);
        $this->_loadFooter();
    }

    private function _add_process($data)
    {
        /**GET VALUE PARAMS**/
        $doc_name       = $this->input->post('doc_name');
        $doc_des        = $this->input->post('doc_des');
        $doc_tag        = $this->input->post('doc_tag');
        $doc_price      = $this->input->post('doc_price');
        $doc_free       = $this->input->post('doc_free');
        $doc_path_file  = $this->input->post('doc_path_file');
        $doc_image      = $this->input->post('doc_image');
        $doc_content    = $this->input->post('doc_content', false);
        $doc_status_1   = $this->input->post('doc_status_1');//1 = public
        $doc_status_4   = $this->input->post('doc_status_4');//4 = trash

        /**VALIDATE**/
        $doc_name     == '' ? $data['error']['doc_name']    = TRUE : null;
        $doc_des      == '' ? $data['error']['doc_des']     = TRUE : null;
        $doc_content  == '' ? $data['error']['doc_content'] = TRUE : null;
        if(!is_file_in_public_folder ($doc_image)){

            $data['error']['doc_image'] = TRUE;
        }
        if(!is_file_in_public_folder($doc_path_file)){
            $data['error']['doc_path_file'] = TRUE;
        }
        if(!in_array($doc_free, array(null, 'on')) ) {
            $data['error']['doc_free'] = TRUE;
        }
        if($doc_price != '' && !is_numeric($doc_price)){
            $data['error']['doc_price'] = TRUE ;
        }
        if($doc_status_1 == "ok" && $doc_status_4== "" ){
            $doc_status = 1;
        }else if($doc_status_1 == "" && $doc_status_4 == "ok"){
            $doc_status = 4;
        }else{
            $doc_status = '';
            $data['error']['doc_status'] = TRUE;
        }

        /**SET VALUE **/
        $data['info']['doc_name']       = $doc_name;
        $data['info']['doc_des']        = $doc_des;
        $data['info']['doc_tag']        = $doc_tag;
        $data['info']['doc_price']      = $doc_price;
        $data['info']['doc_path_file']  = $doc_path_file;
        $data['info']['doc_image']      = $doc_image;
        $data['info']['doc_free']       = $doc_free = $doc_free== 'on' ? 1 : 0;
        $data['info']['doc_content']    = $doc_content;
        $data['info']['doc_status']     = $doc_status;

        /**CHECK CALL STORE**/
        if (empty($data['error'])) {
            $user_id = $this->_session_uid();
            $newid = $this->Document_model->document_insert($doc_name, $doc_des, $doc_content, $doc_image, $doc_tag, $doc_path_file, $doc_free , $doc_price, $doc_status, $user_id);
            if ($newid > 0){
                $data['success'] = $newid;
            }else{
                $data['success'] = FALSE;
                $data['error']['execute'] = TRUE;
            }
        }
        return $data;
    }

    private function _edit_process($data, $doc_id)
    {
        /**GET VALUE PARAMS**/
        $doc_name   = $this->input->post('doc_name');
        $doc_des    = $this->input->post('doc_des');
        $doc_tag    = $this->input->post('doc_tag');
        $doc_price  = $this->input->post('doc_price');
        $doc_free   = $this->input->post('doc_free');
        $doc_path_file  = $this->input->post('doc_path_file');
        $doc_image      = $this->input->post('doc_image');
        $doc_content    = $this->input->post('doc_content', false);
        $doc_status     = $this->input->post('doc_status');

        /**VALIDATE**/
        $doc_name     == '' ? $data['error']['doc_name']    = TRUE : null;
        $doc_des      == '' ? $data['error']['doc_des']     = TRUE : null;
        $doc_content  == '' ? $data['error']['doc_content'] = TRUE : null;
        if(!is_file_in_public_folder ($doc_image)){

            $data['error']['doc_image'] = TRUE;
        }
        if(!is_file_in_public_folder($doc_path_file)){
            $data['error']['doc_path_file'] = TRUE;
        }
        if(!in_array($doc_free, array(null, 'on')) ) {
            $data['error']['doc_free'] = TRUE;
        }
        if($doc_price != '' && !is_numeric($doc_price)){
            $data['error']['doc_price'] = TRUE ;
        }
        if(!in_array($doc_status, array('1','2', '3', '4'))){
            $data['error']['doc_status'] = TRUE;
        }

        /**SET VALUE **/
        $data['info']['doc_name']       = $doc_name;
        $data['info']['doc_des']        = $doc_des;
        $data['info']['doc_tag']        = $doc_tag;
        $data['info']['doc_price']      = $doc_price;
        $data['info']['doc_path_file']  = $doc_path_file;
        $data['info']['doc_image']      = $doc_image;
        $data['info']['doc_free']       = $doc_free = $doc_free== 'on' ? 1 : 0;
        $data['info']['doc_content']    = $doc_content;
        $data['info']['doc_status']     = $doc_status;


        /**CHECK CALL STORE**/
        if (empty($data['error'])) {
            $isUpdate = $this->Document_model->document_update($doc_id, $doc_name, $doc_des, $doc_content, strtolower($doc_tag), $doc_price, $doc_free,$doc_path_file, $doc_image, $doc_status);
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