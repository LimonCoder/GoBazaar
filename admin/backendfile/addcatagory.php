<?php
include('../classes/database.php');
include('../classes/catagory.php');

$errors = array();

if (!empty($_POST['category'])){
    $catagory = $_POST['category'];
}else{
    $catagory = NULL;
}
if (!empty($_POST['name'])){

    $obj = new catagory();
    $obj->setCatagory($_POST['name']);
    if (!$obj->duplicateCatagorycheck()){
        $name = $_POST['name'];
    }else{
        $errors['duplicatecatagory'] = "*";
    }

}
if (isset($_FILES['icon']['name'])){
    $image = preg_split ("/[\s,_ -.]+/", $_FILES['icon']['name']);
    $extension = ['jpg','jpeg','png','webp'];
    if (in_array(end($image),$extension)){
        $imagname = rand(11111,99999).".".end($image);
        $imagetemp = $_FILES['icon']['tmp_name'];
    }else{
    	$errors['invaildextension'] = "*";
     }
}else{
	$imagname = "NULL";
}

if (!empty($_POST['sorting'])) {
	if (is_numeric($_POST['sorting'])) {
		$sort = $_POST['sorting'];
	}else{
		$errors['invailltype'] = "*";
	}
	

}else{
	$sort = "NULL";
}

if(!empty($_POST['is_show'])){
    $show = $_POST['is_show'];
}else{
    $show =0;
}

if (count($errors) == 0){
    $catagor = new catagory();
    $catagor->setValues($catagory,$name,$imagname,$sort,$show);

    if ($catagor->query()){

        if ($imagname != "NULL"){
            move_uploaded_file($imagetemp,"../assets/uploadedimages/".$imagname);
        }
        $success = array("status"=>"success","massage"=>"ক্যাটাগরি সফলভাবে সম্পন্ন হয়েছে");
        echo json_encode($success);
    }else{
        $faild = array("status"=>"faild","massage"=>"ক্যাটাগরি সফলভাবে সম্পন্ন হয়েছে নি");
        echo json_encode($faild);
    }

}else{
    echo json_encode($errors);
}







?>