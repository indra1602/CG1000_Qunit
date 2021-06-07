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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">General Setting</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="general-setting">General Setting</a>
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
                <!-- Start General Setting Contents -->
                <!-- *************************************************************** -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic pills  -->
                    <!-- ============================================================== -->
                    <div class="offset-xl-2 col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12 mb-5">
                        <div class="pills-regular">
                            <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-general-setting" data-toggle="pill" href="#general-setting" role="tab" aria-controls="home" aria-selected="true">General Setting</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="pills-redundancy-setting" data-toggle="pill" href="#redundancy-setting" role="tab" aria-controls="profile" aria-selected="false">Redundancy Setting</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="pills-protocols-setting" data-toggle="pill" href="#protocols-setting" role="tab" aria-controls="profile" aria-selected="false">Protocols Setting</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="general-setting" role="tabpanel" aria-labelledby="pills-general-setting">
                                    <form class="offset-xl-1" action="/general-setting/update" method="POST">
                                    {{ csrf_field() }}
                                    @foreach($HW_SETTING as $HW_SETTING)
                                        <input id="ID" name="ID" type="hidden" value="{{$HW_SETTING->ID}}" required="required" class="form-control">
                                        <div class="form-group row">
                                            <label for="IP_HW" class="col-4 col-lg-4 col-form-label text-left" >IP Hardware</label>
                                            <div class="col-6 col-lg-6">
                                                <input id="IP_HW" name="IP_HW" type="text" value="{{$HW_SETTING->IP_HW}}" required="required" placeholder="IP Hardware" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="SUBNET" class="col-4 col-lg-4 col-form-label text-left" >Subnet</label>
                                            <div class="col-6 col-lg-6">
                                                <input id="SUBNET" name="SUBNET" type="text" value="{{$HW_SETTING->SUBNET}}" required="required" placeholder="Subnet" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="GATEWAY" class="col-4 col-lg-4 col-form-label text-left" >Gateway</label>
                                            <div class="col-6 col-lg-6">
                                                <input id="GATEWAY" name="GATEWAY" type="text" value="{{$HW_SETTING->GATEWAY}}" required="required" placeholder="Gateway" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="HW_NAME" class="col-4 col-lg-4 col-form-label text-left" >Hardware Name</label>
                                            <div class="col-6 col-lg-6">
                                                <input id="HW_NAME" name="HW_NAME" type="text" value="{{$HW_SETTING->HW_NAME}}" required="required" placeholder="Hardware Name" class="form-control">
                                            </div>
                                        </div>
                                        @endforeach
                                        @foreach($DISTINCT_GS as $distgs)
                                        <div class="form-group row">
                                            <label for="IP_MC" class="col-4 col-lg-4 col-form-label text-left" >IP Master Clock</label>
                                            <div class="col-6 col-lg-6">
                                                <input id="IP_MC" name="IP_MC" type="text" value="{{$distgs->IP_MC}}" required="required" placeholder="IP Master Clock" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ROUTER_ID" class="col-4 col-lg-4 col-form-label text-left" >Router ID</label>
                                            <div class="col-6 col-lg-6">
                                                <input id="ROUTER_ID" name="ROUTER_ID" type="text" value="{{$HW_SETTING->ROUTER_ID}}" required="required" placeholder="ROUTER ID" class="form-control">
                                            </div>
                                        </div>
                                        @endforeach
                                        <div>
                                            <small class="form-text text-danger">**Changing the IP address can cause system restart**
                                            </small>
                                        </div>
                                        <div class="form-group row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-10 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-rounded btn-primary">Apply</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="redundancy-setting" role="tabpanel" aria-labelledby="pills-redundancy-setting">
                                    <form class="offset-xl-1" action="/general-setting/update-reduncancy" method="POST">
                                        {{ csrf_field() }}
                                        @foreach($DISTINCT_GS as $distgs)
                                        <div class="form-group row">
                                            <label for="IP_MAIN" class="col-4 col-lg-4 col-form-label text-left">IP Module 1</label>
                                            <div class="col-6 col-lg-6">
                                                <input id="IP_MAIN" name="IP_MAIN" type="text" value="{{$distgs->IP_MAIN}}" required="required" placeholder="IP Main" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="IP_BACKUP" class="col-4 col-lg-4 col-form-label text-left">IP Module 2</label>
                                            <div class="col-6 col-lg-6">
                                                <input id="IP_BACKUP" name="IP_BACKUP" type="text" value="{{$distgs->IP_BACKUP}}" required="required" placeholder="IP Backup" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="IP_REDUNDANT" class="col-4 col-lg-4 col-form-label text-left">IP Redundant</label>
                                            <div class="col-6 col-lg-6">
                                                <input id="IP_REDUNDANT" name="IP_REDUNDANT" type="text" value="{{$distgs->IP_REDUNDANT}}" required="required" placeholder="IP Redundant" class="form-control">
                                            </div>
                                        </div>
                                        <div class="offset-xl-4 form-group row">
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="REDUNDANCY_TYPE" value="1" {{ ($distgs->REDUNDANCY_TYPE=="1")? "checked" : "" }} class="custom-control-input form-control" id="dominant" required>
                                                <span class="custom-control-label">Dominant</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="REDUNDANCY_TYPE" value="0" {{ ($distgs->REDUNDANCY_TYPE=="0")? "checked" : "" }} class="custom-control-input form-control" id="non-dominant" required>
                                                <span class="custom-control-label">Non-Dominant</span>
                                            </label>
                                        </div>
                                        @endforeach
                                        <div>
                                            <small class="form-text text-danger">**Changing the IP address can cause system restart**
                                            </small>
                                        </div>
                                        <div>
                                            <small class="form-text text-danger">**dominant: module 1 as main, non-dominant:  the first starting module as main**</small>
                                        </div>
                                        <div class="form-group row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-10 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-rounded btn-primary" onclick="CobainLink()" 
                                                    >Apply</button>
                                                    <!-- <button class="btn btn-rounded btn-secondary gs-cancel">Cancel</button> -->
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                
                                <div class="tab-pane fade" id="protocols-setting" role="tabpanel" aria-labelledby="pills-protocols-setting">
                                    <form class="offset-xl-1" action="#">
                                        <div class="form-group row">
                                            <label for="MASTER_PROTOCOL" class="col-4 col-sm-4 col-form-label text-left">Master's Protocol</label>
                                            <div class="col-8 col-lg-8">
                                                <select name="MASTER_PROTOCOL" id="MASTER_PROTOCOL" class="selectpicker form-control">
                                                    <option value="" disabled="true" selected="true">=== Master Protocol ===</option>
                                                    @foreach($MASTER_PROTOCOLS as $MASTER_PROTOCOLS)
                                                        <option value="{{$MASTER_PROTOCOLS->ID_MASTER}}">{{$MASTER_PROTOCOLS->NAMES}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="setting-master" name="SETTING_MASTER" id="SETTING_MASTER">
                                                    <a href="#"><i class="fas fa-cog"></i>Protocol Configuration..</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-4 col-sm-4 col-form-label text-sm-left">Slot Number</label>
                                            <div class="col-8 col-lg-8">
                                                <select name="ID_SLOT" id="SLAVE_SLOT" class="selectpicker form-control show-menu-arrow">
                                                    <option value="" disabled="true" selected="true">=== Select Slot ===</option>
                                                    @foreach($GENERAL_SETTING as $gs)
                                                        <option value="{{$gs->ID_SLOT}}">{{$gs->ID_SLOT}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="SLAVE_PROTOCOL" class="col-4 col-sm-4 col-form-label text-left">Slave's Protocol</label>
                                            <div class="col-8 col-lg-8">
                                                <select name="ID_PROTOCOL" id="SLAVE_PROTOCOL" class="selectpicker form-control">
                                                    <option value="0" disabled="disabled" selected="true">=== Slave Protocol ===</option>
                                                    @foreach($SLAVE_PROTOCOLS as $SLAVE_PROTOCOLS)
                                                        <option value="{{$SLAVE_PROTOCOLS->ID_SLAVE}}">{{$SLAVE_PROTOCOLS->NAMES}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="setting-slave" name="SETTING_SLAVE" id="SETTING_SLAVE">
                                                    <a id="SLAVE_MODAL" href="#"><i class="fas fa-cog"></i>Protocol Configuration..</a>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic pills  -->
                    <!-- ============================================================== -->
                    
                    
                </div>
                <!-- *************************************************************** -->
                <!-- End General Setting Contents -->
                <!-- *************************************************************** -->
                <div id="qunit"></div>
                <div id="qunit-fixture"></div>
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
    @include('modal/general-setting-modal')
    @include('parts/java-script')
</body>

</html>