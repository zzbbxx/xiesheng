<?php
class customer extends control
{
    public function browse($orderBy = 'id_asc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->title     = $this->lang->customer->browse;
        $this->view->pager     = $pager;
        $this->view->orderBy   = $orderBy;
        $this->view->customers = $this->customer->getCustomers($orderBy, $pageID);
        $this->display();
    }

    public function create()
    {
        if($_POST)
        {
            $result = $this->customer->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title = $this->lang->customer->create;
        $this->display();
    }

    public function delete($customerID)
    {
        if($this->customer->delete($customerID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    public function edit($customerID)
    {
        if($_POST)
        {
            $result = $this->customer->update($customerID); 
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title    = $this->lang->customer->edit;
        $this->view->customer = $this->customer->getCustomerByID($customerID);
        $this->display();
    }
}
