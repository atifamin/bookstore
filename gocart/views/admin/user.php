<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('confirm_delete');?>');
}
</script>
<!-- Add user-->
<div style="text-align:right;">
	<a class="btn" href="<?php echo site_url($this->config->item('admin_folder').'/admin/user_form'); ?>"><i class="icon-plus-sign"></i> <?php echo lang('add_new_user');?></a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo lang('firstname');?></th>
			<th><?php echo lang('lastname');?></th>
			
			<th><?php echo lang('phone');?></th>
			<th><?php echo lang('company');?></th>
			<th><?php echo lang('email');?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($admins as $admin):?>
		<tr>
			<td><?php echo $admin->firstname; ?></td>
			<td><?php echo $admin->lastname; ?></td>
			<td><?php echo $admin->phone; ?></td>
			<td><?php echo $admin->company; ?></td>
			<td><a href="mailto:<?php echo $admin->email;?>"><?php echo $admin->email; ?></a></td>
		
		
			<td>
				<div class="btn-group" style="float:right;">
					<a class="btn" href="<?php echo site_url($this->config->item('admin_folder').'/admin/user_show/'.$admin->id);?>"><i class="icon-pencil"></i> <?php echo lang('edit');?></a>	
					<?php
					$current_admin	= $this->session->userdata('admin');
					$margin			= 30;
					if ($current_admin['id'] != $admin->id): ?>
					<a class="btn btn-danger" href="<?php echo site_url($this->config->item('admin_folder').'/admin/delete/'.$admin->id); ?>" onclick="return areyousure();"><i class="icon-trash icon-white"></i> <?php echo lang('delete');?></a>
					<?php endif; ?>
				</div>
			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>