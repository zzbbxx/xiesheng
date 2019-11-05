<?php
class outlayModel extends model
{
    public function getOutlayByID($outlayID)
    {
        return $this->dao->select('*')->from(TABLE_XS_OUTLAY)->where('id')->eq($outlayID)->fetch();
    }

    public function getOutlays($orderBy = 'desc', $pageID = '')
    {
        return $this->dao->select('*')->from(TABLE_XS_OUTLAY)->orderBy($orderBy)->page($pageID)->fetchAll();
    }

    public function getOutlaysByType($type = 'plate')
    {
        return $this->dao->select('*')->from(TABLE_XS_OUTLAY)->fetchPairs('id', $type);
    }

    public function create()
    {
        $outlay = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->get();

        $this->dao->insert(TABLE_XS_OUTLAY)->data($outlay)
            ->autoCheck()
            ->batchCheck($this->config->outlay->require->create, 'notempty')
            ->exec();
    }

    public function delete($outlayID, $null = null)
    {
        $this->dao->delete()->from(TABLE_XS_OUTLAY)->where('id')->eq($outlayID)->exec();
        return true;
    }

    public function update($outlayID)
    {
        $outlay = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->get();

        $this->dao->update(TABLE_XS_OUTLAY)
            ->data($outlay)
            ->where('id')->eq($outlayID)
            ->batchCheck($this->config->outlay->require->edit, 'notempty')
            ->exec();
    }
}
