<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MY_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->helper("url");
		$this->load->helper('security');
	}
	public function login(){
		$this->form_validation->set_rules('identity','Username','trim|xss_clean|required|min_length[4]');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|required|min_length[4]|max_length[50]');		
		$username = $this->input->post('identity', TRUE);
		$password = $this->input->post('password', TRUE);
		$db_pass = $this->User_model->admin_pass($username);
		$user_id = $this->User_model->adminlogin($username, $db_pass);
		//Validate user
		if ($this->form_validation->run() == FALSE){
			//Show View
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			$data['main_content'] = 'admin/auth/login';
			$this->load->view('admin/auth/login', $data);
		}
		else{
			if(password_verify($password, $db_pass)){
				if($user_id){
					echo $this->User_model->adminrole($username);

					//get admin user role
					$role = $this->User_model->adminrole($username);
					//Create array of user data
					$data = array(
						'admin_id'   		=> $user_id,
						'admin_username'  	=> $username,
						'admin_logged_in' 	=> true,
						'role'				=> $role,
						'adminemail'		=> $this->User_model->get_admin_detail($user_id)->admin_email,
						'adminusername'		=> $this->User_model->get_admin_detail($user_id)->admin_username,
						'firstname'			=> $this->User_model->get_admin_detail($user_id)->first_name,
						'lastname'			=> $this->User_model->get_admin_detail($user_id)->last_name
					);
					//Set session userdata
					$this->session->set_userdata($data);                   
					//Set message
					$this->session->set_flashdata('admin_login', 'You are logged in');
					// Redirect to current Page
					redirect('admin/dashboard/index');
				}
				else {
					if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) {
						redirect('admin/dashboard/index');
					}else{                
						$this->session->set_flashdata('errors','Sonething went wrong');
						$data['main_content'] = 'admin/auth/login';
						$this->load->view('admin/auth/login', $data);
					}
				}
			}
			else{
				$this->session->set_flashdata('errors','Wrong Username / Password!');
				$data['main_content'] = 'admin/auth/login';
				$this->load->view('admin/auth/login', $data);
			}
		}	
	}
	public function logout(){
		//Unset user data
		$this->session->unset_userdata('admin_logged_in');
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_username');
		$this->session->sess_destroy();
		redirect('/');
	}

}






