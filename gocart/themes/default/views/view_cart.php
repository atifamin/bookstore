<?php if(isset($_GET['SubmitForm']) && $_GET['SubmitForm']=='Yes'){ ?>
<style>.cartwhitebg{background:transparent url("<?php echo base_url(); ?>assets/front/images/new_bg-main-background_pattern.jpg") repeat scroll left top;width:100%;height:100%;position:absolute;}</style>
<?php } ?>

<div class="row">
    <div class="coffee-span-12 column-7"></div>
</div>
<div class="row">
    <div class="coffee-span-12 column-8">
      <h5><span class="heading-text-7"><?php echo lang('your_cart');?></span>
      </h5>
      <div class="rule rule-7a">
        <hr>
      </div>
    </div>
</div>
<div class="row">
    <div class="coffee-span-12">
      <span class="text-element text-6"><span class="text-text-7"><a title="" href="<?php echo site_url(); ?>">HOME</a> &gt; CART</span>
      </span>
    </div>
</div>
<div class="row">
    <div class="coffee-span-12 column-7"></div>
</div>


<?php if ($this->go_cart->total_items()==0):?>
<div class="row">
    <div class="coffee-span-12">
      <div class="container container-2b">
        <p class="paragraph"><span class="paragraph-text-9"><?php echo lang('empty_view_cart');?></span>
        </p>
      </div>
    </div>
</div> 
<div class="row">
    <div class="coffee-span-12 column-7"></div>
</div>
<?php else: ?>
<div class="cartwhitebg"></div>
    <?php echo form_open('cart/update_cart', array('id'=>'update_cart_form'));?>
    
    <?php include('checkout/summary.php');?>
    
    
    <div class="row">
        <!--<div class="span5">
            <label><?php echo lang('coupon_label');?></label>
            <input type="text" name="coupon_code" class="span3" style="margin:0px;">
            <input class="span2 btn" type="submit" value="<?php echo lang('apply_coupon');?>"/>
            
            <?php if($gift_cards_enabled):?>
                <label style="margin-top:15px;"><?php echo lang('gift_card_label');?></label>
                <input type="text" name="gc_code" class="span3" style="margin:0px;">
                <input class="span2 btn"  type="submit" value="<?php echo lang('apply_gift_card');?>"/>
            <?php endif;?>
        </div>
        
        <div class="span7" style="text-align:right;">
                <input id="redirect_path" type="hidden" name="redirect" value=""/>
    
                <?php if(!$this->Customer_model->is_logged_in(false,false)): ?>
                    <input class="btn" type="submit" onclick="$('#redirect_path').val('checkout/login');" value="<?php echo lang('login');?>"/>
                    <input class="btn" type="submit" onclick="$('#redirect_path').val('checkout/register');" value="<?php echo lang('register_now');?>"/>
                <?php endif; ?>
                    <input class="btn" type="submit" value="<?php echo lang('form_update_cart');?>"/>
                    
            <?php if ($this->Customer_model->is_logged_in(false,false) || !$this->config->item('require_login')): ?>
                <input class="btn btn-large btn-primary" type="submit" onclick="$('#redirect_path').val('checkout');" value="<?php echo lang('form_checkout');?>"/>
            <?php endif; ?>
            
        </div>-->
    </div>

</form>
<?php endif; ?>
<?php if(isset($_GET['SubmitForm']) && $_GET['SubmitForm']=='Yes'){ ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#redirect_path').val('checkout');
	$("#update_cart_form").submit();
});
</script>
<?php } ?>