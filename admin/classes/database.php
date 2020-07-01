<?php

abstract class  database{
    private $hostname = "localhost";
    private $UserName = "root";
    private $UserPassword = "";
    private $dbname = "ecomarce";

    public function connect(){
        $con = new mysqli($this->hostname,$this->UserName,$this->UserPassword,$this->dbname);
        if ($con->connect_errno){
            die("Database Connection Faild.Please Check");
        }
        $con->set_charset("utf8");
        return $con;
    }

    public abstract function query();
}



?>