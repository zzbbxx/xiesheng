<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='col-md-12'>
  <div class='panel'>
    <div class='panel-heading clearfix'>
      <div class='panel-actions'><?php commonModel::printLink('income', 'create', '', '<i class="icon-plus"></i> ' . $lang->income->create, 'class="btn btn-primary"');?></div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead>
        <tr class='text-center'>
          <th class='w-60px'><?php echo $lang->income->id;?></th>
          <th class='w-240px'><?php echo $lang->income->name;?></th>
          <th class='w-60px'><?php echo $lang->income->type;?></th>
          <th class='w-100px'><?php echo $lang->income->money;?></th>
          <th class='w-180px'><?php echo $lang->income->createDate;?></th>
          <th class='w-180px'><?php echo $lang->income->invoice;?></th>
          <th><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($incomes as $income):?>
        <tr class='text-center text-top'>
          <td><?php echo $income->id;?></td>
          <td><?php echo $income->type == 'individual' ? $income->name : $customerList[$income->name];?></td>
          <td><?php echo $lang->income->typeList[$income->type];?></td>
          <td><?php echo $income->money;?></td>
          <td><?php echo $income->createDate;?></td>
          <td><?php echo html::a(helper::createLink('invoice', 'view', "id=$income->invoiceID"), $invoiceList[$income->invoiceID], "data-toggle='modal'");?></td>
          <td>
            <?php commonModel::printLink('income', 'edit', "incomeID=$income->id", $lang->edit);?>
            <?php commonModel::printLink('income', 'delete', "incomeID=$income->id", $lang->delete, 'class="deleter"');?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
