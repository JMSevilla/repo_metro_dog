<?php

include_once "../../Database/db.php";
include_once "../../Database/queries.php";
include_once "../../Database/CookieManagement/cookieManagement.php";


interface ItokenGen
{
    public function setState($istoken);
}

class OAuthtoken extends DatabaseMigration implements ItokenGen
{
    public function setState($istoken = null)
    {
        DatabaseParams::$tokenSetter = $istoken;
        return DatabaseParams::$tokenSetter . $this->tokenGen();
    }
}

interface LoginControllerInterface
{
    public function checkUser();
}

interface LoginCoreInterface
{
    public function ClientLogin($data);
    public function updateOnChangeToAdmin($data);
}

interface ITokenization
{
    public function checkOAuth($tokenOwner, $tokenOwnerId, $savedPlatform);
    public function getOAuthToken($tokenOwner, $tokenOwnerId);
    public function checkTokenIfExist($tokenOwner, $tokenOwnerId, $savedPlatform);
    public function updateExistToken($tokenOwnerId);
}

class Tokenization extends DatabaseMigration implements ITokenization
{
    public function checkOAuth($tokenOwner = null, $tokenOwnerId = null, $savedPlatform = null)
    {
        $serverHelper = new Server();
        $queryIndicator = new Queries();
        if ($serverHelper->POSTCHECKER()) {
            if ($this->php_prepare($queryIndicator->addNewToken("tokenization", "login/addnewtoken"))) {
                $tokenSetter = new OAuthtoken();
                $this->php_bind(":token", $tokenSetter->setState("Basic:"));
                $this->php_bind(":istokenvalid", "1");
                $this->php_bind(":tokenowner", $tokenOwner);
                $this->php_bind(":tokenownerid", $tokenOwnerId);
                $this->php_bind(":tokensavedplatform", $savedPlatform);
                $this->php_exec();
            }
        }
    }
    public function getOAuthToken($tokenOwner, $tokenOwnerId)
    {
        $serverHelper = new Server();
        $queryIndicator = new Queries();
        $cookieReactor = new CookieManagement();
        if ($serverHelper->POSTCHECKER()) {
            if ($this->php_prepare($queryIndicator->getTokenization("login/get/token"))) {
                $this->php_bind(":ownerName", $tokenOwner);
                $this->php_bind(":uId", $tokenOwnerId);
                if ($this->php_exec()) {
                    if ($this->php_row_checker()) {
                        $get = $this->php_fetchRow();
                        $cookieReactor->cookieSetter(
                            $get['token'],
                            time() + 60 * 60 * 24 * 7,
                            '/',
                            true,
                            true,
                            'None',
                            'adminToken'
                        );
                        return true;
                    }
                }
            }
        }
    }
    public function checkTokenIfExist($tokenOwner, $tokenOwnerId, $savedPlatform)
    {
        $serverHelper = new Server();
        $queryIndicator = new Queries();
        if ($serverHelper->POSTCHECKER()) {
            if ($this->php_prepare($queryIndicator->checkIsTokenValid("check/istokenvalid"))) {
                $this->php_bind(":owner", $tokenOwner);
                $this->php_bind(":id", $tokenOwnerId);
                if ($this->php_exec()) {
                    if ($this->php_row_checker()) {
                        $this->updateExistToken($tokenOwnerId);
                    } else {
                        $this->checkOAuth($tokenOwner, $tokenOwnerId, $savedPlatform);
                    }
                }
            }
        }
    }
    public function updateExistToken($tokenOwnerId)
    {
        $serverHelper = new Server();
        $queryIndicator = new Queries();
        $tokenSetter = new OAuthtoken();
        if ($serverHelper->POSTCHECKER()) {
            if ($this->php_prepare($queryIndicator->updateToken("update/token"))) {
                $this->php_bind(":token", $tokenSetter->setState("Basic:"));
                $this->php_bind(":id", $tokenOwnerId);
                if ($this->php_exec()) {
                    return true;
                }
            }
        }
    }
}

class LoginController extends DatabaseMigration implements LoginControllerInterface
{
    public function checkUser()
    {
        $serverChecker = new Server();
        $QueryIdentifier = new Queries();
        if ($serverChecker->POSTCHECKER()) {
            if ($this->php_prepare($QueryIdentifier->checkUser("checkUser"))) {
                if ($this->php_exec()) {
                    if ($this->php_row_checker()) {
                        //admin exist
                        echo $this->php_responses(
                            true,
                            "single",
                            (object)[0 => array("key" => "admin_exist")]
                        );
                    } else {
                        //admin not exist
                        echo $this->php_responses(
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

class LoginCoreController extends DatabaseMigration implements LoginCoreInterface
{
    public function ClientLogin($data)
    {
        $serverHelper = new Server();
        $queryIndicator = new Queries();
        if ($serverHelper->POSTCHECKER()) {
            if ($this->php_prepare($queryIndicator->LoginQuery("users", "login/clientLogin"))) {
                $this->php_bind(":uname", $data['uname']);
                if ($this->php_exec()) {
                    if ($this->php_row_checker()) {
                        $get = $this->php_fetchRow();
                        $fname = $get['firstname'];
                        $lname = $get['lastname'];
                        $origpass = $get['password'];
                        $istype = $get['userType'];
                        $isStatus = $get['userStatus'];
                        $uId = $get['userID'];
                        if (password_verify($_POST['password'], $origpass)) {
                            if ($isStatus === "1") {
                                if ($istype === "1") {
                                    //admin
                                    /* Token Setter */
                                    $tokenClassify = new Tokenization();
                                    $tokenClassify->checkTokenIfExist($data['uname'], $uId, "admin_selection");
                                    // $tokenClassify->checkOAuth($data['uname'], $uId, "admin");
                                    /* Token Getter */
                                    $tokenClassify->getOAuthToken($data['uname'], $uId);
                                    $logged_array = ["fname" => $fname, "lname" => $lname, "message" => "success_admin", "role" => "administrator"];
                                    echo $this->php_responses(
                                        true,
                                        "single",
                                        (object)[0 => array("key" => $logged_array)]
                                    );
                                } else {
                                    //cashier
                                    echo $this->php_responses(
                                        true,
                                        "single",
                                        (object)[0 => array("key" => "success_cashier")]
                                    );
                                }
                            } else {
                                // account disable
                                echo $this->php_responses(
                                    true,
                                    "single",
                                    (object)[0 => array("key" => "account_disabled")]
                                );
                            }
                        } else {
                            // Wrong password
                            echo $this->php_responses(
                                true,
                                "single",
                                (object)[0 => array("key" => "invalid_password")]
                            );
                        }
                    } else {
                        //account not found
                        echo $this->php_responses(
                            true,
                            "single",
                            (object)[0 => array("key" => "account_not_found")]
                        );
                    }
                }
            }
        }
    }
    public function updateOnChangeToAdmin($data)
    {
        $serverHelper = new Server();
        $queryIndicator = new Queries();
        if ($serverHelper->POSTCHECKER()) {
            if ($this->php_prepare($queryIndicator->scanToken("scan/token"))) {
                $this->php_bind(":owner", $data['tokenName']);
                $this->php_exec();
                if ($this->php_row_checker()) {
                    if ($this->php_prepare($queryIndicator->updateSavedPlatform("update/platform"))) {
                        $this->php_bind(":platform", "admin");
                        $this->php_bind(":owner", $data['tokenName']);
                        $this->php_exec();
                    }
                } else {
                }
            }
        }
    }
}
