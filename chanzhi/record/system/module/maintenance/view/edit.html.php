<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->maintenance->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form'>
        <tr>
          <th><?php echo $lang->maintenance->car;?></th>
          <td><?php echo html::select("carID", $carList, $maintenance->carID, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->driver;?></th>
          <td><?php echo html::select("driverID", $driverList, $maintenance->driverID, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->money;?></th>
          <td><input type='number' id='money' name='money' value="<?php echo $maintenance->money;?>" class='form-control'/></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->address;?></th>
          <td><?php echo html::input('address', $maintenance->address, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->createdDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('createdDate', $maintenance->createdDate, "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->content;?></th>
          <td><?php echo html::textarea('content', $maintenance->content, "rows='2' class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->remark;?></th>
          <td><?php echo html::textarea('remark', $maintenance->remark, "rows='3' class='form-control'");?></td>
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
