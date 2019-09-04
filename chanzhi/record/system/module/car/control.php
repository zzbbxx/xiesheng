<?php
class car extends control
{
    public function browse($orderBy = 'id_asc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $this->view->title   = $this->lang->car->browse;
        $this->view->pager   = $pager;
        $this->view->orderBy = $orderBy;
        $this->view->cars    = $this->car->getCars($orderBy, $pageID);
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
}
