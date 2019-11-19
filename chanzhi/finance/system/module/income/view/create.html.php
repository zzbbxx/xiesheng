<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->income->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->company;?></th>
          <td class=''><?php echo html::select("companyID", $lang->childrenCompany, '', "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th class='w-100px'><?php echo $lang->income->type;?></th>
          <td class=''><?php echo html::select("type", $lang->income->typeList, '', "class='form-control w-300px'");?></td>
        </tr>
        <tr class='enterpriseNameBox'>
          <th><?php echo $lang->income->name;?></th>
          <td><?php echo html::select('enterpriseName', $customerList, '', "class='form-control w-300px'");?></td>
        </tr>
        <tr class='individualNameBox'>
          <th><?php echo $lang->income->name;?></th>
          <td><?php echo html::input('individualName', '', "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->income->money;?></th>
          <td><?php echo html::input('money', '', "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->income->invoice;?></th>
          <td><?php echo html::select('invoiceID', $invoiceList, '', "class='form-control chosen'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->income->createDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('createDate', date('Y-m-d h:s'), "class='form-control form-date'");?>
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
