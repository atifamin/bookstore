<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="SemiColonWeb" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if(isset($meta)):?>
<?php echo $meta;?>
<?php else:?>
<meta name="Keywords" content="Shopping Cart, eCommerce, Code Igniter">
<meta name="Description" content="Go Cart is an open source shopping cart built on the Code Igniter framework">
<?php endif;?>
<!-- Stylesheets
	============================================= -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/bookstore/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/bookstore/style.css" type="text/css" />
<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/bookstore/css/swiper.css" type="text/css" />
<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/bookstore/css/dark.css" type="text/css" />
<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/bookstore/css/font-icons.css" type="text/css" />
<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/bookstore/css/animate.css" type="text/css" />
<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/bookstore/css/magnific-popup.css" type="text/css" />
<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/bookstore/css/responsive.css" type="text/css" />
<!-- Bootstrap Switch CSS -->
<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/bookstore/css/components/bs-switches.css" type="text/css" />

<!-- Radio Checkbox Plugin -->
<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/bookstore/css/components/radio-checkbox.css" type="text/css" />
    
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Document Title
	============================================= -->
<title><?php echo (!empty($seo_title)) ? $seo_title .' - ' : ''; echo $this->config->item('company_name'); ?></title>
<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" />
<?php if(isset($additional_header_info)){ echo $additional_header_info; } ?>


<style>

#top-account{
	margin: 10px 0 0px 25px !important;
}

</style>


</head>

<body class="stretched">

<!-- Document Wrapper
	============================================= -->
<div id="wrapper" class="clearfix">

<!-- Top Bar
		============================================= -->
<div id="top-bar">
  <div class="container clearfix">
    <div class="col_half nobottommargin"> 
      
      <!-- Top Links
					============================================= -->
      <div class="top-links">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="faqs.html">FAQs</a></li>
          <li><a href="contact.html">Contact</a></li>
          <?php if(!$this->Customer_model->is_logged_in(false, false)){?>
          <li><a href="<?php echo site_url("secure/login"); ?>">Login/Register</a>
          <?php } ?>
            <!--<div class="top-link-section">
              <form id="top-login" role="form">
                <div class="input-group" id="top-login-username">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="icon-user"></i></div>
                  </div>
                  <input type="email" class="form-control" placeholder="Email address" required>
                </div>
                <div class="input-group" id="top-login-password">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="icon-key"></i></div>
                  </div>
                  <input type="password" class="form-control" placeholder="Password" required>
                </div>
                <label class="checkbox">
                  <input type="checkbox" value="remember-me">
                  Remember me </label>
                <button class="btn btn-danger btn-block" type="submit">Sign in</button>
              </form>
            </div>-->
          </li>
        </ul>
      </div>
      <!-- .top-links end --> 
      
    </div>
    <div class="col_half fright col_last nobottommargin"> 
      
      <!-- Top Social
					============================================= -->
      <div id="top-social">
        <ul>
          <li><a href="#" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
          <li><a href="#" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
          <li><a href="#" class="si-dribbble"><span class="ts-icon"><i class="icon-dribbble"></i></span><span class="ts-text">Dribbble</span></a></li>
          <li><a href="#" class="si-github"><span class="ts-icon"><i class="icon-github-circled"></i></span><span class="ts-text">Github</span></a></li>
          <li><a href="#" class="si-pinterest"><span class="ts-icon"><i class="icon-pinterest"></i></span><span class="ts-text">Pinterest</span></a></li>
          <li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
          <li><a href="tel:+91.11.85412542" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">+91.11.85412542</span></a></li>
          <li><a href="mailto:info@canvas.com" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text">info@canvas.com</span></a></li>
        </ul>
      </div>
      <!-- #top-social end --> 
      
    </div>
  </div>
</div>
<!-- #top-bar end --> 

<!-- Header
		============================================= -->
