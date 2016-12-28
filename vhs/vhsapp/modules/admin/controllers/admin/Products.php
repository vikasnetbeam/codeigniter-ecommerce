<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends MY_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->helper("url");
		$this->load->model("Product_model");
		$this->load->library("pagination");
		$this->load->helper('security');
	}
	public function view_all() {
		if(!empty($this->input->post('limit'))) {
			$limit = $this->input->post('limit');
		}
		else{
			$limit = 20;
		}
		$config = array();
		$config["base_url"] = base_url() . "admin/products/view_all";
		$config["total_rows"] = $this->Product_model->record_count();
		$config["per_page"] = $limit;
		$config['use_page_numbers'] = TRUE;  
		$config['first_tag_open'] = '<li class="paginate_button active">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="paginate_button active">';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="paginate_button previous" id="example1_previous">';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['next_link'] = '&raquo';
		$config['cur_tag_open'] = '<li class="paginate_button active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li class="paginate_button next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = 4;
		$this->pagination->initialize($config);
		//		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		if($this->uri->segment(4) > 0){
			$page = ($this->uri->segment(4) + 0)*$config['per_page'] - $config['per_page'];
		}
		else{
			$page = $this->uri->segment(4);
		}
		//Get All Productcs
		$data['products'] = $this->Product_model->get_all_products($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		//Load view
		$data['main_content'] = 'admin/products/products_list';
		$this->load->view('admin/layouts/main', $data);
	}
	public function ajax_subcategory() {
		if($this->input->post('category_id')){
			//			$this->load->model('Product_model');
			$data = $this->Product_model->get_sub_categories_by_id($this->input->post('category_id'));
			echo json_encode($data); 
		}else{
			redirect('admin/dashboard/');
		}
	}
	//Add New Product function
	public function add(){
		//Validation Rules
		$this->form_validation->set_rules(
			'product_name', 'Product Title', 
			'trim|required|is_unique[products.title]',
			array( 
				'required'		=> '%s is required',
				'is_unique'	=> 'Your %s is already exist.'
			)
		);
		$this->form_validation->set_rules('feature[]', 'Product Features', 'trim|xss_clean');
		$this->form_validation->set_rules('description', 'Product Description', 'trim|xss_clean');
		$this->form_validation->set_rules('product_category', 'Product Category', 'trim|xss_clean|required');
		$this->form_validation->set_rules('product_subcategory', 'Product Sub Category', 'trim|xss_clean');
		$this->form_validation->set_rules('product_vendor', 'Product Vendor', 'trim|xss_clean|');
		$this->form_validation->set_rules('product_sku', 'Product SKU', 'trim|xss_clean|required');
		$this->form_validation->set_rules('product_type', 'Product type', 'trim|xss_clean');
		$this->form_validation->set_rules('product_price', 'Product Price', 'trim|xss_clean');
		$this->form_validation->set_rules('product_mrpprice', 'Product MRP Price', 'trim|required');
		$this->form_validation->set_rules('external_url', 'External URL', 'trim');
		$this->form_validation->set_rules('external_button', 'External Button Text', 'trim');
		$this->form_validation->set_rules('stock_status', 'Product Stock Status', 'trim');
		$this->form_validation->set_rules('featured_products', 'Featured Product Status', 'trim');
		$this->form_validation->set_rules('product_status', 'Product Status', 'trim');
		$this->form_validation->set_rules('product_brand', 'Product Brand', 'trim|xss_clean');
		$this->form_validation->set_rules('product_title', 'Product Title', 'trim|xss_clean');
		$this->form_validation->set_rules('product_meta_des', 'Product Meta Description', 'trim|xss_clean');
		$this->form_validation->set_rules('product_meta_keyword', 'Product Meta Keyword', 'trim|xss_clean');
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
			$count = count($_FILES['image']['size']);
			$config['upload_path']          = 'assets/images/products/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 2048;
			$config['max_width']            = 2048;
			$config['max_height']           = 2048;
			foreach($_FILES as $key=>$value){
				for($s=0; $s<4; $s++){

					$_FILES['image']['name']=$value['name'][$s];
					$_FILES['image']['type']    = $value['type'][$s];
					$_FILES['image']['tmp_name'] = $value['tmp_name'][$s]; 
					$_FILES['image']['error']       = $value['error'][$s];
					$_FILES['image']['size']    = $value['size'][$s];  

					$this->load->library('upload', $config);

					//					if ( ! $this->upload->do_upload('image'))
					//					{
					//						//$uploadError = array('upload_error' => $this->upload->display_errors()); 
					//						$this->session->set_flashdata('uploadError', "Prodcut image could not be uploaded! Please upload ('gif|jpg|png') and max size 2mb. ");
					//						redirect('admin/products/add');
					//						exit;
					//					}
					//					else
					//					{
					//						$data = $this->upload->data();
					//					}

					$this->upload->do_upload('image');
					$data = $this->upload->data();
					$name_array[] = $data['file_name'];
				}
			}// end of foreach loop for images
			foreach($this->input->post('feature') as $f)
			{
				$feature[] = $f;
			}	
			$meta = array(
				array('title'=>$this->input->post('product_title')),
				array('name' => 'description', 'content' => $this->input->post('product_meta_des')),
				array('name' => 'keywords', 'content' => $this->input->post('product_meta_keyword')),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),       
			);
			$data = array(
				'sku' 				=> $this->input->post('product_sku'),
				'title' 			=> $this->input->post('product_name'),
				'features'  		=> json_encode($feature),
				'description'  		=> $this->input->post('description'),
				'image'				=> $name_array[0],
				'image1'			=> $name_array[1],
				'image2'			=> $name_array[2],
				'image3'			=> $name_array[3],
				'category_id' 		=> $this->input->post('product_category'),
				'subcategory_id'	=> $this->input->post('product_subcategory'),
				'seller_id' 		=> 1,
				'price'				=> $this->input->post('product_price'),
				'mrp_price'			=> $this->input->post('product_mrpprice'),
				'stock_status'		=> $this->input->post('stock_status'),
				'slug'				=> url_title($this->input->post('product_name'), 'dash', true),
				'product_type'		=> $this->input->post('product_type'),
				'external_url'		=> $this->input->post('external_url'),
				'external_btn_text'	=> $this->input->post('external_button_text'),
				'visibility'		=> $this->input->post('featured_products'),
				'status'			=> $this->input->post('product_status'),
				'brand'				=> $this->input->post('product_brand'),
				'updated_on'		=> date("Y-m-d H:i:s", time()), 
				'product_seo'		=> json_encode($meta)

			);
			if($this->Product_model->add_product($data)){       
				$this->session->set_flashdata('product_added', 'Product Added Succesfully');
				redirect('admin/products/add');
			}
		}	
	} //end function
	//Add New Product function
	public function edit($id){
		//Validation Rules
		$this->form_validation->set_rules('product_name', 'Product Title', 'trim|required');
		$this->form_validation->set_rules('feature[]', 'Product Features', 'trim');
		$this->form_validation->set_rules('description', 'Product Description', 'trim');
		$this->form_validation->set_rules('product_category', 'Product Category', 'trim|required');
		$this->form_validation->set_rules('product_subcategory', 'Product Sub Category', 'trim');
		$this->form_validation->set_rules('product_vendor', 'Product Vendor', 'trim');
		$this->form_validation->set_rules('product_sku', 'Product SKU', 'trim|required');
		$this->form_validation->set_rules('product_type', 'Product type', 'trim');
		$this->form_validation->set_rules('product_price', 'Product Price', 'trim');
		$this->form_validation->set_rules('product_mrpprice', 'Product MRP Price', 'trim|required');
		$this->form_validation->set_rules('external_url', 'External URL', 'trim');
		$this->form_validation->set_rules('external_button', 'External Button Text', 'trim');
		$this->form_validation->set_rules('stock_status', 'Product Stock Status', 'trim');
		$this->form_validation->set_rules('product_variant[]', 'Product Varitions', 'trim');
		$this->form_validation->set_rules('product_variant_group[]', 'Product Varition Group', 'trim');
		$this->form_validation->set_rules('featured_products', 'Featured Product Status', 'trim');
		$this->form_validation->set_rules('product_status', 'Product Status', 'trim');
		$this->form_validation->set_rules('product_brand', 'Product Brand', 'trim');
		$this->form_validation->set_rules('product_title', 'Product Title', 'trim|xss_clean');
		$this->form_validation->set_rules('product_meta_des', 'Product Meta Description', 'trim|xss_clean');
		$this->form_validation->set_rules('product_meta_keyword', 'Product Meta Keyword', 'trim|xss_clean');

		if ($this->form_validation->run() == FALSE){
			//Show View
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			//Get Product Detail
			$data['product_details'] = $this->Product_model->get_product_details($id);
			$data['variant_details'] = $this->Product_model->get_variant_by_pid($id);
			$data['main_content'] = 'admin/products/edit_product';
			$this->load->view('admin/layouts/main', $data);
		}
		else{
			foreach($this->input->post('feature') as $f)
			{
				$feature[] = $f;
			}
			if(!empty($_FILES['image']['name'][0])){
				$count = count($_FILES['image']['size']);
				$config['upload_path']          = 'assets/images/products/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 2048;
				//				$config['max_width']            = 2048;
				//				$config['max_height']           = 2048;
				foreach($_FILES as $key=>$value){
					for($s=0; $s<4; $s++){

						$_FILES['image']['name']=$value['name'][$s];
						$_FILES['image']['type']    = $value['type'][$s];
						$_FILES['image']['tmp_name'] = $value['tmp_name'][$s]; 
						$_FILES['image']['error']       = $value['error'][$s];
						$_FILES['image']['size']    = $value['size'][$s];  
						$this->load->library('upload', $config);

						//					if ( ! $this->upload->do_upload('image'))
						//					{
						//						//$uploadError = array('upload_error' => $this->upload->display_errors()); 
						//						$this->session->set_flashdata('uploadError', "Prodcut image could not be uploaded! Please upload ('gif|jpg|png') and max size 2mb. ");
						//						redirect('admin/products/edit/'.$id.'');
						//						exit;
						//					}
						//					else
						//					{
						//						$this->upload->do_upload('image');
						//						$data = $this->upload->data();
						//					}

						$this->upload->do_upload('image');
						$data = $this->upload->data();
						$name_array[] = $data['file_name'];
					}
				}// end of foreach loop for images
				$meta = array(
					array('title'=>$this->input->post('product_title')),
					array('name' => 'description', 'content' => $this->input->post('product_meta_des')),
					array('name' => 'keywords', 'content' => $this->input->post('product_meta_keyword')),
					array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),       
				);
				$data = array(
					'sku' 				=> $this->input->post('product_sku'),
					'title' 			=> $this->input->post('product_name'),
					'features'  		=> json_encode($feature),
					'description'  		=> $this->input->post('description'),
					'image'				=> $name_array[0],
					'image1'			=> $name_array[1],
					'image2'			=> $name_array[2],
					'image3'			=> $name_array[3],
					'category_id' 		=> $this->input->post('product_category'),
					'subcategory_id'	=> $this->input->post('product_subcategory'),
					'seller_id' 		=> $this->input->post('product_vendor'),
					'price'				=> $this->input->post('product_price'),
					'mrp_price'			=> $this->input->post('product_mrpprice'),
					'stock_status'		=> $this->input->post('stock_status'),
					'slug'				=> url_title($this->input->post('product_name'), 'dash', true),
					'product_type'		=> $this->input->post('product_type'),
					'external_url'		=> $this->input->post('external_url'),
					'external_btn_text'	=> $this->input->post('external_button_text'),
					'product_variant'	=>$this->input->post('products_variant'),
					'visibility'		=> $this->input->post('featured_products'),
					'status'			=> $this->input->post('product_status'),
					'brand'				=> $this->input->post('product_brand'),
					'updated_on'		=> date("Y-m-d", time()),
					'product_seo'		=> json_encode($meta)


				);
				if($this->Product_model->edit_product($id, $data)){       
					$this->session->set_flashdata('product_updated', 'Product Updated Succesfully');
					//					redirect('admin/products/edit/'.$id.'');
					print_r($this->input->post());
				}
			}else{
				$meta = array(
					array('title'=>$this->input->post('product_title')),
					array('name' => 'description', 'content' => $this->input->post('product_meta_des')),
					array('name' => 'keywords', 'content' => $this->input->post('product_meta_keyword')),
					array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),       
				);
				$data = array(
					'sku' 				=> $this->input->post('product_sku'),
					'title' 			=> $this->input->post('product_name'),
					'features'  		=> json_encode($feature),
					'description'  		=> $this->input->post('description'),
					'category_id' 		=> $this->input->post('product_category'),
					'subcategory_id'	=> $this->input->post('product_subcategory'),
					'seller_id' 		=> $this->input->post('product_vendor'),
					'price'				=> $this->input->post('product_price'),
					'mrp_price'			=> $this->input->post('product_mrpprice'),
					'stock_status'		=> $this->input->post('stock_status'),
					'slug'				=> url_title($this->input->post('product_name'), 'dash', true),
					'product_type'		=> $this->input->post('product_type'),
					'external_url'		=> $this->input->post('external_url'),
					'external_btn_text'	=> $this->input->post('external_button_text'),
					'product_variant'	=>$this->input->post('products_variant'),
					'visibility'		=> $this->input->post('featured_products'),
					'status'			=> $this->input->post('product_status'),
					'brand'				=> $this->input->post('product_brand'),
					'updated_on'		=> date("Y-m-d H:i:s", time()),
					'product_seo'		=> json_encode($meta)

				);

				if($this->Product_model->edit_product($id, $data)){       
					$this->session->set_flashdata('product_updated', 'Product Updated Succesfully');
					/// Product Varaint Add
					if(!empty($this->input->post('product_variant'))){
						$first = $this->input->post('product_variant');
						for($i=0; $i<count(combination($first)); $i++){
							$value = combination($first)[$i];
							//						$value1[] = explode(',', (cartesian($first)[$i]));
							$variant_data = array(
								'product_id' 			=> $id,
								'product_category_id' 	=> $this->input->post('product_category'),
								'variant_group_id'		=> json_encode($this->input->post('product_variant_group')),
								'variant_value_id'		=> $value,
								'variant_group_option'	=> json_encode($this->input->post('product_variant')),
								'product_variant_title' => $this->input->post('product_name').' - '.$value,
								'variant_slug'			=> url_title(strtolower($this->input->post('product_name').' '.$value)),
							);

							if($this->Product_model->add_product_variant($id, $value, $variant_data)){
								$this->session->set_flashdata('product_variant_added', 'Product Variant Added Succesfully');
							}
						}		
						//						$variant_options = array(
						//							'product_id' 			=> $id,
						//							'variant_group_options'	=> json_encode($this->input->post('product_variant')),
						//						);	
						//						if($this->Product_model->add_product_variant_options($id, $variant_options)){
						//							$this->session->set_flashdata('product_variant_options_added', 'Product Variant Options Created Succesfully');
						//						}
					}
					redirect('admin/products/edit/'.$id.'');
				}
			}
		}	
	}
	// Function to delete Product admin
	public function delete($value_id, $db_field='id', $table='products'){
		if(!$value_id == '' || !$value_id == null){
			if($this->Product_model->delete_row($value_id, $db_field, $table)){
				$this->session->set_flashdata('record_updated', 'Record Deleted Succesfully');
				redirect('admin/products/view_all');
			}
		}else{
			$this->session->set_flashdata('errors', 'Something goes wrong!');
			redirect('admin/products/view_all');
		}
	}

	//end function
	// BULK / EDIT / Delete product variant
	public function bulkedit_product_varaints($product_id){

		$this->form_validation->set_rules('product_brand', 'Product Brand', 'trim');

		if ($this->form_validation->run() == FALSE){
			//Show View
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			//Get Product Detail
			$data['product_details'] = $this->Product_model->get_product_details($product_id);
			$data['variant_details'] = $this->Product_model->get_variant_by_pid($product_id);
			$data['main_content'] = 'admin/products/product_variants_update';
			$this->load->view('admin/layouts/main', $data);
		}
		else{
			$product_variants = $this->Product_model->get_variant_by_pid($product_id);
			for($i=0; $i<count($product_variants); $i++){


				$variant_data = array(
					'product_id' 			=> $product_id,
					'variant_ean'			=> $this->input->post('variant_ean')[$i],
					'product_category_id' 	=> $this->input->post('product_category_id'),
					'variant_stock_status' 	=> $this->input->post('variant_stock_status')[$i],
					'variant_mrp_price' 	=> $this->input->post('variant_mrpprice')[$i],
					'variant_price' 		=> $this->input->post('variant_price')[$i],
					'variant_status' 		=> $this->input->post('variant_status')[$i],
				);
				if($this->Product_model->update_product_variant($this->input->post('variant_id')[$i], $variant_data)){
					//				print"<pre>";
					//				print_r($variant_data);
					//				print"</pre>";	
					$this->session->set_flashdata('product_variant_updated', 'Product Variant Updated Succesfully');
				}

			}
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
	}

	public function edit_product_variant(){

	}
	public function delete_product_variant($value_id, $db_field='product_variant_id', $table='product_variants'){
		if(!$value_id == '' || !$value_id == null){
			if($this->Product_model->delete_row($value_id, $db_field, $table)){       
				$this->session->set_flashdata('record_deleted', 'Record Deleted Succesfully');
				$this->load->library('user_agent');
				redirect($this->agent->referrer());
			}
		}else{
			redirect('admin/products/view_all');
		}
	}
	public function set_default_variant($value_id){
		$data = array(
			'default_variant' => '1'
		);
		$product_id = $this->input->get('pid', true);;
		if($this->Product_model->set_default_variant($value_id,$product_id, $data)){       
			$this->session->set_flashdata('product_variant_updated', 'Record seted as Default Succesfully');
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}else{
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
	}
	public function view_all_variant($product_id) {
		if($product_id){
			if(!empty($this->input->post('limit'))) {
				$limit = $this->input->post('limit');
			}
			else{
				$limit = 10;
			}
			$config = array();
			$config["base_url"] = base_url() . 'admin/products/view_all_variant/'.$product_id;
			$config["total_rows"] = $this->Product_model->variant_count($product_id);
			$config["per_page"] = $limit;
			$config['use_page_numbers'] = TRUE; 
			$config['page_query_string'] = TRUE;
			$config['query_string_segment'] = 'start';
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
			//		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			if($this->input->get('start') > 0){
				$page = ($this->input->get('start', TRUE) + 0)*$config['per_page'] - $config['per_page'];
			}
			else{
				$page = $this->input->get('start', TRUE);
			}
			//Get All Productcs
			$data['products_variants'] = $this->Product_model->get_variant_by_pid_pagination($product_id, $config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			//Load view
			$data['main_content'] = 'admin/products/product_variant_list';
			$this->load->view('admin/layouts/main', $data);
		}else{
			redirect('admin/products/view_all');
		}
	}
	//check uniqe category
	public function _is_unique2($input) {
		$exclude_id = $this->input->post('id');
		if( $this->db->where('name', $input)->where('id !=', $exclude_id)->limit(1)->get('categories')->num_rows()) {
			$this->form_validation->set_message('_is_unique2', 'Category is Already created');
			return FALSE;
		}
		return TRUE;
	}
	//Add Category
	public function add_category(){
		//Validation Rules
		$this->form_validation->set_rules('cat_name', 'Category Title', 'trim|required|callback__is_unique2');
		$this->form_validation->set_rules('cat_description', 'Category Description', 'trim');
		if ($this->form_validation->run() == FALSE){
			//Show View
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
		else{
			$data = array(
				'name' 		=> ucwords($this->input->post('cat_name')),
				'description'  	=> $this->input->post('cat_description'),
				'category_slug'			=> url_title($this->input->post('cat_name'), 'dash', true)

			);
			if($this->Product_model->add_category($data)){       
				$this->session->set_flashdata('category_added', 'Product Category Added Succesfully');
				redirect('admin/products/view_all_categories/');
			}
		}	
	}
	//edit Category
	public function edit_category($category_id){
		//Validation Rules
		$this->form_validation->set_rules('cat_name', 'Category Title', 'trim|required');
		$this->form_validation->set_rules('cat_description', 'Category Description', 'trim');


		if ($this->form_validation->run() == FALSE){
			//Show View
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			$data['products_category'] = $this->Product_model->get_category_detail_by_id($category_id);
			$data['main_content'] = 'admin/products/edit_category';
			$this->load->view('admin/layouts/main', $data);
		}
		else{

			$data = array(
				'name' 		=> ucwords($this->input->post('cat_name')),
				'description'  	=> $this->input->post('cat_description'),
				'category_slug'			=> url_title($this->input->post('cat_name'), 'dash', true)

			);

			if($this->Product_model->edit_category($category_id, $data)){       
				$this->session->set_flashdata('category_updated', 'Product Category Updated Succesfully');
				$this->load->library('user_agent');
				redirect($this->agent->referrer());
			}
		}	
	}

	// Function to delete category
	public function delete_category($value_id, $db_field='id', $table='categories'){
		if(!$value_id == '' || !$value_id == null){
			if($this->Product_model->delete_row($value_id, $db_field, $table)){
				$this->session->set_flashdata('record_updated', 'Record Deleted Succesfully');
				redirect('admin/products/view_all_categories');
			}
		}else{
			$this->session->set_flashdata('errors', 'Something goes wrong!');
			redirect('admin/products/view_all_categories');
		}

	}

	public function view_all_categories() {
		if (!empty($this->input->post('limit'))) {
			$limit = $this->input->post('limit');
		}
		else{
			$limit = 10;
		}
		$config = array();
		$config["base_url"] = base_url() . "admin/products/view_all_categories";
		$config["total_rows"] = $this->Product_model->category_count();
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
		$data['categories'] = $this->Product_model->get_all_categories($config["per_page"], $page);

		$data["links"] = $this->pagination->create_links();
		//Load view
		$data['main_content'] = 'admin/products/categories_list';
		$this->load->view('admin/layouts/main', $data);
	}

	public function sub_category($para=''){		
		if($para == 'add'){
			$this->form_validation->set_rules(
				'subcategory_name','Subcategory Name',
				'trim|required|is_unique[sub_category.subcategory_name]',
				array(
					'required'		=> '%s is required',
					'is_unique'	=> 'Your %s is already created. Please Cretea New sub category.'
				)
			);
			$this->form_validation->set_rules('subcategory_parent','Parent Category Name','trim|required');
			if ($this->form_validation->run() == FALSE){
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata($data);
				$this->load->library('user_agent');
				redirect($this->agent->referrer());
			}else{
				$data = array(
					'subcategory_name' 	=> ucwords($this->input->post('subcategory_name')),
					'parent_category' 	=> $this->input->post('subcategory_parent'),
					'subcategory_slug'	=> url_title($this->input->post('subcategory_name'),'dash', true)
				);
				if($this->Product_model->add_subcategory($data)){
					$this->session->set_flashdata('subcategory_created', 'Sub Category Created Succesfully');
					$this->load->library('user_agent');
					redirect($this->agent->referrer());
				}
			}
		}
		$data['subcategories'] = $this->Product_model->get_sub_categories();
		$data['main_content'] = 'admin/products/sub_categories_list';
		$this->load->view('admin/layouts/main', $data);	
	}
	//edit sub Category
	public function edit_subcategory($subcategory_id){
		//Validation Rules
		$this->form_validation->set_rules('subcategory_name','Subcategory Name','trim|required');
		$this->form_validation->set_rules('subcategory_parent','Parent Category Name','trim|required');

		if ($this->form_validation->run() == FALSE){
			//Show View
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			$data['products_subcategory'] = $this->Product_model->get_sub_category_by_id($subcategory_id);
			$data['main_content'] = 'admin/products/edit_subcategory';
			$this->load->view('admin/layouts/main', $data);
		}
		else{

			$data = array(
				'subcategory_name' 	=> ucwords($this->input->post('subcategory_name')),
				'parent_category' 	=> $this->input->post('subcategory_parent'),
				'subcategory_slug'	=> url_title($this->input->post('subcategory_name'),'dash', true)

			);

			if($this->Product_model->edit_subcategory($subcategory_id, $data)){       
				$this->session->set_flashdata('category_updated', 'Product Sub Category Updated Succesfully');
				$this->load->library('user_agent');
				redirect($this->agent->referrer());
			}
		}	
	}
	// Function to delete sub category
	public function delete_subcategory($value_id, $db_field='subcategory_id', $table='sub_category'){
		if(!$value_id == '' || !$value_id == null){
			if(!$this->Product_model->get_products_by_subcategory($value_id)){
				if($this->Product_model->delete_row($value_id, $db_field, $table)){
					$this->session->set_flashdata('record_updated', 'Record Deleted Succesfully');
					redirect('admin/products/sub_category');
				}	
			}else{
				$this->session->set_flashdata('errors', 'Some Product Assigned to this category!');
				redirect('admin/products/sub_category');
			}
		}else{
			$this->session->set_flashdata('errors', 'Something goes wrong!');
			redirect('admin/products/sub_category');
		}

	}
	//Product Variant Group : Add, Edit, Delete, View
	public function add_variant_group(){
		//Validation Rules
		$this->form_validation->set_rules('category_id', 'Product Category', 'trim|required');
		$this->form_validation->set_rules('variant_group_name', 'Product Variant Group Title', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			//Show View
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
		else{
			$data = array(
				'category_id'	=> ($this->input->post('category_id')),
				'name' 			=> ucwords($this->input->post('variant_group_name')),
			);
			if($this->Product_model->add_variant_group($data)){       
				$this->session->set_flashdata('group_added', 'Product Variant Group Added Succesfully');
				redirect('admin/products/view_variant_group/');
			}
		}	
	}
	public function edit_variant_group($id){
		//Validation Rules
		$this->form_validation->set_rules('category_id', 'Product Category', 'trim|required');
		$this->form_validation->set_rules('variant_group_name', 'Product Variant Group Name', 'required');
		if ($this->form_validation->run() == FALSE){
			//Show View
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			//Get Product Detail
			$data['variant_details'] = $this->Product_model->get_variant_group($id);
			$data['main_content'] = 'admin/products/variant_group_edit';
			$this->load->view('admin/layouts/main', $data);
		}
		else{
			$data = array(
				'category_id'	=> ($this->input->post('category_id')),
				'name' 			=> ucwords($this->input->post('variant_group_name')),
			);
			if($this->Product_model->edit_variant_group($id, $data)){       
				$this->session->set_flashdata('group_updated', 'Variant Group Updated Succesfully');
				redirect('admin/products/edit_variant_group/'.$id.'');
			}
		}	
	} //end function
	public function delete_variant_group($value_id, $db_field='id', $table='variant_group'){
		if(!$value_id == '' || !$value_id == null){
			if($this->Product_model->delete_row($value_id, $db_field, $table)){       
				$this->session->set_flashdata('record_updated', 'Record Deleted Succesfully');
				redirect('admin/products/view_variant_group');
			}
		}else{
			redirect('admin/products/view_variant_group');
		}
	}
	public function view_variant_group() {
		if (!empty($this->input->post('limit'))) {
			$limit = $this->input->post('limit');
		}
		else{
			$limit = 10;
		}
		$config = array();
		$config["base_url"] = base_url() . "admin/products/view_variant_group";
		$config["total_rows"] = $this->Product_model->variant_group_count();
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
		$data['variant_groups'] = $this->Product_model->get_all_variant_group($config["per_page"], $page);

		$data["links"] = $this->pagination->create_links();
		//Load view
		$data['main_content'] = 'admin/products/variant_group_list';
		$this->load->view('admin/layouts/main', $data);
	}
	public function add_variant_value(){
		//Validation Rules
		$this->form_validation->set_rules('variant_group_name', 'Product Variant Group Name', 'trim|required');
		$this->form_validation->set_rules('variant_parent_category', 'Product Variant Category', 'trim|required');
		$this->form_validation->set_rules(
			'variant_value', 'Product Variant Value', 
			'trim|required|is_unique[variant_value.value]',
			array(
				'required'		=> '%s is required',
				'is_unique'	=> 'Your %s is already Created!.'
			)
		);
		if ($this->form_validation->run() == FALSE){
			//Show View
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
		else{
			$data = array(
				'category_id'		=> $this->input->post('variant_parent_category'),
				'group_id'		=> $this->input->post('variant_group_name'),
				'value' 		=> ucwords($this->input->post('variant_value')),
			);
			if($this->Product_model->add_variant_value($data)){       
				$this->session->set_flashdata('variant_value_added', 'Product Variant Value Added Succesfully');
				redirect('admin/products/view_variant/');
			}
		}	
	}
	public function edit_variant_value($value_id, $db_field='id', $table='variant_value'){
		//Validation Rules
		$this->form_validation->set_rules('variant_group_name', 'Product Group', 'trim|required');
		$this->form_validation->set_rules('parent_category', 'Product Category', 'trim|required');
		$this->form_validation->set_rules('variant_value', 'Product Variant Value', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			//Show View
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			//Get Product Detail
			$data['variant_values'] = $this->Product_model->get_all_variant_value($value_id);
			$data['main_content'] = 'admin/products/variant_value_edit';
			$this->load->view('admin/layouts/main', $data);
		}
		else{
			$data = array(
				'category_id'	=> $this->input->post('parent_category'),
				'group_id'		=> $this->input->post('variant_group_name'),
				'value' 		=> ucwords($this->input->post('variant_value')),
			);
			if($this->Product_model->edit_row($value_id, $db_field, $table, $data)){       
				$this->session->set_flashdata('value_updated', 'Variant Value Updated Succesfully');
				redirect('admin/products/edit_variant_value/'.$value_id.'');
			}
		}	
	} //end function
	public function delete_variant_value($value_id, $db_field='id', $table='variant_value'){
		if(!$value_id == '' || !$value_id == null){
			if($this->Product_model->delete_row($value_id, $db_field, $table)){       
				$this->session->set_flashdata('record_updated', 'Record Deleted Succesfully');
				redirect('admin/products/view_variant');
			}
		}else{
			redirect('admin/products/view_variant');
		}
	}
	public function view_variant() {
		if (!empty($this->input->post('limit'))) {
			$limit = $this->input->post('limit');
		}
		else{
			$limit = 10;
		}
		$config = array();
		$config["base_url"] = base_url() . "admin/products/view_variant";
		$config["total_rows"] = $this->Product_model->variant_value_count();
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
		$data['variant_values'] = $this->Product_model->get_all_variant_value('',$config["per_page"], $page);

		$data["links"] = $this->pagination->create_links();
		//Load view
		$data['main_content'] = 'admin/products/variant_value_list';
		$this->load->view('admin/layouts/main', $data);
	}

	public function ajax_variant_group(){
		if($this->input->post('parent_category')){
			$data = $this->Product_model->get_variant_group_by_id($this->input->post('parent_category'));
			echo json_encode($data);
		}else{
			redirect('admin/dashboard');
		}
	}
	public function ajax_product_variant_groups($group_id=''){
		if($this->input->post('parent_category')){
			$group = $this->Product_model->get_variant_group_by_id($this->input->post('parent_category'));
			echo json_encode($group);
			//			return json_encode($group);

		}else{
			$group = $this->Product_model->get_variant_group_by_id($group_id);
			//			echo json_encode($group);
			return json_encode($group);
		}

	}
	public function ajax_product_variant($id=''){
		if($this->input->post('parent_group')){
			$value = $this->Product_model->get_variant_by_groupid($this->input->post('parent_group'));
			echo json_encode($value);

		}else{
			//			redirect('admin/dashboard');
			$value = $this->Product_model->get_variant_by_groupid($id);
			return json_encode($value);
		}

	}

}	//end of class loop- place function above this