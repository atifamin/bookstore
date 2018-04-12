<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<link href="<?php echo base_url(); ?>assets/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
<style>

.daterangepicker .calendar{
	max-width:305px !important;
}

</style>

<?php
//set "code" for searches
if(!$code)
{
	$code = '';
}
else
{
	$code = '/'.$code;
}
function sort_url($lang, $by, $sort, $sorder, $code, $admin_folder)
{
	if ($sort == $by)
	{
		if ($sorder == 'asc')
		{
			$sort	= 'desc';
			$icon	= ' <i class="icon-chevron-up"></i>';
		}
		else
		{
			$sort	= 'asc';
			$icon	= ' <i class="icon-chevron-down"></i>';
		}
	}
	else
	{
		$sort	= 'asc';
		$icon	= '';
	}
		

	$return = site_url($admin_folder.'/products/index/'.$by.'/'.$sort.'/'.$code);
	
	echo '<a href="'.$return.'">'.lang($lang).$icon.'</a>';

}

if(!empty($term)):
	$term = json_decode($term);
	
	if(!empty($term->term) || !empty($term->category_id)):?>
		<div class="alert alert-info">
			<?php echo sprintf(lang('search_returned'), intval($total));?>
		</div>
	<?php endif;?>
<?php endif;?>

<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('confirm_delete_product');?>');
}
</script>
<style type="text/css">
	.pagination {
		margin:0px;
		margin-top:-3px;
	}
</style>
<div class="row">
	<div class="span12" style="border-bottom:1px solid #f5f5f5;">
		<div class="row">
			<div class="span3">
				<?php echo $this->pagination->create_links();?>	&nbsp;
			</div>
			
			<div class="span9">
				<?php echo form_open($this->config->item('admin_folder').'/products/index', 'class="form-inline" style="float:right"');?>
					<fieldset>
                    <input class="form-control" type="text" name="created_at" value="<?php if(isset($term) && !empty($term->created_at)){echo $term->created_at;} ?>" />
						<?php
						
						function list_categories($id, $categories, $sub='') {

							foreach ($categories[$id] as $cat):?>
							<option class="span2" value="<?php echo $cat->id;?>"><?php echo  $sub.$cat->name; ?></option>
							<?php
							if (isset($categories[$cat->id]) && sizeof($categories[$cat->id]) > 0)
							{
								$sub2 = str_replace('&rarr;&nbsp;', '&nbsp;', $sub);
								$sub2 .=  '&nbsp;&nbsp;&nbsp;&rarr;&nbsp;';
								list_categories($cat->id, $categories, $sub2);
							}
							endforeach;
						}
						
						if(!empty($categories))
						{
							echo '<select name="category_id">';
							echo '<option value="">'.lang('filter_by_category').'</option>';
							list_categories(0, $categories);
							echo '</select>';
							
						}?>
						
						<input type="text" class="span2" name="term" placeholder="<?php echo lang('search_term');?>" /> 
						<button class="btn" name="submit" value="search"><?php echo lang('search')?></button>
						<a class="btn" href="<?php echo site_url($this->config->item('admin_folder').'/products/index');?>">Reset</a>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="btn-group pull-right">
</div>

