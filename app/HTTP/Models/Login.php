<?php

include_once "../Controllers/LoginController.php";

interface LoginInterface
{
    public function LoginModels();
}

class Login extends LoginController implements LoginInterface
{
    public function LoginModels()
    {
        $callback = new LoginController();
        $callback->checkUser();
    }
}
