{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$date = date('Y-m-d H:i')}
<div class='panel'>
  <div class='panel-body'>
    <div class="text-center">{$customerList[$record->customerID]}</div>
    <p class="text-center">
      <span class='label info'>{$driverList[$record->driverID]}</span>
      <span class='label info'>{$carList[$record->carID]}</span>
    </p>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form table-layout'>
        <tr>
          <th>{$lang->record->tolls}</th>
          <td class='input-group'>
            {!html::input('tolls', $record->tolls, "class='form-control'")}
            <span class='input-group-addon'>{$lang->record->yuan}</span>
          </td>
        </tr>
        <tr>
          <th>{$lang->record->parking}</th>
          <td class='input-group'>
            {!html::input('parking', $record->tolls, "class='form-control'")}
            <span class='input-group-addon'>{$lang->record->yuan}</span>
          </td>
        </tr>
        <tr>
          <th>{$lang->record->meal}</th>
          <td class='input-group'>
            {!html::input('meal', $record->tolls, "class='form-control'")}
            <span class='input-group-addon'>{$lang->record->yuan}</span>
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
              {!html::textarea('remark', $record->remark, "class='form-control' rows=3")}
            </div>
          </td>
        </tr>
        <tr>
          <th></th>
          <td colspan='2'>{!html::submitButton($lang->record->finish)}</td>
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
