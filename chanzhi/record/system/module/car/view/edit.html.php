<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->car->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form'>
        <tr>
          <th><?php echo $lang->car->plate;?></th>
          <td><?php echo html::input('plate', $car->plate, "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th class=''><?php echo $lang->car->type;?></th>
          <td class=''><?php echo html::select("type", $lang->car->typeList, $car->type, "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->car->limit;?></th>
          <td><?php echo html::input('limit', $car->limit, "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th class=''><?php echo $lang->car->character;?></th>
          <td class=''><?php echo html::select("character", $lang->car->useCharacterList, $car->character, "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->car->owner;?></th>
          <td><?php echo html::input('owner', $car->owner, "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->car->VIN;?></th>
          <td><?php echo html::input('VIN', $car->VIN, "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->car->engine;?></th>
          <td><?php echo html::input('engine', $car->engine, "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->car->luCard;?></th>
          <td><?php echo html::input('luCard', $car->luCard, "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->car->qinCard;?></th>
          <td><?php echo html::input('qinCard', $car->qinCard, "class='form-control w-200px'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->car->registerDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('registerDate', $car->registerDate, "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
        </tr>        
        <tr>
          <th><?php echo $lang->car->issueDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('issueDate', $car->issueDate, "class='form-control form-date'");?>
              <span class='add-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span>
            </div>
          </td>
        </tr>        
        <tr>
          <th><?php echo $lang->car->expiryDate;?></th>
          <td>
            <div class="input-append date">
              <?php echo html::input('expiryDate', $car->expiryDate, "class='form-control form-date'");?>
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
