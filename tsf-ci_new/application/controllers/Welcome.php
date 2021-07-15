<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	//
	// INDEX
	//

	public function index(){
		$this->load->view('main_site/index');
	}

	//
	// LOGIN
	//

	public function login(){
		$this->load->view('main_site/login');
	}
	

	//
	// LOGOUT
	//

	public function logout(){
		$this->output->set_header("Expires: Thu, 19 Nov 1981 08:52:00 GMT"); //Date in the past
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
				
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('login_id');
		$this->session->unset_userdata('fk_access_id');

		$this->session->sess_destroy();
	}


	//
	// POST LOGIN
	//

	public function post_login(){
		$_username = clean_input($this->input->post('login_id'));
		$_password = clean_input($this->input->post('password'));

		$_res = $this->User_model->login($_username, $_password);

		$response_array = array();

		if(count($_res)>0){
			if($_res["password"] == $_password){

				$status = "success";
				$msg = "OK";

				$this->session->set_userdata('logged_in', 1);
				$this->session->set_userdata('login_id', $_username);
				$this->session->set_userdata('fk_access_id', $_res["fk_access_id"]);

				if ($_res["fk_access_id"] == 1) {
					$response_array['response_url'] = base_url()."admin/";
				}
				elseif ($_res["fk_access_id"] == 2) {
					$response_array['response_url'] = base_url()."Student/";
				}
				 else {
					$response_array['response_url'] = base_url()."login/";
				}
			}else{
				$status = "error";
                $msg = "Invalid password.";
			}
		}else{
			$status = "error";
            $msg = "Invalid login id.";
		}

		$response_array['status'] = $status;
		$response_array['msg'] = $msg;
		
		echo json_encode($response_array);
	}

}
