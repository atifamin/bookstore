<style>
.text-text-10{
	margin-top:11px;
	float:left;
}
</style>
<div id="add-address-popup">
<div class="coffee-span-12 coffee-800-span-12 coffee-1024-span-12">

      <div class="container container-2">

        <div class="subgrid">
		<form action="<?php echo site_url('account/addnewlocation'); ?>" name="" id="addaddressform" method="POST">
          <div class="row">

            <div class="coffee-span-12">
			<img src="<?php echo base_url(); ?>/assets/img/close-icon.png" alt="CLOSE" id="closeid" onclick="closeAddAddressPopup()" />
              <h6><span class="heading-text-6">ADD NEW LOCATION</span>

              </h6>

              <div class="rule rule-7">

                <hr>

              </div>

            </div>

          </div>
		  <div class="row">
            <div class="coffee-span-3 subgrid-column-20">
              <span class="text-element"><span class="text-text-10">Business Name:</span>
              </span>
            </div>
			<div class="coffee-span-9">
			<input value="" name="business_name" id="business_name" class="input-3" type="text" required="required">
          </div>
          </div>

			<div class="row">
            <div class="coffee-span-3 subgrid-column-20">
              <span class="text-element"><span class="text-text-10">Address 1:</span>
              </span>
            </div>
			<div class="coffee-span-9">
			<input value="" name="address1" id="address1" class="input-3" type="text" required="required">
          </div>
          </div>
		  
		  <div class="row">
            <div class="coffee-span-3 subgrid-column-20">
              <span class="text-element"><span class="text-text-10">Address 2:</span>
              </span>
            </div>
			<div class="coffee-span-4">
			<input value="" name="address2" id="address2" class="input-3" type="text">
          </div>
		  <div class="coffee-span-2 subgrid-column-20">
              <span class="text-element"><span class="text-text-10">City:</span>
              </span>
            </div>
			<div class="coffee-span-3">
				<input value="" name="city" id="city" class="input-3" type="text" required="required">
            </div>
          </div>
		  
		  <div class="row"> 
			<div class="coffee-span-3 subgrid-column-20">
              <span class="text-element"><span class="text-text-10">State:</span>
              </span>
            </div>
			<div class="coffee-span-4">
				<select name="state" id="state" class="input-3 stateselectbox" required="required">
					<?php foreach($getAllStates as $States){ ?>
					<option value="<?php echo $States->id; ?>"><?php echo $States->code; ?></option>
					<?php } ?>
				</select>
            </div>
			<div class="coffee-span-2 subgrid-column-20">
              <span class="text-element"><span class="text-text-10">Zip:</span>
              </span>
            </div>
			<div class="coffee-span-3">
				<input value="" name="zip" id="zip" class="input-3" type="text" required="required">
            </div>
          </div>
		  
		  <div class="row">
		    <div class="coffee-span-3 subgrid-column-20">
              <span class="text-element"><span class="text-text-10">Email:</span>
              </span>
            </div>
			<div class="coffee-span-4">
				<input value="" name="email" id="email" class="input-3" type="text" required="required">
            </div>
            <div class="coffee-span-2 subgrid-column-20">
              <span class="text-element"><span class="text-text-10">Phone:</span>
              </span>
            </div>
			<div class="coffee-span-3">
				<input value="" name="phone" id="phone" class="input-3" type="text" required="required">
            </div> 
          </div>
		  <div class="row">
            <div class="coffee-span-12 subgrid-column-58"></div>
          </div>
		  <div class="row">
		  <div class="coffee-span-2" style="float:right;"><button type="submit" class="link-button-glyph button-link-icon-4 popupbtn"><span class="link-button-text text-for-button-link-4">ADD</span></button>

            </div></div>

          
		</form>
        </div>

      </div>

    </div>
</div>