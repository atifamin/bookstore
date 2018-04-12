<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600">
<style>
body{font-family:"Poppins",cursive;}
.hrbord{clear:both;height:5px;border-top:1px solid #eee;}
</style>
</head>

<body>

<div style="font-size:12px;">
    
    <h2><img src="<?php echo base_url(); ?>assets/front/images/logo-admin.png" alt="" style="height:45px;width:200px;" /><span style="float:right;">Order Date: &nbsp; <?php echo date('m/d/Y',strtotime($order->ordered_on)); ?></span></h2>
    
    <table style="border:1px solid #000; width:100%; font-size:13px;" cellpadding="5" cellspacing="0">
        <tr>
            <td style="width:50%; vertical-align:top;" class="packing">
                <h2 style="margin:0px">ORDER NUMBER: <?php echo $order->order_number;?></h2>
				<h2 style="margin:0px">PURCHASE ORDER: <?php echo $order->po_number;?></h2>
                <?php if(!empty($order->is_gift)):?>
                    <h1 style="margin:0px; font-size:4em;"><?php echo lang('packing_is_gift');?></h1>
                <?php endif;?>
            </td>
            <td style="width:10%; vertical-align:top;"></td>
            <td style="width:40%; vertical-align:top;" class="packing">
                <strong><?php echo lang('ship_to_address');?></strong><br/>     
                <?php echo (!empty($order->ship_company))?$order->ship_company.'<br/>':'';?>
                <?php echo $order->ship_firstname.' '.$order->ship_lastname;?>
				<div class="hrbord"></div>
                <?php echo $order->ship_address1;?><br>
                <?php echo (!empty($order->ship_address2))?$order->ship_address2.'<div class="hrbord"></div>':'';?>
                <?php echo $order->ship_city.', '.$order->ship_zone.' '.$order->ship_zip;?>
				<div class="hrbord"></div>
                <?php echo $order->ship_country;?>
				<div class="hrbord"></div>
                <?php echo $order->ship_email;?>
				<div class="hrbord"></div>
                <?php echo $order->ship_phone;?>

            <br/>
            </td>
        </tr>  
        
        <?php if(!empty($order->shipping_notes)):?>
            <tr>
                <td colspan="3" style="border-top:1px solid #000;">
                    <strong><?php echo lang('shipping_notes');?></strong><br/><?php echo $order->shipping_notes;?>
                </td>
            </tr>
        <?php endif;?>
    </table>
    
    <table border="1" style="width:100%; margin-top:10px; border-color:#000; font-size:13px; border-collapse:collapse;" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th width="5%" class="packing">
                    ITEM#
                </th>
				<th width="5%" class="packing">
                    #SKU
                </th>
                <th width="20%" class="packing">
                    DESCRIPTION
                </th>
				<th width="5%" class="packing">
                    PRICE
                </th>
				<th width="5%" class="packing">
                    QTY
                </th>
				<th width="5%" class="packing">
                    TOTAL
                </th>
            </tr>
        </thead>
    <?php $items = $order->contents; ?>

<?php $i=1;?>
<?php foreach($order->contents as $orderkey=>$product):
        $img_count = 1;
?>
        <tr>
			<td class="packing" style="text-align:center;">
                <?php echo $i; ?>
            </td>
			<td class="packing">
                <?php echo '#'.$product['sku']; ?>
            </td>
			<td class="packing">
				<?php echo $product['name']; ?><br />
                <?php
                
                // Print options
				$includeInProductBasePrice = 0;
                if(!empty($product['options']))
                { 
                    foreach($product['options'] as $name=>$value)
                    {
                        $name = explode('-', $name);
                        $name = trim($name[0]);
                        if(is_array($value))
                        {
                            echo '<div class="c1">'.$name.':<br/>';
                            foreach($value as $item)
                            {
                                echo '- '.$item.'<br/>'; 
                            }   
                            echo "</div>"; 
                        }
                        else
                        { 
                            echo '<div class="c2">'.$value.'</div>';  
                        } 
                    }
                }  
                ?>

            </td>
			<td class="packing" style="text-align:center;">
                <?php echo '$'.$product['saleprice'].' EA'; ?>
            </td>
            <td class="packing" style="text-align:center;">
                <?php echo $product['quantity'];?>
            </td>
			<td class="packing" style="text-align:center;">
                <?php //echo '$ '.number_format($product['quantity']*$product['saleprice'],2); ?>
				<?php echo '$ '.number_format($product['subtotal']); ?>
            </td>
        </tr>
<?php $i++; ?>		
<?php   endforeach;?>
		<tr>
			<td colspan="4" style="border:none;">&nbsp;</td>
			<td colspan=""><h2>SUB TOTAL</h2></td>
			<td colspan="" style="text-align:center;"><h2>$<?php echo number_format($order->subtotal,2);?></h2></td>
		</tr>
		<!--<tr>
			<td colspan="4" style="border:none;">&nbsp;</td>
			<td colspan=""><h2>GRAND TOTAL</h2></td>
			<td colspan="" style="text-align:center;"><h2>$<?php echo number_format($order->total,2); ?></h2></td>
		</tr>-->
    </table>
		<center>
		<p>
			<strong><?php echo config_item('company_name');?></strong><br />
			261 Wolfner Drive<br />
			St. Louis, MO 63026<br /><br />
			<strong>Toll Free: </strong>866-333-4030<br />
			<strong>Phone: </strong>636-600-4030<br />
			<strong>Fax: </strong>866-333-4035<br />
			<strong>Email: </strong>llw@respondo2.com<br />
		</p>
	</center>
</div>
</body>
</html>