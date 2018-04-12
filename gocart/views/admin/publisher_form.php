<a href="<?PHP echo site_url("admin/publishers"); ?>" class="btn btn-success" style="margin:3% 0">View All Publishers</a>
<?PHP if($id){ ?>
<a href="<?PHP echo site_url("admin/publishers/form"); ?>" class="btn btn-primary" style="margin:3% 0">Add New Publisher</a>
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

<form action="<?php echo site_url("admin/publishers/insert/".$id); ?>" method="POST">

<div class="tabbable">
  <fieldset>
    <label for="name">Enter Publisher Name</label>
    <input type="text" class="span12" name="publisherName" required="required" value="<?PHP if($id){echo $publisherData->publisherName;} ?>" />
    
    
  </fieldset>
</div>
<div class="form-actions">
  <button type="submit" class="btn btn-primary">
  <?PHP
  if($id){echo "Update Publisher";}else{echo "Save Publisher";}
  ?>
  </button>
</div>
</form>
<script type="text/javascript">
$('form').submit(function() {
	$('.btn').attr('disabled', true).addClass('disabled');
});
</script>