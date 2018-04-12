<style>
.text-text-10{
	margin-top:11px;
	float:left;
}
.tempdefault{font-family:"Poppins",cursive;font-weight:600;font-size:16px;color:green;float:right;margin-top:31px;display:none;}
</style>
<div id="all-address-popup">
<div class="coffee-span-12 coffee-800-span-12 coffee-1024-span-12">

      <div class="container container-2">

        <div class="subgrid">
		<div class="row subgrid-row-1">

            <div class="coffee-span-2 coffee-414-span-3 subgrid-column-56"><span class="glyph font-icon-1"><i class="coffeecup-icons-location"></i></span>

            </div>

            <div class="coffee-span-10 coffee-414-span-9">
				<img src="<?php echo base_url(); ?>assets/img/close-icon.png" alt="CLOSE" id="closeid" onclick="closeAddAddressPopup()">
              <h6 class="heading-5"><span class="heading-text-2">YOUR ADDRESSES</span></h6>
			  <p class="paragraph paragraph-5"><span class="paragraph-text-3">&nbsp;</span></p>

              <div class="rule rule-6">

                <hr>

              </div>

            </div>

          </div>
		<a style="width:19%;float:right;" onclick="addNewAddress()" class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class=" coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4">ADD NEW</span></a>
		<div class="row" style="height:500px;overflow-y:scroll;">
			<?php // Load Customer Addresses
				$this->load->model('customer_model');
				$customer = $this->go_cart->customer();
				$useraddresses = $this->customer_model->getCustomerAddresses($customer['id']);
			?>
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
                <span class="text-element text-5" style="margin-top:0px;">  
					<?php if($adr->tmp_default=='Y'){ ?>
					<img src="<?php echo base_url(); ?>assets/img/default.jpg" alt="Default Image" class="defaultimg" style="margin-top:33px;" />
					<a style="width:23%;float:right;" onclick="editAddress(<?php echo $adr->id; ?>)" class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class="coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4">EDIT</span></a>
					<?php }else{ ?>
					<a style="width:34%;" onclick="markTempDefault(<?php echo $adr->id; ?>)" class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class=" coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4">SELECT</span></a>
					<a style="width:23%;float:right;" onclick="editAddress(<?php echo $adr->id; ?>)" class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class="coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4">EDIT</span></a>
					<?php } ?>
					<div id="tempdefaultid_<?php echo $adr->id; ?>" class="tempdefault">Please wait....</div>
				</span>
                </span>
              </div>
            </div>
			<?php } ?>
			<?php } ?>
        </div>  
		  
        </div>

      </div>

    </div>
</div>