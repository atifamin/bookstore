<div class="row">
    <div class="coffee-span-12 column-7"></div>
</div>
<div class="row row-7">
    <div class="coffee-span-5 column-12 coffee-960-span-5 coffee-800-span-12">
      <h5><span class="heading-text-7">MY ORDERS</span>
      </h5>
      <div class="rule rule-7a">
        <hr>
      </div>
    </div>
    <!--<div class="coffee-span-4 column-10 coffee-960-span-4 coffee-800-span-9 coffee-533-span-6 coffee-320-span-12 coffee-376-span-12 coffee-768-span-8 coffee-603-span-8"><input value="" name="text-name" class="input-2" type="text">
    </div>
    <div class="coffee-span-3 column-11 coffee-533-span-6 coffee-320-span-12 coffee-376-span-12 coffee-768-span-4 coffee-603-span-4"><a href="#" class="link-button-glyph button-link-icon-2a"><span class="glyph-for-button"><i class="coffeecup-icons-search"></i></span><span class="link-button-text"><span class="text-for-button-link-text-2">SEARCH MY ORDERS</span></span></a>
    </div>-->
</div>
<div class="row">
    <div class="coffee-span-12">
      <span class="text-element text-6"><span class="text-text-7"><a title="" href="<?php echo site_url(); ?>">HOME</a>&nbsp;&gt;  <a href="<?php echo site_url('myorders'); ?>">MY ORDERS</a> &nbsp;&gt; ORDER DETAIL</span>
      </span>
    </div>
</div>
<div id="addtocart_response" class="row"></div>
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
              <span class="text-element"><span class="text-text-12">ORDER PLACED</span>
              </span>
              <span class="text-element"><?php echo date('m/d/Y',strtotime($getOrderDetail->ordered_on)); ?></span>
            </div>
            <div class="coffee-span-2 subgrid-column-59 coffee-414-span-12 coffee-603-span-6">
              <span class="text-element"><span class="text-text-12">TOTAL</span>
              </span>
              <span class="text-element">$<?php echo $getOrderDetail->total; ?></span>
            </div>
            <div class="coffee-span-4 subgrid-column-60 coffee-800-span-3 coffee-414-span-12 coffee-603-span-6">
              <span class="text-element"><span class="text-text-12">ORDER STATUS</span>
              </span>
              <span class="text-element"><?php if($getOrderDetail->shipped_on!='0000-00-00 00:00:00'){ echo date('m/d/Y',strtotime($getOrderDetail->shipped_on)); }else{ $OrderStatus = $getOrderDetail->status; if($OrderStatus=='Approved'){echo 'Processing';}elseif($OrderStatus=='Order Completed'){echo 'Approved and Shipped';}else{echo $OrderStatus;}} ?></span>
            </div>
            <div class="coffee-span-4 subgrid-column-61 coffee-414-span-12 coffee-603-span-6">
              <span class="text-element"><span class="text-text-12">PO # <?php echo $getOrderDetail->po_number; ?></span>
              </span> 
			  <span class="text-element"><span class="text-text-12">ORDER # <?php echo $getOrderDetail->order_number; ?></span>
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
			foreach($getOrderDetail->contents as $Det){
		  ?>
          <div class="row">
            <div class="coffee-span-1 subgrid-column-62 coffee-800-span-2 coffee-414-span-12">
              <div class="responsive-picture picture-3">
			  <?php
					$photo  = '<img src="'.base_url('uploads/images/thumbnails/no-image.png').'" class="img-responsive productimg" alt=""/>';
					$Det['images']    = array_values((array)json_decode($Det['images'])); 
					if(!empty($Det['images'][0])){
						$primary    = $Det['images'][0]; 
						foreach($Det['images'] as $photo){
						if(isset($photo->primary)){
							$primary    = $photo;
						}
						} 
						$photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" class="img-responsive productimg" alt=""/>';
					}
				?>
                <picture><?php echo $photo; ?></picture>
              </div>
            </div>
            <div class="coffee-span-8 subgrid-column-63 coffee-800-span-7 coffee-414-span-12">
              <span class="text-element"><a title="" href="<?php echo site_url(); ?><?php echo $Det['slug']; ?>"><?php echo $Det['name']; ?></a>
              </span>
              <span class="text-element">#<?php echo $Det['sku']; ?></span> 
			  
			  <?php  
                if(!empty($Det['options']))
                { 
                    foreach($Det['options'] as $name=>$value)
                    {
                        $name = explode('-', $name);
                        $name = trim($name[0]);
                        if(is_array($value))
                        {
                           echo '<span class="text-element"><span class="text-text-12"><strong>'.$name.':</strong></span><br/>';
                            foreach($value as $item)
                            {
                                echo '- '.$item.'<br/>'; 
                            }   
                            echo "</span>"; 
                        }
                        else
                        { 
                            echo '<span class="text-element">'.$value.'</span>';  
                        } 
                    }
                }  
                ?>
			  <span class="text-element"><span class="text-text-12"><strong>Price:</strong> <?php echo $Det['quantity']; ?> x $<?php echo number_format($Det['base_price'],2); ?> [<?php echo $Det['qualifier']; ?>]</span></span>
              <span class="text-element"><span class="text-text-13"><strong>Total:</strong> $<?php echo number_format($Det['subtotal'],2); ?></span>
              </span>
            </div> 
            <div class="coffee-span-3 coffee-414-span-12">
				<form id="cartform_<?php echo $Det['id']; ?>" class="form-horizontal addtocart productsall" action="<?php echo site_url('cart/add_to_cart'); ?>" method="POST"> 
				  <input type="hidden" name="cartkey" value="<?php echo $this->session->flashdata('cartkey'); ?>" />
				  <input type="hidden" name="id" value="<?php echo $Det['id']; ?>" />
				  <input value="1" name="number-name" type="hidden"> 
				</form>
				<a class="link-button button-link-6" role="button" href="<?php echo site_url(); ?><?php echo $Det['slug']; ?>">BUY AGAIN</a>
            </div>
          </div>
			<?php } ?>
          <div class="row">
            <div class="coffee-span-12 subgrid-column-31">
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div>  
		  <div class="row subgrid-row-3">
            <div class="coffee-span-12 subgrid-column-38 coffee-414-span-8">
				<span class="text-element"><span class="text-text-12">ADDITIONAL INSTRUCTIONS:</span></span>
				<p class="addinst"><?php echo $getOrderDetail->additional_instructions; ?></p>
			</div> 
          </div>
        </div>
		</div> 
	</div>
</div>
<script>
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