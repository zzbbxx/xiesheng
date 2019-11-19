{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$createDate = '';}
{if($admin != 'no')}
<div class='panel header-action'>
  {!html::a(inlink('create'), $lang->outlay->create, "class='btn'")}
</div>
{/if}
<div class="main">
  {foreach($outlays as $outlay)}
  {if($createDate != date('Y-m', strtotime($outlay->createDate)))}
  {$createDate = date('Y-m', strtotime($outlay->createDate));}
  <div class='dateTitle'>{$createDate}</div>
  {/if}
  <div class='panel panel-section'> 
    <div class='panel-heading page-header'>
      <div class='title'>
          {$driverList[$outlay->driverID]}
      </div>
    </div>
    <div class='panel-body'>
      <table class="table table-layout">
        <tbody> 
          <tr><th>{$lang->outlay->type}</th><td>{$lang->outlay->typeList[$outlay->type]}</td></tr>
          <tr><th>{$lang->outlay->money}</th><td>{$outlay->money}</td></tr>
          <tr><th>{$lang->outlay->createDate}</th><td>{$outlay->createDate}</td></tr>
          {if(!empty($outlay->remark))}
          <tr><th>{$lang->outlay->remark}</th><td>{$outlay->remark}</td></tr>
          {/if}
        </tbody>
      </table>
      <!--
      <hr>
      <div class='actions'>
        <ul class='clearfix'>
          <li>{!html::a(inlink('edit', "outlayID=$outlay->id"), $lang->outlay->edit, "class='btn default'")}</li>
        </ul>
      </div>
      -->
    </div>
  </div>
  {/foreach}
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
