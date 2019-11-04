<?php
class customerModel extends model
{
    public function getCustomerByID($customerID)
    {
        return $this->dao->select('*')->from(TABLE_XS_CUSTOMER)->where('id')->eq($customerID)->fetch();
    }

    public function getCustomers($orderBy = 'id desc', $pageID = '')
    {
        return $this->dao->select('*')->from(TABLE_XS_CUSTOMER)->orderBy($orderBy)->page($pageID)->fetchAll();
    }

    public function getCustomersByType($type = 'name')
    {
        return $this->dao->select('*')->from(TABLE_XS_CUSTOMER)->fetchPairs('id', $type);
    }

    public function create($orderBy, $pagerID)
    {
        $customer = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->get();

        /* Check for duplicate company name. */
        $customers = $this->getCustomersByType('name');
        if(in_array($customer->name, $customers)) return array('result' => 'fail', 'message' => $this->lang->customer->duplicateName);

        $this->dao->insert(TABLE_XS_CUSTOMER)->data($customer)
            ->autoCheck()
            ->batchCheck($this->config->customer->require->create, 'notempty')
            ->exec();
    }

    public function delete($customerID, $null = null)
    {
        $this->dao->delete()->from(TABLE_XS_CUSTOMER)->where('id')->eq($customerID)->exec();
        return true;
    }

    public function update($customerID)
    {
        $customer = fixer::input('post')->get();

        /* Check for duplicate company name. */
        $customers = $this->getCustomersByType('name');
        if(in_array($customer->name, $customers)) return array('result' => 'fail', 'message' => $this->lang->customer->duplicateName);

        $this->dao->update(TABLE_XS_CUSTOMER)
            ->data($customer)
            ->where('id')->eq($customerID)
            ->batchCheck($this->config->customer->require->edit, 'notempty')
            ->exec();
    }
}
