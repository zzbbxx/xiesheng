<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='col-md-12'>
  <div class='panel'>
    <div class='panel-heading clearfix'>
      <div class='panel-actions'><?php commonModel::printLink('violation', 'create', '', '<i class="icon-plus"></i> ' . $lang->violation->create, 'class="btn btn-primary"');?></div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead>
        <tr class='text-center'>
          <th class='w-60px'><?php echo $lang->violation->id;?></th>
          <th class='w-180px'><?php echo $lang->violation->status;?></th>
          <th class='w-180px'><?php echo $lang->violation->number;?></th>
          <th class='w-100px'><?php echo $lang->violation->money;?></th>
          <th class='w-80px'><?php echo $lang->violation->car;?></th>
          <th class='w-120px'><?php echo $lang->violation->driver;?></th>
          <th><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($violations as $violation):?>
        <tr class='text-center text-top'>
          <td><?php echo $violation->id;?></td>
          <td><?php echo $lang->violation->statusList[$violation->status];?></td>
          <td><?php echo $violation->number;?></td>
          <td><?php echo $violation->money;?></td>
          <td><?php echo $carList[$violation->carID];?></td>
          <td><?php echo $driverList[$violation->driverID];?></td>
          <td>
            <?php commonModel::printLink('violation', 'edit', "violationID=$violation->id", $lang->edit);?>
            <?php commonModel::printLink('violation', 'delete', "violationID=$violation->id", $lang->delete, 'class="deleter"');?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
