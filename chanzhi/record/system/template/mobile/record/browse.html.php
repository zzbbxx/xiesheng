{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$date = date('Y-m-d')}
{$startHtmlDate = empty($beginDate) ? $date : str_replace('.', '-', $beginDate)}
{$endHtmlDate = empty($finishDate) ? $date : str_replace('.', '-', $finishDate)}
{$dateParameter = "&beginDate=$beginDate&finishDate=$finishDate"}
{$baseParameter = "&customerID=$customerID&carID=$carID&driverID=$driverID"}
{!js::set('status', $status)}
{!js::set('startDate', $beginDate)}
{!js::set('endDate', $finishDate)}
{!js::set('baseParameter', $baseParameter)}
<div class='panel panel-action'> 
  <div class='panel-heading page-header'>
    <div class="input-group">
      <span class="input-group-addon fix-border fix-padding">{$lang->record->start}</span>
      <input type='date' value={$startHtmlDate} id='searchStartDate' class="form-control"/>
      <span class="input-group-addon fix-border fix-padding">{$lang->record->end}</span>
      <input type='date' value={$endHtmlDate} id='searchEndDate' class="form-control"/>
    </div>
    <hr>
    <div class="input-group">
      {!html::a(inlink('browse', "status=all" . $baseParameter . $dateParameter), $lang->record->all, "class='btn important'")}
      {!html::a(inlink('browse', "status=finish" . $baseParameter . $dateParameter), $lang->record->statusList['finish'], "class='btn text-success'")}
      {!html::a(inlink('browse', "status=receive" . $baseParameter . $dateParameter), $lang->record->statusList['receive'], "class='btn text-primary'")}
      {!html::a(inlink('browse', "status=wait" . $baseParameter . $dateParameter), $lang->record->statusList['wait'], "class='btn text-warning'")}
    </div>
  </div>
</div>
{foreach($records as $record)}
<div class='panel panel-section'> 
  <div class='panel-heading page-header'>
    <div class='title'>
      {!html::a(inlink('view', "recordID=$record->id"), $customerList[$record->customerID], "class='btn-link'")}
    </div>
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
        {if(!empty($record->remark))}
        <tr><th>{$lang->record->remark}</th><td>{$record->remark}</td></tr>
        {/if}
      </tbody>
    </table>
    <hr>
    <div class='actions'>
      <ul class='clearfix'>
        {if($record->status == 'wait')}
          <li>{!html::a(inlink('confirm', "recordID=$record->id"), $lang->record->confirm, "class='btn default'")}</li>
        {/if}
        {if($record->status != 'finish')}
        <li>{!html::a(inlink('finish', "recordID=$record->id"), $lang->record->finish, "class='btn default' date-toggle='model'")}</li>
        {/if}
        <li>{!html::a(inlink('assignTo', "recordID=$record->id"), $lang->record->assignTo, "class='btn default'")}</li>
        <li>{!html::a(inlink('edit', "recordID=$record->id"), $lang->record->editRecord, "class='btn default'")}</li>
      </ul>
    </div>
  </div>
</div>
{/foreach}
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
