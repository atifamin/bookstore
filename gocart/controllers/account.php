<?php

class Account extends Front_Controller {
	public function __construct(){
		parent::__construct();
		$customer = $this->go_cart->customer(); 
		if($customer['id']==''){redirect(site_url());}
	}
	function index()
	{ 
		$customer = $this->go_cart->customer(); 
		$this->load->model('User_model');
		$data['user_data']   = $this->User_model->user_detail_all($customer['id']); 
		$data['useraddresses'] = $this->customer_model->getCustomerAddresses($customer['id']);
		$data['getCustomerOrders'] = $this->order_model->getCustomerOrders($customer['id'],2); 
		$data['getAllStates'] = $this->customer_model->getStatesOfCountry(223);  
		$data['account']= true;
		$this->view('account', $data);
	}
	function my_adress(){ 
		$this->load->helper('form');
		$this->view('account');
		$this->load->model('customer_model');
		$data = array(
		'email' => $this->input->post('email'),
		'phone' => $this->input->post('phone'),
		'address1' => $this->input->post('add'),
		'address2' => $this->input->post('badd')
		); 
		$this->customer_model->insert_into_db($data);
		

	}
	
	function addnewlocation(){
		$customer = $this->go_cart->customer(); 
		$data['customer_id'] = $customer['id'];
		$data['business_name'] = $this->input->post('business_name');
		$data['address1'] = $this->input->post('address1');
		$data['address2'] = $this->input->post('address2');
		$data['city'] = $this->input->post('city');
		$data['state'] = $this->input->post('state');
		$data['zip'] = $this->input->post('zip');
		$data['phone'] = $this->input->post('phone');
		$data['email'] = $this->input->post('email');
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->customer_model->add('gc_customer_addresses',$data);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function setasdefault($AddressID){
		$customer = $this->go_cart->customer(); 
		$this->customer_model->setasdefaultaddress($customer['id'],$AddressID);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function markAsTempDefault(){
		$AddressID = $this->input->post('addressid');
		$customer = $this->go_cart->customer(); 
		$this->customer_model->setasTempdefaultaddress($customer['id'],$AddressID);
		echo '<script type="text/javascript">$(document).ready(function(){window.location="'.site_url('cart/view_cart').'?SubmitForm=Yes";});</script>';
	}
	
	function deleteaddress($AddressID){
		$this->customer_model->deleteaddress($AddressID);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function editaddress(){
		$AddressID = $this->input->post('addressid');
		$data['address'] = $this->customer_model->listingSingleWhere('id',$AddressID,'gc_customer_addresses');
		$data['getAllStates'] = $this->customer_model->getStatesOfCountry(223);  
		$this->load->view('edit-address-popup',$data);
	}
	
	function updatelocation(){
		$AddressID = $this->input->post('addressid');
		$data['business_name'] = $this->input->post('business_name');
		$data['address1'] = $this->input->post('address1');
		$data['address2'] = $this->input->post('address2');
		$data['city'] = $this->input->post('city');
		$data['state'] = $this->input->post('state');
		$data['zip'] = $this->input->post('zip');
		$data['phone'] = $this->input->post('phone');
		$data['email'] = $this->input->post('email');
		$data['updated_at'] = date('Y-m-d H:i:s');
		$this->customer_model->edit('id',$AddressID,'gc_customer_addresses',$data);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function addressDetail($AddressID){ 
		$customer = $this->go_cart->customer();
		$this->load->model('User_model');
		$this->load->model('Location_model');
		$data['user_data']   = $this->User_model->user_detail($customer['id']); 
		$data['Favourites'] = $this->customer_model->getFavouriteProducts($customer['id']);
		$data['AddressDetail'] = $this->customer_model->getAddressDetail($AddressID);
		$data['getRecentOrders'] = $this->order_model->getCustomerOrders($customer['id'],4); 
		$data['state'] = $this->Location_model->get_zone($data['AddressDetail']->state);
		$data['addressDetail']= true;
		$this->view('addressDetail', $data);
	}
	
	function add_additional_checkout_features(){
		$aacf = array();
		$aacf['po_number'] 				 = $this->input->post('pono');
		$aacf['additional_instructions'] = $this->input->post('add_inst');
		$this->session->set_userdata('AdditionalInformation', $aacf);
		echo 'Ok';
	}
	
	function resetpassword(){
		$this->load->view('reset-password');
	}
	function updatepassword(){
		$Password = $this->input->post('newpass');
		$customer = $this->go_cart->customer();
		$CustomerID = $customer['id'];
		$data['password'] = sha1($Password);
		$data['password_no_hash'] = $Password;
		$this->customer_model->edit('id',$CustomerID,'gc_customers',$data);
		echo '<div class="passwordupdateres">Your Password Updated Successfully!</div><div style="clear:both;height:30px;"></div>';
	}
	
}