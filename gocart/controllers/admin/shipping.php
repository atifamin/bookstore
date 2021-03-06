<?php

class Shipping extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();

		//$this->auth->check_access('Admin', true);
		$this->load->model('Settings_model');
		$this->lang->load('settings');
		$this->load->helper('inflector');
	}
	
	function index()
	{
		//now time to do it again with shipping
        $shipping_order     = $this->Settings_model->get_settings('shipping_order');
        $enabled_modules    = $this->Settings_model->get_settings('shipping_modules');
        
        $data['shipping_modules']   = array();
        //create a list of available shipping modules
        if ($handle = opendir(APPPATH.'packages/shipping/')) {
            while (false !== ($file = readdir($handle)))
            {
                //now we eliminate anything with periods
                if (!strstr($file, '.'))
                {
                    //also, set whether or not they are installed according to our shipping settings
                    if(array_key_exists($file, $enabled_modules))
                    {
                        $data['shipping_modules'][$file]    = true;
                    }
                    else
                    {
                        $data['shipping_modules'][$file]    = false;
                    }
                }
            }
            closedir($handle);
        }

        $data['page_title'] = lang('common_shipping_modules');
        $this->view($this->config->item('admin_folder').'/shipping_modules', $data);
	}
	
	function install($module)
	{
		//setup the third_party package
		$this->load->add_package_path(APPPATH.'packages/shipping/'.$module.'/');
		$this->load->library($module);
		
		$enabled_modules	= $this->Settings_model->get_settings('shipping_modules');
		
		if(!array_key_exists($module, $enabled_modules))
		{
			$this->Settings_model->save_settings('shipping_modules', array($module=>false));
			
			//run install script
			$this->$module->install();
		}
		else
		{
			$this->Settings_model->delete_setting('shipping_modules', $module);
			$this->$module->uninstall();
		}
		redirect($this->config->item('admin_folder').'/shipping');
	}
	
	//this is an alias of install
	function uninstall($module)
	{
		$this->install($module);
	}
	
	function settings($module)
	{
		$this->load->helper('form');
		$this->load->add_package_path(APPPATH.'packages/shipping/'.$module.'/');
		$this->load->library($module);
		
		//ok, in order for the most flexibility, and in case someone wants to use javascript or something
		//the form gets pulled directly from the library.
	
		if(count($_POST) >0)
		{
			$check	= $this->$module->check();
			if(!$check)
			{
				$this->session->set_flashdata('message', sprintf(lang('settings_updated'), $module));
				redirect($this->config->item('admin_folder').'/shipping');
			}
			else
			{
				//set the error data and form data in the flashdata
				$this->session->set_flashdata('message', $check);
				$this->session->set_flashdata('post', $_POST);
				redirect($this->config->item('admin_folder').'/shipping/settings/'.$module);
			}
		}
		elseif($this->session->flashdata('post'))
		{
			$data['form']		= $this->$module->form($this->session->flashdata('post'));
		}
		else
		{
			$data['form']		= $this->$module->form();
		}
		$data['module']		= $module;
		$data['page_title']	= sprintf(lang('shipping_settings'), humanize($module));
		$this->view($this->config->item('admin_folder').'/shipping_module_settings', $data);
	}
}
