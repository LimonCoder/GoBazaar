<?php

function numberEntoBn($value){
    $sub = str_split($value);
    $replece_array =  array("1","2","3","4","5","6","7","8","9","0");
    $searching_array =array("১","২","৩","৪","৫","৬","৭","৮","৯","০");

    $val = str_replace($replece_array, $searching_array,$sub);
    return implode("",$val);

}
$con=mysqli_connect('localhost','root','','ecomarce')
or die("connection failed".mysqli_errno());
mysqli_set_charset($con,"utf8");


$request=$_REQUEST;
$serial = $request['start'];

$col =array(
    0   =>  'id',
    1   =>  'catagoryicon',
    2   =>  'catagoryname',
    3   =>  'subcatagoryname',
    4   =>  'serial',
    5   =>  'is_show',
    6   =>  'id',
);  //create column like table in database

$sql ="SELECT * FROM catagory_subcatagory";
$query=mysqli_query($con,$sql);


$totalData=mysqli_num_rows($query);
$totalFilter=$totalData;

//Search
if(!empty($request['search']['value'])){
    $sql ="SELECT * FROM catagory_subcatagory WHERE catagoryname  LIKE '%".$request['search']['value']."%' OR subcatagoryname LIKE '%".$request['search']['value']."%'";
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
    $subdata=array();
    $subdata[]= numberEntoBn(++$serial);
    $subdata[]="<img src='assets/uploadedimages/".$row['catagoryicon']."' alt='' height='50px' width='50' />";
    $subdata[]=$row['catagoryname'];
    $subdata[]=$row['subcatagoryname'];
    $subdata[]=$row['serial'];
    if($row['is_show'] == 1){
        $subdata[] = '<span class="badge badge-danger badge-pill">Show</span>';
    }else{
        $subdata[] = '<span class="badge badge-danger badge-pill">Hide</span>';
    }
    $subdata[]= '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" style="font-size: 16px;margin-left: 58px;" onclick="category_edit(0)">সম্পাদন</a>
                                 <a href="javascript:void(0)" class="edit btn btn-danger btn-sm" style="font-size: 16px;" onclick="category_delete(0)">মুছুন</a>';
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>