<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Carousel_model');
        $this->load->model('Gallery_model');
	}
    public function index(){
        $data['list'] = $this->Gallery_model->gallery_list();
        $this->load->view('admin/gallery',$data);
    }
    public function add_gallery(){
        $target_dir = $_SERVER['DOCUMENT_ROOT']."/tsf-ci/static/img/gallery/";
        $target_file = $target_dir . basename($_FILES["gallery_image"]["name"]);
        $target_path = "img/gallery/" . basename($_FILES["gallery_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["gallery_image"]["tmp_name"]);
        $status="";
        if ($check === false) {
            $msg = "<p>Please upload image file.</p>";
            $status = "error";
        } else {
            if(move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $target_file)) {
                date_default_timezone_set('Asia/Calcutta');
                $this->Gallery_model->gallery_add($target_path);
                echo "success";
            } else {
                $msg = "<p>Error in uploading file.</p>";
                $status = "error";
            }
        }

        echo $status;
    }
    public function delete_gallery(){
            $gallery_id = $this->input->get('id');
            $status = $this->Gallery_model->delete_gallery($gallery_id);
            echo $status;
    }
	 public function carousel_list(){
	 	$data['list'] = $this->Carousel_model->carousal_listing();
	 	$this->load->view('admin/carousel',$data);
	 }
	 public function add_carousel(){
	 	 				// Insert new image in db
                        $status="Success";
                        $target_dir = $_SERVER['DOCUMENT_ROOT']."/tsf-ci/static/img/slider-img/";
                         $target_file = $target_dir . basename($_FILES["carousel_image"]["name"]);
                         $target_path = "img/slider-img/" . basename($_FILES["carousel_image"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $check = getimagesize($_FILES["carousel_image"]["tmp_name"]);
                        $_FILES["carousel_image"]["size"];
                       if ($check === false) {
                            $msg = "<p>Please upload image file.</p>";
                            $status = "error";
                        } else {
                            if(move_uploaded_file($_FILES["carousel_image"]["tmp_name"], $target_file)) {
                                date_default_timezone_set('Asia/Calcutta');
                                $data = array(  
                        'image_path'     => $target_path,  
                        'uploaded_on'  => date('Y-m-d H:i:s')
                        );      
                                $this->db->insert('carousel_image',$data);
                                $status="Success";
                            } else {
                                $msg = "<p>Error in uploading file.</p>";
                                $status = "error";
                            }
                        }

                        echo $status;
	 }

     public function delete_carousel(){
             $carousel_id = $this->input->get('id');
            $status = $this->Carousel_model->delete_carousel_id($carousel_id);
            echo $status;
     }

}
