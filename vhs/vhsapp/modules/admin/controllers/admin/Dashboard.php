<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	
    public function index() {
        $data['main_content'] = 'admin/dashboard/index';
        $this->load->view('admin/layouts/main', $data);
    }
}
