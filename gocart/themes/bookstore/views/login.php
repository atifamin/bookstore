<?php
$company	= array('id'=>'bill_company', 'class'=>'form-control', 'name'=>'company', 'value'=> set_value('company'));
$first		= array('id'=>'bill_firstname', 'class'=>'form-control', 'name'=>'firstname', 'value'=> set_value('firstname'));
$last		= array('id'=>'bill_lastname', 'class'=>'form-control', 'name'=>'lastname', 'value'=> set_value('lastname'));
$email		= array('id'=>'bill_email', 'class'=>'form-control', 'name'=>'email', 'value'=>set_value('email'));
$phone		= array('id'=>'bill_phone', 'class'=>'form-control', 'name'=>'phone', 'value'=> set_value('phone'));
?>
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="col_one_third nobottommargin">
        <div class="well well-lg nobottommargin"> <?php echo form_open('secure/login', 'class="form-horizontal nobottommargin"'); ?> 
          <!--<form id="login-form" name="login-form" class="" action="#" method="post">-->
          <h3>Login to your Account</h3>
          <div class="col_full">
            <label for="login-form-username"><?php echo lang('email');?>:</label>
            <input type="email" id="login-form-username" name="email" value="" class="form-control" />
          </div>
          <div class="col_full">
            <label for="login-form-password"><?php echo lang('password');?>:</label>
            <input type="password" id="login-form-password" name="password" value="" class="form-control" />
          </div>
          <div class="col_full">
            <input id="checkbox-3" class="checkbox-style" name="remember" value="true" type="checkbox">
            <label for="checkbox-3" class="checkbox-style-3-label checkbox-small" style="text-transform:lowercase"><?php echo lang('keep_me_logged_in');?></label>
          </div>
          <div class="col_full nobottommargin">
            <button class="button button-3d nomargin" id="login-form-submit" name="submit" type="submit" value="login"><?php echo lang('form_login');?></button>
            <input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
            <input type="hidden" value="submitted" name="submitted"/>
            <a href="<?php echo site_url('secure/forgot_password'); ?>" class="fright"><?php echo lang('forgot_password')?>?</a></a> </div>
          </form>
        </div>
      </div>
      <div class="col_two_third col_last nobottommargin">
        <h3>Don't have an Account? Register Now.</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>
        <?php echo form_open('secure/register', 'class="form-horizontal nobottommargin"'); ?>
        <!--<form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">-->
        <input type="hidden" name="submitted" value="submitted" />
		<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
          <div class="col_half">
            <label for="company"><?php echo lang('account_company');?></label>
			<?php echo form_input($company);?>
          </div>
          <div class="col_half col_last">
            			<label for="account_firstname"><?php echo lang('account_firstname');?></label>
						<?php echo form_input($first);?>
          </div>
          <div class="clear"></div>
          <div class="col_half">
            <label for="account_lastname"><?php echo lang('account_lastname');?></label>
						<?php echo form_input($last);?>
          </div>
          <div class="col_half col_last">
            <label for="account_email"><?php echo lang('account_email');?></label>
						<?php echo form_input($email);?>
          </div>
          <div class="clear"></div>
          
          
          <div class="col_half col_last">
            <label for="account_phone"><?php echo lang('account_phone');?></label>
			<?php echo form_input($phone);?>
          </div>
          <div class="clear"></div>
          
          
          <div class="col_half">
            <label for="register-form-password"><?php echo lang('account_password');?>:</label>
            <input type="password" id="register-form-password" name="password" value="" class="form-control" />
          </div>
          <div class="col_half col_last">
            <label for="register-form-repassword"><?php echo lang('account_confirm');?></label>
            <input type="password" id="register-form-repassword" name="confirm" value="" class="form-control" />
          </div>
             
          <div class="col_half col_last">
          <input id="checkbox-e"    type="checkbox" class="checkbox-style" name="email_subscribe" value="1" <?php echo set_radio('email_subscribe', '1', TRUE); ?>>
          <label for="checkbox-e" class="checkbox-style-3-label checkbox-small" style="text-transform:lowercase"><?php echo lang('account_newsletter_subscribe');?></label>
						</div>

          <div class="clear"></div>
          <div class="col_full nobottommargin">
            <button type="submit" class="button button-3d button-black nomargin" id="register-form-submit"  value="<?php echo lang('form_register');?>">Register Now</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
