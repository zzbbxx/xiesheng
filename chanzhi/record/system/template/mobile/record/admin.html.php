{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{!js::set('driverID', $driverID)}
{!js::set('date', date('Y-m-d'))}
{if($admin != 'no')}
<div class='panel header-action'>{!html::a(inlink('create'), $lang->record->create, "class='btn'")}</div>
{/if}
<div class="main">
  <div class='panel panel-section'> 
    <div class='panel-heading page-header'>
    </div>
    <div class='panel-body'>
      <form class="form-horizontal form-condensed">
        <table class="table table-layout">
          <tbody> 
            {if($admin != 'no')}
            <tr>
              <th>{$lang->record->driver}</th>
              <td>{!html::select('driverID', $driverList, '', "class='form-control'")}</td>
            </tr>
            {else}
            <tr>
              <th>{$lang->record->driver}</th>
              <td>{!html::input('driverID', $driverList[$driverID], "class='form-control' readonly")}</td>
            </tr>
            {/if}
            <tr>
              <th>{$lang->record->customer}</th>
              <td>{!html::select('customerID', $customerList, '', "class='form-control'")}</td>
            </tr>
            <tr>
              <th>{$lang->record->car}</th>
              <td>{!html::select('carID', $carList, '', "class='form-control'")}</td>
            </tr>
          </tbody>
        </table>
        <button class="btn btn-block btn-sm btn-primary" id='search' type="button">{$lang->record->search}</button>
      </form>
    </div>
  </div>
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
