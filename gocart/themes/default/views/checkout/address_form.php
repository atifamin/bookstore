<style type="text/css">
	.placeholder {
		display:none;
	} 
	.whitebg{background:transparent url("<?php echo base_url(); ?>assets/front/images/new_bg-main-background_pattern.jpg") repeat scroll left top;width:100%;height:100%;position:absolute;}
</style> 



<script type="text/javascript">
	$(document).ready(function(){
		
		//if we support placeholder text, remove all the labels
		if(!supports_placeholder())
		{
			$('.placeholder').show();
		}
		
		<?php
		// Restore previous selection, if we are on a validation page reload
		$zone_id = set_value('zone_id');

		echo "\$('#zone_id').val($zone_id);\n";
		?>
	});
	
	function supports_placeholder()
	{
		return 'placeholder' in document.createElement('input');
	}
</script>



<script type="text/javascript">
$(document).ready(function() {
	$('#country_id').change(function(){
		populate_zone_menu();
	});	

});
// context is ship or bill
/*function populate_zone_menu(value)
{
	$.post('<?php echo site_url('locations/get_zone_menu');?>',{id:$('#country_id').val()}, function(data) {
		$('#zone_id').html(data);
	});
}*/
</script>
<?php /* Only show this javascript if the user is logged in */ ?>
<?php if($this->Customer_model->is_logged_in(false, false)) : ?>
<script type="text/javascript">	
	<?php
	$add_list = array();
	foreach($customer_addresses as $row) {
		// build a new array
		$add_list[$row['id']] = $row['field_data'];
	}
	$add_list = json_encode($add_list);
	echo "eval(addresses=$add_list);";
	?>
		
	function populate_address(address_id)
	{
		if(address_id == '')
		{
			return;
		}
		
		// - populate the fields
		$.each(addresses[address_id], function(key, value){
			
			$('.address[name='+key+']').val(value);

			// repopulate the zone menu and set the right value if we change the country
			if(key=='zone_id')
			{
				zone_id = value;
			}
		});
		
		// repopulate the zone list, set the right value, then copy all to billing
		$.post('<?php echo site_url('locations/get_zone_menu');?>',{id:$('#country_id').val()}, function(data) {
			$('#zone_id').html(data);
			$('#zone_id').val(zone_id);
		});		
	}
	
</script>
<?php endif;?>

<?php
error_reporting(0);
$countries = $this->Location_model->get_countries_menu();

if(!empty($customer[$address_form_prefix.'_address']['country_id']))
{
	$zone_menu	= $this->Location_model->get_zones_menu($customer[$address_form_prefix.'_address']['country_id']);
}
else
{
	$zone_menu = array(''=>'')+$this->Location_model->get_zones_menu(array_shift(array_keys($countries)));
}

//form elements

$company	= array('placeholder'=>lang('address_company'),'class'=>'address span8', 'name'=>'company', 'value'=> set_value('company', @$customer[$address_form_prefix.'_address']['company']));
$address1	= array('placeholder'=>lang('address1'), 'class'=>'address span8', 'name'=>'address1', 'value'=> set_value('address1', @$customer[$address_form_prefix.'_address']['address1']));
$address2	= array('placeholder'=>lang('address2'), 'class'=>'address span8', 'name'=>'address2', 'value'=>  set_value('address2', @$customer[$address_form_prefix.'_address']['address2']));
$first		= array('placeholder'=>lang('address_firstname'), 'class'=>'address span4', 'name'=>'firstname', 'value'=>  set_value('firstname', @$customer[$address_form_prefix.'_address']['firstname']));
$last		= array('placeholder'=>lang('address_lastname'), 'class'=>'address span4', 'name'=>'lastname', 'value'=>  set_value('lastname', @$customer[$address_form_prefix.'_address']['lastname']));
$email		= array('placeholder'=>lang('address_email'), 'class'=>'address span4', 'name'=>'email', 'value'=> set_value('email', @$customer[$address_form_prefix.'_address']['email']));
$phone		= array('placeholder'=>lang('address_phone'), 'class'=>'address span4', 'name'=>'phone', 'value'=> set_value('phone', @$customer[$address_form_prefix.'_address']['phone']));
$city		= array('placeholder'=>lang('address_city'), 'class'=>'address span3', 'name'=>'city', 'value'=> set_value('city', @$customer[$address_form_prefix.'_address']['city']));
$zip		= array('placeholder'=>lang('address_zip'), 'maxlength'=>'10', 'class'=>'address span2', 'name'=>'zip', 'value'=> set_value('zip', @$customer[$address_form_prefix.'_address']['zip']));

/*
if($company['value']==''){ $company['value'] = $DefaultAddress->business_name; }
if($address1['value']==''){ $address1['value'] = $DefaultAddress->address1; }
if($address2['value']==''){ $address2['value'] = $DefaultAddress->address2; }
if($first['value']==''){ $first['value'] = $cfirstname; }
if($last['value']==''){ $last['value'] = $clastname; }
if($email['value']==''){ $email['value'] = $DefaultAddress->email; }
if($phone['value']==''){ $phone['value'] = $DefaultAddress->phone; } 
if($city['value']==''){ $city['value'] = $DefaultAddress->city; }
if($zip['value']==''){ $zip['value'] = $DefaultAddress->zip; } 
*/
$company['value'] = $DefaultAddress->business_name; 
$address1['value'] = $DefaultAddress->address1; 
$address2['value'] = $DefaultAddress->address2; 
$first['value'] = $cfirstname; 
$last['value'] = $clastname; 
$email['value'] = $DefaultAddress->email; 
$phone['value'] = $DefaultAddress->phone; 
$city['value'] = $DefaultAddress->city; 
$zip['value'] = $DefaultAddress->zip; 

