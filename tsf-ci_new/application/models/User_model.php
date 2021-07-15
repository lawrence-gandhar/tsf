<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function login($username = "", $passwd = ""){
        $login_sql = "select password, fk_access_id from login where login_id = '$username' and is_active=1";

        $_res = $this->db->query($login_sql);    
        $_row = $_res->result_array();
        
        $_arr = array();

        foreach($_row as $_rr){
            $_arr["password"] = $_rr["password"];
            $_arr["fk_access_id"] = $_rr["fk_access_id"];
        }

        return $_arr;

    }


}