<?php
include('../classes/database.php');
include('../classes/catagory.php');

$object = new catagory();

$values = $object->getcatagory(); ?>

<option value="">সিলেক্ট</option>
<?php foreach ($values as $val){ ?>
    <option value="<?=$val?>"><?=$val?></option>
<?php }



?>


