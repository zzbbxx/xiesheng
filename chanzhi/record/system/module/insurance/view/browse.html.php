<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='col-md-12'>
  <div class='panel'>
    <div class='panel-heading clearfix'>
      <div class='panel-actions'><?php commonModel::printLink('insurance', 'create', '', '<i class="icon-plus"></i> ' . $lang->insurance->create, 'class="btn btn-primary"');?></div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead>
        <tr class='text-center'>
          <th class='w-60px'><?php echo $lang->insurance->id;?></th>
          <th class='w-200px'><?php echo $lang->insurance->company;?></th>
          <th class='w-100px'><?php echo $lang->insurance->type;?></th>
          <th class='w-100px'><?php echo $lang->insurance->carNumber;?></th>
          <th class='w-100px'><?php echo $lang->insurance->total;?></th>
          <th class='w-120px'><?php echo $lang->insurance->startDate;?></th>
          <th class='w-120px'><?php echo $lang->insurance->endDate;?></th>
          <th><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($insurances as $insurance):?>
        <tr class='text-center text-top'>
          <td><?php echo $insurance->id;?></td>
          <td><?php echo $lang->insurance->companyList[$insurance->company];?></td>
          <td><?php echo $lang->insurance->typeList[$insurance->type];?></td>
          <td><?php echo $insurance->carNumber;?></td>
          <td><?php echo $insurance->total;?></td>
          <td><?php echo $insurance->startDate;?></td>
          <td><?php echo $insurance->endDate;?></td>
          <td>
            <?php commonModel::printLink('insurance', 'edit', "insuranceID=$insurance->id", $lang->edit);?>
            <?php commonModel::printLink('insurance', 'delete', "insuranceID=$insurance->id", $lang->delete, 'class="deleter"');?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
