{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class='panel panel-section'> 
  <div class='panel-heading page-header'>
    <div class='title'>{$customerList[$record->customerID]}</div>
    <div>{$record->status ? $lang->record->statusLabelList[$record->status] : ''}</div>
  </div>
  <div class='panel-body'>
    <div><span class='text-info'>{$lang->record->route}</span> : {$record->route}</div>
    <hr>
    <table class="table table-layout">
      <tbody> 
        <tr><th>{$lang->record->driver}</th><td>{$driverList[$record->driverID]}</td></tr> 
        <tr><th>{$lang->record->car}</th><td>{$carList[$record->carID]}</td></tr>
        <tr><th>{$lang->record->beginDate}</th><td>{$record->beginDate}</td></tr>
        <tr><th>{$lang->record->finishDate}</th><td>{$record->finishDate}</td></tr>
      </tbody>
    </table>
    <hr>
    <table class="table table-layout">
      <tbody> 
        <tr><th>{$lang->record->meal}</th><td>{$record->meal}</td></tr>
        <tr><th>{$lang->record->tolls}</th><td>{$record->tolls}</td></tr>
        <tr><th>{$lang->record->hotel}</th><td>{$record->hotel}</td></tr>
        <tr><th>{$lang->record->parking}</th><td>{$record->parking}</td></tr>
        {if(!empty($record->remark))}
        <tr><th>{$lang->record->remark}</th><td>{$record->remark}</td></tr>
        {/if}
      </tbody>
    </table>
    <hr>
    <table class="table table-layout">
      <tbody> 
        {if(!empty($record->remark))}
        <tr><th>{$lang->record->remark}</th><td>{$record->remark}</td></tr>
        {/if}
      </tbody>
    </table>
  </div>
</div>
