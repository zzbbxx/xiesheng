{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$date = date('Y-m-d')}
<div class='panel'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form table-layout'>
        <tr>
          <th>{$lang->income->type}</th>
          <td>
            {!html::select("type", $lang->income->typeList, $income->type, "class='form-control w-200px'")}
          </td>
        </tr>
        <tr class="enterpriseNameBox {$income->type == 'individual' ? 'hide' : '';}">
          <th>{$lang->income->name}</th>
          <td>
            {!html::select("enterpriseName", $customerList, '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr class="individualNameBox {$income->type == 'enterprise' ? 'hide' : '';}">
          <th>{$lang->income->name}</th>
          <td>
            {!html::input("individualName", '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->income->money}</th>
          <td>
            {!html::input("money", $income->money, "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->income->invoice}</th>
          <td>
            {!html::select("invoiceID", $invoiceList, '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->income->createDate}</th>
          <td>
            <input type="date" class='form-control' value="{$income->createDate}" name='createDate'>
          </td>
        </tr>
        <tr>
          <th>{$lang->income->remark}</th>
          <td>
            <div class="input-append">
              {!html::textarea('remark', $income->remark, "class='form-control' rows=6")}
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
    $('#type').on('change', function (){
        var value = $(this).val();
        if(value === 'individual'){
            $('.enterpriseNameBox').hide();
            $('.individualNameBox').show();
        }else{
            $('.individualNameBox').hide();
            $('.enterpriseNameBox').show();
        }
    })
});
</script>
