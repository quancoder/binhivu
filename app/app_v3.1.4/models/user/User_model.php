<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{	
	public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    
    function user_info($user_id)
    {
        $data = array();

        // get user info
        $uInfo = SSOServices::user_info($user_id);

        $iconn = $this->db->conn_id;
        $sql = "CALL rmt_user_info(:user_id);";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            if($stmt->execute())
            {
                if($stmt->rowCount() > 0)
                {
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                $stmt->closeCursor();
            }
        }

        if(!empty($data))
        {
            $data['phone'] = '';
            $data['contact_name'] = '';
            $data['email_address'] = '';
            $data['address'] = '';
            $data['gender'] = '0';
            $data['birthday'] = '';
            $data['gau'] = '';
            $data['password'] = '';

            if(!empty($uInfo))
            {
                $data['phone'] = $uInfo['phone'];
                $data['contact_name'] = $uInfo['fullname'];
                $data['email_address'] = $uInfo['email'];
                $data['address'] = $uInfo['address'];
                $data['gender'] = $uInfo['gender'];
                $data['birthday'] = $uInfo['birthday'];
                $data['password'] = $uInfo['password'];
                $data['gau'] = $uInfo['gau'];


                if($data['groupid'] != $uInfo['groupid'] || $data['active'] != $uInfo['active'] || $data['block'] != $uInfo['block'] || $data['delete'] != $uInfo['delete'] || $data['issale'] != $uInfo['issale'] || $data['saleid'] != $uInfo['saleid'])
                {
                    $sql = "CALL rmt_user_sync_from_sso(:user_id, :username, :groupid, :issale, :saleid, :active, :block, :delete, :role);";
                    $stmt = $iconn->prepare($sql);
                    if($stmt)
                    {
                        $role = $data['role'];
                        $stmt->bindParam(':user_id', $uInfo['user_id'], PDO::PARAM_INT);
                        $stmt->bindParam(':username', $uInfo['username'], PDO::PARAM_STR);
                        $stmt->bindParam(':groupid', $uInfo['groupid'], PDO::PARAM_INT);
                        $stmt->bindParam(':issale', $uInfo['issale'], PDO::PARAM_INT);
                        $stmt->bindParam(':saleid', $uInfo['saleid'], PDO::PARAM_INT);
                        $stmt->bindParam(':active', $uInfo['active'], PDO::PARAM_INT);
                        $stmt->bindParam(':block', $uInfo['block'], PDO::PARAM_INT);
                        $stmt->bindParam(':delete', $uInfo['delete'], PDO::PARAM_INT);
                        $stmt->bindParam(':role', $role, PDO::PARAM_INT);
                        if($stmt->execute())
                        {
                            $stmt->closeCursor();
                        }
                    }
                }
            }
        }
        // sync user info to remarketdb
        else
        {
            if(!empty($uInfo))
            {
                //syn user
                $sql = "CALL rmt_user_sync_from_sso(:user_id, :username, :groupid, :issale, :saleid, :active, :block, :delete, :role);";
                $stmt = $iconn->prepare($sql);
                if($stmt)
                {
                    $role = '3';
                    $stmt->bindParam(':user_id', $uInfo['user_id'], PDO::PARAM_INT);
                    $stmt->bindParam(':username', $uInfo['username'], PDO::PARAM_STR);
                    $stmt->bindParam(':groupid', $uInfo['groupid'], PDO::PARAM_INT);
                    $stmt->bindParam(':issale', $uInfo['issale'], PDO::PARAM_INT);
                    $stmt->bindParam(':saleid', $uInfo['saleid'], PDO::PARAM_INT);
                    $stmt->bindParam(':active', $uInfo['active'], PDO::PARAM_INT);
                    $stmt->bindParam(':block', $uInfo['block'], PDO::PARAM_INT);
                    $stmt->bindParam(':delete', $uInfo['delete'], PDO::PARAM_INT);
                    $stmt->bindParam(':role', $role, PDO::PARAM_INT);
                    if($stmt->execute())
                    {
                        $stmt->closeCursor();

                        $sql2 = "CALL rmt_user_info(:user_id);";
                        $stmt2 = $iconn->prepare($sql2);
                        if($stmt)
                        {
                            $stmt2->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                            if($stmt2->execute())
                            {
                                if($stmt2->rowCount() > 0)
                                {
                                    $data = $stmt2->fetch(PDO::FETCH_ASSOC);
                                }
                                $stmt2->closeCursor();
                            }
                        }
                    }
                }
                if(!empty($data))
                {
                    $data['phone'] = $uInfo['phone'];
                    $data['contact_name'] = $uInfo['fullname'];
                    $data['email_address'] = $uInfo['email'];
                    $data['address'] = $uInfo['address'];
                    $data['gender'] = $uInfo['gender'];
                    $data['birthday'] = $uInfo['birthday'];
                    $data['password'] = $uInfo['password'];
                    $data['gau'] = $uInfo['gau'];
                }
            }
        }
        return $data;
    }
    
    public function user_update_last_login_date($uid)
	{
		$sql = "CALL rmt_user_login_logs(:user_id);";
		$stmt = $this->db->conn_id->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':user_id', $uid, PDO::PARAM_INT);
			if($stmt->execute())
			{
				$stmt->closeCursor();
			}
		}
	}
	
	
	// check quyen user co quyen ghi note payment log hay khong
    function user_payment_note_config_check($user_id)
    {
        $chk = false;
        $iconn = $this->db_slave->conn_id;
        $sql = "CALL rmt_user_payment_note_config_check(:user_id)";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            if($stmt->execute())
            {
                if($stmt->rowCount() > 0)
                {
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    $chk = isset($data['check']) && $data['check'] > 0 ? true : false;
                }
                $stmt->closeCursor();
            }
        }
        return $chk;
    }
    
    // check quyen user co duoc phap setup run banner cho package hay khong
    function user_package_run_setup_config_check($user_id, $user_package_id)
    {
        $chk = false;
        $iconn = $this->db_slave->conn_id;
        $sql = "CALL rmt_user_package_run_setup_config_check(:user_id, :upk_id)";
        $stmt = $iconn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindParam(':upk_id', $user_package_id, PDO::PARAM_STR);
            if($stmt->execute())
            {
                if($stmt->rowCount() > 0)
                {
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    $chk = isset($data['check']) && $data['check'] > 0 ? true : false;
                }
                $stmt->closeCursor();
            }
        }
        return $chk;
    }
 }