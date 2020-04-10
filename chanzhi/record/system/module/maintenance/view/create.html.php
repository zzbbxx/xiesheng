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
          <td><?php echo html::select("carNumber", $carList, '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->type;?></th>
          <td><?php echo html::select("type", $lang->maintenance->typeList, '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->driver;?></th>
          <td><?php echo html::select("driverID", $driverList, '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->money;?></th>
          <td><input type='number' id='money' name='money' value='' class='form-control'/></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->mileage;?></th>
          <td><?php echo html::input('mileage', '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->nextMileage;?></th>
          <td><?php echo html::input('nextMileage', '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->location;?></th>
          <td><?php echo html::input('location', '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->createdDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('createdDate', '', "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->content;?></th>
          <td><?php echo html::textarea('content', '', "rows='2' class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->maintenance->remark;?></th>
          <td><?php echo html::textarea('remark', '', "rows='3' class='form-control'");?></td>
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
