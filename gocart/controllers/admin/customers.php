<?php

class Customers extends Admin_Controller {

	//this is used when editing or adding a customer
	var $customer_id	= false;	

	function __construct()
	{		
		parent::__construct();

		$this->load->model(array('Customer_model', 'Location_model'));
		$this->load->helper('formatting_helper');
		$this->lang->load('customer');
		
	}
	
	function index($field='lastname', $by='ASC', $page=0)
	{
		//we're going to use flash data and redirect() after form submissions to stop people from refreshing and duplicating submissions
		//$this->session->set_flashdata('message', 'this is our message');
		
		$data['page_title']	= lang('customers');
		$data['customers']	= $this->Customer_model->get_customers(50,$page, $field, $by);
		
		$this->load->library('pagination');

		$config['base_url']		= base_url().'/'.$this->config->item('admin_folder').'/customers/index/'.$field.'/'.$by.'/';
		$config['total_rows']	= $this->Customer_model->count_customers();
		$config['per_page']		= 50;
		$config['uri_segment']	= 6;
		$config['first_link']		= 'First';
		$config['first_tag_open']	= '<li>';
		$config['first_tag_close']	= '</li>';
		$config['last_link']		= 'Last';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';

		$config['full_tag_open']	= '<div class="pagination"><ul>';
		$config['full_tag_close']	= '</ul></div>';
		$config['cur_tag_open']		= '<li class="active"><a href="#">';
		$config['cur_tag_close']	= '</a></li>';
		
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		
		$config['prev_link']		= '&laquo;';
		$config['prev_tag_open']	= '<li>';
		$config['prev_tag_close']	= '</li>';

		$config['next_link']		= '&raquo;';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		
		$this->pagination->initialize($config);
		
		
		$data['page']	= $page;
		$data['field']	= $field;
		$data['by']		= $by;
		
		$this->view($this->config->item('admin_folder').'/customers', $data);
	}
	
	function export_xml()
	{
		$data['customers'] = (array)$this->Customer_model->get_customers();
		
		$this->load->helper('download_helper');
		force_download_content('customers.xml',	
		$this->load->view($this->config->item('admin_folder').'/customers_xml', $data, true));
	}
	function my_adress(){
		//echo '<pre>'; print_r($_POST);exit;
		
		$this->load->helper('form');
		
		$this->load->model('customer_model');
		$data = array(
		'email' => $this->input->post('email'),
		'phone' => $this->input->post('phone'),
		'address1' => $this->input->post('add'),
		'address2' => $this->input->post('badd')
		);
		//echo'<pre>'; print_r($data['email']); exit;
		
		$this->customer_model->insert_into_db($data);
		redirect($_SERVER['HTTP_REFFERER']);

	}

	function form($id = false)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['page_title']		= lang('customer_form');
		$data['action']=site_url('admin/customers/form');
		
		//default values are empty if the customer is new
		$data['id']					= '';
		$data['group_id']			= '';
		$data['username']			= '';
		$data['firstname']			= '';
		$data['lastname']			= '';
		$data['email']				= '';
		$data['phone']				= '';
		$data['company']			= '';
		$data['email_subscribe']	= '';
		$data['active']				= false;
		
		
		// get group list
		$groups = $this->Customer_model->get_groups();
		foreach($groups as $group)
		{
			$group_list[$group->id] = $group->name;
		}
		
		$data['group_list'] = $group_list;
		//$config['protocol']='smtp';
		//$config['smtp_host']='ssl://smtp.gmail.com';
		//$config['smtp_port']=465;
		//$config['smtp_user']='@gmail.com';
		//$config['smtp_pass']='';
		//$config['charset']='iso-8859-1';
		//$config['newline']="\r\n";
		//$config['mailtype']='text';
		//$config['validation']=true;
		//$name=$this->input->post('firstname');
		//$pasword=$this->input->post('password');
		//$phone=$this->input->post('phone');
		//$this->load->library('email',$config);
		//$this->email->from('from@gmail.com','Suffian Shah');
		//$this->email->to($this->input->post('email'));
		//$this->email->subject('Your Detail is here');
		//$msg = 'Dear '.$name.',  Your Password is '.$pasword.'  and your phone number is '.$phone.'';
		//$this->email->message($msg);
		
