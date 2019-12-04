<?php
class violation extends control
{
    public function browse($orderBy = 'id_asc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->title   = $this->lang->violation->browse;
        $this->view->pager   = $pager;
        $this->view->orderBy = $orderBy;

        $this->view->carList    = $this->loadModel('car')->getCarsByType('plate');;
        $this->view->driverList = $this->loadModel('driver')->getDriversByType('name');
        $this->view->violations = $this->violation->getViolations($orderBy, $pageID);
        $this->display();
    }

    public function create()
    {
        if($_POST)
        {
            $result = $this->violation->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title = $this->lang->violation->create;

        $this->view->carList    = $this->loadModel('car')->getCarsByType('plate');;
        $this->view->driverList = $this->loadModel('driver')->getDriversByType('name');
        $this->display();
    }

    public function delete($violationID)
    {
        if($this->violation->delete($violationID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    public function edit($violationID)
    {
        if($_POST)
        {
            $result = $this->violation->update($violationID); 
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title = $this->lang->violation->edit;

        $this->view->violation  = $this->violation->getViolationByID($violationID);
        $this->view->carList    = $this->loadModel('car')->getCarsByType('plate');;
        $this->view->driverList = $this->loadModel('driver')->getDriversByType('name');
        $this->display();
    }
}
