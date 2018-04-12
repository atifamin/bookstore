<?php

class Publishers extends Admin_Controller { 
    
    function __construct()
    {       
        parent::__construct();
		$this->admin = $this->session->userdata("admin");
		//$this->auth->check_access('Admin', true);
		$this->load->model('Common_model');
    }
    
    function index(){
        $data['page_title'] = 'Publishers';
        $data['publishers'] = $this->Common_model->listingResult("gc_publishers");
        
        $this->view($this->config->item('admin_folder').'/publishers', $data);
    }
	
	function form($id=FALSE){
		$data['id'] = $id;
		if($id){
			$data['publisherData'] = $this->Common_model->listingRow("publisherId",$id,"gc_publishers");
			$data['page_title'] = 'Update Publisher';
		}else{
			$data['page_title'] = 'Add Publisher';
		}
       
       $this->view($this->config->item('admin_folder').'/publisher_form', $data); 
    }
	
	function insert($id=FALSE){
		$slug	= $this->common_model->slug($this->input->post("publisherName"), "gc_publishers");
		//$slug	= url_title(convert_accented_characters($this->input->post("publisherName")), 'dash', TRUE);
		$data = array(
			"publisherName"	=>	$this->input->post("publisherName"),
			"createdById"	=>	$this->admin['id'],
			"slug"          => 	$slug,
			"created_at"	=>	date("Y-m-d h:i:s"),
			"updated_at"	=>	date("Y-m-d h:i:s"),
		);
		if($id){
			$this->Common_model->updateQuery("gc_publishers", "publisherId", $id, $data);
			$this->session->set_flashdata('success', "<strong>Success!</strong> You have updated a publisher.");
			redirect("admin/publishers");
		}else{
			$this->Common_model->insertQuery("gc_publishers", $data);
			$this->session->set_flashdata('success', "<strong>Success!</strong> You have added a publisher.");
			redirect("admin/publishers/form");
		}
		
	}
	
	function delete($id){
		$usedInBooks = $this->Common_model->listingRow("publisherId",$id,"gc_products");
		if(count($usedInBooks)>0){
			$this->session->set_flashdata('error1', "<strong>Error!</strong> This publisher cannot be deleted because it associated with some books.");
			return redirect("admin/publishers");
		}
		
		$status = $this->Common_model->delete("gc_publishers", array("publisherId"=>$id));
		if($status){
			$this->session->set_flashdata('error1', "<strong>Deleted!</strong> You have deleted a publisher.");
			redirect("admin/publishers");
		}
	}
	
}