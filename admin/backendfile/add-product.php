<?php
include_once('../classes/database.php');
include_once('../classes/product.php');

$object = new product();
$erros = array();

// catagory //
if ($_POST['category'] != ""){
    $catagory = $_POST['category'];
}else{
    $erros['catagory'] = "*";
}
// sub catagory //
if ($_POST['sub_category'] !=""){
    $subCatagory = $_POST['sub_category'];
}else{
    $erros['sub_category'] = "*";
}
//catagoryid //
if (!empty($_POST['id'])){
    $id = $_POST['id'];
}else{
    $erros['id'] = "*";
}

// Product Name //
if (!empty($_POST['name'])){

    $object->setProductName($_POST['name']);
    if (!$object->duplicateProductcheck()){
        $productName = $_POST['name'];
    }else{
        $erros['DuplicateproductName'] = "*";
    }


}else{
    $erros['productName'] = "*";
}
// Product Details //
if (!empty($_POST['description'])){
    $ProductDetails = $_POST['description'];
}else{
    $ProductDetails = null;
}
// Product Image //
if (count($_FILES) != 0){
    $imagname = array();
    $imagetemp = array();
    foreach ($_FILES as $file){
        $image = preg_split ("/[\s,_ -.]+/", $file['name']);
        $extension = ['jpg','jpeg','png','webp'];
        if (in_array(end($image),$extension)){
            $imagname[] = rand(11111,99999).".".end($image);
            $imagetemp[] = $file['tmp_name'];
        }else{
            $erros['invaildextension'] = "*";
            break;
        }

    }
    $Productimages = join(",",$imagname);


}else{
    $erros['image'] = "*";
}


if (count($erros) == 0){
    $object->Setvalues($id,$productName,$ProductDetails,$Productimages);
    if ( $object->query()){
        if (strlen($Productimages) > 0){

            for ($i =0; $i<count($imagetemp); $i++){
                move_uploaded_file($imagetemp[$i],"../assets/uploadedimages/".$imagname[$i]);
            }
        }
        $success = array("status"=>"success","massage"=>"পন্যেটি সফলভাবে যোগ হয়েছে");
        echo json_encode($success);
    }
}else{
    echo json_encode($erros);
}





?>