?>
	
	 


<!-- ################################################################################################################### -->
<div class="row">
    <div class="coffee-span-12 column-7"></div>
</div>
<div class="row">
    <div class="coffee-span-12 column-8">
      <h5><span class="heading-text-7"><?php echo lang('form_checkout');?></span>
      </h5>
      <div class="rule rule-7a">
        <hr>
      </div>
    </div>
</div>
<div class="row">
    <div class="coffee-span-12 column-7"></div>
</div>
<?php if (validation_errors()):?>
<div class="row">
    <div class="coffee-span-9">
      <div class="container container-2b validations">
        <?php echo validation_errors();?>
      </div>
    </div>
</div> 
<?php endif;?>
<?php if(empty($DefaultAddress)){ ?>
<div class="row">
    <div class="coffee-span-9">
      <div class="container container-2b validations">
        <p>Your address is missing, please enter to proceed with checkout.</p>
      </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	window.location = "<?php echo site_url('account'); ?>?error=addressmissing";
});
</script>
<?php } ?>
<div id="checkoutdiv">
<div class="whitebg"></div>
<?php 
$attributes = array('class' => 'email', 'id' => 'checkoutformst1');
echo ($address_form_prefix == 'bill')?form_open('checkout/step_1',$attributes):form_open('checkout/shipping_address',$attributes); ?>
<div class="row">
	<div class="coffee-span-9 coffee-800-span-12 coffee-1024-span-12">
      <div class="container container-2a">
        <div class="subgrid">
          <div class="row subgrid-row-1">
            <div class="coffee-span-2 coffee-414-span-3 subgrid-column-56"><span class="glyph font-icon-1"><i class="coffeecup-icons-location"></i></span>
            </div>
            <div class="coffee-span-10 coffee-414-span-9">
              <h6 class="heading-5"><span class="heading-text-2"><?php echo ($address_form_prefix == 'bill')?lang('address'):lang('shipping_address');?></span>
              </h6>
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div> 
          <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel"><?php echo lang('address_company');?></div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput"><?php echo form_input($company);?></div>
          </div>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel"><?php echo lang('address_firstname');?><span class="req">*</span></div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput"><?php echo form_input($first);?></div>
          </div>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel"><?php echo lang('address_lastname');?><span class="req">*</span></div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput"><?php echo form_input($last);?></div>
          </div>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel"><?php echo lang('address_email');?><span class="req">*</span></div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput"><?php echo form_input($email);?></div>
          </div>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel"><?php echo lang('address_phone');?><span class="req">*</span></div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput"><?php echo form_input($phone);?></div>
          </div>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel"><?php echo lang('address_country');?><span class="req">*</span></div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput">
				<select name="country_id" id="country_id" class="address span8">
					<option value="223">United States</option>
				</select>
			<?php //echo form_dropdown('country_id',$countries, @$customer[$address_form_prefix.'_address']['country_id'], 'id="country_id" class="address span8"');?></div>
          </div>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel"><?php echo lang('address1');?><span class="req">*</span></div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput"><?php echo form_input($address1);?></div>
          </div>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel"><?php echo lang('address2');?></div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput"><?php echo form_input($address2);?></div>
          </div>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel"><?php echo lang('address_city');?><span class="req">*</span></div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput"><?php echo form_input($city);?></div>
          </div>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel"><?php echo lang('address_state');?><span class="req">*</span></div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput">
				<select name="zone_id" id="zone_id" class="input-3 address">
					<?php foreach($getAllStates as $States){ ?>
					<option <?php if($DefaultAddress->state==$States->id){echo 'selected="selected"';} ?> value="<?php echo $States->id; ?>"><?php echo $States->code; ?></option>
					<?php } ?>
				</select> 
			
			</div>
          </div>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel"><?php echo lang('address_zip');?><span class="req">*</span></div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput"><?php echo form_input($zip);?></div>
          </div>
		  <?php if($address_form_prefix=='bill') : ?>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel">&nbsp;</div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput shipcheckbox">
				<?php echo form_checkbox(array('name'=>'use_shipping', 'value'=>'yes', 'id'=>'use_shipping', 'checked'=>'checked')) ?>
				<?php echo lang('ship_to_address') ?>
			</div>
          </div>
		  <?php endif; ?>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-31 addressformlabel">&nbsp;</div>
			<div class="coffee-span-8 subgrid-column-31 addressforminput shipcheckbox">
				<?php if($address_form_prefix=='ship') : ?>
				<input class="btn btn-block btn-large btn-secondary formtbns" type="button" value="<?php echo lang('form_previous');?>" onclick="window.location='<?php echo base_url('checkout/step_1') ?>'"/>
				<?php endif; ?>
				<input class="btn btn-block btn-large btn-primary formtbns" type="submit" value="<?php echo lang('form_continue');?>"/>
			</div>
          </div>	
        </div>
      </div>
    </div>
</div>
</form>
</div>
<?php if(!empty($DefaultAddress)){ ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#checkoutformst1").submit();
});
</script>
<?php } ?>