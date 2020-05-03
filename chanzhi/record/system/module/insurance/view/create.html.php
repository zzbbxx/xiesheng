<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->insurance->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form'>
        <tr>
          <th><?php echo $lang->insurance->carNumber;?></th>
          <td><?php echo html::select("carNumber", $carList, '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->type;?></th>
          <td><?php echo html::select("type", $lang->insurance->typeList, '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->company;?></th>
          <td><?php echo html::select("company", $lang->insurance->companyList, '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->total;?></th>
          <td><input type='number' id='total' name='total' value='' class='form-control'/></td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->startDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('startDate', date('Y-m-d'), "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->endDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('endDate', date('Y-m-d', strtotime('+1 year')), "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->content;?></th>
          <td><?php echo html::textarea('content', '', "rows='2' class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->remark;?></th>
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
