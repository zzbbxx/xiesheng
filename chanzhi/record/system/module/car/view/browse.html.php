<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='col-md-12'>
  <div class='panel'>
    <div class='panel-heading clearfix'>
      <div class='panel-actions'><?php commonModel::printLink('car', 'create', '', '<i class="icon-plus"></i> ' . $lang->car->create, 'class="btn btn-primary"');?></div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead>
        <tr class='text-center'>
          <th class='w-60px'><?php echo $lang->car->id;?></th>
          <th class='w-100px'><?php echo $lang->car->plate;?></th>
          <th class='w-80px'><?php echo $lang->car->type;?></th>
          <th class='w-180px'><?php echo $lang->car->limit;?></th>
          <th class='w-180px'><?php echo $lang->car->expiryDate;?></th>
          <th><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($cars as $car):?>
        <tr class='text-center text-top'>
          <td><?php echo $car->id;?></td>
          <td><?php echo $car->plate;?></td>
          <td><?php echo $lang->car->typeList[$car->type];?></td>
          <td><?php echo $car->limit;?></td>
          <td><?php echo $car->expiryDate;?></td>
          <td>
            <?php commonModel::printLink('car', 'edit', "carID=$car->id", $lang->edit);?>
            <?php commonModel::printLink('car', 'delete', "carID=$car->id", $lang->delete, 'class="deleter"');?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
