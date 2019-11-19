{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$createDate = '';}
{if($admin != 'no')}
<div class='panel header-action'>
  {!html::a(inlink('create'), $lang->income->create, "class='btn'")}
</div>
{/if}
<div class="main">
  {foreach($incomes as $income)}
  {if($createDate != date('Y-m', strtotime($income->createDate)))}
  {$createDate = date('Y-m', strtotime($income->createDate));}
  {$incomeName = $income->type == 'individual' ? $income->name : $customerList[$income->name]}
  <div class='dateTitle'>{$createDate}</div>
  {/if}
  <div class='panel panel-section'> 
    <div class='panel-heading page-header'>
      <div class='title'>
        {$incomeName}
      </div>
    </div>
    <div class='panel-body'>
      <table class="table table-layout">
        <tbody> 
          <tr><th>{$lang->company}</th><td>{$lang->childrenCompany[$income->companyID]}</td></tr>
          <tr><th>{$lang->income->type}</th><td>{$lang->income->typeList[$income->type]}</td></tr>
          <tr><th>{$lang->income->money}</th><td>{$income->money}</td></tr>
          <tr><th>{$lang->income->createDate}</th><td>{$income->createDate}</td></tr>
          {if(!empty($income->invoiceID))}
          <tr><th>{$lang->income->invoice}</th><td>{!html::a(helper::createLink('invoice', 'view', "id=$income->invoiceID"), $invoiceList[$income->invoiceID], "data-toggle='modal'")}</td></tr>
          {/if}
          {if(!empty($income->remark))}
          <tr><th>{$lang->income->remark}</th><td>{$income->remark}</td></tr>
          {/if}
        </tbody>
      </table>
      <!--
      <hr>
      <div class='actions'>
        <ul class='clearfix'>
          <li>{!html::a(inlink('edit', "incomeID=$income->id"), $lang->income->edit, "class='btn default'")}</li>
        </ul>
      </div>
      -->
    </div>
  </div>
{/foreach}
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
