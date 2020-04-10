<?php
public function getUserByDriverID($driverID)
{
    return $this->dao->select('*')->from(TABLE_USER)->where('driverID')->eq($driverID)->fetch();
}
