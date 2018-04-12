<?php 

class CurrencyExchangeRate extends Admin_Controller {
   /* function __construct()
	{
		parent::__construct();

		//$this->auth->check_access('Admin', true);
		$this->load->model('Settings_model');
		$this->lang->load('settings');
		$this->load->helper('inflector');
	}*/

public function index(){
  // echo "hello"; exit;
  

   $data['rate']= $this->common_model->listingResult('gc_currencies'); 
       
      
    
    $data['page_title'] = lang('common_currency');
    $this->view($this->config->item('admin_folder').'/currency_modules', $data);
}

function currencyRate(){
    $userdata = $this->session->userdata("admin");
    $userId = $userdata['id'];
   // echo "<pre>";print_r($userId);exit;
    //date("Y-m-d h:i:s");
    $symbol = $this->input->post("symbol");
    //print_r($symbol);exit;
    $value = $this->input->post("value");
       
    
  $data = array(
        "updated_by"   => $userId,
        "exchange_rate"	=>	$value,
    );
    $this->common_model->updateQuery('gc_currencies', "symbol",$symbol,$data);
   
    $allProducts = $this->common_model->listingResultWhere('currency_symbol',$symbol,"gc_products");
    if(count($allProducts)>0){
        foreach($allProducts as $row){
            $dataProducts = array(
                "price"=> ($row->price_base)*$value,
                "saleprice"=> ($row->saleprice_base)*$value,
            );
            $this->common_model->updateQuery('gc_products', "id",$row->id, $dataProducts);
        }
    }
    $this->session->set_flashdata('message', "You have updated a currency");
    redirect($this->config->item('admin_folder').'/settings');

}



}