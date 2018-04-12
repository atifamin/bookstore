<div id="edit-address-popup"></div>
<!--Content page-->
  <div class="row">

    <div class="coffee-span-12 column-7"></div>

  </div>

  <div class="row">

    <div class="coffee-span-12 column-8">

      <h5><span class="heading-text-7">ADDRESS DETAILS</span>

      </h5>

      <div class="rule rule-7a">

        <hr>

      </div>

    </div>

  </div>
<div class="row">
    <div class="coffee-span-12">
      <span class="text-element text-6"><span class="text-text-7"><a title="" href="<?php echo site_url(); ?>">HOME</a> &gt; ADDRESS DETAILS</span>
      </span>
    </div>
</div>
  <div class="row row-5">

    <div class="coffee-span-7 coffee-800-span-12 coffee-960-span-6">

      <div class="container container-2a">

        <div class="subgrid">
          <div class="row">
            <div class="coffee-span-2 coffee-414-span-3 subgrid-column-56"><span class="glyph font-icon-1"><i class="coffeecup-icons-location"></i></span>
            </div>
            <div class="coffee-span-10 coffee-414-span-9">
              <h6 class="heading-5"><span class="heading-text-2">STORE LOCATION</span></h6>
			  <p class="paragraph paragraph-5"><span class="paragraph-text-3"><?php echo $AddressDetail->business_name; ?></span></p>
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="coffee-span-12">
              <span class="text-element"><span class="text-text-11"><?php echo $AddressDetail->address1; ?> <?php echo $AddressDetail->address2; ?> <?php echo $AddressDetail->city; ?>, <?php echo $state->code; ?> <?php echo $AddressDetail->zip; ?> </span>
              </span>
              <p class="paragraph paragraph-3">
                <font face="Poppins, cursive"><span><span class="paragraph-text-8">Phone:</span> <?php echo $AddressDetail->phone; ?></span>
                </font>
              </p>
              <p class="paragraph paragraph-3">
                <font face="Poppins, cursive"><span><span class="paragraph-text-7">Email:</span> <?php echo $AddressDetail->email; ?></span>
                </font>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="coffee-span-12 subgrid-column-31">
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div> 
          <div class="row">
            <div class="coffee-span-12 coffee-414-span-12 coffee-533-span-12">
              <span class="text-element text-5"> 
					<a onclick="updateAddress(<?php echo $AddressDetail->id; ?>)" class="text-text-6">EDIT </a> | 
					<a href="<?php echo site_url('account/deleteaddress'); ?>/<?php echo $AddressDetail->id; ?>" class="text-text-6">DELETE </a> |
					<?php if($AddressDetail->default=='Y'){ ?>
					<img src="<?php echo base_url(); ?>assets/img/default.jpg" alt="Default Image" class="defaultimg" />
					<?php }else{ ?>
					<a href="<?php echo site_url('account/setasdefault'); ?>/<?php echo $AddressDetail->id; ?>" class="text-text-6">SET AS DEFAULT </a>
					<?php } ?>
				</span>
            </div>
          </div>
        </div>

      </div>

      <div class="container container-2">

        <div class="subgrid subgrid-7">

          <div class="row">

            <div class="coffee-span-12">

              <h6><span class="heading-text-6">RECENT PURCHASES ALL LOCATIONS</span>

              </h6>

              <div class="rule rule-7">

                <hr>

              </div>

            </div>

          </div>
		<?php if(!empty($getRecentOrders)){ ?> 
		<?php foreach($getRecentOrders as $RO){ ?>
          <div class="row">
            <div class="coffee-span-4 subgrid-column-35">
              <h6 class="heading-4"><span class="heading-text-10"><?php echo  date('m/d/Y',strtotime($RO->ordered_on));?></span>
              </h6>
            </div>
            <div class="coffee-span-4 subgrid-column-36">
              <h6 class="heading-3"><span class="heading-text-10">PO <?php echo $RO->po_number; ?></span>
              </h6>
            </div>
            <div class="coffee-span-4 subgrid-column-37">
              <h6 class="heading-2"><span class="heading-text-10">$<?php echo number_format($RO->total,2); ?></span>
              </h6>
            </div>
          </div>

          <div class="row subgrid-row-3">
            <div class="coffee-span-9 subgrid-column-38 coffee-414-span-8">
              <p class="paragraph paragraph-4"><span class="paragraph-text-5">Shipped to: <?php echo $RO->ship_address1; ?> <?php echo $RO->ship_address2; ?> <?php echo $RO->ship_city; ?>, <?php echo $RO->ship_zone; ?> <?php echo $RO->ship_zip; ?></span>
              </p>
            </div>
            <div class="coffee-span-3 subgrid-column-39 coffee-414-span-4"><a class="link-button button-link-1" role="button" href="<?php echo site_url('myorders/orderDetail'); ?>/<?php echo $RO->id; ?>">DETAILS</a>
            </div>
          </div>

          <div class="row">
            <div class="coffee-span-12 subgrid-column-38">
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div> 
		<?php } ?>  
		
		  <div class="row">
            <div class="coffee-span-12"><a class="link-button button-link-4" role="button" href="<?php echo site_url('myorders'); ?>"><span class="button-link-text-1">VIEW ALL ORDERS</span></a>
            </div>
          </div>
		<?php } ?>
        </div>

      </div>

    </div>

    <div class="coffee-span-5 coffee-800-span-12 coffee-960-span-6">

      <div class="container container-2">

        <div class="subgrid">

          <div class="row">

            <div class="coffee-span-12">

              <h6><span class="heading-text-6">MY FAVORITES</span>

              </h6>

              <div class="rule rule-7">

                <hr>

              </div>

            </div>

          </div>

          <div class="row">
			<?php if(!empty($Favourites)){ ?>
			<?php $fpcount = 1; ?>
			<?php foreach($Favourites as $fp){ ?>
            <div class="coffee-span-4 <?php if($fpcount==3){echo 'subgrid-column-2';}else{echo 'subgrid-column-32';} ?> coffee-414-span-12"><a href="<?php echo site_url(); ?><?php echo $fp->slug; ?>" class="responsive-picture">
				<?php
					$photo  = '<img src="'.base_url('uploads/images/thumbnails/no-image.png').'" class="img-responsive productimg" alt=""/>';
					$fp->images    =  array_values((array)json_decode($fp->images));//array_values($fp->images); 
					if(!empty($fp->images[0])){
						$primary    = $fp->images[0]; 
						foreach($fp->images as $photo){
						if(isset($photo->primary)){
							$primary    = $photo;
						}
						} 
						$photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" class="img-responsive productimg" alt=""/>';
					}
				?>
				<picture><?php echo $photo; ?></picture>
			</a>

              <span class="text-element text-12"><span class="text-text-19">#<?php echo $fp->sku; ?></span>

              </span>

              <h6 style="min-height:100px;"><span class="heading-text-5"><?php echo $fp->name; ?></span>

              </h6>

              <h6><span class="heading-text-9">$<?php echo number_format($fp->saleprice,2); ?></span>

              </h6>
			  
			  <?php echo form_open('cart/add_to_cart', 'class="form-horizontal addtocart"');?>
			  <input type="hidden" name="cartkey" value="<?php echo $this->session->flashdata('cartkey'); ?>" />
			  <input type="hidden" name="id" value="<?php echo $fp->productid; ?>" />
			  <input value="1" name="number-name" type="hidden">
			  <button type="submit" class="link-button button-link-3" role="button">ADD TO CART</button>
			  </form>

            </div>
			<?php if($fpcount==3){echo '<div class="row"><div class="coffee-span-12 subgrid-column-34"><div class="rule rule-6"><hr></div></div></div>'; $fpcount = 0;} ?> 
			<?php $fpcount++; ?>
			<?php } ?>
			<?php } ?> 

          </div> 


        </div>

      </div>

    </div>

  </div>

  <div class="row">

    <div class="coffee-span-12 column-2"></div>

  </div>
<script>
function showAddAddressPopup(){
	$("#overlay").fadeIn();
	$("#add-address-popup").slideDown();
}
function closeAddAddressPopup(){
	$("#overlay").fadeOut();
	$("#add-address-popup").slideUp();
	$("#edit-address-popup").slideUp();
	$("#edit-address-popup").html('');
}

function updateAddress(addressid){
	$("#overlay").fadeIn();
	$("#edit-address-popup").slideDown();
	$.post("<?php echo site_url('account/editaddress'); ?>",{addressid:addressid}).done(function(data){
		$("#edit-address-popup").html(data);
	});
}
</script>  

