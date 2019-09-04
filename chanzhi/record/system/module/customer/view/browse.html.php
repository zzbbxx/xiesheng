<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='col-md-12'>
  <div class='panel'>
    <div class='panel-heading clearfix'>
      <div class='panel-actions'><?php commonModel::printLink('customer', 'create', '', '<i class="icon-plus"></i> ' . $lang->customer->create, 'class="btn btn-primary"');?></div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead>
        <tr class='text-center'>
          <th class='w-60px'><?php echo $lang->customer->id;?></th>
          <th><?php echo $lang->customer->abbreviation;?></th>
          <th class='w-200px'><?php echo $lang->customer->name;?></th>
          <th class='w-400px'><?php echo $lang->customer->address;?></th>
          <th class='w-180px'><?php echo $lang->customer->addedDate;?></th>
          <th><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($customers as $customer):?>
        <tr class='text-center text-top'>
          <td><?php echo $customer->id;?></td>
          <td><?php echo $customer->abbreviation;?></td>
          <td><?php echo $customer->name;?></td>
          <td><?php echo $customer->address;?></td>
          <td><?php echo $customer->addedDate;?></td>
          <td>
            <?php commonModel::printLink('customer', 'edit', "customerID=$customer->id", $lang->edit);?>
            <?php commonModel::printLink('customer', 'delete', "customerID=$customer->id", $lang->delete, 'class="deleter"');?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
