<?php

class Calculator extends Front_Controller {
	public function __construct(){
		parent::__construct();
		$customer = $this->go_cart->customer(); 
		if($customer['id']==''){redirect(site_url());}
	}
	function index()
	{
		$data['calculator']= true;
		$this->view('calculator', $data);
	}
	
}