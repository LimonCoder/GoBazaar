<?php include('includes/header.php')?>
<!-- main page  -->
<div class="main-page">
    <!-- main header Start -->
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-sm-6">
                <h1 class="title" style="font-family: SutonnyOMJ">ক্যাটেগরি ও সাব-ক্যাটেগরি</h1>

            </div>
        </div>


    </div>
    <!-- main header  End -->

    <!-- main Section start -->
    <section class="section" style="padding:5px">
        <div class="container-fluid">
            <div class="row main-hader">
                <div class="col-md-9 catagory-header" >
                    <h3 style="font-family: SutonnyOMJ"> ক্যাটেগরি ও সাব-ক্যাটেগরি তালিকা</h3>
                </div>
                <div class="col-md-3" >
                    <button class="btn btn-success" style="float:right;" data-toggle="modal" data-target="#catagorymodal">নতুন যোগ করুন</button>
                    <!-- start Modal -->
                    <div class="modal fade" id="catagorymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content" style="font-family: SutonnyOMJ; font-size: 17px" >
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalScrollableTitle" style="font-family: SutonnyOMJ">পন্য যুক্ত করুন</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </button>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data" id="catagory-form" accept-charset="utf-8" >
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="upazila" class="col-md-4 form-control-label">ক্যাটেগরি</label>
                                            <div class="col-md-7">
                                                <select class="form-control" name="category" id="category" onchange="iconValid()">
                                                    <option value="">সিলেক্ট</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 form-control-label">নাম<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="name" required="" parsley-type="name" class="form-control" name="name" id="name" placeholder="নাম">

                                                <span class="text-danger" id="name_error" style="display: none">উক্ত নাম পূর্বে অন্তর্ভুক্ত আছে</span>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="icongrp">
                                            <label for="icon" class="col-md-4 form-control-label">আইকন নির্বাচন করুন</label>
                                            <div class="col-md-7">
                                                <input id="icon" class="form-control" type="file" name="icon" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sorting" class="col-md-4 form-control-label">সিরিয়াল</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="sorting" id="sorting" placeholder="সিরিয়াল">

                                                <span class="text-danger" id="is_show_error"></span>
                                            </div>
                                            <label for="is_show" class="col-md-3 form-control-label">প্রদর্শিত হবে ?</label>
                                            <div class="col-md-1">
                                                <input type="checkbox" parsley-type="is_show" class="form-control" name="is_show" id="is_show" value="1">

                                                <span class="text-danger" id="is_show_error"></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">সাবমিট</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                    <!-- end Modal -->
                </div>
            </div>
            <div class="row table-header">
                <div class="col-md-12">
                    <table id="catagorytable" class="table table-striped table-bordered" style="width:100%">
                        <thead style="font-family: SutonnyOMJ; font-weight: normal;>
                        <tr role="row">
                            <th width="5%">নং</th>
                            <th width="5%">ছবি</th>
                            <th width="15%">ক্যাটেগরি</th>
                            <th width="15%">সাব-ক্যাটেগরি</th>
                            <th width="10%">সিরিয়াল</th>
                            <th width="10%">স্ট্যাটাস</th>
                            <th width="20%">আ্যকশান</th>
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

<script>
    function iconValid() {

        $(document).ready(function () {
            var Val = $("#category option:selected").val();
            if (Val != ''){
                $("#icongrp").hide();
            }else{
                $("#icongrp").show();
            }

        })
    }
</script>
