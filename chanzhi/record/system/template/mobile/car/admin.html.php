{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class='container'>
  <div>
    {!html::a(helper::createLink('car', 'browse'), $lang->car->browse)}
  </div>
  <div>
    {!html::a(helper::createLink('violation', 'browse'), $lang->car->violation)}
  </div>
  <div>
    {!html::a(helper::createLink('maintenance', 'browse'), $lang->car->maintenance)}
  </div>
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
