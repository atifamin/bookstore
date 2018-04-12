<style>.pull-right{float:right !important;}.text-element div{font-family:"Poppins",cursive;}p.update-cart-text{font-family:"Poppins",cursive;font-size:13px;color:#004f7c;}</style>
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
              <span class="text-element"><span class="text-text-12">&nbsp;</span>
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
				foreach ($this->go_cart->contents() as $cartkey=>$product):
		  ?>		
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
				<span class="text-element">
						<?php echo $product['excerpt'];
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
						?>
				</span>
			</div>
			<div class="coffee-span-2 subgrid-column-62 coffee-800-span-2 coffee-414-span-12">
				<span class="text-element">
						<?php if($this->uri->segment(1) == 'cart'): ?>
							<?php if(!(bool)$product['fixed_quantity']):?>
								<div class="control-group">
									<div class="controls">
										<div class="input-append">
											<input class="span1 qtyinps" style="margin:0px;" name="cartkey[<?php echo $cartkey;?>]"  value="<?php echo $product['quantity'] ?>" type="text"><button class="btn btn-danger productremovebtn" type="button" onclick="if(confirm('<?php echo lang('remove_item');?>')){window.location='<?php echo site_url('cart/remove_item/'.$cartkey);?>';}">X</button>
										</div>
									</div>
								</div>
							<?php else:?>
								<?php echo $product['quantity'] ?>
								<input type="hidden" name="cartkey[<?php echo $cartkey;?>]" value="1"/>
								<button class="btn btn-danger" type="button" onclick="if(confirm('<?php echo lang('remove_item');?>')){window.location='<?php echo site_url('cart/remove_item/'.$cartkey);?>';}"><i class="icon-remove icon-white"></i></button>
							<?php endif;?>
						<?php else: ?>
							<?php echo $product['quantity'] ?>
						<?php endif;?>
				</span>
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
		  <?php if($this->go_cart->group_discount() > 0)  : ?>
		  <div class="row"> 
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right">
				<h6>
					<span class="heading-text-3" style="color:#000;">
						<?php echo format_currency($this->go_cart->group_discount()); ?>
					</span>
				</h6>
			</div>
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right">
				<h6>
					<span class="heading-text-3" style="color:#000;">
						<?php echo lang('group_discount'); ?>
					</span>
				</h6>
			</div>
		  </div>
		  <?php endif; ?>
		  
		  <div class="row"> 
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right"><h6><span class="heading-text-3" style="color:#000;"><?php echo format_currency($this->go_cart->subtotal()); ?></span></h6></div>
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right"><h6><span class="heading-text-3" style="color:#000;">SUB TOTAL</span></h6></div>
		  </div>
		  
		  <?php if($this->config->item('tax_shipping') && $this->go_cart->shipping_cost()>0) : ?>
		  <div class="row"> 
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right">
				<h6>
					<span class="heading-text-3" style="color:#000;">
						<?php echo format_currency($this->go_cart->shipping_cost()); ?>
					</span>
				</h6>
			</div>
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right">
				<h6>
					<span class="heading-text-3" style="color:#000;">
						<?php echo lang('shipping');?>
					</span>
				</h6>
			</div>
		  </div>
		  <?php endif; ?>
		  
		  <?php if($this->go_cart->order_tax() > 0) : ?>
		  <div class="row"> 
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right">
				<h6>
					<span class="heading-text-3" style="color:#000;">
						<?php echo format_currency($this->go_cart->order_tax());?>
					</span>
				</h6>
			</div>
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right">
				<h6>
					<span class="heading-text-3" style="color:#000;">
						<?php echo lang('tax');?>
					</span>
				</h6>
			</div>
		  </div>
		  <?php endif; ?>
		  
		  <?php if(!$this->config->item('tax_shipping') && $this->go_cart->shipping_cost()>0) : ?>
		  <div class="row"> 
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right">
				<h6>
					<span class="heading-text-3" style="color:#000;">
						<?php echo format_currency($this->go_cart->shipping_cost()); ?>
					</span>
				</h6>
			</div>
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right">
				<h6>
					<span class="heading-text-3" style="color:#000;">
						<?php echo lang('shipping');?>
					</span>
				</h6>
			</div>
		  </div>
		  <?php endif; ?>
		  
		  <?php if($this->go_cart->gift_card_discount() > 0) : ?>
		  <div class="row"> 
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right">
				<h6>
					<span class="heading-text-3" style="color:#000;">
						<?php echo format_currency($this->go_cart->gift_card_discount()); ?>
					</span>
				</h6>
			</div>
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right">
				<h6>
					<span class="heading-text-3" style="color:#000;">
						<?php echo lang('gift_card_discount');?>
					</span>
				</h6>
			</div>
		  </div>
		  <?php endif; ?>
		  
		  
		   
		  <!--<div class="row"> 
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right"><h6><span class="heading-text-3" style="color:#000;"><?php echo format_currency($this->go_cart->total()); ?></span></h6></div>
			<div class="coffee-span-2 subgrid-column-9 coffee-603-span-12 pull-right"><h6><span class="heading-text-3" style="color:#000;">GRAND TOTAL</span></h6></div>
		  </div>-->
		   
		  
		  <?php if($this->uri->segment(2)!='step_2'){ ?>
          <div class="row subgrid-row-3">
			<div class="coffee-span-3 coffee-533-span-4 coffee-414-span-12">
				<button class="link-button button-link-1 formtbns checkoutformbtn" role="button" type="submit" value="<?php echo lang('form_update_cart');?>"><?php echo lang('form_update_cart');?></button> 
            </div>
            <div class="coffee-span-3 coffee-533-span-12 subgrid-column-64"></div>
            <div class="coffee-span-3 subgrid-column-38 coffee-533-span-4 coffee-414-span-12"></div> 
			<input id="redirect_path" type="hidden" name="redirect" value=""/>
            <div class="coffee-span-3 coffee-533-span-4 coffee-414-span-12">
				<button class="link-button button-link-1  formtbns checkoutformbtn" role="button" type="submit" onclick="$('#redirect_path').val('checkout');" value="<?php echo lang('form_checkout');?>"><?php echo lang('form_checkout');?></button>
            </div>
          </div>
		  <div class="row subgrid-row-3">
			<div class="coffee-span-6 coffee-533-span-4 coffee-414-span-12">
				<p class="update-cart-text">To continue shopping, make a selection in the Shop By Category dropdown in the blue menu bar above</p>
			</div>
		  </div>
		  <?php } ?>
		  
        </div>
      </div>
    </div>
  </div>






	<!--<table class="table table-striped table-bordered"> 
		
		<tfoot>
			<?php
			/**************************************************************
			Subtotal Calculations
			**************************************************************/
			?>
			<?php if($this->go_cart->group_discount() > 0)  : ?> 
        	<tr>
				<td colspan="5"><strong><?php echo lang('group_discount');?></strong></td>
				<td>-<?php echo format_currency($this->go_cart->group_discount()); ?></td>
			</tr>
			<?php endif; ?>
			<tr>
		    	<td colspan="5"><strong><?php echo lang('subtotal');?></strong></td>
				<td id="gc_subtotal_price"><?php echo format_currency($this->go_cart->subtotal()); ?></td>
			</tr>
				
				
			<?php if($this->go_cart->coupon_discount() > 0) {?>
		    <tr>
		    	<td colspan="5"><strong><?php echo lang('coupon_discount');?></strong></td>
				<td id="gc_coupon_discount">-<?php echo format_currency($this->go_cart->coupon_discount());?></td>
			</tr>
				<?php if($this->go_cart->order_tax() != 0) { // Only show a discount subtotal if we still have taxes to add (to show what the tax is calculated from)?> 
				<tr>
		    		<td colspan="5"><strong><?php echo lang('discounted_subtotal');?></strong></td>
					<td id="gc_coupon_discount"><?php echo format_currency($this->go_cart->discounted_subtotal());?></td>
				</tr>
				<?php
				}
			} 
			/**************************************************************
			 Custom charges
			**************************************************************/
			$charges = $this->go_cart->get_custom_charges();
			if(!empty($charges))
			{
				foreach($charges as $name=>$price) : ?>
					
			<tr>
				<td colspan="5"><strong><?php echo $name?></strong></td>
				<td><?php echo format_currency($price); ?></td>
			</tr>	
					
			<?php endforeach;
			}	
			
			/**************************************************************
			Order Taxes
			**************************************************************/
			 // Show shipping cost if added before taxes
			if($this->config->item('tax_shipping') && $this->go_cart->shipping_cost()>0) : ?>
			<tr>
				<td colspan="5"><strong><?php echo lang('shipping');?></strong></td>
				<td><?php echo format_currency($this->go_cart->shipping_cost()); ?></td>
			</tr>
			<?php endif;
			if($this->go_cart->order_tax() > 0) :  ?>
		    <tr>
		    	<td colspan="5"><strong><?php echo lang('tax');?></strong></td>
				<td><?php echo format_currency($this->go_cart->order_tax());?></td>
			</tr>
			<?php endif; 
			// Show shipping cost if added after taxes
			if(!$this->config->item('tax_shipping') && $this->go_cart->shipping_cost()>0) : ?>
				<tr>
				<td colspan="5"><strong><?php echo lang('shipping');?></strong></td>
				<td><?php echo format_currency($this->go_cart->shipping_cost()); ?></td>
			</tr>
			<?php endif ?>
			
			<?php
			/**************************************************************
			Gift Cards
			**************************************************************/
			if($this->go_cart->gift_card_discount() > 0) : ?>
			<tr>
				<td colspan="5"><strong><?php echo lang('gift_card_discount');?></strong></td>
				<td>-<?php echo format_currency($this->go_cart->gift_card_discount()); ?></td>
			</tr>
			<?php endif; ?>
			
			<?php
			/**************************************************************
			Grand Total
			**************************************************************/
			?>
			<tr>
				<td colspan="5"><strong><?php echo lang('grand_total');?></strong></td>
				<td><?php echo format_currency($this->go_cart->total()); ?></td>
			</tr>
		</tfoot>
		
		<tbody>
			<?php
			$subtotal = 0;

			foreach ($this->go_cart->contents() as $cartkey=>$product):?>
				<tr>
					<td><?php echo $product['sku']; ?></td>
					<td><?php echo $product['name']; ?></td>
					<td><?php echo format_currency($product['price']);?></td>
					<td>
						<?php echo $product['excerpt'];
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
							?>
					</td>
					
					<td style="white-space:nowrap">
						<?php if($this->uri->segment(1) == 'cart'): ?>
							<?php if(!(bool)$product['fixed_quantity']):?>
								<div class="control-group">
									<div class="controls">
										<div class="input-append">
											<input class="span1" style="margin:0px;" name="cartkey[<?php echo $cartkey;?>]"  value="<?php echo $product['quantity'] ?>" size="3" type="text"><button class="btn btn-danger" type="button" onclick="if(confirm('<?php echo lang('remove_item');?>')){window.location='<?php echo site_url('cart/remove_item/'.$cartkey);?>';}"><i class="icon-remove icon-white"></i></button>
										</div>
									</div>
								</div>
							<?php else:?>
								<?php echo $product['quantity'] ?>
								<input type="hidden" name="cartkey[<?php echo $cartkey;?>]" value="1"/>
								<button class="btn btn-danger" type="button" onclick="if(confirm('<?php echo lang('remove_item');?>')){window.location='<?php echo site_url('cart/remove_item/'.$cartkey);?>';}"><i class="icon-remove icon-white"></i></button>
							<?php endif;?>
						<?php else: ?>
							<?php echo $product['quantity'] ?>
						<?php endif;?>
					</td>
					<td><?php echo format_currency($product['price']*$product['quantity']); ?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table> -->