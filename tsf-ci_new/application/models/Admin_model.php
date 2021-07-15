<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin_model extends CI_Model {

    //********************************************************************/
    //  GET STATES LIST
    //********************************************************************/

    public function get_states(){
      $_states_sql = "SELECT * FROM lk_state where is_active = 1 order by state asc";

      $_query = $this->db->query($_states_sql);
      return $_query->result_array();
    }

    //********************************************************************/
    //  GET CLASSES LIST
    //********************************************************************/

    public function get_classes_list(){
      $_class_sql = "SELECT id, class_name, class_value FROM lk_class where is_active = 1";

      $_query = $this->db->query($_class_sql);
      return $_query->result_array();
    }

    //********************************************************************/
    //  GET COORDINATOR LIST
    //********************************************************************/

    public function get_coordinators(){
      $_coord_list = "select * from coordinator_registration where is_active = 1";
      $_query = $this->db->query($_coord_list);
      return $_query->result_array();
    }

    //********************************************************************/
    //  GET EXAM TYPE LIST
    //********************************************************************/

    public function get_examtype(){
      $_coord_list = "select * from lk_exam_type where is_active = 1";
      $_query = $this->db->query($_coord_list);
      return $_query->result_array();
    }

    //********************************************************************/
    // UPDATE SCHOOL STATUS
    //********************************************************************/

    public function update_school_status($_school_id, $_status = 0){
      $_sql = "UPDATE school_master SET is_active = $_status WHERE id = $_school_id";
      if($this->db->query($_sql)) return true;
      else return false;
    }

    //********************************************************************/
    // GET SCHOOL LIST
    //********************************************************************/

    public function get_school_list($reg_id = "", $school_name = "", $principal_name = "", $mobile = "", $phone_no = "", $address = "", $city = "", $state = "", $pincode = "", $email_id = ""){
      $school_sql = "SELECT sm.id as school_id, sm.school_reg_id as reg_id, sm.name as name, sm.address as address, sm.city as city,
          ls.state as state, sm.pincode as pin, sm.phone_no as phone, sm.email_id as sm_email, sm.registered_on as reg_on,
          sm.principal_name as pr_name, sm.principal_mob_no as pr_mob, sm.is_active
          from school_master as sm
          left join lk_state as ls on ls.id = sm.fk_state_id
          where 1 = 1";

      if($reg_id){ $school_sql .= " and sm.school_reg_id like '%" . $reg_id . "%'";}
      if($school_name){ $school_sql .= " and sm.name like '%" . $school_name . "%'";}
      if($principal_name){ $school_sql .= " and sm.principal_name like '%" . $principal_name . "%'";}
      if($mobile){ $school_sql .= " and sm.principal_mob_no like '%" . $mobile . "%'";}
      if($phone_no){ $school_sql .= " and sm.phone_no like '%" . $phone_no . "%'";}
      if($address){ $school_sql .= " and sm.address like '%" . $address . "%'";}
      if($city){ $school_sql .= " and sm.city like '%" . $city . "%'";}
      if($state){ $school_sql .= " and ls.state like '%" . $state . "%'";}
      if($pincode){ $school_sql .= " and sm.pincode like '%" . $pincode . "%'";}
      if($email_id){ $school_sql .= " and sm.email_id like '%" . $email_id . "%'";}

      $school_sql .= " order by sm.id desc";

      $_query = $this->db->query($school_sql);
      return $_query->result_array();
    }

    //********************************************************************/
    // GET SCHOOL DATA - ID
    //********************************************************************/

    public function get_school_data($_id){
      $_sql = "SELECT sm.id as school_id, sm.school_reg_id as reg_id, sm.name as name, sm.address as address, sm.city as city,
          sm.fk_state_id as state, sm.pincode as pin, sm.phone_no as phone, sm.email_id as sm_email, sm.registered_on as reg_on,
          sm.principal_name as pr_name, sm.principal_mob_no as pr_mob
          from school_master as sm
          where sm.id = ".$_id;

      $_res = $this->db->query($_sql);
      return $_res->row();
    }

    //********************************************************************/
    // GET STUDENT DATA - ID
    //********************************************************************/

    public function get_student_data($_id){
      $_sql = "SELECT * from student_registration where id = ".$_id;
      $_res = $this->db->query($_sql);
      return $_res->row();
    }


    //********************************************************************/
    // GET STUDENT LIST
    //********************************************************************/

    public function get_student_list($reg_id = "", $school_name = "", $class = "", $gender = "", $student_name = "", $coordinator = "", $f_name = "", $phone_no = "", $email = "", $address = "", $city = "", $state = "", $pincode = ""){
      $student_sql = "select sr.id as stud_id, sr.is_active, sr.registration_id as reg_id, sr.student_name as student_name, sr.father_name as fname,
          sr.address as address, sr.city as city, ls.state as state, sr.pincode as pincode, sr.dob as dob, sr.gender as gender,
          sr.stud_email as email, sr.school_name as school_name, sr.parents_contact_no as phone_no, sr.image_path as image_path,
          sr.registered_on as reg_on, lc.class_name as class, le.exam_type as exam_type, cr.name as coordinator
          from student_registration as sr
          left join lk_class as lc on lc.id = sr.fk_class_id
          left join lk_state as ls on ls.id = sr.fk_state
          left join lk_exam_type as le on le.id = sr.fk_exam_type
          left join coordinator_registration as cr on cr.id = sr.fk_coordinator_id
          where 1 = 1 ";

      if($reg_id!=""){ $student_sql .= " and sr.registration_id like '%" . $reg_id . "%'";}
      if($school_name!=""){ $student_sql .= " and sr.school_name like '%" . $school_name . "%'";}
      if($class!=""){ $student_sql .= " and lc.class_value = $class";}
      if($gender!=""){ $student_sql .= " and sr.gender = $gender";}
      if($student_name!=""){ $student_sql .= " and sr.student_name like '%" . $student_name . "%'";}
      if($coordinator!=""){ $student_sql .= " and cr.name like '%" . $coordinator . "%'";}
      if($f_name!=""){ $student_sql .= " and sr.father_name like '%" . $f_name . "%'";}
      if($phone_no!=""){ $student_sql .= " and sr.parents_contact_no like '%" . $phone_no . "%'";}
      if($email!=""){ $student_sql .= " and sr.stud_email like '%" . $email . "%'";}
      if($address!=""){ $student_sql .= " and sr.address like '%" . $address . "%'";}
      if($city!=""){ $student_sql .= " and sr.city like '%" . $city . "%'";}
      if($state!=""){ $student_sql .= " and sr.state like '%" . $state . "%'";}
      if($pincode!=""){ $student_sql .= " and sr.pincode like '%" . $pincode . "%'";}

      $student_sql .= " order by sr.id desc";

      //print $student_sql;

      $result = $this->db->query($student_sql);
      return $result->result_array();
    }


    //********************************************************************/
    // UPDATE STUDENT STATUS
    //********************************************************************/

    public function update_student_registration($_student_id, $_status = 0){
      $_sql = "UPDATE student_registration SET is_active = $_status WHERE id = $_student_id";
      if($this->db->query($_sql)) return true;
      else return false;
    }

    //********************************************************************/
    // DELETE STUDENT
    //********************************************************************/

    public function delete_student_record($_student_id){
      $_sql = "delete from student_registration where id = ".$_student_id;
      $_sql2 = "delete from student_fee_payment where fk_student_id = ".$_student_id;

      if($this->db->query($_sql)){
        if($this->db->query($_sql2)) return true;
        else return false;
      }else return false;
    }


    //********************************************************************/
    // UPDATE STUDENT FEE PAYMENT STATUS
    //********************************************************************/

    public function update_student_payment_status($_student_id, $_status = 0){
      $_sql = "UPDATE student_fee_payment SET is_active = $_status WHERE fk_student_id = $_student_id";
      if($this->db->query($_sql)) return true;
      else return false;
    }


    //********************************************************************/
    // GET COORDINATOR LIST
    //********************************************************************/

    public function coordinator_list($reg_id = "", $name = "", $mobile = "", $email = "", $age = "", $gender = "", $qualification = "", $profession = "", $address = "", $district = "", $state = "", $pincode = ""){
      $coordinator_sql = "SELECT cr.id as coord_id, cr.is_active, cr.registration_id as reg_id, cr.name as name, cr.email_id as email,
          cr.mobile_no as mob_no, cr.address as address, cr.city as city, ls.state as state, cr.pincode as pin, cr.dob as dob,
          cr.gender as gender, cr.qualification as qualification, cr.registered_on as reg_on, cr.profession as profession,
          cr.image_path as image_path
          from coordinator_registration as cr
          left join lk_state as ls on ls.id = cr.fk_state
          where 1 = 1";

      if($reg_id!="") $coordinator_sql .= " and cr.registration_id = '".$reg_id."'";
      if($name!="") $coordinator_sql .= " and cr.name like '".$name."%'";
      if($mobile!="") $coordinator_sql .= " and cr.mobile_no like '".$mobile."%'";
      if($email!="") $coordinator_sql .= " and cr.email_id like '".$email."'%";
      if($age!="") $coordinator_sql .= " and cr.age = '".$age."'";
      if($gender!="") $coordinator_sql .= " and cr.gender = '".$gender."'";
      if($qualification!="") $coordinator_sql .= " and cr.qualification like '".$qualification."%'";
      if($profession!="") $coordinator_sql .= " and cr.profession like '".$profession."%'";
      if($address!="") $coordinator_sql .= " and cr.address like '".$address."%'";
      if($district!="") $coordinator_sql .= " and cr.district like '".$district."%'";
      if($state!="") $coordinator_sql .= " and ls.state like '".$state."%'";
      if($pincode!="") $coordinator_sql .= " and cr.pincode like '".$pipncode."%'";

      $coordinator_sql .= " order by cr.id desc";

      $result = $this->db->query($coordinator_sql);
      return $result->result_array();
    }


    //********************************************************************/
    // UPDATE COORDINATOR STATUS
    //********************************************************************/

    public function update_coordinator_status($_coord_id, $_status = 0){
      $_sql = "update coordinator_registration set is_active = $_status where id = $_coord_id";
      if($this->db->query($_sql)) return true;
      else false;
    }

    //********************************************************************/
    // GET COORDINATOR DATA
    //********************************************************************/

    public function get_coordinator_data($_coord_id){
      $_sql = "select * from coordinator_registration where id = $_coord_id";
      $_res = $this->db->query($_sql);
      return $_res->row();
    }

    //********************************************************************/
    // DELETE COORDINATOR
    //********************************************************************/

    public function delete_coordinator($_coord_id){
      $_sql = "delete from coordinator_registration where id = $_coord_id";
      if($this->db->query($_sql)) return true;
      else false;
    }


    //********************************************************************/
    // GET NOTIFICATIONS
    //********************************************************************/

    public function get_notifications(){
      $notification_sql = "SELECT * from notification order by updated_on desc";
      $_res = $this->db->query($notification_sql);
      return $_res->result_array();
    }

    //********************************************************************/
    // DELETE NOTIFICATION
    //********************************************************************/

    public function delete_notifications($id){
      $notification_sql = "delete from notification where id = ".$id;
      $_res = $this->db->query($notification_sql);
      if($_res) return true;
      else return false;
    }

    //********************************************************************/
    // CHECK IF PRIMARY KEY EXISTS
    //********************************************************************/

    public function id_exists($_id, $_table_name){
      $_sql = "select id as counter from $_table_name where id = $_id";
      $_res = $this->db->query($_sql);

      if($_res->num_rows() > 0) return true;
      else return false;
    }


    //********************************************************************/
    // GET PAYMENT HISTORY
    //********************************************************************/

    public function get_payment_history($_stud_id){
      $_sql = "select * FROM student_fee_payment where fk_student_id = ".$_stud_id." order by created_on desc";

      $_query = $this->db->query($_sql);
      return $_query->result_array();
    }


    //********************************************************************/
    // DELETE PAYMENT
    //********************************************************************/

    public function delete_payment($_id){
      $_sql = "delete from student_fee_payment where id = $_id";
      $_res = $this->db->query($_sql);
    }


}
