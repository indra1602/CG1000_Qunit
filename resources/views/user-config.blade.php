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
            <!-- =========================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- =========================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Change Password</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/user-config" class="text-muted">Change Password</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =========================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- =========================================================== -->
            <!-- =========================================================== -->
            <!-- Container fluid  -->
            <!-- =========================================================== -->
            <div class="container-fluid">
                <!-- ******************************************************* -->
                <!-- Start Master Variable Contents -->
                <!-- ******************************************************* -->
                <div class="row">
                    <div class="col-12">
                        <div class="card offset-xl-2 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-6">
                            <div class="card-body border-top">
                                <form class="offset-xl-2" id="changePassword" name="changePassword">
                                    {{ csrf_field() }}
                                    @foreach($DATA_USER as $DU)
                                    <div class="form-group">
                                        <input id="edit_id_user" name="edit_id_user" type="hidden" required="required" readonly value="{{$DU->id}}" class="col col-lg-10 form-control">  
                                        <label for="username" class="col-form-label">Username</label>
                                        <input id="edit_username" name="edit_username" type="text" required="required" readonly value="{{$DU->username}}" class="col col-lg-10 form-control">
                                    </div>
                                    @endforeach
                                    <div class="form-group">
                                        <label for="new-password" class="col-form-label">New Password</label>
                                        <input id="edit_NewPassword" name="edit_NewPassword" type="text" required="required" minlength="6" class="col col-lg-10 form-control" placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password"  class="col-form-label">Confirm New Password</label>
                                        <input id="edit_password" name="edit_password" type="text" required="required" minlength="6" class="col col-lg-10 form-control" placeholder="Confirm New Password">
                                    </div>
                                    <div class="form-group row text-right">
                                        <div class="col col-lg-10">
                                            <button type="submit" class="btn btn-rounded btn-primary updatePassword">Apply</button>
                                            <a href ="/home" class="btn  btn-rounded btn-secondary  btn-close">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ******************************************************* -->
                <!-- End Master Variable Contents -->
                <!-- ******************************************************* -->
                <div id="qunit"></div>
                <div id="qunit-fixture"></div>
            </div>
            <!-- =========================================================== -->
            <!-- End Container fluid  -->
            <!-- =========================================================== -->
            <!-- =========================================================== -->
            <!-- footer -->
            <!-- =========================================================== -->
            @include('parts/footer')
            <!-- =========================================================== -->
            <!-- End footer -->
            <!-- =========================================================== -->
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
    @include('modal/change-password-modal')
    @include('parts/java-script')
</body>
</html>