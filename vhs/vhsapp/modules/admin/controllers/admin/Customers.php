<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customers extends MY_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->helper("url");
		$this->load->model("User_model");
		$this->load->library("pagination");
	}
	//check unique user id - mobile
	public function _is_unique2($input) {
		$exclude_id = $this->input->post('id');
		if( $this->db->where('username', $input)->where('id !=', $exclude_id)->limit(1)->get('users')->num_rows()) {
			$this->form_validation->set_message('_is_unique2', 'User is Already Registered');
			return FALSE;
		}
		return TRUE;
	}


	public function add(){
		//Validation Rules
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules(
			'email','Email Address',
			'trim|valid_email|required|is_unique[users.email]',
			array(
				'required'		=> '%s is required',
				'is_unique'	=> 'Your %s is already registered. Please login.'
			)
		);
		$this->form_validation->set_rules(
			'username','Phone Number',
			'required|trim|min_length[10]|max_length[10]|is_unique[users.username]',
			array(
				'required'      => '%s is required.',
				'is_unique'     => 'Your %s is already registered. Please login'
			)
		);
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('billing_address','Address1','trim');
		$this->form_validation->set_rules('billing_address2','Address Line 2','trim');
		$this->form_validation->set_rules('billing_city','Billing City','trim');
		$this->form_validation->set_rules('billing_zip','Billing Zip','trim');
		$this->form_validation->set_rules('billing_state','Billing State','trim');
		$this->form_validation->set_rules('billing_country','Billing Country','trim');
		$this->form_validation->set_rules('company','User Company','trim');
		$this->form_validation->set_rules('shipping_address1','Shipping Address1','trim');
		$this->form_validation->set_rules('shipping_address2','Shipping Address Line 2','trim');
		$this->form_validation->set_rules('shipping_city','Shipping City','trim');
		$this->form_validation->set_rules('shipping_zip','Shipping Zip','trim');
		$this->form_validation->set_rules('shipping_state','Shipping State','trim');
		$this->form_validation->set_rules('shipping_country','Shipping Country','trim');
		if ($this->form_validation->run() == FALSE){
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			//Show View
			$data['main_content'] = 'admin/customers/add_customer';
			$this->load->view('admin/layouts/main', $data);
		}
		else{
			$options = [
				'cost' => 8,
				'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			];
			$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
			$data =  array(
				'first_name'	=> $this->input->post('first_name'),
				'last_name'		=> $this->input->post('last_name'),
				'email'			=> $this->input->post('email'),
				'username'		=> $this->input->post('username'),
				'user_phone'	=> $this->input->post('username'),
				'password'		=> $password,
				'user_company'	=> $this->input->post('company'),
				'user_address1'	=> $this->input->post('billing_address1'),
				'user_address2'	=> $this->input->post('billing_address2'),
				'user_city'		=> $this->input->post('billing_city'),
				'user_state'	=> $this->input->post('billing_state'),
				'user_zip'		=> $this->input->post('billing_zip'),
				'user_country'		=> $this->input->post('billing_country'),
				'shipping_address1'	=> $this->input->post('shipping_address1'),
				'shipping_address2'	=> $this->input->post('shipping_address2'),
				'shipping_city'	=> $this->input->post('shipping_city'),
				'shipping_zip'	=> $this->input->post('shipping_zip'),
				'shipping_state'	=> $this->input->post('shipping_state'),
				'shipping_country'	=> $this->input->post('shipping_country'),
			);

			if($this->User_model->add_customer($data)){       
				$this->session->set_flashdata('customer_added', 'Customer Added');
				redirect('admin/customers/add');
			}
		}
	}

	public function view_all_customers() {
		if (!empty($this->input->post('limit'))) {
			$limit = $this->input->post('limit');
		}
		else{
			$limit = 10;
		}
		$config = array();
		$config["base_url"] = base_url() . "admin/customers/view_all_customers";
		$config["total_rows"] = $this->User_model->customer_count();
		$config["per_page"] = $limit;
		//        $config["uri_segment"] = 4;			
		$config['first_tag_open'] = '<li class="paginate_button active">';
		$config['first_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="paginate_button previous" id="example1_previous">';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['next_link'] = 'Next';
		$config['cur_tag_open'] = '<li class="paginate_button active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		//Get All Productcs
		$data['customers'] = $this->User_model->get_all_customers($config["per_page"], $page);

		$data["links"] = $this->pagination->create_links();
		//Load view
		$data['main_content'] = 'admin/customers/customers_list';
		$this->load->view('admin/layouts/main', $data);
	}

	public function profile($customer_id){
		if($customer_id){	
			//Validation Rules
			$this->form_validation->set_rules('first_name','First Name','trim|required');
			$this->form_validation->set_rules('last_name','Last Name','trim|required');
			$this->form_validation->set_rules(
				'email','Email Address',
				'trim|valid_email|required',
				array(
					'required'		=> '%s is required',
				)
			);
			$this->form_validation->set_rules(
				'username','Phone Number',
				'required|trim|min_length[10]|max_length[10]',
				array(
					'required'      => '%s is required.',
				)
			);
			$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');
			$this->form_validation->set_rules('billing_address','Address1','trim');
			$this->form_validation->set_rules('billing_address2','Address Line 2','trim');
			$this->form_validation->set_rules('billing_city','Billing City','trim');
			$this->form_validation->set_rules('billing_zip','Billing Zip','trim');
			$this->form_validation->set_rules('billing_state','Billing State','trim');
			$this->form_validation->set_rules('billing_country','Billing Country','trim');
			$this->form_validation->set_rules('company','User Company','trim');

			$this->form_validation->set_rules('shipping_address1','Shipping Address1','trim');
			$this->form_validation->set_rules('shipping_address2','Shipping Address Line 2','trim');
			$this->form_validation->set_rules('shipping_city','Shipping City','trim');
			$this->form_validation->set_rules('shipping_zip','Shipping Zip','trim');
			$this->form_validation->set_rules('shipping_state','Shipping State','trim');
			$this->form_validation->set_rules('shipping_country','Shipping Country','trim');
			$this->form_validation->set_rules('userstatus','User Status','trim'); 

			if ($this->form_validation->run() == FALSE){
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata($data);

				$data['customer_detail'] = $this->User_model->customer_detail($customer_id);
				//Load view
				$data['main_content'] = 'admin/customers/customer_profile';
				$this->load->view('admin/layouts/main', $data);
			}
			else{
				//password validation
				if($this->input->post('password') == $this->User_model->customer_detail($customer_id)->password){
					$password = $this->User_model->customer_detail($customer_id)->password;
				}
				else{
					$options = [
						'cost' => 8,
						'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
					];
					$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
				}

				//email validation
				if($this->input->post('email') == $this->User_model->customer_detail($customer_id)->email 
				   || $this->db->where('email', $this->input->post('email'))->get('users')->num_rows() > 0
				  ){
					$email = $this->User_model->customer_detail($customer_id)->email;
				}
				else{
					$email = $this->input->post('email');
				}
				//username validation
				if($this->input->post('username') == $this->User_model->customer_detail($customer_id)->username
				   || $this->db->where('username', $this->input->post('username'))->get('users')->num_rows() > 0
				  ){
					$username = $this->User_model->customer_detail($customer_id)->username;
				}
				else{
					$username = $this->input->post('username');
				}
				$data = array(
					'first_name'	=> $this->input->post('first_name'),
					'last_name'		=> $this->input->post('last_name'),
					'email'			=> $email,
					'username'		=> $username,
					'user_phone'	=> $username,
					'password'		=> $password,
					'user_company'	=> $this->input->post('company'),
					'user_address1'	=> $this->input->post('billing_address1'),
					'user_address2'	=> $this->input->post('billing_address2'),
					'user_city'		=> $this->input->post('billing_city'),
					'user_state'	=> $this->input->post('billing_state'),
					'user_zip'		=> $this->input->post('billing_zip'),
					'user_country'		=> $this->input->post('billing_country'),
					'shipping_address1'	=> $this->input->post('shipping_address1'),
					'shipping_address2'	=> $this->input->post('shipping_address2'),
					'shipping_city'	=> $this->input->post('shipping_city'),
					'shipping_zip'	=> $this->input->post('shipping_zip'),
					'shipping_state'	=> $this->input->post('shipping_state'),
					'shipping_country'	=> $this->input->post('shipping_country'),
					'user_status'		=> $this->input->post('userstatus')
				);

				if($this->User_model->edit_customer($customer_id, $data)){
					$this->session->set_flashdata('customer_updated', 'Customer Updated!');
					redirect('admin/customers/view_all_customers');
				}
			}
		}else{
			//return false;
			if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) {
				redirect('admin/customers/view_all_customers');
			}else{
				redirect('admin/auth/login');
			}
		}

	}

	public function delete($id){
		if($id){
			$this->User_model->delete_user($id);
			$this->session->set_flashdata('customer_deleted', 'Customer Deleted');
			redirect('admin/customers/view_all_customers');
		}else{
			$this->session->set_flashdata('customer_deleted_erro', 'Customer Not Found');
			redirect('admin/customers/view_all_customers');
		}
	}

}