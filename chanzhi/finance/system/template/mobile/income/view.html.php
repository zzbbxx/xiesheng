{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$incomeName = $income->type == 'individual' ? $income->name : $customerList[$income->name]}
<div class='panel panel-section'> 
  <div class='panel-heading page-header'>
    <div class='title'>{$incomeName}</div>
  </div>
  <div class='panel-body'>
    <table class="table table-layout">
      <tbody> 
        <tr><th>{$lang->income->type}</th><td>{$lang->income->typeList[$income->type]}</td></tr>
        <tr><th>{$lang->income->id}</th><td>{$income->id}</td></tr>
        <tr><th>{$lang->income->number}</th><td>{$income->number}</td></tr>
        <tr><th>{$lang->income->createDate}</th><td>{$income->createDate}</td></tr>
        <tr><th>{$lang->income->money}</th><td>{$income->money}</td></tr>
      </tbody>
    </table>
    <hr>
    <table class="table table-layout">
      <tbody> 
        {if(!empty($income->remark))}
        <tr><th>{$lang->income->remark}</th><td>{$income->remark}</td></tr>
        {/if}
      </tbody>
    </table>
  </div>
</div>
