<?php

class Dashboard extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->admin = $this->session->userdata("admin");
		/*if($this->auth->check_access('Orders'))
		{
			redirect($this->config->item('admin_folder').'/orders');
		}*/
		
		$this->load->model('Order_model');
		$this->load->model('Customer_model');
		$this->load->helper('date');
		
		$this->lang->load('dashboard');
	}
	
	function index(){
		//echo "<pre>"; print_r($this->admin['id']); exit;
		//echo "<pre>"; print_r(); exit;
		//check to see if shipping and payment modules are installed
		$data['payment_module_installed']	= (bool)count($this->Settings_model->get_settings('payment_modules'));
		$data['shipping_module_installed']	= (bool)count($this->Settings_model->get_settings('shipping_modules'));
		
		$data['page_title']	=  lang('dashboard');
		
		// get 5 latest orders
		$UserD = $this->session->all_userdata();
		$AdminAccess = $UserD['admin']['access'];  
		$data['orders']	= $this->Order_model->get_orders(false, 'ordered_on' , 'DESC', 5,0,$AdminAccess);

		// get 5 latest customers
		$data['customers'] = $this->Customer_model->get_customers(5);
				
		
		$this->view($this->config->item('admin_folder').'/dashboard', $data);
	}

}