<?php

function theme_url($uri)
{
	$CI =& get_instance();
	return $CI->config->base_url('gocart/themes/'.config_item('theme').'/'.$uri);
}

//to generate an image tag, set tag to true. you can also put a string in tag to generate the alt tag
function theme_img($uri, $tag=false)
{
	if($tag)
	{
		return '<img src="'.theme_url('assets/img/'.$uri).'" alt="'.$tag.'">';
	}
	else
	{
		return theme_url('assets/img/'.$uri);
	}
	
}

function theme_js($uri, $tag=false)
{
	if($tag)
	{
		return '<script type="text/javascript" src="'.theme_url('assets/js/'.$uri).'"></script>';
	}
	else
	{
		return theme_url('assets/js/'.$uri);
	}
}

//you can fill the tag field in to spit out a link tag, setting tag to a string will fill in the media attribute
function theme_css($uri, $tag=false)
{
	if($tag)
	{
		$media=false;
		if(is_string($tag))
		{
			$media = 'media="'.$tag.'"';
		}
		return '<link href="'.theme_url('assets/css/'.$uri).'" type="text/css" rel="stylesheet" '.$media.'/>';
	}
	
	return theme_url('assets/css/'.$uri);
}

function isAllowed($url){
	$ci=& get_instance();
	$ci->load->database();
	
	//getting userSessionData
	$userSessionData = $ci->session->userdata("admin");
	$userId = $userSessionData['id'];
	
	//getting user role from gc_admin
	$userResult = $ci->db->where("id", $userId)->get("gc_admin")->row();
	$roleId = $userResult->role_id;
	
	//if logged in user is admin than it should return true in every request
	if($roleId==-1){
		return TRUE;
	}
	//getting roles by role id
	$roles	=	$ci->db->select("GAM.*")
						->from("gc_admin_roles AS GAR")
						->join("gc_admin_role_menus AS GARM", "GARM.role_id = GAR.role_id")
						->join("gc_admin_menus AS GAM", "GAM.menu_id = GARM.menu_id")
						->where("GAR.role_id", $roleId)
						->get()
						->result();
	
	$rolesArray = array();
	foreach($roles as $role){
		$rolesArray[] = $role->menu_route;
	}
	
	if(in_array($url, $rolesArray)){
		return TRUE;
	}else{
		return FALSE;
	}
}