{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class='panel panel-section'> 
  <div class='panel-heading page-header'>
    <div class='title'>{$carList[$maintenance->carID]}</div>
  </div>
  <div class='panel-body'>
    <table class="table table-layout">
      <tbody> 
        <tr><th>{$lang->maintenance->driver}</th><td>{$driverList[$maintenance->driverID]}</td></tr>
        <tr><th>{$lang->maintenance->money}</th><td>{$maintenance->money}</td></tr>
        <tr><th>{$lang->maintenance->createdDate}</th><td>{$maintenance->createdDate}</td></tr>
        <tr><th>{$lang->maintenance->content}</th><td>{$maintenance->content}</td></tr>
        <tr><th>{$lang->maintenance->address}</th><td>{$maintenance->address}</td></tr>
      </tbody>
    </table>
    <hr>
    <table class="table table-layout">
      <tbody> 
        {if(!empty($maintenance->remark))}
        <tr><th>{$lang->maintenance->remark}</th><td>{$maintenance->remark}</td></tr>
        {/if}
      </tbody>
    </table>
  </div>
</div>
