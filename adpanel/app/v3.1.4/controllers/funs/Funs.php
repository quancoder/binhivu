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
        $data['info']['funs_title']     = '';
        $data['info']['funs_sapo']      = '';
        $data['info']['funs_tags']      = '';
        $data['info']['funs_image']     = '';
        $data['info']['funs_content']   = '';
        $data['success']    = false;
        $data['error']      = array();

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
        $data['success'] = FALSE;
        $data['error']= array();

        $info  = $this->Funs_model->funs_info($funs_id);
        if(empty($info)){
            redirect(site_url('funs'));
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
        /**PARAM**/
        $funs_title     = $this->input->post('funs_title');
        $funs_sapo      = $this->input->post('funs_sapo');
        $funs_tag       = $this->input->post('funs_tags');
        $funs_image     = $this->input->post('funs_image');
        $funs_content   = $this->input->post('funs_content', false);
        $funs_status_1  = $this->input->post('funs_status_1');
        $funs_status_4  = $this->input->post('funs_status_4');

        /**VALIDATE**/
        $funs_title == '' ? $data['error']['funs_title'] = TRUE : null;
        $funs_sapo == '' ? $data['error']['funs_sapo'] = TRUE :  null;
        $funs_content == '' ? $data['error']['funs_content'] = TRUE : null;

        if(!is_file_in_public_folder ($funs_image)){

            $data['error']['funs_image'] = TRUE;
        }

        if($funs_status_1 == "ok" && $funs_status_4 == "" ){
            $funs_status = 1;
        }else if($funs_status_1 == "" && $funs_status_4 == "ok"){
            $funs_status = 4;
        }else{
            $funs_status = '';
            $data['error']['funs_status'] = TRUE;
        }

        /**SET VALUE**/
        $data['info']['funs_title']     = $funs_title;
        $data['info']['funs_sapo']      = $funs_sapo;
        $data['info']['funs_tags']      = $funs_tag;
        $data['info']['funs_image']     = $funs_image;
        $data['info']['funs_content']   = $funs_content;
        /**CALL STORE**/

        if (empty($data['error'])) {
            $user_id = $this->_session_uid();
            $newid = $this->Funs_model->funs_insert($funs_title, $funs_sapo, $funs_content, $funs_image, $funs_image, $user_id, (int)$funs_status, $funs_tag);
            if ($newid > 0){
                $data['success'] = $newid;
            }else{
                $data['error']['execute'] = TRUE;
            }
        }
        return $data;
    }

    private function _edit_process($data, $funs_id)
    {
        /**PARAM**/
        $funs_title     = $this->input->post('funs_title');
        $funs_sapo      = $this->input->post('funs_sapo');
        $funs_tag       = $this->input->post('funs_tags');
        $funs_image     = $this->input->post('funs_image');
        $funs_content   = $this->input->post('funs_content', false);
        $funs_status    = $this->input->post('funs_status');

        /**VALIDATE**/
        $funs_title == '' ? $data['error']['funs_title'] = TRUE : null;
        $funs_sapo == '' ? $data['error']['funs_sapo'] = TRUE :  null;
        $funs_tag == '' ? $data['error']['funs_tags'] = TRUE :  null;
        if(!is_file_in_public_folder ($funs_image)){

            $data['error']['funs_image'] = TRUE;
        }
        $funs_content == '' ? $data['error']['funs_content'] = TRUE : null;
        if(!in_array($funs_status, array('1','2', '3', '4'))){
            $data['error']['funs_status'] = TRUE;
        }
        /**SET VALUE**/
        $data['info']['funs_title']     = $funs_title;
        $data['info']['funs_sapo']      = $funs_sapo;
        $data['info']['funs_tags']      = $funs_tag;
        $data['info']['funs_image']     = $funs_image;
        $data['info']['funs_content']   = $funs_content;
        $data['info']['funs_status']    = $funs_status;
        /**CALL STORE**/
        if (empty($data['error'])) {

            $isUpdate = $this->Funs_model->funs_update($funs_id, $funs_title, $funs_sapo, $funs_content, $funs_image, $funs_image, strtolower($funs_tag), $funs_status);
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