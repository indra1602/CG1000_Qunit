<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\GeneralSettingModel;
use App\Models\HardwareSettingModel;
use App\Models\MasterConfigModel;
use App\Models\MasterProtocolsModel;
use App\Models\MasterVariableModel;
use App\Models\SlaveConfigModel;
use App\Models\SlaveModel;
use App\Models\SlaveProtocolsModel;
use App\Models\StatusModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //----------------------------------------//
        //--------------- HARDWARE ---------------//
        //----------------------------------------//

        // take data from table HARDWARE_SETTING
        $DATA_USER = DB::SELECT('SELECT*FROM users');
        $HW_SETTING = HardwareSettingModel::get();

        //show from table STATUS
        //Hardware Status
        $CPU_TEMP = StatusModel::where('ITEM', '=', 'CPU_TEMP')->value('VALUE');
        $BATTERY_TEMP = StatusModel::where('ITEM', '=', 'Battery_Temp')
            ->value('VALUE');
        $POWER_STATUS = StatusModel::where('ITEM', '=', 'Power_Status')
            ->value('VALUE');
        if (
            ($BATTERY_TEMP >= 0 && $BATTERY_TEMP <= 55)
            && ($POWER_STATUS == "0")
        ) {
            $ECHO_HARDWARE_STATUS = "Normal";
            $ECHO_BATTERY_TEMP = "<span class='badge badge-success badge-pill'>$BATTERY_TEMP&deg; Celcius</span>";
            $ECHO_POWER_STATUS = 'class="card-body bg-success"';
            $ECHO_DETAIL_POWER_STATUS = '<span class="badge badge-success badge-pill">ON AC</span>';
        } elseif (
            ($BATTERY_TEMP >= 0 && $BATTERY_TEMP <= 55)
            && ($POWER_STATUS == "1")
        ) {
            $ECHO_HARDWARE_STATUS = "Warning";
            $ECHO_BATTERY_TEMP = "<span class='badge badge-success badge-pill'>$BATTERY_TEMP&deg; Celcius</span>";
            $ECHO_POWER_STATUS = 'class="card-body bg-warning"';
            $ECHO_DETAIL_POWER_STATUS = '<span class="badge badge-danger badge-pill">ON BATTERY</span>';
        } elseif (
            ($BATTERY_TEMP > 55 && $BATTERY_TEMP <= 70)
            && ($POWER_STATUS == "0")
        ) {
            $ECHO_HARDWARE_STATUS = "Warning";
            $ECHO_BATTERY_TEMP = "<span class='badge badge-warning badge-pill'>$BATTERY_TEMP&deg; Celcius</span>";
            $ECHO_POWER_STATUS = 'class="card-body bg-warning"';
            $ECHO_DETAIL_POWER_STATUS = '<span class="badge badge-success badge-pill">ON AC</span>';
        } elseif (
            ($BATTERY_TEMP > 55 && $BATTERY_TEMP <= 70)
            && ($POWER_STATUS == "1")
        ) {
            $ECHO_HARDWARE_STATUS = "Warning";
            $ECHO_BATTERY_TEMP = "<span class='badge badge-warning badge-pill'>$BATTERY_TEMP&deg; Celcius</span>";
            $ECHO_POWER_STATUS = 'class="card-body bg-warning"';
            $ECHO_DETAIL_POWER_STATUS = '<span class="badge badge-danger badge-pill">ON BATTERY</span>';
        } elseif (
            ($BATTERY_TEMP > 70)
            && ($POWER_STATUS == "0")
        ) {
            $ECHO_HARDWARE_STATUS = "Alarm";
            $ECHO_BATTERY_TEMP = "<span class='badge badge-danger badge-pill'>$BATTERY_TEMP&deg; Celcius</span>";
            $ECHO_POWER_STATUS = 'class="card-body bg-red"';
            $ECHO_DETAIL_POWER_STATUS = '<span class="badge badge-success badge-pill">ON AC</span>';
        } elseif (
            ($BATTERY_TEMP > 70) 
            && ($POWER_STATUS == "1")
        ) {
            $ECHO_HARDWARE_STATUS = "Alarm";
            $ECHO_BATTERY_TEMP = "<span class='badge badge-danger badge-pill'>$BATTERY_TEMP&deg; Celcius</span>";
            $ECHO_POWER_STATUS = 'class="card-body bg-red"';
            $ECHO_DETAIL_POWER_STATUS = '<span class="badge badge-danger badge-pill">ON BATTERY</span>';
        }
        //----------------------------------------//
        //------------ END HARDWARE --------------//
        //----------------------------------------//

        //----------------------------------------//
        //-------------- REDUNDANCY --------------//
        //----------------------------------------//
        $DISTINCT_GS = GeneralSettingModel::DISTINCT()
            ->get([
                'IP_REDUNDANT',
                'IP_MC',
                'IP_MAIN',
                'IP_BACKUP',
                'REDUNDANCY_TYPE',
            ]);
        foreach ($DISTINCT_GS as $REDUNDANT => $REDUNDANT_STATUS) {
            $REDUNDANCY_TYPE = $REDUNDANT_STATUS->REDUNDANCY_TYPE;
        }
        if ($REDUNDANCY_TYPE == 0) {
            $REDUNDANCY_TYPE = "Non-Dominant";
        } elseif ($REDUNDANCY_TYPE == 1) {
            $REDUNDANCY_TYPE = "Dominant";
        }
        $KEEPALIVED_STATUS = StatusModel::where('ITEM', 'Keepalived_Status')->value('VALUE');
        $FIRMWARE_STATUS = StatusModel::where('ITEM', 'Firmware_Status')->value('VALUE');
        $DB_REPLICATION_STATUS = StatusModel::where('ITEM', 'DB_Replication_Status')->value('VALUE');
        $REDUNDANCY_COMM = StatusModel::where('ITEM', 'Redundancy_Comm')->value('VALUE');
        if (
            ($KEEPALIVED_STATUS == "1")
            && ($FIRMWARE_STATUS == "1")
            && ($DB_REPLICATION_STATUS == "1")
            && ($REDUNDANCY_COMM == "1")
        ) {
            $ECHO_REDUNDANCY_STATUS =
                '<div class="card-body bg-success">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="redundant_show">
                                <h5 class="text-dark mb-1 font-weight-medium">Redundancy</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Ready</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><i data-feather="check-circle"></i></span>
                    </div>
                </div>
            </div>';
            $ECHO_DETAIL_REDUNDANCY_STATUS = '<span class="badge badge-success badge-pill">Ready</span>';
        } else {
            $ECHO_REDUNDANCY_STATUS =
                '<div class="card-body bg-red">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="redundant_show">
                                <h5 class="text-dark mb-1 font-weight-medium">Redundancy</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Not-Ready</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><i data-feather="x-circle"></i></span>
                    </div>
                </div>
            </div>';
            $ECHO_DETAIL_REDUNDANCY_STATUS = '<span class="badge badge-danger badge-pill">Not_Ready</span>';
        }
        //----------------------------------------//
        //------------ END REDUNDANCY ------------//
        //----------------------------------------//

        //----------------------------------------//
        //----------------- SNMP -----------------//
        //----------------------------------------//
        $SNMP_DRIVER = StatusModel::where('ITEM', '=', 'SNMP_Driver')
            ->value('VALUE');
        if ($SNMP_DRIVER == "0") {
            $SNMP_DRIVER = "Disconnected";
            $ECHO_SNMP_DRIVER =
                '<div class="card-body bg-red">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="snmp_show">
                                <h5 class="text-dark mb-1 font-weight-medium">SNMP Driver</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Disconnected</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><i data-feather="x-circle"></i></span>
                    </div>
                </div>
            </div>';
            $ECHO_DETAIL_SNMP_DRIVER = '<span class="badge badge-danger badge-pill">Disconnected</span>';
        } elseif ($SNMP_DRIVER == "1") {
            $SNMP_DRIVER = "Connected";
            $ECHO_SNMP_DRIVER =
                '<div class="card-body bg-success">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="snmp_show">
                                <h5 class="text-dark mb-1 font-weight-medium">SNMP Driver</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Connected</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><i data-feather="check-circle"></i></span>
                    </div>
                </div>
            </div>';
            $ECHO_DETAIL_SNMP_DRIVER = "<span class='badge badge-success badge-pill'>Connected</span>";
        }
        //----------------------------------------//
        //--------------- END SNMP ---------------//
        //----------------------------------------//

        //----------------------------------------//
        //------------- MASTER CLOCK -------------//
        //----------------------------------------//

        $MC_STATUS = StatusModel::where('ITEM', '=', 'MC_Status')
            ->value('VALUE');
        if ($MC_STATUS == "0") {
            $MC_STATUS = "Disconnected";
            $ECHO_MC_STATUS =
                '<div class="card-body bg-red">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="mc_show">
                                <h5 class="text-dark mb-1 font-weight-medium">Master Clock</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Disconnected</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><i data-feather="x-circle"></i></span>
                    </div>
                </div>
            </div>';
            $ECHO_DETAIL_MC_STATUS = "<span class='badge badge-danger badge-pill'>Disconnected</span>";
        } elseif ($MC_STATUS == "1") {
            $MC_STATUS = "Connected";
            $ECHO_MC_STATUS =
                '<div class="card-body bg-success">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="mc_show">
                                <h5 class="text-dark mb-1 font-weight-medium">Master Clock</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Connected</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><i data-feather="check-circle"></i></span>
                    </div>
                </div>
            </div>';
            $ECHO_DETAIL_MC_STATUS = "<span class='badge badge-success badge-pill'>Connected</span>";
        }

        //----------------------------------------//
        //----------- END MASTER CLOCK -----------//
        //----------------------------------------//

        //----------------------------------------//
        //---------------- MASTER ----------------//
        //----------------------------------------//

        //show from table MASTER_PROTOCOLS
        $MASTER_PROTOCOLS = MasterProtocolsModel::get();

        $MASTER_STATUS = StatusModel::where('ITEM', '=', 'Master_Status')
            ->value('VALUE');
        if ($MASTER_STATUS == "0") {
            $MASTER_STATUS = "Disconnected";
            $ECHO_MASTER_STATUS =
                '<div class="card-body bg-red">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="master_show">
                                <h5 class="text-dark mb-1 font-weight-medium">Master Protocol</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Disconnected</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><i data-feather="x-circle"></i></span>
                    </div>
                </div>
            </div>';
            $ECHO_DETAIL_MASTER_STATUS = "<span class='badge badge-danger badge-pill'>Disconnected</span>";
        } elseif ($MASTER_STATUS == "1") {
            $MASTER_STATUS = "Connected";
            $ECHO_MASTER_STATUS =
                '<div class="card-body bg-success">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <a class="stretched-link" id="master_show">
                                <h5 class="text-dark mb-1 font-weight-medium">Master Protocol</h5>
                            </a>
                        </div>
                        <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Connected</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-white"><i data-feather="check-circle"></i></span>
                    </div>
                </div>
            </div>';
            $ECHO_DETAIL_MASTER_STATUS = "<span class='badge badge-success badge-pill'>Connected</span>";
        }
        $ID_MASTER = GeneralSettingModel::value('ID_MASTER');

        $NAMES_MASTER = MasterProtocolsModel::where('ID_MASTER', $ID_MASTER)->value('NAMES');
        

        $PORT_MASTER = MasterConfigModel::where([['ID_MASTER', $ID_MASTER], ['CONFIG_ITEM', 'Port']])
            ->value('VALUE');

        $MASTER_TOTAL_VARIABLES = MasterVariableModel::count();
        //----------------------------------------//
        //-------------- END MASTER --------------//
        //----------------------------------------//

        //----------------------------------------//
        //----------------- SLAVE ----------------//
        //----------------------------------------//

        //show from table SLAVE_CONFIG
        $SLAVE_CONFIG = SlaveConfigModel::get();

        //show from table SLAVE_PROTOCOLS and GENERAL_SETTING
        $SLAVE_PROTOCOLS = GeneralSettingModel::join('SLAVE_PROTOCOLS', 'GENERAL_SETTING.ID_SLAVE', '=', 'SLAVE_PROTOCOLS.ID_SLAVE')
            ->select('GENERAL_SETTING.ID_SLOT', 'SLAVE_PROTOCOLS.NAMES', 'GENERAL_SETTING.ID_SLAVE', 'GENERAL_SETTING.ACTIVE')->orderBy('ID_SLOT')->get();

        $VALUE_SLAVE_STATUS = StatusModel::select('VALUE')
            ->where('ITEM', 'like', '%' . "Slave_Status" . '%')
            ->get();
        $SLAVE_STATUS = array();
        foreach ($VALUE_SLAVE_STATUS as $val => $VALUES_SLAVE) {
            $VALUES = $VALUES_SLAVE->VALUE;
            if ($VALUES == "1") {
                $VALUES = "Connected";
            } elseif ($VALUES == "0") {
                $VALUES = "Disconnected";
            }
            array_push($SLAVE_STATUS, $VALUES);
        }

        //IP WHEN SLAVE_ID=1
        $SLAVE_1_IP_1 = SlaveConfigModel::
            where([
            ['CONFIG_ITEM', 'IP Address'],
            ['ID_SLOT', '1'],
            ['ID_SLAVE', '1'],
        ])->value('VALUE');
        $SLAVE_1_IP_2 = SlaveConfigModel::
            where([
            ['CONFIG_ITEM', 'IP Address'],
            ['ID_SLOT', '2'],
            ['ID_SLAVE', '1'],
        ])->value('VALUE');
        $SLAVE_1_IP_3 = SlaveConfigModel::
            where([
            ['CONFIG_ITEM', 'IP Address'],
            ['ID_SLOT', '3'],
            ['ID_SLAVE', '1'],
        ])->value('VALUE');
        $SLAVE_1_IP_4 = SlaveConfigModel::
            where([
            ['CONFIG_ITEM', 'IP Address'],
            ['ID_SLOT', '4'],
            ['ID_SLAVE', '1'],
        ])->value('VALUE');
        $SLAVE_1_IP = [];
        $SLAVE_1_IP = [$SLAVE_1_IP_1, $SLAVE_1_IP_2, $SLAVE_1_IP_3, $SLAVE_1_IP_4];

        //IP WHEN SLAVE_ID=2
        $SLAVE_2_IP_1 = SlaveConfigModel::
            where([
            ['CONFIG_ITEM', 'IP Address'],
            ['ID_SLOT', '1'],
            ['ID_SLAVE', '2'],
        ])->value('VALUE');
        $SLAVE_2_IP_2 = SlaveConfigModel::
            where([
            ['CONFIG_ITEM', 'IP Address'],
            ['ID_SLOT', '2'],
            ['ID_SLAVE', '2'],
        ])->value('VALUE');
        $SLAVE_2_IP_3 = SlaveConfigModel::
            where([
            ['CONFIG_ITEM', 'IP Address'],
            ['ID_SLOT', '3'],
            ['ID_SLAVE', '2'],
        ])->value('VALUE');
        $SLAVE_2_IP_4 = SlaveConfigModel::
            where([
            ['CONFIG_ITEM', 'IP Address'],
            ['ID_SLOT', '4'],
            ['ID_SLAVE', '2'],
        ])->value('VALUE');
        $SLAVE_2_IP = [];
        $SLAVE_2_IP = [$SLAVE_2_IP_1, $SLAVE_2_IP_2, $SLAVE_2_IP_3, $SLAVE_2_IP_4];

        // ip slave 3
        $SLAVE_3_IP_1 = SlaveConfigModel::
            where([
            ['CONFIG_ITEM', 'IP Address'],
            ['ID_SLOT', '1'],
            ['ID_SLAVE', '3'],
        ])->value('VALUE');
        $SLAVE_3_IP_2 = SlaveConfigModel::
            where([
            ['CONFIG_ITEM', 'IP Address'],
            ['ID_SLOT', '2'],
            ['ID_SLAVE', '3'],
        ])->value('VALUE');
        $SLAVE_3_IP_3 = SlaveConfigModel::
            where([
            ['CONFIG_ITEM', 'IP Address'],
            ['ID_SLOT', '3'],
            ['ID_SLAVE', '3'],
        ])->value('VALUE');
        $SLAVE_3_IP_4 = SlaveConfigModel::
            where([
            ['CONFIG_ITEM', 'IP Address'],
            ['ID_SLOT', '4'],
            ['ID_SLAVE', '3'],
        ])->value('VALUE');
        $SLAVE_3_IP = [];
        $SLAVE_3_IP = [$SLAVE_3_IP_1, $SLAVE_3_IP_2, $SLAVE_3_IP_3, $SLAVE_3_IP_4];

        //Serial Type
        $SERIAL_1 = SlaveConfigModel::where([
            ['CONFIG_ITEM', 'Serial Type'],
            ['ID_SLOT', '1'],
        ])->value('VALUE');
        $SERIAL_2 = SlaveConfigModel::where([
            ['CONFIG_ITEM', 'Serial Type'],
            ['ID_SLOT', '2'],
        ])->value('VALUE');
        $SERIAL_3 = SlaveConfigModel::where([
            ['CONFIG_ITEM', 'Serial Type'],
            ['ID_SLOT', '3'],
        ])->value('VALUE');
        $SERIAL_4 = SlaveConfigModel::where([
            ['CONFIG_ITEM', 'Serial Type'],
            ['ID_SLOT', '4'],
        ])->value('VALUE');
        $SERIAL_SLOT = [];
        $SERIAL_SLOT = [$SERIAL_1, $SERIAL_2, $SERIAL_3, $SERIAL_4];

        // Total Variable
        $SLAVE_1_TOTAL_VARIABLES_1 = SlaveModel::where([
            ['ID_SLOT', '1'],
            ['ID_SLAVE', '1'],
        ])->count();
        $SLAVE_1_TOTAL_VARIABLES_2 = SlaveModel::where([
            ['ID_SLOT', '2'],
            ['ID_SLAVE', '1'],
        ])->count();
        $SLAVE_1_TOTAL_VARIABLES_3 = SlaveModel::where([
            ['ID_SLOT', '3'],
            ['ID_SLAVE', '1'],
        ])->count();
        $SLAVE_1_TOTAL_VARIABLES_4 = SlaveModel::where([
            ['ID_SLOT', '4'],
            ['ID_SLAVE', '1'],
        ])->count();
        $SLAVE_1_TOTAL_VARIABLES = [];
        $SLAVE_1_TOTAL_VARIABLES = [$SLAVE_1_TOTAL_VARIABLES_1, $SLAVE_1_TOTAL_VARIABLES_2, $SLAVE_1_TOTAL_VARIABLES_3, $SLAVE_1_TOTAL_VARIABLES_4];

        $SLAVE_2_TOTAL_VARIABLES_1 = SlaveModel::where([
            ['ID_SLOT', '1'],
            ['ID_SLAVE', '2'],
        ])->count();
        $SLAVE_2_TOTAL_VARIABLES_2 = SlaveModel::where([
            ['ID_SLOT', '2'],
            ['ID_SLAVE', '2'],
        ])->count();
        $SLAVE_2_TOTAL_VARIABLES_3 = SlaveModel::where([
            ['ID_SLOT', '3'],
            ['ID_SLAVE', '2'],
        ])->count();
        $SLAVE_2_TOTAL_VARIABLES_4 = SlaveModel::where([
            ['ID_SLOT', '4'],
            ['ID_SLAVE', '2'],
        ])->count();
        $SLAVE_2_TOTAL_VARIABLES = [];
        $SLAVE_2_TOTAL_VARIABLES = [$SLAVE_2_TOTAL_VARIABLES_1, $SLAVE_2_TOTAL_VARIABLES_2, $SLAVE_2_TOTAL_VARIABLES_3, $SLAVE_2_TOTAL_VARIABLES_4];

        $SLAVE_3_TOTAL_VARIABLES_1 = SlaveModel::where([
            ['ID_SLOT', '1'],
            ['ID_SLAVE', '3'],
        ])->count();
        $SLAVE_3_TOTAL_VARIABLES_2 = SlaveModel::where([
            ['ID_SLOT', '2'],
            ['ID_SLAVE', '3'],
        ])->count();
        $SLAVE_3_TOTAL_VARIABLES_3 = SlaveModel::where([
            ['ID_SLOT', '3'],
            ['ID_SLAVE', '3'],
        ])->count();
        $SLAVE_3_TOTAL_VARIABLES_4 = SlaveModel::where([
            ['ID_SLOT', '4'],
            ['ID_SLAVE', '3'],
        ])->count();
        $SLAVE_3_TOTAL_VARIABLES = [];
        $SLAVE_3_TOTAL_VARIABLES = [$SLAVE_3_TOTAL_VARIABLES_1, $SLAVE_3_TOTAL_VARIABLES_2, $SLAVE_3_TOTAL_VARIABLES_3, $SLAVE_3_TOTAL_VARIABLES_4];

        //----------------------------------------//
        //--------------- END SLAVE --------------//
        //----------------------------------------//

        $PROTOCOL_SETTING = SlaveProtocolsModel::get();

        return view('home',
            [
                //HARDWARE
                'HW_SETTING' => $HW_SETTING,
                'DISTINCT_GS' => $DISTINCT_GS,
                // 'CPU_TEMP' => $CPU_TEMP,
                // 'ECHO_CPU_TEMP' => $ECHO_CPU_TEMP,
                'BATTERY_TEMP' => $BATTERY_TEMP,
                'ECHO_BATTERY_TEMP' => $ECHO_BATTERY_TEMP,
                'ECHO_POWER_STATUS' => $ECHO_POWER_STATUS,
                'ECHO_DETAIL_POWER_STATUS' => $ECHO_DETAIL_POWER_STATUS,
                'ECHO_HARDWARE_STATUS' => $ECHO_HARDWARE_STATUS,
                //REDUNDANCY
                'REDUNDANCY_TYPE' => $REDUNDANCY_TYPE,
                'KEEPALIVED_STATUS' => $KEEPALIVED_STATUS,
                'FIRMWARE_STATUS'=> $FIRMWARE_STATUS,
                'DB_REPLICATION_STATUS' => $DB_REPLICATION_STATUS,
                'REDUNDANCY_COMM' => $REDUNDANCY_COMM,
                'ECHO_REDUNDANCY_STATUS' => $ECHO_REDUNDANCY_STATUS,
                'ECHO_DETAIL_REDUNDANCY_STATUS' => $ECHO_DETAIL_REDUNDANCY_STATUS,
                //SNMP
                'SNMP_DRIVER' => $SNMP_DRIVER,
                'ECHO_SNMP_DRIVER' => $ECHO_SNMP_DRIVER,
                'ECHO_DETAIL_SNMP_DRIVER' => $ECHO_DETAIL_SNMP_DRIVER,
                //MASTER_CLOCK
                'MC_STATUS' => $MC_STATUS,
                'ECHO_MC_STATUS' => $ECHO_MC_STATUS,
                'ECHO_MASTER_STATUS' => $ECHO_MASTER_STATUS,
                'ECHO_DETAIL_MC_STATUS' => $ECHO_DETAIL_MC_STATUS,
                //MASTER
                'MASTER_PROTOCOLS' => $MASTER_PROTOCOLS,
                'MASTER_STATUS' => $MASTER_STATUS,
                'ECHO_DETAIL_MASTER_STATUS' => $ECHO_DETAIL_MASTER_STATUS,
                'NAMES_MASTER' => $NAMES_MASTER,
                'ID_MASTER'=>$ID_MASTER,
                'PORT_MASTER' => $PORT_MASTER,
                'MASTER_TOTAL_VARIABLES' => $MASTER_TOTAL_VARIABLES,
                //PROTOCOL
                'PROTOCOL_SETTING' => $PROTOCOL_SETTING,
                //SLAVE
                'SLAVE_PROTOCOLS' => $SLAVE_PROTOCOLS,
                'SLAVE_CONFIG' => $SLAVE_CONFIG,
                'SLAVE_STATUS' => $SLAVE_STATUS,
                'SLAVE_STATUS' => $SLAVE_STATUS,
                'SLAVE_1_IP' => $SLAVE_1_IP,
                'SLAVE_2_IP' => $SLAVE_2_IP,
                'SLAVE_3_IP' => $SLAVE_3_IP,
                'SERIAL_SLOT' => $SERIAL_SLOT,
                'SLAVE_1_TOTAL_VARIABLES' => $SLAVE_1_TOTAL_VARIABLES,
                'SLAVE_2_TOTAL_VARIABLES' => $SLAVE_2_TOTAL_VARIABLES,
                'SLAVE_3_TOTAL_VARIABLES' => $SLAVE_3_TOTAL_VARIABLES,

                'DATA_USER' => $DATA_USER,
            ]);
        return json_encode(1);
    }

    //--------------------------------------------------------//
    //--------------- Start Update Status Slave --------------//
    //--------------------------------------------------------//
    public function updateStatus()
    {
        $arr = [];

        $slave_slot = $_GET['slaveSlot'];
        $status_slave = $_GET['active'];
        $protocol_slave = $_GET['protocols'];

        array_push($arr, $slave_slot, $status_slave, $protocol_slave);

        $update_status_slave = GeneralSettingModel::where('ID_SLOT', $slave_slot)
            ->update([
                'ACTIVE' => $status_slave,
                'ID_SLAVE' => $protocol_slave,
            ]);

        return json_encode(1);
    }
    //------------------------------------------------------//
    //--------------- END Update Status Slave --------------//
    //------------------------------------------------------//
}
