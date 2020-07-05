<?php
include('../classes/database.php');
include('../classes/catagory.php');



$object = new catagory();
$catagory =  $object->getSubcatagory($_POST['catagoryname']); ?>

<option value="">পন্যের সাব ক্যাটাগরি নির্বাচন করুণ</option>
<?php
if(count(array_filter($catagory)) != 0) {
foreach ($catagory as $value){ ?>

    <option value="<?=$value?>"><?=$value?></option>

<?php }
}






?>