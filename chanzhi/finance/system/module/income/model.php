<?php
class incomeModel extends model
{
    public function getIncomeByID($incomeID)
    {
        return $this->dao->select('*')->from(TABLE_XS_INCOME)->where('id')->eq($incomeID)->fetch();
    }

    public function getIncomes($orderBy = 'desc', $pageID = '')
    {
        return $this->dao->select('*')->from(TABLE_XS_INCOME)->orderBy($orderBy)->page($pageID)->fetchAll();
    }

    public function getIncomesByType($type = 'plate')
    {
        return $this->dao->select('*')->from(TABLE_XS_INCOME)->fetchPairs('id', $type);
    }

    public function create($orderBy, $pagerID)
    {
        if($_POST['type'] == 'enterprise') $_POST['name'] = $_POST['enterpriseName']; 
        if($_POST['type'] == 'individual') $_POST['name'] = $_POST['individualName']; 

        $income = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->remove('enterpriseName, individualName')
            ->get();

        $this->dao->insert(TABLE_XS_INCOME)->data($income)
            ->autoCheck()
            ->batchCheck($this->config->income->require->create, 'notempty')
            ->exec();
    }

    public function delete($incomeID, $null = null)
    {
        $this->dao->delete()->from(TABLE_XS_INCOME)->where('id')->eq($incomeID)->exec();
        return true;
    }

    public function update($incomeID)
    {
        if($_POST['type'] == 'enterprise') $_POST['name'] = $_POST['enterpriseName']; 
        if($_POST['type'] == 'individual') $_POST['name'] = $_POST['individualName']; 

        $income = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->remove('enterpriseName, individualName')
            ->get();

        $this->dao->update(TABLE_XS_INCOME)
            ->data($income)
            ->where('id')->eq($incomeID)
            ->batchCheck($this->config->income->require->edit, 'notempty')
            ->exec();
    }
}
