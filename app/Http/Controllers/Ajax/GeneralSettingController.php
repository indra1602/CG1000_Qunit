<?php
namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettingModel;
use App\Models\SlaveConfigModel;
use App\Models\SlaveProtocolsModel;

class GeneralSettingController extends Controller
{
    // set data tcp
    public function setTcp()
    {

        $arr = [];

        $ID_SLOT = $_GET['idSlot'];
        $ID_SLAVE_TCP = $_GET['idSlave'];

        $IP_ADDRESS = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'IP Address'], ['ID_SLAVE', $ID_SLAVE_TCP]])->value('VALUE');
        // $IP_ADDRESS = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'IP Address']])->value('VALUE');
        $ID_SLAVE = SlaveConfigModel::select('ID_SLAVE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'IP Address']])->value('ID_SLAVE');
        // $NAME_SLAVE = SlaveProtocolsModel::select('NAMES')->where('ID_SLAVE', $ID_SLAVE)->get('NAMES');
        $SECOND_IP = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Second IP']])->value('VALUE');
        $PORT = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Port']])->value('VALUE');
        $POOLING_TIME = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Pooling Time']])->value('VALUE');
        $TIMEOUT = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Timeout']])->value('VALUE');

        array_push($arr, $IP_ADDRESS, $ID_SLAVE, $SECOND_IP, $PORT, $POOLING_TIME, $TIMEOUT);

        return json_encode($arr);
    }

    //set data RTU
    public function setRtu()
    {

        $arr = [];

        $ID_SLOT = $_GET['idSlot'];
        $ID_SLAVE = $_GET['idSlave'];

        $SERIAL_TYPE = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Serial Type']])->value('VALUE');
        $ID_SLAVE = SlaveConfigModel::select('ID_SLAVE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Serial Type']])->value('ID_SLAVE');
        // $NAME_SLAVE = SlaveProtocolsModel::select('NAMES')->where('ID_SLAVE', $ID_SLAVE)->get('NAMES');
        $Port = SlaveConfigModel::select('VALUE')->where([['ID_SLAVE', $ID_SLAVE], ['CONFIG_ITEM', '=', 'Port']])->value('VALUE');
        $BAUD_RATE = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Baud Rate']])->value('VALUE');
        $PARITY = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Parity']])->value('VALUE');
        $DATA_BITS = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Data Bits']])->value('VALUE');
        $STOP_BITS = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Stop Bits']])->value('VALUE');

        array_push($arr, $SERIAL_TYPE, $ID_SLAVE, $Port, $BAUD_RATE, $PARITY, $DATA_BITS, $STOP_BITS);

        return json_encode($arr);
    }

    // set data tcp
    public function setIec()
    {

        $arr = [];

        $ID_SLOT = $_GET['idSlot'];
        $ID_SLAVE_IEC = $_GET['idSlave'];

        $IP_ADDRESS_IEC = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'IP Address'], ['ID_SLAVE', $ID_SLAVE_IEC]])->value('VALUE');
        $ID_SLAVE_IEC = SlaveConfigModel::select('ID_SLAVE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'IP Address'], ['ID_SLAVE', $ID_SLAVE_IEC]])->value('ID_SLAVE');
        $SECOND_IP_IEC = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Second IP'], ['ID_SLAVE', $ID_SLAVE_IEC]])->value('VALUE');
        $PORT_IEC = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Port'], ['ID_SLAVE', $ID_SLAVE_IEC]])->value('VALUE');
        $POOLING_TIME_IEC = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Pooling Time'], ['ID_SLAVE', $ID_SLAVE_IEC]])->value('VALUE');
        $TIMEOUT_IEC = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Timeout'], ['ID_SLAVE', $ID_SLAVE_IEC]])->value('VALUE');

        array_push($arr, $IP_ADDRESS_IEC, $ID_SLAVE_IEC, $SECOND_IP_IEC, $PORT_IEC, $POOLING_TIME_IEC, $TIMEOUT_IEC);

        return json_encode($arr);
    }

    //update ajax
    public function updateTcp()
    {

        $arr = [];

        $idSlot = $_GET['idSlot'];
        $idSlave = $_GET['idSlave'];
        $mainIp = $_GET['mainIp'];
        $secIp = $_GET['secIp'];
        $port = $_GET['port'];
        $pooling = $_GET['pooling'];
        $timeout = $_GET['timeout'];

        array_push($arr, $idSlot, $idSlave, $mainIp, $secIp, $port, $pooling, $timeout);

        $updateMainIp = SlaveConfigModel::where([['ID_SLOT', $idSlot], ['ID_SLAVE', $idSlave], ['CONFIG_ITEM', '=', 'IP Address']])->update(['VALUE' => $mainIp]);
        $updateSecIp = SlaveConfigModel::where([['ID_SLOT', $idSlot], ['ID_SLAVE', $idSlave], ['CONFIG_ITEM', '=', 'Second IP']])->update(['VALUE' => $secIp]);
        $updatePort = SlaveConfigModel::where([['ID_SLOT', $idSlot], ['ID_SLAVE', $idSlave], ['CONFIG_ITEM', '=', 'Port']])->update(['VALUE' => $port]);
        $updatePooling = SlaveConfigModel::where([['ID_SLOT', $idSlot], ['ID_SLAVE', $idSlave], ['CONFIG_ITEM', '=', 'Pooling Time']])->update(['VALUE' => $pooling]);
        $updateTimeout = SlaveConfigModel::where([['ID_SLOT', $idSlot], ['ID_SLAVE', $idSlave], ['CONFIG_ITEM', '=', 'Timeout']])->update(['VALUE' => $timeout]);

        return json_encode(1);
    }

    public function updateRtu()
    {
        $arr = [];

        $slaveSlot = $_GET['slaveSlot'];
        $slaveProtocol = $_GET['slaveProtocol'];
        $serialType = $_GET['serialType'];
        $portRtu = $_GET['portRtu'];
        $baudRate = $_GET['baudRate'];
        $parity = $_GET['parity'];
        $dataBits = $_GET['dataBits'];
        $stopBits = $_GET['stopBits'];

        array_push($arr, $slaveSlot, $slaveProtocol, $serialType, $portRtu, $baudRate, $parity, $dataBits, $stopBits);

        $update_serial_type = SlaveConfigModel::where([['ID_SLOT', $slaveSlot], ['ID_SLAVE', $slaveProtocol], ['CONFIG_ITEM', '=', 'Serial Type']])->update(['VALUE' => $serialType]);
        $update_port_rtu = SlaveConfigModel::where([['ID_SLOT', $slaveSlot], ['ID_SLAVE', $slaveProtocol], ['CONFIG_ITEM', '=', 'Port']])->update(['VALUE' => $portRtu]);
        $update_baud_rate = SlaveConfigModel::where([['ID_SLOT', $slaveSlot], ['ID_SLAVE', $slaveProtocol], ['CONFIG_ITEM', '=', 'Baud Rate']])->update(['VALUE' => $baudRate]);
        $update_parity = SlaveConfigModel::where([['ID_SLOT', $slaveSlot], ['ID_SLAVE', $slaveProtocol], ['CONFIG_ITEM', '=', 'Parity']])->update(['VALUE' => $parity]);
        $update_data_bits = SlaveConfigModel::where([['ID_SLOT', $slaveSlot], ['ID_SLAVE', $slaveProtocol], ['CONFIG_ITEM', '=', 'Data Bits']])->update(['VALUE' => $dataBits]);
        $update_stop_bits = SlaveConfigModel::where([['ID_SLOT', $slaveSlot], ['ID_SLAVE', $slaveProtocol], ['CONFIG_ITEM', '=', 'Stop Bits']])->update(['VALUE' => $stopBits]);

        return json_encode(1);
    }

    //update ajax
    public function updateIec()
    {

        $arr = [];

        $idSlotIec = $_GET['idSlotIec'];
        $idSlaveIec = $_GET['idSlaveIec'];
        $mainIpIec = $_GET['mainIpIec'];
        $secIpIec = $_GET['secIpIec'];
        $portIec = $_GET['portIec'];
        $poolingIec = $_GET['poolingIec'];
        $timeoutIec = $_GET['timeoutIec'];

        array_push($arr, $idSlotIec, $idSlaveIec, $mainIpIec, $secIpIec, $portIec, $poolingIec, $timeoutIec);

        $update_main_ip_iec = SlaveConfigModel::where([['ID_SLOT', $idSlotIec], ['ID_SLAVE', $idSlaveIec], ['CONFIG_ITEM', '=', 'IP Address']])->update(['VALUE' => $mainIpIec]);
        $update_sec_ip_iec = SlaveConfigModel::where([['ID_SLOT', $idSlotIec], ['ID_SLAVE', $idSlaveIec], ['CONFIG_ITEM', '=', 'Second IP']])->update(['VALUE' => $secIpIec]);
        $update_port_iec = SlaveConfigModel::where([['ID_SLOT', $idSlotIec], ['ID_SLAVE', $idSlaveIec], ['CONFIG_ITEM', '=', 'Port']])->update(['VALUE' => $portIec]);
        $update_pooling_iec = SlaveConfigModel::where([['ID_SLOT', $idSlotIec], ['ID_SLAVE', $idSlaveIec], ['CONFIG_ITEM', '=', 'Pooling Time']])->update(['VALUE' => $poolingIec]);
        $update_timeout_iec = SlaveConfigModel::where([['ID_SLOT', $idSlotIec], ['ID_SLAVE', $idSlaveIec], ['CONFIG_ITEM', '=', 'Timeout']])->update(['VALUE' => $timeoutIec]);

        return json_encode(1);
    }

    //nampilin_ke_modal
    public function nampilin()
    {
        $id = $_GET['id'];

        $slave_status = GeneralSettingModel::select('ACTIVE')->where('ID_SLOT', $id)->value('ACTIVE');

        return json_encode($slave_status);
    }
}
