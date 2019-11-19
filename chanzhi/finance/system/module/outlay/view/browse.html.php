<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='col-md-12'>
  <div class='panel'>
    <div class='panel-heading clearfix'>
      <div class='panel-actions'><?php commonModel::printLink('outlay', 'create', '', '<i class="icon-plus"></i> ' . $lang->outlay->create, 'class="btn btn-primary"');?></div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead>
        <tr class='text-center'>
          <th class='w-60px'><?php echo $lang->outlay->id;?></th>
          <th class='w-240px'><?php echo $lang->company;?></th>
          <th class='w-140px'><?php echo $lang->outlay->driver;?></th>
          <th class='w-60px'><?php echo $lang->outlay->type;?></th>
          <th class='w-100px'><?php echo $lang->outlay->money;?></th>
          <th class='w-180px'><?php echo $lang->outlay->createDate;?></th>
          <th><?php echo $lang->outlay->remark;?></th>
          <th><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($outlays as $outlay):?>
        <tr class='text-center text-top'>
          <td><?php echo $outlay->id;?></td>
          <td><?php echo $lang->childrenCompany[$outlay->companyID];?></td>
          <td><?php echo $driverList[$outlay->driverID];?></td>
          <td><?php echo $lang->outlay->typeList[$outlay->type];?></td>
          <td><?php echo $outlay->money;?></td>
          <td><?php echo $outlay->createDate;?></td>
          <td><?php echo $outlay->remark;?></td>
          <td>
            <?php commonModel::printLink('outlay', 'edit', "outlayID=$outlay->id", $lang->edit);?>
            <?php commonModel::printLink('outlay', 'delete', "outlayID=$outlay->id", $lang->delete, 'class="deleter"');?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
