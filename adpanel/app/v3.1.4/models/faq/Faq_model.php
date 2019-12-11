<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Faq_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    //answer_info
    function rmt_faq_answer_info($_ans_id)
    {
        $data = array();
        $iconn = $this->db_slave->conn_id;
        $sql = "CALL rmt_faq_answer_info(:_ans_id);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_ans_id', $_ans_id, PDO::PARAM_INT);
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

    function rmt_faq_answer_list_all()
    {
        $data = array();
        $iconn = $this->db_slave->conn_id;
        $sql = "CALL rmt_faq_answer_list_all();";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $data[$row['ques_id']] =$row;
                    }
                }
                $stmt->closeCursor();
            }
        }
        return $data;
    }

    // answer_insert
    function rmt_faq_answer_insert($_ques_id, $_content, $_langcode)
    {
        $data = 0;
        $iconn = $this->db->conn_id;
        $sql = "CALL rmt_faq_answer_insert(:_ques_id,:_content, :_langcode);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_ques_id', $_ques_id, PDO::PARAM_INT);
            $stmt->bindParam(':_content', $_content, PDO::PARAM_STR);
            $stmt->bindParam(':_langcode', $_langcode, PDO::PARAM_INT);

            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data = $stmt->fetchColumn();
                }
            }
            $stmt->closeCursor();
        }
        return $data;

    }

    //answer_list_by_cat
    function rmt_faq_answer_list_by_cat($_cat_id)
    {
        $data = array();
        $iconn = $this->db_slave->conn_id;
        $sql = "CALL rmt_faq_answer_list_by_cat(:_cat_id);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_cat_id', $_cat_id, PDO::PARAM_INT);

            // execute the stored procedure
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data = $stmt->fetchall(PDO::FETCH_ASSOC);
                }

                $stmt->closeCursor();
            }
        }


        return $data;
    }

    //answer_update
    function rmt_faq_answer_update($_ans_id, $_ques_id, $_content, $_langcode)
    {
        $check = false;
        $iconn = $this->db->conn_id;
        $sql = "CALL rmt_faq_answer_update(:_ans_id, :_ques_id, :_content, :_langcode);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_ans_id', $_ans_id, PDO::PARAM_INT);
            $stmt->bindParam(':_ques_id', $_ques_id, PDO::PARAM_INT);
            $stmt->bindParam(':_content', $_content, PDO::PARAM_STR);
            $stmt->bindParam(':_langcode', $_langcode, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $check = true;
            }
            $stmt->closeCursor();
        }
        return $check;

    }

    //category_delete
    public function rmt_faq_category_delete($_cat_id)
    {
        $check = false;
        $iconn = $this->db->conn_id;
        $sql = "CALL rmt_faq_category_delete(:_cat_id);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_cat_id', $_cat_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $check = true;
            }
            $stmt->closeCursor();
        }
        return $check;
    }

    //category_info
    function rmt_faq_category_info($_cid)//_cid
    {
        $data = array();
        $iconn = $this->db_slave->conn_id;
        $sql = "CALL rmt_faq_category_info(:_cid);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_cid', $_cid, PDO::PARAM_INT);
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

    //insert category
    function rmt_faq_category_insert($name, $parentid, $langcode = 1)
    {
        $data = 0;
        $iconn = $this->db->conn_id;
        $sql = "CALL rmt_faq_category_insert(:_name,:_parent_id, :_langcode);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_parent_id', $parentid, PDO::PARAM_INT);
            $stmt->bindParam(':_name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':_langcode', $langcode, PDO::PARAM_INT);

            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data = $stmt->fetchColumn();
                }
//                $check = true;
            }
            $stmt->closeCursor();
        }
        return $data;
    }

    //get list category
    function rmt_faq_category_list_all($langcode = 1)
    {
        $data = array();
        $iconn = $this->db_slave->conn_id;
        $sql = "CALL rmt_faq_category_list_all(:_langcodeid);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_langcodeid', $langcode, PDO::PARAM_INT);

            // execute the stored procedure
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        if($row['parent_id'] == 0)
                        {
                            $data[$row['cat_id']]['cat_id'] = $row['cat_id'];
                            $data[$row['cat_id']]['name'] = $row['name'];
                            $data[$row['cat_id']]['priority'] = $row['priority'];
                            $data[$row['cat_id']]['category'] = [];
                        }
                        else
                        {
                            $data[$row['parent_id']]['category'][$row['cat_id']] = $row;
                        }
                    }
                }
                $stmt->closeCursor();
            }
        }
        foreach ($data as $k1 => $parent)
        {
            $parent_priority[$k1] = $parent['priority'];

            $cat_priority = array();
            foreach ($parent['category'] as $k2 => $cat){
                $cat_priority[$k2] = $cat['priority'];
            }
            array_multisort($cat_priority, SORT_ASC, $data[$k1]['category']);
        }
        array_multisort($parent_priority, SORT_ASC, $data);
        return $data;
    }

    //category_priority_set
    function rmt_faq_category_priority_set($_cat_id, $_priority)
    {
        $check = false;
        $iconn = $this->db->conn_id;
        $sql = "CALL rmt_faq_category_priority_set(:_cat_id, :_priority);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_cat_id', $_cat_id, PDO::PARAM_INT);
            $stmt->bindParam(':_priority', $_priority, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $check = true;
            }
            $stmt->closeCursor();
        }
        return $check;

    }

    //update category
    public function rmt_faq_category_update($_cat_id, $_parent_id, $_name)
    {
        $check = false;
        $iconn = $this->db->conn_id;
        $sql = "CALL rmt_faq_category_update(:_cat_id, :_parent_id, :_name);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_cat_id', $_cat_id, PDO::PARAM_INT);
            $stmt->bindParam(':_parent_id', $_parent_id, PDO::PARAM_STR);
            $stmt->bindParam(':_name', $_name, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $check = true;
            }
            $stmt->closeCursor();
        }
        return $check;

    }

    //question_delete
    function rmt_faq_question_delete($_ques_id)
    {
        $check = false;
        $iconn = $this->db->conn_id;
        $sql = "CALL rmt_faq_question_delete(:_ques_id);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_ques_id', $_ques_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $check = true;
            }
            $stmt->closeCursor();
        }
        return $check;

    }

    //question_info
    function rmt_faq_question_info($_ques_id)
    {
        $data = array();
        $iconn = $this->db_slave->conn_id;
        $sql = "CALL rmt_faq_question_info(:_ques_id);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_ques_id', $_ques_id, PDO::PARAM_INT);
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

    //question_insert
    function rmt_faq_question_insert($_name, $_cat_id, $_langcode)
    {
        $data = 0;
        $iconn = $this->db->conn_id;
        $sql = "CALL rmt_faq_question_insert(:_name,:_cat_id, :_langcode);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_name', $_name, PDO::PARAM_STR);
            $stmt->bindParam(':_cat_id', $_cat_id, PDO::PARAM_INT);
            $stmt->bindParam(':_langcode', $_langcode, PDO::PARAM_INT);

            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data = $stmt->fetchColumn();
                }
            }
            $stmt->closeCursor();

        }
        return $data;

    }

    //question_list_all
    function rmt_faq_question_list_all($langcode, $_cat_id)
    {
        $data = array();
        $iconn = $this->db_slave->conn_id;
        $sql = "CALL rmt_faq_question_list_all(:_langcodeid, :_cat_id);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_langcodeid', $langcode, PDO::PARAM_INT);
            $stmt->bindParam(':_cat_id', $_cat_id, PDO::PARAM_INT);

            // execute the stored procedure
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }

                $stmt->closeCursor();
            }
        }

        return $data;
    }

    //question_priority_set
    function rmt_faq_question_priority_set($_ques_id, $_priority)
    {
        $check = false;
        $iconn = $this->db->conn_id;
        $sql = "CALL rmt_faq_question_priority_set(:_ques_id, :_priority);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_ques_id', $_ques_id, PDO::PARAM_INT);
            $stmt->bindParam(':_priority', $_priority, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $check = true;
            }
            $stmt->closeCursor();
        }
        return $check;

    }

    //question_update
    function rmt_faq_question_update($_ques_id, $_cat_id, $_name)
    {
        $check = false;
        $iconn = $this->db->conn_id;
        $sql = "CALL rmt_faq_question_update(:_ques_id, :_cat_id, :_name);";
        $stmt = $iconn->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':_ques_id', $_ques_id, PDO::PARAM_INT);
            $stmt->bindParam(':_cat_id', $_cat_id, PDO::PARAM_INT);
            $stmt->bindParam(':_name', $_name, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $check = true;
            }
            $stmt->closeCursor();
        }
        return $check;
    }
}