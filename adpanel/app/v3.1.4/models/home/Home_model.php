<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}

    function document_statistic()
    {
        $data = array();
        $iconn = $this->db->conn_id;

        $sql = "CALL document_statistic();";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            // execute the stored procedure
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                $stmt->closeCursor();
            }
        }
        return $data;
    }

    function book_statistic()
    {
        $data = array();
        $iconn = $this->db->conn_id;

        $sql = "CALL book_statistic();";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            // execute the stored procedure
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                $stmt->closeCursor();
            }
        }
        return $data;
    }

    function news_statistic()
    {
        $data = array();
        $iconn = $this->db->conn_id;

        $sql = "CALL news_statistic();";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            // execute the stored procedure
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                $stmt->closeCursor();
            }
        }
        return $data;
    }

    function funs_statistic()
    {
        $data = array();
        $iconn = $this->db->conn_id;

        $sql = "CALL funs_statistic();";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            // execute the stored procedure
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                $stmt->closeCursor();
            }
        }
        return $data;
    }

    function contact_list($status){
        $data = array();
        $iconn = $this->db->conn_id;
        $sql = "CALL contact_list(:status);";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            // execute the stored procedure
            if($stmt->execute())
            {
                if($stmt->rowCount() > 0)
                {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        if($row['c_type']=='document'){
                            $row['c_type_name'] = 'Tài liệu';
                        }else{
                            $row['c_type_name'] = 'Sách';
                        }
                        $data[] = $row;
                    }
                }
            }
        }

        return $data;
    }

}