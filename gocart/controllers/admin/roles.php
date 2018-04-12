<?php

class Roles extends Admin_Controller { 
    
    function __construct()
    {       
        parent::__construct();
		$this->admin = $this->session->userdata("admin");
		//$this->auth->check_access('Admin', true);
		$this->load->model('Common_model');
    }
    
    function index(){
        $data['page_title'] = 'Roles';
        $data['roles'] = $this->Common_model->listingResult("gc_admin_roles");
        
        $this->view($this->config->item('admin_folder').'/roles', $data);
    }
	
	function form($id=FALSE){
		$data['id'] = $id;
		if($id){
			$data['roleData'] = $this->Common_model->listingRow("role_id",$id,"gc_admin_roles");
			$allExistingUserRoles = $this->Common_model->listingResultWhere("role_id",$id,"gc_admin_role_menus");
			
			if(count($allExistingUserRoles)>0){
				$rowData = array();
				foreach($allExistingUserRoles as $row){
					$rowData[] = $row->menu_id;
				}
				$data['alExistingUserRoles'] = $rowData;
			}else{
				$data['alExistingUserRoles'] = array();
			}
			
			
			//echo "<pre>"; print_r($data['alExistingUserRoles']); exit;
			$data['page_title'] = 'Update Role';
		}else{
			$data['page_title'] = 'Add Role';
		}
		$data["mainRoles"] = $this->Common_model->listingResultWhere("parent_id",0,"gc_admin_menus");
		//print_r($data["mainRoles"]); exit;
		$this->view($this->config->item('admin_folder').'/role_form', $data); 
    }
	
	function insert($id=FALSE){
		$menus = $this->input->post("roles");
		//echo "<pre>"; print_r(); exit;
		$data = array(
			"role_name"		=>	$this->input->post("role_name"),
		);
		if($id){
			$this->Common_model->updateQuery("gc_admin_roles", "role_id", $id, $data);
			
			$allExistingUserRoles = $this->Common_model->listingResultWhere("role_id",$id,"gc_admin_role_menus");
			if(count($allExistingUserRoles)>0){
				$rowData = array();
				foreach($allExistingUserRoles as $row){
					$rowData[] = $row->menu_id;
				}
				$oldRoles = $rowData;
			}else{
				$oldRoles = array();
			}
			
			foreach($oldRoles as $oldRoles1){
				if(!in_array($oldRoles1, $menus)){
					$this->Common_model->delete("gc_admin_role_menus", array("menu_id"=>$oldRoles1));
				}
			}
			
			foreach($menus as $menuId){
				if(!in_array($menuId, $oldRoles)){
					$adminRoleMenusData = array(
						"role_id"		=>	$id,
						"menu_id"		=>	$menuId
					);
					$this->Common_model->insertQuery("gc_admin_role_menus", $adminRoleMenusData);
				}
			}
			
			$this->session->set_flashdata('success', "<strong>Success!</strong> You have updated a role.");
			redirect("admin/roles");
		}else{
			$roleId = $this->Common_model->insertGetIDQuery("gc_admin_roles", $data);
			
			foreach($menus as $menu){
				$adminRoleMenusData = array(
					"role_id"		=>	$roleId,
					"menu_id"		=>	$menu
				);
				$this->Common_model->insertQuery("gc_admin_role_menus", $adminRoleMenusData);
			}
			$this->session->set_flashdata('success', "<strong>Success!</strong> You have added a role.");
			redirect("admin/roles/form");
		}
		
	}
	
	function delete($id){
		$usedInBooks = $this->Common_model->listingRow("role_id",$id,"gc_admin_roles");
		if(count($usedInBooks)>0){
			$this->session->set_flashdata('error1', "<strong>Error!</strong> This role cannot be deleted because it associated with some user.");
			return redirect("admin/roles");
		}
		
		$status = $this->Common_model->delete("gc_admin_roles", array("role_id"=>$id));
		if($status){
			$this->session->set_flashdata('error1', "<strong>Deleted!</strong> You have deleted a role.");
			redirect("admin/roles");
		}
	}
	
}