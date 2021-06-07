@include('parts/head')

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('parts/header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('parts/sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Modbus TCP</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/general-setting/modbus-rtu" class="text-muted">General Setting</a></li>
                                    <li class="breadcrumb-item"><a href="/general-setting/modbus-tcp" class="text-muted">Modbus TCP</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start Modbus TCP Contents -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body border-top">
                                <form id="form" data-parsley-validate="" novalidate="">
                                    <div class="form-group row">
                                        <label for="ID_Slot" class="col-12 col-lg-2 col-form-label text-sm-left">ID Slot</label>
                                        <div class="col-12 col-sm-4">
                                            <input id="MAIN_IP" name="MAIN_IP" type="text" value="1" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="MAIN_IP" class="col-12 col-lg-2 col-form-label text-left">Main IP</label>
                                        <div class="col-12 col-lg-4">
                                            <input id="MAIN_IP" name="MAIN_IP" type="text" required placeholder="Main IP" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="SECONDARY_IP" class="col-12 col-lg-2 col-form-label text-left">Secondary IP</label>
                                        <div class="col-12 col-lg-4">
                                            <input id="SECONDARY_IP" name="SECONDARY_IP" type="text" required placeholder="Secondary IP" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="PORT" class="col-12 col-lg-2 col-form-label text-left">Port</label>
                                        <div class="col-12 col-lg-4">
                                            <input id="PORT" name="PORT" type="text" required placeholder="Port" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="POOLING_TIME" class="col-12 col-lg-2 col-form-label text-left">Pooling Time</label>
                                        <div class="col-12 col-lg-4">
                                            <input id="POOLING_TIME" name="POOLING_TIME" type="text" required data-parsley-type="mc" placeholder="Pooling Time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="MASTER_CLOCK" class="col-12 col-lg-2 col-form-label text-left">Timeout</label>
                                        <div class="col-12 col-lg-4">
                                            <input id="MASTER_CLOCK" name="MASTER_CLOCK" type="text" required placeholder="Timeout" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row text-right">
                                        <div class="col offset-sm-1 offset-lg-0">
                                            <button type="submit" class="btn btn-space btn-primary">Apply</button>
                                            <button class="btn btn-space btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Modbus TCP -->
                <!-- *************************************************************** -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('parts/footer')
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    @include('parts/java-script')
</body>

</html>