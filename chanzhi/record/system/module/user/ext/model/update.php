<?php
public function update($account)
{
    $result = parent::update($account);
    if(!$result) return $result;
    $user = parent::getByAccount($account);
    $this->loadModel('driver')->setUserID($user->driverID, $user->id);
    return true; 
}
