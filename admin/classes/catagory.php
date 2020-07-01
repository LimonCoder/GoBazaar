<?php

class catagory extends database {
     private $catagoryName;
     private $name;
    private $catagoryIcon;
    private $serialNo;
    private $isShow;
    public $sqli;

    public function __construct()
    {
        $this->sqli = $this->connect();
    }

    public function setValues($catagoryName,$name,$cataogoryIcon,$serialNo,$isShow){
        $this->catagoryName = $catagoryName;
        $this->name = $name;
        $this->catagoryIcon = $cataogoryIcon;
        $this->serialNo = $serialNo;
        $this->isShow = $isShow;

    }

    public function setCatagory($catagory){
        $this->name = $catagory;
    }






    public  function query(){
            if(isset($this->catagoryName)){
                $query = "INSERT INTO catagory_subcatagory  (catagoryname,subcatagoryname,catagoryicon, serial, is_show) VALUES ('".$this->catagoryName."', '".$this->name."','".$this->catagoryIcon."',".$this->serialNo.",".$this->isShow.")";

            }else{
                $query = "INSERT INTO catagory_subcatagory (catagoryname, catagoryicon, serial, is_show) VALUES ('".$this->name."','".$this->catagoryIcon."',".$this->serialNo.",".$this->isShow.")";

            }

            $pending = $this->sqli->query($query);
            return $pending;




    }

    public function duplicateCatagorycheck(){
        $query = "SELECT * FROM catagory_subcatagory WHERE catagoryname = '".$this->name."' OR subcatagoryname = '".$this->name."'";
        $results = $this->sqli->query($query);

        if ($results->num_rows > 0){
            return true;
        }else{
            return false;
        }


    }

    public function getcatagory(){
        $catagorys = [];
        $query = "SELECT catagory_subcatagory.catagoryname as cn FROM catagory_subcatagory";
        $results = $this->sqli->query($query);
        if ($results->num_rows > 0){
            while ($row = $results->fetch_array()){
                $catagorys[] = $row['cn'];
            }
        }

        return array_unique($catagorys);
    }

    public function getcatagorylist(){
        $catagoryslist = [];
        $query = "SELECT * FROM catagory_subcatagory";
        $results = $this->sqli->query($query);
        if ($results->num_rows > 0){
            while ($row = $results->fetch_array()){
                $catagoryslist[] = array(
                    "id"=> $row['id'],
                    "catagoryname"=> $row['catagoryname'],
                    "subcatagoryname"=> $row['subcatagoryname'],
                    "catagoryicon"=> $row['catagoryicon'],
                    "serial"=> $row['serial'],
                    "is_show"=> $row['is_show']
                );
            }
        }

        return $catagoryslist;
    }

}

;


?>