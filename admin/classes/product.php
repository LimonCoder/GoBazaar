<?php


class product extends database{
    private $catagoryid;
    private $ProductName;
    private $ProductDetails;
    private $ProductImages;
    private $sql;


    public function __construct(){
        $this->sql = $this->connect();
    }
    public function setProductName($name){
        $this->ProductName = $name;
    }

    public function Setvalues($catagoryid,$productName,$ProductDetails,$ProductImages){
	     $this->catagoryid = $catagoryid;
	     $this->ProductName = $productName;
	     $this->ProductDetails = $ProductDetails;
	     $this->ProductImages = $ProductImages;
     }

    public function query()
    {
        $query = "INSERT INTO productmanagment(catagoryId, ProductName, ProductDetails, ProductImage) VALUES (".$this->catagoryid.",'".$this->ProductName."','".$this->ProductDetails."','".$this->ProductImages."')";
        $res = $this->sql->query($query);
        return $res;
    }

    public function duplicateProductcheck(){
        $query = "SELECT * FROM productmanagment WHERE 	ProductName = '".$this->ProductName."'";
        $results = $this->sql->query($query);

        if ($results->num_rows > 0){
            return true;
        }else{
            return false;
        }


    }

}


?>