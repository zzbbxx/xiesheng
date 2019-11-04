<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='col-md-12'>
  <div class='panel'>
    <div class='panel-heading clearfix'>
      <div class='panel-actions'><?php commonModel::printLink('finance', 'create', '', '<i class="icon-plus"></i> ' . $lang->finance->create, 'class="btn btn-primary"');?></div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead>
        <tr class='text-center'>
          <th class='w-60px'><?php echo $lang->finance->id;?></th>
          <th class='w-240px'><?php echo $lang->finance->name;?></th>
          <th class='w-60px'><?php echo $lang->finance->type;?></th>
          <th class='w-100px'><?php echo $lang->finance->money;?></th>
          <th class='w-180px'><?php echo $lang->finance->createDate;?></th>
          <th class='w-180px'><?php echo $lang->finance->invoice;?></th>
          <th><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($finances as $finance):?>
        <tr class='text-center text-top'>
          <td><?php echo $finance->id;?></td>
          <td><?php echo $finance->type == 'individual' ? $finance->name : $customerList[$finance->name];?></td>
          <td><?php echo $lang->finance->typeList[$finance->type];?></td>
          <td><?php echo $finance->money;?></td>
          <td><?php echo $finance->createDate;?></td>
          <td><?php echo html::a(helper::createLink('invoice', 'view', "id=$finance->invoiceID"), $invoiceList[$finance->invoiceID], "data-toggle='modal'");?></td>
          <td>
            <?php commonModel::printLink('finance', 'edit', "financeID=$finance->id", $lang->edit);?>
            <?php commonModel::printLink('finance', 'delete', "financeID=$finance->id", $lang->delete, 'class="deleter"');?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
