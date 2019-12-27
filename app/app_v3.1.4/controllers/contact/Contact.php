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
        $this->load->model('contact/Contact_model');
    }

    function index()
    {
        $data = array();
        $type   = $this->input->get('type');
        $id     = $this->input->get('id');
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
        $data['content'] = !empty($info) ? 'Tôi muốn mua sản phẩm này, hãy liên hệ lại cho tôi!' : "";
        $data['type']   = $type;
        $data['id']     = $id;

        $header = array();
        $header['title'] = 'Liên hệ';
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'contact/contact_view', $data);
        $this->_loadFooter();
    }

    function ajax_add_contact()
    {
        /**GET VALUE PARAMS**/
        $c_name         = $this->input->post('c_name');
        $c_phone        = $this->input->post('c_phone');
        $c_email        = $this->input->post('c_email');
        $c_content      = $this->input->post('c_content');
        $c_type         = $this->input->post('c_type');
        $c_req_id       = $this->input->post('c_req_id');

        /**VALIDATE**/
        $c_name     == '' ? $data['error']['c_name']        = TRUE : null;
        $c_phone    == '' ? $data['error']['c_phone']       = TRUE : null;
        $c_email    == '' ? $data['error']['c_email']       = TRUE : null;
        $c_content  == '' ? $data['error']['c_content']     = TRUE : null;

        if($c_req_id != '' && !is_numeric($c_req_id))
        {
            echo 'id_invalid'; die;
        }

        $product_name = '';
        if($c_type=='book')
        {
            $info = $this->Book_model->book_info($c_req_id);
            if(empty($info))
            {
                echo 'info_empty'; die;
            }else
                $product_name = $info['b_name'];
        }
        else if($c_type == 'document')
        {
            $info = $this->Document_model->document_info($c_req_id);
            if(empty($info))
            {
                echo 'info_empty'; die;
            }else
                $product_name = $info['doc_name'];
        }
        /**END VALIDATE**/

        $log = ip_address();
        $newid = $this->Contact_model->contact_insert($c_name,$c_phone, $c_email, $c_content, $c_type, $c_req_id,$product_name, $log);

        if ($newid > 0)
        {
            echo 'success'; die;
        }
        else
        {
            echo 'fail_execute'; die;
        }
    }

}
