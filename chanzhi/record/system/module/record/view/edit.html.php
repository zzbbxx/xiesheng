<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->record->edit;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form'>
        <tr>
          <th><?php echo $lang->record->customer;?></th>
          <td>
          <?php if(empty($customerList)):?>
            <?php echo html::a($this->createLink('customer', 'create'), $lang->customer->create, "class='btn-link'");?>
          <?php else:?>
            <?php echo html::select("customerID", $customerList, $record->customerID, "class='form-control w-200px'");?>
          <?php endif;?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->record->driver;?></th>
          <td>
          <?php if(empty($driverList)):?>
            <?php echo html::a($this->createLink('driver', 'create'), $lang->driver->create, "class='btn-link'");?>
          <?php else:?>
            <?php echo html::select("driverID", $driverList, $record->driverID, "class='form-control w-200px'");?>
          <?php endif;?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->record->car;?></th>
          <td>
          <?php if(empty($carList)):?>
            <?php echo html::a($this->createLink('car', 'create'), $lang->car->create, "class='btn-link'");?>
          <?php else:?>
            <?php echo html::select("carID", $carList, $record->carID, "class='form-control w-200px'");?>
          <?php endif;?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->record->beginDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('beginDate', $record->beginDate, "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
        </tr>        
        <tr>
          <th><?php echo $lang->record->finishDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('finishDate', $record->finishDate, "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->record->route;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::textarea('route', $record->route, "class='form-control' rows=6");?>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->record->remark;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::textarea('remark', $record->remark, "class='form-control' rows=6");?>
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
