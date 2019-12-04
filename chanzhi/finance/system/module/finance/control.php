<?php
class finance extends control
{
    public function browse()
    {
        if($this->app->user->admin != 'super') $this->locate($this->createLink('inside', 'browse'));
        $this->view->title       = $this->lang->finance->browse;
        $this->view->mobileTitle = $this->lang->finance->browse;
        $this->display();
    }
}
