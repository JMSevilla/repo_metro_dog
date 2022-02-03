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
