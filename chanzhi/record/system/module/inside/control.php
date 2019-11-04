<?php
class inside extends control
{
    public function browse()
    {
        if($this->app->user->account == 'guest') $this->locate(helper::createLink('user', 'login', "referer=" . helper::safe64Encode($this->createLink('inside', 'browse'))));
        if(RUN_MODE == 'front' && $this->app->user->admin == 'no' && $this->app->user->driverID == 0) $this->locate(helper::createLink('errors'));
        $this->view->title   = $this->lang->inside->browse;
        $this->display();
    }
}
