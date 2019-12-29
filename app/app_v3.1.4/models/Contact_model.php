<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

    //insert
    function contact_insert($name,$phone, $email, $content, $type, $req_id,$prd_name, $log)
    {
        $data = 0;
        $iconn = $this->db->conn_id;
        $sql = "CALL contact_insert(:name,:phone, :email, :content, :type, :req_id, :prd_name, :log);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':req_id', $req_id, PDO::PARAM_STR);
            $stmt->bindParam(':prd_name', $prd_name, PDO::PARAM_STR);
            $stmt->bindParam(':log', $log, PDO::PARAM_STR);

            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data = $stmt->fetchColumn();
                }
            }
            $stmt->closeCursor();
        }
        return $data;
    }

    //edit content
}