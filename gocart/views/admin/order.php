<?php
	$ShowToMng='';
	if(isset($_GET['AccessToken']) && $_GET['AccessToken']=='kasdfji329sdfakafsdfks42'){
		$ShowToMng = 'No';
	}
?>
<div class="row">
    <div class="span12">
        <div class="btn-group pull-right">
		<?php if($ShowToMng==''){ ?>
            <a class="btn" title="<?php echo lang('send_email_notification');?>" onclick="$('#notification_form').slideToggle();"><i class="icon-envelope"></i> <?php echo lang('send_email_notification');?></a>
		<?php } ?>	
            <a class="btn" href="<?php echo site_url('admin/orders/packing_slip/'.$order->id);?>" target="_blank"><i class="icon-file"></i><?php echo lang('packing_slip');?></a>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#content_editor').redactor({
        minHeight: 200,
        imageUpload: 'http://labs.gocartdv.com/gc2test/admin/wysiwyg/upload_image',
        fileUpload: 'http://labs.gocartdv.com/gc2test/admin/wysiwyg/upload_file',
        imageGetJson: 'http://labs.gocartdv.com/gc2test/admin/wysiwyg/get_images',
        imageUploadErrorCallback: function(json)
        {
            alert(json.error);
        },
        fileUploadErrorCallback: function(json)
        {
            alert(json.error);
        }
    });
    calculateGrandTotal(); 
});

// store message content in JS to eliminate the need to do an ajax call with every selection
var messages = <?php
    $messages   = array();
    foreach($msg_templates as $msg)
    {
        $messages[$msg['id']]= array('subject'=>$msg['subject'], 'content'=>$msg['content']);
    }
    echo json_encode($messages);
    ?>;
//alert(messages[3].subject);
// store customer name information, so names are indexed by email
var customer_names = <?php 
        echo json_encode(array(
        $order->email=>$order->firstname.' '.$order->lastname,
        $order->ship_email=>$order->ship_firstname.' '.$order->ship_lastname,
        $order->bill_email=>$order->bill_firstname.' '.$order->bill_lastname
    ));
?>;
// use our customer names var to update the customer name in the template
function update_name()
{
    if($('#canned_messages').val().length>0)
    {
        set_canned_message($('#canned_messages').val());
    }
}

function set_canned_message(id)
{
    // update the customer name variable before setting content 
    $('#msg_subject').val(messages[id]['subject'].replace(/{customer_name}/g, customer_names[$('#recipient_name').val()]));
    $('#content_editor').redactor('insertHtml', messages[id]['content'].replace(/{customer_name}/g, customer_names[$('#recipient_name').val()]));
}   
</script>
<div style="clear:both;height:20px;"></div>
<div id="notification_form" class="row" style="display:none;">
    <div class="span12">
        <?php echo form_open($this->config->item('admin_folder').'/orders/send_notification/'.$order->id);?> 
            <fieldset> 
                <label><?php echo lang('message_templates');?></label>
                <select id="canned_messages" onchange="set_canned_message(this.value)" class="span12">
                    <option><?php echo lang('select_canned_message');?></option>
                    <?php foreach($msg_templates as $msg)
                    {
                        echo '<option value="'.$msg['id'].'">'.$msg['name'].'</option>';
                    }
                    ?>
                </select>

                <label><?php echo lang('recipient');?></label>
                <select name="recipient" onchange="update_name()" id="recipient_name" class='span12'>
                    <?php 
                        if(!empty($order->email))
                        {
                            echo '<option value="'.$order->email.'">'.lang('account_main_email').' ('.$order->email.')';
                        }
                        if(!empty($order->ship_email))
                        {
                            echo '<option value="'.$order->ship_email.'">'.lang('shipping_email').' ('.$order->ship_email.')';
                        }
                        if($order->bill_email != $order->ship_email)
                        {
                            echo '<option value="'.$order->bill_email.'">'.lang('billing_email').' ('.$order->bill_email.')';
                        }
                    ?>
                </select>

                <label><?php echo lang('subject');?></label>
                <input type="text" name="subject" size="40" id="msg_subject" class="span12"/>

                <label><?php echo lang('message');?></label>
                <textarea id="content_editor" name="content"></textarea>

                <div class="form-actions">
                    <input type="submit" class="btn btn-primary" value="<?php echo lang('send_message');?>" />
                </div>
            </fieldset>
        </form>
    </div>
</div>
<div class="row">
	<div class="span12">
		<h4 style="background:#eee;padding:15px;">Order #: &nbsp; <?php echo $order->order_number; ?> <span style="float:right;">Order Date: &nbsp; <?php echo date('m/d/Y',strtotime($order->ordered_on)); ?></span></h4>
	</div>
