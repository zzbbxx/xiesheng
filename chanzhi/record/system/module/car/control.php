<?php
class car extends control
{
    public function admin()
    {
        if($this->app->user->account == 'guest') $this->locate(helper::createLink('user', 'login', "referer=" . helper::safe64Encode($this->createLink('car', 'admin'))));
        if(RUN_MODE == 'front' && $this->app->user->admin == 'no' && $this->app->user->driverID == 0) $this->locate(helper::createLink('errors')); 

        $this->view->title        = $this->lang->car->browse;
        $this->view->mobileTitle  = $this->lang->car->browse;

        $this->view->driverID     = $this->app->user->driverID;
        $this->view->admin        = $this->app->user->admin;
        $this->display();
    }

    public function browse($orderBy = 'id_asc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->title   = $this->lang->car->browse;
        $this->view->pager   = $pager;
        $this->view->orderBy = $orderBy;
        $this->view->cars    = $this->car->getCars($orderBy, $pageID);
        $this->view->admin   = $this->app->user->admin;
        $this->display();
    }

    public function create()
    {
        if($_POST)
        {
            $result = $this->car->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title = $this->lang->car->create;
        $this->display();
    }

    public function delete($carID)
    {
        if($this->car->delete($carID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    public function edit($carID)
    {
        if($_POST)
        {
            $result = $this->car->update($carID); 
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title = $this->lang->car->edit;
        $this->view->car   = $this->car->getCarByID($carID);
        $this->display();
    }

    public function review()
    {
        $this->view->title   = $this->lang->car->review;
        $this->view->cars    = $this->car->getCars();
        $this->view->admin   = $this->app->user->admin;

        $this->display();
    }
}
