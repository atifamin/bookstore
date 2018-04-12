<?php

class Orders extends Admin_Controller {	

	function __construct()
	{		
		parent::__construct();

		$this->load->model('Order_model');
		$this->load->model('Search_model');
		$this->load->model('location_model');
		$this->load->helper(array('formatting'));
		$this->lang->load('order');
	}
	
	function index($sort_by='order_number',$sort_order='desc', $code=0, $page=0, $rows=15)
	{
		$UserD = $this->session->all_userdata();
		$AdminAccess = $UserD['admin']['access'];  
	
		//if they submitted an export form do the export
		if($this->input->post('submit') == 'export')
		{
			$this->load->model('customer_model');
			$this->load->helper('download_helper');
			$post	= $this->input->post(null, false);
			$term	= (object)$post;
			
			$data['orders']	= $this->Order_model->get_orders($term);		
			
			foreach($data['orders'] as &$o)
			{
				$o->items	= $this->Order_model->get_items($o->id);
			}

			force_download_content('orders.xml', $this->load->view($this->config->item('admin_folder').'/orders_xml', $data, true));
			
			//kill the script from here
			die;
		}
		
		$this->load->helper('form');
		$this->load->helper('date');
		$data['message']	= $this->session->flashdata('message');
		if($AdminAccess=='Admin'){
			$data['page_title']	= 'ALL ORDERS';
		}else{
			$data['page_title']	= 'PENDING ORDERS';
		} 
		$data['code']		= $code;
		$term				= false;
		
		$post	= $this->input->post(null, false);
		if($post)
		{
			//if the term is in post, save it to the db and give me a reference
			$term			= json_encode($post);
			$code			= $this->Search_model->record_term($term);
			$data['code']	= $code;
			//reset the term to an object for use
			$term	= (object)$post;
		}
		elseif ($code)
		{
			$term	= $this->Search_model->get_term($code);
			$term	= json_decode($term);
		}    
 		$data['term']	= $term;
 		$data['orders']	= $this->Order_model->get_orders($term, $sort_by, $sort_order, $rows, $page,$AdminAccess); 
		$data['total']	= $this->Order_model->get_orders_count($term,$AdminAccess,'Admin');
		
		$this->load->library('pagination');
		
		$config['base_url']			= site_url($this->config->item('admin_folder').'/orders/index/'.$sort_by.'/'.$sort_order.'/'.$code.'/');
		$config['total_rows']		= $data['total'];
		$config['per_page']			= $rows;
		$config['uri_segment']		= 7;
		$config['first_link']		= 'First';
		$config['first_tag_open']	= '<li>';
		$config['first_tag_close']	= '</li>';
		$config['last_link']		= 'Last';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';

		$config['full_tag_open']	= '<div class="pagination"><ul>';
		$config['full_tag_close']	= '</ul></div>';
		$config['cur_tag_open']		= '<li class="active"><a href="#">';
		$config['cur_tag_close']	= '</a></li>';
		
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		
		$config['prev_link']		= '&laquo;';
		$config['prev_tag_open']	= '<li>';
		$config['prev_tag_close']	= '</li>';

		$config['next_link']		= '&raquo;';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		
		$this->pagination->initialize($config);
	
		$data['sort_by']	= $sort_by;
		$data['sort_order']	= $sort_order;
				
		$this->view($this->config->item('admin_folder').'/orders', $data);
	}
	function allOrders($sort_by='order_number',$sort_order='desc', $code=0, $page=0, $rows=15){
		//if they submitted an export form do the export
		if($this->input->post('submit') == 'export')
		{
			$this->load->model('customer_model');
			$this->load->helper('download_helper');
			$post	= $this->input->post(null, false);
			$term	= (object)$post;
			
			$data['orders']	= $this->Order_model->get_orders($term);		
			
			foreach($data['orders'] as &$o)
			{
				$o->items	= $this->Order_model->get_items($o->id);
			}

			force_download_content('orders.xml', $this->load->view($this->config->item('admin_folder').'/orders_xml', $data, true));
			
			//kill the script from here
			die;
		}
		
		$this->load->helper('form');
		$this->load->helper('date');
		$data['message']	= $this->session->flashdata('message');
		$data['page_title']	= 'ALL ORDERS';
		$data['code']		= $code;
		$term				= false;
		
		$post	= $this->input->post(null, false);
		if($post)
		{
			//if the term is in post, save it to the db and give me a reference
			$term			= json_encode($post);
			$code			= $this->Search_model->record_term($term);
			$data['code']	= $code;
			//reset the term to an object for use
			$term	= (object)$post;
		}
		elseif ($code)
		{
			$term	= $this->Search_model->get_term($code);
			$term	= json_decode($term);
		} 
 		$UserD = $this->session->all_userdata();
		$AdminAccess = $UserD['admin']['access'];  
 		$data['term']	= $term;
 		$data['orders']	= $this->Order_model->get_orders_for_mng($term, $sort_by, $sort_order, $rows, $page,$AdminAccess); 
		//echo $this->db->last_query();exit;
		$data['total']	= $this->Order_model->get_orders_count($term,$AdminAccess,'Manager');
		
		$this->load->library('pagination');
		
		$config['base_url']			= site_url($this->config->item('admin_folder').'/orders/index/'.$sort_by.'/'.$sort_order.'/'.$code.'/');
		$config['total_rows']		= $data['total'];
		$config['per_page']			= $rows;
		$config['uri_segment']		= 7;
		$config['first_link']		= 'First';
		$config['first_tag_open']	= '<li>';
		$config['first_tag_close']	= '</li>';
		$config['last_link']		= 'Last';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';

		$config['full_tag_open']	= '<div class="pagination"><ul>';
		$config['full_tag_close']	= '</ul></div>';
		$config['cur_tag_open']		= '<li class="active"><a href="#">';
		$config['cur_tag_close']	= '</a></li>';
		
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		
		$config['prev_link']		= '&laquo;';
		$config['prev_tag_open']	= '<li>';
		$config['prev_tag_close']	= '</li>';

		$config['next_link']		= '&raquo;';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		
		$this->pagination->initialize($config);
	
		$data['sort_by']	= $sort_by;
		$data['sort_order']	= $sort_order;
				
		$this->view($this->config->item('admin_folder').'/manager/orders', $data);
	}
	
