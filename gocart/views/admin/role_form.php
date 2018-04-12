<a href="<?PHP echo site_url("admin/roles"); ?>" class="btn btn-success" style="margin:3% 0">View All Roles</a>
<?PHP if($id){ ?>
<a href="<?PHP echo site_url("admin/roles/form"); ?>" class="btn btn-primary" style="margin:3% 0">Add New Role</a>
<?PHP } ?>
<?PHP if($this->session->flashdata('success')){ ?>
<div class="alert alert-success" align="center">
	<?PHP echo $this->session->flashdata('success'); ?>
</div>
<?PHP } ?>
<?PHP if($this->session->flashdata('error')){ ?>
<div class="alert alert-danger" align="center">
	<?PHP echo $this->session->flashdata('error'); ?>
</div>
<?PHP } ?>

<form action="<?php echo site_url("admin/roles/insert/".$id); ?>" method="POST">

<div class="tabbable">
  <fieldset>
    <label for="name">Enter Role Name</label>
    <input type="text" class="span12" name="role_name" required="required" value="<?PHP if($id){echo $roleData->role_name;} ?>" />
    <?PHP if(count($mainRoles)>0){ ?>
    <?PHP foreach($mainRoles as $mainRoles){ ?>
    <div class="col-md-12">
    <?PHP echo $mainRoles->menu_name; ?>
    <?PHP
	$this->load->model("Common_model");
	$roles = $this->Common_model->listingResultWhere("parent_id",$mainRoles->menu_id,"gc_admin_menus");
	if(count($roles)>0){
	foreach($roles as $role){
	?>
    <div style="margin-left:5% !important">
    <input type="checkbox" value="<?PHP echo $role->menu_id; ?>" name="roles[]" <?php if($id){if(in_array($role->menu_id, $alExistingUserRoles)){echo 'checked="checked"';}} ?> />&nbsp;&nbsp;<?PHP echo $role->menu_name; ?>
    </div>
    <?PHP }} ?>
    </div>
    <?PHP }} ?>
  </fieldset>
</div>
<div class="form-actions">
  <button type="submit" class="btn btn-primary">
  <?PHP
  if($id){echo "Update Role";}else{echo "Save Role";}
  ?>
  </button>
</div>
</form>
<script type="text/javascript">
$('form').submit(function() {
	$('.btn').attr('disabled', true).addClass('disabled');
});
</script>