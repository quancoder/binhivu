<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Intro extends MY_Controller{

    function __construct() {
        parent::__construct();
        $this->_module = trim(strtolower(__class__));
        // model
        $this->load->model('Intro_model');
    }

    function index()
    {
        $data = array();
        $header = array();
        $header['title'] = 'Giới thiệu';
        $intro = $this->Intro_model->intro_info();

        $data['intro'] = $intro;

        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'intro/intro_view', $data);
        $this->_loadFooter();
    }
}
