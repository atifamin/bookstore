<div class="row">
    <div class="span12">
        <div class="btn-group pull-right"> 
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
            <h4 style="background:#eee;padding:15px;"><?php echo lang('status');?></h4>
			<?php echo $order->status; ?>
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
            <?php echo $order->notes;?>
        </div> 
    </div>
    
    <!--<div class="form-actions">
        <input type="submit" class="btn btn-primary" value="<?php echo lang('update_order');?>"/>
    </div> -->
</fieldset>
<div style="clear:both;height:30px;"></div>
<div class="row"><div class="span12"><h3 style="background:#eee;padding:15px;">Order Detail</h3></div></div>
 

<table id="ordertable" class="table table-striped">
    <thead>
        <tr>
            <th><?php echo lang('name');?></th>
            <th><?php echo lang('description');?></th>
            <th><?php echo lang('price');?></th>
            <th><?php echo lang('quantity');?></th>
            <th><?php echo lang('total');?></th> 
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
                if(isset($product['options']))
                {
                    foreach($product['options'] as $name=>$value)
                    {
                        $name = explode('-', $name);
                        $name = trim($name[0]);
                        if(is_array($value))
                        {
                            echo '<div>'.$name.':<br/>';
                            foreach($value as $item)
                            {
                                echo '- '.$item.'<br/>';
                            }   
                            echo "</div>";
                        }
                        else
                        {
                            echo '<div>'.$name.': '.$value.'</div>';
                        }
                    }
                }
                
                if(isset($product['gc_status'])) echo $product['gc_status'];
                ?>
            </td>
            <td>
				<?php echo format_currency($product['price']);?> 
			</td>
            <td><?php echo $product['quantity'];?></td>
            <td><?php echo $product['price']*$product['quantity'] ?></td>  
        </tr>
        <?php endforeach;?>
        </tbody>
        <tfoot> 
        
        <tr>
            <td><strong><?php echo lang('subtotal');?></strong></td>
            <td colspan="3"></td>
            <td><div id="pricesubtotal"><?php echo '$ '.number_format($order->subtotal,2); ?></div></td>
        </tr> 
        <tr>
            <td><h3><?php echo lang('total');?></h3></td>
            <td colspan="3"></td>
            <td>
				<strong><div id="pricegrandtotal"><?php echo '$ '.number_format($order->total,2); ?></div></strong>
				<input type="hidden" id="grandtotal" name="grandtotal" value="<?php echo $order->total; ?>" />
			</td>
        </tr>
    </tfoot>
</table>  
</form>