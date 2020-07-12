<?php include('includes/header.php')?>
<!-- main page  -->
<div class="main-page">
    <!-- main header Start -->
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h1 class="title" style="font-family: SutonnyOMJ"> পন্য ব্যবস্থাপনা </h1>

            </div>
        </div>


    </div>
    <!-- main header  End -->

    <!-- main Section start -->
    <section class="section" style="padding:5px">
        <div class="container-fluid">
            <div class="row main-hader">
                <div class="col-md-9 catagory-header" >
                    <h3 style="font-family: SutonnyOMJ"> পন্যসমূহের তালিকা</h3>
                </div>
                <div class="col-md-3" >
                    <button class="btn btn-success" style="float:right;" data-toggle="modal" data-target="#AddProductModal">নতুন যোগ করুন</button>
                    <!-- start Modal -->
                    <div class="modal fade" id="AddProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="font-family: SutonnyOMJ">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" style="font-family: SutonnyOMJ">পন্য যুক্ত করুন</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                </div>
                                <form class="AddProductForm" id="AddProductForm" action="javascript:void(0)" enctype="multipart/form-data" method="post">
                                    <input type="hidden" id="id" name="id" value="">
                                    <div class="alert d-none" id="msg_div">
                                        <span id="res_message"></span>
                                    </div>
                                    <div class="modal-body product">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">পন্যের ক্যাটাগরি:</label>
                                            <div class="col-md-9">
                                                <select class="form-control"  name="category" onchange="getsubcatagory(this.value)">
                                                    <option value="">পন্যের ধরন নির্বাচন করুণ</option>
                                                    <?php
                                                    include ('classes/database.php');
                                                    include('classes/catagory.php');
                                                    $object = new catagory();
                                                    $catagorys = $object->getcatagory();
                                                    foreach ($catagorys as $value){ ?>
                                                        <option value="<?=$value?>"><?=$value?></option>
                                                    <?php         }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">পন্যের সাব ক্যাটাগরি:</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="sub_category" name="sub_category" onchange="getcatgoryid(this.value)">
                                                    <option value="">পন্যের সাব ক্যাটাগরি নির্বাচন করুণ</option>
                                                </select>
                                            </div>

                                        </div>

                                        <!-- <div class="form-group row">
                                            <label class="col-md-3 col-form-label">পন্যের একক:</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="unit" name="unit" >
                                                    <option value="">পন্যের একক নির্বাচন করুণ</option>
                                                                                            <option value="1">KG</option>
                                                                                            <option value="2">Piece</option>
                                                                                            <option value="3">Litre</option>
                                                                                    </select>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">পন্যের নাম:</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" onchange="checkduplicateProduct(this.value)"  name="name" id="name" placeholder="পন্যের নাম লিখুন">
                                                <span class="text-danger" id="productname_error" style="display: none">এই পন্যেটি আগে যোগ করা হয়েছে</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">পন্যের বিবরণ:</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" rows="6" name="description" id="description" placeholder="পন্যের বিবরণ"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">পন্যের ছবি:</label>
                                            <div class="col-md-9">

                                                <div class="row" id="picture_input1">
                                                    <div class="child">
                                                        <div class="col-sm-6">
                                                            <input class="form-control-file picture imagesfile" type="file" style="font-size: 12px" name="picture[]" data-pi_no="1" id="pictureDeafult">
                                                        </div>
                                                        <div class="col-md-4" id="preview6">
                                                            <img src="" class="d-none image_preview" id="image_preview" style="height:50px; width:80px; border-radious: 5px; margin-left: 5px">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <button type="button" class="btn btn-sm btn-primary" id="AddPictureInput"> <i class="fa fa-plus"></i> </button>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="picture_inputs"></div>

                                            </div>
                                        </div>
                                        <div class="row product_pictures"></div>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-primary waves-effect waves-light" id="submit_btn">সাবমিট</button>
                                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">বাতিল</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                    </div>
                    <!-- end Modal -->
                </div>
            </div>
            <div class="row searching">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="row">
                            <form action="" id="catagoryBysubcatagory" method="post">

                            <div class="col-sm-3 col-lg-offset-2">
                                <div class="form-group">
                                    <label class="control-label" style="font-family: SutonnyOMJ">ক্যাটাগরি</label>
                                    <select class="form-control" id="filter_category" onchange="getsubcatagory(this.value)" name="filter_category">
                                        <option value="">পন্যের ধরন নির্বাচন করুণ</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label" style="font-family: SutonnyOMJ">সাব ক্যাটাগরি</label>
                                    <select class="form-control" id="filter_sub_category" name="filter_sub_category">
                                        <option value="">পন্যের সাব ক্যাটাগরি নির্বাচন করুণ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary btn-block FilterResult" style="margin-top: 30px;"><i class="fa fa-search"></i></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row table-header">
                <div class="col-md-12">
                    <table id="producttable" class="table table-striped table-bordered" style="width:100%">
                        <thead style="font-family: SutonnyOMJ; font-weight: normal;>
                        <tr role="row">
                        <th width="5%">নং</th>
                        <th width="5%">ছবি</th>
                        <th width="15%">ক্যাটেগরি</th>
                        <th width="15%">সাব-ক্যাটেগরি</th>
                        <th width="10%">পন্যের নাম</th>
                        <th width="10%">তারিখ</th>
                        <th width="20%" align="center">আ্যকশান</th>
                        </tr>

                        </thead>
                    </table>
                </div>
            </div>


        </div>

    </section>



</div>
<!-- main page  -->
<?php include('includes/footer.php')?>




