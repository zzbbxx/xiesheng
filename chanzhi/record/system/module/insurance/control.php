<?php
class insurance extends control
{
    public function browse($orderBy = 'id_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        if(RUN_MODE == 'front' && $this->app->user->admin == 'no' && $this->app->user->driverID == 0) $this->locate(helper::createLink('errors')); 

        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->title       = $this->lang->insurance->browse;
        $this->view->pager       = $pager;
        $this->view->orderBy     = $orderBy;

        $this->view->insurances   = $this->insurance->getInsurances($orderBy, $pageID);
        $this->view->carList      = $this->loadModel('car')->getCarsByType('plate');

        $this->display();
    }

    public function create()
    {
        if($_POST)
        {
            $result = $this->insurance->create();

            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
        }

        $this->view->title        = $this->lang->insurance->create;
        $this->view->mobileTitle  = $this->lang->insurance->create;
        $this->view->carList      = $this->loadModel('car')->getCarNumbers();
        $this->display();
    }

    public function delete($insuranceID)
    {
        if($this->insurance->delete($insuranceID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    public function edit($insuranceID)
    {
        if($_POST)
        {
            $result = $this->insurance->update($insuranceID); 
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title        = $this->lang->insurance->edit;
        $this->view->insurance    = $this->insurance->getInsuranceByID($insuranceID);
        $this->view->carList      = $this->loadModel('car')->getCarNumbers();
        $this->display();
    }
}
