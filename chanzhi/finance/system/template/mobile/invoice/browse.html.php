{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$createDate = '';}
{if($admin != 'no')}
<div class='panel header-action'>
  {!html::a(inlink('create'), $lang->invoice->create, "class='btn'")}
</div>
{/if}
<div class="main">
  {foreach($invoices as $invoice)}
  {if($createDate != date('Y-m', strtotime($invoice->createDate)))}
  {$createDate = date('Y-m', strtotime($invoice->createDate));}
  <div class='dateTitle'>{$createDate}</div>
  {/if}
  <div class='panel panel-section'> 
    <div class='panel-heading page-header'>
      <div class='title'>
        {!html::a(inlink('view', "invoiceID=$invoice->id"), $customerList[$invoice->customerID], "class='btn-link'")}
      </div>
    </div>
    <div class='panel-body'>
      <table class="table table-layout">
        <tbody> 
          <tr><th>{$lang->company}</th><td>{$lang->childrenCompany[$invoice->companyID]}</td></tr>
          <tr><th>{$lang->invoice->type}</th><td>{$lang->invoice->typeList[$invoice->type]}</td></tr>
          <tr><th>{$lang->invoice->number}</th><td>{$invoice->number}</td></tr>
          <tr><th>{$lang->invoice->money}</th><td>{$invoice->money}</td></tr>
          <tr><th>{$lang->invoice->createDate}</th><td>{$invoice->createDate}</td></tr>
          {if(!empty($invoice->remark))}
          <tr><th>{$lang->invoice->remark}</th><td>{$invoice->remark}</td></tr>
          {/if}
        </tbody>
      </table>
      <hr>
      <div class='actions'>
        <ul class='clearfix'>
          <li>{!html::a(inlink('edit', "invoiceID=$invoice->id"), $lang->invoice->edit, "class='btn default'")}</li>
        </ul>
      </div>
    </div>
  </div>
  {/foreach}
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
