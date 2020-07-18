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

    if ($_POST['productid'] ==''){
        $object->setProductName($_POST['name']);
        if (!$object->duplicateProductcheck()){
            $productName = $_POST['name'];
        }else{
            $erros['DuplicateproductName'] = "*";
        }
    }else{
        $productName = $_POST['name'];
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
if ($_POST['productid'] ==''){
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
        $Productimages = join("#",$imagname);


    }else{
        $erros['image'] = "*";
    }
}else{
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
        $Productimages = join("#",$imagname);


    }else{
        $imagename = "NULL";
    }
}


if (count($erros) == 0) {

    if ($_POST['productid'] =='') {
        $object->Setvalues($id, $productName, $ProductDetails, $Productimages);
        if ($object->query()) {
            if (strlen($Productimages) > 0) {

                for ($i = 0; $i < count($imagetemp); $i++) {
                    move_uploaded_file($imagetemp[$i], "../assets/uploadedimages/" . $imagname[$i]);
                }
            }
            $success = array("status" => "success", "massage" => "পন্যেটি সফলভাবে যোগ হয়েছে");
        }

    }else {
        $con = new mysqli("localhost","root","","ecomarce");
        $con->set_charset("utf8");
        if ($con->connect_errno){
            exit("connection faild");
        }
        if (isset($imagename)){
            if ($imagename == "NULL"){
                $query = "UPDATE productmanagment SET catagoryId= $id, ProductName= '$productName',ProductDetails = '$ProductDetails' WHERE id = ".$_POST['productid']."";
            }
        }else{
            $query = "UPDATE productmanagment SET catagoryId= $id, ProductName= '$productName',ProductDetails = '$ProductDetails', ProductImage = '$Productimages' WHERE id = ".$_POST['productid']."";
        }

        $res = $con->query($query);
        if ($res){
            if (isset($Productimages)){
                if (strlen($Productimages) > 0) {

                    for ($i = 0; $i < count($imagetemp); $i++) {
                        move_uploaded_file($imagetemp[$i], "../assets/uploadedimages/" . $imagname[$i]);
                    }
                }
            }

            $success = array("status" => "success", "massage" => "পন্যেটি সফলভাবে আপডেট হয়েছে");
        }



    }
    echo json_encode($success);

} else {
    echo json_encode($erros);
}





?>


