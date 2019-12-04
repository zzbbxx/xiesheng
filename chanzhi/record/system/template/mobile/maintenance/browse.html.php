{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$createdDate = '';}
{if($admin != 'no')}
<div class='panel header-action'>
  {!html::a(inlink('create'), $lang->maintenance->create, "class='btn'")}
</div>
{/if}
<div class="main">
  {foreach($maintenances as $maintenance)}
  {if($createdDate != date('Y-m', strtotime($maintenance->createdDate)))}
  {$createdDate = date('Y-m', strtotime($maintenance->createdDate));}
  <div class='dateTitle'>{$createdDate}</div>
  {/if}
  <div class='panel panel-section'> 
    <div class='panel-heading page-header'>
      <div class='title'>
        {!html::a(inlink('view', "maintenanceID=$maintenance->id"), $carList[$maintenance->carID], "class='btn-link'")}
      </div>
    </div>
    <div class='panel-body'>
      <table class="table table-layout">
        <tbody> 
          <tr><th>{$lang->maintenance->driver}</th><td>{$driverList[$maintenance->driverID]}</td></tr>
          <tr><th>{$lang->maintenance->money}</th><td>{$maintenance->money}</td></tr>
          <tr><th>{$lang->maintenance->createdDate}</th><td>{$maintenance->createdDate}</td></tr>
          <tr><th>{$lang->maintenance->content}</th><td>{$maintenance->content}</td></tr>
          <tr><th>{$lang->maintenance->address}</th><td>{$maintenance->address}</td></tr>
          {if(!empty($maintenance->remark))}
          <tr><th>{$lang->maintenance->remark}</th><td>{$maintenance->remark}</td></tr>
          {/if}
        </tbody>
      </table>
      <hr>
      <div class='actions'>
        <ul class='clearfix'>
          <li>{!html::a(inlink('edit', "maintenanceID=$maintenance->id"), $lang->maintenance->edit, "class='btn default'")}</li>
        </ul>
      </div>
    </div>
  </div>
  {/foreach}
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
