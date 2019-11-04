<?php
class finance extends control
{
    public function browse()
    {
        $this->view->title       = $this->lang->finance->browse;
        $this->view->mobileTitle = $this->lang->finance->browse;
        $this->display();
    }
}