	//if($this->email->send())
		//{
			//echo "send Seccesfully";
		//}
		//else
		//{
			//$this->session->set_flashdata("email_sent","Error in sending Email.");
		//} 
		$OrignalPassword = $this->input->post('password');
		if ($id)
		{	
			$this->customer_id	= $id;
			$customer		= $this->Customer_model->get_customer($id);
			//if the customer does not exist, redirect them to the customer list with an error
			if (!$customer)
			{
				$this->session->set_flashdata('error', lang('error_not_found'));
				redirect($this->config->item('admin_folder').'/customers');
			}
			
			//set values to db values
			$data['id']					= $customer->id;
			$data['group_id']			= $customer->group_id;
			$data['firstname']			= $customer->firstname;
			$data['username']			= $customer->username;
			$data['lastname']			= $customer->lastname;
			$data['email']				= $customer->email;
			$data['phone']				= $customer->phone;
			$data['company']			= $customer->company;
			$data['active']				= $customer->active;
			$data['email_subscribe']	= $customer->email_subscribe;
			
		}
		
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('firstname', 'lang:firstname', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('lastname', 'lang:lastname', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email|max_length[128]|callback_check_email');
		$this->form_validation->set_rules('phone', 'lang:phone', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('company', 'lang:company', 'trim|max_length[128]');
		$this->form_validation->set_rules('active', 'lang:active');
		$this->form_validation->set_rules('group_id', 'group_id', 'numeric');
		$this->form_validation->set_rules('email_subscribe', 'email_subscribe', 'numeric|max_length[1]');
		
		//if this is a new account require a password, or if they have entered either a password or a password confirmation
		if ($this->input->post('password') != '' || $this->input->post('confirm') != '' || !$id)
		{
			$this->form_validation->set_rules('password', 'lang:password', 'required|min_length[6]|sha1');
			$this->form_validation->set_rules('confirm', 'lang:confirm_password', 'required|matches[password]');
		}
		
				
		if ($this->form_validation->run() == FALSE)
		{
			$this->view($this->config->item('admin_folder').'/customer_form', $data);
		}
		else
		{
			$save['id']		= $id;
			$save['group_id'] 	= $this->input->post('group_id');
			$save['username'] 	= $this->input->post('username');
			$save['firstname']	= $this->input->post('firstname');
			$save['lastname']	= $this->input->post('lastname');
			$save['email']		= $this->input->post('email');
			$save['phone']		= $this->input->post('phone');
			$save['company']	= $this->input->post('company');
			$save['active']		= $this->input->post('active');
			$save['email_subscribe'] = $this->input->post('email_subscribe');

			
			if ($this->input->post('password') != '' || !$id)
			{
				$save['password']	= $this->input->post('password');
			}
			
			$this->Customer_model->save($save);
			
			$this->session->set_flashdata('message', lang('message_saved_customer'));
			
			// Send Welcome Email
			$EM = $this->Customer_model->listingSingleWhere('id',6,'gc_canned_messages');
			$EM_Subject = $EM->subject;
			$EM_Message = $EM->content; 
			
			$Sub1 = str_replace('{first_name}',$this->input->post('firstname'),$EM_Subject);
			$Sub1 = str_replace('{last_name}',$this->input->post('lastname'),$Sub1);
			$Sub1 = str_replace('{email}',$this->input->post('email'),$Sub1);
			$Sub1 = str_replace('{password}',$OrignalPassword,$Sub1);
			
			$Mes1 = str_replace('{first_name}',$this->input->post('firstname'),$EM_Message);
			$Mes1 = str_replace('{last_name}',$this->input->post('lastname'),$Mes1);
			$Mes1 = str_replace('{email}',$this->input->post('email'),$Mes1);
			$Mes1 = str_replace('{password}',$OrignalPassword,$Mes1);		
			$this->sendEmailtoNewCustomer($this->input->post('email'),'info@rrioxygen.com',$Sub1,$Mes1);
			
			////////////////////////////////
			
			//go back to the customer list
			redirect($this->config->item('admin_folder').'/customers');
		}
	}
	
	function sendEmailtoNewCustomer($To,$From,$Subject,$Message){ 
		$email_message = $Message;
		$email_subject = $Subject; 
		$from = $From;
		$to = $To;//'leeaads@gmail.com';
		$config=array(
		'charset'=>'utf-8',
		'wordwrap'=> TRUE,
		'mailtype' => 'html'
		);
		$this->load->library('email',$config);
		$this->email->initialize($config);			  
		$this->email->from($from, 'RESPONSIVE RESPIRATORY INC');
		$this->email->to($to);  
		$this->email->subject($email_subject);		 
		$this->email->message($email_message);
		$this->email->send();
	}
	
	function addresses($id = false)
	{
		$data['customer']		= $this->Customer_model->get_customer($id);

		//if the customer does not exist, redirect them to the customer list with an error
		if (!$data['customer'])
		{
			$this->session->set_flashdata('error', lang('error_not_found'));
			redirect($this->config->item('admin_folder').'/customers');
		}
		
		$data['addresses'] = $this->Customer_model->get_address_list($id);
		
		$data['page_title']	= sprintf(lang('addresses_for'), $data['customer']->firstname.' '.$data['customer']->lastname);
		
		$this->view($this->config->item('admin_folder').'/customer_addresses', $data);
	}
	
	function delete($id = false)
	{
		if ($id)
		{	
			$customer	= $this->Customer_model->get_customer($id);
			//if the customer does not exist, redirect them to the customer list with an error
			if (!$customer)
			{
				$this->session->set_flashdata('error', lang('error_not_found'));
				redirect($this->config->item('admin_folder').'/customers');
			}
			else
			{
				//if the customer is legit, delete them
				$delete	= $this->Customer_model->delete($id);
				
				$this->session->set_flashdata('message', lang('message_customer_deleted'));
				redirect($this->config->item('admin_folder').'/customers');
			}
		}
		else
		{
			//if they do not provide an id send them to the customer list page with an error
			$this->session->set_flashdata('error', lang('error_not_found'));
			redirect($this->config->item('admin_folder').'/customers');
		}
	}
	
	//this is a callback to make sure that customers are not sharing an email address
	function check_email($str)
	{
		$email = $this->Customer_model->check_email($str, $this->customer_id);
        	if ($email)
        	{
			$this->form_validation->set_message('check_email', lang('error_email_in_use'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function order_list($status = false)
	{
		//we're going to use flash data and redirect() after form submissions to stop people from refreshing and duplicating submissions
		$this->load->model('Order_model');
		
		$data['page_title']	= 'Order List';
		$data['orders']		= $this->Order_model->get_orders($status);
		
		$this->view($this->config->item('admin_folder').'/order_list', $data);
	}
	
	
	// download email blast list (subscribers)
	function get_subscriber_list()
	{
		$subscribers = $this->Customer_model->get_subscribers();
		
		$sub_list = '';
		foreach($subscribers as $subscriber)
		{
			$sub_list .= $subscriber['email'].",\n";
		}
		
		$data['sub_list']	= $sub_list;
		
		$this->load->view($this->config->item('admin_folder').'/customer_subscriber_list', $data);
	}	
	
	//  customer groups
	function groups()
	{
		$data['groups']		= $this->Customer_model->get_groups();
		$data['page_title']	= lang('customer_groups');
		
		$this->view($this->config->item('admin_folder').'/customer_groups', $data);
	}
	
	function edit_group($id=0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['page_title']		= lang('customer_group_form');
		
		//default values are empty if the customer is new
		$data['id']				= '';
		$data['name']   		= '';
		$data['discount']		= '';
		$data['discount_type'] 	= '';
		
		if($id)
		{
			$group = $this->Customer_model->get_group($id);
			
			$data['id']				= $group->id;
			$data['name']   		= $group->name;
			$data['discount']		= $group->discount;
			$data['discount_type'] 	= $group->discount_type;
		}
		
		$this->form_validation->set_rules('name', 'lang:group_name', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('discount', 'lang:discount', 'trim|required|numeric');
		$this->form_validation->set_rules('discount_type', 'lang:discount_type', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->view($this->config->item('admin_folder').'/customer_group_form', $data);
		}
		else
		{
			
			if($id)
			{
				$save['id'] = $id;
			}
			
			$save['name'] 			= set_value('name');
			$save['discount'] 		= set_value('discount');
			$save['discount_type']	= set_value('discount_type');
			
			$this->Customer_model->save_group($save);
			$this->session->set_flashdata('message', lang('message_saved_group'));
			
			//go back to the customer group list
			redirect($this->config->item('admin_folder').'/customers/groups');
		}
	}
	
	
	function get_group()
	{
		$id = $this->input->post('id');
		
		if(empty($id)) return;
		
		echo json_encode($this->Customer_model->get_group($id));
	}
	
	
	function delete_group($id)
	{
		
		if(empty($id))
		{
			return;
		}
		
		$this->Customer_model->delete_group($id);
		
		//go back to the customer list
		redirect($this->config->item('admin_folder').'/customers/groups');
	}
	
	function address_list($customer_id)
	{
		$data['address_list'] = $this->Customer_model->get_address_list($customer_id);
		
		$this->view($this->config->item('admin_folder').'/address_list', $data);
	}
	
	function address_form($customer_id, $id = false)
	{
		$data['id']				= $id;
		$data['company']		= '';
		$data['firstname']		= '';
		$data['lastname']		= '';
		$data['email']			= '';
		$data['phone']			= '';
		$data['address1']		= '';
		$data['address2']		= '';
		$data['city']			= '';
		$data['country_id']		= '';
		$data['zone_id']		= '';
		$data['zip']			= '';
		
		$data['customer_id']	= $customer_id;
		
		$data['page_title']		= lang('address_form');
		//get the countries list for the dropdown
		$data['countries_menu']	= $this->Location_model->get_countries_menu();
		
		if($id)
		{
			$address			= $this->Customer_model->get_address($id);
			
			//fully escape the address
			form_decode($address);
			
			//merge the array
			$data				= array_merge($data, $address);
			
			$data['zones_menu']	= $this->Location_model->get_zones_menu($data['country_id']);
		}
		else
		{
			//if there is no set ID, the get the zones of the first country in the countries menu
			$data['zones_menu']	= $this->Location_model->get_zones_menu(array_shift(array_keys($data['countries_menu'])));
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('company', 'lang:company', 'trim|max_length[128]');
		$this->form_validation->set_rules('firstname', 'lang:firstname', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('lastname', 'lang:lastname', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email|max_length[128]');
		$this->form_validation->set_rules('phone', 'lang:phone', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('address1', 'lang:address', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('address2', 'lang:address', 'trim|max_length[128]');
		$this->form_validation->set_rules('city', 'lang:city', 'trim|required');
		$this->form_validation->set_rules('country_id', 'lang:country', 'trim|required');
		$this->form_validation->set_rules('zone_id', 'lang:state', 'trim|required');
		$this->form_validation->set_rules('zip', 'lang:zip', 'trim|required|max_length[32]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->view($this->config->item('admin_folder').'/customer_address_form', $data);
		}
		else
		{
			
			$a['customer_id']				= $customer_id; // this is needed for new records
			$a['id']						= (empty($id))?'':$id;
			$a['field_data']['company']		= $this->input->post('company');
			$a['field_data']['firstname']	= $this->input->post('firstname');
			$a['field_data']['lastname']	= $this->input->post('lastname');
			$a['field_data']['email']		= $this->input->post('email');
			$a['field_data']['phone']		= $this->input->post('phone');
			$a['field_data']['address1']	= $this->input->post('address1');
			$a['field_data']['address2']	= $this->input->post('address2');
			$a['field_data']['city']		= $this->input->post('city');
			$a['field_data']['zip']			= $this->input->post('zip');
			
			
			$a['field_data']['zone_id']		= $this->input->post('zone_id');
			$a['field_data']['country_id']	= $this->input->post('country_id');
			
			$country	= $this->Location_model->get_country($this->input->post('country_id'));
			$zone		= $this->Location_model->get_zone($this->input->post('zone_id'));
			
			$a['field_data']['zone']			= $zone->code;  // save the state for output formatted addresses
			$a['field_data']['country']			= $country->name; // some shipping libraries require country name
			$a['field_data']['country_code']	= $country->iso_code_2; // some shipping libraries require the code 
			
			$this->Customer_model->save_address($a);
			$this->session->set_flashdata('message', lang('message_saved_address'));
			
			redirect($this->config->item('admin_folder').'/customers/addresses/'.$customer_id);
		}
	}
	
	
	function delete_address($customer_id = false, $id = false)
	{
		if ($id)
		{	
			$address	= $this->Customer_model->get_address($id);
			//if the customer does not exist, redirect them to the customer list with an error
			if (!$address)
			{
				$this->session->set_flashdata('error', lang('error_address_not_found'));
				
				if($customer_id)
				{
					redirect($this->config->item('admin_folder').'/customers/addresses/'.$customer_id);
				}
				else
				{
					redirect($this->config->item('admin_folder').'/customers');
				}
				
			}
			else
			{
				//if the customer is legit, delete them
				$delete	= $this->Customer_model->delete_address($id, $customer_id);				
				$this->session->set_flashdata('message', lang('message_address_deleted'));
				
				if($customer_id)
				{
					redirect($this->config->item('admin_folder').'/customers/addresses/'.$customer_id);
				}
				else
				{
					redirect($this->config->item('admin_folder').'/customers');
				}
			}
		}
		else
		{
			//if they do not provide an id send them to the customer list page with an error
			$this->session->set_flashdata('error', lang('error_address_not_found'));
			
			if($customer_id)
			{
				redirect($this->config->item('admin_folder').'/customers/addresses/'.$customer_id);
			}
			else
			{
				redirect($this->config->item('admin_folder').'/customers');
			}
		}
	}
	
}