<?php
include('../classes/database.php');
include('../classes/catagory.php');

$object = new catagory();

$lists = $object->getcatagorylist();

echo json_encode($lists);

?>