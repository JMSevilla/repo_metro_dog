<?php

include_once "../Controllers/LoginController.php";

interface LoginInterface
{
    public function LoginModels();
    public function onLoginModels($data);
    public function onUpdateAdminSelect($data);
    public function onUpdateAdminSelectionLogout($data);
    public function onUpdateAdminChangePlatform($data);
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
    public function onUpdateAdminSelect($data)
    {
        $callback = new LoginCoreController();
        $callback->updateOnChangeToAdmin($data);
    }
    public function onUpdateAdminSelectionLogout($data)
    {
        $callback = new LoginCoreController();
        $callback->updateOnLogoutCore($data);
    }
    public function onUpdateAdminChangePlatform($data)
    {
        $callback = new LoginCoreController();
        $callback->updateOnAdminChangePlatform($data);
    }
}
