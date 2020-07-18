<?php
include('../classes/database.php');
include('../classes/product.php');

$id = $_GET['id'];

$obj = new product();

$values = $obj->findValues($id);

echo json_encode($values);

?>