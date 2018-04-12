<style>
.minh{min-height:340px !important;}
.minh2{min-height:82px;}
img.productimg{min-height:110px;}
</style>
<div class="row">
  <div class="coffee-span-12 column-7"></div>
</div>  
<div class="row">
    <div class="coffee-span-12 column-8">
      <h5><span class="heading-text-7">MY FAVORITES</span>
      </h5>
      <div class="rule rule-7a">
        <hr>
      </div>
    </div>
  </div>
<div class="row">
    <div class="coffee-span-12">
      <span class="text-element text-6"><span class="text-text-7"><a title="" href="<?php echo site_url(); ?>">HOME</a> &gt; MY FAVORITES</span>
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
	
	
<div class="row row-6"> 
<?php $pcounter = 1; ?>
<?php foreach($Favourites as $product): ?>
    <div class="coffee-span-3 coffee-960-span-4 coffee-533-span-6 coffee-414-span-12">
      <div class="container container-2c minh">
		<a href="<?php echo site_url(); ?><?php echo $product->slug; ?>">
        <div class="subgrid subgrid-2">
          <div class="row">
			<?php
                $photo  = '<img src="'.base_url('uploads/images/thumbnails/no-image.png').'" class="img-responsive productimg" alt=""/>';
                $product->images    = array_values((array)json_decode($product->images)); 
				if(!empty($product->images[0])){
                    $primary    = $product->images[0]; 
                    foreach($product->images as $photo){
                    if(isset($photo->primary)){
                        $primary    = $photo;
                    }
                    } 
					$photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" class="img-responsive productimg" alt=""/>';
                }
            ?> 
            <div class="coffee-span-12"><picture><?php echo $photo; ?></picture>
            </div> 
          </div>
          <div class="row">
            <div class="coffee-span-12">
              <h6 class="heading-6 product-title"><span class="heading-text-5"><?php echo $product->name;?></span>
              </h6>  
			  <span class="text-element"><span class="text-text-20">#<?php echo $product->sku;?></span>
              </span>
              <h6><span class="heading-text-9"><?php echo format_currency(getSalePrice($product->productid)); ?></span>
              </h6>
            </div>
          </div>
		  <div class="row">
            <div class="coffee-span-4 subgrid-column-1"><a class="glyph font-icon-link-2" href="<?php echo site_url(); ?><?php echo $product->slug; ?>" title="More Information"><i class="coffeecup-icons-zoom-in2"></i></a>
            </div>
            <div class="coffee-span-4 subgrid-column-10">
			<form id="cartform_<?php echo $product->productid; ?>" class="form-horizontal addtocart productsall" action="<?php echo site_url('cart/add_to_cart'); ?>" method="POST"> 
			  <input type="hidden" name="cartkey" value="<?php echo $this->session->flashdata('cartkey'); ?>" />
			  <input type="hidden" name="id" value="<?php echo $product->productid; ?>" />
			  <input value="1" name="number-name" type="hidden"> 
			</form>
			<a class="glyph font-icon-link-2" onclick="submitcartform(<?php echo $product->productid; ?>)" title="Add to Cart"><i class="coffeecup-icons-cart5"></i></a>
            </div>
            <div id="favouriteproducticon_<?php echo $product->productid;?>" class="coffee-span-4 subgrid-column-11">
			<a style="color:#E0245E;" class="glyph font-icon-link-2" onclick="removeFromFavourite(<?php echo $product->productid;?>)" title="Remove From Favorites"><i class="coffeecup-icons-heart4"></i></a>
            </div>
          </div>
        </div>
		</a>
      </div>
    </div>
<?php if($pcounter==4){echo '<div style="clear:both;height:20px;"></div>'; $pcounter=0; }  ?>
<?php $pcounter++; ?>	
<?php endforeach;?>	 
</div>
  	</div>
</div>
  
<div style="clear:both;height:30px;"></div> 
   
<script type="text/javascript">
function addToFavourite(productid){
	$("#overlay").fadeIn();
	$("#loader").fadeIn();
	$.post("<?php echo site_url('favourites/addfavourite'); ?>",{productid:productid}).done(function(data){ 
		$("#overlay").fadeOut();
		$("#loader").fadeOut();
		location.reload();
	});
}
function removeFromFavourite(productid){
	var confirmation = confirm('Are you sure you want to remove this product from favourite list?');
	if(confirmation===true){
		$("#overlay").fadeIn();
		$("#loader").fadeIn();
		$.post("<?php echo site_url('favourites/removefavourite'); ?>",{productid:productid}).done(function(data){ 
			$("#overlay").fadeOut();
			$("#loader").fadeOut();
			location.reload();
		});
	}
}
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
