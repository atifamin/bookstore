<?php include "add-address-popup.php"; ?> 
<div id="edit-address-popup"></div> 
<div class="row">

    <div class="coffee-span-12 column-7"></div>

  </div>

  <div class="row">

    <div class="coffee-span-12 column-8">

      <h5><span class="heading-text-7">MY ACCOUNT</span>

      </h5>

      <div class="rule rule-7a">

        <hr>

      </div>

    </div>

  </div>
<div class="row">
    <div class="coffee-span-12">
      <span class="text-element text-6"><span class="text-text-7"><a title="" href="<?php echo site_url(); ?>">HOME</a> &gt; MY ACCOUNT</span>
      </span>
    </div>
</div>
  <div class="row row-5">

    <div class="coffee-span-9 coffee-800-span-12 coffee-1024-span-12">

      <div class="container container-2a">

        <div class="subgrid">
		  <div id="resetpassworddiv" class="row"></div>
		  <?php if(isset($_GET['error']) && $_GET['error']=='addressmissing'){ ?>
		  <div class="row">
			<div class="coffee-span-12">
			  <div class="container container-2b validations">
				<p>Your <strong>default</strong> address is missing, please enter to proceed with checkout.</p>
			  </div>
			</div>
		  </div>
		  <?php } ?>
          <div class="row subgrid-row-1">

            <div class="coffee-span-2 coffee-414-span-3 subgrid-column-56"><span class="glyph font-icon-1"><i class="coffeecup-icons-location"></i></span>

            </div>

            <div class="coffee-span-10 coffee-414-span-9">

              <h6 class="heading-5"><span class="heading-text-2">YOUR ADDRESSES</span></h6>
			  <p class="paragraph paragraph-5"><span class="paragraph-text-3">&nbsp;</span></p>

              <div class="rule rule-6">

                <hr>

              </div>

            </div>

          </div>

        <div class="row">
			<?php if(!empty($useraddresses)){ ?>
			<?php foreach($useraddresses as $adr){ ?>
            <div class="coffee-span-6 coffee-533-span-12"> 
              <div class="container container-1">			
                <span class="text-element"><span class="text-text-5"><?php echo $adr->business_name; ?></span>
                </span>
                <p class="paragraph paragraph-1">
				<span class="paragraph-text-4">
					Address: <?php echo $adr->address1; ?><br>
					<?php echo $adr->address2; ?><br>
					<?php echo $adr->city; ?> <?php echo $adr->code; ?>, <?php echo $adr->zip; ?><br>
					Phone: <?php echo $adr->phone; ?><br>
					Email: <?php echo $adr->email; ?><br>
				</span>
                </p>
                <span class="text-element text-5"> 
					<a onclick="updateAddress(<?php echo $adr->id; ?>)" class="text-text-6">EDIT </a> | 
					<a href="<?php echo site_url('account/deleteaddress'); ?>/<?php echo $adr->id; ?>" class="text-text-6">DELETE </a> |
					<?php if($adr->default=='Y'){ ?>
					<img src="<?php echo base_url(); ?>assets/img/default.jpg" alt="Default Image" class="defaultimg" />
					<?php }else{ ?>
					<a href="<?php echo site_url('account/setasdefault'); ?>/<?php echo $adr->id; ?>" class="text-text-6">SET AS DEFAULT </a>
					<?php } ?>
				</span>
                </span>
              </div>
            </div>
			<?php } ?>
			<?php } ?>
        </div>

          <div class="row">

            <div class="coffee-span-12 subgrid-column-31"></div>

          </div>

          

        </div>

      </div>

    </div>

    <div class="coffee-span-3 coffee-800-span-12 coffee-1024-span-12">

      <div class="container container-2">

        <div class="subgrid">

          <div class="row">

            <div class="coffee-span-12">

              <h6><span class="heading-text-6">QUICK LINKS</span>

              </h6>

              <div class="rule rule-7">

                <hr>

              </div>

            </div>

          </div> 

          <div class="row">

            <div class="coffee-span-12" onclick ="showAddAddressPopup()" class="coffee-span-12" style="cursor:pointer;"><a class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class=" coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4">ADD LOCATIONS</span></a>

            </div>

          </div>

          <div class="row">

            <div class="coffee-span-12"><a href="<?php echo site_url('favourites'); ?>" class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class="coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4">UPDATE FAVORITES</span></a>

            </div>

          </div>

          <div class="row">

            <div class="coffee-span-12"><a onclick="resetpassword()" class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class="coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4">RESET PASSWORD</span></a>

            </div>

          </div>

          <div class="row">

            <div class="coffee-span-12"><a href="<?php echo site_url(); ?>contact-us" class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class="coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4">CONTACT RRI</span></a>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  <div class="row">

    <div class="coffee-span-12">

      <div class="container container-2">

        <div class="subgrid subgrid-7">

          <div class="row">

            <div class="coffee-span-6 coffee-533-span-12">

              <h6><span class="heading-text-6">ORDER HISTORY</span>

              </h6>

              <div class="rule rule-7">

                <hr>

              </div>

            </div> 

          </div>

          <div class="row">

            <div class="coffee-span-12 subgrid-column-31">

              <div class="rule rule-6">

                <hr>

              </div>

            </div>

          </div>
		<?php if(!empty($getCustomerOrders)){ ?>
		<?php foreach($getCustomerOrders as $gcO){ ?>
          <div class="row">
            <div class="coffee-span-1 subgrid-column-44 coffee-414-span-2"><span class="glyph font-icon-3"><i class="coffeecup-icons-cart2"></i></span>
            </div>
            <div class="coffee-span-2 subgrid-column-53 coffee-414-span-3">
              <h6 class="heading-4"><span class="heading-text-10"><?php echo date('m/d/Y',strtotime($gcO->ordered_on)); ?></span>
              </h6>
            </div>
            <div class="coffee-span-3 subgrid-column-45 coffee-414-span-3 coffee-376-span-5">
              <h6 class="heading-3"><span class="heading-text-10">PO# <?php echo $gcO->po_number; ?></span>
              </h6>
            </div>
            <div class="coffee-span-2 subgrid-column-46 coffee-414-span-5 coffee-320-span-6">
              <h6 class="heading-3"><span class="heading-text-10">STATUS: <?php if($gcO->shipped_on!='0000-00-00 00:00:00'){ echo date('m/d/Y',strtotime($gcO->shipped_on)); }else{$OrderStatus = $gcO->status; if($OrderStatus=='Approved'){echo 'Processing';}elseif($OrderStatus=='Order Completed'){echo 'Approved and Shipped';}else{echo $OrderStatus;}} ?></span>
              </h6>
            </div>
			<div class="coffee-span-2 subgrid-column-46 coffee-414-span-5 coffee-320-span-6">
              <h6 class="heading-3"><span class="heading-text-10">ORDER#: <?php echo $gcO->order_number; ?></span>
              </h6>
            </div>
            <div class="coffee-span-2 subgrid-column-47 coffee-414-span-5 coffee-320-span-4">
              <h6 class="heading-2"><span class="heading-text-10">$<?php echo number_format($gcO->total,2); ?></span>
              </h6>
            </div>
          </div>
          <div class="row">
            <div class="coffee-span-12 subgrid-column-66">
              <span class="text-element"><span class="text-text-21">Shipped to: <?php echo $gcO->ship_address1; ?> <?php echo $gcO->ship_address2; ?> <?php echo $gcO->ship_city; ?>, <?php echo $gcO->ship_zone; ?> <?php echo $gcO->ship_zip; ?></span>
              </span>
            </div>
          </div>
		  <?php
			$OrderDetail = $this->order_model->get_order($gcO->id);
			foreach($OrderDetail->contents as $Det){
		  ?>
          <div class="row">
            <div class="coffee-span-1 subgrid-column-48 coffee-603-span-12"></div>
            <div class="coffee-span-2 subgrid-column-49 coffee-414-span-2 coffee-603-span-3">
              <span class="text-element text-1"><span class="text-text-2">#<?php echo $Det['sku']; ?></span>
              </span>
            </div>
            <div class="coffee-span-4 subgrid-column-50 coffee-414-span-4 coffee-603-span-3">
              <span class="text-element text-2"><span class="text-text-2"><?php echo $Det['name']; ?></span>
              </span>
            </div>
            <div class="coffee-span-1 subgrid-column-54">
              <span class="text-element text-13"><span class="text-text-2">QTY: <?php echo $Det['quantity']; ?></span>
              </span>
            </div>
            <div class="coffee-span-2 subgrid-column-51 coffee-603-span-3">
              <span class="text-element text-14"><span class="text-text-2">$<?php echo number_format($Det['base_price'],2); ?> <?php echo $Det['qualifier']; ?></span>
              </span>
            </div>
            <div class="coffee-span-2 subgrid-column-52">
              <span class="text-element text-15"><span class="text-text-2">$<?php echo number_format($Det['subtotal'],2); ?></span>
              </span>
            </div>
          </div>
			<?php } ?>

          <div class="row subgrid-row-3">
            <div class="coffee-span-9 subgrid-column-38 coffee-414-span-8">
				<span class="text-element"><span class="text-text-12">ADDITIONAL INSTRUCTIONS:</span></span>
				<p class="addinst"><?php echo $gcO->additional_instructions; ?></p>
			</div>
            <div class="coffee-span-3 coffee-414-span-4"><a class="link-button button-link-1" role="button" href="<?php echo site_url('myorders/orderDetail'); ?>/<?php echo $gcO->id; ?>">DETAILS</a>
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
		<?php } ?>
		<!-- ### -->  
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
function resetpassword(){
	$("#overlay").fadeIn(); 
	$.post("<?php echo site_url('account/resetpassword'); ?>",{}).done(function(data){
		$("#resetpassworddiv").html(data);
		$("#overlay").fadeOut();
	});
}
function updatepassword(){
	var newpass = $("#newpass").val();
	var connewpass = $("#connewpass").val();
	if(newpass==''){
		$("#validationresponse").html('<span style="color:red;">Please type password.</span>');
	}else if(connewpass==''){
		$("#validationresponse").html('<span style="color:red;">Confirm New Password.</span>');
	}else if(newpass!=connewpass){
		$("#validationresponse").html('<span style="color:red;">Password not matched.</span>');
	}else{
		$("#validationresponse").html('<span style="color:green;">Please wait...</span>');
		$("#overlay").fadeIn(); 
		$.post("<?php echo site_url('account/updatepassword'); ?>",{newpass:newpass}).done(function(data){
			$("#resetpassworddiv").html(data);
			$("#overlay").fadeOut();
		});
	}
}
</script>

  