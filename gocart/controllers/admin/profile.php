<?php

class Profile extends Admin_Controller {

	function __construct()
	{
		parent::__construct();

		/*if($this->auth->check_access('Admin'))
		{
			redirect($this->config->item('admin_folder').'/orders');
		}*/
	}
	
	function index()
	{ 
		$UserD = $this->session->all_userdata();
		$UserID = $UserD['admin']['id']; 
		$data['page_title'] = 'Profile';
		$this->load->model('customer_model');
		$data['MngData'] = $this->customer_model->listingSingleWhere('id',$UserID,'gc_admin');
		$this->view($this->config->item('admin_folder').'/manager/profile', $data);
	}
	function updateprofile($id){ 
		
		$UserD = $this->session->all_userdata();
		$UserID = $UserD['admin']['id']; 
		$data['page_title'] = 'Profile';
		$this->load->model('customer_model');
		$data['MngData'] = $this->customer_model->listingSingleWhere('id',$UserID,'gc_admin');
	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('firstname', 'lang:firstname', 'trim|max_length[32]');
		$this->form_validation->set_rules('lastname', 'lang:lastname', 'trim|max_length[32]');
		$this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email|max_length[128]');
		$this->form_validation->set_rules('username', 'lang:username', 'trim|required|max_length[128]|callback_check_username'); 
		
		//if this is a new account require a password, or if they have entered either a password or a password confirmation
		if ($this->input->post('password') != '' || $this->input->post('confirm') != '' || !$id)
		{
			$this->form_validation->set_rules('password', 'lang:password', 'required|min_length[6]|sha1');
			$this->form_validation->set_rules('confirm', 'lang:confirm_password', 'required|matches[password]');
		}
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->view($this->config->item('admin_folder').'/manager/profile', $data);
		}
		else
		{
			$save['id']		= $id;
			$save['firstname']	= $this->input->post('firstname');
			$save['lastname']	= $this->input->post('lastname');
			$save['email']		= $this->input->post('email');
			$save['username']	= $this->input->post('username'); 
			
			if ($this->input->post('password') != '' || !$id)
			{
				$save['password']	= $this->input->post('password');
			}
			
			$this->auth->save($save);
			
			$this->session->set_flashdata('message', 'Profile Updated Successfully!');
			
			//go back to the customer list
			redirect($this->config->item('admin_folder').'/admin/orders');
		}
	}

}