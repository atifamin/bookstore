<a href="<?PHP echo site_url("admin/editions"); ?>" class="btn btn-success" style="margin:3% 0">View All Editions</a>
<?PHP if($id){ ?>
<a href="<?PHP echo site_url("admin/editions/form"); ?>" class="btn btn-primary" style="margin:3% 0">Add New Edition</a>
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

<form action="<?php echo site_url("admin/editions/insert/".$id); ?>" method="POST">

<div class="tabbable">
  <fieldset>
    <label for="name">Enter Edition Name</label>
    <input type="text" class="span12" name="editionName" required="required" value="<?PHP if($id){echo $eidtionData->editionName;} ?>" />
  </fieldset>
</div>
<div class="form-actions">
  <button type="submit" class="btn btn-primary">
  <?PHP
  if($id){echo "Update Edition";}else{echo "Save Edition";}
  ?>
  </button>
</div>
</form>
<script type="text/javascript">
$('form').submit(function() {
	$('.btn').attr('disabled', true).addClass('disabled');
});
</script>