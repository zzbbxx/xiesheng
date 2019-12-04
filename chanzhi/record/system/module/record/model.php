<?php
class recordModel extends model
{
    public function getRecordByID($recordID)
    {
        return $this->dao->select('*')->from(TABLE_XS_RECORD)->where('id')->eq($recordID)->fetch();
    }

    public function getRecords($status = 'all', $customerID = '0', $carID = '0', $driverID = '0', $beginDate = '', $orderBy = 'beginDate_desc', $pageID = '1')
    {
        $recordList = $this->dao->select('*')->from(TABLE_XS_RECORD)
            ->where('1')
            ->beginIF($carID != '0')->andWhere('carID')->eq($carID)->fi()
            ->beginIF($status != 'all')->andWhere('status')->eq($status)->fi()
            ->beginIF($driverID != '0')->andWhere('driverID')->eq($driverID)->fi()
            ->beginIF($customerID != '0' && $this->app->user->admin == 'no')->andWhere('customerID')->eq($customerID)->fi()
            ->beginIF(!empty($beginDate))->andWhere('beginDate')->gt($beginDate)->fi()
            ->orderBy($orderBy)
            ->page($pageID)
            ->fetchAll();

        if(!empty($beginDate))
        {
            $beginDateRecordList = array();
            foreach($recordList as $record) 
            {
                if(date('Y-m-d', strtotime($record->beginDate)) == $beginDate) $beginDateRecordList[] = $record;
            }
            return $beginDateRecordList;
        }
        else
        {
            return $recordList;
        }
    }

    public function getRecordsByType($type = 'number')
    {
        return $this->dao->select('*')->from(TABLE_XS_RECORD)->fetchPairs('id', $type);
    }

    public function create()
    {
        $record = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->add('status', 'wait')
            ->get();

        $this->dao->insert(TABLE_XS_RECORD)->data($record)
            ->autoCheck()
            ->batchCheck($this->config->record->require->create, 'notempty')
            ->exec();

        return $record;
    }

    public function update($recordID)
    {
        $record = fixer::input('post')->get();

        $this->dao->update(TABLE_XS_RECORD)
            ->data($record)
            ->where('id')->eq($recordID)
            ->batchCheck($this->config->record->require->edit, 'notempty')
            ->exec();
    }

    public function delete($recordID, $null = null)
    {
        $this->dao->delete()->from(TABLE_XS_RECORD)->where('id')->eq($recordID)->exec();
        return true;
    }

    public function confirm($recordID)
    {
        $this->dao->update(TABLE_XS_RECORD)->set('status')->eq('receive')->where('id')->eq($recordID)->exec();
        return true;
    }

    public function finish($recordID)
    {
        $record = fixer::input('post')
            ->add('finishDate', helper::now())
            ->add('status', 'finish')
            ->get();

        $this->dao->update(TABLE_XS_RECORD)
            ->data($record)
            ->where('id')->eq($recordID)
            ->exec();
    }

    public function assignTo($recordID)
    {
        $record = fixer::input('post')->get();

        $this->dao->update(TABLE_XS_RECORD)
            ->data($record)
            ->where('id')->eq($recordID)
            ->exec();
    }
}