	function export()
	{
		$this->load->model('customer_model');
		$this->load->helper('download_helper');
		$post	= $this->input->post(null, false);
		$term	= (object)$post;
		
		$data['orders']	= $this->Order_model->get_orders($term);		

		foreach($data['orders'] as &$o)
		{
			$o->items	= $this->Order_model->get_items($o->id);
		}

		force_download_content('orders.xml', $this->load->view($this->config->item('admin_folder').'/orders_xml', $data, true));
		
	}
	function getproducts(){
		$CatID = $this->input->post('catid');
		$this->load->model('product_model');
		$data['products'] = $this->product_model->get_products($CatID,200,0,'sku','ASC');
		echo '<div style="clear:both;height:20px;"></div><div class="row">
			<div class="span2">Products</div>
			<div class="span2">
				<select onchange="getProductDetail($(this).val())">
					<option value="">Select Product</option>';
		foreach($data['products'] as $p){
			echo '<option value="'.$p->id.'">SKU# '.$p->sku.' | '.$p->name.'</option>';
		}			
		echo '			
				</select>
			</div>
		</div>';
	}
	function getproductDetail(){
		$ProductId = $this->input->post('pid');
		$this->load->model('product_model');
		$ProductDetail = $this->product_model->get_product($ProductId,FALSE);
		echo '
			<input type="hidden" value="'.$ProductDetail->id.'" id="newproduct_id" />
			<input type="hidden" value="'.$ProductDetail->sku.'" id="newproduct_sku" />
			<input type="hidden" value="'.$ProductDetail->saleprice.'" id="newproduct_saleprice" />
			<input type="hidden" value="'.$ProductDetail->name.'" id="newproduct_name" />
			<input type="hidden" value="'.$ProductDetail->id.'" id="newproduct_id" />
			<input type="hidden" value="'.$ProductDetail->id.'" id="newproduct_id" />
		';
		echo '
			<div style="clear:both;height:20px;"></div>
			<div class="row">
				<div class="span2">Quantity</div>
				<div class="span2"><input type="number" value="1" id="newproduct_qty" /></div>
			</div>
		';
		echo '<div class="row">
			<div class="span5">
				<h3>'.$ProductDetail->name.'</h3>
				<p><strong>SKU# </strong>'.$ProductDetail->sku.'</p>
				<p><strong>PRICE </strong>$'.$ProductDetail->saleprice.'</p>
				'.$ProductDetail->description.'
				<p><a href="'.site_url().'/'.$ProductDetail->slug.'" target="_blank">VIEW</a></p>
			</div>
		</div>';
	} 
	function updateOrderItems($OrderID){
		$this->load->model('order_model');
		$this->order_model->delete_order_items($OrderID);
		foreach($_POST['productsid'] as $key=>$val){
			$Quantity = $_POST['products_qty'][$key];
			$ProductID = $val; 
			
			$GetPr = 'SELECT * FROM `gc_products` WHERE `id`='.$ProductID.'';
			$GetPrR= $this->db->query($GetPr)->row();
			$Subtotal = $Quantity*$GetPrR->saleprice;
			$data['id'] = $GetPrR->id;
			$data['sku'] = $GetPrR->sku;
			$data['name'] = $GetPrR->name;
			$data['slug'] = $GetPrR->slug;
			$data['route_id'] = $GetPrR->route_id;
			$data['description'] = $GetPrR->description;
			$data['excerpt'] = $GetPrR->excerpt;
			$data['price'] = $GetPrR->price;
			$data['saleprice'] = $GetPrR->saleprice;
			$data['free_shipping'] = $GetPrR->free_shipping;
			$data['shippable'] = $GetPrR->shippable;
			$data['taxable'] = $GetPrR->taxable;
			$data['fixed_quantity'] = $GetPrR->fixed_quantity;
			$data['weight'] = $GetPrR->weight;
			$data['track_stock'] = $GetPrR->track_stock;
			$data['related_products'] = $GetPrR->related_products;
			$data['images'] = $GetPrR->images;
			$data['seo_title'] = $GetPrR->seo_title;
			$data['meta'] = $GetPrR->meta;
			$data['enabled'] = $GetPrR->enabled;
			$data['faqs'] = $GetPrR->faqs;
			$data['specifications'] = $GetPrR->specifications;
			$data['qualifier'] = $GetPrR->qualifier;
			$data['oversized'] = $GetPrR->oversized;
			$data['freight'] = $GetPrR->freight;
			$data['base_price'] = $GetPrR->saleprice;
			$data['file_list'] = array();
			$data['post_options'] = '';
			$data['is_gc'] = '';
			$data['quantity'] = $Quantity;
			$data['subtotal'] = $Subtotal;
			$Serialized = serialize($data);
			
			$this->load->model('customer_model');
			$OI['order_id'] = $OrderID;
			$OI['product_id'] = $ProductID;
			$OI['quantity'] = $Quantity;
			$OI['contents'] = $Serialized;
			$this->customer_model->add('gc_order_items',$OI); 
		}
		
	}
	function order($id)
	{   
		$this->load->helper(array('form', 'date'));
		$this->load->library('form_validation');
		$this->load->model('Gift_card_model');
			
		$this->form_validation->set_rules('notes', 'lang:notes');
		$this->form_validation->set_rules('status', 'lang:status', 'required');
	
		$message	= $this->session->flashdata('message');
		
	
		if ($this->form_validation->run() == TRUE)
		{
			$save			= array();
			$save['id']		= $id;
			$save['notes']	= $this->input->post('notes');
			$save['total']	= $this->input->post('grandtotal');
			$save['subtotal']	= $this->input->post('grandtotal');
			$save['status']	= $this->input->post('status');
			
			$data['message']	= lang('message_order_updated');
			
			$this->Order_model->save_order($save);
			$this->updateOrderItems($id);
			$this->sendOrderStatusEmailToCustomer($id);
		}
		//get the order information, this way if something was posted before the new one gets queried here
		$data['page_title']	= lang('view_order');
		$data['order']		= $this->Order_model->get_order($id);
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->get_categories();
		//echo '<pre>';print_r($data);exit;
		/*****************************
		* Order Notification details *
		******************************/
		// get the list of canned messages (order)
		$this->load->model('Messages_model');
    	$msg_templates = $this->Messages_model->get_list('order');
		
		// replace template variables
    	foreach($msg_templates as $msg)
    	{
 			// fix html
 			$msg['content'] = str_replace("\n", '', html_entity_decode($msg['content']));
 			
 			// {order_number}
 			$msg['subject'] = str_replace('{order_number}', $data['order']->order_number, $msg['subject']);
			$msg['content'] = str_replace('{order_number}', $data['order']->order_number, $msg['content']);
    		
    		// {url}
			$msg['subject'] = str_replace('{url}', $this->config->item('base_url'), $msg['subject']);
			$msg['content'] = str_replace('{url}', $this->config->item('base_url'), $msg['content']);
			
			// {site_name}
			$msg['subject'] = str_replace('{site_name}', $this->config->item('company_name'), $msg['subject']);
			$msg['content'] = str_replace('{site_name}', $this->config->item('company_name'), $msg['content']);
			
			$data['msg_templates'][]	= $msg;
    	}

		// we need to see if any items are gift cards, so we can generate an activation link
		foreach($data['order']->contents as $orderkey=>$product)
		{
			if(isset($product['is_gc']) && (bool)$product['is_gc'])
			{
				if($this->Gift_card_model->is_active($product['sku']))
				{
					$data['order']->contents[$orderkey]['gc_status'] = '[ '.lang('giftcard_is_active').' ]';
				} else {
					$data['order']->contents[$orderkey]['gc_status'] = ' [ <a href="'. base_url() . $this->config->item('admin_folder').'/giftcards/activate/'. $product['code'].'">'.lang('activate').'</a> ]';
				}
			}
		}
		
		$this->view($this->config->item('admin_folder').'/order', $data);
		
	}
	function orderDetail($id)
	{   
		$this->load->helper(array('form', 'date'));
		$this->load->library('form_validation');
		$this->load->model('Gift_card_model');
			
		$this->form_validation->set_rules('notes', 'lang:notes');
		$this->form_validation->set_rules('status', 'lang:status', 'required');
	
		$message	= $this->session->flashdata('message');
		
	
		if ($this->form_validation->run() == TRUE)
		{
			$save			= array();
			$save['id']		= $id;
			$save['notes']	= $this->input->post('notes');
			$save['total']	= $this->input->post('grandtotal');
			$save['subtotal']	= $this->input->post('grandtotal');
			$save['status']	= $this->input->post('status');
			
			$data['message']	= lang('message_order_updated');
			
			$this->Order_model->save_order($save);
			$this->updateOrderItems($id);
		}
		//get the order information, this way if something was posted before the new one gets queried here
		$data['page_title']	= lang('view_order');
		$data['order']		= $this->Order_model->get_order($id);
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->get_categories();
		//echo '<pre>';print_r($data);exit;
		/*****************************
		* Order Notification details *
		******************************/
		// get the list of canned messages (order)
		$this->load->model('Messages_model');
    	$msg_templates = $this->Messages_model->get_list('order');
		
		// replace template variables
    	foreach($msg_templates as $msg)
    	{
 			// fix html
 			$msg['content'] = str_replace("\n", '', html_entity_decode($msg['content']));
 			
 			// {order_number}
 			$msg['subject'] = str_replace('{order_number}', $data['order']->order_number, $msg['subject']);
			$msg['content'] = str_replace('{order_number}', $data['order']->order_number, $msg['content']);
    		
    		// {url}
			$msg['subject'] = str_replace('{url}', $this->config->item('base_url'), $msg['subject']);
			$msg['content'] = str_replace('{url}', $this->config->item('base_url'), $msg['content']);
			
			// {site_name}
			$msg['subject'] = str_replace('{site_name}', $this->config->item('company_name'), $msg['subject']);
			$msg['content'] = str_replace('{site_name}', $this->config->item('company_name'), $msg['content']);
			
			$data['msg_templates'][]	= $msg;
    	}

		// we need to see if any items are gift cards, so we can generate an activation link
		foreach($data['order']->contents as $orderkey=>$product)
		{
			if(isset($product['is_gc']) && (bool)$product['is_gc'])
			{
				if($this->Gift_card_model->is_active($product['sku']))
				{
					$data['order']->contents[$orderkey]['gc_status'] = '[ '.lang('giftcard_is_active').' ]';
				} else {
					$data['order']->contents[$orderkey]['gc_status'] = ' [ <a href="'. base_url() . $this->config->item('admin_folder').'/giftcards/activate/'. $product['code'].'">'.lang('activate').'</a> ]';
				}
			}
		}
		
		$this->view($this->config->item('admin_folder').'/manager/orderDetail', $data);
		
	}
	
