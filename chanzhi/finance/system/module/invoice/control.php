<?php
class invoice extends control
{
    public function browse($orderBy = 'createDate_asc', $customerID = 0, $beginDate = '', $finishDate = '', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        if($this->app->user->account == 'guest') $this->locate(helper::createLink('user', 'login', "referer=" . helper::safe64Encode($this->createLink('invoice', 'browse'))));

        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->pager       = $pager;
        $this->view->orderBy     = $orderBy;
        $this->view->title       = $this->lang->invoice->browse;
        $this->view->mobileTitle = $this->lang->invoice->browse;

        $this->view->admin        = $this->app->user->admin;
        $this->view->invoices     = $this->invoice->getInvoices($orderBy, $customerID, $beginDate, $finishDate, $pageID);
        $this->view->customerList = $this->loadModel('customer')->getCustomersByType('name');
        $this->display();
    }

    public function create()
    {
        if($_POST)
        {
            $result = $this->invoice->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title        = $this->lang->invoice->create;
        $this->view->customerList = $this->loadModel('customer')->getCustomersByType('name');
        $this->display();
    }

    public function delete($invoiceID)
    {
        if($this->invoice->delete($invoiceID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    public function edit($invoiceID)
    {
        if($_POST)
        {
            $result = $this->invoice->update($invoiceID); 
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title        = $this->lang->invoice->edit;
        $this->view->invoice      = $this->invoice->getInvoiceByID($invoiceID);
        $this->view->customerList = $this->loadModel('customer')->getCustomersByType('name');
        $this->display();
    }

    public function view($id)
    {
        $invoice = $this->invoice->getInvoiceByID($id);

        $this->view->title        = $this->lang->invoice->common . '[ ' . $invoice->number . ' ]';
        $this->view->invoice      = $invoice;
        $this->view->customerList = $this->loadModel('customer')->getCustomersByType('name');
        $this->display();
    }

}
