<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Exam_syllabus extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Exam_syllabus_model');
	}

	public function index(){

		$data['list'] = $this->Exam_syllabus_model->exam_syllabus_list();
		$sqls="SELECT * FROM `lk_exam_type` where is_active=1";
		$qry = $this->db->query($sqls);
		$data['exam_type'] = $qry->result_array();

		$sqlt="SELECT * FROM `lk_class` where is_active=1 ";
		$qrys = $this->db->query($sqlt);
		$data['class'] = $qrys->result_array();

		//echo'<pre>';print_r($data);die();
		$this->load->view('admin/exam_syllabus',$data);
	}

	public function add_exam_syllabus(){
		$target_dir = $_SERVER['DOCUMENT_ROOT']."/tsf-ci/static/syllabus/";
       $exam_id = $this->input->post("exam_type");
        
        $class_id = $this->input->post("class_name");
        

        $target_file = $target_dir . basename($_FILES["syllabus_image"]["name"]);
        $target_path = "/syllabus/" . basename($_FILES["syllabus_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $status="";
        if ($_FILES["syllabus_image"]["size"] > 2050000) {
            // Check file size
            $msg = "<p>Sorry, uploaded file is too large.</p>";
            $status = "error";
        } else {
            if(move_uploaded_file($_FILES["syllabus_image"]["tmp_name"], $target_file)) {
                date_default_timezone_set('Asia/Calcutta');
                $select_result = $this->Exam_syllabus_model->exam_select_one($class_id,$exam_id);
                if ($select_result!= 1) {
                   $result =  $this->Exam_syllabus_model->insert_syllabus($target_path,$class_id,$exam_id);
                } else {
                   $result= $this->Exam_syllabus_model->update_syllabus($target_path,$class_id,$exam_id);
                }
                $status = "Successfully added";
            } else {
                $msg = "<p>Error in uploading file.</p>";
                $status = "error";
            }
        }
        echo $status;
	}
	public function delete_syllabus(){
    $syllabus_id = $this->input->get('id');
    $status = $this->Exam_syllabus_model->delete_syllabus($syllabus_id);
    echo $status;
    }
}
?>