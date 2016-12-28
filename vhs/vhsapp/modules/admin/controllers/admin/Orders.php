<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends MY_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->helper("url");
		$this->load->model("Orders_model");
		$this->load->library("pagination");
	}

	//    public function index() {
	//        $data['main_content'] = 'admin/orders/view_all';
	//        $this->load->view('admin/layouts/main', $data);
	//    }
	public function view_orders() {

		if (!empty($this->input->post('limit'))) {
			$limit = $this->input->post('limit');
		}
		else{
			$limit = 10;
		}
		$config = array();
		$config["base_url"] = base_url() . "admin/orders/view_orders";
		$config["total_rows"] = $this->Orders_model->record_count();
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

		//Get All orders
		$data['orders'] = $this->Orders_model->get_all_orders($config["per_page"], $page, '!=', 'cancelled'); //operator and status 
		$data["links"] = $this->pagination->create_links();
		//Load view
		$data['main_content'] = 'admin/orders/orders_list';
		$this->load->view('admin/layouts/main', $data);
	}
	public function view_order($order_id){
		if($order_id && !$this->input->get('print', true)){
			$data['order'] = $this->Orders_model->get_order_detail($order_id);
			$data['customer'] = $this->Orders_model->get_customer($data['order']->customer_id);
			$data['main_content'] = 'admin/orders/order_view';
			$this->load->view('admin/layouts/main', $data);

			//user details
			$customer_phone = $data['customer']->user_phone;
			$customer_order = $data['order'];
			if($this->input->post('order_status', true)){
				$data = array(
					'status' => trim($this->input->post('order_status', true))
				);

				// sending sms on status chagne
				if($data['status'] == 'shipped'){
					smssend( $customer_phone, "Your Order# {$customer_order->id} has been shipped. Your Payment method is {$customer_order->transaction_id} amounting to {$customer_order->final_amount} . ");
				}elseif($data['status'] == 'delivered'){
					smssend( $customer_phone, "Your Order# {$customer_order->id} has been delivered. Thank you for shopping with us");
				}elseif($data['status'] == 'cancelled'){
					smssend( $customer_phone, "Your Order# {$customer_order->id} has been cancelled. Visit us.");
				}
				$this->Product_model->edit_row($order_id, 'id', 'orders', $data);
				redirect('admin/orders/view_order/'.$order_id);	
			}
		}else{
			if($this->input->get('print', true)){
				$data['order'] = $this->Orders_model->get_order_detail($order_id);
				$data['customer'] = $this->Orders_model->get_customer($data['order']->customer_id);
				$data['main_content'] = 'admin/orders/order_print';
				$this->load->view('admin/layouts/no_header', $data);
			}else{
				redirect('admin');	
			}

		}

	}



}
