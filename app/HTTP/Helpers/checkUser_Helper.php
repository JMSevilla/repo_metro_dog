<?php

include_once "../Models/Login.php";

if (isset($_POST['trigger']) == 1) {
    $loginModel = new Login();
    $loginModel->LoginModels();
}
