<?php include('includes/header.php')?>
<!-- main page  -->
<?php
include('classes/database.php');
include('classes/catagory.php');
?>
<div class="main-page">
    <!-- main header Start -->
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h1 class="title" style="font-family: SutonnyOMJ">ড্যাশবোর্ড</h1>

            </div>
        </div>
        

    </div>
    <!-- main header  End -->

    <!-- main Section start -->
    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat bg-primary" href="manage-students.php">
                        <?php
                            $obj =new catagory();

                        ?>

                        <span class="number counter" style="font-size: 25px"><?php
                            $catagorys = strval(count($obj->getcatagory()));
                           echo numberEntoBn($catagorys) ?></span>
                        <span class="name" style="font-family: SutonnyOMJ; font-size: 25px">ক্যাটেগরি</span>
                        <span class="bg-icon"><i class="fa fa-users"></i></span>
                    </a>

                    <!-- /.dashboard-stat -->
                </div>
                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat bg-danger" href="manage-subjects.php">

                        <span class="number counter">200</span>
                        <span class="name">Subjects Listed</span>
                        <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                    </a>
                    <!-- /.dashboard-stat -->
                </div>
                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat bg-warning" href="manage-classes.php">

                        <span class="number counter">100</span>
                        <span class="name">Total classes listed</span>
                        <span class="bg-icon"><i class="fa fa-bank"></i></span>
                    </a>
                    <!-- /.dashboard-stat -->
                </div>
                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat bg-success" href="manage-results.php">


                        <span class="number counter">20</span>
                        <span class="name">Results Declared</span>
                        <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                    </a>
                    <!-- /.dashboard-stat -->
                </div>
                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- main Section start -->

</div>
<!-- main page  -->
<?php include('includes/footer.php')?>                  


