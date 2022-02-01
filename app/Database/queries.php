
<?php

interface QueryIndicator
{
    public function checkUser($args);
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
}

class Server implements ServerInterface
{
    public function POSTCHECKER()
    {
        return $_SERVER["REQUEST_METHOD"] == "POST";
    }
}
