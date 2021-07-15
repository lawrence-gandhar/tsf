<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  //********************************************************************/
  // ADD SCHOOL DATA
  //********************************************************************/

  public function add_school(){
    $data = array(
        "school_reg_id" => "TSF-".rand(00000000,99999999),
        "name" => clean_input($this->input->post("school_name")),
        "address" => clean_input($this->input->post("address")),
        "city" => clean_input($this->input->post("city")),
        "fk_state_id" => $this->input->post("state"),
        "pincode" => clean_input($this->input->post("pincode")),
        "phone_no" => clean_input($this->input->post("phone_number")),
        "email_id" => clean_input($this->input->post("email")),
        "principal_name" => clean_input($this->input->post("principal_name")),
        "principal_mob_no" => clean_input($this->input->post("mobile_number")),
        "registered_on" => date("Y-m-d H:i:s")
    );

    if($this->db->insert('school_master', $data)){
      redirect($_SERVER['HTTP_REFERER'], "refresh");
    }
  }


  //********************************************************************/
  // ADD STUDENT RECORD
  //********************************************************************/

  public function add_student(){

    if($this->input->post()){
      $dob_date = $this->input->post("dob_date");
      $dob_month = $this->input->post("dob_month");

      if($dob_date<=9) $dob_date = "0".$dob_date;
      if($dob_month<=9) $dob_month = "0".$dob_month;

      $data = array(
        "student_name" => clean_input($this->input->post("student_name")),
        "school_name" => clean_input($this->input->post("school_name")),
        "registration_id" => "TSFSTUD-".rand(00000000,99999999),
        "fk_coordinator_id" => $this->input->post("coordinator"),
        "fk_class_id" => $this->input->post("class_id"),
        "fk_exam_type" => $this->input->post("examtype_id"),
        "father_name" => clean_input($this->input->post("father_name")),
        "dob" => $this->input->post("dob_year")."-".$dob_month."-".$dob_date,
        "gender" => $this->input->post("gender"),
        "address" => clean_input($this->input->post("address")),
        "city" => clean_input($this->input->post("city")),
        "fk_state" => $this->input->post("state"),
        "pincode" => clean_input($this->input->post("pincode")),
        "stud_email" => clean_input($this->input->post("email")),
        "parents_contact_no" => clean_input($this->input->post("phone"))
      );

      if($this->db->insert('student_registration', $data)){
        if(!empty($_FILES['photo']['name'])){

          /********************************** */

          $_upload_path = 'uploads/students/';
          if(is_dir($_upload_path)){
            if(!is_dir($_upload_path.$this->db->insert_id())) @mkdir($_upload_path.$this->db->insert_id(), 0777);
          }else{
            @mkdir($_upload_path, 0777);
            @mkdir($_upload_path.$this->db->insert_id(), 0777);
          }
          /************************************/

          // Set preference
          $upload_path = 'uploads/students/'.$this->db->insert_id()."/";

          $config['upload_path'] = $upload_path;
          $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
          $config['max_size'] = '50000'; // max_size in kb

          //Load upload library
          $this->load->library('upload',$config);
          $this->upload->initialize($config);

          if($this->upload->do_upload('photo')){
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];

            $f_arr = array(
                "image_path" => $upload_path.$filename
            );

            $this->db->where('id', $this->db->insert_id());
            $this->db->update('student_registration', $f_arr);

          }
          /************************************/
        }
      }
      redirect($_SERVER['HTTP_REFERER'], "refresh");
    }
  }


  //********************************************************************/
  // ADD COORDINATOR
  //********************************************************************/

  public function add_coordinator(){
    if($this->input->post()){
      $_coordinator_name = $this->input->post("coordinator_name");
      $_mobile_no = $this->input->post("mobile_no");
      $_email_id = $this->input->post("email_id");
      $_address = $this->input->post("address");
      $_dob_date = $this->input->post("dob_date");
      $_dob_month = $this->input->post("dob_month");
      $_dob_year = $this->input->post("dob_year");
      $_gender = $this->input->post("gender");
      $_city = $this->input->post("city");
      $_state = $this->input->post("state");
      $_pincode = $this->input->post("pincode");
      $_qualification = $this->input->post("qualification");
      $_profession = $this->input->post("profession");

      if($_dob_date<=9) $_dob_date = "0".$_dob_date;
      if($_dob_month<=9) $_dob_month = "0".$_dob_month;

      $data = array(
        "registration_id" => "TSFCO-".rand(00000000,99999999),
        "name" => clean_input($_coordinator_name),
        "email_id" => $_email_id,
        "mobile_no" => clean_input($_mobile_no),
        "address" => clean_input($_address),
        "city" => clean_input($_city),
        "fk_state" => $_state,
        "pincode" => clean_input($_pincode),
        "dob" => $_dob_year."-".$_dob_month."-".$_dob_date,
        "gender" => $_gender,
        "qualification" => clean_input($_qualification),
        "profession" => clean_input($_profession),
      );

      $_coord_id = $this->db->insert("coordinator_registration",$data);

      /******************************************************************/

      if($_coord_id){
        if(!empty($_FILES['photo']['name'])){

          $_upload_path = 'uploads/coordinator/';
          if(!is_dir($_upload_path)){
            if(!is_dir($_upload_path.$this->db->insert_id())) @mkdir($_upload_path.$this->db->insert_id(), 0777);
          }else{
            @mkdir($_upload_path, 0777);
            @mkdir($_upload_path.$this->db->insert_id(), 0777);
          }
        }

        // Set preference
        $upload_path = 'uploads/coordinator/'.$this->db->insert_id()."/";

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
        $config['max_size'] = '50000'; // max_size in kb

        //Load upload library
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('photo')){
          $uploadData = $this->upload->data();

          $filename = $uploadData['file_name'];

          $f_arr = array(
              "image_path" => $upload_path.$filename
          );

          $this->db->where('id', $this->db->insert_id());
          $this->db->update('coordinator_registration', $f_arr);
        }
      }

      /******************************************************************/

      redirect($_SERVER['HTTP_REFERER'], "refresh");

    }
  }


}
