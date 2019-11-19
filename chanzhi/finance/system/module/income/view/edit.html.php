<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->income->edit;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->company;?></th>
          <td class=''><?php echo html::select("companyID", $lang->childrenCompany, $income->companyID, "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th class='w-100px'><?php echo $lang->income->type;?></th>
          <td class=''><?php echo html::select("type", $lang->income->typeList, $income->type, "class='form-control w-300px'");?></td>
        </tr>
        <tr class="enterpriseNameBox <?php if($income->type == 'individual') echo 'hide';?>">
          <th><?php echo $lang->income->name;?></th>
          <td><?php echo html::select('enterpriseName', $customerList, $income->type == 'enterpriseName' ? $income->name : '', "class='form-control w-300px'");?></td>
        </tr>
        <tr class="individualNameBox <?php if($income->type == 'enterprise') echo 'hide';?>">
          <th><?php echo $lang->income->name;?></th>
          <td><?php echo html::input('individualName', $income->type == 'individual' ? $income->name : '', "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->income->money;?></th>
          <td><?php echo html::input('money', $income->money, "class='form-control w-300px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->income->invoice;?></th>
          <td><?php echo html::select('invoiceID', $invoiceList, $income->invoiceID, "class='form-control chosen'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->income->createDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('createDate', $income->createDate, "class='form-control form-date'");?>
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
