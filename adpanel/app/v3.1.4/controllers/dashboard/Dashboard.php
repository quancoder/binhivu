<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	function __construct()
	{
		$this->_module = trim(strtolower(__class__));
		parent::__construct();
		
		$this->_checkAdminPermission();
	}
	
	function index()
	{
		$this->_loadHeader();
		
//		$this->load->view($this->_template_f . 'dashboard/dashboard_view');
		
		$this->_loadFooter();
	}

    function download()
    {
        // check id_file
        // check login
        // ...

//        $file_name = '/public/images/book/5.jpg';
//        $file_name = '/public/images/book/test.rar';
        $file_name = '/public/images/book/mysql-workbench-community-8-0-18-winx64.rar';
        $question_file = "{$_SERVER['DOCUMENT_ROOT']}$file_name";
        $this->_d3($question_file);

        die( "ERROR: invalid song or you don't have permissions to download it." );
    }


    function _d1($file){
        if( file_exists( $file ) )
        {
            header( 'Cache-Control: public' );
            header( 'Content-Description: File Transfer' );
            header( "Content-Disposition: attachment; filename={$file}" );
            header( 'Content-Type: application/zip');
            header( 'Content-Transfer-Encoding: binary' );
            readfile( $file );
            exit;
        }
    }

    function _d2($file){
        if (file_exists($file)) {
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