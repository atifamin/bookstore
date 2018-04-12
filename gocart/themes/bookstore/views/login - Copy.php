
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

  <body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
  <div class="c-layout-page">
            <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
            <div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
                <div class="container">
                    <div class="c-page-title c-pull-left">
                        <h3 class="c-font-uppercase c-font-sbold">Customer Login/Register</h3>
                        <h4 class="">Page Sub Title Goes Here</h4>
                    </div>
                    <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                        <li>
                            <a href="#">Shop</a>
                        </li>
                        <li>/</li>
                        <li>
                            <a href="shop-customer-account.html">Customer Login/Register</a>
                        </li>
                        <li>/</li>
                        <li class="c-state_active">Jango Components</li>
                    </ul>
                </div>
            </div>
            <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: CONTENT/SHOPS/SHOP-LOGIN-REGISTER-1 -->
            <div class="c-content-box c-size-md c-bg-white">
                <div class="container">
                    <div class="c-shop-login-register-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default c-panel">
                                <h1><?php echo lang('login');?></h1>
                                    <div class="panel-body c-panel-body">
                                       <!-- <form class="c-form-login">-->
                                           <?php echo form_open('secure/login', 'class="form-horizontal"'); ?>
                                            <div class="form-group has-feedback">
                                                <input type="email" name="email" class="form-control c-square c-theme input-lg" placeholder="<?php echo lang('email');?>">
                                                <span class="glyphicon glyphicon-user form-control-feedback c-font-grey"></span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="password" name="password" class="form-control c-square c-theme input-lg" placeholder="<?php echo lang('password');?>">
                                                <span class="glyphicon glyphicon-lock form-control-feedback c-font-grey"></span>
                                            </div>
                                            <div class="row c-margin-t-40">
                                                <div class="col-xs-8">
                                                    <div class="c-checkbox">
                                                        <input type="checkbox" name="remember" id="checkbox1-77" class="c-check">
                                                        <label for="checkbox1-77">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> <?php echo lang('keep_me_logged_in');?></label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <button type="submit" name="submit" class="pull-right btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Login</button>
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?php //echo $redirect; ?>" name="redirect"/>
				                            <input type="hidden" value="submitted" name="submitted"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default c-panel">
                                    <div class="panel-body c-panel-body">
                                        <div class="c-content-title-1">
                                            <h3 class="c-left">
                                                <i class="icon-user"></i> Don't have an account yet?</h3>
                                            <div class="c-line-left c-theme-bg"></div>
                                            <p>Join us and enjoy shopping online today.</p>
                                        </div>
                                        <div class="c-margin-fix">
                                            <div class="c-checkbox c-toggle-hide" data-object-selector="c-form-register" data-animation-speed="600">
                                                <input type="checkbox" id="checkbox6-444" class="c-check">
                                                <label for="checkbox6-444">
                                                    <span class="inc"></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Register Now! </label>
                                            </div>
                                        </div>
                                        <!-- defining variables for register -->
                                <?php
                                    $company	= array('id'=>'bill_company', 'class'=>'span6', 'name'=>'company', 'value'=> set_value('company'));
                                    $first		= array('id'=>'bill_firstname', 'class'=>'span3', 'name'=>'firstname', 'value'=> set_value('firstname'));
                                    $last		= array('id'=>'bill_lastname', 'class'=>'span3', 'name'=>'lastname', 'value'=> set_value('lastname'));
                                    $email		= array('id'=>'bill_email', 'class'=>'span3', 'name'=>'email', 'value'=>set_value('email'));
                                    $phone		= array('id'=>'bill_phone', 'class'=>'span3', 'name'=>'phone', 'value'=> set_value('phone'));
                                  ?>
                                        <!--<form class="c-form-register c-margin-t-20">-->
                                        <?php echo form_open('secure/register','class="c-form-register c-margin-t-20"'); ?>
                                            <div class="form-group">
                                                
                                                <label class="control-label">Company</label>
                                                <input type="text" name="company" class="form-control c-square c-theme" placeholder="Company">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label">First Name</label>
                                                        <input type="text" name="firstname" class="form-control c-square c-theme" placeholder="First Name"> </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label">Last Name</label>
                                                        <input type="text" name="lastname" class="form-control c-square c-theme" placeholder="Last Name"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><?php echo lang('account_email');?></label>
                                                <input type="email" name="email" class="form-control c-square c-theme" placeholder="email"> </div>
                                            <div class="form-group">
                                                <label class="control-label"><?php echo lang('account_phone');?></label>
                                                <input type="text" name="phone" class="form-control c-square c-theme" placeholder="Phone"> </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="checkbox">
							                             <input type="checkbox" name="email_subscribe" value="1" <?php echo set_radio('email_subscribe', '1', TRUE); ?>/> <?php echo lang('account_newsletter_subscribe');?>
						                                 </label>
                                                </div>
                                               
                                            <div class="row">
                                                
                                            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><?php echo lang('account_password');?></label>
                                                <input type="password" name="password"  class="form-control c-square c-theme" placeholder="Password"> </div>
                                                <div class="form-group">
                                                <label class="control-label"><?php echo lang('account_confirm');?></label>
                                                <input type="password" name="confirm"  class="form-control c-square c-theme" placeholder="Confirm Password"> </div>
                                            <div class="form-group c-margin-t-40">
                                                <button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
            <!-- END: CONTENT/SHOPS/SHOP-LOGIN-REGISTER-1 -->
            <!-- END: PAGE CONTENT -->
        </div>
        </div>
        </div>

 


<?php include('footer.php'); ?>