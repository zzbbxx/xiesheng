<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->invoice->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form'>
        <tr>
          <th><?php echo $lang->company;?></th>
          <td><?php echo html::select('companyID', $lang->childrenCompany, $invoice->companyID, "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->type;?></th>
          <td><?php echo html::select('type', $lang->invoice->typeList, $invoice->type, "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->money;?></th>
          <td><?php echo html::input('money', $invoice->money, "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->number;?></th>
          <td><?php echo html::input('number', $invoice->number, "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->customer;?></th>
          <td><?php echo html::select('customerID', $customerList, $invoice->customerID, "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->remark;?></th>
          <td><?php echo html::textarea('remark', $invoice->remark, "rows='6' class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->createDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('createDate', $invoice->createDate, "class='form-control form-date'");?>
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
