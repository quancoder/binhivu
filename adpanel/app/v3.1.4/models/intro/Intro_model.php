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

    //info
    function intro_edit($id, $intro, $copyright)
    {
        $data = FALSE;
        $iconn = $this->db->conn_id;
        $sql = "CALL intro_edit(:id, :intro, :copyright);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':intro', $intro, PDO::PARAM_STR);
            $stmt->bindParam(':copyright', $copyright, PDO::PARAM_STR);
            // execute the stored procedure
            if ($stmt->execute()) {
                $data = TRUE;
            }
        }
        return $data;
    }
}