<style>
.minh{min-height:340px !important;}
.minh2{min-height:82px;}
</style>
 <div class="row">
    <div class="coffee-span-12 column-7"></div>
  </div>
  <div class="row">
    <div class="coffee-span-12 column-8">
      <h5><span class="heading-text-7">OXYGEN CONSERVERS</span>
      </h5>
      <div class="rule rule-7a">
        <hr>
      </div>
    </div>
  </div>
  <div class="row row-2">
      <?php if(!empty($category->description)): ?>
    <div class="coffee-span-12">
        
      <p class="paragraph"><span class="paragraph-text-33"><?php echo $category->description; ?></span>
      </p>
    </div>
      <?php endif; ?>
  </div>
  <div class="row row-6">
          <?php if(count($products) == 0):?>
        <h2 style="margin:50px 0px; text-align:center;">
            <?php echo lang('no_products');?>
        </h2>
    <?php elseif(count($products) > 0):?>
      
       <?php
            
           $pcounter = 1;
            foreach($products as $product):
               ?>
                        
                        
                        <?php
                        $photo  = theme_img('no_picture.png', lang('no_image_available'));
                        $product->images    = array_values($product->images);
            
                        if(!empty($product->images[0]))
                        {
                            $primary    = $product->images[0]; 
                            foreach($product->images as $photo)
                            {
                                if(isset($photo->primary))
                                {
                                    $primary    = $photo;
                                }
                            }

                           // $photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" alt="'.$product->seo_title.'"/>';
                        
                            $img_src = "'.base_url('uploads/images/thumbnails/'.$primary->filename').'";
                                }
                        ?>
    <div class="coffee-span-2 coffee-960-span-4 coffee-533-span-6 coffee-414-span-12">
      <div class="container container-2c minh">
        <div class="subgrid subgrid-2">
          <div class="row">
              <div class="coffee-span-12"><a href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>" class="responsive-picture picture-link-5"><picture><img alt=""  src="<?php echo base_url('uploads/images/medium/22194a62f580b8db8220e16a17fbd4c3.png');?>"></picture></a>
            </div>
          </div>
          <div class="row">
            <div class="coffee-span-12">
              <h6 class="heading-6 minh2"><span class="heading-text-5"><?php echo $product->name;?></span>
              </h6>
              <span class="text-element"><span class="text-text-20">#<?php echo $product->sku;?></span>
              </span>
              <h6><span class="heading-text-9"><?php echo format_currency($product->price); ?></span>
              </h6>
            </div>
          </div>
          <div class="row">
            <div class="coffee-span-4 subgrid-column-1"><a class="glyph font-icon-link-2" href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>" title="More Information"><i class="coffeecup-icons-zoom-in2"></i></a>
            </div>
            <div class="coffee-span-4 subgrid-column-10"><a class="glyph font-icon-link-2" href="#" title="Add to Cart"><i class="coffeecup-icons-cart5"></i></a>
            </div>
            <div class="coffee-span-4 subgrid-column-11"><a class="glyph font-icon-link-2" href="#" title="Add to Favorites"><i class="coffeecup-icons-heart4"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
	<?php   if($pcounter==6){echo '<div style="clear:both;height:20px;"></div>'; $pcounter=0; } ?>
      <?php $pcounter++; ?>
            <?php  endforeach; ?>
      <?php endif;?>
  </div>
 
  <div class="row">
    <div class="coffee-span-12 column-2"></div>
  </div>