	function packing_slip($order_id)
	{
		$this->load->helper('date');
		$data['order']		= $this->Order_model->get_order($order_id);
		$this->load->view($this->config->item('admin_folder').'/packing_slip.php', $data);
	}
	
	function edit_status()
    {
    	$this->auth->is_logged_in();
    	$order['id']		= $this->input->post('id');
    	$order['status']	= $this->input->post('status'); 
    	$this->Order_model->save_order($order); 
		####################################################################
		############## Send Order Status Email to Customer #################
		$this->sendOrderStatusEmailToCustomer($this->input->post('id'));
		####################################################################
    	echo url_title($order['status']);
    }
	function sendOrderStatusEmailToCustomer($orderID){
		$query = 'SELECT go.*, gc.* FROM gc_orders go LEFT JOIN gc_customers gc ON gc.id = go.customer_id WHERE go.id ='.$orderID.'';
		$queryR = $this->db->query($query)->row();
		if(!empty($queryR)){
			$message = '
Hi, '.$queryR->firstname.'  '.$queryR->lastname.'<br /><br />
<center><div style="color:#000;font-size:22px;">Order Number# <strong>'.$queryR->order_number.'</strong></div></center>
<br />
<center><div style="color:#000;font-size:22px;">Your Order Status has been changed to <strong>'.$queryR->status.'</strong></div></center>

<br/><br/>
<table width="100%" cellpadding="10" border="0"> 
	<tr>
		<td>
			<strong>BILLING DETAILS</strong><br /><br /> 
			'.$queryR->bill_company.'<br />
			'.$queryR->bill_firstname.' '.$queryR->bill_lastname.' &lt; '.$queryR->email.' &gt;<br />
			'.$queryR->bill_phone.'<br />
			'.$queryR->bill_address1.'<br /> 
			'.$queryR->bill_address2.'<br />
			'.$queryR->bill_city.' '.$queryR->bill_zone.' '.$queryR->bill_zip.'<br />
		</td>
		<td>
			<strong>SHIPPING DETAILS</strong><br /><br /> 
			'.$queryR->ship_company.'<br />
			'.$queryR->ship_firstname.' '.$queryR->ship_lastname.' &lt; '.$queryR->email.' &gt;<br />
			'.$queryR->ship_phone.'<br />
			'.$queryR->ship_address1.'<br /> 
			'.$queryR->ship_address2.'<br />
			'.$queryR->ship_city.' '.$queryR->ship_zone.' '.$queryR->ship_zip.'<br />
		</td> 
		<td>
			<strong>PO Number#</strong><br /><br />
			'.$queryR->po_number.'
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<strong>ADDITIONAL INSTRUCTIONS</strong><br /><br />
			'.$queryR->additional_instructions.'
		</td>
	</tr>
</table>
			';
			$this->load->library('email'); 
			$config['mailtype'] = 'html'; 
			$this->email->initialize($config); 
			$this->email->from($this->config->item('email'), $this->config->item('company_name'));
			$this->email->to($queryR->email); // $queryR->email 
			$this->email->subject('ORDER STATUS CHANGED');
			$this->email->message($message); 
			$this->email->send();
		}
	}
    
