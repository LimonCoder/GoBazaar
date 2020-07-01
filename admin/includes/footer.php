        </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
        <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/pace/pace.min.js"></script>
        <script src="assets/js/lobipanel/lobipanel.min.js"></script>
        <script src="assets/js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="assets/js/prism/prism.js"></script>
        <script src="assets/js/waypoint/waypoints.min.js"></script>
        <script src="assets/js/amcharts/amcharts.js"></script>
        <script src="assets/js/amcharts/serial.js"></script>
        <script src="assets/js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="assets/js/amcharts/themes/light.js"></script>
        <script src="assets/js/toastr/toastr.min.js"></script>
        <script src="assets/js/icheck/icheck.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- ========== THEME JS ========== -->

        <script src="assets/js/production-chart.js"></script>
        <script src="assets/js/traffic-chart.js"></script>
        <script src="assets/js/task-list.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/main.js"></script>


        <script>


            $(function(){
                var currentUrl = window.location.href;
                var basePage = currentUrl.split('/'); // split string on comma space
                if (basePage[4] == "dashboard.php"){
                    // Welcome notification
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "3000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["success"]( "সফলভাবে লগইন হয়েছে !!");
                }



          });
      </script>
  </body>

  
    </html>