{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$date = date('Y-m-d')}
<div class='panel'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form table-layout'>
        <tr>
          <th>{$lang->invoice->customer}</th>
          <td>
            {!html::select("customerID", $customerList, '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->invoice->type}</th>
          <td>
            {!html::select("type", $lang->invoice->typeList, '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->invoice->money}</th>
          <td>
            {!html::input("money", '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->invoice->number}</th>
          <td>
            {!html::input("number", '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->invoice->createDate}</th>
          <td>
            <input type="date" class='form-control' value="{$date}" name='createDate'>
          </td>
        </tr>
        <tr>
          <th>{$lang->invoice->remark}</th>
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
