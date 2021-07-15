<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Examinations_model extends CI_Model {

    //********************************************************************/
    //  GET EXAMINATIONS LIST
    //********************************************************************/
// count(QS.id)
    public function get_examinations_list($_status = "", $_title = "", $_tag = ""){
        $_sql = "select E.* from quiz E";

        $where = false;

        if($_status != ""){
            $_sql .= " where E.is_active = $_status ";
            $where = true;
        }

        if($_title != ""){
            if($where) $_sql .= " and E.title like '".$_title."%' ";
            else{
                $_sql .= " where E.title like '".$_title."%' ";
                $where = true;
            }
        }

        if($_tag != ""){
            if($where) $_sql .= " and E.tag like '".$_tag."%' ";
            else{
                $_sql .= " where E.tag like '".$_tag."%' ";
                $where = true;
            }
        }

        $_sql .= " order by E.id desc";

        //print $_sql;

        $_result = $this->db->query($_sql);
        return $_result->result_array();
    }


    //********************************************************************/
    //  GET EXAMINATION BY ID
    //********************************************************************/

    public function get_examination_detail($_id = ""){
        $_sql = "select * from quiz where id = $_id";
        $_res = $this->db->query($_sql);
        return $_res->result_array();
    }

    public function get_examination_detail_row($_id = ""){
        $_sql = "select * from quiz where id = $_id";
        $_res = $this->db->query($_sql);
        return $_res->row();
    }


    //********************************************************************/
    //  GET EXAMINATION - QUESTIONS
    //********************************************************************/

    public function get_examination_questions($_exam_id){
        $_sql = "SELECT Q.id as ques_id, QI.id as image_id, Q.qns_title, QI.image_path, Q.eid FROM `questions` Q left join `question_images` QI
        on Q.id = QI.qid where eid = $_exam_id";
        $_res = $this->db->query($_sql);
        return $_res->result_array();
    }

    public function get_questions_options($_exam_id){
        $_sql = "select * from options where eid = $_exam_id";
        $_res = $this->db->query($_sql);
        return $_res->result_array();
    }

    //********************************************************************/
    //  DELETE OPTIONS
    //********************************************************************/

    public function delete_option($option_id){
        $_sql = "delete from options where id = $option_id";
        if($this->db->query($_sql)) return true;
        else return false;
    }

    public function delete_exam_options($exam_id){
        $_sql = "delete from options where eid = $exam_id";
        if($this->db->query($_sql)) return true;
        else return false;
    }

    public function delete_ques_options($ques_id){
        $_sql = "delete from options where qid = $ques_id";
        if($this->db->query($_sql)) return true;
        else return false;
    }






}
