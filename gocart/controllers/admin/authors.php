<?php

class Authors extends Admin_Controller { 
    
    function __construct()
    {       
        parent::__construct();
		$this->admin = $this->session->userdata("admin");
		//$this->auth->check_access('Admin', true);
		$this->load->model('Common_model');
    }
    
    function index(){
        $data['page_title'] = 'Authors';
        $data['author'] = $this->Common_model->listingResult("gc_authors");
        
        $this->view($this->config->item('admin_folder').'/authors', $data);
    }
	
	function form($id=FALSE){
		$data['id'] = $id;
		if($id){
			$data['authorData'] = $this->Common_model->listingRow("authorId",$id,"gc_authors");
			$data['page_title'] = 'Update Author';
		}else{
			$data['page_title'] = 'Add Author';
		}
       
       $this->view($this->config->item('admin_folder').'/author_form', $data); 
    }
	
	function insert($id=FALSE){
		$slug	= $this->common_model->slug($this->input->post("publisherName"), "gc_publishers");
		//$slug	= url_title(convert_accented_characters($this->input->post("authorName")), 'dash', TRUE);
		$data = array(
			"authorName"	=>	$this->input->post("authorName"),
			"createdById"	=>	$this->admin['id'],
			"slug"          => 	$slug,
			"created_at"	=>	date("Y-m-d h:i:s"),
			"updated_at"	=>	date("Y-m-d h:i:s"),
		);
		if($id){
			$this->Common_model->updateQuery("gc_authors", "authorId", $id, $data);
			$this->session->set_flashdata('success', "<strong>Success!</strong> You have updated an author.");
			redirect("admin/authors");
		}else{
			$this->Common_model->insertQuery("gc_authors", $data);
			$this->session->set_flashdata('success', "<strong>Success!</strong> You have added an author.");
			redirect("admin/authors/form");
		}
		
	}
	
	function delete($id){
		$usedInBooks = $this->Common_model->listingRow("authorId",$id,"gc_products");
		if(count($usedInBooks)>0){
			$this->session->set_flashdata('error1', "<strong>Error!</strong> This author cannot be deleted because it associated with some books.");
			return redirect("admin/authors");
		}
		
		$status = $this->Common_model->delete("gc_authors", array("authorId"=>$id));
		if($status){
			$this->session->set_flashdata('error1', "<strong>Deleted!</strong> You have deleted an author.");
			redirect("admin/authors");
		}
	}
	
}