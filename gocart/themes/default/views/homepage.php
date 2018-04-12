







<!--Content page-->
  <div class="row">

    <div class="coffee-span-12 column-7"></div>

  </div>

  <div class="row">

    <div class="coffee-span-12 column-8">

      <h5><span class="heading-text-7">WELCOME - YOUR DASHBOARD HOME</span>

      </h5>

      <div class="rule rule-7a">

        <hr>

      </div>

    </div>

  </div>
<div id="addtocart_response" class="row"></div>
  <div class="row row-5"> 
  
<style>
ul.sidebar-cats{}
ul.sidebar-cats li{list-style:none;display:block;border-bottom:1px solid #c7eafb;}
ul.sidebar-cats li:last-child{border:none;}
ul.sidebar-cats li a{font-family:'Poppins', cursive;display:block;padding:10px 5px;color:#004f7c;text-align:center;}
ul.sidebar-cats li a:hover{background:#004f7c;color:#fff;}
.no-padding{padding:0px !important;}
</style>  
<div class="coffee-span-2 coffee-800-span-12 coffee-960-span-6 container container-2 no-padding">
	<div class="row"> 
		<div class="coffee-span-12" style="padding:20px;"> 
		  <h6><span class="heading-text-6">SHOP NOW</span> 
		  </h6> 
		  <div class="rule rule-7"> 
			<hr> 
		  </div> 
		</div> 
	</div>
	<ul id="" class="sidebar-cats">
		<?php if(isset($this->categories[0])):?>
		<?php foreach($this->categories[0] as $cat_menu):?>
		<li  <?php echo $cat_menu->active ? 'class="menu_1_sub_1 submenus_items submenu_menu_1_items"' : false; ?> id="" class=""> 
			<a href="<?php echo site_url($cat_menu->slug);?>">
				<span class="icon_menu_handle"></span>
				<span class="text_menu_link"><?php echo $cat_menu->name;?></span>
			</a>
		</li>
	<?php endforeach;?>
	<?php endif; ?> 
	</ul>
</div>

    <div class="coffee-span-6 coffee-800-span-12 coffee-960-span-6">

      <div class="container container-2a">

        <div class="subgrid">

          <div class="row">

            <div class="coffee-span-2 coffee-414-span-3 subgrid-column-55"><span class="glyph font-icon-1"><i class="coffeecup-icons-user"></i></span>

            </div>
	

            <div class="coffee-span-10 coffee-414-span-9">
			
              <h6 class="heading-5"><span class="heading-text-2"><?php echo $user_data->firstname;?> <?php echo $user_data->lastname;?></span>
              </h6>
			
              <p class="paragraph paragraph-5"><span class="paragraph-text-3">&nbsp;</span></p>
			
              <div class="rule rule-6">

                <hr>

              </div>

            </div>

          </div>

          <div class="row">

            <div class="coffee-span-12 subgrid-column-21">

              <h6><span class="heading-text-4">LOCATIONS</span>

              </h6>
 
            </div>

          </div>
		  <?php if(!empty($useraddresses)){ ?>	
		  <?php foreach($useraddresses as $DA){ ?>
          <div class="row">
            <div class="coffee-span-1 subgrid-column-4 coffee-533-span-1"><a class="glyph font-icon-link-1" href="<?php echo site_url('account/addressDetail'); ?>/<?php echo $DA->id;?>"><i class="coffeecup-icons-eye-plus"></i></a>
            </div>
            <div class="coffee-span-11 subgrid-column-3 coffee-533-span-11">
              <p class="paragraph paragraph-1"><span class="paragraph-text-4">
			        <a title="" href="<?php echo site_url('account/addressDetail'); ?>/<?php echo $DA->id;?>" class="paragraph-text-1"><?php echo $DA->business_name; ?> &raquo; <?php echo $DA->address1; ?> <?php echo $DA->address2; ?> <?php echo $DA->city; ?>, <?php echo $userstate->code;?>, <?php echo $DA->zip; ?></a></span></p>
            </div>
          </div> 
		  <?php } ?>
		  <?php } ?>

          <div class="row">

            <div class="coffee-span-12 subgrid-column-31">

              <div class="rule rule-6">

                <hr>

              </div>

            </div>

          </div>

          <div class="row">

            <div class="coffee-span-6 coffee-414-span-12"><a href="<?php echo site_url('account'); ?>" class="link-button-glyph button-link-icon-3"><span class="glyph-for-button icon-for-button-link-2"><i class="coffeecup-icons-user-plus"></i></span><span class="link-button-text text-for-button-link-2"><span class="text-for-button-link-text-3">MY ACCOUNT</span></span></a>

            </div>

            <div class="coffee-span-6 coffee-414-span-12"><a href="<?php echo site_url(); ?>contact-us" class="link-button-glyph button-link-icon-3"><span class="glyph-for-button icon-for-button-link-3"><i class="coffeecup-icons-phone"></i></span><span class="link-button-text text-for-button-link-3"><span class="text-for-button-link-text-3">CONTACT RRI</span></span></a>

            </div>

          </div>

        </div>

      </div>

      <div class="container container-2">

        <div class="subgrid subgrid-7">

          <div class="row">

            <div class="coffee-span-12">

              <h6><span class="heading-text-6">RECENT PURCHASES ALL LOCATIONS</span>

              </h6>

              <div class="rule rule-7">

                <hr>

              </div>

            </div>

          </div>
		<?php if(!empty($getRecentOrders)){ ?> 
		<?php foreach($getRecentOrders as $RO){ ?>
          <div class="row">
            <div class="coffee-span-4 subgrid-column-35">
              <h6 class="heading-4"><span class="heading-text-10"><?php echo  date('m/d/Y',strtotime($RO->ordered_on));?></span>
              </h6>
            </div>
            <div class="coffee-span-4 subgrid-column-36">
              <h6 class="heading-3"><span class="heading-text-10">PO <?php echo $RO->po_number; ?></span>
              </h6>
            </div>
            <div class="coffee-span-4 subgrid-column-37">
              <h6 class="heading-2"><span class="heading-text-10">$<?php echo number_format($RO->total,2); ?></span>
              </h6>
            </div>
          </div>

          <div class="row subgrid-row-3">
            <div class="coffee-span-9 subgrid-column-38 coffee-414-span-8">
              <p class="paragraph paragraph-4"><span class="paragraph-text-5">Shipped to: <?php echo $RO->ship_address1; ?> <?php echo $RO->ship_address2; ?> <?php echo $RO->ship_city; ?>, <?php echo $RO->ship_zone; ?> <?php echo $RO->ship_zip; ?></span>
              </p>
            </div>
            <div class="coffee-span-3 subgrid-column-39 coffee-414-span-4"><a class="link-button button-link-1" role="button" href="<?php echo site_url('myorders/orderDetail'); ?>/<?php echo $RO->id; ?>">DETAILS</a>
            </div>
          </div>

          <div class="row">
            <div class="coffee-span-12 subgrid-column-38">
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div> 
		<?php } ?>  
		
		  <div class="row">
            <div class="coffee-span-12"><a class="link-button button-link-4" role="button" href="<?php echo site_url('myorders'); ?>"><span class="button-link-text-1">VIEW ALL ORDERS</span></a>
            </div>
          </div>
		<?php } ?>
        </div>

      </div>

    </div>

    <div class="coffee-span-4 coffee-800-span-12 coffee-960-span-6">

      <div class="container container-2">

        <div class="subgrid">

          <div class="row">

            <div class="coffee-span-12">

              <h6><span class="heading-text-6">MY FAVORITES</span>

              </h6>

              <div class="rule rule-7">

                <hr>

              </div>

            </div>

          </div>

          <div class="row">
			<?php if(!empty($Favourites)){ ?>
			<?php $fpcount = 1; ?>
			<?php foreach($Favourites as $fp){ ?>
            <div class="coffee-span-6 <?php if($fpcount==2){echo 'subgrid-column-2';}else{echo 'subgrid-column-32';} ?> coffee-414-span-12"><a href="<?php echo site_url(); ?><?php echo $fp->slug; ?>" class="responsive-picture">
				<?php
					$photo  = '<img src="'.base_url('uploads/images/thumbnails/no-image.png').'" class="img-responsive productimg" alt=""/>';
					$fp->images    =  array_values((array)json_decode($fp->images));//array_values($fp->images); 
					if(!empty($fp->images[0])){
						$primary    = $fp->images[0]; 
						foreach($fp->images as $photo){
						if(isset($photo->primary)){
							$primary    = $photo;
						}
						} 
						$photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" class="img-responsive productimg" alt=""/>';
					}
				?>
				<picture><?php echo $photo; ?></picture>
			</a>

              <span class="text-element text-12"><span class="text-text-19">#<?php echo $fp->sku; ?></span>

              </span>

              <h6 class="product-title-home"><span class="heading-text-5"><?php echo $fp->name; ?></span>

              </h6>

              <h6><span class="heading-text-9">$<?php echo number_format($fp->saleprice,2); ?></span>

              </h6>
			  
			  <?php echo form_open('cart/add_to_cart', 'class="form-horizontal addtocart"');?>
			  <input type="hidden" name="cartkey" value="<?php echo $this->session->flashdata('cartkey'); ?>" />
			  <input type="hidden" name="id" value="<?php echo $fp->productid; ?>" />
			  <input value="1" name="number-name" type="hidden">
			  <button type="button" onclick="submitcartform(<?php echo $fp->productid; ?>)" class="link-button button-link-3" role="button">ADD TO CART</button>
			  </form>
            </div>
			<?php if($fpcount==2){echo '<div class="row"><div class="coffee-span-12 subgrid-column-34"><div class="rule rule-6"><hr></div></div></div>'; $fpcount = 0;} ?> 
			<?php $fpcount++; ?>
			<?php } ?>
			<?php } ?> 

          </div> 


        </div>

      </div>

    </div>

  </div>

  <div class   ="row">

    <div class ="coffee-span-12 column-2"></div>
 </div>
<script type="text/javascript">
function submitcartform(productid){
	//$("#cartform_"+productid).submit(); 
	$("#overlay").fadeIn();
	$("#loader").fadeIn();
	var quantity  = 1;
	$.post("<?php echo site_url('cart/add_to_cart'); ?>",{id:productid,quantity:quantity}).done(function(data){ 
		$("#addtocart_response").html(data);
		$("#overlay").fadeOut();
		$("#loader").fadeOut();
		window.scroll(0,0);
		var currentitems = parseInt($("#cartitemstotal").val());
		var newcartitems = currentitems+quantity;
		$("#spancarttotalitems").html('CART: '+newcartitems+' ITEMS');
		$("#cartitemstotal").val(newcartitems)
	});
}
</script>

  
  


