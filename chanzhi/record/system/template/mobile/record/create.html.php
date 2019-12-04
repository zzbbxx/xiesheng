{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$date = date('Y-m-d H:i')}
<div class='panel'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form table-layout'>
        <tr>
          <th>{$lang->record->customer}</th>
          <td>
            {!html::select("customerID", $customerList, '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->record->driver}</th>
          <td>
            {!html::select("driverID", $driverList, '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->record->car}</th>
          <td>
            {!html::select("carID", $carList, '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->record->beginDate}</th>
          <td>
            <input type="datetime-local" class='form-control' value='' name='beginDate'>
          </td>
        </tr>
        <tr>
          <th>{$lang->record->route}</th>
          <td>
            <div class="input-append date">
              {!html::textarea('route', '', "class='form-control' rows=4")}
            </div>
          </td>
        </tr>
        <tr>
          <th>{$lang->record->remark}</th>
          <td>
            <div class="input-append date">
              {!html::textarea('remark', '', "class='form-control' rows=2")}
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
