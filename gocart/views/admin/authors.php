<script type="text/javascript">
function areyousure()
{
	return confirm('Are you sure! You want to delete this author');
}
</script>
<?PHP if($this->session->flashdata('success')){ ?>

<div class="alert alert-success" align="center"> <?PHP echo $this->session->flashdata('success'); ?> </div>
<?PHP } ?>
<?PHP if($this->session->flashdata('error1')){ ?>
<div class="alert alert-danger" align="center"> <?PHP echo $this->session->flashdata('error1'); ?> </div>
<?PHP } ?>
<div style="text-align:right"> <a class="btn" href="<?php echo site_url($this->config->item('admin_folder').'/authors/form'); ?>"><i class="icon-plus-sign"></i> Add New Author</a> </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Author ID</th>
      <th>Author Name</th>
      <th>Date Created</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
	define('ADMIN_FOLDER', $this->config->item('admin_folder'));
	foreach ($author as $auth):?>
    <tr>
      <td><?php echo $auth->authorId; ?></td>
      <td><?php echo $auth->authorName; ?></td>
      <td><?php echo $auth->created_at; ?></td>
      <td><div class="btn-group" style="float:right"> <a class="btn" href="<?php echo site_url(ADMIN_FOLDER.'/authors/form/'.$auth->authorId);?>"><i class="icon-pencil"></i> <?php echo lang('edit');?></a><a class="btn btn-danger" href="<?php echo site_url(ADMIN_FOLDER.'/authors/delete/'.$auth->authorId);?>" onclick="return areyousure();"><i class="icon-trash icon-white"></i> <?php echo lang('delete');?></a> </div></td>
    </tr>
    <?php
	endforeach;
	?>
  </tbody>
</table>
