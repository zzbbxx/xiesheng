<?php
class invoiceModel extends model
{
    public function getInvoiceByID($invoiceID)
    {
        return $this->dao->select('*')->from(TABLE_XS_INVOICE)->where('id')->eq($invoiceID)->fetch();
    }

    public function getInvoices($orderBy = 'desc', $customerID = 0, $beginDate = '', $finishDate = '', $pageID = '')
    {
        return $this->dao->select('*')->from(TABLE_XS_INVOICE)
            ->beginIF($customerID != '0' && $this->app->user->admin == 'no')->andWhere('customerID')->eq($customerID)->fi()
            ->beginIF(!empty($beginDate))->andWhere('createDate')->gt($beginDate)->fi()
            ->beginIF(!empty($finishDate))->andWhere('createDate')->lt($finishDate)->fi()
            ->orderBy($orderBy)
            ->page($pageID)
            ->fetchAll();
    }

    public function getInvoicesByType($type = 'plate')
    {
        return $this->dao->select('*')->from(TABLE_XS_INVOICE)->fetchPairs('id', $type);
    }

    public function create()
    {
        $invoice = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->get();

        $this->dao->insert(TABLE_XS_INVOICE)->data($invoice)
            ->autoCheck()
            ->batchCheck($this->config->invoice->require->create, 'notempty')
            ->exec();
    }

    public function delete($invoiceID, $null = null)
    {
        $this->dao->delete()->from(TABLE_XS_INVOICE)->where('id')->eq($invoiceID)->exec();
        return true;
    }

    public function update($invoiceID)
    {
        $invoice = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->get();

        $this->dao->update(TABLE_XS_INVOICE)
            ->data($invoice)
            ->where('id')->eq($invoiceID)
            ->batchCheck($this->config->invoice->require->edit, 'notempty')
            ->exec();
    }
}
