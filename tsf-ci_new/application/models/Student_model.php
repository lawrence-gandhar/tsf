<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	public function get_quiz_list(){
		$sql= "SELECT * FROM quiz ORDER BY date DESC";
		$_query = $this->db->query($sql);
        return $_query->result_array();
	}
	public function check_his($email,$eid){
		$sql= "SELECT score FROM history WHERE eid='$eid' AND email='$email'";
		$_query = $this->db->query($sql);
        return $_query->num_rows();
	}

	public function get_question_sheet($eid,$total){
		$data = array();
		$i=0;
		$qs   = "SELECT * FROM questions WHERE eid='$eid'";
		$qrs  = $this->db->query($qs);
		$ret  = $qrs->result_array();
		foreach($ret as $key=>$rows){
			$data[$i]['qns_title'] = $rows['qns_title'];
			$data[$i]['id'] = $rows['id'];
			$data[$i]['total'] = $total;
		$op     = "SELECT * FROM options WHERE qid='".$rows['id']."'";
		$opr    = $this->db->query($op);
		$oprest = $opr->result_array();
		$p=0;
			foreach($oprest as $kas=>$rows1){
				$data[$i]['option'][$p]['option']=$rows1['option'];
				$data[$i]['option'][$p]['optionid']=$rows1['id'];
				$p++;
			}
			$i++;	
		}

		return $data;

	}
	public function getr_result($eid){
		$loginid=$_SESSION['login_id'];
		$sql="SELECT * FROM history WHERE eid='$eid' AND email='$loginid' order by date desc";
		$opr    = $this->db->query($sql);
		$oprest = $opr->result_array();
		return $oprest;
	}
	public function get_rank(){
		$loginid=$_SESSION['login_id'];
		$sql="SELECT * FROM rank WHERE  email='$loginid'"; 
		$opr    = $this->db->query($sql);
		$oprest = $opr->result_array();
		return $oprest;
	}
	public function get_time($eid){
		$sql= "SELECT `time` FROM quiz where id='".$eid."'";
		$_query = $this->db->query($sql);
        return $_query->result_array();
	}

}
?>	