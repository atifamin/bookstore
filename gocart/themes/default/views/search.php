<div class="row">
    <div class="coffee-span-12 column-7"></div>
</div>
<div class="row row-7">
    <div class="coffee-span-5 column-12 coffee-960-span-5 coffee-800-span-12">
      <h5><span class="heading-text-7">SEARCH RESULT</span>
      </h5>
      <div class="rule rule-7a">
        <hr>
      </div>
    </div> 
</div>
<div class="row">
    <div class="coffee-span-12">
      <span class="text-element text-6"><span class="text-text-7">(<?php echo count($items); ?>) ITEMS FOUND.</span>
      </span>
    </div>
</div>
<div id="addtocart_response" class="row"></div>

<style>
ul.sidebar-cats{}
ul.sidebar-cats li{list-style:none;display:block;border-bottom:1px solid #c7eafb;}
ul.sidebar-cats li:last-child{border:none;}
ul.sidebar-cats li a{font-family:'Poppins', cursive;display:block;padding:10px 5px;color:#004f7c;text-align:center;}
ul.sidebar-cats li a:hover{background:#004f7c;color:#fff;}
ul.sidebar-cats li.active a{background:#004f7c !important;color:#fff !important;}
.no-padding{padding:0px !important;}
</style>
<div class="row row-6">
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
			<li  <?php echo $cat_menu->active ? 'class="active"' : false; ?> id="" class=""> 
				<a href="<?php echo site_url($cat_menu->slug);?>">
					<span class="icon_menu_handle"></span>
					<span class="text_menu_link"><?php echo $cat_menu->name;?></span>
				</a>
			</li>
		<?php endforeach;?>
		<?php endif; ?> 
		</ul>
	</div>
	<div class="coffee-span-10">
	
	
<div class="row row-5">
	<div class="coffee-span-12 coffee-800-span-12 coffee-1024-span-12"> 
		<div class="container container-2">
        <div class="subgrid subgrid-7">
        <?php if(!empty($items)){ ?> 
		<?php foreach($items as $Det){ ?>
		<div class="row">
            <div class="coffee-span-1 subgrid-column-62 coffee-800-span-2 coffee-414-span-12">
              <div class="responsive-picture picture-3">
			                 <?php
					$photo  = '<img src="'.base_url('uploads/images/thumbnails/no-image.png').'" class="img-responsive productimg" alt=""/>';
					$Det->images    = array_values((array)json_decode($Det->images)); 
					if(!empty($Det->images[0])){
						$primary    = $Det->images[0]; 
						foreach($Det->images as $photo){
						if(isset($photo->primary)){
							$primary    = $photo;
						}
						} 
						$photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" class="img-responsive productimg" alt=""/>';
					}
				?>
                <picture><?php echo $photo; ?></picture>
              </div>
            </div>
            <div class="coffee-span-8 subgrid-column-63 coffee-800-span-7 coffee-414-span-12">
              <span class="text-element"><a title="" href="<?php echo $Det->slug; ?>"><?php echo $Det->name; ?></a>
              </span>
              <span class="text-element">#<?php echo $Det->sku; ?></span>
              <span class="text-element"><span class="text-text-13"><?php echo format_currency(getSalePrice($Det->id));?></span>
              </span>
            </div>  
            <div class="coffee-span-3 coffee-414-span-12">
				<form id="cartform_<?php echo $Det->id; ?>" class="form-horizontal addtocart productsall" action="<?php echo site_url('cart/add_to_cart'); ?>" method="POST"> 
				  <input name="cartkey" value="<?php echo $this->session->flashdata('cartkey'); ?>" type="hidden">
				  <input name="id" value="<?php echo $Det->id; ?>" type="hidden">
				  <input value="1" name="number-name" type="hidden"> 
				</form>
				<a class="link-button button-link-6" role="button" onclick="submitcartform(<?php echo $Det->id; ?>)">ADD TO CART</a>
            </div>
        </div>
		<div class="row">
            <div class="coffee-span-12 subgrid-column-31">
              <div class="rule rule-6">
                <hr>
              </div>
            </div>
          </div>
		<?php } ?>
		<?php }else{ ?>
		<div class="container container-2b">
			<p class="paragraph"><span class="paragraph-text-9">Product Not Matched</span>
			</p>
		  </div>
		<?php } ?> 
		  
		  
        </div>
		</div> 
	</div>
</div> 

</div>
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