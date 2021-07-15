<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Exam_syllabus_model extends CI_Model {

	public function Exam_syllabus_list(){
		$es_sql = "SELECT es.file_path as file_path, es.pk_id as pk_id, lc.class_name as class, let.exam_type as exam_type from exam_syllabus as es join lk_class as lc on lc.id=es.fk_class_id and lc.is_active=1 join lk_exam_type as let on let.id=es.fk_exam_type and let.is_active=1 where es.is_active=1;";
		$query = $this->db->query($es_sql);
		$result = $query->result_array();
		//print_r($result);
		$response_array = array();
		if ($result) {
		    $syllabus_file_list = array();
		    foreach($result as $key=>$row) {
		        $arr = array("file_path"=>$row["file_path"], "pk_id"=>$row["pk_id"], "class"=>$row["class"], "exam_type"=>$row["exam_type"]);
		        array_push($syllabus_file_list, $arr);
		    }
		    $response_array['syllabus_file_list'] = $syllabus_file_list;
		    $status = "success";
		    $msg = "OK";
		} else {
		    $status = "error";
		    $msg = "Error: ";
		}
		return $response_array['syllabus_file_list'];
	}

	public function exam_select_one($class_id,$exam_id){
		$select_sql = "SELECT pk_id from exam_syllabus where fk_class_id=$class_id and fk_exam_type=$exam_id and is_active=1;";
		$qry = $this->db->query($select_sql); 
		return $qry->num_rows();
	}

	public function insert_syllabus($target_path,$class_id,$exam_id){

		$sql_ins="INSERT INTO exam_syllabus (file_path, fk_class_id, fk_exam_type, updated_on) VALUES ('$target_path', $class_id, $exam_id, now());";
		$this->db->query($sql_ins);

	}

	public function update_syllabus($target_path,$class_id,$exam_id){

		$sql_up="INSERT INTO exam_syllabus (file_path, fk_class_id, fk_exam_type, updated_on) VALUES ('$target_path', $class_id, $exam_id, now());";
		 return $this->db->query($sql_up);

	}

	public function delete_syllabus($syllabus_id){
		$data=array('is_active'=>0);
		$this->db->where('pk_id',$syllabus_id);
		$this->db->update('exam_syllabus',$data);
		echo "deleted Successfully";
	}
}
?>	