</div>
<div class="row" style="margin-top:10px;">
<input type="hidden" id="orderid" value="<?php echo $order->id; ?>" />
    <div class="span4">
        <h4 style="background:#eee;padding:15px;"><?php echo lang('account_info');?></h4>
        <p>
        <?php echo (!empty($order->company))?$order->company.'<br>':'';?>
        <?php echo $order->firstname;?> <?php echo $order->lastname;?> <br/>
        <?php echo $order->email;?> <br/>
        <?php echo $order->phone;?>
        </p>
    </div>  
    <div class="span4">
        <h4 style="background:#eee;padding:15px;"><?php echo lang('shipping_address');?></h4>
        <?php //echo (!empty($order->ship_company))?$order->ship_company.'<br/>':'';?>
        <?php //echo $order->ship_firstname.' '.$order->ship_lastname;?> <br/>
        <?php echo $order->ship_address1;?><br>
        <?php echo (!empty($order->ship_address2))?$order->ship_address2.'<br/>':'';?>
        <?php echo $order->ship_city.', '.$order->ship_zone.' '.$order->ship_zip;?><br/>
        <?php echo $order->ship_country;?><br/>
        
        <?php //echo $order->ship_email;?><br/>
        <?php //echo $order->ship_phone;?>
    </div>
</div>

<div class="row" style="margin-top:20px;">
    <div class="span4">
        <h4 style="background:#eee;padding:15px;">PO No.#</h4>
        <p><?php echo $order->po_number;?></p>
    </div>
    <div class="span8">
        <h4 style="background:#eee;padding:15px;">Additional Instructions</h4>
        <p><?php echo $order->additional_instructions;?></p>
    </div> 
</div> 

<?php echo form_open($this->config->item('admin_folder').'/orders/order/'.$order->id, 'class="form-inline"');?>
<fieldset>
    <div class="row" style="margin-top:20px;">
        <div class="span8">
            <h4 style="background:#eee;padding:15px;"><?php echo lang('admin_notes');?></h4>
            <textarea name="notes" class="span8"><?php echo $order->notes;?></textarea>
        </div>

    
        <div class="span4">
            <h4 style="background:#eee;padding:15px;"><?php echo lang('status');?></h4>
			<?php if($ShowToMng==''){ ?>
			<?php
				$UserD = $this->session->all_userdata();
				$AdminAccess = $UserD['admin']['access']; 
			?>
			<select name="status" id="status_form_1" class="span2" style="float:left;">
				<?php if($AdminAccess=='Orders'){ ?>
				<option value="Order Placed" <?php if($order->status=='Order Placed'){echo 'selected="selected"';} ?>>Order Placed</option>
				<option value="Approved" <?php if($order->status=='Approved'){echo 'selected="selected"';} ?>>Approved</option>
				<option value="Cancelled" <?php if($order->status=='Cancelled'){echo 'selected="selected"';} ?>>Cancelled</option>
				<?php }elseif($AdminAccess=='Admin'){ ?>
				<option value="Approved" <?php if($order->status=='Approved'){echo 'selected="selected"';} ?>>Approved</option>
				<option value="Order Completed" <?php if($order->status=='Order Completed'){echo 'selected="selected"';} ?>>Order Completed</option> 
				<option value="Cancelled" <?php if($order->status=='Cancelled'){echo 'selected="selected"';} ?>>Cancelled</option>
				<?php } ?>
			</select>
			<?php }else{ ?>
			<?php echo $order->status; ?>
			<?php } ?>
            <?php
            //echo form_dropdown('status', $this->config->item('order_statuses'), $order->status, 'class="span4"');
            ?>
            
        </div>
    </div>
    
    <!--<div class="form-actions">
        <input type="submit" class="btn btn-primary" value="<?php echo lang('update_order');?>"/>
    </div> -->
</fieldset>
<div style="clear:both;height:30px;"></div>
<div class="row"><div class="span12"><h3 style="background:#eee;padding:15px;">Order Detail</h3></div></div>

