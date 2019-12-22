<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Taixuong extends MY_Controller{

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

    function index($p1, $p2)
    {
        $time_spam = 5; //5s
        $is_spam = $this->is_ip_address_spam($p1,$p2, $time_spam);

        if($is_spam == false)
        {
            $file_path = $this->_get_file_path($p1, $p2);

            if($file_path != ''){
                $root_file = "{$_SERVER['DOCUMENT_ROOT']}$file_path";
                $this->_d1($root_file, $p1, $p2);
            }
            else
            {
                die('file empty');
            }

        }
        else
        {
            die('spam');
        }
    }

    function is_ip_address_spam($p1, $p2, $time_spam)
    {
        $ip = ip_address();
        $cookie_name = "last_download";
        $cookie_value = $ip .'-'. $p1 . '-' . $p2;

        if(!isset($_COOKIE[$cookie_name]))
        {
            setcookie($cookie_name, $cookie_value, (time() + $time_spam), "/");
            return false;
        }
        else
        {
            $last = $_COOKIE[$cookie_name];
            if($last == $cookie_value)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    function _get_file_path($type, $id){
        $file_name = '';
        $id = (int) $id;

        if($type =='document')
        {
            $info = $this->Document_model->document_info($id);
            if(!empty($info) and $info['doc_free'] == 1)
            {
                $file_name = $info['doc_path_file'];
            }
        }
        else if($type == 'book')
        {
            $info = $this->Book_model->book_info($id);
            if(!empty($info) and $info['b_free'] == 1)
            {
                $file_name = $info['b_path_file'];
            }
        }

        return $file_name;
    }

    function _up_download($type, $id)
    {
        if($type =='document')
        {
            $this->Document_model->document_up_download($id);
        }
        else if($type == 'book')
        {
            $this->Book_model->book_up_download($id);
        }
    }

    function _d1($file, $type, $id){
        if (file_exists($file))
        {

            $this->_up_download($type, $id);

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
        else
        {
            die('file not exits');
        }
    }

    function _d3($local_file){

        $download_rate = 1; // => 1Mb/s
        if(file_exists($local_file) && is_file($local_file))
        {
            header('Cache-control: private');
            header('Content-Type: application/octet-stream');
            header('Content-Length: '.filesize($local_file));
            header('Content-Disposition: filename='.basename($local_file));

            flush();
            $file = fopen($local_file, "r");
            while(!feof($file))
            {
                // send the current file part to the browser
                print fread($file, round($download_rate * 1024));
                // flush the content to the browser
                flush();
                // sleep one second
                sleep(1);
            }
            fclose($file);
        }
    }
}
