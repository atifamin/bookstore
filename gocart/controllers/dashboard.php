<?php

class Dashboard extends Front_Controller {
	public function __construct(){
		parent::__construct();
		$customer = $this->go_cart->customer(); 
		if($customer['id']==''){redirect(site_url());}
	}
	function index()
	{
		$data['gift_cards_enabled'] = $this->gift_cards_enabled;
		$data['homepage']			= true;
		$customer = $this->go_cart->customer();
		$this->load->model('User_model');
		$this->load->model('Location_model');
		$data['user_data']   = $this->User_model->user_detail($customer['id']);  
		$data['Favourites'] = $this->customer_model->getFavouriteProducts($customer['id']); 
		$data['useraddresses'] = $this->customer_model->listingAllWhere('customer_id',$customer['id'],'gc_customer_addresses');
		if(!empty($data['useraddresses']))
		{
			$data['userstate']=$this->Location_model->get_zone($data['useraddresses'][0]->state);
		}
		$data['getRecentOrders'] = $this->order_model->getCustomerOrders($customer['id'],4); 
		$this->view('homepage', $data);
		$data['account']= true;
	}
	
	
}