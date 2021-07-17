<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_user_exam'))
{
    function check_user_exam($useremail = '',$question_id='')
    {
         $ci=& get_instance();
		 $ci->load->database(); 

		 $sql = "select count(email) as cnt from `history` where email='".$useremail."' and '".$question_id."'"; 
		 $query = $ci->db->query($sql);
		 $row = $query->result();
		 return $row[0]->cnt;
    }   
}
?>