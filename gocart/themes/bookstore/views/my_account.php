<?php if(validation_errors()):?>
<div class="alert allert-error">
	<a class="close" data-dismiss="alert">×</a>
	<?php echo validation_errors();?>
</div>
<?php endif;?>

<script src="<?PHP echo base_url(); ?>assets/bookstore/js/jquery.js"></script>


<script>

$(document).ready(function(){
	$('.delete_address').click(function(){
		if($('.delete_address').length > 1)
		{
			if(confirm('<?php echo lang('delete_address_confirmation');?>'))
			{
				$.post("<?php echo site_url('secure/delete_address');?>", { id: $(this).attr('rel') },
					function(data){
						$('#address_'+data).remove();
						$('#address_list .my_account_address').removeClass('address_bg');
						$('#address_list .my_account_address:even').addClass('address_bg');
					});
			}
		}
		else
		{
			alert('<?php echo lang('error_must_have_address');?>');
		}	
	});
	
	$('.edit_address').click(function(){
		$.post('<?php echo site_url('secure/address_form'); ?>/'+$(this).attr('rel'),
			function(data){
				$('#address-form-container').html(data);
                $("#addressModal").modal('show');
			}
		);
	});
});


function set_default(address_id, type)
{
	$.post('<?php echo site_url('secure/set_default_address') ?>/',{id:address_id, type:type});
}


</script>


<?php
$company	= array('id'=>'company', 'class'=>'form-control', 'name'=>'company', 'value'=> set_value('company', $customer['company']));
$first		= array('id'=>'firstname', 'class'=>'form-control', 'name'=>'firstname', 'value'=> set_value('firstname', $customer['firstname']));
$last		= array('id'=>'lastname', 'class'=>'form-control', 'name'=>'lastname', 'value'=> set_value('lastname', $customer['lastname']));
$email		= array('id'=>'email', 'class'=>'form-control', 'name'=>'email', 'value'=> set_value('email', $customer['email']));
$phone		= array('id'=>'phone', 'class'=>'form-control', 'name'=>'phone', 'value'=> set_value('phone', $customer['phone']));

