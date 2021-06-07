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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">OPC UA</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/general-setting/modbus-rtu" class="text-muted">General Setting</a></li>
                                    <li class="breadcrumb-item"><a href="/general-setting/opc-ua" class="text-muted">OPC UA</a></li>
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                        <div class="simple-card">
                            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active border-left-0" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="true">Communication Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab" aria-controls="profile" aria-selected="false">Advanced Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#certificates" role="tab" aria-controls="profile" aria-selected="false">Certificates</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane fade show active" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                    <form>
                                        <div>
                                            <h5>Discovery Service</h5>
                                            <div class="form-group">
                                                <label for="port" class="col-form-label">Discovery URL</label>
                                                <input id="port" type="text" class="col col-lg-5 form-control">
                                            </div>
                                        </div>
                                        <div>
                                            <h5>Server Information</h5>
                                            <div class="form-group">
                                                <label for="snmpv" class="col-form-label">Server Name</label>
                                                <input id="snmpv" type="text" class="col col-lg-5 form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="snmpv" class="col-form-label">Server URL</label>
                                                <input id="snmpv" type="text" class="col col-lg-5 form-control">
                                            </div>
                                        </div>
                                        <div>
                                            <h5>User Authentication</h5>
                                            <div class="form-group">
                                                <label for="snmp-uname" class="col-form-label">Username</label>
                                                <input id="snmp-uname" type="text" class="col col-lg-5 form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="snmp-uname" class="col-form-label">Password</label>
                                                <input id="snmp-uname" type="text" class="col col-lg-5 form-control">
                                            </div>
                                        </div>
                                        <div>
                                            <h5>Security Settings</h5>
                                            <div class="form-group">
                                                <label for="snmp-auth" class="col-form-label">Security Policy</label>
                                                <div>
                                                    <select name="snmp-auth" class="custom-select">
                                                        <option value="auth1">None</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="snmp-vers" class="col-form-label">Message Security Mode</label>
                                                <div>
                                                    <select name="snmp-vers" class="custom-select">
                                                        <option value="enc1">None</option>
                                                    </select>
                                                </div>
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
                                <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                                    <form>
                                        <div>
                                            <h5>Subscription</h5>
                                            <div class="form-group">
                                                <label for="port" class="col-form-label">Publishing Interval</label>
                                                <input id="port" type="text" class="col col-lg-5 form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="snmpv" class="col-form-label">Lifetime Count</label>
                                                <input id="snmpv" type="text" class="col col-lg-5 form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="snmp-uname" class="col-form-label">Maximum Keep-alive Count</label>
                                                <input id="snmp-uname" type="text" class="col col-lg-5 form-control">
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
                                <div class="tab-pane fade" id="certificates" role="tabpanel" aria-labelledby="profile-tab-simple">
                                    <form>
                                        <div>
                                            <h5>File Locations</h5>
                                            <div class="form-group">
                                                <label for="port" class="col-form-label">Client Certificate</label>
                                                <input id="port" type="text" class="col col-lg-5 form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="snmpv" class="col-form-label">Client Private Key</label>
                                                <input id="snmpv" type="text" class="col col-lg-5 form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="snmp-uname" class="col-form-label">Server Certificate</label>
                                                <input id="snmp-uname" type="text" class="col col-lg-5 form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row text-right">
                                            <div class="col offset-sm-1 offset-lg-0">
                                                <button type="submit" class="btn btn-rounded btn-primary">Apply</button>
                                                <button class="btn btn-rounded btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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