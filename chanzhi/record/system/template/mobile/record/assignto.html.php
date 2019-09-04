{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$date = date('Y-m-d H:i')}
<div class='panel'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form table-layout'>
        <tr>
          <th>{$lang->record->driver}</th>
          <td class='input-group'>
            {!html::select('driverID', $driverList, $record->driverID, "class='form-control'")}
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
