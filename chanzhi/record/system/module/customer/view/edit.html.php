<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->customer->edit;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <tr>
          <th><?php echo $lang->customer->name;?></th>
          <td><?php echo html::input('name', $customer->name, "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->customer->abbreviation;?></th>
          <td><?php echo html::input('abbreviation', $customer->abbreviation, "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->customer->address;?></th>
          <td><?php echo html::input('address', $customer->address, "class='form-control'");?></td>
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
