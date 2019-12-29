<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intro extends MY_Controller {
	
	function __construct()
	{
		$this->_module = trim(strtolower(__class__));
		parent::__construct();
		
		$this->_checkAdminPermission();
        // model
        $this->load->model('intro/Intro_model');
	}
	
    function edit()
    {
        $data = array();
        $data['success'] = null;
        $data['error']= array();

        $intro  = $this->Intro_model->intro_info(1);
        $data['intro'] = $intro;
        if(isset($_POST['submit'])){
            $data = $this->_edit_process($data);
        }

        $this->_loadHeader();
        $this->load->view($this->_template_f . 'intro/intro_edit_view', $data);
        $this->_loadFooter();
    }


    private function _edit_process($data)
    {
        /**GET VALUE PARAMS**/
        $intro    = $this->input->post('intro', false);
        $intro    == '' ? $data['error']['intro'] = TRUE : null;

        $copyright    = $this->input->post('copyright', false);
        $copyright    == '' ? $data['error']['copyright'] = TRUE : null;

        /**SET VALUE **/
        $data['intro']['intro']         = $intro;
        $data['intro']['copyright']     = $copyright;

        /**CHECK CALL STORE**/
        if (empty($data['error']))
        {
            $isUpdate = $this->Intro_model->intro_edit(1, $intro, $copyright);
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