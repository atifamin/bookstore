<?php echo form_open($this->config->item('admin_folder').'/admin/form/'.$id); ?>
	
		<label><?php echo lang('firstname');?></label>
		<?php
		$data	= array('name'=>'firstname', 'class'=>'span4', 'value'=>set_value('firstname', $firstname));
		echo form_input($data);
		?>
		
		<label><?php echo lang('lastname');?></label>
		<?php
		$data	= array('name'=>'lastname', 'class'=>'span4', 'value'=>set_value('lastname', $lastname));
		echo form_input($data);
		?>

		<label><?php echo lang('username');?></label>
		<?php
		$data	= array('name'=>'username', 'class'=>'span4', 'value'=>set_value('username', $username));
		echo form_input($data);
		?>

		<label><?php echo lang('email');?></label>
		<?php
		$data	= array('name'=>'email', 'class'=>'span4', 'value'=>set_value('email', $email));
		echo form_input($data);
		?>

		<!--<label><?php //echo lang('access');?></label>
		<?php
		//$options = array(	'Admin'		=> 'Admin',
							//'Orders'	=> 'Order Manager'
		                //);
		//echo form_dropdown('access', $options, set_value('phone', $access));
		?>-->
        <label>Select Role</label>
        <select class="span4" name="role_id">
        <option>Select</option>
        <?php if(count($allRoles)>0){ ?>
        <?php foreach($allRoles as $allRoles){ ?>
        <option value="<?php echo $allRoles->role_id; ?>" <?php if($roleId==$allRoles->role_id){echo 'selected="selected"';} ?>><?php echo $allRoles->role_name; ?></option>
        <?php }} ?>
        </select>

		<label><?php echo lang('password');?></label>
		<?php
		$data	= array('name'=>'password', 'class'=>'span4');
		echo form_password($data);
		?>

		<label><?php echo lang('confirm_password');?></label>
		<?php
		$data	= array('name'=>'confirm', 'class'=>'span4');
		echo form_password($data);
		?>
		
		<div class="form-actions">
			<input class="btn btn-primary" type="submit" value="<?php echo lang('save');?>"/>
		</div>
	
</form>
<script type="text/javascript">
$('form').submit(function() {
	$('.btn').attr('disabled', true).addClass('disabled');
});
</script>