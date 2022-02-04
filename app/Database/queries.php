
<?php

interface QueryIndicator
{
    public function checkUser($args);
    public function InsertAdminReg($table, $args);
    public function LoginQuery($table, $args);
    public function checkToken($table, $args);
    public function addNewToken($table, $args);
    public function getTokenization($args);
    public function scanToken($args);
    public function getUserById($args);
    public function fetchAllQuestions($args);
    public function fetchAllBranch($args);
}
interface ServerInterface
{
    public function POSTCHECKER();
}

class Queries implements QueryIndicator
{
    public function checkUser($args)
    {
        if ($args === "checkUser") {
            $sql = "select * from users where userType=1";
            return $sql;
        }
    }
    public function InsertAdminReg($table, $args)
    {
        if ($args === "adminReg") {
            $sql = "insert into " . $table . " values(default, :fname, :lname, :uname, :pwd, :uType, :uStatus, :imgURL, current_timestamp, :PA, :SA, :CN, :email, :SQ, :secA, :branch)";
            return $sql;
        }
    }
    public function LoginQuery($table, $args)
    {
        if ($args === "login/clientLogin") {
            $sql = "select * from users where username=:uname";
            return $sql;
        }
    }
    public function checkToken($table, $args)
    {
        if ($args === "login/checkToken") {
            $sql = "select * from tokenization where tokenOwner=:tokeowner";
            return $sql;
        }
    }
    public function addNewToken($table, $args)
    {
        if ($args === "login/addnewtoken") {
            $sql = "insert into " . $table . " values (default, :token, :istokenvalid, current_timestamp, :tokenowner, :tokenownerid, :tokensavedplatform)";
            return $sql;
        }
    }
    public function getTokenization($args)
    {
        if ($args === "login/get/token") {
            $sql = "select * from tokenization where tokenOwner=:ownerName and tokenOwnerId=:uId";
            return $sql;
        }
    }
    public function scanToken($args)
    {
        if ($args === "scan/token") {
            $sql = "select * from tokenization where tokenOwner=:owner and istokenvalid=1";
            return $sql;
        }
    }
    public function getUserById($args)
    {
        if ($args === "scan/token/getById") {
            $sql = "select * from users where userID=:uid";
            return $sql;
        }
    }
    public function fetchAllQuestions($args)
    {
        if ($args === "fetch/questions") {
            $sql = "select distinct question from mdQuestions where questionStatus=1";
            return $sql;
        }
    }
    public function fetchAllBranch($args)
    {
        if ($args === "fetch/branchName") {
            $sql = "select distinct branchName from branch where branchStatus=1";
            return $sql;
        }
    }
}

class Server implements ServerInterface
{
    public function POSTCHECKER()
    {
        return $_SERVER["REQUEST_METHOD"] == "POST";
    }
}
