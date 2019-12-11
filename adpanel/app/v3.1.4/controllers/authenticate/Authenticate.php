<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Authenticate extends MY_Controller
{
	function __construct()
	{
		$this->_module = trim(strtolower(__CLASS__));
		parent::__construct();

        // model
        $this->load->model('authenticate/Authenticate_model');
	}

	function sign()
	{
		$data = array();
		$data['error'] = array();
		$data['username'] = '';

		// da login
		if($this->_islogin())
		{
            redirect(site_url());
            die();
		}

		if(isset($_POST['txtUser']))
		{
            $username = removeAllTags($this->input->post('txtUser', true));
            $username = mb_strtolower($username, 'UTF-8');
            $username = preg_match('/^[a-z0-9_@\-\.]+$/', $username) ? $username : '';
            $data['username'] = $username;

            $password = $this->input->post('txtPass', true);

            $uInfo = $this->Authenticate_model->get_user_by_username($username);
            $passVerify = false;
            if (!empty($uInfo) && $uInfo['username'] != '' && $uInfo['user_id'] > 0 && $username != '') {
                $passVerify = PasswordHash::hash_verify($uInfo['username'], $uInfo['password'], $password);
            }

            if ($passVerify) {
                $user_id = $uInfo['user_id'];
                $uname = trim(mb_strtolower($uInfo['username'], 'utf-8'));

                // destroy all session before init
                session_unset();
                $_SESSION["uname"] = $uname;
                $_SESSION["uid"] = $user_id;
                $_SESSION["role"] = '-1';

                redirect(base_url());
                die();
            } else {
                //end
                $data['error']['pw'] = "Sai mật khẩu! Vui lòng nhập lại.";
            }
        }
		$this->load->view($this->_template_f . 'authenticate/login_default_view', $data);
	}

	function out()
	{
		session_destroy();
		redirect(site_url('authenticate/sign'));
		die();
	}

	function change_password(){
        // da login
        if(!$this->_islogin())
        {
            $currUrl = getCurrentUrl();
            dbClose();
            redirect(site_url('authenticate/sign?url=' . urlencode($currUrl), $this->_langcode));
            die();
        }

        $data = array();
        $data['isUpdate'] = FALSE;
        $data['error'] = array();

        if(isset($_POST['new_pw']))
        {
            $new_pw = removeAllTags($this->input->post('new_pw', true));
            $data['new_pw'] = $new_pw;

            $old_pw = removeAllTags($this->input->post('old_pw', true));

            $username = $this->_session_uname();
            $userid = $this->_session_uid();

            $uInfo = $this->Authenticate_model->get_user_by_username($username);
            $hashOldPass = PasswordHash::hash($uInfo['username'], $old_pw);
            $hashNewPass = PasswordHash::hash($uInfo['username'], $new_pw);
            $hash_verify = PasswordHash::hash_verify($uInfo['username'], $uInfo['password'], $old_pw);

            if ($hash_verify) {
                $data['isUpdate'] = true;
                $this->Authenticate_model->user_update_password($userid, $hashNewPass);
            }else{
                $data['error']['fail_old_pass'] = TRUE;
            }

        }
        $this->_loadHeader();
        $this->load->view($this->_template_f . 'authenticate/update_password_view', $data);
        $this->_loadFooter();
    }

}