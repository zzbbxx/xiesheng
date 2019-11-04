<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.modal.html.php';?>
<table class='table table-form'>
  <tr>
    <th class='w-80px'><?php echo $lang->invoice->number;?></th>
    <td><?php echo $invoice->number;?></td>
  </tr>
  <tr>
    <th class='w-80px'><?php echo $lang->invoice->customer;?></th>
    <td><?php echo $customerList[$invoice->customerID];?></td>
  </tr>
  <tr>
    <th class='w-80px'><?php echo $lang->invoice->money;?></th>
    <td><?php echo $invoice->money;?></td>
  </tr>
  <tr>
    <th class='w-80px'><?php echo $lang->invoice->createDate;?></th>
    <td><?php echo $invoice->createDate;?></td>
  </tr>
  <tr>
    <th class='w-80px'><?php echo $lang->invoice->remark;?></th>
    <td><?php echo $invoice->remark;?></td>
  </tr>
</table>
<?php include '../../common/view/footer.modal.html.php';?>
