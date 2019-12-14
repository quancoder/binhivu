<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}

	//info
    function news_info($news_id)
    {
        $data = array();
        $iconn = $this->db->conn_id;
        $sql = "CALL news_info(:news_id);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':news_id', $news_id, PDO::PARAM_INT);
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
    function news_list_paging($user_id, $status=-1, $search='', $tag='', $start=0, $numrow=20){
        $data = array();
        $data['list'] = array();
        $data['pCount'] = $data['iCount'] = 0;
        $iconn = $this->db->conn_id;
        $sql = "CALL news_list_paging(:user_id, :status, :search, :tag, :start, :numrow);";
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
                        $title = htmlentities($row['news_title']);
                        $row['news_title'] = $title;
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

    function news_list_top_view($top=10){
        $data = array();
        $iconn = $this->db->conn_id;
        $sql = "CALL news_list_top_view(:top);";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':top', $top, PDO::PARAM_INT);
            // execute the stored procedure
            if($stmt->execute())
            {
                if($stmt->rowCount() > 0)
                {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $title = htmlentities($row['news_title']);
                        $row['news_title'] = $title;
                        $data[] = $row;
                    }
                }
                $stmt->closeCursor();
            }
        }

        return $data;
    }

}