<a class="btn pull-right" data-toggle="modal" data-target="#myModal" style="font-weight:normal;"><i class="icon-plus-sign"></i> Add New Product</a>
<?php
//echo '<pre>'; print_r($order->contents);
?>
<table id="ordertable" class="table table-striped">
    <thead>
        <tr>
            <th><?php echo lang('name');?></th>
            <th><?php echo lang('description');?></th>
            <th><?php echo lang('price');?></th>
            <th><?php echo lang('quantity');?></th>
            <th><?php echo lang('total');?></th>
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($order->contents as $orderkey=>$product):?>
        <tr id="product_row_<?php echo $product['id'];?>">
            <td>
                <?php echo $product['name'];?>
                <?php echo (trim($product['sku']) != '')?'<br/><small>'.lang('sku').': '.$product['sku'].'</small>':'';?>
                
            </td>
            <td>
                <?php //echo $product['excerpt'];?>
                <?php
                
                // Print options
				$includeInProductBasePrice = 0;
				$productId = $product['id'];
                if(!empty($product['options']))
                { 
                    foreach($product['options'] as $name=>$value)
                    {
                        $name = explode('-', $name);
                        $name = trim($name[0]);
                        if(is_array($value))
                        {
                            echo '<div class="c1">'.$name.':<br/>';
                            foreach($value as $item)
                            {
                                echo '- '.$item.'<br/>';
								$nameF = str_replace('#','-',$name);
								$nameF = str_replace(':','-',$nameF);
								$nameF = str_replace(';','-',$nameF);
								$nameF = str_replace('@','-',$nameF);
								$nameF = str_replace('$','-',$nameF);
								$nameF = str_replace('.','-',$nameF);
								$nameF = str_replace(' ','&nbsp',$nameF);
								echo '<input type="hidden" name="options['.$productId.']['.$nameF.'][]" value="'.$item.'" />';
								if(isset($item)){
									$addOn = explode('+$',$item);
									$addOnPrice = str_replace(')','',$addOn[1]); 
									$includeInProductBasePrice = $includeInProductBasePrice+$addOnPrice;
								}
                            }   
                            echo "</div>"; 
                        }
                        else
                        {
                            //echo '<div>'.$name.': '.$value.'</div>';
                            echo '<div class="c2">'.$value.'</div>';
							$nameF = str_replace('#','-',$name);
							$nameF = str_replace(':','-',$nameF);
							$nameF = str_replace(';','-',$nameF);
							$nameF = str_replace('@','-',$nameF);
							$nameF = str_replace('$','-',$nameF);
							$nameF = str_replace('.','-',$nameF);
							$nameF = str_replace(' ','&nbsp',$nameF);
							echo '<input type="hidden" name="options['.$productId.']['.$nameF.'][]" value="'.$value.'" />';
							if(isset($value)){
								$addOn = explode('+$',$value);
								$addOnPrice = str_replace(')','',$addOn[1]); 
								$includeInProductBasePrice = $includeInProductBasePrice+$addOnPrice;
							} 
                        } 
                    }
                } 
                if(isset($product['gc_status'])) echo $product['gc_status'];
                ?>
            </td>
            <td>
				<?php $newProductPrice = $includeInProductBasePrice+$product['price']; ?>
				<?php echo format_currency($product['price']);?>
				<input type="hidden" id="product_price_<?php echo $product['id'];?>" name="product_price[]" value="<?php echo $product['price'];?>" />
			</td>
            <td>
				<input type="number" onchange="quantitychanged(<?php echo $product['id'];?>)" onkeyup="quantitychanged(<?php echo $product['id'];?>)" id="product_qty_<?php echo $product['id'];?>" name="products_qty[]" value="<?php echo $product['quantity'];?>" style="width:35px;" /> 
			</td>
            <td>
				<input type="number" readonly="readonly" id="product_total_<?php echo $product['id'];?>" name="" value="<?php echo $product['price']*$product['quantity'] ?>" style="width:70px;" />  
			</td>
			<td>
				<a class="btn btn-danger" onclick="removeproduct(<?php echo $product['id'];?>)" title="Remove" onclick=""><i class="icon-trash icon-white"></i></a>
			</td>
			<input type="hidden" value="<?php echo $product['id'];?>" name="productsid[]" class="productids" />
        </tr>
        <?php endforeach;?>
        </tbody>
        <tfoot>
        <?php /*if($order->coupon_discount > 0):?>
        <tr>
            <td><strong><?php echo lang('coupon_discount');?></strong></td>
            <td colspan="3"></td>
            <td><?php echo format_currency(0-$order->coupon_discount); ?></td>
        </tr>
        <?php endif; */ ?>
        
        <tr>
            <td><strong><?php echo lang('subtotal');?></strong></td>
            <td colspan="3"></td>
            <td><div id="pricesubtotal"><?php echo '$ '.number_format($order->subtotal,2); ?></div></td>
        </tr>
        
        <?php 
		/*
        $charges = @$order->custom_charges;
        if(!empty($charges))
        {
            foreach($charges as $name=>$price) : ?>
                
        <tr>
            <td><strong><?php echo $name?></strong></td>
            <td colspan="3"></td>
            <td><?php echo format_currency($price); ?></td>
        </tr>   
                
        <?php endforeach;
        }
        ?>
        <tr>
            <td><strong><?php echo lang('shipping');?></strong></td>
            <td colspan="3"><?php echo $order->shipping_method; ?></td>
            <td><?php echo format_currency($order->shipping); ?></td>
        </tr>
        
        <tr>
            <td><strong><?php echo lang('tax');?></strong></td>
            <td colspan="3"></td>
            <td><?php echo format_currency($order->tax); ?></td>
        </tr>
        <?php if($order->gift_card_discount > 0):?>
        <tr>
            <td><strong><?php echo lang('giftcard_discount');?></strong></td>
            <td colspan="3"></td>
            <td><?php echo format_currency(0-$order->gift_card_discount); ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td><h3><?php echo lang('total');?></h3></td>
            <td colspan="3"></td>
            <td>
				<strong><div id="pricegrandtotal"><?php echo '$ '.number_format($order->total,2); ?></div></strong>
				
			</td>
        </tr>
        <?php */?>
    </tfoot>
