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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Modbus Variables</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Variable List</li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Slave Variables</a></li>
                                    <li class="breadcrumb-item"><a href="/variable-list/slave-variable" class="text-muted">Modbus Variables</a></li>
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
                                    <a class="dropdown-item" href="{{ url('/variable-list/slave-variable/download/csv') }}">CSV</a>
                                    <a class="dropdown-item" href="{{ url('/variable-list/slave-variable/download/xlsx') }}">XLSX</a>
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
                <!-- Start Slave Variable Contents -->
                <!-- *************************************************************** -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- start accordions  -->
                    <!-- ============================================================== -->
                    <div class="col-lg-6">
                        <div id="accordion" class="custom-accordion mb-4">
                            <div class="card mb-0">
                                <div class="card-header-custom" id="headingOne">
                                    <h5 class="m-0">
                                        <a style="color:#ffffff;" class="custom-accordion-title collapsed d-block pt-2 pb-2"
                                            data-toggle="collapse" href="#manually-generated" aria-expanded="false"
                                            aria-controls="manually-generated">
                                            Manually Generated <span class="float-right">
                                                <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                            </span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="manually-generated" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body border-top">
                                        <form class="offset-xl-1" id="sv-manual-generate" name="sv-manual-generate" action="slave-variable/manual-generate" method="POST">
                                        {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-form-label text-sm-left">Slave's Protocol</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <select name="ID_SLAVE" class="custom-select">
                                                        <option value="1">MODBUS TCP CLIENT</option>
                                                        <option value="2">MODBUS RTU MASTER</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-form-label text-sm-left">Slot Number</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <select name="ID_SLOT" class="custom-select">
                                                    @foreach($GENERAL_SETTING as $gs)
                                                        <option value="{{$gs->ID_SLOT}}">{{$gs->ID_SLOT}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-form-label text-sm-left">Variable Name</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input id="VARIABLE_NAME" name="VARIABLE_NAME" type="text" required="required" placeholder="Variable Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-form-label text-sm-left">Type</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <select name="TYPE" class="custom-select">
                                                        <option value="COIL">COIL</option>
                                                        <option value="DISCRETE_INPUT">DISCRETE_INPUT</option>
                                                        <option value="INPUT_REGISTER">INPUT_REGISTER</option>
                                                        <option value="HOLDING">HOLDING</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-form-label text-sm-left">Address</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input id="ADDRESS" name="ADDRESS" type="text" required placeholder="Address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row text-right">
                                                <div class="col-lg-10" style="margin-top: 30px;">
                                                    <button type="submit" class="btn btn-rounded btn-primary">Generate</button>
                                                    <a href ="/variable-list/slave-variable" class="btn btn-rounded btn-secondary btn-close">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end custom accordions-->
                    </div>
                    <div class="col-lg-6">
                        <div id="accordion2" class="custom-accordion mb-4">
                            <div class="card mb-0">
                                <div class="card-header-custom" id="headingTwo">
                                    <h5 class="m-0">
                                        <a style="color:#ffffff;" class="custom-accordion-title collapsed d-block pt-2 pb-2"
                                            data-toggle="collapse" href="#auto-generated" aria-expanded="false"
                                            aria-controls="auto-generated">
                                            Auto Generated <span class="float-right"><i
                                            class="mdi mdi-chevron-down accordion-arrow"></i></span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="auto-generated" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion2">
                                    <div class="card-body border-top">
                                        <form class="offset-xl-1" id="sv-auto-generate" name="sv-auto-generate" action="slave-variable/auto-generate" method="POST">
                                        {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-form-label text-sm-left">Slave's Protocol</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <select name="ID_SLAVE" class="custom-select">
                                                        <option value="1">MODBUS TCP CLIENT</option>
                                                        <option value="2">MODBUS RTU MASTER</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-form-label text-sm-left">Slot Number</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <select name="ID_SLOT" class="custom-select">
                                                    @foreach($GENERAL_SETTING as $gs)
                                                        <option value="{{$gs->ID_SLOT}}">{{$gs->ID_SLOT}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-form-label text-sm-left">Type</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <select name="TYPE" class="custom-select">
                                                        <option value="COIL">COIL</option>
                                                        <option value="DISCRETE_INPUT">DISCRETE_INPUT</option>
                                                        <option value="INPUT_REGISTER">INPUT_REGISTER</option>
                                                        <option value="HOLDING">HOLDING</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-form-label text-sm-left">Address</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <div class="form-group row" style="margin-bottom: 7px;">
                                                        <small style="padding-top: 7px;padding-bottom: 7px;" class="col-8 col-sm-6 col-lg-3" id="start_help" class="form-text text-dark">Start From</small>
                                            
                                                        <input id="START" name="START" type="number" required="" placeholder="Start" class="col-lg-6 form-control">
                                                    </div>
                                                    <div class="form-group row" style="margin-bottom: 0px;">
                                                        <small style="padding-top: 7px;padding-bottom: 7px; " class="col-8 col-sm-6 col-lg-3"  id="end_help" class="form-text text-dark">Stop</small>
                                                        
                                                        <input id="END" name="END" type="number" required="" placeholder="End" class="col-lg-6 form-control">
                                                    </div>
                                                        <small class="form-text text-danger" >Minimum value of start is 1, and maximum value of stop is 9999</small>
                                                </div>
                                            </div>
                                            <div class="form-group row text-right">
                                                <div class="col-lg-10">
                                                    <button type="submit" class="btn btn-rounded btn-primary">Generate</button>
                                                    <a href ="/variable-list/slave-variable" class="btn btn-rounded btn-secondary btn-close">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end custom accordions-->
                    </div>
                    <!-- ============================================================== -->
                    <!-- end accordions  -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- Table Variable -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header-custom" style = "background-color:#0b5ea3; color:#ffffff">Import CSV / Excel</h5>
                            <div class="card-body border-top">
                                <div>
                                    <form class="form-group" enctype="multipart/form-data" method="POST" action="{{ url('/variable-list/slave-variable/import') }}">
                                    {{ csrf_field() }} 
                                        <div class="input-group-prepend">
                                            <div class="custom-file">
                                                <input type="file" accept=".csv,.xlsx" class="custom-file-input" name="import_file" id="import_file">
                                                <label class="custom-file-label" for="import_file">Choose file</label>
                                            </div>
                                            <div class="float-right" style= "margin-left: 5px;">
                                                <button class="btn btn-info" href="javascript:void(0)">Import
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-body border-top">
                            <center><h3 class="name-title">MODBUS'S VARIABLE DATA</h3></center>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="slave-variable-table" name="slave-variable-table" style="color:#000000;">
                                        <thead class="bg-custom" align="left">
                                            <tr class="border-1">
                                                <th class="border-1">Slave's Protocol</th>
                                                <th class="border-1">Variable Name</th>
                                                <th class="border-1">Slot Number</th>
                                                <th class="border-1">Type</th>
                                                <th class="border-1">Address</th>
                                                <th class="border-1">Access</th>
                                                <!-- <th class="border-1">Value</th> -->
                                                <th class="border-1">Action</th>
                                                <th class="border-1">
                                                    <input type="Checkbox" name="selectSlaveAll" class="selectSlaveAll">
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($SLAVE_VARIABLES as $row)
                                            <tr>
                                                @if($row['ID_SLAVE'] == 1)
                                                <td>{{"MODBUS TCP Client"}}</td>
                                                @elseif($row['ID_SLAVE'] == 2)
                                                <td>{{"MODBUS RTU Master"}}</td>
                                                @elseif($row['ID_SLAVE'] == 3)
                                                <td>{{"IEC 61850"}}</td>
                                                @endif
                                                <td>{{$row['VARIABLE_NAME']}}</td>
                                                <td>{{$row['ID_SLOT']}}</td>
                                                <td>{{$row['TYPE']}}</td>
                                                <td>{{$row['ADDRESS']}}</td>
                                                @if($row['ACCESS'] == 1)
                                                <td>{{"Read/Write"}}</td>
                                                @else
                                                <td>{{"Read"}}</td>
                                                @endif
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle btn-rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="{{$row->ID_VARIABLE }}" data-id-slave="{{$row->ID_SLAVE}}" data-id-slot="{{$row->ID_SLOT}}" data-variable-name="{{$row->VARIABLE_NAME}}" data-type="{{$row->TYPE}}" data-address="{{$row->ADDRESS}}" data-access="{{$row->ACCESS}}" data-original-title="Modify">Modify</a>
                                                            <a class="dropdown-item deleteSlaveVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="{{$row->ID_VARIABLE}}" data-original-title="Delete">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="slave_checkbox[]" class="slave_checkbox" value="{{$row->ID_VARIABLE}}" />
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tbody>
                                    </table>
                                    <br>
                                    <div class="btn-group float-right">
                                        <button type="button" class="btn btn-rounded btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Delete
                                        </button>
                                        <div class="dropdown-menu">
                                            <a id="bulk_delete" class="dropdown-item"  href="javascript:void(0)">Delete Selected</a>
                                            <a class="dropdown-item deleteAllSlaveVariable" href="javascript:void(0)">Delete All</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end table variable  -->
                    <!-- ============================================================== -->
                </div>
                <!-- *************************************************************** -->
                <!-- End Slave Variable Contents -->
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
    @include('modal/modify-slave-variable-modal')
    @include('parts/java-script')
</body>

</html>