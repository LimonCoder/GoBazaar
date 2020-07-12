<?php

include('../classes/database.php');
include('../classes/catagory.php');

$object = new catagory();
$values = $object->getcatagory(); ?>

<option value="">পন্যের ধরন নির্বাচন করুণ</option>
<?php foreach ($values as $val){ ?>
    <option value="<?=$val?>"><?=$val?></option>
<?php }



?>


