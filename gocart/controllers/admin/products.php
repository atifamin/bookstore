<?php

class Products extends Admin_Controller {	
	
	private $use_inventory = false;
	
	function __construct()
	{		
		parent::__construct();
        $this->admin = $this->session->userdata("admin");
		//$this->auth->check_access('Admin', true);
		
		$this->load->model(array('Product_model'));
		$this->load->helper('form');
		$this->lang->load('product');
		$this->load->model("Common_model");
		$this->load->helper('text');
	}

	function index($order_by="name", $sort_order="ASC", $code=0, $page=0, $rows=15)
	{
		//print_r($this->input->post("daterange")); exit;
		//$slug	= url_title(convert_accented_characters("this is my subect # 41"), 'dash', TRUE);
		$data['page_title']	= lang('products');
		
		$data['code']		= $code;
		$term				= false;
		$category_id		= false;
		
		//get the category list for the drop menu
		$data['categories']	= $this->Category_model->get_categories_tiered();
		
		$post				= $this->input->post(null, false);
		//echo "<pre>"; print_r($post); exit;
		$this->load->model('Search_model');
		if($post)
		{
			$term			= json_encode($post);
			$code			= $this->Search_model->record_term($term);
			$data['code']	= $code;
		}
		elseif ($code)
		{
			$term			= $this->Search_model->get_term($code);
		}
		
		//store the search term
		$data['term']		= $term;
		$data['order_by']	= $order_by;
		$data['sort_order']	= $sort_order;
		
		$data['products']	= $this->Product_model->products(array('term'=>$term, 'order_by'=>$order_by, 'sort_order'=>$sort_order, 'rows'=>$rows, 'page'=>$page));

		//total number of products
		$data['total']		= $this->Product_model->products(array('term'=>$term, 'order_by'=>$order_by, 'sort_order'=>$sort_order), true);

		
		$this->load->library('pagination');
		
		$config['base_url']			= site_url($this->config->item('admin_folder').'/products/index/'.$order_by.'/'.$sort_order.'/'.$code.'/');
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
		//echo "<pre>"; print_r($data); exit;
		$this->pagination->initialize($config);
		$data['query1']=$this->common_model->rawQueryResult("SELECT * FROM gc_editions");
		$data['query2']=$this->common_model->rawQueryResult("SELECT * FROM gc_authors");
		$data['query3']=$this->common_model->rawQueryResult("SELECT * FROM gc_publishers");
		$this->view($this->config->item('admin_folder').'/products', $data);
	}
	
	//basic category search
	function product_autocomplete()
	{
		$name	= trim($this->input->post('name'));
		$limit	= $this->input->post('limit');
		
		if(empty($name))
		{
			echo json_encode(array());
		}
		else
		{
			$results	= $this->Product_model->product_autocomplete($name, $limit);
			
			$return		= array();
			
			foreach($results as $r)
			{
				$return[$r->id]	= $r->name.' | SKU# '.$r->sku;
			}
			echo json_encode($return);
		}
		
	}
	
	function bulk_save()
	{
		$products	= $this->input->post('product');
		
		if(!$products)
		{
			$this->session->set_flashdata('error',  lang('error_bulk_no_products'));
			redirect($this->config->item('admin_folder').'/products');
		}
				
		foreach($products as $id=>$product)
		{
			$product['id']	= $id;
			$this->Product_model->save($product);
		}
		
		$this->session->set_flashdata('message', lang('message_bulk_update'));
		redirect($this->config->item('admin_folder').'/products');
	}
	
