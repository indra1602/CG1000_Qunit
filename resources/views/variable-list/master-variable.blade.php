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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Master Variables</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Variable List</li>
                                    <li class="breadcrumb-item"><a href="/variable-list/master-variable" class="text-muted">Master Variables</a></li>
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
                                    <a class="dropdown-item" href="{{ url('/variable-list/master-variable/download/csv') }}">CSV</a>
                                    <a class="dropdown-item" href="{{ url('/variable-list/master-variable/download/xlsx') }}">XLSX</a>
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
                            <h5 class="card-header-custom">Import CSV / Excel</h5>
                            <div class="card-body border-top">
                                @if(session('error'))
                                    <div class="alert alert-danger">{{session('error')}}</div>
                                @endif
                                <form class="form-horizontal" method="POST" action="{{ url('/variable-list/master-variable/import') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="input-group-prepend">
                                        <div class="custom-file">
                                            <input type="file" accept=".csv,.xlsx" class="custom-file-input" name="import_file" id="import_file">
                                            <label class="custom-file-label" for="import_file">Choose file</label>
                                        </div>
                                        <div class="float-right" style= "margin-left: 5px;">
                                            <button class="btn btn-info" href="javascript:void(0)">Import</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body border-top">
                                <center><h3>MASTER VARIABLE</h3></center>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="master-variable-table" style="color:#000000">
                                        <thead class="bg-custom">
                                            <tr class="border-1" align="center">
                                                <th class="border-1" colspan="4">SLAVE</th>
                                                <th class="border-1" colspan="5">MASTER</th>
                                            </tr>
                                            <tr class="border-1" align="left">
                                                <!-- <th class="border-1">ID Slot</th> -->
                                                <th class="border-1">Variable Name</th>
                                                <th class="border-1">Slot Number</th>
                                                <th class="border-1">Type</th>
                                                <th class="border-1">Address</th>
                                                <th class="border-1">Variable Name</th>
                                                <th class="border-1">Type</th>
                                                <th class="border-1">Address</th>
                                                <!-- <th class="border-1">Value</th> -->
                                                <th class="border-1">Action</th>
                                                <th class="border-1">
                                                    <input type="Checkbox" name="selectMasterAll" class="selectMasterAll">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($MASTER_VARIABLES as $row)
                                            <tr>
                                                <td>{{$row['sv_variable_name']}}</td>
                                                <td>{{$row['sv_id_slot']}}</td>
                                                <td>{{$row['sv_type']}}</td>
                                                <td>{{$row['sv_address']}}</td>
                                                <td>{{$row['ms_variable_name']}}</td>
                                                <td>{{$row['ms_type']}}</td>
                                                <td>{{$row['ms_address']}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false"> Action </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item  add-master"
                                                            href="javascript:void(0)" data-toggle="tooltip"
                                                            data-sv-id-variable="{{ $row->sv_id_variable }}"
                                                            data-sv-id-slave="{{ $row->sv_id_slave }}"
                                                            data-sv-id-slot="{{ $row->sv_id_slot }}"
                                                            data-sv-variable-name="{{ $row->sv_variable_name }}"
                                                            data-original-title="Add" data-ms-variable-name="{{ $row->ms_variable_name }}">Add</a>
                                                            <a class="dropdown-item deleteMasterVariable" href="javascript:void(0)" data-toggle="tooltip" data-ms-id-variable="{{ $row->ms_id_variable }}" data-original-title="Delete">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="master_checkbox[]" class="master_checkbox" value="{{ $row->ms_id_variable }}" />
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="btn-group float-right">
                                        <button type="button" class="btn btn-rounded btn-danger btn-sm dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true"  aria-expanded="false">
                                            Delete
                                        </button>
                                        <div class="dropdown-menu">
                                            <a id="master_bulk_delete" class="dropdown-item"  href="javascript:void(0)">Delete Selected</a>
                                            <a class="dropdown-item deleteAllMasterVariable" href="javascript:void(0)">Delete All</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Master Variable Contents -->
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
    @include('modal/add-master-variable-modal')
    @include('parts/java-script')
</body>

</html>