<?php

include_once "../Models/AdminRegistration.php";

if (isset($_POST['trigger']) == 1) {
    $data = [
        "fname" => $_POST['firstname'],
        "lname" => $_POST['lastname'],
        "PA" => $_POST['primary_address'],
        "SA" => $_POST['secondary_address'],
        "CN" => $_POST['contactNumber'],
        "email" => $_POST['email'],
        "username" => $_POST['username'], "pwd" => $_POST['password'],
        "SQ" => $_POST['sec_question'], "secA" => $_POST['sec_answer'],
        "branch" => $_POST['branchName']
    ];
    $callback = new AdminRegistration();
    $callback->IAdminReg($data);
    
}


if (isset($_POST['getQuestions']) == true) {
    $callback = new AdminRegistration();
    $callback->IFetchQuestions();
}

if (isset($_POST['getBranch']) == true) {
    $callback = new AdminRegistration();
    $callback->IFetchBranchController();
}