<div class="row">
<div class="col-md-12" style="overflow:scroll">
<?php echo form_open($this->config->item('admin_folder').'/products/bulk_save', array('id'=>'bulk_form'));?>
	
    <table class="table table-striped" style="width:100%">
		<thead>
			<tr>
            <th>
					<span class="btn-group pull-right">
						<button class="btn" href="#"><i class="icon-ok"></i> <?php echo lang('bulk_save');?></button>
						<a class="btn" style="font-weight:normal;"href="<?php echo site_url($this->config->item('admin_folder').'/products/form');?>"><i class="icon-plus-sign"></i> <?php echo "Add Product"; //lang('add_new_product');?></a>
					</span>
				</th>
				<!--<th><?php echo sort_url('sku', 'sku', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>-->
				<th><?php echo sort_url('name', 'name', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
				<th><?php echo sort_url('price', 'price', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
				<th><?php echo sort_url('saleprice', 'saleprice', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
				<!--<th><?php //echo sort_url('quantity', 'quantity', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>-->
				<th><?php echo sort_url('enabled', 'enabled', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
                <th><?php echo sort_url('publisher', 'publisherId', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
				<th><?php echo sort_url('author', 'authorId', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
				<th><?php echo sort_url('edition', 'editionId', $order_by, $sort_order, $code, $this->config->item('admin_folder'));?></th>
				
			</tr>
		</thead>
		<tbody>
		<?php echo (count($products) < 1)?'<tr><td style="text-align:center;" colspan="7">'.lang('no_products').'</td></tr>':''?>
	<?php foreach ($products as $product):?>
			<tr>
            <td>
					<span class="btn-group pull-right">
						<a class="btn" href="<?php echo  site_url($this->config->item('admin_folder').'/products/form/'.$product->id);?>"><i class="icon-pencil"></i>  <?php echo lang('edit');?></a>
						<a class="btn" href="<?php echo  site_url($this->config->item('admin_folder').'/products/form/'.$product->id.'/1');?>"><i class="icon-share-alt"></i> <?php echo lang('copy');?></a>
						<a class="btn btn-danger" href="<?php echo  site_url($this->config->item('admin_folder').'/products/delete/'.$product->id);?>" onclick="return areyousure();"><i class="icon-trash icon-white"></i> <?php echo lang('delete');?></a>
					</span>
				</td>
				<!--<td><?php echo form_input(array('name'=>'product['.$product->id.'][sku]','value'=>form_decode($product->sku), 'class'=>'span2'));?></td>-->
				<td><?php echo form_input(array('name'=>'product['.$product->id.'][name]','value'=>form_decode($product->name), 'class'=>'span2'));?></td>
				<td><?php echo form_input(array('name'=>'product['.$product->id.'][price]', 'value'=>set_value('price', $product->price), 'class'=>'span1'));?></td>
				<td><?php echo form_input(array('name'=>'product['.$product->id.'][saleprice]', 'value'=>set_value('saleprice', $product->saleprice), 'class'=>'span1'));?></td>
				<!--<td><?php //echo ((bool)$product->track_stock)?form_input(array('name'=>'product['.$product->id.'][quantity]', 'value'=>set_value('quantity', $product->quantity), 'class'=>'span1')):'N/A';?></td>-->
				<td>
					<?php
					 	$options = array(
			                  '1'	=> lang('enabled'),
			                  '0'	=> lang('disabled')
			                );

						echo form_dropdown('product['.$product->id.'][enabled]', $options, set_value('enabled',$product->enabled), 'class="span2"');
					?>
				</td>
                
               
                <td>
				
				   <select name="product[<?php echo $product->id ?>][publisherId]" class="selectpicker" data-live-search="true">
				   <option>Select</option>
				  <?php foreach($query3 as $publisher){ ?>
				   
				   <option value="<?php echo $publisher->publisherId; ?>" <?php if($product->publisherId==$publisher->publisherId){echo 'selected="selected"';} ?>><?php echo $publisher->publisherName; ?></option>
				   <?php }?>
                   </select>
				</td>
				<td><?php //echo form_input(array('name'=>'product['.$product->id.'][authorId]', 'value'=>set_value('authorId', $product->authorId), 'class'=>'span1'));?>
				
				   <select name="product[<?php echo $product->id ?>][authorId]" class="selectpicker"  data-live-search="true">
				   <option>Select</option>
				  <?php foreach($query2 as $author){ ?>
				   
				   <option value="<?php echo $author->authorId; ?>" <?php if($product->authorId==$author->authorId){echo 'selected="selected"';} ?>><?php echo $author->authorName; ?></option>
				   <?php }?>
                   </select>
				</td>
				<td><?php //echo form_input(array('name'=>'product['.$product->id.'][editionId]', 'value'=>set_value('editionId', $product->editionId), 'class'=>'span1'));?>
				
				   <select name="product[<?php echo $product->id ?>][editionId]" class="selectpicker"  data-live-search="true">
				  <option>Select</option>
				  <?php foreach($query1 as $edition){ ?>
				   
				   <option value="<?php echo $edition->editionId; ?>" <?php if($product->editionId==$edition->editionId){echo 'selected="selected"';} ?>><?php echo $edition->editionName; ?></option>
				   <?php }?>
                   </select>
				</td>
                
				
			</tr>
	<?php endforeach; ?>
		</tbody>
	</table>
</form>
</div></div>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/daterangepicker/daterangepicker.js"></script>
<script>
$('input[name="created_at"]').daterangepicker();
</script>

