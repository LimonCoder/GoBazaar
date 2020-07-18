<?php

$con = new mysqli("localhost","root","","ecomarce");
$con->set_charset("utf8");
if ($con->connect_errno){
    die("Database Connection Faild");
}
$serialno = 0;

$coloum = array('id','productimage','catagory','subcatagory','productname','date');

$sql = "SELECT catagory_subcatagory.catagoryname as catagory, catagory_subcatagory.subcatagoryname as subcatagory, productmanagment.* FROM `productmanagment`
INNER JOIN catagory_subcatagory
ON productmanagment.catagoryId = catagory_subcatagory.id";

// ‍select only catagory and sub-catgory //
if (!empty($_POST['catagory']) && !empty($_POST['subcatagory'])){

    $sql .= " WHERE catagory_subcatagory.catagoryname = '".$_POST['catagory']."' AND catagory_subcatagory.subcatagoryname = '".$_POST['subcatagory']."'";

    if (!empty($_POST['search']['value'])){
        $sql .=" AND productmanagment.ProductName LIKE '%".$_POST['search']['value']."%'";
    }




}elseif(!empty($_POST['catagory'])){

    $sql .= " WHERE catagory_subcatagory.catagoryname = '".$_POST['catagory']."'";

}elseif (!empty($_POST['search']['value'])){

    $sql .= " WHERE catagory_subcatagory.catagoryname  LIKE '%".$_POST['search']['value']."%' OR catagory_subcatagory.subcatagoryname LIKE '%".$_POST['search']['value']."%' OR productmanagment.ProductName LIKE '%".$_POST['search']['value']."%' ";
}


// Order
if (isset($_POST['order'])){
    $sql .= ' ORDER BY '.$coloum[$_POST['order'][0]['column']].' '.$_POST['order'][0]['dir'] .' LIMIT '.$_POST['start']. ',' .$_POST['length'];
}
$res = $con->query($sql);
$totalData= $res->num_rows;

$totalFilter=$totalData;


$data = array();


while ($row = $res->fetch_array()){
    $id = $row['id'];
    $subarray = array();
    $subarray[] = ++$serialno;

    if (!empty($row['ProductImage'])){
        $rowiamge =  explode("#",$row['ProductImage']);
        $subarray[] = "<img src='assets/uploadedimages/".$rowiamge[0]."' alt='' height='50px' width='50' />";

    }else{
        $subarray[] = $row['ProductImage'];
    }

    $subarray[] = $row['catagory'];
    $subarray[] = $row['subcatagory'];
    $subarray[] = $row['ProductName'];
    $subarray[] = $row['date'];
    $subarray[]= '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" style="font-size: 16px;margin-left: 58px;" onclick="product_edit('.$id.')" id="" >সম্পাদন</a>
                                 <a href="javascript:void(0)" class="edit btn btn-danger btn-sm" style="font-size: 16px;" onclick="category_delete(0)">মুছুন</a>';
    $data[] = $subarray;
}


$json_data=array(
    "draw"              =>  intval($_POST['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>