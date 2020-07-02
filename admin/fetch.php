<?php
$con=mysqli_connect('localhost','root','','ecomarce')
or die("connection failed".mysqli_errno());
mysqli_set_charset($con,"utf8");

$serialNo = 0;
$request=$_REQUEST;

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
$sql ="SELECT * FROM catagory_subcatagory WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (id Like '".$request['search']['value']."%' ";
    $sql.=" OR catagoryname Like '".$request['search']['value']."%' ";
    $sql.=" OR subcatagoryname Like '".$request['search']['value']."%' ";
    $sql.=" OR serial Like '".$request['search']['value']."%' )";
    $sql.=" OR is_show Like '".$request['search']['value']."%' )";
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
    $subdata[]=++$serialNo;
    $subdata[]=$row['catagoryicon'];
    $subdata[]=$row['catagoryname'];
    $subdata[]=$row['subcatagoryname'];
    $subdata[]=$row['serial'];
    if($row['is_show'] == 1){
        $subdata[] = '<span class="badge badge-danger badge-pill">Show</span>';
    }else{
        $subdata[] = '<span class="badge badge-danger badge-pill">Hide</span>';
    }
    $subdata[]= '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" onclick="category_edit(0)">সম্পাদন</a>
                                 <a href="javascript:void(0)" class="edit btn btn-danger btn-sm" onclick="category_delete(0)">মুছুন</a>';
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