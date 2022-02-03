<?php

include_once "../Controllers/AdminRegisterController.php";

interface adminRegistrationInterface
{
    public function IAdminReg($data);
    public function IFetchQuestions();
}

class AdminRegistration extends AdminRegistrationController implements adminRegistrationInterface
{
    public function IAdminReg($data)
    {
        $this->IadminController($data);
    }
    public function IFetchQuestions()
    {
        $this->IFetchController();
    }
}
