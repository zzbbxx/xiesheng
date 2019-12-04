{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class="main">
  {foreach($cars as $car)}
  <div class='panel panel-section'> 
    <div class='panel-heading page-header'>
      <div class='title'>
        {$car->plate}
      </div>
    </div>
    <div class='panel-body'>
      <table class="table table-layout">
        <tbody> 
          <tr><th>{$lang->car->type}</th><td>{$lang->car->typeList[$car->type]}</td></tr>
          <tr><th>{$lang->car->limit}</th><td>{$car->limit}</td></tr>
        </tbody>
      </table>
    </div>
  </div>
{/foreach}
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
