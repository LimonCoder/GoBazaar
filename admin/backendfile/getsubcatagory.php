<?php
include('../classes/database.php');
include('../classes/catagory.php');



$object = new catagory();
$catagory = removeEmptyvalues($object->getSubcatagory($_POST['catagoryname']));

?>

<option value="">পন্যের সাব ক্যাটাগরি নির্বাচন করুণ</option>
<?php


if(count($catagory) != 0) {
foreach ($catagory as $value){ ?>

    <option value="<?=$value?>"><?=$value?></option>

<?php }
}





function removeEmptyvalues($array){
    $valu = array();
    foreach ($array as $value){

        if ($value != ''){
            $valu[] = $value;
        }
    }
    return $valu;
}


?>