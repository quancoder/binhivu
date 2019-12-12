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

        $data['news_title'] = '';
        $data['news_sapo'] = '';
        $data['news_tags'] = '';
        $data['news_image'] = '';
        $data['news_content'] = '';
        $data['news_status'] = '';
        $data['news_id'] = 0;
        $data['error']= array();

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
        $data['isupdate'] = FALSE;
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

    private function _add_process($data){
        $news_title = trim($this->input->post('news_title', true));
        $news_sapo = trim($this->input->post('news_sapo', true));
        $news_tag = trim($this->input->post('news_tags', true));
        $news_image = trim($this->input->post('news_image', true));
        $news_content = trim($this->input->post('news_content', true));
        $news_status_1 = trim($this->input->post('news_status_1', true));
        $news_status_4 = trim($this->input->post('news_status_4', true));
        $user_id = $this->_session_uid();

        $news_title == '' ? $data['error']['news_title'] = TRUE : $data['news_title'] = $news_title;
        $news_sapo == '' ? $data['error']['news_sapo'] = TRUE :  $data['news_sapo'] = $news_sapo;
        $news_tag == '' ? $data['error']['news_tags'] = TRUE :  $data['news_tags'] = strtolower($news_tag);
        $news_image == '' ? $data['error']['news_image'] = TRUE : $data['news_image'] = $news_image;
        $news_content == '' ? $data['error']['news_content'] = TRUE : $data['news_content'] = $news_content;

        if(($news_status_1 + $news_status_4)==1){
            $news_status = 1;
        }else  if(($news_status_1 + $news_status_4)==4){
            $news_status = 1;
        }else{
            $data['error']['news_status'] = TRUE;
        }

        if (empty($data['error'])) {
            $newid = $this->News_model->news_insert($news_title, $news_sapo, $news_content, basename($news_image), basename($news_image), $user_id, (int)$news_status, strtolower($news_tag));
            if ($newid > 0){
                $data['news_id'] = $newid;
            }else{
                $data['error']['execute'] = TRUE;
            }
        }
        return $data;
    }

    private function _edit_process($data, $news_id){
        $news_title = trim($this->input->post('news_title', true));
        $news_sapo = trim($this->input->post('news_sapo', true));
        $news_tag = trim($this->input->post('news_tags', true));
        $news_image = trim($this->input->post('news_image', true));
        $news_content = trim($this->input->post('news_content', true));
        $news_status = trim($this->input->post('news_status', true));

        $news_title == '' ? $data['error']['news_title'] = TRUE : $data['info']['news_title'] = $news_title;
        $news_sapo == '' ? $data['error']['news_sapo'] = TRUE :  $data['info']['news_sapo'] = $news_sapo;
        $news_tag == '' ? $data['error']['news_tags'] = TRUE :  $data['info']['news_tags'] = strtolower($news_tag);
        $news_image == '' ? $data['error']['news_image'] = TRUE : $data['info']['news_image'] = basename($news_image);
        $news_content == '' ? $data['error']['news_content'] = TRUE : $data['info']['news_content'] = $news_content;
        $news_status != in_array($news_status, array('1','2', '3', '4')) ? $data['error']['news_status'] = TRUE : $data['info']['news_status'] = $news_status;

        if (empty($data['error'])) {

            $isUpdate = $this->News_model->news_update($news_id, $news_title, $news_sapo, ($news_content), basename($news_image), basename($news_image),strtolower($news_tag), $news_status);
            if ($isUpdate == TRUE){
                $data['isupdate'] = TRUE;
            }else{
                $data['error']['execute'] = TRUE;
            }
        }
        return $data;
    }
}