{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$date = date('Y-m-d H:i')}
<div class='panel'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form table-layout'>
        <tr>
          <th>{$lang->record->customer}</th>
          <td>
            {!html::select("customerID", $customerList, $record->customerID, "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->record->driver}</th>
          <td>
            {!html::select("driverID", $driverList, $record->driverID, "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->record->car}</th>
          <td>
            {!html::select("carID", $carList, $record->carID, "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->record->beginDate}</th>
          <td>
            <input type="datetime-local" class='form-control' value="{$record->beginDate}" name='beginDate'>
          </td>
        </tr>
        <tr>
          <th>{$lang->record->route}</th>
          <td>
            <div class="input-append date">
              {!html::textarea('route', $record->route, "class='form-control' rows=3")}
            </div>
          </td>
        </tr>
        <tr>
          <th>{$lang->record->remark}</th>
          <td>
            <div class="input-append date">
              {!html::textarea('remark', $record->remark, "class='form-control' rows=2")}
            </div>
          </td>
        </tr>
        <tr>
          <th></th>
          <td colspan='2'>{!html::submitButton()}</td>
        </tr>
      </table>
    </form>
  </div>
</div>
<script>
$(function (){ 
    $('#ajaxForm').ajaxform(); 
});
</script>
