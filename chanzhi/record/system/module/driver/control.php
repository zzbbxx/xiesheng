<?php
class driver extends control
{
    public function browse($orderBy = 'id_asc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->title   = $this->lang->driver->browse;
        $this->view->pager   = $pager;
        $this->view->orderBy = $orderBy;
        $this->view->drivers    = $this->driver->getDrivers($orderBy, $pageID);
        $this->display();
    }

    public function create()
    {
        if($_POST)
        {
            $result = $this->driver->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title = $this->lang->driver->create;
        $this->display();
    }

    public function delete($driverID)
    {
        if($this->driver->delete($driverID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    public function edit($driverID)
    {
        if($_POST)
        {
            $result = $this->driver->update($driverID); 
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title = $this->lang->driver->edit;
        $this->view->driver   = $this->driver->getDriverByID($driverID);
        $this->display();
    }
}
