<?php
class violationModel extends model
{
    public function getViolationByID($violationID)
    {
        return $this->dao->select('*')->from(TABLE_XS_VIOLATION)->where('id')->eq($violationID)->fetch();
    }

    public function getViolations($orderBy = 'desc', $pageID = '')
    {
        return $this->dao->select('*')->from(TABLE_XS_VIOLATION)->orderBy($orderBy)->page($pageID)->fetchAll();
    }

    public function getViolationsByType($type = 'number')
    {
        return $this->dao->select('*')->from(TABLE_XS_VIOLATION)->fetchPairs('id', $type);
    }

    public function create($orderBy, $pagerID)
    {
        $violation = fixer::input('post')
            ->setDefault('addedDate', helper::now())
            ->add('addedBy', $this->app->user->account)
            ->get();

        $this->dao->insert(TABLE_XS_VIOLATION)->data($violation)
            ->autoCheck()
            ->batchCheck($this->config->violation->require->create, 'notempty')
            ->exec();
    }

    public function delete($violationID, $null = null)
    {
        $this->dao->delete()->from(TABLE_XS_VIOLATION)->where('id')->eq($violationID)->exec();
        return true;
    }

    public function update($violationID)
    {
        $violation = fixer::input('post')->get();

        $this->dao->update(TABLE_XS_VIOLATION)
            ->data($violation)
            ->where('id')->eq($violationID)
            ->batchCheck($this->config->violation->require->edit, 'notempty')
            ->exec();
    }

    public function setUserID($violationID = '', $userID = '')
    {
        $this->dao->update(TABLE_XS_VIOLATION)->set('userID')->eq($userID)->where('id')->eq($violationID)->exec();
    }
}
