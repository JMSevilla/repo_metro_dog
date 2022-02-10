<?php

include_once "../Controllers/AdminRegisterController.php";

interface adminRegistrationInterface
{
    public function IAdminReg($data);
    public function UsermanagementAddUser($data);
    public function IFetchQuestions();
    public function IFetchBranches();
}

class AdminRegistration extends AdminRegistrationController implements adminRegistrationInterface
{
    public function IAdminReg($data)
    {
        $this->IadminController($data);
    }
    public function UsermanagementAddUser($data)
    {
        $this->UserManagementController($data);
    } 
    public function IFetchQuestions()
    {
        $this->IFetchController();
    }
    public function IFetchBranches()
    {
        $this->IFetchBranchController();
    }
}
