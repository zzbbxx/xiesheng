{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class='container'>
  <div>
    {!html::a(helper::createLink('invoice', 'browse', 'orderby=createDate_desc'), $lang->finance->invoice)}
  </div>
  <div>
    {!html::a(helper::createLink('income', 'browse'), $lang->finance->income)}
  </div>
  <div>
    {!html::a(helper::createLink('outlay', 'browse'), $lang->finance->outlay)}
  </div>
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
