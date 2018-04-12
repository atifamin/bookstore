<?php

class Login extends Front_Controller{



	function index()
	{

		//we check if they are logged in, generally this would be done in the constructor, but we want to allow customers to log out still
	
		$this->load->view('login');
	}
	
	

}