    function send_notification($order_id='')
    {
			// send the message
   		$this->load->library('email');
		
		$config['mailtype'] = 'html';
		
		$this->email->initialize($config);

		$this->email->from($this->config->item('email'), $this->config->item('company_name'));
		$this->email->to($this->input->post('recipient'));
		
		$this->email->subject($this->input->post('subject'));
		$this->email->message(html_entity_decode($this->input->post('content')));
		
		$this->email->send();
		
		$this->session->set_flashdata('message', lang('sent_notification_message'));
		redirect($this->config->item('admin_folder').'/orders/order/'.$order_id);
	}
	
	function bulk_delete()
    {
    	$orders	= $this->input->post('order');
    	
		if($orders)
		{
			foreach($orders as $order)
	   		{
	   			$this->Order_model->delete($order);
	   		}
			$this->session->set_flashdata('message', lang('message_orders_deleted'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('error_no_orders_selected'));
		}
   		//redirect as to change the url
		redirect($this->config->item('admin_folder').'/orders');	
    }
	
	function updatemultipleorderstatus(){
		$status = $this->input->post('status');
		$ids    = $this->input->post('ids');
		$ids    = rtrim($ids,',');
		$Query  = "UPDATE `gc_orders` SET `status`='".$status."' WHERE `id` IN (".$ids.")";
		$idsn = explode(',',$ids);
		foreach($idsn as $key=>$val){
			$this->sendOrderStatusEmailToCustomer($val);
		}
		$QueryR = $this->db->query($Query);
	}
	
	function exportorders(){
		require_once 'generateexcell/PHPExcel.php';
		$Title = 'Orders';
		$this->load->model('customer_model');
		$this->load->helper('download_helper');
		$post	= $this->input->post(null, false);
		$term	= (object)$post;
		
		$data['orders']	= $this->Order_model->get_orders($term);		
		
		foreach($data['orders'] as &$o)
		{
			$o->items	= $this->Order_model->get_items($o->id);
		}

		//force_download_content('orders.xml', $this->load->view($this->config->item('admin_folder').'/orders_xml', $data, true));
		//echo '<pre>';print_r($data);exit;
		$objPHPExcel = new PHPEXCEL();
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("VisionPlus")
                ->setLastModifiedBy("VisionPlus")
                ->setTitle($Title)
                ->setSubject($Title)
                ->setDescription($Title)
                ->setKeywords($Title)
                ->setCategory($Title);
        $objPHPExcel->setActiveSheetIndex(0);       
         $objPHPExcel->getActiveSheet()
                ->getStyle('E')
                ->getAlignment()
                ->setWrapText(true);
          $objPHPExcel->getActiveSheet()
                ->getStyle('F')
                ->getAlignment()
                ->setWrapText(true);
           $objPHPExcel->getActiveSheet()
                ->getStyle('K')
                ->getAlignment()
                ->setWrapText(true);
            $objPHPExcel->getActiveSheet()
                ->getStyle('L')
                ->getAlignment()
                ->setWrapText(true);
        $objPHPExcel->getActiveSheet()
                ->getStyle('B')
                ->getAlignment()
                ->setWrapText(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('6');
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('14');
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('20');
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('22');
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('40');
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('17');
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('15');        
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth('15');        
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth('40');        
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth('30');        
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth('30');         
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(false);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth('30');         
        $objPHPExcel->getActiveSheet()
                ->getStyle('M')
                ->getAlignment()
                ->setWrapText(true);
          $objPHPExcel->getActiveSheet()
                ->getStyle('N')
                ->getAlignment()
                ->setWrapText(true);
        $objPHPExcel->getActiveSheet()
                ->getStyle('A')
                ->getAlignment()
                ->setWrapText(true);
        $objPHPExcel->getDefaultStyle()->getFont()
                ->setSize(10);
        $objPHPExcel->getActiveSheet()->getStyle("B")->getFont()->setSize(10);
        $objPHPExcel->getActiveSheet()->getStyle("C")->getFont()->setSize(10);
        $objPHPExcel->getActiveSheet()->getStyle("A")->getFont()->setSize(10); 
// Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Order ID')
				->setCellValue('B1', 'Order Date')
                ->setCellValue('C1', 'PO#')
                ->setCellValue('D1', 'Additional Instructions')             
                ->setCellValue('E1', 'Status')
                ->setCellValue('F1', 'Total')
                ->setCellValue('G1', 'Notes')
                ->setCellValue('H1', 'Company')
                ->setCellValue('I1', 'First Name')
                ->setCellValue('J1', 'Last Name')
                ->setCellValue('K1', 'Phone')
                ->setCellValue('L1', 'Email')
                ->setCellValue('M1', 'Ship Company')           
                ->setCellValue('N1', 'Ship First Name')         
                ->setCellValue('O1', 'Ship Last Name')
				->setCellValue('P1', 'Ship Email')
				->setCellValue('Q1', 'Ship Phone')
				->setCellValue('R1', 'Ship Address 1')
				->setCellValue('S1', 'Ship Address 2')
				->setCellValue('T1', 'Ship City')
				->setCellValue('U1', 'Ship Zip Code')
				->setCellValue('V1', 'Ship State')
				->setCellValue('W1', 'SKU')
				->setCellValue('X1', 'NAME')
				->setCellValue('Y1', 'PRICE')
				->setCellValue('Z1', 'QUANTITY')
				->setCellValue('AA1', 'SUBTOTAL');
                
        $I = 2;
        foreach ($data['orders'] as $row) {
            
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $I, $row->order_number)
					->setCellValue('B' . $I, $row->ordered_on)
                    ->setCellValue('C' . $I, $row->po_number)
                    ->setCellValue('D' . $I, $row->additional_instructions)
                    ->setCellValue('E' . $I, $row->status)
                    ->setCellValue('F' . $I, $row->total)
                    ->setCellValue('G' . $I, $row->notes)
                    ->setCellValue('H' . $I, $row->company)
                    ->setCellValue('I' . $I, $row->firstname)
                    ->setCellValue('J' . $I, $row->lastname)
                    ->setCellValue('K' . $I, $row->phone)
                    ->setCellValue('L' . $I, $row->email)
                    ->setCellValue('M' . $I, $row->ship_company)
					->setCellValue('N' . $I, $row->ship_firstname)
					->setCellValue('O' . $I, $row->ship_lastname)
					->setCellValue('P' . $I, $row->ship_email)
					->setCellValue('Q' . $I, $row->ship_phone)
					->setCellValue('R' . $I, $row->ship_address1)
					->setCellValue('S' . $I, $row->ship_address2)
					->setCellValue('T' . $I, $row->ship_city)
					->setCellValue('U' . $I, $row->ship_zip)
					->setCellValue('V' . $I, $row->ship_zone); 
					
			if(count($row->items)>0){
			$I++;
				foreach($row->items as $items){
				//echo $row->order_number.' '.$items['sku'].'<br />';  
					$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A' . $I, '')
					->setCellValue('B' . $I, '')
					->setCellValue('C' . $I, '')             
					->setCellValue('D' . $I, '')
					->setCellValue('E' . $I, '')
					->setCellValue('F' . $I, '')
					->setCellValue('G' . $I, '')
					->setCellValue('H' . $I, '')
					->setCellValue('I' . $I, '')
					->setCellValue('J' . $I, '')
					->setCellValue('K' . $I, '')
					->setCellValue('L' . $I, '')           
					->setCellValue('M' . $I, '')         
					->setCellValue('N' . $I, '')
					->setCellValue('O' . $I, '')
					->setCellValue('P' . $I, '')
					->setCellValue('Q' . $I, '')
					->setCellValue('R' . $I, '')
					->setCellValue('S' . $I, '')
					->setCellValue('T' . $I, '')
					->setCellValue('U' . $I, '')
					->setCellValue('V' . $I, '')
                    ->setCellValue('W' . $I, $items['sku'])
                    ->setCellValue('X' . $I, $items['name'])
					->setCellValue('Y' . $I, $items['saleprice'])
					->setCellValue('Z' . $I, $items['quantity'])
					->setCellValue('AA' . $I, $items['subtotal']);
					$I++;
				} 	
			}									
			$I++;
        } 

// Rename worksheet
		$sheetTitle = 'RRI Orders '.date('Md Y');
        $objPHPExcel->getActiveSheet()->setTitle($sheetTitle); 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        $FileName = 'Orders.xls';
// Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $FileName . '"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 2020 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
	}
}