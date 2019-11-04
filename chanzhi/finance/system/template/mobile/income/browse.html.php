{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class='container'>
  <ul>
    <li>{!html::a(helper::createLink('income', 'browse'), $lang->income->browse)}</li>
    <li><a>test2</a></li>
  </ul>
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
