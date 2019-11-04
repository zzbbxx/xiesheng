<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='col-md-12'>
  <div class='panel'>
    <div class='panel-heading clearfix'>
      <div class='panel-actions'><?php commonModel::printLink('invoice', 'create', '', '<i class="icon-plus"></i> ' . $lang->invoice->create, 'class="btn btn-primary"');?></div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead>
        <tr class='text-center'>
          <th class='w-60px'><?php echo $lang->invoice->id;?></th>
          <th class='w-140px'><?php echo $lang->invoice->type;?></th>
          <th class='w-180px'><?php echo $lang->invoice->number;?></th>
          <th class='w-200px'><?php echo $lang->invoice->customer;?></th>
          <th class='w-100px'><?php echo $lang->invoice->money;?></th>
          <th><?php echo $lang->invoice->remark;?></th>
          <th class='w-140px'><?php echo $lang->invoice->createDate;?></th>
          <th><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($invoices as $invoice):?>
        <tr class='text-center text-top'>
          <td><?php echo $invoice->id;?></td>
          <td><?php echo $lang->invoice->typeList[$invoice->type];?></td>
          <td><?php echo $invoice->number;?></td>
          <td><?php echo $customerList[$invoice->customerID];?></td>
          <td><?php echo $invoice->money;?></td>
          <td><?php echo $invoice->remark;?></td>
          <td><?php echo $invoice->createDate;?></td>
          <td>
            <?php commonModel::printLink('invoice', 'edit', "invoiceID=$invoice->id", $lang->edit);?>
            <?php commonModel::printLink('invoice', 'delete', "invoiceID=$invoice->id", $lang->delete, 'class="deleter"');?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
