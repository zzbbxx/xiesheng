<?php
class income extends control
{
    public function browse($orderBy = 'createDate_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->title   = $this->lang->income->browse;
        $this->view->pager   = $pager;
        $this->view->orderBy = $orderBy;

        $this->view->admin        = $this->app->user->admin;
        $this->view->incomes      = $this->income->getIncomes($orderBy, $pageID);
        $this->view->invoiceList  = $this->loadModel('invoice')->getInvoicesByType('number');
        $this->view->customerList = $this->loadModel('customer')->getCustomersByType('name');
        $this->display();
    }

    public function create()
    {
        if($_POST)
        {
            $result = $this->income->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title        = $this->lang->income->create;
        $this->view->customerList = $this->loadModel('customer')->getCustomersByType('name');
        $this->view->invoiceList  = $this->loadModel('invoice')->getInvoicesByType('number');
        $this->display();
    }

    public function delete($incomeID)
    {
        if($this->income->delete($incomeID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    public function edit($incomeID)
    {
        if($_POST)
        {
            $result = $this->income->update($incomeID); 
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title        = $this->lang->income->edit;
        $this->view->income       = $this->income->getIncomeByID($incomeID);
        $this->view->customerList = $this->loadModel('customer')->getCustomersByType('name');
        $this->view->invoiceList  = $this->loadModel('invoice')->getInvoicesByType('number');
        $this->display();
    }
}
