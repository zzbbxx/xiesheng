<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->violation->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form'>
        <tr>
          <th><?php echo $lang->violation->number;?></th>
          <td><input type='number' id='number' name='number' value='' class='form-control'/></td>
        </tr>
        <tr>
          <th><?php echo $lang->violation->money;?></th>
          <td><input type='number' id='money' name='money' value='' class='form-control'/></td>
        </tr>
        <tr>
          <th><?php echo $lang->violation->car;?></th>
          <td><?php echo html::select("carID", $carList, '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->violation->driver;?></th>
          <td><?php echo html::select("driverID", $driverList, '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->violation->status;?></th>
          <td><?php echo html::radio("status", $lang->violation->statusList, 'unprocessed');?></td>
        </tr>
        <tr>
          <th><?php echo $lang->violation->remark;?></th>
          <td><?php echo html::textarea('remark', '', "rows='6' class='form-control'");?></td>
        </tr>
        <tr>
          <th></th>
          <td colspan='2'><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
