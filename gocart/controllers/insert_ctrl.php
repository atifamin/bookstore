<?php

class insert_ctrl extends Front_Controller {

	function __construct() {
parent::__construct();
$this->load->model('insert_model');
}

	
	function index()
	{
		$this->load->view('account');
		
		$data = array(
		'email' => $this->input->post('email'),
		'phone' => $this->input->post('phone'),
		'address1' => $this->input->post('add'),
		'address2' => $this->input->post('badd')
		);
			$this->insert_model->form_insert($data);
		
		
	}
	
	
	
}