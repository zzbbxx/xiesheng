<?php
class maintenance extends control
{
    public function browse($orderBy = 'id_asc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->title   = $this->lang->maintenance->browse;
        $this->view->pager   = $pager;
        $this->view->orderBy = $orderBy;

        $this->view->admin        = $this->app->user->admin;
        $this->view->carList      = $this->loadModel('car')->getCarNumbers();
        $this->view->drivers      = $this->loadModel('driver')->getDriversByType('name');
        $this->view->maintenances = $this->maintenance->getViolations($orderBy, $pageID);
        $this->display();
    }

    public function create()
    {
        if($_POST)
        {
            $result = $this->maintenance->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title = $this->lang->maintenance->create;

        $this->view->carList      = $this->loadModel('car')->getCarNumbers();
        $this->view->driverList = $this->loadModel('driver')->getDriversByType('name');
        $this->display();
    }

    public function delete($maintenanceID)
    {
        if($this->maintenance->delete($maintenanceID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    public function edit($maintenanceID)
    {
        if($_POST)
        {
            $result = $this->maintenance->update($maintenanceID); 
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title = $this->lang->maintenance->edit;

        $this->view->maintenance  = $this->maintenance->getViolationByID($maintenanceID);
        $this->view->carList      = $this->loadModel('car')->getCarNumbers();
        $this->view->driverList = $this->loadModel('driver')->getDriversByType('name');
        $this->display();
    }

    public function view($maintenanceID)
    {
        $this->view->title = $this->lang->maintenance->edit;

        $this->view->maintenance  = $this->maintenance->getViolationByID($maintenanceID);
        $this->view->carList    = $this->loadModel('car')->getCarsByType('plate');;
        $this->view->driverList = $this->loadModel('driver')->getDriversByType('name');
        $this->display();
    }
}
