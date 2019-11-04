<?php
class outlay extends control
{
    public function browse($orderBy = 'id_asc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->title   = $this->lang->outlay->browse;
        $this->view->pager   = $pager;
        $this->view->orderBy = $orderBy;

        $this->view->outlays      = $this->outlay->getOutlays($orderBy, $pageID);
        $this->view->driverList = $this->loadModel('driver')->getDriversByType('name');
        $this->display();
    }

    public function create()
    {
        if($_POST)
        {
            $result = $this->outlay->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title      = $this->lang->outlay->create;
        $this->view->driverList = $this->loadModel('driver')->getDriversByType('name');
        $this->display();
    }

    public function delete($outlayID)
    {
        if($this->outlay->delete($outlayID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    public function edit($outlayID)
    {
        if($_POST)
        {
            $result = $this->outlay->update($outlayID); 
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title      = $this->lang->outlay->edit;
        $this->view->outlay     = $this->outlay->getOutlayByID($outlayID);
        $this->view->driverList = $this->loadModel('driver')->getDriversByType('name');
        $this->display();
    }
}
