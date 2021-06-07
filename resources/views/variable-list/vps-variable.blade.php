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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">LEN VPS Variables</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Variable List</li>
                                    <li class="breadcrumb-item"><a href="/variable-list/opc-variable" class="text-muted">Master Variables</a></li>
                                    <li class="breadcrumb-item"><a href="/variable-list/opc-variable" class="text-muted">Len VPS Variables</a></li>
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
                                    <a class="dropdown-item" value="0" name="btnCSV" href="{{ url('/variable-list/vps-variable/download/csv') }}">CSV</a>
                                    <a class="dropdown-item" value="1" name="btnXLSX" href="{{ url('/variable-list/vps-variable/download/xlsx') }}">XLSX</a>
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
                <!-- Start Master Variable Contents -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Len VPS Variable</h5>
                            <div class="card-body border-top">
                                @if(session('error'))
                                    <div class="alert alert-danger">{{session('error')}}</div>
                                @endif
                                <form class="form-horizontal" method="POST" action="{{ url('/variable-list/vps-variable/import') }}" enctype="multipart/form-data">
                                    <h5 class="name-title">Import CSV</h5></label>
                                    {{ csrf_field() }}

                                    <input type="file" id="import_file" name="import_file" size="100" class="form-control" required style="padding-right: 3px; padding-bottom: 3px; padding-left: 3px; padding-top: 3px;">
                                    <br/>
                                    <button class="btn btn-rounded btn-primary float-right">Import</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body border-top">
                                <center><h5>LEN VPS VARIABLE DATA</h5></center>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="vps-variable-table" name="vps-variable-table">
                                        <thead class="bg-light" align="left">
                                            <tr class="border-1">
                                                <th class="border-1">SLOT</th>
                                                <th class="border-1">NAME</th>
                                                <th class="border-1">TYPE</th>
                                                <th class="border-1">ADDRESS</th>
                                                <th class="border-1">ACCESS</th>
                                                <th class="border-1">VALUE</th>
                                                <th class="border-1">ACTION</th>
                                                <th class="border-1" style="width: 150px;">
                                                    <input type="Checkbox" name="selectVpsAll" class="selectVpsAll">
                                                    <button type="button" name="iec_bulk_delete" id="iec_bulk_delete" class="iec_bulk_delete btn btn-rounded btn-danger btn-sm">Delete Selected</button>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Master Variable Contents -->
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
    @include('modal/modal-iec-variable')
    @include('parts/java-script')
</body>
</html>