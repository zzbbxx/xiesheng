<?php
class carModel extends model
{
    public function getCarByID($carID)
    {
        return $this->dao->select('*')->from(TABLE_XS_CAR)->where('id')->eq($carID)->fetch();
    }
    
    public function getCarByPlate($plate)
    {
        return $this->dao->select('*')->from(TABLE_XS_CAR)->where('plate')->eq($plate)->fetch();
    }

    public function getCars($orderBy = 'id_desc', $pageID = '0')
    {
        return $this->dao->select('*')->from(TABLE_XS_CAR)->orderBy($orderBy)->page($pageID)->fetchAll();
    }

    public function getCarsByType($type = 'plate')
    {
        return $this->dao->select('*')->from(TABLE_XS_CAR)->fetchPairs('id', $type);
    }

    public function getCarNumbers()
    {
        return $this->dao->select('id, plate')->from(TABLE_XS_CAR)->fetchPairs('plate', 'plate');
    }  

    public function create($orderBy, $pagerID)
    {
        $car = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->get();

        /* Check for duplicate plate number. */
        $cars = $this->getCarsByType('plate');
        if(in_array($car->plate, $cars)) return array('result' => 'fail', 'message' => $this->lang->car->duplicatePlate);

        $this->dao->insert(TABLE_XS_CAR)->data($car)
            ->autoCheck()
            ->batchCheck($this->config->car->require->create, 'notempty')
            ->exec();
    }

    public function delete($carID, $null = null)
    {
        $this->dao->delete()->from(TABLE_XS_CAR)->where('id')->eq($carID)->exec();
        return true;
    }

    public function update($carID)
    {
        $car = fixer::input('post')->get();

        $this->dao->update(TABLE_XS_CAR)
            ->data($car)
            ->where('id')->eq($carID)
            ->batchCheck($this->config->car->require->edit, 'notempty')
            ->exec();
    }

    /*  
     *  Check disable expiry date.
     *
     * */
    public function checkDisabledCars()
    {   
        return $this->dao->select('plate,expiryDate')->from(TABLE_XS_CAR)
            ->where('expiryDate')->lt(date("Y-m-d",strtotime("+20 day")))
            ->orderBy('expiryDate_asc')
            ->fetchAll();
    }
}
