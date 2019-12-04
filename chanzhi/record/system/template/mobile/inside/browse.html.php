{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class='panel panel-section'> 
  <div class='panel-body'>
    <div class='row'>
      <div class='cell insideIcon'>
        <a class='insideIconLink' href='{$control->createLink("record", "admin")}'>
          <img src='/theme/mobile/common/img/note.png'/>
          <div class='title'>{$lang->inside->record}</div>
        </a>
      </div>
      <div class='cell insideIcon'>
        <a class='insideIconLink' href='{$control->createLink("finance", "browse")}'>
          <img src='/theme/mobile/common/img/notice.png'/>
          <div class='title'>{$lang->inside->finance}</div>
        </a>
      </div>
    </div>
    <div class='row'>
      <div class='cell insideIcon'>
        <a class='insideIconLink' href='{$control->createLink("car", "admin")}'>
          <img src='/theme/mobile/common/img/note.png'/>
          <div class='title'>{$lang->inside->car}</div>
        </a>
      </div>
      <div class='cell insideIcon'>
        <a class='insideIconLink' href='{$control->createLink("finance", "browse")}'>
        </a>
      </div>
    </div>
  </div>
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
