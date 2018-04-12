<table class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th>Symbol</th>
      
      <th>Exchange Rate</th>
      <th>Updated Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($rate as $row){?>
  <form method="post" action="<?php echo base_url();?>admin/currencyExchangeRate/currencyRate">
    <tr>
      <td><input type="text" name="symbol" Placeholder="Symbol" value="<?php echo $row->symbol; ?>" disabled="disabled" readonly /></td>
      
      <td><input type="text" name="value" Placeholder="USD Rate" value="<?php echo $row->exchange_rate; ?>"></td>
      
      <td><?php echo date("M d Y h:i A", strtotime($row->updated_date)); ?></td>
      <td><input type="submit" class="btn btn-primary" value="<?php echo lang('save');?>"></td>
    </tr>
  </form>
  <?php } ?>
  </tbody>
  
</table>
