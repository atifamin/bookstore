<style>.pull-right{float:right !important;}</style>
<div class="row"> <div class="coffee-span-12 column-7"></div> </div>
<div class="row">
    <div class="coffee-span-12 column-8">
      <h5><span class="heading-text-7"><?php echo lang('order_number');?>: <?php echo $order_id;?></span>
      </h5>
      <div class="rule rule-7a">
        <hr>
      </div>
    </div>
  </div>

 
<?php
// content defined in canned messages
echo $download_section;
?>
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
			<div class="coffee-span-4 coffee-533-span-12"> 
              <div class="container container-1">			
                <span class="text-element"><span class="text-text-5"><?php echo lang('account_information');?></span>
                </span>
                <p class="paragraph paragraph-1">
				<span class="paragraph-text-4"> 
					<?php echo (!empty($customer['company']))?$customer['company'].'<br/>':'';?>
					<?php echo $customer['firstname'];?> <?php echo $customer['lastname'];?><br/>
					Email: <?php echo $customer['email'];?> <br/>
					Phone: <?php echo $customer['phone'];?>
				</span>
                </p>                 
              </div>
            </div> 
			<?php
			$ship = $customer['ship_address'];
			$bill = $customer['bill_address'];
			?>
			<div class="coffee-span-4 coffee-533-span-12"> 
              <div class="container container-1">			
                <span class="text-element"><span class="text-text-5">Shipping Information<?php //echo ($ship != $bill)?lang('shipping_information'):lang('shipping_and_billing');?></span>
                </span>
                <p class="paragraph paragraph-1">
				<span class="paragraph-text-4"> 
			  	Address: <?php echo $ship['address1'];
								if ($ship['address2']!=''){
									echo ", ".$ship['address2'];
								}
							?><br />
					Email: <?php echo $ship['email'];?> <br/>
					Phone: <?php echo $ship['phone'];?>
				</span>
                </p>                 
              </div>
            </div>
			<?php /*if($ship != $bill):?>
			<div class="coffee-span-4 coffee-533-span-12"> 
              <div class="container container-1">			
                <span class="text-element"><span class="text-text-5"><?php echo lang('billing_information');?></span>
                </span>
                <p class="paragraph paragraph-1">
				<span class="paragraph-text-4"> 
					Address: <?php echo format_address($bill, TRUE);?><br/>
					Email: <?php echo $bill['email'];?> <br/>
					Phone: <?php echo $bill['phone'];?>
				</span>
                </p>                 
              </div>
            </div>	
			<?php endif;*/ ?>	
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
<div class="coffee-span-12 coffee-800-span-12 coffee-1024-span-12">
      <div class="container container-2a">
        <div class="subgrid">
          <div class="row subgrid-row-1">
            <div class="coffee-span-2 coffee-414-span-3 subgrid-column-56"><span class="glyph font-icon-1"><i class="coffeecup-icons-location"></i></span>
            </div>
            <div class="coffee-span-10 coffee-414-span-9">
              <h6 class="heading-5"><span class="heading-text-2">YOUR ADDITIONAL INFORMATION</span></h6>
			  <p class="paragraph paragraph-5"><span class="paragraph-text-3">&nbsp;</span></p>
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div>
          <div class="row"> 
			<div class="coffee-span-4 coffee-533-span-12"> 
              <div class="container container-1">			
                <span class="text-element"><span class="text-text-5"><?php echo lang('additional_details');?></span>
                </span>
                <p class="paragraph paragraph-1">
				<span class="paragraph-text-4"> 
					<?php if(!empty($referral)):?><?php echo lang('heard_about');?><?php echo $referral;?><?php endif;?>
					<?php if(!empty($shipping_notes)):?><?php echo lang('shipping_instructions');?><?php echo $shipping_notes;?><?php endif;?>
				</span>
                </p>                 
              </div>
            </div>
			<div class="coffee-span-4 coffee-533-span-12"> 
              <div class="container container-1">			
                <span class="text-element"><span class="text-text-5"><?php echo lang('shipping_method');?></span>
                </span>
                <p class="paragraph paragraph-1">
				<span class="paragraph-text-4"> 
					<?php echo $shipping['method']; ?>
				</span>
                </p>                 
              </div>
            </div>
			<div class="coffee-span-4 coffee-533-span-12"> 
              <div class="container container-1">			
                <span class="text-element"><span class="text-text-5"><?php echo lang('payment_information');?></span>
                </span>
                <p class="paragraph paragraph-1">
				<span class="paragraph-text-4"> 
					<?php echo $payment['description']; ?>
				</span>
                </p>                 
              </div>
            </div>			
			</div>
          <div class="row">
            <div class="coffee-span-12 subgrid-column-31"></div>
          </div>        

        </div>
      </div>
    </div>
