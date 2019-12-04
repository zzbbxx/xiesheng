{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class="main">
  {foreach($violations as $violation)}
  <div class='panel panel-section'> 
    <div class='panel-heading page-header'>
      <div class='title'>
        {$violation->number}
      </div>
    </div>
    <div class='panel-body'>
      <table class="table table-layout">
        <tbody> 
          <tr><th>{$lang->violation->car}</th><td>{$carList[$violation->carID]}</td></tr>
          <tr><th>{$lang->violation->driver}</th><td>{$driverList[$violation->driverID]}</td></tr>
          <tr><th>{$lang->violation->money}</th><td>{$violation->money}</td></tr>
        </tbody>
      </table>
    </div>
  </div>
{/foreach}
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
