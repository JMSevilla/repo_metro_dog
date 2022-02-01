<?php

include_once "../../Database/db.php";
include_once "../../Database/queries.php";

interface LoginControllerInterface
{
    public function checkUser();
}

class LoginController implements LoginControllerInterface
{
    public function checkUser()
    {
        $serverChecker = new Server();
        $QueryIdentifier = new Queries();
        $dbHelper = new DatabaseMigration();
        if ($serverChecker->POSTCHECKER()) {
            if ($dbHelper->php_prepare($QueryIdentifier->checkUser("checkUser"))) {
                if ($dbHelper->php_exec()) {
                    if ($dbHelper->php_row_checker()) {
                        //admin exist
                        echo $dbHelper->php_responses(
                            true,
                            "single",
                            (object)[0 => array("key" => "admin_exist")]
                        );
                    } else {
                        //admin not exist
                        echo $dbHelper->php_responses(
                            true,
                            "single",
                            (object)[0 => array("key" => "admin_not_exist")]
                        );
                    }
                }
            }
        }
    }
}
