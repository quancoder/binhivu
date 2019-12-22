<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Controller {
	
	function __construct()
	{
		$this->_module = trim(strtolower(__class__));
		parent::__construct();
		
		$this->_checkAdminPermission();
        // model
        $this->load->model('news/News_model');
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

	    $list = $this->News_model->news_list_paging($user_id, $status, removeAllTags($search), removeAllTags($tag), ($page-1)*$num, $num);

        //set value
        $data['status'] = $status;
        $data['search'] = $search;
        $data['tag'] = $tag;
        $data['page'] = $page;
        $data['num'] = $num;
	    $data['list'] = $list['list'];

		$this->_loadHeader();
		$this->load->view($this->_template_f . 'news/news_view', $data);
		$this->_loadFooter();
	}

    function add()
    {
        $data = array();
        $data['info']['news_title']     = '';
        $data['info']['news_sapo']      = '';
        $data['info']['news_tags']      = '';
        $data['info']['news_image']     = '';
        $data['info']['news_content']   = '';
        $data['success']    = false;
        $data['error']      = array();

        if(isset($_POST['news_title'])){
            $data = $this->_add_process($data);
        }

        $this->_loadHeader();
        $this->load->view($this->_template_f . 'news/news_add_view', $data);
        $this->_loadFooter();
    }

    function edit($news_id)
    {
        $data = array();
        $data['success'] = FALSE;
        $data['error']= array();

        $info  = $this->News_model->news_info($news_id);
        if(empty($info)){
            redirect(site_url('news'));
            die;
        }
        $data['info'] = $info;
        if(isset($_POST['news_title'])){
            $data = $this->_edit_process($data, $news_id);
        }

        $this->_loadHeader();
        $this->load->view($this->_template_f . 'news/news_edit_view', $data);
        $this->_loadFooter();
    }

    private function _add_process($data)
    {
        /**PARAM**/
        $news_title     = $this->input->post('news_title');
        $news_sapo      = $this->input->post('news_sapo');
        $news_tag       = $this->input->post('news_tags');
        $news_image     = $this->input->post('news_image');
        $news_content   = $this->input->post('news_content', false);
        $news_status_1  = $this->input->post('news_status_1');
        $news_status_4  = $this->input->post('news_status_4');

        /**VALIDATE**/
        $news_title == '' ? $data['error']['news_title'] = TRUE : null;
        $news_sapo == '' ? $data['error']['news_sapo'] = TRUE :  null;
        $news_content == '' ? $data['error']['news_content'] = TRUE : null;

        if(!is_file_in_public_folder ($news_image)){

            $data['error']['news_image'] = TRUE;
        }

        if($news_status_1 == "ok" && $news_status_4 == "" ){
            $news_status = 1;
        }else if($news_status_1 == "" && $news_status_4 == "ok"){
            $news_status = 4;
        }else{
            $news_status = '';
            $data['error']['news_status'] = TRUE;
        }

        /**SET VALUE**/
        $data['info']['news_title']     = $news_title;
        $data['info']['news_sapo']      = $news_sapo;
        $data['info']['news_tags']      = $news_tag;
        $data['info']['news_image']     = $news_image;
        $data['info']['news_content']   = $news_content;
        /**CALL STORE**/

        if (empty($data['error'])) {
            $user_id = $this->_session_uid();
            $newid = $this->News_model->news_insert($news_title, $news_sapo, $news_content, $news_image, $news_image, $user_id, (int)$news_status, $news_tag);
            if ($newid > 0){
                $data['success'] = $newid;
            }else{
                $data['error']['execute'] = TRUE;
            }
        }
        return $data;
    }

    private function _edit_process($data, $news_id)
    {
        /**PARAM**/
        $news_title     = $this->input->post('news_title');
        $news_sapo      = $this->input->post('news_sapo');
        $news_tag       = $this->input->post('news_tags');
        $news_image     = $this->input->post('news_image');
        $news_content   = $this->input->post('news_content', false);
        $news_status    = $this->input->post('news_status');

        /**VALIDATE**/
        $news_title == '' ? $data['error']['news_title'] = TRUE : null;
        $news_sapo == '' ? $data['error']['news_sapo'] = TRUE :  null;
        $news_tag == '' ? $data['error']['news_tags'] = TRUE :  null;
        if(!is_file_in_public_folder ($news_image)){

            $data['error']['news_image'] = TRUE;
        }
        $news_content == '' ? $data['error']['news_content'] = TRUE : null;
        if(!in_array($news_status, array('1','2', '3', '4'))){
            $data['error']['news_status'] = TRUE;
        }
        /**SET VALUE**/
        $data['info']['news_title']     = $news_title;
        $data['info']['news_sapo']      = $news_sapo;
        $data['info']['news_tags']      = $news_tag;
        $data['info']['news_image']     = $news_image;
        $data['info']['news_content']   = $news_content;
        $data['info']['news_status']    = $news_status;
        /**CALL STORE**/
        if (empty($data['error'])) {

            $isUpdate = $this->News_model->news_update($news_id, $news_title, $news_sapo, $news_content, $news_image, $news_image, strtolower($news_tag), $news_status);
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