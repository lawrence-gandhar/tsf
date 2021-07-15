<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Carousel_model extends CI_Model {
	public function  carousal_listing(){
		$cimg_sql = "SELECT cimg.image_path as image_path, cimg.pk_id as pk_id from carousel_image as 				cimg where cimg.is_active=1;";
		$_query = $this->db->query($cimg_sql);
		$result=$_query->result_array();
		if($result) {
		$carousel_image_list = array();
		foreach($result as $k=>$row){
		    $arr = array("image_path"=>$row["image_path"], "pk_id"=>$row["pk_id"]);
		    array_push($carousel_image_list, $arr);
		}
		$response_array['carousel_image_list'] = $carousel_image_list;

		} 
		return $response_array['carousel_image_list'];
    }
    public function delete_carousel_id($carousel_id){
    	$status = "";
    	if (empty($carousel_id)) {
                $msg = "<p>Carousel image id is invalid.</p>";
                $status = "error";
            } else {
                date_default_timezone_set('Asia/Calcutta');
                $cimg_sql = "UPDATE carousel_image SET is_active=0 WHERE pk_id=$carousel_id;";
               $this->db->query($cimg_sql);
                $status = "Success";
            }
            return $status;
    }			
}
?>