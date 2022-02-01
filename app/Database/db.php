<?php

class DatabaseParams
{
    public static $host = "localhost";
    public static $username = "root";
    public static $pwd = "";
    public static $db = "dbmetrodog";
    public static $stmt;
    public static $helper;
}

class DatabaseMigration
{

    public function connect()
    {
        try {
            $connectionString = "mysql:host=" . DatabaseParams::$host . ";dbname=" . DatabaseParams::$db;
            DatabaseParams::$helper = new PDO($connectionString, DatabaseParams::$username, DatabaseParams::$pwd);
            DatabaseParams::$helper->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return DatabaseParams::$helper;
        } catch (PDOException $th) {
            die("Could not connect" . $th->getMessage());
        }
    }
    public function php_prepare($sql)
    {
        return DatabaseParams::$stmt = $this->connect()->prepare($sql);
    }

    public function php_bind($param, $val, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case $type == 1:
                    $type = PDO::PARAM_INT;
                    break;
                case $type == 2:
                    $type = PDO::PARAM_BOOL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        return DatabaseParams::$stmt->bindParam($param, $val, $type);
    }
    public function php_exec()
    {
        return DatabaseParams::$stmt->execute();
    }
    public function php_responses(
        $bool,
        $payload = null,
        $isArray
    ) {
        switch ($bool) {
            case $payload == "single":
                return json_encode($isArray, JSON_FORCE_OBJECT);
                break;
        }
    }
    public function php_row_checker()
    {
        return DatabaseParams::$stmt->rowCount() > 0;
    }
}
