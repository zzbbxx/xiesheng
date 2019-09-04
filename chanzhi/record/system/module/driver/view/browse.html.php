<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='col-md-12'>
  <div class='panel'>
    <div class='panel-heading clearfix'>
      <div class='panel-actions'><?php commonModel::printLink('driver', 'create', '', '<i class="icon-plus"></i> ' . $lang->driver->create, 'class="btn btn-primary"');?></div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead>
        <tr class='text-center'>
          <th class='w-60px'><?php echo $lang->driver->id;?></th>
          <th class='w-100px'><?php echo $lang->driver->name;?></th>
          <th class='w-180px'><?php echo $lang->driver->number;?></th>
          <th class='w-80px'><?php echo $lang->driver->class;?></th>
          <th class='w-180px'><?php echo $lang->driver->expiryDate;?></th>
          <th><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($drivers as $driver):?>
        <tr class='text-center text-top'>
          <td><?php echo $driver->id;?></td>
          <td><?php echo $driver->name;?></td>
          <td><?php echo $driver->number;?></td>
          <td><?php echo $lang->driver->classList[$driver->class];?></td>
          <td><?php echo $driver->expiryDate;?></td>
          <td>
            <?php commonModel::printLink('driver', 'edit', "driverID=$driver->id", $lang->edit);?>
            <?php commonModel::printLink('driver', 'delete', "driverID=$driver->id", $lang->delete, 'class="deleter"');?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
