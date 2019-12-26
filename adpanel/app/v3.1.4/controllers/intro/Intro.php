<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intro extends MY_Controller {
	
	function __construct()
	{
		$this->_module = trim(strtolower(__class__));
		parent::__construct();
		
		$this->_checkAdminPermission();
        // model
        $this->load->model('intro/intro_model');
	}
	
    function edit()
    {
        $data = array();
        $data['success'] = null;
        $data['error']= array();

        $intro  = $this->intro_model->intro_info(1);
        $data['intro'] = $intro;
        if(isset($_POST['content'])){
            $data = $this->_edit_process($data, 1);
        }

        $this->_loadHeader();
        $this->load->view($this->_template_f . 'intro/intro_edit_view', $data);
        $this->_loadFooter();
    }


    private function _edit_process($data, $id)
    {
        /**GET VALUE PARAMS**/
        $content    = $this->input->post('content', false);
        $content    == '' ? $data['error']['content'] = TRUE : null;

        /**SET VALUE **/
        $data['intro']['content']       = $content;

        /**CHECK CALL STORE**/
        if (empty($data['error']))
        {
            $isUpdate = $this->intro_model->intro_edit($id,$content);
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