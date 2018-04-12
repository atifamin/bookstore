<form action="<?php echo site_url('admin/profile/updateprofile'); ?>/<?php echo $MngData->id; ?>" method="post" accept-charset="utf-8">	
		<label>First Name</label>
		<input type="text" name="firstname" value="<?php echo $MngData->firstname; ?>">		
		<label>Last Name</label>
		<input type="text" name="lastname" value="<?php echo $MngData->lastname; ?>">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $MngData->username; ?>" readonly="readonly">
		<label>Email</label>
		<input type="text" name="email" value="<?php echo $MngData->email; ?>" readonly="readonly">
		<label>Access</label>
		<select name="access" readonly="readonly"> 
			<option value="Orders" selected="selected">Order Manager</option>
		</select>
		<label>Password</label>
		<input type="password" name="password" value="">
		<label>Confirm Password</label>
		<input type="password" name="confirm" value="">		
		<div class="form-actions">
			<input class="btn btn-primary" type="submit" value="Save">
		</div>
	
</form>