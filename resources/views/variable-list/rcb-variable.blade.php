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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">IEC RCBs Variables</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Variable List</li>
                                    <li class="breadcrumb-item"><a href="/variable-list/rcb-variable" class="text-muted">Slave Variables</a></li>
                                    <li class="breadcrumb-item"><a href="/variable-list/rcb-variable" class="text-muted">IEC RCBs Variables</a></li>
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
                                    <a class="dropdown-item" href="{{ url('/variable-list/rcb-variable/download/csv') }}">CSV</a>
                                    <a class="dropdown-item" href="{{ url('/variable-list/rcb-variable/download/xlsx') }}">XLSX</a>
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
                                <form class="form-horizontal" method="POST" action="{{ url('/variable-list/rcb-variable/import') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="input-group-prepend">
                                        <div class="custom-file">
                                            <input type="file" accept=".csv,.xlsx" class="custom-file-input" name="import_file" id="import_file">
                                            <label class="custom-file-label" for="import_file">Choose file</label>
                                        </div>
                                        <div class="float-right" style= "margin-left: 5px;">
                                            <button class="btn btn-info" href="javascript:void(0)">
                                                Import
                                            </button>
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
                                <center><h3>IEC RCBs VARIABLE DATA</h3></center>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="rcb-variable-table" name="rcb-variable-table" style="color:#000000">
                                        <thead class="bg-custom" align="left">
                                            <tr class="border-1">
                                                <th class="border-1">Slot Number</th>
                                                <th class="border-1">Variable Name</th>
                                                <th class="border-1">Type</th>
                                                <th class="border-1">Address</th>
                                                <th class="border-1">Access</th>
                                                <th class="border-1">Action</th>
                                                <th class="border-1">
                                                    <input type="Checkbox" name="selectRcbAll" class="selectRcbAll">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($RCB_VARIABLES as $row)
                                            <tr>
                                                <td>{{$row['ID_SLOT']}}</td>
                                                <td>{{$row['VARIABLE_NAME']}}</td>
                                                <td>{{$row['TYPE']}}</td>
                                                <td>{{$row['ADDRESS']}}</td>
                                                @if($row['ACCESS'] == 1)
                                                <td>{{"Read/Write"}}</td>
                                                @else
                                                <td>{{"Read"}}</td>
                                                @endif
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="{{ $row->ID_VARIABLE }}" 
                                                            data-id-slave="{{ $row->ID_SLAVE }}" data-id-slot="{{ $row->ID_SLOT }}" data-variable-name="{{ $row->VARIABLE_NAME }}" 
                                                            data-type="{{ $row->TYPE }}"
                                                            data-address="{{ $row->ADDRESS }}"
                                                            data-access="{{ $row->ACCESS }}"
                                                            data-original-title="Modify">Modify</a>
                                                            <a class="dropdown-item deleteRcbVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="{{ $row->ID_VARIABLE }}" data-original-title="Delete">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="rcb_checkbox[] " class="rcb_checkbox" value="{{$row->ID_VARIABLE}}"/>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="btn-group float-right">
                                        <button type="button" class="btn btn-rounded btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Delete
                                        </button>
                                        <div class="dropdown-menu">
                                            <a id="rcb_bulk_delete" class="dropdown-item"  href="javascript:void(0)">Delete Selected</a>
                                            <a class="dropdown-item deleteAllRcbVariable" href="javascript:void(0)">Delete All</a>
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
    @include('modal/modal-rcb-variable')
    @include('parts/java-script')
</body>

</html>