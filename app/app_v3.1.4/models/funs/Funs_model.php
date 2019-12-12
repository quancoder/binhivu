<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funs_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}

	//info
    function funs_info($funs_id)
    {
        $data = array();
        $iconn = $this->db->conn_id;
        $sql = "CALL funs_info(:funs_id);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':funs_id', $funs_id, PDO::PARAM_INT);
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

    //list paging
    function funs_list_paging($user_id, $status=-1, $search='', $tag='', $start=1, $numrow=20){
        $data = array();
        $data['list'] = array();
        $data['pCount'] = $data['iCount'] = 0;
        $iconn = $this->db->conn_id;
        $sql = "CALL funs_list_paging(:user_id, :status, :search, :tag, :start, :numrow);";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->bindParam(':search', $search, PDO::PARAM_STR);
            $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);
            $stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $stmt->bindParam(':numrow', $numrow, PDO::PARAM_INT);
            // execute the stored procedure
            if($stmt->execute())
            {
                if($stmt->rowCount() > 0)
                {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $data['list'][] = $row;
                    }
                }
                $stmt->nextRowset();
                if($stmt->rowCount() > 0)
                {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $data['iCount'] = isset($row['ttitem']) ? $row['ttitem'] : 0;
                }
                $stmt->closeCursor();
            }
        }
        if($data['iCount'] > 0)
        {
            $data['pCount'] = ceil($data['iCount']/$numrow);
        }

        return $data;
    }

    //list paging
    function funs_list_top_view(){
        $data = array();
        $iconn = $this->db->conn_id;
        $sql = "CALL funs_list_top_view();";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            // execute the stored procedure
            if($stmt->execute())
            {
                if($stmt->rowCount() > 0)
                {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                $stmt->closeCursor();
            }
        }

        return $data;
    }

}