<?php

include_once "../Controllers/AdminRegisterController.php";

interface adminRegistrationInterface
{
    public function IAdminReg($data);
}

class AdminRegistration extends AdminRegistrationController implements adminRegistrationInterface
{
    public function IAdminReg($data)
    {
        $this->IadminController($data);
    }
}
