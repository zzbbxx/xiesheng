<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->outlay->edit;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->outlay->type;?></th>
          <td class=''><?php echo html::select("type", $lang->outlay->typeList, $outlay->type, "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->outlay->money;?></th>
          <td><?php echo html::input('money', $outlay->money, "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->outlay->driver;?></th>
          <td><?php echo html::select('driverID', $driverList, $outlay->driverID, "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->outlay->remark;?></th>
          <td><?php echo html::textarea('remark', $outlay->remark, "rows='6' class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->outlay->createDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('createDate', $outlay->createDate, "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
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
