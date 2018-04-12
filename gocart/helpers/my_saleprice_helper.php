<?php
function getSalePrice($productid){	
	$today=date('Y-m-d');
	$CI = &get_instance();
	$CI->load->model('product_model');
	$ci_data=$CI->product_model->get_product($productid);
	$saleprice=$ci_data->price;
	if ($today>=$ci_data->saleprice_start_date && $today<=$ci_data->saleprice_end_date){
		if($ci_data->saleprice>0){
			$saleprice=$ci_data->saleprice;		
		}
	}	
	return $saleprice;
}

/* End of file welcome.php */
/* Location: ./system/application/helpers/MY_saleprice_helper.php */
