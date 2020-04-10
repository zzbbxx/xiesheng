<?php
class driverModel extends model
{
    public function getDriverByID($driverID)
    {
        return $this->dao->select('*')->from(TABLE_XS_DRIVER)->where('id')->eq($driverID)->fetch();
    }

    public function getDrivers($orderBy = 'id_desc', $pageID = '')
    {
        return $this->dao->select('*')->from(TABLE_XS_DRIVER)->orderBy($orderBy)->page($pageID)->fetchAll();
    }

    public function getDriversByType($type = 'number')
    {
        return $this->dao->select('*')->from(TABLE_XS_DRIVER)->fetchPairs('id', $type);
    }

    public function create($orderBy, $pagerID)
    {
        $driver = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->get();

        /* Check for duplicate number. */
        $drivers = $this->getDriversByType('number');
        if(in_array($driver->plate, $drivers)) return array('result' => 'fail', 'message' => $this->lang->driver->duplicatePlate);

        $this->dao->insert(TABLE_XS_DRIVER)->data($driver)
            ->autoCheck()
            ->batchCheck($this->config->driver->require->create, 'notempty')
            ->exec();
    }

    public function delete($driverID, $null = null)
    {
        $this->dao->delete()->from(TABLE_XS_DRIVER)->where('id')->eq($driverID)->exec();
        return true;
    }

    public function update($driverID)
    {
        $driver = fixer::input('post')->get();

        $this->dao->update(TABLE_XS_DRIVER)
            ->data($driver)
            ->where('id')->eq($driverID)
            ->batchCheck($this->config->driver->require->edit, 'notempty')
            ->exec();
    }

    public function setUserID($driverID = '', $userID = '')
    {
        $this->dao->update(TABLE_XS_DRIVER)->set('userID')->eq($userID)->where('id')->eq($driverID)->exec();
    }
}
