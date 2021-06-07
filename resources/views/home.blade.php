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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Dashboard</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="home">Dashboard</a>
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
                <!-- Start First Line General Status  -->
                <!-- *************************************************************** -->
                <div class="card-group">
                    <div class="card border-right">
                        <div <?php echo "$ECHO_POWER_STATUS";?>>
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <a class="stretched-link" id="hardware_show">
                                            <h5 class="text-dark mb-1 font-weight-medium">Hardware</h5>
                                        </a>
                                    </div>
                                    <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate"><?php echo "$ECHO_HARDWARE_STATUS"; ?></h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-white"><i data-feather="monitor"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <?php
                            echo "$ECHO_REDUNDANCY_STATUS";
                        ?>
                    </div>
                    <div class="card border-right">
                        <?php
                            echo "$ECHO_SNMP_DRIVER";
                        ?>
                    </div>
                    <div class="card border-right">
                        <?php
                            echo "$ECHO_MC_STATUS";
                        ?>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End First Line General Status -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Second Line General Status -->
                <!-- *************************************************************** -->
                <div class="card-group">
                    <div class="card border-right">
                        <?php
                            echo "$ECHO_MASTER_STATUS";
                        ?>
                    </div>
                    @foreach ($SLAVE_PROTOCOLS as $SLV)
                    <div class="card border-right">
                        <?php
                            $SLOT= $SLV->ID_SLOT;
                            $ACTIVED = $SLV->ACTIVE;
                            $i=$SLOT-1;
                            if(($SLAVE_STATUS[$i]=="Connected")&&($ACTIVED=='1')) {
                                echo
                                '<div class="card-body bg-success">
                                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <a class="stretched-link" id="slave_show_'.$SLOT.'">
                                                    <h5 class="text-dark mb-1 font-weight-medium">Slave Protocol</h5>
                                                </a>
                                            </div>
                                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Slot '.$SLOT.'</h6>
                                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Connected</h6>
                                        </div>
                                        <div class="ml-auto mt-md-3 mt-lg-0">
                                            <span class="opacity-7 text-white"><i data-feather="check-circle"></i></span>
                                        </div>
                                    </div>
                                </div>';
                            } else if(($SLAVE_STATUS[$i]=="Disconnected")&&($ACTIVED=='1')) {
                                echo
                                '<div class="card-body bg-red">
                                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <a class="stretched-link" id="slave_show_'.$SLOT.'">
                                                    <h5 class="text-dark mb-1 font-weight-medium">Slave Protocol</h5>
                                                </a>
                                            </div>
                                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Slot '.$SLOT.'</h6>
                                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Disconnected</h6>
                                        </div>
                                        <div class="ml-auto mt-md-3 mt-lg-0">
                                            <span class="opacity-7 text-white"><i data-feather="x-circle"></i></span>
                                        </div>
                                    </div>
                                </div>';
                            }
                            if(($SLAVE_STATUS[$i]=="Connected")&&($ACTIVED=='0')) {
                                echo
                                '<div class="card-body bg-dark">
                                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <a class="stretched-link" id="slave_show_'.$SLOT.'">
                                                    <h5 class="text-dark mb-1 font-weight-medium">Slave Protocol</h5>
                                                </a>
                                            </div>
                                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Slot '.$SLOT.'</h6>
                                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Disabled</h6>
                                        </div>
                                    </div>
                                </div>';
                            } else if(($SLAVE_STATUS[$i]=="Disconnected")&&($ACTIVED=='0')) {
                                echo
                                '<div class="card-body bg-dark">
                                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <a class="stretched-link" id="slave_show_'.$SLOT.'">
                                                    <h5 class="text-dark mb-1 font-weight-medium">Slave Protocol</h5>
                                                </a>
                                            </div>
                                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Slot '.$SLOT.'</h6>
                                            <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Disabled</h6>
                                        </div>
                                    </div>
                                </div>';
                            }
                        ?>
                    </div>
                    @endforeach
                </div>
                <!-- *************************************************************** -->
                <!-- End Second Line General Status -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Home Contents -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card" id="HARDWARE_DISPLAY">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">HARDWARE</h4>
                                </div>
                                <div class="tab-content">
                                @foreach($HW_SETTING as $HW)
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Name
                                            <span>{{$HW->HW_NAME}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            IP
                                            <span>{{$HW->IP_HW}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Subnet
                                            <span>{{$HW->SUBNET}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Gateway
                                            <span>{{$HW->GATEWAY}}</span>
                                        </li>
                                    @endforeach
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Battery Temperature
                                            <?php
                                                echo "$ECHO_BATTERY_TEMP";
                                            ?>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Power Status
                                            <?php
                                                echo "$ECHO_DETAIL_POWER_STATUS";
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="REDUNDANT_DISPLAY">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">REDUNDANCY</h4>
                                </div>
                                @foreach($DISTINCT_GS as $redundancy)
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        IP Main
                                        <span>{{$redundancy->IP_MAIN}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        IP Backup
                                        <span>{{$redundancy->IP_BACKUP}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        IP Redundant
                                        <span>{{$redundancy->IP_REDUNDANT}}</span>
                                    </li>
                                @endforeach
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Redundancy Type
                                        <span>{{$REDUNDANCY_TYPE}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Status
                                        <?php
                                            echo "$ECHO_DETAIL_REDUNDANCY_STATUS";
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card" id="SNMP_CLOUD_DISPLAY">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">SNMP DRIVER</h4>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                    SNMP Driver
                                        <?php
                                            echo"$ECHO_DETAIL_SNMP_DRIVER";
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card" id="MC_DISPLAY">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">MASTER CLOCK</h4>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        IP
                                        @foreach($DISTINCT_GS as $IP_MC)
                                            <span>{{$IP_MC->IP_MC}}</span>
                                        @endforeach
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Status
                                        <?php
                                            echo"$ECHO_DETAIL_MC_STATUS";
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card" id="MASTER_DISPLAY">
                            <div class="card-body">
                                <div class = "list-group">
                                    <h4 class="card-title list-group-item d-flex justify-content-between align-items-center mb-4" style="border: 0px;" >MASTER PROTOCOL
                                    </h4>
                                </div>
                                <span id="trgdrpdwn"></span>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Driver Protocol
                                            <span>{{$NAMES_MASTER}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Status
                                        <?php
                                            echo"$ECHO_DETAIL_MASTER_STATUS";
                                        ?>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Port
                                        <span>{{$PORT_MASTER}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Total Variables
                                        <span>{{$MASTER_TOTAL_VARIABLES}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        @foreach ($SLAVE_PROTOCOLS as $SLAVE_PROTOCOLS)
                        <?php
                            $NAMES = $SLAVE_PROTOCOLS->NAMES;
                            if ($NAMES == "MODBUS TCP Client" or $NAMES == "IEC 61850" ) {
                                $PROTOCOLS = "IP";
                            } else {
                                $PROTOCOLS = "Serial Type";
                            }

                            $ACTIVES = $SLAVE_PROTOCOLS->ACTIVE;
                            if ($ACTIVES == "1"){
                                $STATUS = "Enabled";
                            } else {
                                $STATUS = "Disabled";
                            }
                        ?>
                        <div class="card" id="SLAVE_DISPLAY_{{$SLAVE_PROTOCOLS->ID_SLOT}}">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">SLAVE PROTOCOL</h4>
                                </div>
                                <div class="list-group">
                                    <h5 class="list-group-item d-flex justify-content-between align-items-center" style="border: 0px;padding-left: 0px;padding-right: 0px;">SLOT {{$SLAVE_PROTOCOLS->ID_SLOT}} 
                                        <span class="setting-status" name="SETTING_STATUS" id="SETTING_STATUS">
                                            <a id="nampilin_modal_{{$SLAVE_PROTOCOLS->ID_SLOT}}" data-toggle="modal" data-id="{{$SLAVE_PROTOCOLS->ID_SLOT}}" href="#slaveStatusConf">{{$STATUS}}</a>
                                        </span>
                                    </h5>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Driver Protocol
                                        <span>
                                            <?php
                                                echo "$NAMES";
                                            ?>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Status
                                        <span>
                                            <?php
                                                $SLOT= $SLAVE_PROTOCOLS->ID_SLOT;
                                                $i=$SLOT-1;
                                                if($SLAVE_STATUS[$i]=="Connected") {
                                                    echo "<span class='badge badge-success badge-pill'>Connected</span>";
                                                } else if($SLAVE_STATUS[$i]=="Disconnected") {
                                                    echo "<span class='badge badge-danger badge-pill'>Disconnected</span>";
                                                }
                                            ?>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{$PROTOCOLS}}
                                        <span>
                                        <?php
                                            $SLOT= $SLAVE_PROTOCOLS->ID_SLOT;
                                            $j=$SLOT-1;
                                            $ID_SLAVE= $SLAVE_PROTOCOLS->ID_SLAVE;
                                            if($ID_SLAVE==1) {
                                                echo "$SLAVE_1_IP[$j]";
                                            }else if($ID_SLAVE==2) {
                                                echo "$SERIAL_SLOT[$j]";
                                            }else if($ID_SLAVE==3) {
                                                echo "$SLAVE_3_IP[$j]";
                                            }
                                        ?>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Total Variable
                                        <span>
                                        <?php
                                            $SLOT= $SLAVE_PROTOCOLS->ID_SLOT;
                                            $k=$SLOT-1;
                                            $ID_SLAVE= $SLAVE_PROTOCOLS->ID_SLAVE;
                                            if($ID_SLAVE==1) {
                                                echo "$SLAVE_1_TOTAL_VARIABLES[$k]";
                                            } else if($ID_SLAVE==2) {
                                                echo "$SLAVE_2_TOTAL_VARIABLES[$k]";
                                            }else if($ID_SLAVE==3) {
                                                echo "$SLAVE_3_TOTAL_VARIABLES[$k]";
                                            }
                                        ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Home Contents -->
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
    @include('modal/moda')
    @include('parts/java-script')
</body>

</html>
