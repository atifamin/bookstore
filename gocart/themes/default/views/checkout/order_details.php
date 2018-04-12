<?php include "all-address-popup.php"; ?>
<?php include APPPATH."themes/default/views/add-address-popup.php"; ?>
<div class="row">
<div class="coffee-span-12 coffee-800-span-12 coffee-1024-span-12">
      <div class="container container-2a">
        <div class="subgrid">
          <div class="row subgrid-row-1">
            <div class="coffee-span-2 coffee-414-span-3 subgrid-column-56"><span class="glyph font-icon-1"><i class="coffeecup-icons-location"></i></span>
            </div>
            <div class="coffee-span-10 coffee-414-span-9">
              <h6 class="heading-5"><span class="heading-text-2">YOUR ADDRESS INFORMATION</span></h6>
			  <p class="paragraph paragraph-5"><span class="paragraph-text-3">&nbsp;</span></p>
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div>
          <div class="row">
			<?php /*if(!empty($customer['bill_address'])):?>
			<div class="coffee-span-6 coffee-533-span-12"> 
              <div class="container container-1">			
                <span class="text-element"><span class="text-text-5">Billing Address</span>
                </span>
                <p class="paragraph paragraph-1">
				<span class="paragraph-text-4">
					Address: <?php echo format_address($customer['bill_address'], true);?><br />
					Phone: <?php echo $customer['bill_address']['phone'];?><br>
					Email: <?php echo $customer['bill_address']['email'];?><br>
				</span>
                </p>
                <span class="text-element text-5">
				<a href="<?php echo site_url('account');?>" class="text-text-6">
				<!--<a href="<?php echo site_url('checkout/step_1');?>" class="text-text-6">-->
				<?php 
					if($customer['bill_address'] != @$customer['ship_address']){echo lang('billing_address_button');}else{echo lang('address_button');}
				?>
				</a>
				</span>                
              </div>
            </div>
			<?php endif;*/ ?>
			<?php if(config_item('require_shipping')):?>
			<?php if($this->go_cart->requires_shipping()):?>
			<div class="coffee-span-6 coffee-533-span-12"> 
              <div class="container container-1">			
                <span class="text-element"><span class="text-text-5">Shipping Address</span>
                </span>
                <p class="paragraph paragraph-1">
				<span class="paragraph-text-4">
					Address: <?php echo $customer['ship_address']['address1'];
								if ($customer['ship_address']['address2']!=''){
									echo ", ".$customer['ship_address']['address2'];
								}
								echo ", ".$customer['ship_address']['city'].' '.$customer['ship_address']['zone'].' '.$customer['ship_address']['zip'];
							?><br />
					
					Phone: <?php echo $customer['ship_address']['phone'];?><br>
					Email: <?php echo $customer['ship_address']['email'];?><br>
				</span>
                </p>
                <span class="text-element text-5">
				<!-- <a href="<?php echo site_url('checkout/shipping_address');?>" class="text-text-6"> -->
				<?php $customer = $this->go_cart->customer(); ?>
				<a onclick="openAddressPopup(<?php echo $customer['id']; ?>)" class="text-text-6"><?php echo lang('shipping_address_button');?></a>
				</span>
				
				<?php if(!empty($shipping_method) && !empty($shipping_method['method'])):?>
				<div class="span3">
					<p><a href="<?php echo site_url('checkout/step_2');?>" class="btn btn-block"><?php echo lang('shipping_method_button');?></a></p>
					<strong><?php echo lang('shipping_method');?></strong><br/>
					<?php echo $shipping_method['method'].': '.format_currency($shipping_method['price']);?>
				</div>
				<?php endif;?>
				<?php if(!empty($payment_method)):?>
					<div class="span3">
						<p><a href="<?php echo site_url('checkout/step_3');?>" class="btn btn-block"><?php echo lang('billing_method_button');?></a></p>
						<?php echo $payment_method['description'];?>
					</div>
				<?php endif;?>
              </div>
            </div>
			<?php endif;?>
			<?php endif;?>			
			</div>
          <div class="row">
            <div class="coffee-span-12 subgrid-column-31"></div>
          </div>        

        </div>
      </div>
    </div>
</div>

<!--
<div class="row">
	<?php if(!empty($customer['bill_address'])):?>
	<div class="span3">
		<a href="<?php echo site_url('checkout/step_1');?>" class="btn btn-block">
		
			<?php if($customer['bill_address'] != @$customer['ship_address'])
			{
				echo lang('billing_address_button');
			}
			else
			{
				echo lang('address_button');
			}
			?>
		</a>

		<p>
			<?php echo format_address($customer['bill_address'], true);?>
		</p>
		<p>
			<?php echo $customer['bill_address']['phone'];?><br/>
			<?php echo $customer['bill_address']['email'];?>
		</p>
	</div>
	<?php endif;?>

<?php if(config_item('require_shipping')):?>
	<?php if($this->go_cart->requires_shipping()):?>
		<div class="span3">
			<a href="<?php echo site_url('checkout/shipping_address');?>" class="btn btn-block"><?php echo lang('shipping_address_button');?></a>
			<p>
				<?php echo format_address($customer['ship_address'], true);?>
			</p>
			<p>
				<?php echo $customer['ship_address']['phone'];?><br/>
				<?php echo $customer['ship_address']['email'];?><br/>
			</p>
		</div>

		<?php
		
		if(!empty($shipping_method) && !empty($shipping_method['method'])):?>
		<div class="span3">
			<p><a href="<?php echo site_url('checkout/step_2');?>" class="btn btn-block"><?php echo lang('shipping_method_button');?></a></p>
			<strong><?php echo lang('shipping_method');?></strong><br/>
			<?php echo $shipping_method['method'].': '.format_currency($shipping_method['price']);?>
		</div>
		<?php endif;?>
	<?php endif;?>
<?php endif;?>

<?php if(!empty($payment_method)):?>
	<div class="span3">
		<p><a href="<?php echo site_url('checkout/step_3');?>" class="btn btn-block"><?php echo lang('billing_method_button');?></a></p>
		<?php echo $payment_method['description'];?>
	</div>
<?php endif;?>
</div> -->
<div id="mark_temp_default_response"></div>
<script type="text/javascript">
function openAddressPopup(customerid){
	$("#overlay").fadeIn();
	$("#all-address-popup").slideDown();
}
function closeAddAddressPopup(){
	$("#overlay").fadeOut();
	$("#all-address-popup").slideUp();
	$("#add-address-popup").slideUp();
}
function markTempDefault(addressid){
	$("#tempdefaultid_"+addressid).fadeIn();
	$.post("<?php echo site_url('account/markAsTempDefault'); ?>",{addressid:addressid}).done(function(data){
		$("#mark_temp_default_response").html(data); 
	});
}
// ----
function editAddress(addressid){
	$.post("<?php echo site_url('account/editaddress'); ?>",{addressid:addressid}).done(function(data){
		$("#all-address-popup").html(data); 
	});
}
function addNewAddress(){
	$("#all-address-popup").slideUp();
	$("#add-address-popup").slideDown();
}
</script>