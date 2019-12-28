<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intro_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	//info
    function intro_info()
    {
        $data = array();
        $iconn = $this->db->conn_id;
        $sql = "CALL intro_info();";
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

    //info
    function intro_edit($id, $content)
    {
        $data = FALSE;
        $iconn = $this->db->conn_id;
        $sql = "CALL intro_edit(:id, :content);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            // execute the stored procedure
            if ($stmt->execute()) {
                $data = TRUE;
            }
        }
        return $data;
    }
}