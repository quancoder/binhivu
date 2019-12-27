<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}

	//info
    function document_info($doc_id)
    {
        $data = array();
        $iconn = $this->db->conn_id;
        $sql = "CALL document_info(:doc_id);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':doc_id', $doc_id, PDO::PARAM_INT);
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
    function document_list_paging($user_id, $status=-1, $search='', $tag='', $start=0, $numrow=20){
        $data = array();
        $data['list'] = array();
        $data['pCount'] = $data['iCount'] = 0;
        $iconn = $this->db->conn_id;
        $sql = "CALL document_list_paging(:user_id, :status, :search, :tag, :start, :numrow);";
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
                        $data['list'][$row['doc_id']] = $row;
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
    function document_insert($name, $des, $content, $image, $tag, $path_file, $free, $price, $status, $user)
    {
        $data = 0;
        $iconn = $this->db->conn_id;
        $sql = "CALL document_insert(:name, :des, :content, :image, :tag, :path_file, :free, :price,:status, :user);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':des', $des, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
            $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);
            $stmt->bindParam(':path_file', $path_file, PDO::PARAM_STR);
            $stmt->bindParam(':free', $free, PDO::PARAM_INT);
            $stmt->bindParam(':price', $price, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->bindParam(':user', $user, PDO::PARAM_INT);

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
    function document_update($id, $doc_name, $doc_des, $doc_content, $doc_tag, $doc_price, $doc_free,$doc_path_file, $doc_image, $doc_status)
    {
        $isUpdate = FALSE;
        $iconn = $this->db->conn_id;
        $sql = "CALL document_update(:id, :doc_name, :doc_des, :doc_content, :doc_tag, :doc_price, :doc_free,:doc_path_file, :doc_image, :doc_status);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':doc_name', $doc_name, PDO::PARAM_STR);
            $stmt->bindParam(':doc_des', $doc_des, PDO::PARAM_STR);
            $stmt->bindParam(':doc_content', $doc_content, PDO::PARAM_STR);
            $stmt->bindParam(':doc_tag', $doc_tag, PDO::PARAM_STR);
            $stmt->bindParam(':doc_price', $doc_price, PDO::PARAM_INT);
            $stmt->bindParam(':doc_free', $doc_free, PDO::PARAM_INT);
            $stmt->bindParam(':doc_path_file', $doc_path_file, PDO::PARAM_STR);
            $stmt->bindParam(':doc_image', $doc_image, PDO::PARAM_STR);
            $stmt->bindParam(':doc_status', $doc_status, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $isUpdate = TRUE;
            }
            $stmt->closeCursor();
        }
        return $isUpdate;
    }
}