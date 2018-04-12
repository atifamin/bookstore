<div class="row"> <div class="coffee-span-12 column-7"></div> </div>
<div class="row">

    <div class="coffee-span-12 column-8">

      <h5><span class="heading-text-7"><?php echo lang('form_checkout');?></span>

      </h5>

      <div class="rule rule-7a">

        <hr>

      </div>

    </div>

  </div>
  
 
	
<?php include('order_details.php');?>
<?php include('summary.php');?>
<div class="row">
	<div class="coffee-span-12 coffee-800-span-12 coffee-1024-span-12">
      <div class="container container-2a">
        <div class="subgrid">
          <div class="row subgrid-row-1">
            <div class="coffee-span-2 coffee-414-span-3 subgrid-column-56"><span class="glyph font-icon-1"><i class="coffeecup-icons-file-check2"></i></span>
            </div>
            <div class="coffee-span-10 coffee-414-span-9">
              <h6 class="heading-5"><span class="heading-text-2">Purchase Order# / Additional Information</span>
              </h6>
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div> 
          <div class="row">
            <div class="coffee-span-3 subgrid-column-31 addressformlabel">PO#<span class="req">*</span></div>
			<div class="coffee-span-3 subgrid-column-31 addressforminput"><input id="ponumber" value="" placeholder="Enter Purchase Order Number" class="address span8" type="text"></div>
          </div>
		  <div class="row">
            <div class="coffee-span-3 subgrid-column-31 addressformlabel">Additional Instructions</div>
			<div class="coffee-span-6 subgrid-column-31 addressforminput"><textarea class="address span4" name="" id="additional_inst"></textarea></div>
          </div>   
        </div>
      </div>
    </div>
	<div class="coffee-span-5">&nbsp;</div>
	<div class="coffee-span-2">
		<a style="" onclick="submitorder()" class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class="coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4"><?php echo lang('submit_order');?></span></a>
	</div>
</div>
<script type="text/javascript">
function submitorder(){ 
	var pono = $("#ponumber").val();
	var add_inst = $("#additional_inst").val();
	if(pono==''){
		alert('Please enter PO No#.');
	}else{
		$("#overlay").fadeIn();
		$("#loader").fadeIn();
		$.post("<?php echo site_url('account/add_additional_checkout_features'); ?>",{pono:pono,add_inst:add_inst}).done(function(data){ 
			$("#overlay").fadeOut();
			$("#loader").fadeOut();
			window.location = "<?php echo site_url('checkout/place_order');?>";
		});
	}
}
</script>