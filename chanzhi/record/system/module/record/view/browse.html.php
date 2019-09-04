<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='col-md-12'>
  <div class='panel'>
    <div class='panel-heading clearfix'>
      <div class='panel-actions'><?php commonModel::printLink('record', 'create', '', '<i class="icon-plus"></i> ' . $lang->record->create, 'class="btn btn-primary"');?></div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead>
        <tr class='text-center'>
          <?php $vars = "driver=all&orderBy={$orderBy}&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}";?>
          <th class='w-60px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->record->id);?></th>
          <th class='w-120px'><?php commonModel::printOrderLink('beginDate', $orderBy, $vars, $lang->record->beginDate);?></th>
          <th class='w-120px'><?php commonModel::printOrderLink('finishDate', $orderBy, $vars, $lang->record->finishDate);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('customer', $orderBy, $vars, $lang->record->customer);?></th>
          <th><?php commonModel::printOrderLink('route', $orderBy, $vars, $lang->record->route);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('car', $orderBy, $vars, $lang->record->car);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('driver', $orderBy, $vars, $lang->record->driver);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->record->status);?></th>
          <th class='w-100px'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($records as $record):?>
        <tr class='text-center text-top'>
          <td><?php echo $record->id;?></td>
          <td><?php echo $record->beginDate;?></td>
          <td><?php echo $record->finishDate;?></td>
          <td><?php echo $customerList[$record->customerID];?></td>
          <td><?php echo $record->route;?></td>
          <td><?php echo $carList[$record->carID];?></td>
          <td><?php echo $driverList[$record->driverID];?></td>
          <td><?php if($record->status) echo $lang->record->statusList[$record->status];?></td>
          <td>
            <?php commonModel::printLink('record', 'edit', "recordID=$record->id", $lang->edit);?>
            <?php commonModel::printLink('record', 'delete', "recordID=$record->id", $lang->delete, 'class="deleter"');?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
