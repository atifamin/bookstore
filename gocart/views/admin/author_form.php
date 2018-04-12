<a href="<?PHP echo site_url("admin/authors"); ?>" class="btn btn-success" style="margin:3% 0">View All Authors</a>
<?PHP if($id){ ?>
<a href="<?PHP echo site_url("admin/authors/form"); ?>" class="btn btn-primary" style="margin:3% 0">Add New Author</a>
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

<form action="<?php echo site_url("admin/authors/insert/".$id); ?>" method="POST">

<div class="tabbable">
  <fieldset>
    <label for="name">Enter Author Name</label>
    <input type="text" class="span12" name="authorName" required="required" value="<?PHP if($id){echo $authorData->authorName;} ?>" />
  </fieldset>
</div>
<div class="form-actions">
  <button type="submit" class="btn btn-primary">
  <?PHP
  if($id){echo "Update Author";}else{echo "Save Author";}
  ?>
  </button>
</div>
</form>
<script type="text/javascript">
$('form').submit(function() {
	$('.btn').attr('disabled', true).addClass('disabled');
});
</script>