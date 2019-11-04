<?php
class financeModel extends model
{
    public function getFinanceByID($financeID)
    {
        return $this->dao->select('*')->from(TABLE_XS_FINCOME)->where('id')->eq($financeID)->fetch();
    }

    public function getFinances($orderBy = 'desc', $pageID = '')
    {
        return $this->dao->select('*')->from(TABLE_XS_FINCOME)->orderBy($orderBy)->page($pageID)->fetchAll();
    }

    public function getFinancesByType($type = 'plate')
    {
        return $this->dao->select('*')->from(TABLE_XS_FINCOME)->fetchPairs('id', $type);
    }

    public function create($orderBy, $pagerID)
    {
        if($_POST['type'] == 'enterprise') $_POST['name'] = $_POST['enterpriseName']; 
        if($_POST['type'] == 'individual') $_POST['name'] = $_POST['individualName']; 

        $finance = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->remove('enterpriseName, individualName')
            ->get();

        $this->dao->insert(TABLE_XS_FINCOME)->data($finance)
            ->autoCheck()
            ->batchCheck($this->config->finance->require->create, 'notempty')
            ->exec();
    }

    public function delete($financeID, $null = null)
    {
        $this->dao->delete()->from(TABLE_XS_FINCOME)->where('id')->eq($financeID)->exec();
        return true;
    }

    public function update($financeID)
    {
        if($_POST['type'] == 'enterprise') $_POST['name'] = $_POST['enterpriseName']; 
        if($_POST['type'] == 'individual') $_POST['name'] = $_POST['individualName']; 

        $finance = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->remove('enterpriseName, individualName')
            ->get();

        $this->dao->update(TABLE_XS_FINCOME)
            ->data($finance)
            ->where('id')->eq($financeID)
            ->batchCheck($this->config->finance->require->edit, 'notempty')
            ->exec();
    }
}
