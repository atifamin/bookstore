<script type="text/javascript">
function areyousure()
{
	return confirm('Are you sure! You want to delete this role');
}
</script>
<?PHP if($this->session->flashdata('success')){ ?>

<div class="alert alert-success" align="center"> <?PHP echo $this->session->flashdata('success'); ?> </div>
<?PHP } ?>
<?PHP if($this->session->flashdata('error1')){ ?>
<div class="alert alert-danger" align="center"> <?PHP echo $this->session->flashdata('error1'); ?> </div>
<?PHP } ?>
<div style="text-align:right"> <a class="btn" href="<?php echo site_url($this->config->item('admin_folder').'/roles/form'); ?>"><i class="icon-plus-sign"></i> Add New Role</a> </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Role ID</th>
      <th>Role Name</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
	define('ADMIN_FOLDER', $this->config->item('admin_folder'));
	foreach ($roles as $role):?>
    <tr>
      <td><?php echo $role->role_id; ?></td>
      <td><?php echo $role->role_name; ?></td>
      <td><div class="btn-group" style="float:right"> <a class="btn" href="<?php echo  site_url(ADMIN_FOLDER.'/roles/form/'.$role->role_id);?>"><i class="icon-pencil"></i> <?php echo lang('edit');?></a><a class="btn btn-danger" href="<?php echo  site_url(ADMIN_FOLDER.'/roles/delete/'.$role->role_id);?>" onclick="return areyousure();"><i class="icon-trash icon-white"></i> <?php echo lang('delete');?></a> </div></td>
    </tr>
    <?php
	endforeach;
	?>
  </tbody>
</table>