	function form($id = false, $duplicate = false)
	{
		$data['currency'] = $this->common_model->listingResult("gc_currencies");
		$data['productfiles'] = $this->Product_model->get_product_files($id); 
		$this->product_id	= $id;
		$this->load->library('form_validation');
		$this->load->model(array('Option_model', 'Category_model', 'Digital_Product_model'));
		$this->lang->load('digital_product');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$data['categories']		= $this->Category_model->get_categories_tiered();
		$data['publisher_option']	= $this->db->order_by("publisherName", "ASC")->get("gc_publishers")->result();
		$data['author_option']	= $this->db->order_by("authorName", "ASC")->get("gc_authors")->result();
		$data['edition_option']	= $this->db->order_by("editionName", "ASC")->get("gc_editions")->result();
		$data['file_list']		= $this->Digital_Product_model->get_list();

		$data['page_title']		= lang('product_form');

		//default values are empty if the product is new
		$data['id']					= '';
		$data['sku']				= '';
		$data['name']				= '';
		$data['slug']				= '';
		$data['description']		= '';
		$data['return_policy']		= '';
		$data['publisherId']		= '';
		$data['authorId']			= '';
		$data['editionId']			= '';
		$data['currency_symbol']	= 'PKR';
		$data['excerpt']			= '';
		$data['price']				= '';
		$data['saleprice']			= '';
		$data['weight']				= '';
		$data['track_stock'] 		= '';
		$data['seo_title']			= '';
		$data['meta']				= '';
		$data['shippable']			= '';
		$data['taxable']			= '';
		$data['fixed_quantity']		= '';
		$data['quantity']			= '';
		$data['enabled']			= 1;
		$data['related_products']	= array();
		$data['product_categories']	= array();
		$data['images']				= array();
		$data['product_files']		= array();
		$data['faqs']				= '';
		$data['specifications']		= '';
		$data['qualifier']			= '';
		$data['oversized']			= '';
		$data['freight']			= '';
		$data['saleprice_start_date']='';
		$data['saleprice_end_date'] ='';
		
		
		//create the photos array for later use
		$data['photos']		= array();

		if ($id)
		{	
			// get the existing file associations and create a format we can read from the form to set the checkboxes
			$pr_files 		= $this->Digital_Product_model->get_associations_by_product($id);
			foreach($pr_files as $f)
			{
				$data['product_files'][]  = $f->file_id;
			}
			
			// get product & options data
			$data['product_options']	= $this->Option_model->get_product_options($id);
			$product					= $this->Product_model->get_product($id);
			
			//if the product does not exist, redirect them to the product list with an error
			if (!$product)
			{
				$this->session->set_flashdata('error', lang('error_not_found'));
				redirect($this->config->item('admin_folder').'/products');
			}
			
			//helps us with the slug generation
			$this->product_name	= $this->input->post('slug', $product->slug);
			
			//set values to db values
			$data['id']					= $id;
			$data['sku']				= $product->sku;
			$data['name']				= $product->name;
			$data['seo_title']			= $product->seo_title;
			$data['meta']				= $product->meta;
			$data['slug']				= $product->slug;
			$data['description']		= $product->description;
			$data['return_policy']		= $product->return_policy;
			$data['publisherId']		= $product->publisherId;
			$data['authorId']			= $product->authorId;
			$data['editionId']			= $product->editionId;
			$data['currency_symbol']	= $product->currency_symbol;
			$data['excerpt']			= $product->excerpt;
			$data['price']				= $product->price_base;
			$data['saleprice']			= $product->saleprice_base;
			$data['weight']				= $product->weight;
			$data['track_stock'] 		= $product->track_stock;
			$data['shippable']			= $product->shippable;
			$data['quantity']			= $product->quantity;
			$data['taxable']			= $product->taxable;
			$data['fixed_quantity']		= $product->fixed_quantity;
			$data['enabled']			= $product->enabled;
			$data['faqs']				= $product->faqs;
			$data['specifications']		= $product->specifications;
			$data['qualifier']			= $product->qualifier;
			$data['oversized']			= $product->oversized;
			$data['freight']			= $product->freight;
			$data['saleprice_start_date']=$product->saleprice_start_date;
			$data['saleprice_end_date'] = $product->saleprice_end_date;
			
			
			//make sure we haven't submitted the form yet before we pull in the images/related products from the database
			if(!$this->input->post('submit'))
			{
				
				$data['product_categories']	= array();
				foreach($product->categories as $product_category)
				{
					$data['product_categories'][] = $product_category->id;
				}
				
				$data['related_products']	= $product->related_products;
				$data['images']				= (array)json_decode($product->images);
			}
			
		}
		
		//if $data['related_products'] is not an array, make it one.
		if(!is_array($data['related_products']))
		{
			$data['related_products']	= array();
		}
		if(!is_array($data['product_categories']))
		{
			$data['product_categories']	= array();
		}
		
		//echo "<pre>"; print_r($data); exit;
		
		//no error checking on these
		$this->form_validation->set_rules('caption', 'Caption');
		$this->form_validation->set_rules('primary_photo', 'Primary');

		$this->form_validation->set_rules('sku', 'lang:sku', 'trim');
		$this->form_validation->set_rules('seo_title', 'lang:seo_title', 'trim');
		$this->form_validation->set_rules('meta', 'lang:meta_data', 'trim');
		$this->form_validation->set_rules('name', 'lang:name', 'trim|required|max_length[64]');
		$this->form_validation->set_rules('slug', 'lang:slug', 'trim');
		$this->form_validation->set_rules('description', 'lang:description', 'trim');
		//$this->form_validation->set_rules('return_policy', 'lang:return_policy', 'required');
		$this->form_validation->set_rules('publisherId', 'lang:publisherId', 'required');
		$this->form_validation->set_rules('authorId', 'lang:authorId', 'required');
		$this->form_validation->set_rules('editionId', 'lang:editionId', 'required');
		$this->form_validation->set_rules('excerpt', 'lang:excerpt', 'trim');
		$this->form_validation->set_rules('price', 'lang:price', 'trim|numeric|floatval');
		$this->form_validation->set_rules('saleprice', 'lang:saleprice', 'trim|numeric|floatval');
		$this->form_validation->set_rules('weight', 'lang:weight', 'trim|numeric|floatval');
		$this->form_validation->set_rules('track_stock', 'lang:track_stock', 'trim|numeric');
		$this->form_validation->set_rules('quantity', 'lang:quantity', 'trim|numeric');
		$this->form_validation->set_rules('shippable', 'lang:shippable', 'trim|numeric');
		$this->form_validation->set_rules('taxable', 'lang:taxable', 'trim|numeric');
		$this->form_validation->set_rules('fixed_quantity', 'lang:fixed_quantity', 'trim|numeric');
		$this->form_validation->set_rules('enabled', 'lang:enabled', 'trim|numeric');

		/*
		if we've posted already, get the photo stuff and organize it
		if validation comes back negative, we feed this info back into the system
		if it comes back good, then we send it with the save item
		
		submit button has a value, so we can see when it's posted
		*/
		
		
		if($duplicate)
		{
			$data['id']	= false;
		}
		if($this->input->post('submit'))
		{
			//reset the product options that were submitted in the post
			$data['product_options']	= $this->input->post('option');
			$data['related_products']	= $this->input->post('related_products');
			$data['product_categories']	= $this->input->post('categories');
			$data['images']				= $this->input->post('images');
			$data['product_files']		= $this->input->post('downloads');
			
		}
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->view($this->config->item('admin_folder').'/product_form', $data);
		}
		else
		{
			$this->load->helper('text');
			
			//first check the slug field
			$slug = $this->input->post('slug');
			
			//if it's empty assign the name field
			if(empty($slug) || $slug=='')
			{
				$slug = $this->input->post('name');
			}
			
			$slug	= url_title(convert_accented_characters($slug), 'dash', TRUE);
			
			//validate the slug
			$this->load->model('Routes_model');

			if($id)
			{
				$slug		= $this->Routes_model->validate_slug($slug, $product->route_id);
				$route_id	= $product->route_id;
			}
			else
			{
				$slug	= $this->Routes_model->validate_slug($slug);
				
				$route['slug']	= $slug;	
				$route_id	= $this->Routes_model->save($route);
			}
			//echo  $slug; exit;
			
			if($this->input->post('saleprice_start_date')==''){
				$saleprice_start_date="0000-00-00";
			}
			else{
				$saleprice_start_date=$this->input->post('saleprice_start_date');
			}
			if($this->input->post('saleprice_end_date')==''){
				$saleprice_end_date="0000-00-00";
			}
			else{
				$saleprice_end_date=$this->input->post('saleprice_end_date');
			}

			$rate = $this->common_model->getFieldName("gc_currencies", "symbol", $this->input->post('currency_symbol'), "exchange_rate");
			$priceAfterConversion = $this->input->post('price')*$rate;
			$salepriceAfterConversion = $this->input->post('saleprice')*$rate;
			
			
			$save['id']					= $id;
			$save['updatedById']		= $this->admin['id'];
			$save['sku']				= $this->input->post('sku');
			$save['name']				= $this->input->post('name');
			$save['seo_title']			= $this->input->post('seo_title');
			$save['meta']				= $this->input->post('meta');
			$save['description']		= $this->input->post('description');
			$save['publisherId']		= $this->input->post('publisherId');
			$save['authorId']			= $this->input->post('authorId');
			$save['editionId']			= $this->input->post('editionId');
			$save['return_policy']		= $this->input->post('return_policy');
			$save['excerpt']			= $this->input->post('excerpt');
			$save['currency_symbol']	= $this->input->post('currency_symbol');
			$save['price_base']			= $this->input->post('price');
			$save['saleprice_base']		= $this->input->post('saleprice');
			$save['price']				= $priceAfterConversion;
			$save['saleprice']			= $salepriceAfterConversion;
			$save['saleprice_start_date']=$saleprice_start_date;
			$save['saleprice_end_date'] = $saleprice_end_date;
			$save['weight']				= $this->input->post('weight');
			$save['track_stock']		= $this->input->post('track_stock');
			$save['fixed_quantity']		= $this->input->post('fixed_quantity');
			$save['quantity']			= $this->input->post('quantity');
			$save['shippable']			= $this->input->post('shippable');
			$save['taxable']			= $this->input->post('taxable');
			$save['enabled']			= $this->input->post('enabled');
			$save['faqs']				= $this->input->post('faqs');
			$save['specifications']		= $this->input->post('specifications');
			$save['qualifier']			= $this->input->post('qualifier');
			$save['oversized']			= $this->input->post('oversized'); 
			$post_images				= $this->input->post('images');
			
			$save['slug']				= $slug;
			$save['route_id']			= $route_id;
			
			//echo '<pre>'; print_r($save); echo '</pre>';exit;
			if($primary	= $this->input->post('primary_image'))
			{
				if($post_images)
				{
					foreach($post_images as $key => &$pi)
					{
						if($primary == $key)
						{
							$pi['primary']	= true;
							continue;
						}
					}	
				}
				
			}
			
			$save['images']				= json_encode($post_images);
			
			
			if($this->input->post('related_products'))
			{
				$save['related_products'] = json_encode($this->input->post('related_products'));
			}
			else
			{
				$save['related_products'] = '';
			}
			
			//save categories
			$categories			= $this->input->post('categories');
			if(!$categories)
			{
				$categories	= array();
			}
			
			
			// format options
			$options	= array();
			if($this->input->post('option'))
			{
				foreach ($this->input->post('option') as $option)
				{
					$options[]	= $option;
				}

			}	
			
			// save product 
			$product_id	= $this->Product_model->save($save, $options, $categories);
			
			// PDF Files
			if(!empty($_POST['pdftitle_old'])){
				$this->Product_model->deleteProductFiles($product_id);
				foreach($_POST['pdftitle_old'] as $key=>$val){
					$PDFs['product_id'] = $product_id;
					$PDFs['title'] 		= $val;
					$PDFs['file_path'] 	= $_POST['pdffile_path_old'][$key];
					$PDFs['file_name'] 	= $_POST['pdffile_name_old'][$key];
					$this->Product_model->addPDFs($PDFs);
				}
			}
			if(!empty($_POST['pdftitle_new'])){ 
				for($i=0; $i<count($_POST['pdftitle_new']); $i++){  
					$fname=time().'_'.basename($_FILES['pdffile_new']['name'][$i]);
					$fname = str_replace(" ","_",$fname);
					$fname = str_replace("%","_",$fname);
					$name_ext = end(explode(".", basename($_FILES['pdffile_new']['name'][$i])));
					$name = str_replace('.'.$name_ext,'',basename($_FILES['pdffile_new']['name'][$i]));
					$uploaddir = "./uploads/images/media/";
					$uploaddir2 = "./uploads/images/media/";
					$uploadfile = $uploaddir.$fname;
					if (move_uploaded_file($_FILES['pdffile_new']['tmp_name'][$i], $uploadfile)){
					 $_POST['pdffile_new'][$i] = $fname;
					}
					$PDFsNew['product_id'] = $product_id;
					$PDFsNew['title'] 		= $_POST['pdftitle_new'][$i];
					$PDFsNew['file_path'] 	= $fname;
					$PDFsNew['file_name'] 	= $fname;
					$this->Product_model->addPDFs($PDFsNew);					
				}
			}
			//echo '<pre>'; print_r($_POST); exit;
			
			// add file associations
			// clear existsing
			$this->Digital_Product_model->disassociate(false, $product_id);
			// save new
			$downloads = $this->input->post('downloads');
			if(is_array($downloads))
			{
				foreach($downloads as $d)
				{
					$this->Digital_Product_model->associate($d, $product_id);
				}
			}			

			//save the route
			$route['id']	= $route_id;
			$route['slug']	= $slug;
			$route['route']	= 'cart/product/'.$product_id;
			
			$this->Routes_model->save($route);
			
			$this->session->set_flashdata('message', lang('message_saved_product'));

			//go back to the product list
			redirect($this->config->item('admin_folder').'/products');
		}
	}
	
	function product_image_form()
	{
		$data['file_name'] = false;
		$data['error']	= false;
		$this->load->view($this->config->item('admin_folder').'/iframe/product_image_uploader', $data);
	}
	
	function product_image_upload()
	{
		$data['file_name'] = false;
		$data['error']	= false;
		
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']	= $this->config->item('size_limit');
		$config['upload_path'] = 'uploads/images/full';
		$config['encrypt_name'] = true;
		$config['remove_spaces'] = true;

		$this->load->library('upload', $config);
		
		if ( $this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
			
			$this->load->library('image_lib');
			/*
			
			I find that ImageMagick is more efficient that GD2 but not everyone has it
			if your server has ImageMagick then you can change out the line
			
			$config['image_library'] = 'gd2';
			
			with
			
			$config['library_path']		= '/usr/bin/convert'; //make sure you use the correct path to ImageMagic
			$config['image_library']	= 'ImageMagick';
			*/			
			
			//this is the larger image
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/images/full/'.$upload_data['file_name'];
			$config['new_image']	= 'uploads/images/medium/'.$upload_data['file_name'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 600;
			$config['height'] = 500;
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();

			//small image
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/images/medium/'.$upload_data['file_name'];
			$config['new_image']	= 'uploads/images/small/'.$upload_data['file_name'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 235;
			$config['height'] = 235;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();

			//cropped thumbnail
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/images/small/'.$upload_data['file_name'];
			$config['new_image']	= 'uploads/images/thumbnails/'.$upload_data['file_name'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 150;
			$config['height'] = 150;
			$this->image_lib->initialize($config); 	
			$this->image_lib->resize();	
			$this->image_lib->clear();

			$data['file_name']	= $upload_data['file_name'];
		}
		
		if($this->upload->display_errors() != '')
		{
			$data['error'] = $this->upload->display_errors();
		}
		$this->load->view($this->config->item('admin_folder').'/iframe/product_image_uploader', $data);
	}
	
	function delete($id = false)
	{
		if ($id)
		{	
			$product	= $this->Product_model->get_product($id);
			//if the product does not exist, redirect them to the customer list with an error
			if (!$product)
			{
				$this->session->set_flashdata('error', lang('error_not_found'));
				redirect($this->config->item('admin_folder').'/products');
			}
			else
			{

				// remove the slug
				$this->load->model('Routes_model');
				$this->Routes_model->delete($product->route_id);

				//if the product is legit, delete them
				$this->Product_model->delete_product($id);

				$this->session->set_flashdata('message', lang('message_deleted_product'));
				redirect($this->config->item('admin_folder').'/products');
			}
		}
		else
		{
			//if they do not provide an id send them to the product list page with an error
			$this->session->set_flashdata('error', lang('error_not_found'));
			redirect($this->config->item('admin_folder').'/products');
		}
	}

	function SearchByDate(){
		$DateRange = $this->input->post('DateRange');
		$Date=json_decode($DateRange);
		//echo $Date;exit;

		 $start=$Date->start;
		 $end=$Date->end;
		 
		
		/* $data=array(
			'created_at' =>  $start,
			'created_at' =>  $end,
		);*/
		
		$result = $this->db->query("SELECT * FROM gc_products WHERE created_at BETWEEN '".$start."' AND '".$end."'" );
		//print_r($result);exit;
		//$WHERE = $DateBetween;
		//echo $WHERE;exit;
	}
}
