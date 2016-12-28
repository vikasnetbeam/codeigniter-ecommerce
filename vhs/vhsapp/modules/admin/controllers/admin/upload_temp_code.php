<?php 
public function add(){
	//Validation Rules
	$this->form_validation->set_rules('product_name', 'Product Title', 'trim|required');
	$this->form_validation->set_rules('description', 'Product Description', 'trim|required');

	if ($this->form_validation->run() == FALSE){
		//Show View
		$data = array(
			'errors' => validation_errors()
		);
		$this->session->set_flashdata($data);
		$data['main_content'] = 'admin/products/product_add';
		$this->load->view('admin/layouts/main', $data);
	}
	else{
		$config['upload_path']          = 'assets/images/products/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048;
		$config['max_width']            = 1024;
		$config['max_height']           = 1024;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image'))
		{
			//$uploadError = array('upload_error' => $this->upload->display_errors()); 

			$this->session->set_flashdata('uploadError', "Prodcut image could not be uploaded! Please upload ('gif|jpg|png') and max size 2mb. ");

			redirect('admin/products/add');
			exit;
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$file_info = $this->upload->data();
			$file_name = $file_info['file_name'];
		}
		$data = array(
			'title' => $this->input->post('product_name'),
			'description'  => $this->input->post('description'),
			'image'=> $file_name
		);
		if($this->Product_model->add_product($data)){       
			$this->session->set_flashdata('product_added', 'Product Added Succesfully');
			redirect('admin/products/add');
		}

	}	
}	