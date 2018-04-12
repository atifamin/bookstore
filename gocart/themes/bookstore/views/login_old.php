
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo (!empty($seo_title)) ? $seo_title .' - ' : ''; echo $this->config->item('company_name'); ?></title>


<?php if(isset($meta)):?>
	<?php echo $meta;?>
<?php else:?>
<meta name="Keywords" content="Shopping Cart, eCommerce, Code Igniter">
<meta name="Description" content="Go Cart is an open source shopping cart built on the Code Igniter framework">
<?php endif;?>

<link href="<?PHP echo base_url("assets/bookstore_assets/css/bootstrap.min.css");?>" rel="stylesheet">
<link href="<?PHP echo base_url("assets/bookstore_assets/css/bootstrap-responsive.min.css");?>" rel="stylesheet">
<link href="<?PHP echo base_url("assets/bookstore_assets/css/styles.css");?>" rel="stylesheet">
<script src="<?PHP echo base_url("assets/bookstore_assets/js/jquery.js");?>" ></script>
<script src="<?PHP echo base_url("assets/bookstore_assets/js/bootstrap.min.js");?>" ></script>
<script src="<?PHP echo base_url("assets/bookstore_assets/js/squard.js");?>" ></script>
<script src="<?PHP echo base_url("assets/bookstore_assets/js/equal_heights.js");?>" ></script>
<?php //echo theme_css('bootstrap.min.css', true);?>
<?php //echo theme_css('bootstrap-responsive.min.css', true);?>
<?php //echo theme_css('styles.css', true);?>

<?php //echo theme_js('jquery.js', true);?>
<?php //echo theme_js('bootstrap.min.js', true);?>
<?php //echo theme_js('squard.js', true);?>
<?php //echo theme_js('equal_heights.js', true);?>

<?php
//with this I can put header data in the header instead of in the body.
if(isset($additional_header_info))
{
	echo $additional_header_info;
}
include('header.php');
?>
</head>

<body>
<div class="row" style="margin-top:50px;">
	<div class="span6 offset3">
		<div class="page-header">
			<h1><?php echo lang('login');?></h1>
		</div>
			<?php echo form_open('secure/login', 'class="form-horizontal"'); ?>
				<fieldset>
				
					<div class="control-group">
						<label class="control-label" for="email"><?php echo lang('email');?></label>
						<div class="controls">
							<input type="text" name="email" class="span3"/>
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="password"><?php echo lang('password');?></label>
						<div class="controls">
							<input type="password" name="password" class="span3" autocomplete="off" />
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<label class="checkbox">
								<input name="remember" value="true" type="checkbox" />
								 <?php echo lang('keep_me_logged_in');?>
							</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password"></label>
						<div class="controls">
							<input type="submit" value="<?php echo lang('form_login');?>" name="submit" class="btn btn-primary"/>
						</div>
					</div>
				</fieldset>
				
				<input type="hidden" value="<?php //echo $redirect; ?>" name="redirect"/>
				<input type="hidden" value="submitted" name="submitted"/>
				
			</form>
		
			<div style="text-align:center;">
				<a href="<?php echo site_url('secure/forgot_password'); ?>"><?php echo lang('forgot_password')?></a> | <a href="<?php echo site_url('secure/register'); ?>"><?php echo lang('register');?></a>
			</div>
	</div>
</div>

    <footer class="footer">

        <div style="text-align:center;"><a href="http://gocartdv.com" target="_blank"><img src="<?php echo base_url('assets/img/drivenByGoCart.svg');?>" alt="Driven By GoCart"></a></div>
        
    </footer>
</div>

</body>
</html>