<header id="header" class="sticky-style-2">
  <div class="container clearfix"> 
    
    <!-- Logo
				============================================= -->
    <div id="logo"> <a href="index.html" class="standard-logo" data-dark-logo="<?PHP echo base_url(); ?>assets/front/images/logo-admin.png"><img src="<?PHP echo base_url(); ?>assets/front/images/logo-admin.png" alt="<?php echo $this->config->item('company_name');?>"></a> <a href="index.html" class="retina-logo" data-dark-logo="<?PHP echo base_url(); ?>assets/front/images/logo-admin.png"><img src="<?PHP echo base_url(); ?>assets/front/images/logo-admin.png" alt="<?php echo $this->config->item('company_name');?>"></a> </div>
    <!-- #logo end -->
    
    <ul class="header-extras">
      <li> <i class="i-plain icon-email3 nomargin"></i>
        <div class="he-text"> Drop an Email <span>info@canvas.com</span> </div>
      </li>
      <li> <i class="i-plain icon-call nomargin"></i>
        <div class="he-text"> Get in Touch <span>1800-1144-551</span> </div>
      </li>
    </ul>
  </div>
  <div id="header-wrap"> 
    
    <!-- Primary Navigation
				============================================= -->
    <nav id="primary-menu" class="style-2">
      <div class="container clearfix">
        <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
        <ul>
          <li><a href="<?php echo site_url(); ?>">
            <div>Home</div>
            </a></li>
          
          <?php if(isset($this->categories[0])){ ?>
          <li class=""><a href="javascript:;">
            <div><?php echo lang('catalog'); ?></div>
            </a>
            <ul>
            <?php foreach($this->categories[0] as $cat_menu){?>
              <li <?php echo $cat_menu->active ? 'class="current"' : false; ?>><a href="<?php echo site_url($cat_menu->slug);?>"><div><?php echo $cat_menu->name;?></div></a>
                <!--<ul>
                  <li><a href="slider-revolution.html">
                    <div>Revolution Slider</div>
                    </a></li>
                </ul>-->
              </li>
            <?php } ;?>
            </ul>
          </li>
          <?php }; ?>
          
          
          
          
          
          
          
          <?php 
		  if(isset($this->pages[0])){
			  foreach($this->pages[0] as $menu_page){?>
				  <li>
				  <?php if(empty($menu_page->content)){?>
					  <a href="<?php echo $menu_page->url;?>" <?php if($menu_page->new_window ==1){echo 'target="_blank"';} ?>><?php echo $menu_page->menu_title;?></a>
				  <?php }else{?>
					  <a href="<?php echo site_url($menu_page->slug);?>"><?php echo $menu_page->menu_title;?></a>
				  <?php }?>
				  </li>
				  
		  <?php }} ?>
          
          
          
          
          
          
          
        </ul>
        <?php if($this->Customer_model->is_logged_in(false, false)){?>
        <div id="top-account" class="dropdown">
            <a href="#" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon-user"></i></a>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item tleft" href="<?php echo site_url('secure/my_account');?>"><?php echo lang('my_account')?></a>
                <a class="dropdown-item tleft" href="<?php echo  site_url('secure/my_downloads');?>"><?php echo lang('my_downloads')?></a>
                <!--<a class="dropdown-item tleft" href="#">Settings</a>-->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item tleft" href="<?php echo site_url('secure/logout');?>"><?php echo lang('logout');?>&nbsp;&nbsp;<i class="icon-signout"></i></a>
            </ul>
        </div>
        <?php } ?>      
        <!-- Top Cart
						============================================= -->
        <div id="top-cart"> <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>5</span></a>
          <div class="top-cart-content">
            <div class="top-cart-title">
              <h4>Shopping Cart</h4>
            </div>
            <div class="top-cart-items">
              <div class="top-cart-item clearfix">
                <div class="top-cart-item-image"> <a href="#"><img src="<?PHP echo base_url(); ?>assets/bookstore/images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt" /></a> </div>
                <div class="top-cart-item-desc"> <a href="#">Blue Round-Neck Tshirt</a> <span class="top-cart-item-price">$19.99</span> <span class="top-cart-item-quantity">x 2</span> </div>
              </div>
              <div class="top-cart-item clearfix">
                <div class="top-cart-item-image"> <a href="#"><img src="<?PHP echo base_url(); ?>assets/bookstore/images/shop/small/6.jpg" alt="Light Blue Denim Dress" /></a> </div>
                <div class="top-cart-item-desc"> <a href="#">Light Blue Denim Dress</a> <span class="top-cart-item-price">$24.99</span> <span class="top-cart-item-quantity">x 3</span> </div>
              </div>
            </div>
            <div class="top-cart-action clearfix"> <span class="fleft top-checkout-price">$114.95</span>
              <button class="button button-3d button-small nomargin fright">View Cart</button>
            </div>
          </div>
        </div>
        
        
        <!-- #top-cart end --> 
        
        <!-- Top Search
						============================================= -->
        <div id="top-search"> <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
          <form action="search.html" method="get">
            <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
          </form>
        </div>
        <!-- #top-search end --> 
        
      </div>
    </nav>
    <!-- #primary-menu end --> 
    
  </div>
</header>
<!-- #header end --> 

<?php if ($this->session->flashdata('message')):?>
	<div class="style-msg successmsg" align="center">
        <div class="sb-msg"><i class="icon-thumbs-up"></i><?php echo $this->session->flashdata('message');?></div>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
                        
    
<?php endif;?>

<?php if ($this->session->flashdata('error')):?>
    <div class="style-msg errormsg" align="center">
        <div class="sb-msg"><i class="icon-remove"></i><?php echo $this->session->flashdata('error');?></div>
    </div>
    
<?php endif;?>

<?php if (!empty($error)):?>
    <div class="style-msg errormsg" align="center">
        <div class="sb-msg"><i class="icon-remove"></i><?php echo $error;?></div>
    </div>
<?php endif;?>
