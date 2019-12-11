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
    function funs_list_paging($user_id, $status=-1, $search='', $tag='', $page=1, $numrow=20){
        $data = array();
        $data['list'] = array();
        $data['pCount'] = $data['iCount'] = 0;
        $iconn = $this->db->conn_id;
        $sql = "CALL funs_list_paging(:user_id, :status, :search, :tag, :page, :numrow);";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->bindParam(':search', $search, PDO::PARAM_STR);
            $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);
            $stmt->bindParam(':page', $page, PDO::PARAM_INT);
            $stmt->bindParam(':numrow', $numrow, PDO::PARAM_INT);
            // execute the stored procedure
            if($stmt->execute())
            {
                if($stmt->rowCount() > 0)
                {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $data['list'][$row['funs_id']] = $row;
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

    //insert
    function funs_insert($title, $sapo, $content, $image, $thumb, $user_id, $status, $tag)
    {
        $data = 0;
        $iconn = $this->db->conn_id;
        $sql = "CALL funs_insert(:title, :sapo, :content, :image, :thumb, :user_id, :status, :tag);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':sapo', $sapo, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
            $stmt->bindParam(':thumb', $thumb, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);

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

    //insert
    function funs_update($funs_id, $title, $sapo, $content, $image, $thumb, $tag, $status)
    {
        $isUpdate = FALSE;
        $iconn = $this->db->conn_id;
        $sql = "CALL funs_update(:funs_id, :title, :sapo, :content, :image, :thumb, :tag, :status);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':funs_id', $funs_id, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':sapo', $sapo, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
            $stmt->bindParam(':thumb', $thumb, PDO::PARAM_STR);
            $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $isUpdate = TRUE;
            }
            $stmt->closeCursor();
        }
        return $isUpdate;
    }

    //edit status
    public function funs_update_status($funs_id, $status)
    {
        $check = false;
        $iconn = $this->db->conn_id;
        $sql = "CALL funs_update_status(:funs_id, :status);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':funs_id', $funs_id, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $check = true;
            }
            $stmt->closeCursor();
        }
        return $check;
    }
}