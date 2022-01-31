<?php

include_once "../../Database/db.php";
include_once "../../Database/queries.php";

interface LoginControllerInterface { 
    public function checkUser();
}

class LoginController implements LoginControllerInterface { 
    public function checkUser(){
        $serverChecker = new Server();
        $QueryIdentifier = new Queries();
        if($serverChecker->POSTCHECKER()) { 
            if($QueryIdentifier->checkUser("users", "checkUser")) { 
                if(DatabaseMigration::php_exec()) { 
                    if(DatabaseMigration::php_row_checker()) { 
                        //admin exist
                        echo DatabaseMigration::php_responses(
                            true,
                            "single",
                            (object)[0 => array("key" => "admin_exist")]
                        );
                    } else { 
                        //admin not exist
                        echo DatabaseMigration::php_responses(
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