<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Site_settings extends MY_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->helper("url");
		$this->load->model("Product_model");
		$this->load->helper('security');
		$this->load->library("pagination");
	}
	public function index() {
		$data['main_content'] = 'admin/site_settings/general_settings';
		$this->load->view('admin/layouts/setting', $data);
	}
	public function save_setting(){
		$this->form_validation->set_rules('site_title', 'Site Title', 'trim|xss_clean');
		$this->form_validation->set_rules('system_email', 'Site Admin Email', 'trim|xss_clean');
		$this->form_validation->set_rules('email_sender', 'Site Admin Email', 'trim|xss_clean');
		$this->form_validation->set_rules('home_category[]', 'Home Category', 'trim|xss_clean');
		$this->form_validation->set_rules('logoalt', 'Logo Alt', 'trim|xss_clean');

		if ($this->form_validation->run() == FALSE){
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			//Show View
			$data['main_content'] = 'admin/site_settings/general_settings';
			$this->load->view('admin/layouts/setting', $data);
		}
		else{
			$config['upload_path']          = './assets/images/gen/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 100;
			$config['max_width']            = 500;
			$config['max_height']           = 500;
			$config['overwrite']			= TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('homelogo'))
			{
				$error = array('upload_error' => $this->upload->display_errors());
				$this->session->set_flashdata($error);	
				$data['main_content'] = 'admin/site_settings/general_settings';
				$this->load->view('admin/layouts/setting', $data);
			}
			else
			{
				$data = array(
					'upload_data' 	=> $this->upload->data(),
					'alt'			=> $this->input->post('logoalt')
				);
				$this->session->set_flashdata('logo_save', 'Your Home Logo has been Changed');

			}
			if($data['upload_data']){
				$this->db->where('key', "home_top_logo");
				$this->db->update('settings', array(
					'value' => json_encode($data)
				));
			}else{
				$this->db->where('key', "home_top_logo");
				$this->db->update('settings', array(
					'value' => $this->global_data['home_top_logo']
				));

			}

			$this->db->where('key', "site_title");
			$this->db->update('settings', array(
				'value' => $this->input->post('site_title')
			));

			$this->db->where('key', "email_sender");
			$this->db->update('settings', array(
				'value' => $this->input->post('email_sender')
			));
			$this->db->where('key', "system_email");
			$this->db->update('settings', array(
				'value' => $this->input->post('system_email')
			));
			$this->db->where('key', "home_category");
			$this->db->update('settings', array(
				'value' => json_encode($this->input->post('home_category'))
			));

			$this->session->set_flashdata('setting_save', 'Your Setting has been updated');
			$this->load->library('user_agent');
			redirect($this->agent->referrer());

		}
	}
	public function banner(){
		$data['main_content'] = 'admin/site_settings/banner_settings';
		$this->load->view('admin/layouts/setting', $data);
	}
	public function add_slider_images(){
		if(isset($_FILES['sliderimages']['name'])){
			$count = count($_FILES['sliderimages']['size']);
			$config = array();
			$config['upload_path']          = './assets/images/slider/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 1024;
			$config['max_width']            = 3000;
			$config['max_height']           = 1100;
			$config['overwrite'] 			= TRUE;

			foreach($_FILES as $key=>$value){
				for($s=0; $s<$count; $s++){
					$_FILES['sliderimages']['name']	=$value['name'][$s];
					$_FILES['sliderimages']['type']    = $value['type'][$s];
					$_FILES['sliderimages']['tmp_name'] = $value['tmp_name'][$s]; 
					$_FILES['sliderimages']['error']       = $value['error'][$s];
					$_FILES['sliderimages']['size']    = $value['size'][$s];  
					$this->load->library('upload', $config);
					$this->upload->initialize($config); 
					if (!$this->upload->do_upload('sliderimages'))
					{
						$uploadError = array('upload_error' => $this->upload->display_errors()); 
						$this->session->set_flashdata($uploadError);
						redirect('admin/site_settings/banner');
						exit;
					}
					else
					{
						$data = $this->upload->data();
					}
					$name_array[] = $data['file_name'];
				}
			}
			// end of foreach loop for images				
		}
		$this->db->where('key', "slider_images");
		$this->db->update('settings', array(
			'value' => json_encode(array('name' =>$name_array))
		));
		$this->session->set_flashdata('slider_added', 'Your Setting has been updated');
		$this->load->library('user_agent');
		redirect($this->agent->referrer());

	}
	public function ajax_edit($id){
		$data = $this->Menus_model->get_menu_by_id($id);
		echo trim(json_encode($data));
	}
	public function menu(){
		$data['main_content'] = 'admin/site_settings/menu_settings';
		$this->load->view('admin/layouts/setting', $data);
	}
	public function savemenu(){
		$this->form_validation->set_rules(
			'menuname', 'Menu Item Name', 
			'trim|required|is_unique[menus.menulabel]',
			array( 
				'required'		=> '%s is required',
				'is_unique'	=> 'Your %s is already exist.'
			)
		);
		$this->form_validation->set_rules('menulink', 'Menu Item Link', 'trim|xss_clean|required');
		$this->form_validation->set_rules('menuorder', 'Menu Item Order', 'trim|xss_clean');
		$this->form_validation->set_rules('menuparent', 'Menu Item parent', 'trim|xss_clean');
		$this->form_validation->set_rules('menuclass', 'Menu Item Class', 'trim|xss_clean');
		if ($this->form_validation->run() == FALSE){
			//Show View
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			redirect('admin/site_settings/menu');
		}
		else{
			$data = array(
				'menulabel' => ucwords($this->input->post('menuname')),
				'menulink' => $this->input->post('menulink'),
				'menuparent' => $this->input->post('menuparent'),
				'menusort' => $this->input->post('menuorder'),
				'menuclass' => $this->input->post('menuclass'),
			);
			if($this->Menus_model->menu_save($data)){
				$this->session->set_flashdata('menu_added', 'Menu Added Succesfully');
				redirect('admin/site_settings/menu');
			}
		}
	}
	public function updatemenu($id){
		$this->form_validation->set_rules('menuname', 'Menu Item Name', 'trim|required');
		$this->form_validation->set_rules('menulink', 'Menu Item Link', 'trim|xss_clean|required');
		$this->form_validation->set_rules('menuorder', 'Menu Item Order', 'trim|xss_clean');
		$this->form_validation->set_rules('menuparent', 'Menu Item parent', 'trim|xss_clean');
		$this->form_validation->set_rules('menuclass', 'Menu Item Class', 'trim|xss_clean');
		if ($this->form_validation->run() == FALSE){
			//Show View
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			redirect('admin/site_settings/menu');
		}
		else{
			$data = array(
				'menulabel' => ucwords($this->input->post('menuname')),
				'menulink' => $this->input->post('menulink'),
				'menuparent' => $this->input->post('menuparent'),
				'menusort' => $this->input->post('menuorder'),
				'menuclass' => $this->input->post('menuclass'),
			);
			if($this->Menus_model->update_menu($id, $data)){
				$this->session->set_flashdata('menu_updated', 'Menu Updated Succesfully');
				redirect('admin/site_settings/menu');
			}
		}
	}
	//admin manu navigation delete
	public function deltemenu($id){

		//Delete CRUD Model 
		$this->Product_model->delete_row($value_id, $db_field, $table);

	}

	//admin add/Edit/List
	public function add_admin(){
		//Validation Rules
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules(
			'email','Email Address',
			'trim|valid_email|required|is_unique[admin.admin_email]',
			array(
				'required'		=> '%s is required',
				'is_unique'	=> 'Admin %s is already registered. Please login.'
			)
		);
		$this->form_validation->set_rules(
			'username','Phone Number',
			'required|trim|min_length[10]|max_length[10]|is_unique[admin.admin_username]',
			array(
				'required'      => '%s is required.',
				'is_unique'     => 'Admin %s is already registered. Please login'
			)
		);
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('company','User Company','trim');
		if ($this->form_validation->run() == FALSE){
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			//Show View
			$data['main_content'] = 'admin/site_settings/admin_add';
			$this->load->view('admin/layouts/setting', $data);
		}
		else{
			$options = [
				'cost' => 8,
				'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			];
			$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
			$data =  array(
				'first_name'	    => $this->input->post('first_name'),
				'last_name'		    => $this->input->post('last_name'),
				'admin_email'	    => $this->input->post('email'),
				'admin_username'    => $this->input->post('username'),
				'admin_mobile'	    => $this->input->post('username'),
				'admin_password'    => $password,
				'role'              => 1
			);

			if($this->User_model->add_admin($data)){       
				$this->session->set_flashdata('admin_added', 'Admin Added');
				redirect('admin/site_settings/admin_users');
			}
		}
	}
	public function edit_admin($admin_username=''){
		//Validation Rules
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('email','Email Address','trim|valid_email|required');
		$this->form_validation->set_rules('username','Phone Number','required|trim|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('company','User Company','trim');
		if ($this->form_validation->run() == FALSE){
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			$data['admin_details'] = $this->User_model->get_admin($admin_username);
			//Show View
			$data['main_content'] = 'admin/site_settings/admin_edit';
			$this->load->view('admin/layouts/setting', $data);
		}
		else{
			$options = [
				'cost' => 8,
				'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			];
			$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
			$data =  array(
				'first_name'	    => $this->input->post('first_name'),
				'last_name'		    => $this->input->post('last_name'),
				'admin_email'	    => $this->input->post('email'),
				'admin_username'    => $this->input->post('username'),
				'admin_mobile'	    => $this->input->post('username'),
				'admin_password'    => $password,
				'role'              => 1
			);

			if($this->User_model->update_admin($admin_username, $data)){       
				$this->session->set_flashdata('admin_updated', 'Admin Added');
				redirect('admin/site_settings/edit_admin/'.$admin_username);
			}
		}
	}
	public function admin_users(){
		if (!empty($this->input->post('limit'))) {
			$limit = $this->input->post('limit');
		}
		else{
			$limit = 10;
		}
		$config = array();
		$config["base_url"] = base_url() . "admin/site_settings/admin_users";
		$config["total_rows"] = $this->User_model->admin_count();
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
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		//Get All Productcs
		$data['admin_users'] = $this->User_model->get_all_admins($config["per_page"], $page);

		$data["links"] = $this->pagination->create_links();
		//Load view
		$data['main_content'] = 'admin/site_settings/admin_list';
		$this->load->view('admin/layouts/setting', $data);
	}
	public function email_templates(){
		$data['main_content'] = 'admin/site_settings/admin_list';
		$this->load->view('admin/layouts/setting', $data);
	}

	//Delte All Caches
	public function delete_cache(){
		if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1)){
			$CI =& get_instance();
			$path = $CI->config->item('cache_path');

			$cache_path = ($path == '') ? APPPATH.'cache/' : $path;

			$handle = opendir($cache_path);
			while (($file = readdir($handle))!== FALSE) 
			{
				//Leave the directory protection alone
				if ($file != '.htaccess' && $file != 'index.html')
				{
					@unlink($cache_path.'/'.$file);
				}
			}
			closedir($handle);
			redirect('admin/site_settings/');
		}
	}




}
