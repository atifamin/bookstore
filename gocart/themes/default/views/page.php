<style>
.row p{font-family:"Poppins",cursive;font-size:15px;}
textarea.contactus-textarea{line-height:20px !important;}
</style>
<div class="row">
  <div class="coffee-span-12 column-7"></div>
</div>
<?php  $cat_name = $this->uri->segment(1); $cat_name = strtoupper($cat_name); ?>
<div class="row">
    <div class="coffee-span-12">
      <span class="text-element text-6"><span class="text-text-7"><a title="" href="<?php echo site_url(); ?>">HOME</a> &gt; <?php echo str_replace('-', ' ', $cat_name); ?></span>
      </span>
    </div>
</div>
<div class="row row-1 bodbottom">
<?php echo  $page->content; ?>
</div>
<div class="row">
  <div class="coffee-span-12 column-7"></div>
</div>