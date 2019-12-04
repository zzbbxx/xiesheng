<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='col-md-12'>
  <div class='panel'>
    <div class='panel-heading clearfix'>
      <div class='panel-actions'><?php commonModel::printLink('maintenance', 'create', '', '<i class="icon-plus"></i> ' . $lang->maintenance->create, 'class="btn btn-primary"');?></div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead>
        <tr class='text-center'>
          <th class='w-60px'><?php echo $lang->maintenance->id;?></th>
          <th class='w-180px'><?php echo $lang->maintenance->address;?></th>
          <th class='w-180px'><?php echo $lang->maintenance->createdDate;?></th>
          <th class='w-100px'><?php echo $lang->maintenance->money;?></th>
          <th class='w-80px'><?php echo $lang->maintenance->car;?></th>
          <th class='w-120px'><?php echo $lang->maintenance->driver;?></th>
          <th><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($maintenances as $maintenance):?>
        <tr class='text-center text-top'>
          <td><?php echo $maintenance->id;?></td>
          <td><?php echo $maintenance->address;?></td>
          <td><?php echo $maintenance->createdDate;?></td>
          <td><?php echo $maintenance->money;?></td>
          <td><?php echo $carList[$maintenance->carID];?></td>
          <td><?php echo $driverList[$maintenance->driverID];?></td>
          <td>
            <?php commonModel::printLink('maintenance', 'edit', "maintenanceID=$maintenance->id", $lang->edit);?>
            <?php commonModel::printLink('maintenance', 'delete', "maintenanceID=$maintenance->id", $lang->delete, 'class="deleter"');?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
