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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">MQTT Driver</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/mqtt-driver">MQTT Driver</a>
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
                <!-- Start MQTT Contents -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card offset-xl-1 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 mb-5">
                            <div class="card-body border-top">
                                <form class="offset-xl-1" id="insert_mqtt" name="insert_mqtt" action="mqtt-driver/update" method="POST">
                                    {{ csrf_field() }}
                                    @foreach($mqtt_driver_port as $port)
                                    <div class="form-group row">
                                        <label for="Port" class="col-3 col-lg-3 col-form-label text-left">Port</label>
                                        <div class="col-7 col-lg-7">
                                            <select name="VALUE1" id="PORT" class="custom-select" required="required">
                                                <optgroup label="{{$port->VALUE}}">
                                                    <option value="1883">1883</option>
                                                    <option value="8883">8883</option>
                                                    <option value="8884">8884</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    @endforeach

                                    @foreach($mqtt_driver_qos as $qos)
                                    <div class="form-group row">
                                        <label for="QoS" class="col-3 col-lg-3 col-form-label text-left">Quality of Service (QoS)</label>
                                        <div class="col-7 col-lg-7">
                                            <select name="VALUE2" id="QOS" class="custom-select" required="required">
                                                <optgroup label="{{$qos->VALUE}}">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    @endforeach

                                    @foreach($mqtt_driver_clientId as $clientId)
                                    <div class="form-group row">
                                        <label for="ClientID" class="col-3 col-lg-3 col-form-label text-left">ClientId</label>
                                        <div class="col-7 col-lg-7">
                                            <input id="clientId" name="VALUE3" type="text" value="{{$clientId->VALUE}}" required="required" placeholder="ClientId" class="form-control">
                                            <small id="name" class="form-text text-muted">Use: deviceId</small>
                                        </div>
                                    </div>
                                    @endforeach

                                    @foreach($mqtt_driver_username as $username)
                                    <div class="form-group row">
                                        <label for="mqtt-username" class="col-3 col-lg-3 col-form-label text-left">Username</label>
                                        <div class="col-7 col-lg-7">
                                            <input id="mqtt-username" name="VALUE4" type="text" value="{{$username->VALUE}}" required="required" placeholder="Username" class="form-control">
                                            <small id="name" class="form-text text-muted">Use: {iothubhostname}/{device_id}?api-version=2018-06-30</small>
                                        </div>
                                    </div>
                                    @endforeach

                                    @foreach($mqtt_driver_password as $password)
                                    <div class="form-group row">
                                        <label for="mqtt-password" class="col-3 col-lg-3 col-form-label text-left">Password</label>
                                        <div class="col-7 col-lg-7">
                                            <input id="mqtt-password" name="VALUE5" type="text" value="{{$password->VALUE}}" required="required" placeholder="Password" class="form-control">
                                            <small id="name" class="form-text text-muted">Use: SAS token (SharedAccessSignature sig={signature-string}&se={expiry}&sr={URL-encoded-resourceURI})</small>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="form-group row text-right">
                                        <div class="col-7 col-lg-10 offset-sm-1 offset-lg-0">
                                            <button type="submit" class="btn btn-rounded btn-primary">Apply</button>
                                            <a href ="mqtt-driver" class="btn btn-rounded btn-secondary btn-close">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End MQTT Contents -->
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