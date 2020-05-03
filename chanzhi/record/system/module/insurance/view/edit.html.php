<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->insurance->edit;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form'>
        <tr>
          <th><?php echo $lang->insurance->carNumber;?></th>
          <td><?php echo html::input("carNumber", $insurance->carNumber, "class='form-control' readonly='readonly'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->type;?></th>
          <td><?php echo html::select("type", $lang->insurance->typeList, $insurance->type, "class='form-control' disabled='disabled'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->company;?></th>
          <td><?php echo html::select("company", $lang->insurance->companyList, $insurance->company, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->total;?></th>
          <td><input type='number' id='total' name='total' value="<?php echo $insurance->total;?>" class='form-control'/></td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->startDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('startDate', $insurance->startDate, "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->endDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('endDate', $insurance->endDate, "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->content;?></th>
          <td><?php echo html::textarea('content', $insurance->content, "rows='2' class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->insurance->remark;?></th>
          <td><?php echo html::textarea('remark', $insurance->remark, "rows='3' class='form-control'");?></td>
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
