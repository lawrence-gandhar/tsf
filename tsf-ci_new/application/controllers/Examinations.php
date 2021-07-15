<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examinations extends CI_Controller {

    public function index(){
        if(check_logged_on()){
          $data["class_list"] = $this->Admin_model->get_classes_list();
          $data["states"] = $this->Admin_model->get_states();
          $data["coord_list"] = $this->Admin_model->get_coordinators();
          $data["examtype_list"] = $this->Admin_model->get_examtype();

          $this->load->view('admin/manage_examinations', $data);
        }
    }

    //
    //
    //

    public function get_examinations_list(){
        if(check_logged_on()){
            $_status = clean_input($this->input->get('e_status'));
            $_title = clean_input($this->input->get('e_title'));
            $_tag = clean_input($this->input->get('e_tag'));

            $_res = $this->Examinations_model->get_examinations_list($_status, $_title, $_tag);

            $response_array["examinations_list"] = $_res;
            $response_array["msg"] = "OK";
            $response_array["status"] = "success";
            echo json_encode($response_array);
        }
    }

    //
    //
    //

	public function add_examination(){
        if(check_logged_on()){

            $data["class_list"] = $this->Admin_model->get_classes_list();
            $data["states"] = $this->Admin_model->get_states();
            $data["coord_list"] = $this->Admin_model->get_coordinators();
            $data["examtype_list"] = $this->Admin_model->get_examtype();


            if($this->input->post('submit') == "Submit"){
                $name = clean_input($this->input->post('name'));
                $total_questions = clean_input($this->input->post('total_questions'));
                $total_marks = clean_input($this->input->post('total_marks'));
                $time = clean_input($this->input->post('time'));
                $tag = clean_input($this->input->post('tag'));
                $desc = clean_input($this->input->post('desc'));

                $eid = uniqid();

                $field_array = array(
                    "eid" => $eid,
                    "title" => $name,
                    "total_questions" => $total_questions,
                    "total_marks" => $total_marks,
                    "time" => $time,
                    "tag" => $tag,
                    "intro" => $desc
                );

                if($this->db->insert('quiz', $field_array)){

                    /********************************** */

                    $_upload_path = 'uploads/examinations/';
                    if(is_dir($path)){
                        mkdir($_upload_path.$this->db->insert_id(), 0777);
                    }else{
                        mkdir($_upload_path, 0777);
                        mkdir($_upload_path.$this->db->insert_id(), 0777);
                    }
                    /********************************* */

                    redirect(base_url()."admin/examinations/".$this->db->insert_id()."/questions/add", "refresh");
                }
            }

            $this->load->view('admin/add_examination', $data);
        }
    }

    //
    //
    //

    public function get_examination_detail(){
        if(check_logged_on()){

            $_id = clean_input($this->input->post('exam_id'));

            $_res = $this->Examinations_model->get_examination_detail($_id);
            echo json_encode($_res);

        }
    }

    //
    //
    //

    public function edit_examination(){
        if(check_logged_on()){
            $id = $this->input->post('id');
            $name = clean_input($this->input->post('name'));
            $total_questions = clean_input($this->input->post('total_questions'));
            $total_marks = clean_input($this->input->post('total_marks'));
            $time = clean_input($this->input->post('time'));
            $tag = clean_input($this->input->post('tag'));
            $desc = clean_input($this->input->post('desc'));
            $status = $this->input->post('status');

            $field_array = array(
                "title" => $name,
                "total_questions" => $total_questions,
                "total_marks" => $total_marks,
                "time" => $time,
                "tag" => $tag,
                "intro" => $desc,
                "is_active" => $status,
            );

            if($this->input->post('start_date') != ""){
              $field_array["start_date"] = $this->input->post('start_date');
            }else $field_array["start_date"] = NULL;


            if($this->input->post('end_date') != ""){
              $field_array["end_date"] = $this->input->post('end_date');
            }else $field_array["end_date"] = NULL;

            $this->db->where('id', $id);
            $this->db->update('quiz', $field_array);
            redirect(base_url()."admin/examinations", "refresh");
        }
    }

    //
    //
    //

    public function add_exam_questions($_exam_id){
        if(check_logged_on()){

            $data["class_list"] = $this->Admin_model->get_classes_list();
            $data["states"] = $this->Admin_model->get_states();
            $data["coord_list"] = $this->Admin_model->get_coordinators();
            $data["examtype_list"] = $this->Admin_model->get_examtype();

            if($this->input->method() == "get"){
                if($this->Admin_model->id_exists($_exam_id, 'quiz')){

                    $_exam = $this->Examinations_model->get_examination_detail_row($_exam_id);
                    $data["new_sec"] = $_exam->total_questions;

                    $this->load->view('admin/add_questions', $data);
                }
            }else{

                if($this->input->post()){

                    $qns_title = $this->input->post('qns_title');

                    $i = 1;
                    foreach($qns_title as $qns){

                        if($this->db->insert("questions", array("eid"=>$_exam_id, "qns_title"=>$qns))){
                            $q_id = $this->db->insert_id();

                            $opt_data = $this->input->post("option_".$i);
                            $curr_data = $this->input->post("correct_ans_".$i);

                            for($x = 0; $x < count($opt_data); $x++){
                                if($opt_data[$x] !=""){
                                    $_opt_d = array(
                                        "eid" => $_exam_id,
                                        "qid" => $q_id,
                                        "option" => $opt_data[$x],
                                        "is_correct" => $curr_data[$x],
                                    );

                                    $this->db->insert("options", $_opt_d);
                                }
                            }
                        }
                        $i++;
                    }

                    redirect(base_url()."admin/examinations", "refresh");
                }
            }
        }
    }


    //
    //
    //

    public function edit_exam_questions($_exam_id){
        if(check_logged_on()){

            $data["class_list"] = $this->Admin_model->get_classes_list();
            $data["states"] = $this->Admin_model->get_states();
            $data["coord_list"] = $this->Admin_model->get_coordinators();
            $data["examtype_list"] = $this->Admin_model->get_examtype();

            if($this->Admin_model->id_exists($_exam_id, 'quiz')){

                $_res = $this->Examinations_model->get_examination_questions($_exam_id);
                $_exam = $this->Examinations_model->get_examination_detail_row($_exam_id);
                $_options = $this->Examinations_model->get_questions_options($_exam_id);

                $_results = array();

                foreach($_res as $_rr){

                    $_results[$_rr["ques_id"]]["qns_title"] = $_rr["qns_title"];

                    $_results[$_rr["ques_id"]]["img_arr"][] = array(
                        "image_id" => $_rr["image_id"],
                        "image_path" => $_rr["image_path"]
                    );

                }

                $data["exam_id"] = $_exam_id;
                $data["options"] = $_options;
                $data["results"] = $_results;

                $data["new_sec"] = $_exam->total_questions - count($_results);

                $this->load->view('admin/edit_examination_questions', $data);
            }
        }
    }

    //
    //
    //

    public function delete_option(){
        if(check_logged_on()){
            $option_id = $this->input->post('option_id');

            if($this->Admin_model->id_exists($option_id, 'options')){
                if($this->Examinations_model->delete_option($option_id)) echo '1';
                else echo '0';
            }else echo '-1';
        }
    }


    //
    //
    //

    public function questions_save($_exam_id){
        if(check_logged_on()){

            if($this->input->post('submit') == "Save"){

                $ques_id = $this->input->post('ques_id');

                $opt_data = $this->input->post("option");
                $curr_data = $this->input->post("correct_ans");

                $qns_title = $this->input->post("qns_title");

                $this->db->where("id", $ques_id);
                $this->db->update("questions", array("qns_title" => $qns_title));


                $data = array();


                // If files are selected to upload
                if(!empty($_FILES['img'.$ques_id]['name']) && count(array_filter($_FILES['img'.$ques_id]['name'])) > 0){

                    // Set preference
                    $upload_path = 'uploads/examinations/'.$_exam_id."/".$ques_id."/";

                    $config['upload_path'] = $upload_path;
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
                    $config['max_size'] = '5000'; // max_size in kb

                    if(!is_dir($upload_path)){
                        mkdir($upload_path, 0777);
                    }

                    // Count total files
                    $countfiles = count($_FILES['img'.$ques_id]['name']);

                    // Looping all files
                    for($i=0;$i<$countfiles;$i++){

                        if(!empty($_FILES['img'.$ques_id]['name'][$i])){

                            // Define new $_FILES array - $_FILES['file']
                            $_FILES['file']['name'] = $_FILES['img'.$ques_id]['name'][$i];
                            $_FILES['file']['type'] = $_FILES['img'.$ques_id]['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['img'.$ques_id]['tmp_name'][$i];
                            $_FILES['file']['error'] = $_FILES['img'.$ques_id]['error'][$i];
                            $_FILES['file']['size'] = $_FILES['img'.$ques_id]['size'][$i];

                            $config['file_name'] = $_FILES['file']['name'];

                            //Load upload library
                            $this->load->library('upload',$config);
                            $this->upload->initialize($config);

                            // File upload
                            if($this->upload->do_upload('file')){
                                // Get data about the file
                                $uploadData = $this->upload->data();
                                $filename = $uploadData['file_name'];

                                // Initialize array
                                $data['filenames'][] = $filename;

                                $f_arr = array(
                                    "qid" => $ques_id,
                                    "image_path" => $filename
                                );

                                $this->db->insert("question_images", $f_arr);

                            }
                        }
                    }
                }

                if($this->Examinations_model->delete_ques_options($ques_id)){
                    for($x = 0; $x < count($opt_data); $x++){
                        if($opt_data[$x] !=""){
                            $_opt_d = array(
                                "eid" => $_exam_id,
                                "qid" => $ques_id,
                                "option" => $opt_data[$x],
                                "is_correct" => $curr_data[$x],
                            );

                            $this->db->insert("options", $_opt_d);
                        }
                    }
                }

                redirect(base_url()."admin/examinations/".$_exam_id."/questions/edit/", "refresh");
            }
        }
    }


    //
    //
    //

    public function delete_question($exam_id, $ques_id){
        if(check_logged_on()){
            $this->db->delete('questions', array("id"=>$ques_id));
            $this->db->delete('options', array("qid"=>$ques_id));

            $upload_path = 'uploads/examinations/'.$_exam_id."/".$ques_id."/";

            $this->db->delete('question_images', array("qid" => $ques_id));

            array_map('unlink', glob("$upload_path/*"));
            rmdir($upload_path);

            redirect(base_url()."admin/examinations/".$exam_id."/questions/edit/", "refresh");
        }
    }


    //
    //
    //

    public function delete_question_image($_img_id){
        if(check_logged_on()){
            $_table_name = "question_images";
            if($this->Admin_model->id_exists($_img_id, $_table_name)){

            }
        }
    }



}
