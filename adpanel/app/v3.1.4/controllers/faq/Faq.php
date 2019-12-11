<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        // lang
        $this->load->language('common', $this->_langcode);
        $this->load->language('faq/faq', $this->_langcode);
        // model
        $this->load->model('faq/Faq_model');

        //check login
        // if is ajax request return: NOT_LOGIN string
        if (!$this->_islogin()) {
            if ($this->input->is_ajax_request()) {
                dbClose();
                echo NOT_LOGIN;
                die();
            }
            $currUrl = getCurrentUrl();
            dbClose();
            redirect(site_url('login?url=' . urlencode($currUrl), $this->_langcode));
            die();
        }
    }

    function index()
    {
        $data = array();
        $data['faq_lang'] = $this->lang->line('faq_lang');
        $list_parent = $this->Faq_model->rmt_faq_category_list_all();
        $data['list_parent'] = $list_parent;
        $this->_loadHeader();

        $this->load->view($this->_template_f . 'faq/faq_view', $data);

        $this->_loadFooter();
    }

    function ajax_answer_list_by_cat()
    {
        $check = false;
        $_cat_id = trim($this->input->post('_cat_id', true));
        $_cat_id = isIdNumber($_cat_id) ? $_cat_id : 0;

        //check
        $cat_info = $this->Faq_model->rmt_faq_category_info($_cat_id);
        if (!empty($cat_info)) {
            $result = $this->Faq_model->rmt_faq_answer_list_by_cat($_cat_id);
            if ($result) {
                $check = $result;
            }
        }
        echo json_encode($check);

    }

    function ajax_answer_update()
    {
        $check = false;
        $_ans_id = trim($this->input->post('_ans_id', true));
        $_ques_id = trim($this->input->post('_ques_id', true));
        $_content = trim($this->input->post('_content', true));
        $_langcode = trim($this->input->post('_langcode', true));

        //check info
        $_ans_id = isIdNumber($_ans_id) ? $_ans_id : 0;
        $_ques_id = isIdNumber($_ques_id) ? $_ques_id : 0;
        $ques_info = $this->Faq_model->rmt_faq_question_info($_ques_id);

        if ($ques_info && $_content != "" && in_array($_langcode, array('1', '2'))) {
            $result = $this->Faq_model->rmt_faq_answer_update($_ans_id, $_ques_id, $_content, $_langcode);
            if ($result) {
                $check = true;

            }
        }

        echo json_encode($check);

    }

    function ajax_category_delete()
    {
        $check = false;
        $_cat_id = trim($this->input->post('_cat_id', true));

        $_cat_id = isIdNumber($_cat_id) ? $_cat_id : 0;

        //check
        $cat_info = $this->Faq_model->rmt_faq_category_info($_cat_id);
        if (!empty($cat_info)) {
            $result = $this->Faq_model->rmt_faq_category_delete($_cat_id);
            if ($result) {
                $check = true;
            }

        }

        echo json_encode($check);

    }

    function ajax_category_insert()
    {
        $data = array();
        $_name = trim($this->input->post('_name', true));
        $_parent_id = trim($this->input->post('_parent_id', true));
        $_langcode = trim($this->input->post('_langcode', true));

        $_parent_id = isIdNumber($_parent_id) ? $_parent_id : 0;

        if ($_name != "" && in_array($_langcode, array('1', '2'))) {
            $insert_id = $this->Faq_model->rmt_faq_category_insert(ucwords($_name), $_parent_id, $_langcode);
            if ($insert_id) {
                $cat_info = $this->Faq_model->rmt_faq_category_info($insert_id);
                $data['focus'] = $_parent_id == 0 ? 'parent' : 'category';
                $data['new_id'] = $cat_info['cat_id'];
                $data['new_name'] = $cat_info['name'];
                $data['new_parent'] = $cat_info['parent_id'];
                $this->load->view($this->_template_f . 'faq/ajax_add_parent_category', $data);
            }else{
                echo false;
            }

        }else{
            echo false;
        }
    }

    function ajax_category_list_all()
    {
        $check = false;
        $_langcode = trim($this->input->post('_langcode', true));
        $_langcode = isIdNumber($_langcode) ? $_langcode : 0;

        $result = $this->Faq_model->rmt_faq_category_list_all($_langcode);
        if ($result) {
            $check = $result;

        }

        echo json_encode($check);

    }

    function ajax_list_category_priority_set()
    {
        $check = false;
        $_cat_priority = $this->input->post('_cat_priority', true);

        foreach ($_cat_priority as $priority => $cat_id){
            $cat_info = $this->Faq_model->rmt_faq_category_info($cat_id);

            if(isIdNumber($priority) || isIdNumber($cat_id) || empty($cat_info))
                $check = true;
            else
                break;
        }

        if($check){
            foreach ($_cat_priority as $priority => $cat_id){
                $this->Faq_model->rmt_faq_category_priority_set($cat_id, $priority);
            }
            echo json_encode($check);
        }
        else
        {
            echo json_encode($check);
        }
    }

    function ajax_category_update()
    {
        $check = false;
        $_cat_id = trim($this->input->post('_cat_id', true));
        $_parent_id = trim($this->input->post('_parent_id', true));
        $_name = trim($this->input->post('_name', true));

        //check
        $_cat_id = isIdNumber($_cat_id) ? $_cat_id : 0;
        $_parent_id = isIdNumber($_parent_id) ? $_parent_id : 0;

        $cat_info = $this->Faq_model->rmt_faq_category_info($_cat_id);

        if ($_name != "" && !empty($cat_info)) {
            $result = $this->Faq_model->rmt_faq_category_update($_cat_id, $_parent_id, ucwords($_name));
            if ($result) {
                $check = true;
            }
        }

        echo json_encode($check);

    }

    function ajax_question_delete()
    {
        $check = false;
        $_ques_id = trim($this->input->post('_ques_id', true));
        $_ques_id = isIdNumber($_ques_id) ? $_ques_id : 0;

        $ques_info = $this->Faq_model->rmt_faq_question_info($_ques_id);
        if (!empty($ques_info)) {
            $result = $this->Faq_model->rmt_faq_question_delete($_ques_id);
            if ($result) {
                $check = true;
            }
        }
        echo json_encode($check);

    }

    function ajax_question_ans_insert()
    {
        $data = array();
        $_ques_name = trim($this->input->post('_ques_name', true));
        $_ans_content = trim($this->input->post('_ans_content', true));
        $_cat_id = trim($this->input->post('_cat_id', true));
        $_langcode = trim($this->input->post('_langcode', true));

        //check
        $list_cat = $this->Faq_model->rmt_faq_category_info($_cat_id);
        if ($_ques_name != "" && $_ans_content != "" && !empty($list_cat) && in_array($_langcode, array('1', '2'))) {
            $ques_new_id = $this->Faq_model->rmt_faq_question_insert($_ques_name, $_cat_id, $_langcode);
            if ($ques_new_id) {
                $ans_new_id = $this->Faq_model->rmt_faq_answer_insert($ques_new_id, $_ans_content, $_langcode);
                if ($ans_new_id) {
                    $ans_info = $this->Faq_model->rmt_faq_answer_info($ans_new_id);
                    $data['answer'] = $ans_info;
                }
                //get info last insert ID
                $ques_info = $this->Faq_model->rmt_faq_question_info($ques_new_id);
                $data['question'] = $ques_info;
                $this->load->view($this->_template_f . 'faq/ajax_add_question_answer', $data);
            }
        }
        else
        {
            echo false;
        }

    }

    function ajax_question_update()
    {
        $check = false;
        $_ques_id = trim($this->input->post_get('_ques_id', true));
        $_cat_id = trim($this->input->post_get('_cat_id', true));
        $_name = trim($this->input->post_get('_name', true));

        $ques_info = $this->Faq_model->rmt_faq_question_info($_ques_id);

        //check
        $cat_info = $this->Faq_model->rmt_faq_category_info($_cat_id);
        if ($_name != '' && !empty($cat_info) && !empty($ques_info)) {
            $result = $this->Faq_model->rmt_faq_question_update($_ques_id, $_cat_id, $_name);
            if ($result) {
                $check = true;
            }
        }
        echo json_encode($check);

    }

    function ajax_question_list_all()
    {
        $check = false;
        $_cat_id = trim($this->input->post('_cat_id', true));
        $_langcode = trim($this->input->post('_langcode', true));

        //check
        $list_cat = $this->Faq_model->rmt_faq_category_info($_cat_id);
        if (empty($list_cat) || !in_array($_langcode, array('1', '2'))) {
            echo $check;
            die;
        }

        $result = $this->Faq_model->rmt_faq_question_list_all($_langcode, $_cat_id);
        $listAllAnswer = $this->Faq_model->rmt_faq_answer_list_all();

        $data['list_question'] = array();
        if (!empty($result)) {
            foreach ($result as $k => $v) {
                $data['list_question'][] = array(
                    "ques_id" => $v['ques_id'],
                    "ques_content" => $v['name'],
                    "ans_id" => isset($listAllAnswer[$v['ques_id']]) ? $listAllAnswer[$v['ques_id']]['ans_id'] : 0,
                    "ans_content" => isset($listAllAnswer[$v['ques_id']]) ? $listAllAnswer[$v['ques_id']]['content'] : "",
                    "priority" => $v['priority'],
                );
            }
        }
        $this->load->view($this->_template_f . 'faq/ajax_list_question_view', $data);
    }

    function ajax_list_ques_priority_set()
    {
        $check = false;
        $_ques_priority = $this->input->post('_ques_priority', true);

        foreach ($_ques_priority as $priority => $ques_id){
            $ques_info = $this->Faq_model->rmt_faq_question_info($ques_id);

            if(isIdNumber($priority) || isIdNumber($ques_id) || empty($ques_info))
                $check = true;
            else
                break;
        }

        if($check){
            foreach ($_ques_priority as $priority => $ques_id){
                $this->Faq_model->rmt_faq_question_priority_set($ques_id, $priority);
            }
            echo json_encode($check);
        }
        else
        {
            echo json_encode($check);
        }
    }
}