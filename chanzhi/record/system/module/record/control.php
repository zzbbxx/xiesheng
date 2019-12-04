<?php
class record extends control
{
    public function admin()
    {
        if($this->app->user->account == 'guest') $this->locate(helper::createLink('user', 'login', "referer=" . helper::safe64Encode($this->createLink('record', 'admin'))));
        if(RUN_MODE == 'front' && $this->app->user->admin == 'no' && $this->app->user->driverID == 0) $this->locate(helper::createLink('errors')); 

        $this->view->title        = $this->lang->record->browse;
        $this->view->mobileTitle  = $this->lang->record->browse;

        $this->view->driverID      = $this->app->user->driverID;
        $this->view->admin        = $this->app->user->admin;
        $this->view->carList      = array('0' => $this->lang->record->all) + $this->loadModel('car')->getCarsByType('plate');
        $this->view->driverList   = array('0' => $this->lang->record->all) + $this->loadModel('driver')->getDriversByType('name');
        $this->view->customerList = array('0' => $this->lang->record->all) + $this->loadModel('customer')->getCustomersByType('name');
        $this->display();
    }
    
    public function view($recordID = '')
    {
        $this->view->title        = $this->lang->record->view;
        $this->view->mobileTitle  = $this->lang->record->view;

        $this->view->record       = $this->record->getRecordByID($recordID);
        $this->view->carList      = $this->loadModel('car')->getCarsByType('plate');
        $this->view->driverList   = $this->loadModel('driver')->getDriversByType('name');
        $this->view->customerList = $this->loadModel('customer')->getCustomersByType('name');
        $this->display();
    }

    /* Record browse in mobile page and admin page.
     *
     * @param   string $status all|finish|device|wait
     * @param   int $customerID
     * @param   int $carID
     * @param   int $driverID
     * @param   date $beginDate
     * @param   string $orderBy
     * @param   string $recTotal
     * @param   string $recPerPage
     * @param   int $pageID
     *
     * @access public
     * @return void
     * */
    public function browse($status = 'all', $customerID = '0', $carID = '0', $driverID = '0', $beginDate = '', $orderBy = 'beginDate_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        if(RUN_MODE == 'front' && $this->app->user->admin == 'no' && $this->app->user->driverID == 0) $this->locate(helper::createLink('errors')); 

        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->title       = $this->lang->record->browse;
        $this->view->mobileTitle = $this->lang->record->browse;
        $this->view->pager       = $pager;
        $this->view->orderBy     = $orderBy;

        $this->view->status     = $status;
        $this->view->carID      = $carID;
        $this->view->driverID   = $driverID;
        $this->view->customerID = $customerID;
        $this->view->beginDate  = str_replace('-', '.', $beginDate);

        $this->view->records      = $this->record->getRecords($status, $customerID, $carID, $driverID, $beginDate, $orderBy, $pageID);
        $this->view->carList      = $this->loadModel('car')->getCarsByType('plate');
        $this->view->driverList   = $this->loadModel('driver')->getDriversByType('name');
        $this->view->customerList = $this->loadModel('customer')->getCustomersByType('abbreviation');

        $this->display();
    }

    public function create()
    {
        if(RUN_MODE == 'front' && $this->app->user->admin == 'no' && $this->app->user->driverID == 0) $this->locate(helper::createLink('errors')); 
        if($_POST)
        {
            $result    = $this->record->create();
            $beginDate = str_replace('-', '.', date('Y-m-d', strtotime($result->beginDate)));

            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse', "status=&customerID=0&carID=0&driverID=0&beginDate={$beginDate}")));
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
        }

        $this->view->title        = $this->lang->record->create;
        $this->view->mobileTitle  = $this->lang->record->create;
        $this->view->carList      = $this->loadModel('car')->getCarsByType('plate');
        $this->view->driverList   = $this->loadModel('driver')->getDriversByType('name');
        $this->view->customerList = $this->loadModel('customer')->getCustomersByType('name');
        $this->display();
    }

    public function delete($recordID)
    {
        if($this->record->delete($recordID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    public function edit($recordID)
    {
        if($_POST)
        {
            $result = $this->record->update($recordID); 
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            if(is_array($result)) $this->send($result);
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title        = $this->lang->record->edit;
        $this->view->record       = $this->record->getRecordByID($recordID);
        $this->view->carList      = $this->loadModel('car')->getCarsByType('plate');
        $this->view->driverList   = $this->loadModel('driver')->getDriversByType('name');
        $this->view->customerList = $this->loadModel('customer')->getCustomersByType('name');
        $this->display();
    }

    public function confirm($recordID)
    {
        if($this->record->confirm($recordID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    public function finish($recordID)
    {
        if($_POST)
        {
            $result = $this->record->finish($recordID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title       = $this->lang->record->finish;
        $this->view->mobileTitle = $this->lang->record->finish;

        $this->view->record       = $this->record->getRecordByID($recordID);
        $this->view->carList      = $this->loadModel('car')->getCarsByType('plate');
        $this->view->driverList   = $this->loadModel('driver')->getDriversByType('name');
        $this->view->customerList = $this->loadModel('customer')->getCustomersByType('name');
        $this->display();
    }

    public function assignTo($recordID)
    {
        if($_POST)
        {
            $result = $this->record->assignTo($recordID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess,'locate' => inlink('browse')));
        }

        $this->view->title       = $this->lang->record->assignTo;
        $this->view->mobileTitle = $this->lang->record->assignTo;

        $this->view->record     = $this->record->getRecordByID($recordID);
        $this->view->driverList = $this->loadModel('driver')->getDriversByType('name');
        $this->display();
    }
}
