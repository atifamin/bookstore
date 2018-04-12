<script type="text/javascript">
function areyousure()
{
	return confirm('Are you sure! You want to delete this edition');
}
</script>
<?PHP if($this->session->flashdata('success')){ ?>

<div class="alert alert-success" align="center"> <?PHP echo $this->session->flashdata('success'); ?> </div>
<?PHP } ?>
<?PHP if($this->session->flashdata('error1')){ ?>
<div class="alert alert-danger" align="center"> <?PHP echo $this->session->flashdata('error1'); ?> </div>
<?PHP } ?>
<div style="text-align:right"> <a class="btn" href="<?php echo site_url($this->config->item('admin_folder').'/editions/form'); ?>"><i class="icon-plus-sign"></i> Add New Edition</a> </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Edition ID</th>
      <th>Edition Name</th>
      <th>Date Created</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
	define('ADMIN_FOLDER', $this->config->item('admin_folder'));
	foreach ($editions as $edi):?>
    <tr>
      <td><?php echo $edi->editionId; ?></td>
      <td><?php echo $edi->editionName; ?></td>
      <td><?php echo $edi->created_at; ?></td>
      <td><div class="btn-group" style="float:right"> <a class="btn" href="<?php echo  site_url(ADMIN_FOLDER.'/editions/form/'.$edi->editionId);?>"><i class="icon-pencil"></i> <?php echo lang('edit');?></a><a class="btn btn-danger" href="<?php echo  site_url(ADMIN_FOLDER.'/editions/delete/'.$edi->editionId);?>" onclick="return areyousure();"><i class="icon-trash icon-white"></i> <?php echo lang('delete');?></a> </div></td>
    </tr>
    <?php
	endforeach;
	?>
  </tbody>
</table>