</div> -->
<div class="row row-5">
    <div class="coffee-span-12 coffee-800-span-12 coffee-1024-span-12">
      <div class="container container-2">
        <div class="subgrid subgrid-7">
          <div class="row">
            <div class="coffee-span-12 subgrid-column-31">
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div>
          <div class="row subgrid-row-2">
            <div class="coffee-span-2 subgrid-column-19 coffee-800-span-3 coffee-414-span-12 coffee-603-span-6">
              <span class="text-element"><span class="text-text-12">SKU</span>
              </span> 
            </div>
            <div class="coffee-span-2 subgrid-column-59 coffee-414-span-12 coffee-603-span-6">
              <span class="text-element"><span class="text-text-12">NAME</span>
              </span> 
            </div>
            <div class="coffee-span-2 subgrid-column-60 coffee-800-span-3 coffee-414-span-12 coffee-603-span-6">
              <span class="text-element"><span class="text-text-12">PRICE</span>
              </span> 
            </div>
            <div class="coffee-span-2 subgrid-column-61 coffee-414-span-12 coffee-603-span-6">
              <span class="text-element"><span class="text-text-12">DESCRIPTION</span>
              </span> 
            </div>
			<div class="coffee-span-2 subgrid-column-61 coffee-414-span-12 coffee-603-span-6">
              <span class="text-element"><span class="text-text-12">QTY</span>
              </span> 
            </div>
			<div class="coffee-span-2 subgrid-column-61 coffee-414-span-12 coffee-603-span-6">
              <span class="text-element"><span class="text-text-12">TOTAL</span>
              </span> 
            </div>
          </div>
          <div class="row">
            <div class="coffee-span-12 subgrid-column-31">
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div>
		  
		  	<?php
				$subtotal = 0;
				foreach ($go_cart['contents'] as $cartkey=>$product): ?>	
          <div class="row">
			<div class="coffee-span-2 subgrid-column-62 coffee-800-span-2 coffee-414-span-12">
				<span class="text-element">#<?php echo $product['sku']; ?></span>
			</div>
			<div class="coffee-span-2 subgrid-column-62 coffee-800-span-2 coffee-414-span-12">
				<span class="text-element"><a title="<?php echo $product['name']; ?>" href="<?php echo site_url(); ?><?php echo $product['slug']; ?>"><?php echo $product['name']; ?></a>
              </span></span>
			</div>
			<div class="coffee-span-2 subgrid-column-62 coffee-800-span-2 coffee-414-span-12">
				<span class="text-element"><span class="text-text-13"><?php echo format_currency($product['price']);?></span></span>
			</div>
			<div class="coffee-span-2 subgrid-column-62 coffee-800-span-2 coffee-414-span-12">
				<span class="text-element"><?php echo $product['excerpt'];
				if(isset($product['options'])) {
					foreach ($product['options'] as $name=>$value)
					{
						if(is_array($value))
						{
							echo '<div><span class="gc_option_name">'.$name.':</span><br/>';
							foreach($value as $item)
								echo '- '.$item.'<br/>';
							echo '</div>';
						} 
						else 
						{
							echo '<div><span class="gc_option_name">'.$name.':</span> '.$value.'</div>';
						}
					}
				}
				?></span>
			</div>
			<div class="coffee-span-2 subgrid-column-62 coffee-800-span-2 coffee-414-span-12">
				<span class="text-element"><?php echo $product['quantity']; ?></span>
			</div>
			<div class="coffee-span-2 subgrid-column-62 coffee-800-span-2 coffee-414-span-12">
				<span class="text-element"><span class="text-text-13"><?php echo format_currency($product['price']*$product['quantity']); ?></span></span>
			</div>
          </div> 
		  <?php endforeach; ?>	
		  

		  
          <div class="row">
            <div class="coffee-span-12 subgrid-column-38">
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div>
		  		  
		  <div class="row"> 
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right"><h6><span class="heading-text-3" style="color:#000;"><?php echo format_currency($go_cart['subtotal']); ?></span></h6></div>
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right"><h6><span class="heading-text-3" style="color:#000;">SUB TOTAL</span></h6></div>
		  </div>
		  <!--<div class="row"> 
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right"><h6><span class="heading-text-3" style="color:#000;"><?php echo format_currency($go_cart['total']); ?></span></h6></div>
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right"><h6><span class="heading-text-3" style="color:#000;">GRAND TOTAL</span></h6></div>
		  </div> -->
        </div>
      </div>
    </div>
  </div>

<!--<div class="row">
	<div class="span4">
		<h3><?php echo lang('account_information');?></h3>
		<?php echo (!empty($customer['company']))?$customer['company'].'<br/>':'';?>
		<?php echo $customer['firstname'];?> <?php echo $customer['lastname'];?><br/>
		<?php echo $customer['email'];?> <br/>
		<?php echo $customer['phone'];?>
	</div>
	<?php
	$ship = $customer['ship_address'];
	$bill = $customer['bill_address'];
	?>
	<div class="span4">
		<h3><?php echo ($ship != $bill)?lang('shipping_information'):lang('shipping_and_billing');?></h3>
		<?php echo format_address($ship, TRUE);?><br/>
		<?php echo $ship['email'];?><br/>
		<?php echo $ship['phone'];?>
	</div>
	<?php if($ship != $bill):?>
	<div class="span4">
		<h3><?php echo lang('billing_information');?></h3>
		<?php echo format_address($bill, TRUE);?><br/>
		<?php echo $bill['email'];?><br/>
		<?php echo $bill['phone'];?>
	</div>
	<?php endif;?>
