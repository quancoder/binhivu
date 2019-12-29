<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intro_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

    //info
    function intro_info($id)
    {
        $data = array();
        $iconn = $this->db->conn_id;
        $sql = "CALL intro_info(:id);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
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