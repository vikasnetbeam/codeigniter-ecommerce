<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Csv extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('csvimport');
		$this->load->helper("url");
		$this->load->helper('security');
	}
	function index(){
		$data['main_content'] = 'admin/site_settings/import_option';
		$this->load->view('admin/layouts/setting', $data);
	}
	function products() {
		$data['main_content'] = 'admin/site_settings/product_import';
		$this->load->view('admin/layouts/setting', $data);
	}
	function importcsv() {
		$data['products'] = $this->Csv_model->get_products_table();
		$data['error'] = '';    //initialize image upload error array to empty
		$config['upload_path'] = 'assets/uploads';
		$config['allowed_types'] = 'text/plain|text/anytext|csv|text/x-comma-separated-values|text/comma-separated-values|application/octet-stream|application/vnd.ms-excel|application/x-csv|text/x-csv|text/csv|application/csv|application/excel|application/vnd.msexcel';
		$config['max_size'] = '1000';
		$this->load->library('upload', $config);
		// If upload failed, display error
		if (!$this->upload->do_upload()) {
			$data['error'] = $this->upload->display_errors();
			$this->session->set_flashdata('error',  $data);
			//			redirect('admin/csv/products/');
		} else {
			$file_data = $this->upload->data();
			$file_path =  'assets/uploads/'.$file_data['file_name'];
			$res = $this->csvimport->get_array($file_path);
			print_r($res);
			if ($res) {
				$csv_array = $this->csvimport->get_array($file_path);
				foreach ($csv_array as $row) {
					//Get the file
					//					$content1 = file_get_contents($row['image1']);
					//					$content2 = file_get_contents($row['image2']);
					//					$content3 = file_get_contents($row['image3']);
					//					$content4 = file_get_contents($row['image4']);
					//Store in the filesystem.
					//					$fname1 = url_title($row['title'], 'dash', true).'-1'.'.jpg';
					//					$fname2 = url_title($row['title'], 'dash', true).'-2'.'.jpg';
					//					$fname3 = url_title($row['title'], 'dash', true).'-3'.'.jpg';
					//					$fname4 = url_title($row['title'], 'dash', true).'-4'.'.jpg';
					//					$fp = fopen("./assets/images/products1/".$fname1."", "w");
					//					fwrite($fp, $content1);
					//					$fp = fopen("./assets/images/products1/".$fname2."", "w");
					//					fwrite($fp, $content2);
					//					$fp = fopen("./assets/images/products1/".$fname3."", "w");
					//					fwrite($fp, $content3);
					//					$fp = fopen("./assets/images/products1/".$fname4."", "w");
					//					fwrite($fp, $content4);
					//					fclose($fp);
					$insert_data = array(
						'sku'			=> $row['sku'],
						'category_id'	=> $row['category_id'],
						'subcategory_id'=> $row['subcategory_id'],
						'seller_id'		=> $row['seller_id'],
						'features'		=> json_encode(
							array(
								$row['feature1'],
								$row['feature2'],
								$row['feature3'],
								$row['feature4'],
								$row['feature5'],
								$row['feature6']
							)),
						'title'			=> ucwords($row['title']),
						'description'	=> $row['description'],
						'brand'			=> $row['brand'],
						'image'			=> $row['image1'],
						'image1'		=> $row['image2'],
						'image2'		=> $row['image3'],
						'image3'		=> $row['image4'],
						'mrp_price'		=> $row['mrp_price'],
						'price'			=> $row['sale_price'],
						'stock_status'	=> $row['stock_status'],
						'product_type'	=> $row['product_type'],
						'external_url'	=> $row['product_external_url'],
						'external_btn_text'	=> strtoupper($row['url_button']),
						'slug'			=> url_title($row['title'], 'dash', true)
					);
					$data = $this->security->xss_clean($insert_data);
					if($this->Csv_model->insert_csv($data)){
						echo "insert";
					}
				}
				$this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
				redirect(base_url().'admin/csv/products/');
//				echo "<pre>"; print_r($insert_data);
			} else {
				$this->session->set_flashdata('error', 'Csv Data Can not be Imported Succesfully');
				redirect(base_url().'admin/csv/products/');
			}
		}

	} 
}
