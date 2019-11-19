{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class='panel panel-section'> 
  <div class='panel-heading page-header'>
    <div class='title'>{$customerList[$invoice->customerID]}</div>
  </div>
  <div class='panel-body'>
    <table class="table table-layout">
      <tbody> 
        <tr><th>{$lang->company}</th><td>{$lang->childrenCompany[$invoice->companyID]}</td></tr>
        <tr><th>{$lang->invoice->type}</th><td>{$lang->invoice->typeList[$invoice->type]}</td></tr>
        <tr><th>{$lang->invoice->id}</th><td>{$invoice->id}</td></tr>
        <tr><th>{$lang->invoice->number}</th><td>{$invoice->number}</td></tr>
        <tr><th>{$lang->invoice->createDate}</th><td>{$invoice->createDate}</td></tr>
        <tr><th>{$lang->invoice->money}</th><td>{$invoice->money}</td></tr>
      </tbody>
    </table>
    <hr>
    <table class="table table-layout">
      <tbody> 
        {if(!empty($invoice->remark))}
        <tr><th>{$lang->invoice->remark}</th><td>{$invoice->remark}</td></tr>
        {/if}
      </tbody>
    </table>
  </div>
</div>
