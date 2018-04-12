<?php

class Favourites extends Front_Controller {
	public function __construct(){
		parent::__construct();
		$customer = $this->go_cart->customer(); 
		if($customer['id']==''){redirect(site_url());}
	}
	function index()
	{		 
		
		$customer = $this->go_cart->customer(); 
		$this->load->model('User_model');
		$data['Favourites'] = $this->customer_model->getFavouriteProducts($customer['id']);
		$data['favourites']= true;
		$this->view('favourites', $data);
	}
	function addfavourite(){
		$ProductID = $this->input->post('productid'); 
		$customer  = $this->go_cart->customer(); 
		$data['customer_id'] = $customer['id'];
		$data['product_id']  = $ProductID;
		$data['created_at']  = date('Y-m-d H:i:s');
		$this->customer_model->add('gc_favourites',$data);
		
		echo '<a style="color:#E0245E;" class="glyph font-icon-link-2" onclick="removeFromFavourite('.$ProductID.')" title="Remove From Favorites"><i class="coffeecup-icons-heart4"></i></a>';
	}
	function removefavourite(){
		$ProductID = $this->input->post('productid');
		$customer  = $this->go_cart->customer(); 
		$CustomerID = $customer['id']; 
		$this->customer_model->deletefavourite($ProductID,$CustomerID);
		
		echo '<a class="glyph font-icon-link-2" onclick="addToFavourite('.$ProductID.')" title="Remove From Favorites"><i class="coffeecup-icons-heart4"></i></a>';
	}
	
	
}