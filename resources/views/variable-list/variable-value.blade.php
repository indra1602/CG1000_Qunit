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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Variable Values</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Variable List</li>
                                    <li class="breadcrumb-item"><a href="/variable-list/variable-value" class="text-muted">Variable Values</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <div class="dropdown show">
                                <a class="btn btn-rounded btn-lg dropdown-toggle bg-white border-0 custom-shadow custom-radius" href="#" role="button" id="downloadMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Download
                                    <span><i data-feather="chevron-down"class="svg-icon"></i></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="downloadMenu">
                                    <a class="dropdown-item" href="{{ url('/variable-list/variable-value/download/csv') }}">CSV</a>
                                    <a class="dropdown-item" href="{{ url('/variable-list/variable-value/download/xlsx') }}">XLSX</a>
                                </div>
                            </div>
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
                <!-- Start Variable Value Contents -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body border-top">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="check-variable-value-table" style="color:#000000">
                                        <thead class="bg-light" align="center">
                                            <tr class="border-1">
                                                <th class="border-1" colspan="3">SLAVE</th>
                                                <th class="border-1" colspan="3">MASTER</th>
                                                <th class="border-1" rowspan="2">Value</th>
                                            </tr>
                                            <tr class="border-1">
                                                <th class="border-1">Name</th>
                                                <th class="border-1">Type</th>
                                                <th class="border-1">Address</th>
                                                <th class="border-1">Name</th>
                                                <th class="border-1">Type</th>
                                                <th class="border-1">Address</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="row pt-2 pt-sm-5 mt-1">
                                    <div class="col-sm-12 pl-0">
                                        <p class="text-right">
                                            <a href="/variable-list/variable-value" class="btn btn-rounded btn-primary">Refresh</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Variable Value Contents -->
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