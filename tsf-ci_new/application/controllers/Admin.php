<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    //********************************************************************/
    // INDEX
    //********************************************************************/

    public function index(){
        if(check_logged_on()){

          $data["class_list"] = $this->Admin_model->get_classes_list();
          $data["states"] = $this->Admin_model->get_states();
          $data["coord_list"] = $this->Admin_model->get_coordinators();
          $data["examtype_list"] = $this->Admin_model->get_examtype();

          $this->load->view('admin/index', $data);
        }
    }


    //********************************************************************/
    // GET SCHOOL LIST
    //********************************************************************/

    public function get_school_list(){

        if(check_logged_on()){
            $reg_id = clean_input($this->input->get("reg_id"));
            $school_name = clean_input($this->input->get("school_name"));
            $principal_name = clean_input($this->input->get("principal_name"));
            $mobile = clean_input($this->input->get("mobile"));
            $phone_no = clean_input($this->input->get("phone"));
            $address = clean_input($this->input->get("address"));
            $city = clean_input($this->input->get("city"));
            $state = clean_input($this->input->get("state"));
            $pincode = clean_input($this->input->get("pincode"));
            $email_id = clean_input($this->input->get("email_id"));

            $_school_list = $this->Admin_model->get_school_list($reg_id, $school_name, $principal_name, $mobile, $phone_no, $address, $city, $state, $pincode, $email_id);

            $response_array['school_list'] = $_school_list;
            $response_array['status'] = "success";
            $response_array['msg'] = "OK";
            echo json_encode($response_array);
        }
    }

    //********************************************************************/
    // GET SCHOOL DATA
    //********************************************************************/

    public function get_school_data(){

        if(check_logged_on()){
          $_school_list = $this->Admin_model->get_school_data($this->input->post('school_id'));
          echo json_encode($_school_list);
        }
    }

    //********************************************************************/
    // ADD SCHOOL DATA
    //********************************************************************/

    public function add_school(){

      if(check_logged_on()){

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
          redirect(base_url()."admin", "refresh");
        }
      }
    }

    //********************************************************************/
    // EDIT SCHOOL
    //********************************************************************/

    public function edit_school(){

        if(check_logged_on()){
          $school_id = $this->input->post('school_id');

          $data = array(
            "name" => clean_input($this->input->post("school_name")),
            "address" => clean_input($this->input->post("address")),
            "city" => clean_input($this->input->post("city")),
            "fk_state_id" => $this->input->post("state"),
            "pincode" => clean_input($this->input->post("pincode")),
            "phone_no" => clean_input($this->input->post("phone_number")),
            "email_id" => clean_input($this->input->post("email")),
            "principal_name" => clean_input($this->input->post("principal_name")),
            "principal_mob_no" => clean_input($this->input->post("mobile_number")),
            "is_active" => $this->input->post("is_active")
          );

          $this->db->where('id', $school_id);
          $this->db->update('school_master', $data);
          redirect(base_url()."admin", "refresh");
        }
    }


    //********************************************************************/
    // DELETE SCHOOL
    //********************************************************************/

    public function delete_school(){

        if(check_logged_on()){
            $_school_id = clean_input($this->input->post("school_id"));

            if(empty($_school_id)) {
                $response_array['status'] = "error";
                $response_array['msg'] = "School id is invalid.";
                echo json_encode($response_array);
            }else{
                $_res = $this->Admin_model->update_school_status($_school_id, 0);

                if($_res){
                  $response_array['status'] = "success";
                  $response_array['msg'] = "OK";
                  echo json_encode($response_array);
                }else{
                    $response_array['status'] = "error";
                    $response_array['msg'] = "Error: Operation Failed";
                    echo json_encode($response_array);
                }
            }
        }
    }

    //********************************************************************/
    // DELETE SCHOOL
    //********************************************************************/

    public function activate_school(){

        if(check_logged_on()){
            $_school_id = clean_input($this->input->post("school_id"));

            if(empty($_school_id)) {
                $response_array['status'] = "error";
                $response_array['msg'] = "School id is invalid.";
                echo json_encode($response_array);
            }else{
                $_res = $this->Admin_model->update_school_status($_school_id, 1);

                if($_res){
                  $response_array['status'] = "success";
                  $response_array['msg'] = "OK";
                  echo json_encode($response_array);
                }else{
                    $response_array['status'] = "error";
                    $response_array['msg'] = "Error: Operation Failed";
                    echo json_encode($response_array);
                }
            }
        }
    }


    //********************************************************************/
    // MAIN STUDENT INDEX
    //********************************************************************/

    public function student_index(){
        if(check_logged_on()){
            $data["class_list"] = $this->Admin_model->get_classes_list();
            $data["states"] = $this->Admin_model->get_states();
            $data["coord_list"] = $this->Admin_model->get_coordinators();
            $data["examtype_list"] = $this->Admin_model->get_examtype();

            $this->load->view("admin/students", $data);
        }
    }


    //********************************************************************/
    // GET STUDENT LIST
    //********************************************************************/

    public function student_list(){

        if(check_logged_on()){

            $reg_id = clean_input($this->input->get("reg_id"));
            $student_name = clean_input($this->input->get("student_name"));
            $school_name = clean_input($this->input->get("school_name"));
            $coordinator = clean_input($this->input->get("coordinator"));
            $class = clean_input($this->input->get("class"));
            $gender = clean_input($this->input->get("gender"));
            $f_name = clean_input($this->input->get("f_name"));
            $phone_no = clean_input($this->input->get("phone_no"));
            $email = clean_input($this->input->get("email"));
            $address = clean_input($this->input->get("address"));
            $city = clean_input($this->input->get("city"));
            $state = clean_input($this->input->get("state"));
            $pincode = clean_input($this->input->get("pincode"));

            $_result = $this->Admin_model->get_student_list($reg_id, $school_name, $class, $gender, $student_name, $coordinator, $f_name, $phone_no, $email, $address, $city, $state, $pincode);

            //
            //

            $_student_list = array();

            foreach($_result as $row){
                $coordinator_name = "";

                $reg_on = date("d-m-Y H:i", strtotime($row["reg_on"]));
                $dob = date("d-m-Y", strtotime($row["dob"]));

                if ($row["coordinator"]){ $coordinator_name = $row["coordinator"]; }

                $_arr = array(
                    "student_id" => $row["stud_id"],
                    "is_active" => $row["is_active"],
                    "reg_id" => $row["reg_id"],
                    "student_name" => $row["student_name"],
                    "address" => $row["address"],
                    "city" => $row["city"],
                    "state" => $row["state"],
                    "pincode" => $row["pincode"],
                    "fname" => $row["fname"],
                    "phone_no" => $row["phone_no"],
                    "email" => $row["email"],
                    "dob" => $dob,
                    "gender" => $row["gender"],
                    "reg_on" => $reg_on,
                    "class" => $row["class"],
                    "school_name" => $row["school_name"],
                    "exam_type" => $row["exam_type"],
                    "image_path" => $row["image_path"],
                    "coordinator" => $coordinator_name
                );
                array_push($_student_list, $_arr);
            }

            $response_array['student_list'] = $_student_list;
            $response_array['status'] = 'success';
            $response_array['msg'] = 'OK';

            echo json_encode($response_array);
        }
    }


    //********************************************************************/
    // ADD STUDENT RECORD
    //********************************************************************/

    public function add_student(){

      if(check_logged_on() && $this->input->post()){
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
        redirect(base_url()."admin/student", "refresh");
      }
    }


    //********************************************************************/
    // ACTIVATE STUDENT RECORD
    //********************************************************************/

    public function activate_student(){
        if(check_logged_on()){
            $_student_id = clean_input($this->input->post("student_id"));

            if(empty($_student_id)) {
                $response_array['status'] = "<p>Student id is invalid.</p>";
                $response_array['msg'] = "error";
                echo json_encode($response_array);
            }else{

                $_res = $this->Admin_model->update_student_registration($_student_id, 1);

                if($_res){
                  $response_array['status'] = "success";
                  $response_array['msg'] = "OK";
                  echo json_encode($response_array);
                }else{
                  $response_array['status'] = "error";
                  $response_array['msg'] = "Error: Operation Failed";
                  echo json_encode($response_array);
                }
            }
        }
    }


    //********************************************************************/
    // DEACTIVATE STUDENT RECORD
    //********************************************************************/

    public function deactivate_student(){
        if(check_logged_on()){
            $_student_id = clean_input($this->input->post("student_id"));

            if(empty($_student_id)) {
                $response_array['status'] = "<p>Student id is invalid.</p>";
                $response_array['msg'] = "error";
                echo json_encode($response_array);
            }else{
                $_res = $this->Admin_model->update_student_registration($_student_id, 0);

                if($_res){
                  $response_array['status'] = "success";
                  $response_array['msg'] = "OK";
                  echo json_encode($response_array);
                }else{
                  $response_array['status'] = "error";
                  $response_array['msg'] = "Error: Operation Failed";
                  echo json_encode($response_array);
                }
            }
        }
    }


    //********************************************************************/
    // GET STUDENT DATA
    //********************************************************************/

    public function get_student_data(){

        if(check_logged_on()){
          $_student_list = $this->Admin_model->get_student_data($this->input->post('student_id'));
          echo json_encode($_student_list);
        }
    }


    //********************************************************************/
    // EDIT STUDENT DETAILS
    //********************************************************************/

    public function edit_student(){

      if(check_logged_on() && $this->input->post()){
        $dob_date = $this->input->post("dob_date");
        $dob_month = $this->input->post("dob_month");

        if($dob_date<=9) $dob_date = "0".$dob_date;
        if($dob_month<=9) $dob_month = "0".$dob_month;

        $_student_id = $this->input->post("student_id");
        $_dob_date = $this->input->post("dob_date");
        $_dob_month = $this->input->post("dob_month");
        $_dob_year = $this->input->post("dob_year");

        $data = array(
          "student_name" => clean_input($this->input->post("student_name")),
          "school_name" => clean_input($this->input->post("school_name")),
          "fk_coordinator_id" => $this->input->post("coordinator_id"),
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

        /******************************************************************/

        if(!empty($_FILES['photo']['name'])){

          $_upload_path = 'uploads/students/';
          if(!is_dir($_upload_path)){
            if(!is_dir($_upload_path.$_student_id)) @mkdir($_upload_path.$_student_id, 0777);
          }else{
            @mkdir($_upload_path, 0777);
            @mkdir($_upload_path.$_student_id, 0777);
          }

          // Set preference
          $upload_path = 'uploads/students/'.$_student_id."/";

          $config['upload_path'] = $upload_path;
          $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
          $config['max_size'] = '50000'; // max_size in kb

          //Load upload library
          $this->load->library('upload',$config);
          $this->upload->initialize($config);

          if($this->upload->do_upload('photo')){
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];

            $data["image_path"] = $upload_path.$filename;
          }
        }
        /******************************************************************/

        $this->db->where('id', $_student_id);
        $this->db->update('student_registration', $data);

        redirect(base_url()."admin/student", "refresh");
      }
    }


    //********************************************************************/
    // DELETE STUDENT RECORD
    //********************************************************************/

    public function delete_student_record(){
      if(check_logged_on()){
        $_student_id = $this->input->post("student_id");

        $_res = $this->Admin_model->delete_student_record($_student_id);

        if($_res){

          $dir_path = 'uploads/students/'.$_student_id."/";

          if(is_dir($dir_path)){
            $this->load->helper("file");
            delete_files($dir_path, TRUE);
            @rmdir($dir_path);
          }

          $response_array['status'] = "success";
          $response_array['msg'] = "OK";
          echo json_encode($response_array);
        }else{
          $response_array['status'] = "error";
          $response_array['msg'] = "Error: Operation Failed";
          echo json_encode($response_array);
        }
      }
    }


    //********************************************************************/
    // GET FEES PAYMENT HISTORY
    //********************************************************************/

    public function get_payment_history(){
      if(check_logged_on() && $this->input->post()){
        $_stud_id = $this->input->post('stud_id');

        $_res = $this->Admin_model->get_payment_history($_stud_id);

        if($_res){
          $response_array['status'] = "success";
          $response_array['msg'] = "OK";
          $response_array['result'] = $_res;
          echo json_encode($response_array);
        }else{
          $response_array['status'] = "error";
          $response_array['msg'] = "Error: Operation Failed";
          echo json_encode($response_array);
        }
      }
    }


    //********************************************************************/
    // ADD FEES PAYMENT
    //********************************************************************/

    public function add_payment(){
      if(check_logged_on() && $this->input->post()){

        $payment_status = $this->input->post('payment_status');

        $data = array(
          "fk_student_id" => $this->input->post("stud_id"),
          "fee" => (float)$this->input->post('fees'),
          "payment_medium" => $this->input->post('payment_type'),
          "is_paid" => $payment_status,
        );

        if($payment_status == '1'){
          $data["transaction_id"] = rand(10000000000000,999999999999999);
          $data["paid_on"] = date('Y-m-d H:i:s');
        }

        $this->db->insert("student_fee_payment", $data);

      }
    }


    //********************************************************************/
    // EDIT FEES PAYMENT
    //********************************************************************/

    public function edit_payment(){
      if(check_logged_on() && $this->input->post()){

        $payment_status = $this->input->post('payment_status');

        $data = array(
          "fee" => (float)$this->input->post('fees'),
          "payment_medium" => $this->input->post('payment_type'),
          "is_paid" => $payment_status,
        );

        if($payment_status == '1'){
          $data["transaction_id"] = rand(10000000000000,999999999999999);
          $data["paid_on"] = date('Y-m-d H:i:s');
        }else{
          $data["transaction_id"] = '';
          $data["paid_on"] = '';
        }

        $this->db->where('id', $this->input->post('sid'));
        $this->db->update("student_fee_payment", $data);
      }
    }

    //********************************************************************/
    // DELETE FEES PAYMENT
    //********************************************************************/

    public function delete_payment(){
      if(check_logged_on() && $this->input->post()){
        $this->Admin_model->delete_payment($this->input->post('sid'));
      }
    }


    //********************************************************************/
    // COORDINATOR INDEX
    //********************************************************************/

    public function coordinator_index(){
        if(check_logged_on()){

          $data["class_list"] = $this->Admin_model->get_classes_list();
          $data["states"] = $this->Admin_model->get_states();
          $data["coord_list"] = $this->Admin_model->get_coordinators();
          $data["examtype_list"] = $this->Admin_model->get_examtype();

          $this->load->view("admin/coordinator", $data);
        }
    }


    //********************************************************************/
    // GET COORDINATOR LIST
    //********************************************************************/

    public function coordinator_list(){
      if(check_logged_on()){
        $reg_id = clean_input($this->input->get('reg_id'));
        $name = clean_input($this->input->get('coord_name'));
        $mobile = clean_input($this->input->get('coord_mobile'));
        $email = clean_input($this->input->get('coord_email'));
        $age = clean_input($this->input->get('coord_age'));
        $gender = clean_input($this->input->get('coord_gender'));
        $qualification = clean_input($this->input->get('coord_qual'));
        $profession = clean_input($this->input->get('coord_prof'));
        $address = clean_input($this->input->get('coord_addr'));
        $district = clean_input($this->input->get('coord_district'));
        $state = clean_input($this->input->get('coord_state'));
        $pincode = clean_input($this->input->get('coord_pin'));

        $_res = $this->Admin_model->coordinator_list($reg_id, $name, $mobile, $email, $age, $gender, $qualification, $profession, $address, $district, $state, $pincode);

        $response_array['coordinator_list'] = $_res;
        $response_array['status'] = "success";
        $response_array['msg'] = "OK";
        echo json_encode($response_array);
      }
    }

    //********************************************************************/
    // GET COORDINATOR DATA
    //********************************************************************/

    public function get_coordinator_data(){
      if(check_logged_on() && $this->input->post()){
        $_coord_list = $this->Admin_model->get_coordinator_data($this->input->post('coord_id'));
        echo json_encode($_coord_list);
      }
    }

    //********************************************************************/
    // ADD COORDINATOR
    //********************************************************************/

    public function add_coordinator(){
      if(check_logged_on() && $this->input->post()){
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

        redirect(base_url()."admin/coordinator", "refresh");

      }
    }

    //********************************************************************/
    // EDIT COORDINATOR
    //********************************************************************/

    public function edit_coordinator(){
      if(check_logged_on() && $this->input->post()){
        $_coord_id = $this->input->post("coord_id");
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

        /******************************************************************/

        if(!empty($_FILES['photo']['name'])){

          $_upload_path = 'uploads/coordinator/';
          if(!is_dir($_upload_path)){
            if(!is_dir($_upload_path.$_coord_id)) @mkdir($_upload_path.$_coord_id, 0777);
          }else{
            @mkdir($_upload_path, 0777);
            @mkdir($_upload_path.$_coord_id, 0777);
          }

          // Set preference
          $upload_path = 'uploads/coordinator/'.$_coord_id."/";

          $config['upload_path'] = $upload_path;
          $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
          $config['max_size'] = '50000'; // max_size in kb

          //Load upload library
          $this->load->library('upload',$config);
          $this->upload->initialize($config);

          if($this->upload->do_upload('photo')){
            $uploadData = $this->upload->data();

            $filename = $uploadData['file_name'];

            $data["image_path"] = $upload_path.$filename;
          }else{
            print_r($this->upload->data());
          }
        }

        /******************************************************************/

        $this->db->where('id', $_coord_id);
        $this->db->update('coordinator_registration', $data);

        redirect(base_url()."admin/coordinator", "refresh");
      }
    }

    //********************************************************************/
    // ACTIVATE COORDINATOR
    //********************************************************************/

    public function activate_coordinator(){
        if(check_logged_on()){
            $_coord_id = clean_input($this->input->post("coord_id"));

            if(empty($_coord_id)) {
                $response_array['status'] = "error";
                $response_array['msg'] = "Coordinator ID is invalid";
                echo json_encode($response_array);
            }else{
                $_res = $this->Admin_model->update_coordinator_status($_coord_id, 1);

                if($_res){
                    $response_array['status'] = "success";
                    $response_array['msg'] = "OK";
                    echo json_encode($response_array);
                }else{
                    $response_array['status'] = "error";
                    $response_array['msg'] = "Error: Operation Failed";
                    echo json_encode($response_array);
                }
            }
        }
    }

    //********************************************************************/
    // DE-ACTIVATE COORDINATOR
    //********************************************************************/

    public function deactivate_coordinator(){
        if(check_logged_on()){
            $_coord_id = clean_input($this->input->post("coord_id"));

            if(empty($_coord_id)) {
                $response_array['status'] = "error";
                $response_array['msg'] = "Coordinator ID is invalid";
                echo json_encode($response_array);
            }else{
                $_res = $this->Admin_model->update_coordinator_status($_coord_id, 0);

                if($_res){
                    $response_array['status'] = "success";
                    $response_array['msg'] = "OK";
                    echo json_encode($response_array);
                }else{
                    $response_array['status'] = "error";
                    $response_array['msg'] = "Error: Operation Failed";
                    echo json_encode($response_array);
                }
            }
        }
    }


    //********************************************************************/
    // DELETE COORDINATOR
    //********************************************************************/

    public function delete_coordinator(){
        if(check_logged_on()){
            $_coord_id = clean_input($this->input->post("coord_id"));

            if(empty($_coord_id)) {
                $response_array['status'] = "error";
                $response_array['msg'] = "Coordinator ID is invalid";
                echo json_encode($response_array);
            }else{
                $_res = $this->Admin_model->delete_coordinator($_coord_id);

                if($_res){
                  $dir_path = 'uploads/coordinator/'.$_coord_id."/";

                  if(is_dir($dir_path)){
                    $this->load->helper("file");
                    delete_files($dir_path, TRUE);
                    @rmdir($dir_path);
                  }

                  $response_array['status'] = "success";
                  $response_array['msg'] = "OK";
                  echo json_encode($response_array);
                }else{
                  $response_array['status'] = "error";
                  $response_array['msg'] = "Error: Operation Failed";
                  echo json_encode($response_array);
                }
            }
        }
    }


    //********************************************************************/
    // NOTIFICATION INDEX
    //********************************************************************/

    public function notification_index(){
      if(check_logged_on()){

        $data["class_list"] = $this->Admin_model->get_classes_list();
        $data["states"] = $this->Admin_model->get_states();
        $data["coord_list"] = $this->Admin_model->get_coordinators();
        $data["examtype_list"] = $this->Admin_model->get_examtype();

        $notification_list = $this->Admin_model->get_notifications();
        $data['notification_list'] = $notification_list;

        $this->load->view('admin/notifications', $data);
      }
    }

    //********************************************************************/
    // UPDATE NOTIFICATION STATUS
    //********************************************************************/

    public function notification_status($id){
      if(check_logged_on()){

        if($this->uri->segment(3)=="activate") $status = 1;
        else $status = 0;

        $data = array(
          "is_active" => $status,
        );

        $this->db->where('id', $id);
        $this->db->update('notification', $data);

        redirect(base_url()."admin/notifications", "refresh");

      }
    }


    //********************************************************************/
    // DELETE NOTIFICATION
    //********************************************************************/

    public function delete_notification($id){
      if(check_logged_on()){
        $this->Admin_model->delete_notifications($id);
        redirect(base_url()."admin/notifications", "refresh");
      }
    }

    //********************************************************************/
    // ADD NOTIFICATION
    //********************************************************************/

    public function add_notification(){
        if(check_logged_on()){
          $_ntfy_details = clean_input($this->input->post("ntfy_details"));
          $_ntfy_link = clean_input($this->input->post("ntfy_link"));

          if (empty($ntfy_link)) $ntfy_link = "#";

          $data = array(
            "notification_text" => clean_input($_ntfy_details),
            "link" => $_ntfy_link,
            "updated_on" => date('Y-m-d H:i:s')
          );

          $this->db->insert("notification", $data);
          redirect(base_url()."admin/notifications", "refresh");
        }
    }

    //********************************************************************/
    // EDIT NOTIFICATION
    //********************************************************************/

    public function edit_notification(){
        if(check_logged_on()){

          $_ntfy_id = $this->input->post("id");
          $_ntfy_details = clean_input($this->input->post("ntfy_details"));
          $_ntfy_link = clean_input($this->input->post("ntfy_link"));

          if (empty($ntfy_link)) $ntfy_link = "#";

          $data = array(
            "notification_text" => clean_input($_ntfy_details),
            "link" => $_ntfy_link,
            "updated_on" => date('Y-m-d H:i:s')
          );

          $this->db->where('id', $_ntfy_id);
          $this->db->update("notification", $data);
          redirect(base_url()."admin/notifications", "refresh");
        }
    }



}
