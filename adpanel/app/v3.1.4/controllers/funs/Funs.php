<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funs extends MY_Controller {
	
	function __construct()
	{
		$this->_module = trim(strtolower(__class__));
		parent::__construct();
		
		$this->_checkAdminPermission();
        // model
        $this->load->model('funs/Funs_model');
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

	    $list = $this->Funs_model->funs_list_paging($user_id, $status, removeAllTags($search), removeAllTags($tag), ($page-1)*$num, $num);

        //set value
        $data['status'] = $status;
        $data['search'] = $search;
        $data['tag'] = $tag;
        $data['page'] = $page;
        $data['num'] = $num;
	    $data['list'] = $list['list'];

		$this->_loadHeader();
		$this->load->view($this->_template_f . 'funs/funs_view', $data);
		$this->_loadFooter();
	}

    function add()
    {
        $data = array();

        $data['funs_title'] = '';
        $data['funs_sapo'] = '';
        $data['funs_tags'] = '';
        $data['funs_image'] = '';
        $data['funs_content'] = '';
        $data['funs_status'] = '';
        $data['funs_id'] = 0;
        $data['error']= array();

        if(isset($_POST['funs_title'])){
            $data = $this->_add_process($data);
        }

        $this->_loadHeader();
        $this->load->view($this->_template_f . 'funs/funs_add_view', $data);
        $this->_loadFooter();
    }

    function edit($funs_id)
    {
        $data = array();
        $data['isupdate'] = FALSE;
        $data['error']= array();

        $info  = $this->Funs_model->funs_info($funs_id);
        if(empty($info)){
            redirect(site_url('Funs'));
            die;
        }
        $data['info'] = $info;
        if(isset($_POST['funs_title'])){
            $data = $this->_edit_process($data, $funs_id);
        }

        $this->_loadHeader();
        $this->load->view($this->_template_f . 'funs/funs_edit_view', $data);
        $this->_loadFooter();
    }

    private function _add_process($data)
    {
        $funs_title = $this->input->post('funs_title', true);
        $funs_sapo = $this->input->post('funs_sapo', true);
        $funs_tag = $this->input->post('funs_tags', true);
        $funs_image = $this->input->post('funs_image', true);
        $funs_content = $this->input->post('funs_content', true);
        $funs_status_1 = $this->input->post('funs_status_1', true);//funs_status_1 = public
        $funs_status_4 = $this->input->post('funs_status_4', true);//funs_status_4 = trash

        $funs_title == '' ? $data['error']['funs_title'] = TRUE : $data['funs_title'] = $funs_title;
        $funs_sapo == '' ? $data['error']['funs_sapo'] = TRUE :  $data['funs_sapo'] = $funs_sapo;
        $funs_tag == '' ? $data['error']['funs_tags'] = TRUE :  $data['funs_tags'] = $funs_tag = strtolower($funs_tag);
        $funs_image == '' || !is_file_in_public_dir ($funs_image, ROOT_DOMAIN.'public/images')? $data['error']['funs_image'] = TRUE : $data['funs_image'] = $funs_image;
        $funs_content == '' ? $data['error']['funs_content'] = TRUE : $data['funs_content'] = $funs_content;

        if($funs_status_1 == "ok" && $funs_status_4 == "" ){
            $funs_status = 1;
        }else if($funs_status_1 == "" && $funs_status_4 == "ok"){
            $funs_status = 4;
        }else{
            $funs_status = '';
            $data['error']['funs_status'] = TRUE;
        }

        if (empty($data['error'])) {
            $user_id = $this->_session_uid();
            $newid = $this->Funs_model->funs_insert($funs_title, $funs_sapo, $funs_content, get_path_file($funs_image), get_path_file($funs_image), $user_id, (int)$funs_status, $funs_tag);
            if ($newid > 0){
                $data['funs_id'] = $newid;
            }else{
                $data['error']['execute'] = TRUE;
            }
        }
        return $data;
    }

    private function _edit_process($data, $funs_id)
    {
        $funs_title = $this->input->post('funs_title', true);
        $funs_sapo = $this->input->post('funs_sapo', true);
        $funs_tag = $this->input->post('funs_tags', true);
        $funs_image = $this->input->post('funs_image', true);
        $funs_content = $this->input->post('funs_content', true);
        $funs_status = $this->input->post('funs_status', true);

        $funs_title == '' ? $data['error']['funs_title'] = TRUE : $data['info']['funs_title'] = $funs_title;
        $funs_sapo == '' ? $data['error']['funs_sapo'] = TRUE :  $data['info']['funs_sapo'] = $funs_sapo;
        $funs_tag == '' ? $data['error']['funs_tags'] = TRUE :  $data['info']['funs_tags'] = $funs_tag = strtolower($funs_tag);
        $funs_image == '' || !is_file_in_public_dir ($funs_image, ROOT_DOMAIN.'/public/images')? $data['error']['funs_image'] = TRUE : $data['info']['funs_image'] = $funs_image;
        $funs_content == '' ? $data['error']['funs_content'] = TRUE : $data['info']['funs_content'] = $funs_content;
        $funs_status != in_array($funs_status, array('1','2', '3', '4')) ? $data['error']['funs_status'] = TRUE : $data['info']['funs_status'] = $funs_status;

        if (empty($data['error'])) {

            $isUpdate = $this->Funs_model->funs_update($funs_id, $funs_title, $funs_sapo, ($funs_content), get_path_file($funs_image), get_path_file($funs_image),strtolower($funs_tag), $funs_status);
            if ($isUpdate == TRUE){
                $data['isupdate'] = TRUE;
            }else{
                $data['error']['execute'] = TRUE;
            }
        }
        return $data;
    }
}