$password	= array('id'=>'password', 'class'=>'span2', 'name'=>'password', 'value'=>'');
$confirm	= array('id'=>'confirm', 'class'=>'span2', 'name'=>'confirm', 'value'=>'');
?>	
<div class="content-wrap">

   <div class="container clearfix">

        <div class="row clearfix">

             <div class="col-md-9">
             <!--<img src="images/icons/avatar.jpg" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 84px;">-->

               <div class="heading-block noborder">
              <h3><?php echo $customer['firstname'] ,"", $customer['lastname'] ?></h3>
              <span>Your Profile Bio</span>
               </div>

		<?php echo form_open('secure/my_account'); ?>
			
				<h2><?php echo lang('account_information');?></h2>
				
				<div class="row">
					<div class="col-md-8">
						<label for="company"><?php echo lang('account_company');?></label>
						<?php echo form_input($company);?>
					</div>
				</div>
				<div class="row">	
					<div class="col-md-4">
						<label for="account_firstname"><?php echo lang('account_firstname');?></label>
						<?php echo form_input($first);?>
					</div>
				
					<div class="col-md-4">
						<label for="account_lastname"><?php echo lang('account_lastname');?></label>
						<?php echo form_input($last);?>
					</div>
				</div>
			
				<div class="row">
					<div class="col-md-4">
						<label for="account_email"><?php echo lang('account_email');?></label>
						<?php echo form_input($email);?>
					</div>
				
					<div class="col-md-4">
						<label for="account_phone"><?php echo lang('account_phone');?></label>
						<?php echo form_input($phone);?>
					</div>
				</div>
                
              <br>
				<div class="row">
					<div class="col-md-12">
						<div>
							<strong><?php echo lang('account_password_instructions');?></strong>
						</div>
					</div>
				</div>
			     <br>
				<div class="row">	
					<!--<div class="col-md-8">
						<label for="account_password"><?php //echo lang('account_password');?></label>
						<?php //echo form_password($password);?>
					</div>-->

                    <div class="col-md-4">
                      <label for="register-form-password"><?php echo lang('account_password');?>:</label>
                     <input type="password" id="register-form-password" name="password" value="" class="form-control" />
                     </div>

					<!--<div class="col-md-8">
						<label for="account_confirm"><?php //echo lang('account_confirm');?></label>
						<?php// echo form_password($confirm);?>
					</div>-->

                    <div class="col-md-4">
                        <label for="register-form-repassword"><?php echo lang('account_confirm');?></label>
                        <input type="password" id="register-form-repassword" name="confirm" value="" class="form-control" />
                    </div>
				</div>
                <br>
                <div class="row">
				<div class="col-md-8">

                    <input id="checkbox-em"    type="checkbox" class="checkbox-style" name="email_subscribe" value="1" <?php if((bool)$customer['email_subscribe']) { ?> checked="checked" <?php } ?>>
                    <label for="checkbox-em" class="checkbox-style-3-label checkbox-small" style="text-transform:lowercase"><?php echo lang('account_newsletter_subscribe');?></label>
				</div>
			  </div>
			   <br>
				<input type="submit" value="<?php echo lang('form_submit');?>" class="btn btn-primary" />

			
		</form>
            </div>
            <div class="col-md-3 clearfix">

							<div class="list-group">
								<a href="#" class="list-group-item list-group-item-action clearfix">Profile <i class="icon-user float-right"></i></a>
								<a href="#" class="list-group-item list-group-item-action clearfix">Servers <i class="icon-laptop2 float-right"></i></a>
								<a href="#" class="list-group-item list-group-item-action clearfix">Messages <i class="icon-envelope2 float-right"></i></a>
								<a href="#" class="list-group-item list-group-item-action clearfix">Billing <i class="icon-credit-cards float-right"></i></a>
								<a href="#" class="list-group-item list-group-item-action clearfix">Settings <i class="icon-cog float-right"></i></a>
								<a href="http://localhost/book-store/secure/logout" class="list-group-item list-group-item-action clearfix">Logout <i class="icon-line2-logout float-right"></i></a>
							</div>

							<div class="fancy-title topmargin title-border">
								<h4>About Me</h4>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum laboriosam, dignissimos veniam obcaecati. Quasi eaque, odio assumenda porro explicabo laborum!</p>

							<div class="fancy-title topmargin title-border">
								<h4>Social Profiles</h4>
							</div>

							<a href="#" class="social-icon si-facebook si-small si-rounded si-light" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-gplus si-small si-rounded si-light" title="Google+">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-dribbble si-small si-rounded si-light" title="Dribbble">
								<i class="icon-dribbble"></i>
								<i class="icon-dribbble"></i>
							</a>

							<a href="#" class="social-icon si-flickr si-small si-rounded si-light" title="Flickr">
								<i class="icon-flickr"></i>
								<i class="icon-flickr"></i>
							</a>

							<a href="#" class="social-icon si-linkedin si-small si-rounded si-light" title="LinkedIn">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>

							<a href="#" class="social-icon si-twitter si-small si-rounded si-light" title="Twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

						</div>
          </div>
          
		
	
	<div class="span7 pull-right">
		<div class="row" style="padding-top:10px;">
			<div class="span4">
				<h2><?php echo lang('address_manager');?></h2>
			</div>
			<div class="span3" style="text-align:right;">
				<input type="button" class="btn edit_address" rel="0" value="<?php echo lang('add_address');?>"/>
			</div>
		</div>
		<div class="row">
			<div class="span7" id='address_list'>
			<?php if(count($addresses) > 0):?>
				<table class="table table-bordered table-striped">
			<?php
			$c = 1;
				foreach($addresses as $a):?>
					<tr id="address_<?php echo $a['id'];?>">
						<td>
							<?php
							$b	= $a['field_data'];
							echo format_address($b, true);
							?>
						</td>
						<td>
							<div class="row-fluid">
								<div class="span12">
									<div class="btn-group pull-right">
										<input type="button" class="btn edit_address" rel="<?php echo $a['id'];?>" value="<?php echo lang('form_edit');?>" />
										<input type="button" class="btn btn-danger delete_address" rel="<?php echo $a['id'];?>" value="<?php echo lang('form_delete');?>" />
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
									<div class="pull-right" style="padding-top:10px;">
										<input type="radio" name="bill_chk" onclick="set_default(<?php echo $a['id'] ?>, 'bill')" <?php if($customer['default_billing_address']==$a['id']) echo 'checked="checked"'?> /> <?php echo lang('default_billing');?>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="ship_chk" onclick="set_default(<?php echo $a['id'] ?>,'ship')" <?php if($customer['default_shipping_address']==$a['id']) echo 'checked="checked"'?>/> <?php echo lang('default_shipping');?>
									</div>
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach;?>
				</table>
			<?php endif;?>
			</div>
		</div>
	</div>

<div class="row">
	<div class="span12">
		<div class="page-header">
			<h2><?php echo lang('order_history');?></h2>
		</div>
		<?php if($orders):
			echo $orders_pagination;
		?>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th><?php echo lang('order_date');?></th>
					<th><?php echo lang('order_number');?></th>
					<th><?php echo lang('order_status');?></th>
				</tr>
			</thead>

			<tbody>
			<?php
			foreach($orders as $order): ?>
				<tr>
					<td>
						<?php $d = format_date($order->ordered_on); 
				
						$d = explode(' ', $d);
						echo $d[0].' '.$d[1].', '.$d[3];
				
						?>
					</td>
					<td><?php echo $order->order_number; ?></td>
					<td><?php echo $order->status;?></td>
				</tr>
		
			<?php endforeach;?>
			</tbody>
		</table>
		<?php else: ?>
			<?php echo lang('no_order_history');?>
		<?php endif;?>
	</div>
</div>
</div>

	</div>














<div class="modal fade bs-example-modal-lg" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="address-form-container">
                    
                </div>
            </div>
        </div>
    </div>
</div>