</div> -->
<!--
<div class="row">
	<div class="span4">
		<h3><?php echo lang('additional_details');?></h3>
		<?php
		if(!empty($referral)):?><div><strong><?php echo lang('heard_about');?></strong> <?php echo $referral;?></div><?php endif;?>
		<?php if(!empty($shipping_notes)):?><div><strong><?php echo lang('shipping_instructions');?></strong> <?php echo $shipping_notes;?></div><?php endif;?>
	</div>

	<div class="span4">
		<h3 style="padding-top:10px;"><?php echo lang('shipping_method');?></h3>
		<?php echo $shipping['method']; ?>
	</div>
	
	<div class="span4">
		<h3><?php echo lang('payment_information');?></h3>
		<?php echo $payment['description']; ?>
	</div>
	
</div> -->
<!--
<table class="table table-bordered table-striped" style="margin-top:20px;">
	<thead>
		<tr>
			<th style="width:10%;"><?php echo lang('sku');?></th>
			<th style="width:20%;"><?php echo lang('name');?></th>
			<th style="width:10%;"><?php echo lang('price');?></th>
			<th><?php echo lang('description');?></th>
			<th style="width:10%;"><?php echo lang('quantity');?></th>
			<th style="width:8%;"><?php echo lang('totals');?></th>
		</tr>
	</thead>
	
	<tfoot>
		<?php if($go_cart['group_discount'] > 0)  : ?> 
		<tr>
			<td colspan="5"><strong><?php echo lang('group_discount');?></strong></td>
			<td><?php echo format_currency(0-$go_cart['group_discount']); ?></td>
		</tr>
		<?php endif; ?>

		<tr>
			<td colspan="5"><strong><?php echo lang('subtotal');?></strong></td>
			<td><?php echo format_currency($go_cart['subtotal']); ?></td>
		</tr>
		
		<?php if($go_cart['coupon_discount'] > 0)  : ?> 
		<tr>
			<td colspan="5"><strong><?php echo lang('coupon_discount');?></strong></td>
			<td><?php echo format_currency(0-$go_cart['coupon_discount']); ?></td>
		</tr>

		<?php if($go_cart['order_tax'] != 0) : // Only show a discount subtotal if we still have taxes to add (to show what the tax is calculated from) ?> 
		<tr>
			<td colspan="5"><strong><?php echo lang('discounted_subtotal');?></strong></td>
			<td><?php echo format_currency($go_cart['discounted_subtotal']); ?></td>
		</tr>
		<?php endif;

		endif; ?>
		<?php // Show shipping cost if added before taxes
		if($this->config->item('tax_shipping') && $go_cart['shipping_cost']>0) : ?>
		<tr>
			<td colspan="5"><strong><?php echo lang('shipping');?></strong></td>
			<td><?php echo format_currency($go_cart['shipping_cost']); ?></td>
		</tr>
		<?php endif ?>
		
		<?php if($go_cart['order_tax'] != 0) : ?> 
		<tr>
			<td colspan="5"><strong><?php echo lang('taxes');?></strong></td>
			<td><?php echo format_currency($go_cart['order_tax']); ?></td>
		</tr>
		<?php endif;?>
		
		<?php // Show shipping cost if added after taxes
		if(!$this->config->item('tax_shipping') && $go_cart['shipping_cost']>0) : ?>
		<tr>
			<td colspan="5"><strong><?php echo lang('shipping');?></strong></td>
			<td><?php echo format_currency($go_cart['shipping_cost']); ?></td>
		</tr>
		<?php endif;?>
		
		<?php if($go_cart['gift_card_discount'] != 0) : ?> 
		<tr>
			<td colspan="5"><strong><?php echo lang('gift_card');?></strong></td>
			<td><?php echo format_currency(0-$go_cart['gift_card_discount']); ?></td>
		</tr>
		<?php endif;?>
		<tr> 
			<td colspan="5"><strong><?php echo lang('grand_total');?></strong></td>
			<td><?php echo format_currency($go_cart['total']); ?></td>
		</tr>
	</tfoot>

	<tbody>
	<?php
	$subtotal = 0;
	foreach ($go_cart['contents'] as $cartkey=>$product): ?>
		<tr>
			<td><?php echo $product['sku'];?></td>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo format_currency($product['base_price']);   ?></td>
			<td><?php echo $product['excerpt'];
				if(isset($product['options'])) {
					foreach ($product['options'] as $name=>$value)
					{
						if(is_array($value))
						{
							echo '<div><span class="gc_option_name">'.$name.':</span><br/>';
							foreach($value as $item)
								echo '- '.$item.'<br/>';
							echo '</div>';
						} 
						else 
						{
							echo '<div><span class="gc_option_name">'.$name.':</span> '.$value.'</div>';
						}
					}
				}
				?></td>
			<td><?php echo $product['quantity'];?></td>
			<td><?php echo format_currency($product['price']*$product['quantity']); ?></td>
		</tr>
			
	<?php endforeach; ?>
	</tbody>
</table> -->