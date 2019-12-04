<?php
class maintenanceModel extends model
{
    public function getViolationByID($maintenanceID)
    {
        return $this->dao->select('*')->from(TABLE_XS_MAINTENANCE)->where('id')->eq($maintenanceID)->fetch();
    }

    public function getViolations($orderBy = 'desc', $pageID = '')
    {
        return $this->dao->select('*')->from(TABLE_XS_MAINTENANCE)->orderBy($orderBy)->page($pageID)->fetchAll();
    }

    public function getViolationsByType($type = 'number')
    {
        return $this->dao->select('*')->from(TABLE_XS_MAINTENANCE)->fetchPairs('id', $type);
    }

    public function create($orderBy, $pagerID)
    {
        $maintenance = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->get();

        $this->dao->insert(TABLE_XS_MAINTENANCE)->data($maintenance)
            ->autoCheck()
            ->batchCheck($this->config->maintenance->require->create, 'notempty')
            ->exec();
    }

    public function delete($maintenanceID, $null = null)
    {
        $this->dao->delete()->from(TABLE_XS_MAINTENANCE)->where('id')->eq($maintenanceID)->exec();
        return true;
    }

    public function update($maintenanceID)
    {
        $maintenance = fixer::input('post')->get();

        $this->dao->update(TABLE_XS_MAINTENANCE)
            ->data($maintenance)
            ->where('id')->eq($maintenanceID)
            ->batchCheck($this->config->maintenance->require->edit, 'notempty')
            ->exec();
    }

    public function setUserID($maintenanceID = '', $userID = '')
    {
        $this->dao->update(TABLE_XS_MAINTENANCE)->set('userID')->eq($userID)->where('id')->eq($maintenanceID)->exec();
    }
}
