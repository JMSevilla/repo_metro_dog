<?php

include_once "../Controllers/LoginController.php";

interface LoginInterface
{
    public function LoginModels();
    public function onLoginModels($data);
}

class Login extends LoginController implements LoginInterface
{
    public function LoginModels()
    {
        $callback = new LoginController();
        $callback->checkUser();
    }
    public function onLoginModels($data)
    {
        $callback = new LoginCoreController();
        $callback->ClientLogin($data);
    }
}
