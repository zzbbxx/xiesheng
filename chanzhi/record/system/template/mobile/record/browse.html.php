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
<div class='panel header-action'> 
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
<div class='main'>
{foreach($records as $record)}
{$beginTime = date('H:i', strtotime($record->beginDate))}
<div class='panel panel-section'> 
  <div class='header clearfix'>
    {!html::a(inlink('view', "id=$record->id"), $beginTime, "class='pull-left title'")}
    <div class='pull-right'>{$record->status ? $lang->record->statusLabelList[$record->status] : ''}</div>
  </div>
  <hr>
  <div class='panel-body'>
    <div class='route'>{$record->route}</div>
    <div class='clearfix info'>
      <div class='pull-left'>{$driverList[$record->driverID]}</div>
      <div class='pull-right'>{$carList[$record->carID]}</div>
    </div>
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
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
