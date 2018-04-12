<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/product-slides/responsiveslides.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/product-slides/demo.css" />
<style>
form{max-width:100%;}
.productdesc p, .productdesc ul li, .productdesc{font-family:"Poppins",cursive;font-size:15px;}
.bodtop{border-top:none !important;}
.bodbottom{border-bottom:none !important;}
.ui-widget-header{border:none !important;background:none !important;}
.ui-widget.ui-widget-content{border:1px solid #eee !important;}

.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active{background:#00A2D2 !important;color:#fff !important; border-radius:0px !important;font-family:"Poppins",cursive;}

.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover{background:#004f7c !important; color:#fff !important; border-radius:0px !important;font-family:"Poppins",cursive;}
.ui-tabs .ui-tabs-nav .ui-tabs-anchor{padding:2px 10px !important;}
img.pdficon{width:45px;height:45px;margin-right:10px;}
ul.pdffiles{}
ul.pdffiles li{list-style:none;margin:10px 15px;}
ul.pdffiles li a{color:#000;font-family:"Poppins",cursive;font-size:15px;}
ul.pdffiles li a:hover{color:#004F7C;}
#tabs-1 p, #tabs-2 p, #tabs-3 p{font-family:"Poppins",cursive;font-size:15px;}
.control-group{width:50%;float:left;margin-top:20px;}
.control-group label.control-label{font-family:"Poppins",cursive;font-weight:bold;font-size:16px;}
.control-group .controls{margin-left:20px;cursor:pointer;}
.checkbox{font-family:"Poppins",cursive;cursor:pointer;}
.control-group .control-label{color:#00A2D2;margin-bottom:20px;}
.controls select{font-family:"Poppins",cursive;width:60%;}
.control-group .controls .checkbox{margin-bottom:10px;}
.control-group .controls .radio{margin-bottom:10px;}
.minh{min-height:340px !important;}
.minh2{min-height:82px;}
.minh3{min-height:60px;}
.categorydescription p{font-family:"Poppins",cursive;font-size:15px;} 
.minh{min-height:340px !important;}
.minh2{min-height:82px;}
img.productimg{height:145px;}
</style>
<div class="row">
  <div class="coffee-span-12 column-7"></div>
</div>
<div class="row">
  <div class="coffee-span-12 column-8">
    <h5><span class="heading-text-7">
      <?php  $cat_name = $this->uri->segment(1); $cat_name = strtoupper($cat_name); echo str_replace('-', ' ', $cat_name);?>
      </span> </h5>
    <div class="rule rule-7a">
      <hr>
    </div>
    <span class="text-element"><span class="text-text-7"><a title="" href="<?php echo site_url(); ?>">HOME</a>&nbsp;&gt; <a title="<?php echo $cat_name; ?>" href="<?php echo site_url().$this->uri->segment(1); ?>">
    <?php  $cat_name = $this->uri->segment(1); $cat_name = strtoupper($cat_name); echo str_replace('-', ' ', $cat_name);?>
    </a> &nbsp;&gt; <?php echo $product->name;?></span> </span> </div>
</div>
<div id="addtocart_response" class="row"></div>
<style>
ul.sidebar-cats{}
ul.sidebar-cats li{list-style:none;display:block;border-bottom:1px solid #c7eafb;}
ul.sidebar-cats li:last-child{border:none;}
ul.sidebar-cats li a{font-family:'Poppins', cursive;display:block;padding:10px 5px;color:#004f7c;text-align:center;}
ul.sidebar-cats li a:hover{background:#004f7c;color:#fff;}
ul.sidebar-cats li.active a{background:#004f7c !important;color:#fff !important;}
.no-padding{padding:0px !important;}
.whitebg{background:#fff; padding:20px;}
</style>

<div class="row row-6">
	<div class="coffee-span-2 coffee-800-span-12 coffee-960-span-6 container container-2 no-padding">
		<div class="row"> 
			<div class="coffee-span-12" style="padding:20px;"> 
			  <h6><span class="heading-text-6">SHOP NOW</span> 
			  </h6> 
			  <div class="rule rule-7"> 
				<hr> 
			  </div> 
			</div> 
		</div>
		<ul id="" class="sidebar-cats">
			<?php if(isset($this->categories[0])):?>
			<?php foreach($this->categories[0] as $cat_menu):?>
			<li  <?php echo $cat_menu->active ? 'class="active"' : false; ?> id="" class=""> 
				<a href="<?php echo site_url($cat_menu->slug);?>">
					<span class="icon_menu_handle"></span>
					<span class="text_menu_link"><?php echo $cat_menu->name;?></span>
				</a>
			</li>
		<?php endforeach;?>
		<?php endif; ?> 
		</ul>
	</div>
	<div class="coffee-span-10">


 
<div class="row row-1 bodbottom whitebg">
  <div class="coffee-span-4 coffee-603-span-12">
			<div class="responsive-picture picture-1">
			<ul class="rslides" id="slider3">
			<?php
                $photo  = '<img src="'.base_url('uploads/images/thumbnails/no-image.png').'" class="img-responsive productimg" alt=""/>';
                $product->images    = array_values($product->images); 
				if(!empty($product->images[0])){
                    $primary    = $product->images[0]; 
                    foreach($product->images as $photo){ 
					?>
					<li><img src="<?php echo base_url('uploads/images/full/'.$photo->filename); ?>" alt="<?php echo $photo->alt; ?>"><p class="caption"><?php echo $photo->caption; ?></p></li>
					<?php
                    } 
				}
            ?> 
			</ul>
			<ul id="slider3-pager">
			<?php
                $photo  = '<img src="'.base_url('uploads/images/thumbnails/no-image.png').'" class="img-responsive productimg" alt=""/>';
                $product->images    = array_values($product->images); 
				if(!empty($product->images[0])){
                    $primary    = $product->images[0]; 
                    foreach($product->images as $photo){ 
					?>
					<li><a href="#"><img src="<?php echo base_url('uploads/images/thumbnails/'.$photo->filename); ?>" alt="<?php echo $photo->alt; ?>"></a></li>
					<?php
                    } 
				}
            ?> 
			</ul> 
			</div> 
  </div>
  <div class="coffee-span-8 coffee-603-span-12">
    <div class="container">
      <div class="subgrid">
        <div class="row">
          <div class="coffee-span-12 subgrid-column-18">
            <h6><span class="heading-text-1"><?php echo $product->name;?></span> </h6>
          </div>
        </div>
        <div class="row">
          <div class="coffee-span-12 subgrid-column-17"> <span class="text-element text-4"><span class="text-text-4">#<?php echo $product->sku; ?></span> </span> </div>
        </div>
        <div class="row">
          <div class="coffee-span-12 subgrid-column-12">
            <div class="rule rule-6">
              <hr>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="coffee-span-12 productdesc">
            <?php echo $product->description; ?>
          </div>
        </div>
        <div class="row">
          <div class="coffee-span-12">
            <h6>
			<span class="heading-text-8">
				<?php echo format_currency(getSalePrice($product->id)); ?>
			</span> 
			
			</h6>
          </div>
        </div>
        <div class="row"> 
		<form action="<?php echo site_url('cart/add_to_cart'); ?>" id="addtoCartForm" name="" class="form-horizontal" method="POST">
          <input type="hidden" name="cartkey" value="<?php echo $this->session->flashdata('cartkey');?>" />
          <input type="hidden" name="id" value="<?php echo $product->id?>"/>
          <?php if(count($options) > 0): ?>
          <?php foreach($options as $option):
                            $required   = '';
                            if($option->required)
                            {
                                $required = ' <p class="help-block">Required</p>';
                            }
                            ?>
          <div class="control-group">
            <label class="control-label"><?php echo $option->name;?></label>
            <?php 
                                if($option->type == 'checklist')
                                {
                                    $value  = array();
                                    if($posted_options && isset($posted_options[$option->id]))
                                    {
                                        $value  = $posted_options[$option->id];
                                    }
                                }
                                else
                                {
                                    if(isset($option->values[0]))
                                    {
                                        $value  = $option->values[0]->value;
                                        if($posted_options && isset($posted_options[$option->id]))
                                        {
                                            $value  = $posted_options[$option->id];
                                        }
                                    }
                                    else
                                    {
                                        $value = false;
                                    }
                                }
                                if($option->type == 'textfield'):?>
            <div class="controls">
              <input type="text" name="option[<?php echo $option->id;?>]" value="<?php echo $value;?>" class="span4"/>
              <?php echo $required;?> </div>
            <?php elseif($option->type == 'textarea'):?>
            <div class="controls">
              <textarea class="span4" name="option[<?php echo $option->id;?>]"><?php echo $value;?></textarea>
              <?php echo $required;?> </div>
            <?php elseif($option->type == 'droplist'):?>
            <div class="controls">
              <select name="option[<?php echo $option->id;?>]">
                <option value=""><?php echo lang('choose_option');?></option>
                <?php foreach ($option->values as $values):
                                            $selected   = '';
                                            if($value == $values->id)
                                            {
                                                $selected   = ' selected="selected"';
                                            }?>
                <option<?php echo $selected;?> value="<?php echo $values->id;?>"> <?php echo($values->price != 0)?' (+'.format_currency($values->price).') ':''; echo $values->name;?> </option>
                <?php endforeach;?>
              </select>
              <?php echo $required;?> </div>
            <?php elseif($option->type == 'radiolist'):?>
            <div class="controls">
              <?php foreach ($option->values as $values):
                                            $checked = '';
                                            if($value == $values->id)
                                            {
                                                $checked = ' checked="checked"';
                                            }?>
              <label class="radio">
                <input<?php echo $checked;?> type="radio" name="option[<?php echo $option->id;?>]" value="<?php echo $values->id;?>"/>
                <?php echo($values->price != 0)?'(+'.format_currency($values->price).') ':''; echo $values->name;?> </label>
              <?php endforeach;?>
              <?php echo $required;?> </div>
            <?php elseif($option->type == 'checklist'):?>
            <div class="controls">
              <?php foreach ($option->values as $values):
                                            $checked = '';
                                            if(in_array($values->id, $value))
                                            {
                                                $checked = ' checked="checked"';
                                            }?>
              <label class="checkbox">
                <input<?php echo $checked;?> type="checkbox" name="option[<?php echo $option->id;?>][]" value="<?php echo $values->id;?>"/>
                <?php echo($values->price != 0)?'('.format_currency($values->price).') ':''; echo $values->name;?> </label>
              <?php endforeach; ?>
            </div>
            <?php echo $required;?>
            <?php endif;?>
          </div>
          <?php endforeach;?>
          <?php endif;?>
		  <div style="clear:both;height:20px;"></div>
		  <style>
			#qtywarning{font-family:"Poppins",cursive;color:red;font-size:14px;display:none;}
		  </style>
		  <div id="qtywarning">Quantity must be numeric &amp; greater then zeor.</div>
		  <div style="clear:both;height:10px;"></div>
          <div class="coffee-span-2 coffee-533-span-4">
            <input value="1" name="quantity" id="quantity" type="number" style="margin:13px 0;">
          </div>  
          <div class="coffee-span-4 coffee-533-span-8"><a class="link-button button-link-2" style="cursor: pointer;" role="button" onclick="add_to_cart(<?php echo $product->id; ?>)">ADD TO CART</a> </div>
          </form>
          <div class="coffee-span-6 coffee-533-span-12 subgrid-column-13"></div>
        </div>
        <div class="row">
          <div class="coffee-span-6 coffee-1024-span-6 coffee-414-span-12">
		   <?php if(checkFavourite($product->id)==0){ ?>
			<a onclick="addToFavourite(<?php echo $product->id;?>)" class="link-button-glyph button-link-icon-5"><span class="glyph-for-button icon-for-button-link-4"><i class="coffeecup-icons-heart4"></i></span><span class="link-button-text text-for-button-link-5">ADD TO FAVORITES</span></a> 
			<?php }else{ ?> 
			<a onclick="removeFromFavourite(<?php echo $product->id;?>)" class="link-button-glyph button-link-icon-5"><span style="color:#E0245E;"  class="glyph-for-button icon-for-button-link-4"><i class="coffeecup-icons-heart4"></i></span><span class="link-button-text text-for-button-link-5">REMOVE FROM FAVORITES</span></a> 
			<?php } ?>  
		  
		  </div>
          <div class="coffee-span-4 coffee-1024-span-2 coffee-414-span-12 subgrid-column-16"></div>
          <div class="coffee-span-4 coffee-414-span-12 subgrid-column-15"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row row-1 bodtop whitebg">
  <div class="coffee-span-12 column-2">
  
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">SPEC</a></li>
    <li><a href="#tabs-2">DOWNLOADS</a></li>
    <li><a href="#tabs-3">FAQs</a></li>
  </ul>
  <div id="tabs-1">
    <p><?php echo $product->specifications;?></p>
  </div>
  <div id="tabs-2">
    
	<ul class="pdffiles">
	<?php
		if(!empty($productfiles)){
			foreach($productfiles as $pfiles){
			?>
				<li><a href="<?php echo base_url(); ?>uploads/images/media/<?php echo $pfiles->file_path; ?>" title="Download <?php echo $pfiles->title; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/img/pdf.png" alt="" class="pdficon" /><?php echo $pfiles->title; ?></a></li>
			<?php	
			}
		}
	?>
	</ul>
	
  </div>
  <div id="tabs-3">
    <p><?php echo $product->faqs;?></p>
  </div>
</div>
  
<!-- ################## --> 
<?php if(!empty($product->related_products)):?>
<div class="coffee-span-12 column-8">
    <h5><span class="heading-text-7">RELATED PRODUCTS</span> </h5>
    <div class="rule rule-7a">
      <hr>
    </div>  
</div>

<?php 
$pcounter = 1;
foreach($product->related_products as $product):
?> 
<?php
$photo  = theme_img('no_picture.png', lang('no_image_available'));
$product->images    = array_values((array)json_decode($product->images)); //array_values($product->images);

if(!empty($product->images[0]))
{
	$primary    = $product->images[0]; 
	foreach($product->images as $photo)
	{
		if(isset($photo->primary))
		{
			$primary    = $photo;
		}
	} 
   // $photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" alt="'.$product->seo_title.'"/>'; 
	$img_src = "'.base_url('uploads/images/thumbnails/'.$primary->filename').'";
}
?>
    <div class="coffee-span-3 coffee-960-span-4 coffee-533-span-6 coffee-414-span-12">
      <div class="container container-2c minh">
		<a href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>">
        <div class="subgrid subgrid-2">
          <div class="row">
			<?php
                $photo  = '<img src="'.base_url('uploads/images/thumbnails/no-image.png').'" class="img-responsive productimg" alt="'.$product->seo_title.'"/>';
                $product->images    = array_values($product->images); 
				if(!empty($product->images[0])){
                    $primary    = $product->images[0]; 
                    foreach($product->images as $photo){
                    if(isset($photo->primary)){
                        $primary    = $photo;
                    }
                    } 
					$photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" class="img-responsive productimg" alt="'.$product->seo_title.'"/>';
                }
            ?> 
            <div class="coffee-span-12"><picture><?php echo $photo; ?></picture>
            </div> 
          </div>
          <div class="row">
            <div class="coffee-span-12">
              <h6 class="heading-6 product-title"><span class="heading-text-5"><?php echo $product->name;?></span>
              </h6>  
			  <span class="text-element"><span class="text-text-20">#<?php echo $product->sku;?></span>
              </span>
              <h6>
			  <span class="heading-text-9">
			  <?php echo format_currency(getSalePrice($product->id)); ?>
			  </span>
              </h6>
            </div>
          </div>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-1"><a class="glyph font-icon-link-2" href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>" title="More Information"><i class="coffeecup-icons-zoom-in2"></i></a>
            </div>
            <div class="coffee-span-4 subgrid-column-10">
			  <form id="cartform_<?php echo $product->id; ?>" class="form-horizontal addtocart productsall" action="<?php echo site_url('cart/add_to_cart'); ?>" method="POST"> 
			  <input type="hidden" name="cartkey" value="<?php echo $this->session->flashdata('cartkey'); ?>" />
			  <input type="hidden" name="id" value="<?php echo $product->id; ?>" />
			  <input value="1" name="number-name" type="hidden"> 
			  </form>
			<a class="glyph font-icon-link-2" onclick="submitcartform(<?php echo $product->id; ?>)" title="Add to Cart"><i class="coffeecup-icons-cart5"></i></a>
			
			
            </div>
            <div id="favouriteproducticon_<?php echo $product->id;?>" class="coffee-span-4 subgrid-column-11">
			<?php if(checkFavourite($product->id)==0){ ?>
			<a class="glyph font-icon-link-2" onclick="addToFavourite(<?php echo $product->id;?>)" title="Add to Favorites"><i class="coffeecup-icons-heart4"></i></a> 
			<?php }else{ ?>
			<a style="color:#E0245E;" class="glyph font-icon-link-2" onclick="removeFromFavourite(<?php echo $product->id;?>)" title="Remove From Favorites"><i class="coffeecup-icons-heart4"></i></a>
			<?php } ?>
            </div>
          </div>
        </div>
		</a>
      </div>
    </div>
	<?php   if($pcounter==4){echo '<div style="clear:both;height:20px;"></div>'; $pcounter=0; } ?>
	<?php $pcounter++; ?>
<?php  endforeach; ?>
<?php endif;?> 
  </div>
</div>

	</div>
</div>
<div style="clear:both;height:30px;"></div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/product-slides/responsiveslides.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>


   
   
<script>
  $( function() {
    $( "#tabs" ).tabs();
	$("#slider3").responsiveSlides({
		manualControls: '#slider3-pager',
		maxwidth: 540
	});
  });
var specialKeys = new Array();
specialKeys.push(8); //Backspace
function IsNumeric(e) {
	var keyCode = e.which ? e.which : e.keyCode
	var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
	//document.getElementById("error").style.display = ret ? "none" : "inline";
	return ret;
} 
</script> 
<script>
function add_to_cart(productid){
	var qty = $("#quantity").val();
	if(isNaN(qty)===true || qty<=0){
		$("#qtywarning").fadeIn();
	}else{
		$("#qtywarning").fadeOut();
		$("#overlay").fadeIn();
		$("#loader").fadeIn();
		$('#addtoCartForm').ajaxSubmit({
			success: function(data) {
				$("#addtocart_response").html(data);
				$("#overlay").fadeOut();
				$("#loader").fadeOut();
				window.scroll(0,0);
				var currentitems = parseInt($("#cartitemstotal").val());
				var newcartitems = currentitems+1;
				console.log(newcartitems);
				$("#spancarttotalitems").html('CART: '+newcartitems+' ITEMS');
				$("#cartitemstotal").val(newcartitems);
		} 
		}); 
	}
}
</script> 
<script type="text/javascript">
function addToFavourite(productid){
	$("#overlay").fadeIn();
	$("#loader").fadeIn();
	$.post("<?php echo site_url('favourites/addfavourite'); ?>",{productid:productid}).done(function(data){ 
		$("#overlay").fadeOut();
		$("#loader").fadeOut();
		location.reload();
	});
}
function removeFromFavourite(productid){
	var confirmation = confirm('You want to remove this product from favourite list.');
	if(confirmation===true){
		$("#overlay").fadeIn();
		$("#loader").fadeIn();
		$.post("<?php echo site_url('favourites/removefavourite'); ?>",{productid:productid}).done(function(data){ 
			$("#overlay").fadeOut();
			$("#loader").fadeOut();
			location.reload();
		});
	}
}
function submitcartform(productid){
	//$("#cartform_"+productid).submit(); 
	$("#overlay").fadeIn();
	$("#loader").fadeIn();
	var quantity  = 1;
	$.post("<?php echo site_url('cart/add_to_cart'); ?>",{id:productid,quantity:quantity}).done(function(data){ 
		$("#addtocart_response").html(data);
		$("#overlay").fadeOut();
		$("#loader").fadeOut();
		window.scroll(0,0);
		var currentitems = parseInt($("#cartitemstotal").val());
		var newcartitems = currentitems+quantity;
		$("#spancarttotalitems").html('CART: '+newcartitems+' ITEMS');
		$("#cartitemstotal").val(newcartitems)
	});
}
</script>
