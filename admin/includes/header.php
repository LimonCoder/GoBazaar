<?php
$page = explode("/",$_SERVER['PHP_SELF']);
$activepage = end($page);


function numberEntoBn($value){
    $sub = str_split($value);
    $replece_array =  array("1","2","3","4","5","6","7","8","9","0");
    $searching_array =array("১","২","৩","৪","৫","৬","৭","৮","৯","০");

    $val = str_replace($replece_array, $searching_array,$sub);
    return implode("",$val);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        if ($activepage == "catagory_list.php"){
            echo "<title>Goo-Bazaar | Catagory-Lists</title>";
        }elseif ($activepage == "index.php"){
            echo "<title>Goo-Bazaar | Dashboard</title>";
        }
    ?>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" media="screen" >
    <link rel="stylesheet" href="assets/css/animate-css/animate.min.css" media="screen" >
    <link rel="stylesheet" href="assets/css/lobipanel/lobipanel.min.css" media="screen" >
    <link rel="stylesheet" href="assets/css/toastr/toastr.min.css" media="screen" >
    <link rel="stylesheet" href="assets/css/icheck/skins/line/blue.css" >
    <link rel="stylesheet" href="assets/css/icheck/skins/line/red.css" >
    <link rel="stylesheet" href="assets/css/icheck/skins/line/green.css" >
    <link rel="stylesheet" href="assets/css/main.css" media="screen" >
    <link rel="stylesheet" href="assets/css/custom-style.css" media="screen" >

    <script src="js/modernizr/modernizr.min.js"></script>
    <style type="text/css">
        .bg-black-300 {
            background-color: #3c3c3c;
            border-color: #3c3c3c;
            color: #fff !important;
            height: 603px;
        }
    </style>
</head>
<body class="top-navbar-fixed" style="font-family: SutonnyOMJ; font-size: 18px;">
    <div class="main-wrapper">
        <nav class="navbar top-navbar bg-white box-shadow">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header no-padding">
                        <a class="navbar-brand" href="dashboard.php">
                            সুপার_অ্যাডমিন
                        </a>
                        <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                        <button type="button" class="navbar-toggle mobile-nav-toggle" >
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- /.navbar-header -->

                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li class="hidden-sm hidden-xs"><a href="#" class="user-info-handle"><i class="fa fa-user"></i></a></li>
                            <li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>
                            
                            <li class="hidden-xs hidden-xs"><!-- <a href="#">My Tasks</a> --></li>
                            
                        </ul>
                        <!-- /.nav navbar-nav -->

                        <ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">


                            <li><a href="logout.php" class="color-danger text-center"><i class="fa fa-sign-out"></i> লগআউট</a></li>
                            
                            
                            
                        </ul>
                        <!-- /.nav navbar-nav navbar-right -->
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <div class="content-wrapper">
            <div class="content-container">

                <div class="left-sidebar bg-black-300 box-shadow ">
                    <div class="sidebar-content">
                        <div class="user-info closed">
                            <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                            <h6 class="title" style="font-family: SutonnyOMJ" ‍>আডমিন</h6>
                            <small class="info">PHP Developer</small>
                        </div>
                        <!-- /.user-info -->

                        <div class="sidebar-nav">
                            <ul class="side-nav color-gray">
                                <li class="nav-header">
                                    <span class="">সকল ক্যাটেগরি</span>
                                </li>
                                <li >
                                    <a class="active" href="index.php"><i class="fa fa-dashboard"></i> <span>ড্যাশবোর্ড</span> </a>
                                    
                                </li>
                                <li>
                                    <a href="catagory_list.php"><i class="fa fa-file-text"></i> <span> ক্যাটেগরি ও সাব-ক্যাটেগরি </span></a>

                                </li>
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-file-text"></i> <span> পন্য ব্যবস্থাপনা</span></a>

                                </li><li class="has-children">
                                    <a href="#"><i class="fa fa-file-text"></i> <span> স্টক ব্যবস্থাপনা</span></a>

                                </li>
                                </li><li class="has-children">
                                    <a href="#"><i class="fa fa-file-text"></i> <span>  কাষ্টমারগন </span></a>

                                <li class="has-children">
                                    <a href="#"><i class="fa fa-file-text"></i> <span> রিপোর্ট </span> <i class="fa fa-angle-right arrow"></i></a>
                                    <ul class="child-nav">
                                        <li><a href=""><i class="fa fa-bars"></i> <span> স্টক রিপোর্ট</span></a></li>
                                        <li><a href=""><i class="fa fa fa-server"></i> <span>অর্ডার সমূহ</span></a></li>
                                        <li><a href=""><i class="fa fa-newspaper-o"></i> <span>পন্যের রিপোর্ট</span></a></li>
                                        <li><a href=""><i class="fa fa-newspaper-o"></i> <span> অর্ডার রিপোর্টট</span></a></li>
                                        <li><a href=""><i class="fa fa-newspaper-o"></i> <span> দৈনিক বিক্রয় রিপোর্ট</span></a></li>
                                        <li><a href=""><i class="fa fa-newspaper-o"></i> <span>  মাসিক বিক্রয় রিপোর্ট</span></a></li>
                                        <li><a href=""><i class="fa fa-newspaper-o"></i> <span>  লাভ ক্ষতি রিপোর্টট</span></a></li>
                                    </ul>
                                </li>
                                    <li><a href=""><i class="fa fa fa-user"></i> <span>  যোগাযোগ রিপোর্ট</span></a></li>
                                    <li><a href=""><i class="fa fa fa-server"></i> <span>  পাসওয়ার্ড পরিবর্তন </span></a></li>
                                    
                                </ul>
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>