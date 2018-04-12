<?php

class Myorders extends Front_Controller {
	public function __construct(){
		parent::__construct();
		$customer = $this->go_cart->customer(); 
		if($customer['id']==''){redirect(site_url());}
	}
	function index()
	{		
		$customer = $this->go_cart->customer();  
		$data['getCustomerOrders'] = $this->order_model->getCustomerOrders($customer['id'],40); 
		$data['myorders']= true;
		$this->view('myorders', $data);
	}
	
	function orderDetail($OrderID){ 
		$data['getOrderDetail'] = $this->order_model->get_order($OrderID); 
		$data['orderdetail']= true;
		$this->view('orderdetail', $data);
	}
	
	
}