{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$date = date('Y-m-d')}
<div class='panel'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form table-layout'>
        <tr>
          <th>{$lang->maintenance->car}</th>
          <td>
            {!html::select("carID", $carList, '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->maintenance->driver}</th>
          <td>
            {!html::select("driverID", $driverList, '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->maintenance->money}</th>
          <td>
            <input type='number' id='money' name='money' value='' class='form-control' />
          </td>
        </tr>
        <tr>
          <th>{$lang->maintenance->address}</th>
          <td>
            {!html::input("address", '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->maintenance->createdDate}</th>
          <td>
            <input type="date" class='form-control' value="{$date}" name='createdDate'>
          </td>
        </tr>
        <tr>
          <th>{$lang->maintenance->content}</th>
          <td>
            <div class="input-append">
              {!html::textarea('content', '', "class='form-control' rows=6")}
            </div>
          </td>
        </tr>
        <tr>
          <th>{$lang->maintenance->remark}</th>
          <td>
            <div class="input-append">
              {!html::textarea('remark', '', "class='form-control' rows=6")}
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
