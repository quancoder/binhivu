<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
    function contact_list($status, $type='')
    {
        $data = array();
        $iconn = $this->db->conn_id;
        $sql = "CALL contact_list(:status, :type);";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            // execute the stored procedure
            if($stmt->execute())
            {
                if($stmt->rowCount() > 0)
                {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $row['c_type_name'] = '';
                        if($row['c_type']=='document') $row['c_type_name'] = 'Tài liệu';
                        if($row['c_type']=='book') $row['c_type_name'] = 'Sách';
                        if($row['c_type']=='email') $row['c_type_name'] = 'Đăng ký nhận bài viết';
                        if($row['c_type']=='suggest') $row['c_type_name'] = 'Form liên hệ';
                        $data[] = $row;
                    }
                }
                $stmt->closeCursor();
            }
        }

        return $data;
    }

    //info
    function contact_info($c_id)
    {
        $data = array();
        $iconn = $this->db->conn_id;
        $sql = "CALL contact_info(:c_id);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':c_id', $c_id, PDO::PARAM_INT);
            // execute the stored procedure
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);

                    $data['c_type_name'] = '';
                    if($data['c_type']=='document') $data['c_type_name'] = 'Tài liệu';
                    if($data['c_type']=='book') $data['c_type_name'] = 'Sách';
                    if($data['c_type']=='email') $data['c_type_name'] = 'Đăng ký nhận bài viết';
                    if($data['c_type']=='suggest') $data['c_type_name'] = 'Form liên hệ';
                }
                $stmt->closeCursor();
            }
        }
        return $data;
    }

    //info
    function contact_update_status($c_id, $c_stauts)
    {
        $data = FALSE;
        $iconn = $this->db->conn_id;
        $sql = "CALL contact_update_status(:c_id, :c_status);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':c_id', $c_id, PDO::PARAM_INT);
            $stmt->bindParam(':c_status', $c_stauts, PDO::PARAM_INT);
            // execute the stored procedure
            if ($stmt->execute()) {
                $data = TRUE;
                $stmt->closeCursor();
            }
        }
        return $data;
    }

    //info
    function contact_report_all()
    {
        $data = array();
        $iconn = $this->db->conn_id;
        $sql = "CALL contact_report_all();";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
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
}