<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$CI = & get_instance();

//********************************************************************/
// CHECK IF USER IS LOGGED ON
//********************************************************************/

function check_logged_on(){

    global $CI;

    if(!$CI->session->userdata("logged_in")){
        redirect('/', 'refresh');
    }else{
        return true;
    }
}

//********************************************************************/
// CLEAN DATA
//********************************************************************/

function clean_input($data) {
    $data = trim($data);
    $data = addslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//********************************************************************/
//  EXAMINATION HAS QUESTIONS
//********************************************************************/

function exam_has_questions($_exam_id){

    global $CI;

    $_sql = "select count(*) as counter from questions where eid = $_exam_id";

    $_res = $CI->db->query($_sql);
    if($_res->row()->counter > 0) return True;
    else return false;
}
