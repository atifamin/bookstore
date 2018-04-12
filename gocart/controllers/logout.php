<?php

class Logout extends Front_Controller {

	function logou()
	{
		$this->Customer_model->logout();
		redirect('secure/login');
	}
	
	
}