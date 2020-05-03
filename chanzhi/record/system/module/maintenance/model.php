<?php
class maintenanceModel extends model
{
    public function getViolationByID($maintenanceID)
    {
        return $this->dao->select('*')->from(TABLE_XS_MAINTENANCE)->where('id')->eq($maintenanceID)->fetch();
    }

    public function getViolations($orderBy = 'id_desc', $pageID = '')
    {
        return $this->dao->select('*')->from(TABLE_XS_MAINTENANCE)->orderBy($orderBy)->page($pageID)->fetchAll();
    }
    
    public function getGroupByDriverID($driverID = 0, $type = 'type', $orderBy = 'id_desc', $pageID = '')
    {
        return $this->dao->select('*')->from(TABLE_XS_MAINTENANCE)
            ->beginIF($driverID != 'all')->where('driverID')->eq($driverID)->fi()
            ->orderBy($orderBy)
            ->page($pageID)
            ->fetchGroup($type);
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

        $oldMaintenanceID = '';
        // 
        if($maintenance->type == 'maintain')
        {
            $oldMaintenanceID = $this->dao->select('id')->from(TABLE_XS_MAINTENANCE)
                ->where('type')->eq('maintain')
                ->andWhere('carNumber')->eq($maintenance->carNumber)
                ->fetch('id');
        }

        if(empty($oldMaintenanceID))
        {
            $this->dao->insert(TABLE_XS_MAINTENANCE)->data($maintenance)
                ->autoCheck()
                ->batchCheck($this->config->maintenance->require->create, 'notempty')
                ->exec();
        }
        else
        {
            $this->update($oldMaintenanceID);
        }
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
