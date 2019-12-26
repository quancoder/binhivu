<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends MY_Controller{

    function __construct() {
        parent::__construct();
        $this->_module = trim(strtolower(__class__));
        // model
        $this->load->model('news/News_model');
        $this->load->model('funs/Funs_model');
        $this->load->model('document/Document_model');
        $this->load->model('book/Book_model');
        $this->load->model('document/Document_model');
    }

    function index()
    {
        $data = array();
        $data['success'] = FALSE;
        $header = array();
        $header['title'] = 'Liên hệ';
        $type= $this->input->get('type');
        $id = $this->input->get('id');
        $info = array();

        if($id != '' && !is_numeric($id))
        {
            redirect(site_url());
            die;
        }

        if($type=='book')
        {
            $info = $this->Book_model->book_info($id);
            if(empty($info))
            {
                redirect(site_url());
                die;
            }
        }
        else if($type == 'document')
        {
            $info = $this->Document_model->document_info($id);
            if(empty($info))
            {
                redirect(site_url());
                die;
            }
        }

        $data['info'] = $info;
        $data['id'] = $id;
        $data['type'] = $type;

        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'contact/contact_view', $data);
        $this->_loadFooter();
    }
}
