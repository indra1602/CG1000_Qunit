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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Modbus RTU</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/general-setting/modbus-rtu" class="text-muted">General Setting</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a href="/general-setting/modbus-rtu" class="text-muted">Modbus RTU</a></li>
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
                <!-- Start Modbus RTU Contents -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body border-top">
                                <form id="modbus-rtu-form" action="/general-setting/modbus-rtu/add" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label for="SERIAL_TYPE" class="col-4 col-sm-2 col-form-label text-left">Serial Type</label>
                                        <div class="col-6 col-lg-4">
                                            <select name="SERIAL_TYPE" id="SERIAL_TYPE" class="custom-select form-control">
                                                <option value="">==== Serial Type ====</option>
                                                <option value="RS232">RS232</option>
                                                <option value="RS485">RS485</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="PORT_MODBUS_RTU" class="col-4 col-sm-2 col-form-label text-left">Port</label>
                                        <div class="col-6 col-lg-4">
                                            <select name="PORT_MODBUS_RTU" id="PORT_MODBUS_RTU" class="custom-select form-control PORT_RTU">
                                                <option value="">==== Port ====</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="BAUD_RATE" class="col-4 col-sm-2 col-form-label text-left">Baud Rate</label>
                                        <div class="col-6 col-lg-4">
                                            <select name="BAUD_RATE" id="BAUD_RATE" class="custom-select form-control">
                                                <option value="">==== Baud Rate ====</option>
                                                <option value="1200">1200</option>
                                                <option value="2400">2400</option>
                                                <option value="4800">4800</option>
                                                <option value="9600">9600</option>
                                                <option value="38400">38400</option>
                                                <option value="57600">57600</option>
                                                <option value="115200">115200</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="PARITY" class="col-4 col-sm-2 col-form-label text-left">Parity</label>
                                        <div class="col-6 col-lg-4">
                                            <select name="PARITY" id="PARITY" class="custom-select form-control">
                                                <option value="">==== Parity ====</option>
                                                <option value="NONE">NONE</option>
                                                <option value="EVEN">EVEN</option>
                                                <option value="ODD">ODD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="DATA_BITS" class="col-4 col-sm-2 col-form-label text-left">Data Bits</label>
                                        <div class="col-6 col-lg-4">
                                            <select name="DATA_BITS" id="DATA_BITS" class="custom-select form-control">
                                                <option value="">==== Data Bits ====</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="STOP_BITS" class="col-4 col-sm-2 col-form-label text-left">Stop Bits</label>
                                        <div class="col-6 col-lg-4">
                                            <select name="STOP_BITS" id="STOP_BITS" class="custom-select form-control">
                                                <option value="">==== Stop Bits ====</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row text-right">
                                        <div class="col offset-sm-1 offset-lg-0">
                                            <button type="submit" class="btn btn-rounded btn-primary">Apply</button>
                                            <a href="/general-setting/modbus-rtu" class="btn btn-rounded btn-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Modbus RTU -->
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