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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">SNMP Driver</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="snmp-driver">SNMP Driver</a>
                                    </li>
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
                <!-- Start SNMP Driver Contents -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card offset-xl-2 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-6">
                            <div class="card-body border-top">
                                <form class="offset-xl-2" id="update_snmp" name="update_snmp" action="snmp-driver/update" method="POST">
                                    {{ csrf_field() }}
                                    
                                    @foreach($snmp_driver_ver as $sdv)
                                    <div class="form-group">
                                        <!-- <input id="CONFIG_ITEM1" name="CONFIG_ITEM1" type="hidden" value="Version" required="required"> -->
                                        <label for="snmp-ver" class="col-form-label">SNMP Version</label>
                                        <input id="snmp-ver" name="VALUE1" type="text" required="required" readonly value="{{$sdv->VALUE}}" class="col col-lg-10 form-control">
                                    </div>
                                    @endforeach
                                    @foreach($snmp_driver_port as $sdp)
                                    <div class="form-group">
                                        <!-- <input id="CONFIG_ITEM2" name="CONFIG_ITEM2" type="hidden" value="Port" required="required"> -->
                                        <label for="snmp-port" class="col-form-label">Port</label>
                                        <input id="snmp-port" name="VALUE2" type="text" value="{{$sdp->VALUE}}" required="required" class="col col-lg-10 form-control">
                                    </div>
                                    @endforeach
                                    @foreach($snmp_driver_username as $sdu)
                                    <div class="form-group">
                                        <!-- <input id="CONFIG_ITEM3" name="CONFIG_ITEM3" type="hidden" value="Username" required="required">  -->
                                        <label for="snmp-uname" class="col-form-label">SNMPv2 Username</label>
                                        <input id="snmp-uname" name="VALUE3" type="text" value="{{$sdu->VALUE}}" required="required" class="col col-lg-10 form-control">
                                    </div>
                                    @endforeach
                                    <div class="form-group row text-right">
                                        <div class="col col-lg-10">
                                            <button type="submit" class="btn btn-rounded btn-primary">Apply</button>
                                            <!-- <a href ="/snmp-driver" class="btn btn-rounded btn-secondary btn-close">Cancel</a> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End SNMP Driver -->
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