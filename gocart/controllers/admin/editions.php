<?php

class Editions extends Admin_Controller { 
    
    function __construct()
    {       
        parent::__construct();
		$this->admin = $this->session->userdata("admin");
		//$this->auth->check_access('Admin', true);
		$this->load->model('Common_model');
    }
    
    function index(){
        $data['page_title'] = 'Editions';
        $data['editions'] = $this->Common_model->listingResult("gc_editions");
        
        $this->view($this->config->item('admin_folder').'/editions', $data);
    }
	
	function form($id=FALSE){
		$data['id'] = $id;
		if($id){
			$data['eidtionData'] = $this->Common_model->listingRow("editionId",$id,"gc_editions");
			$data['page_title'] = 'Update Edition';
		}else{
			$data['page_title'] = 'Add Edition';
		}
       
       $this->view($this->config->item('admin_folder').'/edition_form', $data); 
    }
	
	function insert($id=FALSE){
		$slug	= $this->common_model->slug($this->input->post("publisherName"), "gc_publishers");
		//$slug	= url_title(convert_accented_characters($this->input->post("publisherName")), 'dash', TRUE);
		$data = array(
			"editionName"	=>	$this->input->post("editionName"),
			"createdById"	=>	$this->admin['id'],
			"slug"          => 	$slug,
			"created_at"	=>	date("Y-m-d h:i:s"),
			"updated_at"	=>	date("Y-m-d h:i:s"),
		);
		if($id){
			$this->Common_model->updateQuery("gc_editions", "editionId", $id, $data);
			$this->session->set_flashdata('success', "<strong>Success!</strong> You have updated an edition.");
			redirect("admin/editions");
		}else{
			$this->Common_model->insertQuery("gc_editions", $data);
			$this->session->set_flashdata('success', "<strong>Success!</strong> You have added an edition.");
			redirect("admin/editions/form");
		}
		
	}
	
	function delete($id){
		$usedInBooks = $this->Common_model->listingRow("editionId",$id,"gc_products");
		if(count($usedInBooks)>0){
			$this->session->set_flashdata('error1', "<strong>Error!</strong> This edition cannot be deleted because it associated with some books.");
			return redirect("admin/editions");
		}
		
		$status = $this->Common_model->delete("gc_editions", array("editionId"=>$id));
		if($status){
			$this->session->set_flashdata('error1', "<strong>Deleted!</strong> You have deleted a edition.");
			redirect("admin/editions");
		}
	}
	
}