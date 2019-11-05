{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$date = date('Y-m-d')}
<div class='panel'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class="w-p50">
      <table class='table table-form table-layout'>
        <tr>
          <th>{$lang->outlay->type}</th>
          <td>
            {!html::select("type", $lang->outlay->typeList, '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->outlay->money}</th>
          <td>
            {!html::input("money", '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->outlay->driver}</th>
          <td>
            {!html::select("driverID", $driverList, '', "class='form-control w-200px'")}
          </td>
        </tr>
        <tr>
          <th>{$lang->outlay->remark}</th>
          <td>
            <div class="input-append">
              {!html::textarea('remark', '', "class='form-control' rows=6")}
            </div>
          </td>
        </tr>
        <tr>
          <th>{$lang->outlay->createDate}</th>
          <td>
            <input type="date" class='form-control' value="{$date}" name='createDate'>
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
    $(function(){
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
    })
});
</script>
