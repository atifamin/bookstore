<?PHP
if($this->uri->segment("2")!="dashboard" && $this->uri->segment("2")!="" && $this->uri->segment("2")!="login"){
	if(empty(isAllowed($this->uri->segment("2")))){
		return redirect("admin/dashboard");
	}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Book Store | <?php echo (isset($page_title))?' :: '.$page_title:''; ?></title>
<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" />

<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet" type="text/css" />
<link type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('assets/css/redactor.css');?>" rel="stylesheet" />

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/redactor.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/redactor_lang/'.$this->config->item('language').'.js');?>"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600">
<link href="<?php echo base_url(); ?>assets/bookstore_assets/daterangepicker/jquery.comiseo.daterangepicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/bookstore_assets/daterangepicker/moment.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/bookstore_assets/daterangepicker/jquery.comiseo.daterangepicker.js"></script>
	
<?php if($this->auth->is_logged_in(false, false)):?>
    
<style type="text/css">
    body {
        margin-top:50px;
		font-family: 'Poppins', cursive;
    }
    .navbar .nav{margin-top:11px;}
    @media (max-width: 979px){ 
        body {
            margin-top:0px;
        }
    }
    @media (min-width: 980px) {
        .nav-collapse.collapse {
            height: auto !important;
            overflow: visible !important;
        }
     }
    
    .nav-tabs li a {
        text-transform:uppercase;
        background-color:#f2f2f2;
        border-bottom:1px solid #ddd;
        text-shadow: 0px 1px 0px #fff;
        filter: dropshadow(color=#fff, offx=0, offy=1);
        font-size:12px;
        padding:5px 8px;
    }
    
    .nav-tabs li a:hover {
        border:1px solid #ddd;
        text-shadow: 0px 1px 0px #fff;
        filter: dropshadow(color=#fff, offx=0, offy=1);
    } 
.row-23{background-color:#00A2D2;height:3px;}	
.coffee-span-4{width:30%;float:left;}
.coffee-span-12{width:100%;}
.row-24, .row-25{width:1170px;margin:0 auto;}
.adminfooter{width:100%;background:#2B2B2B;padding:15px 0px;}
h6 span.heading-text-3{font-size:20px;}
.alert{
    margin-top:3%;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
    $('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});
    
    $('.redactor').redactor({
            lang: '<?php echo $this->config->item('language');?>',
            minHeight: 200,
            imageUpload: '<?php echo site_url(config_item('admin_folder').'/wysiwyg/upload_image');?>',
            fileUpload: '<?php echo site_url(config_item('admin_folder').'/wysiwyg/upload_file');?>',
            imageGetJson: '<?php echo site_url(config_item('admin_folder').'/wysiwyg/get_images');?>',
            imageUploadErrorCallback: function(json)
            {
                alert(json.error);
            },
            fileUploadErrorCallback: function(json)
            {
                alert(json.error);
            }
      });
});
</script>
<?php endif;?>
<style>

.inactiveMenu{
	display:none;
}

</style>
</head>
<body>
<?php if($this->auth->is_logged_in(false, false)):?>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            
            <?php $admin_url = site_url($this->config->item('admin_folder')).'/';?>
            
            <a class="brand" href="<?php echo $admin_url;?>"><img src="<?php echo base_url('assets/front/images/logo-admin.png');?>" width="135"/></a>
            
            <div class="nav-collapse">
                <ul class="nav">
                    <li><a href="<?php echo $admin_url;?>"><?php echo lang('common_home');?></a></li>
                    
                    <li class="dropdown <?php if(!isAllowed("orders")){ echo "inactiveMenu"; } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Orders <b class="caret"></b></a>
                        <ul class="dropdown-menu">
							
                            <li class="<?php if(!isAllowed("orders")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>orders">ORDERS</a></li>  
							
							
                            <li class="<?php if(!isAllowed("orders")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>orders">PENDING ORDERS</a></li> 
							<li class="<?php if(!isAllowed("orders")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>orders/allOrders">ALL ORDERS</a></li>
							
                            <!--<?php if($this->auth->check_access('Admin')) : ?>
                            <li><a href="<?php echo $admin_url;?>customers"><?php echo lang('common_customers') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>customers/groups"><?php echo lang('common_groups') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>reports"><?php echo lang('common_reports') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>coupons"><?php echo lang('common_coupons') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>giftcards"><?php echo lang('common_giftcards') ?></a></li>
                            <?php endif; ?> -->
                        </ul>
                    </li>


					<?php if(isAllowed("orders") || isAllowed("categories") || isAllowed("publishers") || isAllowed("authors") || isAllowed("editions") || isAllowed("products")){ ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo lang('common_catalog') ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if(!isAllowed("categories")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>categories"><?php echo lang('common_categories') ?></a></li>
                            <li class="<?php if(!isAllowed("publishers")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>publishers">Publishers</a></li>
                            <li class="<?php if(!isAllowed("authors")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>authors">Authors</a></li>
                            <li class="<?php if(!isAllowed("editions")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>editions">Editions</a></li>
                            <li class="<?php if(!isAllowed("products")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>products"><?php echo lang('common_products') ?></a></li>
                            <!--<li><a href="<?php echo $admin_url;?>digital_products"><?php echo lang('common_digital_products') ?></a></li>-->
                        </ul>
                    </li>
                    <?php } ?>
                    
                    <?php if(isAllowed("pages")){ ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo lang('common_content') ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                             <li><a href="<?php echo $admin_url;?>banners"><?php echo lang('common_banners') ?></a></li> 
                            <li class="<?php if(!isAllowed("pages")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>pages"><?php echo lang('common_pages') ?></a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    
                    
                    
                    <?php if(isAllowed("roles") || isAllowed("admin") || isAllowed("customers") || isAllowed("settings")){ ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo lang('common_administrative') ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <!--<li><a href="<?php echo $admin_url;?>settings"><?php echo lang('common_gocart_configuration') ?></a></li>-->
                            <li><a href="<?php echo $admin_url;?>shipping"><?php echo lang('common_shipping_modules') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>currencyExchangeRate"><?php echo lang('common_currency') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>payment"><?php echo lang('common_payment_modules') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>settings/canned_messages"><?php echo lang('common_canned_messages') ?></a></li>
                            <li><a href="<?php echo $admin_url;?>locations"><?php echo lang('common_locations') ?></a></li>
                            <li class="<?php if(!isAllowed("roles")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>roles">Create Roles</a></li>
                            <li class="<?php if(!isAllowed("admin")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>admin"><?php echo lang('common_administrators') ?></a></li>
							<!--<li class="<?php if(!isAllowed("customers")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>customers">Create Customers</a></li>-->
							<li class="<?php if(!isAllowed("settings")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>settings/canned_messages"><?php echo lang('common_canned_messages') ?></a></li>
							<li class="<?php if(!isAllowed("settings")){ echo "inactiveMenu"; } ?>"><a href="<?php echo $admin_url;?>settings">Configuration</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    
                    
                    
                    
                    
                </ul>
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo lang('common_actions');?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url($this->config->item('admin_folder').'/dashboard');?>"><?php echo lang('common_dashboard') ?></a></li>
							<?php if($this->auth->check_access('Orders')) : ?>
                            <li><a href="<?php echo $admin_url;?>profile">Profile</a></li>  
							<?php endif; ?>
                            <li><a target="_blank" href="<?php echo site_url();?>"><?php echo lang('common_front_end') ?></a></li>
                            <li><a href="<?php echo site_url($this->config->item('admin_folder').'/login/logout');?>"><?php echo lang('common_log_out') ?></a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div>
    </div><!-- /navbar-inner -->
</div>
<?php endif;?>
<div class="container">
    <?php
    //lets have the flashdata overright "$message" if it exists
    if($this->session->flashdata('message'))
    {
        $message    = $this->session->flashdata('message');
    }
    
    if($this->session->flashdata('error'))
    {
        $error  = $this->session->flashdata('error');
    }
    
    if(function_exists('validation_errors') && validation_errors() != '')
    {
        $error  = validation_errors();
    }
    ?>
    
    <div id="js_error_container" class="alert alert-error" style="display:none;"> 
        <p id="js_error"></p>
    </div>
    
    <div id="js_note_container" class="alert alert-note" style="display:none;">
        
    </div>
    
    <?php if (!empty($message)): ?>
        <div class="alert alert-success">
            <a class="close" data-dismiss="alert">×</a>
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="alert alert-error">
            <a class="close" data-dismiss="alert">×</a>
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
</div>      
<div style="clear:both;height:50px;"></div>
<div class="container maincontainer">
    <?php if(!empty($page_title)):?>
    <div class="page-header">
        <h2><?php echo  $page_title; ?></h2>
    </div>
    <?php endif;?>
    
