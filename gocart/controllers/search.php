<?php

class Search extends Front_Controller {

	function index()
	{
		$Search = $this->input->post('query');
		if($Search!=''){
			$this->load->model('Search_model');
			$data['items'] = $this->Search_model->searchItems($Search); 
			$data['search']= true;
			$this->view('search', $data);
		}else{
			redirect(site_url('dashboard'));
		}
	}
	
}