</table>
<input type="hidden" id="grandtotal" name="grandtotal" value="<?php echo $order->total; ?>" />
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD NEW PRODUCT</h5>
        <button style="margin-top:-31px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="span2">Category</div>
			<div class="span2">
				<select onchange="getProducts($(this).val())">
					<option value="">Select Category</option>
					<?php foreach($categories as $row){ ?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div id="productsresponse"></div>
		<div id="productdetailresponse"></div>
      </div>
      <div class="modal-footer">
        <button id="buttonclose" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
        <button onclick="addNewProductToOrder()" type="button" class="btn btn-primary">ADD</button>
      </div>
    </div>
  </div>
</div>
<div class="form-actions">
	<input type="submit" class="btn btn-primary" value="<?php echo lang('update_order');?>"/>
</div>
</form>
<script type="text/javascript">
function quantitychanged(productid){
	var quantity = $("#product_qty_"+productid).val();
	var price    = $("#product_price_"+productid).val();
	var total    = parseInt(quantity)*parseFloat(price);
	var newtotal = total.toFixed(2);
	$("#product_total_"+productid).val(newtotal); 
	calculateGrandTotal();
}
function calculateGrandTotal(){
	var grandtotal = 0; 
	$(".productids").each(function(){
		var pid = $(this).val();
		var pprice = $("#product_total_"+pid).val(); 
		var amount = parseFloat(pprice);
		//amount = pprice.toFixed(2); 
		grandtotal = amount+grandtotal; 
	});
	grandtotal = grandtotal.toFixed(2);
	$("#pricegrandtotal").html("$"+grandtotal);
	$("#pricesubtotal").html("$"+grandtotal);
	$("#grandtotal").val(grandtotal);
}
function removeproduct(productid){
	var orderid = $("#orderid").val(); 
	$("#product_row_"+productid).remove();
	calculateGrandTotal();
}
function getProducts(catid){
	if(catid!=''){
		$.post("<?php echo site_url('admin/orders/getproducts'); ?>", {catid:catid}).done(function(data){ 
			$("#productsresponse").html(data);
		});
	}
}
function getProductDetail(pid){
	if(pid!=''){
		$.post("<?php echo site_url('admin/orders/getproductDetail'); ?>", {pid:pid}).done(function(data){ 
			$("#productdetailresponse").html(data);
		});
	}
}
function addNewProductToOrder(){
	var productid 	 = $("#newproduct_id").val();
	var productname  = $("#newproduct_name").val();
	var productsku   = $("#newproduct_sku").val();
	var productprice = $("#newproduct_saleprice").val();
	var productqty   = $("#newproduct_qty").val();
	var totalprice   = parseFloat(productprice)*parseInt(productqty);
	var totalprice   = totalprice.toFixed(2);
	
	var html = '<tr id="product_row_'+productid+'"><td>'+productname+'<br><small>SKU: '+productsku+'</small></td><td></td><td>$'+productprice+'<input id="product_price_'+productid+'" name="" value="'+productprice+'" type="hidden"></td><td><input onkeyup="quantitychanged('+productid+')" onchange="quantitychanged('+productid+')" id="product_qty_'+productid+'" name="products_qty[]" value="'+productqty+'" style="width:35px;" type="number"></td><td><input readonly="readonly" id="product_total_'+productid+'" name="" value="'+totalprice+'" style="width:70px;" type="number"></td><td><a class="btn btn-danger" onclick="removeproduct('+productid+')" title="Remove"><i class="icon-trash icon-white"></i></a></td><input name="productsid[]" value="'+productid+'" class="productids" type="hidden"></tr>';
	$("#ordertable").append(html);
	calculateGrandTotal();
	$("#buttonclose").trigger('click');
}

</script>