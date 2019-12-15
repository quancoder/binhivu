<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authenticate_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
    function user_info_by_username($username)
    {
        $rel = array();
        $iconn = $this->db->conn_id;

        $sql = "CALL user_info_by_username(:username);";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            // execute the stored procedure
            if($stmt->execute())
            {
                if($stmt->rowCount() > 0)
                {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $rel = $row;
                    }
                }
                $stmt->closeCursor();
            }
        }
        return $rel;
    }

    //edit status
    public function user_update_password($uid, $hashpass)
    {
        $check = false;
        $iconn = $this->db->conn_id;
        $sql = "CALL user_update_password(:uid, :hashpass);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
            $stmt->bindParam(':hashpass', $hashpass, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $check = true;
            }
            $stmt->closeCursor();
        }
        return $check;
    }
}