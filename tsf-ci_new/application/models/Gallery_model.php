<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery_model extends CI_Model {
	public function gallery_list(){
		$gimg_sql = "SELECT gimg.image_path as image_path, gimg.pk_id as pk_id from gallery as gimg where gimg.is_active=1;";
		$query = $this->db->query($gimg_sql);
		$result=$query->result_array();
		return $result;
	}
	public function gallery_add($target_path){
		$gimg_sql = "INSERT INTO gallery (image_path, uploaded_on) VALUES ('$target_path', now());";
        $this->db->query($gimg_sql);
	}
	public function delete_gallery($id){
		 $gallery_id = $id;
        if (empty($gallery_id)) {
            $msg = "<p>gallery image id is invalid.</p>";
            $status = "error";
        } else {
            date_default_timezone_set('Asia/Calcutta');
            $gimg_sql = "UPDATE gallery SET is_active=0 WHERE pk_id=$gallery_id;";
            $result   = $this->db->query($gimg_sql);
        }
	}
}
?>