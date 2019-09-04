<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->driver->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form'>
        <tr>
          <th><?php echo $lang->driver->name;?></th>
          <td><?php echo html::input('name', '', "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th class=''><?php echo $lang->driver->sex;?></th>
          <td class=''><?php echo html::select("sex", $lang->driver->sexList, '', "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th class=''><?php echo $lang->driver->class;?></th>
          <td class=''><?php echo html::select("class", $lang->driver->classList, '', "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->driver->number;?></th>
          <td><?php echo html::input('number', '', "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->driver->archives;?></th>
          <td><?php echo html::input('archives', '', "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->driver->address;?></th>
          <td><?php echo html::input('address', '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->driver->birthDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('birthDate', date('Y-m-d'), "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
        </tr>        
        <tr>
          <th><?php echo $lang->driver->firstDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('firstDate', date('Y-m-d'), "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
        </tr>        
        <tr>
          <th><?php echo $lang->driver->expiryDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('expiryDate', date('Y-m-d'), "class='form-control form-date'");?>
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
