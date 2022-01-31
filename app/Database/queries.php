
<?php

interface QueryIndicator {
    public function checkUser($table, $args);
}
interface ServerInterface { 
    public function POSTCHECKER();
}

class Queries implements QueryIndicator { 
    public function checkUser($table, $args) {
        if($args === "checkUser") {
           $sql = "select * from " . $table . "where userType=1";
           return $sql;
        }
    }
}

class Server implements ServerInterface { 
    public function POSTCHECKER() { 
        return $_SERVER["REQUEST_METHOD"] == "POST";
    }
}