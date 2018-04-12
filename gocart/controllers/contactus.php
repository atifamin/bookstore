<?php

class Contactus extends Front_Controller {
	public function __construct(){
		parent::__construct();
		$customer = $this->go_cart->customer(); 
		if($customer['id']==''){redirect(site_url());}
	}
	function sendemail(){  
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$phone = $this->input->post('phone');
		$company = $this->input->post('company');
		$address = $this->input->post('address');
		$citystatezip = $this->input->post('citystatezip');
		$email = $this->input->post('email');
		$regarding = $this->input->post('regarding');
		if($first_name==''){
			echo '<div class="alert-error">First Name is required.</div>';
		}elseif($last_name==''){
			echo '<div class="alert-error">Last Name is required.</div>';
		}elseif($phone==''){
			echo '<div class="alert-error">Phone Number is required.</div>';
		}elseif($email==''){
			echo '<div class="alert-error">Email is required.</div>';
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		    echo '<div class="alert-error">Invalid Email.</div>';
		}else{
			$email_message = '
				<strong>FirstName: </strong>'.$first_name.'<br />
				<strong>LastName: </strong>'.$last_name.'<br />
				<strong>Phone: </strong>'.$phone.'<br />
				<strong>Company: </strong>'.$company.'<br />
				<strong>Address: </strong>'.$address.'<br />
				<strong>City, State, Zip: </strong>'.$citystatezip.'<br />
				<strong>Email: </strong>'.$email.'<br />
				<strong>Regarding: </strong>'.$regarding.'<br />
			';
			$email_subject = 'Contact Us | RRI';
			$from = $email;
			$to = config_item('email');//'shahbilal512@gmail.com';
			$config=array(
			'charset'=>'utf-8',
			'wordwrap'=> TRUE,
			'mailtype' => 'html'
			);
			$this->load->library('email',$config);
			$this->email->initialize($config);			  
			$this->email->from($from, ' | RRI Contact Us');
			$this->email->to($to);
			$this->email->subject($email_subject);
			$this->email->message($email_message);
			$this->email->send();
			$this->email->print_debugger();
			
			echo '<div class="alert-success">Thank you for contacting Responsive Respiratory, someone will contact you soon regarding your inquiry</div>';
		}
	}
	
	
}