<?php

include_once "../Models/Login.php";

if (isset($_POST['trigger']) == 1) {
    $loginModel = new Login();
    $loginModel->LoginModels();
}

// Login Helpers

if (isset($_POST['loginTrigger']) == 1) {
    $data = [
        "uname" => $_POST['username'],
        "pwd" => $_POST['password']
    ];
    $loginModel = new Login();
    $loginModel->onLoginModels($data);
}

if (isset($_POST['update_on_select_admin']) == true) {
    $data = ["tokenName" => $_POST['tokenName']];
    $loginModel = new Login();
    $loginModel->onUpdateAdminSelect($data);
}

if (isset($_POST['update_on_logout_admin']) == true) {
    $data = ["tokenName" => $_POST['tokenName']];
    $loginModel = new Login();
    $loginModel->onUpdateAdminSelectionLogout($data);
}
