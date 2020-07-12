<?php

include_once('../classes/database.php');
include_once('../classes/product.php');

$object = new product();
$object->setProductName($_POST['ProductName']);
if ($object->duplicateProductcheck()){
    echo 1;
}else{
    echo 0;
}

?>