<?php

include('../classes/database.php');
include('../classes/catagory.php');

$object = new catagory();
$id = $object->getcatagoryid($_POST['id']);


echo $id;

?>