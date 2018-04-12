



<!DOCTYPE html>

<html>



<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="generator" content="undefined">

  <title>Login ..::.. RESPONSIVE RESPIRATORY INC.</title>

  <script>document.createElement( "picture" );</script>

  <script src="<?php echo base_url('assets/front/js/picturefill.min.js');?>" class="picturefill" async="async"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/coffeegrinder.min.css');?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/wireframe-theme.min.css');?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/main.css');?>">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600">
<style>
button.subbtn{
    background-color: #f47c4d;
    border-radius: 0;
    font-family: "Poppins",cursive;
    font-weight: 600;
    width: 100%;
	color: #fff;
    font-size: 1em;
	 display: inline-block;
    text-align: center;
    text-decoration: none;
	margin: 7px 0;
}
button.subbtn:hover{
background-color:#004F7C;
}
</style>
</head>



<body class="grid-2">

  <div class="row">

    <div class="coffee-span-12"></div>

  </div>

  <div class="row">

    <div class="coffee-span-3 coffee-1024-span-1 coffee-414-span-12 column-4"></div>

    <div class="coffee-span-6 coffee-1024-span-10 coffee-414-span-12 column-5">

      <div class="container container-3">

        <div class="subgrid">

          <div class="row">

            <div class="coffee-span-12">

              <div class="responsive-picture picture-2">

                <picture><img alt="" srcset="<?php echo base_url();?>assets/front/images/logo.png?id=248&amp;cache=1501800646987" src="data:<?php echo base_url();?>assets/front/image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7">

                </picture>

              </div>

            </div>

          </div>

          <div class="row">

            <div class="coffee-span-12">

              <h6 class="heading-1"><span class="heading-text-11">SIGN IN</span>

              </h6>

            </div>

          </div>
<?php if($this->session->flashdata('message')!=''){ ?>		  
<div class="row">
	<div class="coffee-span-12">
      <div class="container container-2b">
        <p class="paragraph"><span class="paragraph-text-9" style="color:green;"><?php echo $this->session->flashdata('message'); ?></span>
        </p>
      </div>
    </div>
</div>
<?php } ?>
<?php if($this->session->flashdata('error')!=''){ ?>		  
<div class="row">
	<div class="coffee-span-12">
      <div class="container container-2b">
        <p class="paragraph"><span class="paragraph-text-9" style="color:red;"><?php echo $this->session->flashdata('error'); ?></span>
        </p>
      </div>
    </div>
</div>
<?php } ?>		  
		  <?php echo form_open('secure/login', 'class="my_class1"'); ?>

          <div class="row">

            <div class="coffee-span-12 subgrid-column-20">

              <span class="text-element"><span class="text-text-10">USERNAME:</span>

              </span>

            </div>

          </div>

          <div class="row">

            <div class="coffee-span-12"><input value="" name="email" type="text" class="input-3">

            </div>

          </div>

          <div class="row">

            <div class="coffee-span-12 subgrid-column-20">

              <span class="text-element"><span class="text-text-10">PASSWORD:</span>

              </span>

            </div>

          </div>

          <div class="row">

            <div class="coffee-span-12"><input value="" name="password" type="password" class="input-3 " style="max-width: none;">

            </div>

          </div>

          <div class="row">

            <div class="coffee-span-12 subgrid-column-58"></div>

          </div>

          <div class="row">

            <div class="coffee-span-12">
			
			<button type="submit" class="link-button button-link-5 subbtn" onclick="submit_from()" role="button" name="submit">SIGN IN</button>

            </div>

          </div>
		  <input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
				<input type="hidden" value="submitted" name="submitted"/>
		  </form>

          <div class="row">

            <div class="coffee-span-12"><a style='font-family:"Poppins",cursive;' href="<?php echo site_url('secure/forgot_password'); ?>">Forgot Password</a></div>

          </div>

        </div>

      </div>

    </div>

    <div class="coffee-span-3 coffee-1024-span-1 coffee-414-span-12"></div>

  </div>

  <script src="<?php echo base_url('assets/front/js/jquery.min.js');?>"></script>

  <script src="<?php echo base_url('assets/front/js/outofview.js');?>"></script>

<script>
function submit_from(){
	$('.my_class1').submit();
} 
</script>
</body>



</html>

