<?php
class insuranceModel extends model
{
    public function getInsuranceByID($insuranceID)
    {
        return $this->dao->select('*')->from(TABLE_XS_INSURANCE)->where('id')->eq($insuranceID)->fetch(); 
    }

    public function getInsurances($orderBy = 'id_desc', $pageID = '1')
    {
        return $this->dao->select('*')->from(TABLE_XS_INSURANCE)
            ->orderBy($orderBy)
            ->page($pageID)
            ->fetchAll();
    }

    public function getInsurancesByCar()
    {
        return $this->dao->select('*')->from(TABLE_XS_INSURANCE)
            ->fetchGroup('carNumber');
    }

    public function getCompanyList()
    {
        $companyList = new stdClass();
        $companyList->name  = $this->lang->insurance->companyList;
        $companyList->phone = $this->lang->insurance->companyPhone;

        return $companyList;
    }

    public function create()
    {
        $insurance = fixer::input('post')
            ->add('addedBy', $this->app->user->account == 'guest' ? $_POST['realname'] : $this->app->user->account)
            ->add('addedDate', helper::now())
            ->setIF($this->post->from && $this->post->from == 'miniprogram', 'company', array_search($this->post->company, $this->lang->insurance->companyList))
            ->setIF($this->post->from && $this->post->from == 'miniprogram', 'type', array_search($this->post->type, $this->lang->insurance->typeList))
            ->remove('realname, from')
            ->get();

        $oldInsurance = $this->dao->select('*')->from(TABLE_XS_INSURANCE)
            ->where('type')->eq($insurance->type)
            ->andWhere('carNumber')->eq($insurance->carNumber)
            ->fetch();

        if($oldInsurance)
        {
            $this->dao->update(TABLE_XS_INSURANCE)->data($insurance)
                ->where('id')->eq($oldInsurance->id)
                ->exec();
        }
        else
        {
            $this->dao->insert(TABLE_XS_INSURANCE)->data($insurance)
                ->autocheck()
                ->batchCheck('total, startDate, endDate', 'notempty')
                ->exec();
        }

        if(dao::isError()) die(js::error(dao::getError()));
        return true;
    }

    public function getInfo()
    {
        $info = new stdClass();
        $info->typeList    = $this->lang->insurance->typeList; 
        $info->companyList = $this->lang->insurance->companyList; 
        return $info;
    }

    public function delete($insuranceID, $null = null)
    {
        $this->dao->delete()->from(TABLE_XS_INSURANCE)->where('id')->eq($insuranceID)->exec();
        return true;
    }


    public function update($insuranceID)
    {
        $insurance = fixer::input('post')
            ->add('addedBy', $this->app->user->account)
            ->add('addedDate', helper::now())
            ->get();

        $this->dao->update(TABLE_XS_INSURANCE)->data($insurance)
            ->where('id')->eq($insuranceID)
            ->exec();

        return true;
    }

    public function checkDisabled()
    {
        return $this->dao->select('carNumber,type,endDate')->from(TABLE_XS_INSURANCE)
                ->where('endDate')->lt(date("Y-m-d",strtotime("+20 day")))
                ->orderBy('endDate_asc')
                ->fetchAll();
    }
}

