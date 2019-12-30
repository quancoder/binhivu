<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {
	
	function __construct()
	{
		$this->_module = trim(strtolower(__class__));
		parent::__construct();
		
		$this->_checkAdminPermission();
        $this->load->model('contact/Contact_model');
        $this->load->model('document/Document_model');
        $this->load->model('book/Book_model');
	}
	
	function index($type)
	{
		$this->_loadHeader();

        $data = array();

		if($type==1)
		{
            $data['contact_0'] = $this->Contact_model->contact_list(0);
            $data['contact_1'] = $this->Contact_model->contact_list(1);
            $data['contact_2'] = $this->Contact_model->contact_list(2);
            $this->load->view($this->_template_f . 'contact/contact_download_view', $data);
        }
        elseif ($type==2)
        {
            $data['contact_0'] = $this->Contact_model->contact_list(0);
            $data['contact_1'] = $this->Contact_model->contact_list(1);
            $data['contact_2'] = $this->Contact_model->contact_list(2);
            $this->load->view($this->_template_f . 'contact/contact_other_view', $data);
		}

		$this->_loadFooter();
	}

	function detail($id)
    {
        $data = array();
        $info = $this->Contact_model->contact_info($id);
        if(empty($info)){
            redirect(site_url('contact'));
            die;
        }

        $data['info'] = $info;
        $c_type = $info['c_type'];
        $c_req_id = $info['c_req_id'];


        if($c_type=='book')
        {
            $product = $this->Book_model->book_info($c_req_id);
            $data['product']['id'] = $product['b_id'];
            $data['product']['name'] = $product['b_name'];
            $data['product']['view'] = $product['b_view'];
            $data['product']['download'] = $product['b_download'];
            $data['product']['des'] = $product['b_des'];
            $data['product']['image'] = $product['b_image'];
            $data['product']['price'] = $product['b_price'];
        }
        else if($c_type == 'document')
        {
            $product = $this->Document_model->document_info($c_req_id);
            $data['product']['id'] = $product['doc_id'];
            $data['product']['name'] = $product['doc_name'];
            $data['product']['view'] = $product['doc_view'];
            $data['product']['download'] = $product['doc_download'];
            $data['product']['des'] = $product['doc_des'];
            $data['product']['image'] = $product['doc_image'];
            $data['product']['price'] = $product['doc_price'];
        }

        $this->_loadHeader();
        $this->load->view($this->_template_f . 'contact/contact_detail_view', $data);
        $this->_loadFooter();
    }

    function ajax_set_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $ex =  $this->Contact_model->contact_update_status($id, $status);
        return $ex ? 'success': 'fail';
    }
}