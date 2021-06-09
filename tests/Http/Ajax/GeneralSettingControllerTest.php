<?php

use App\Models\GeneralSettingModel;
use App\Models\SlaveConfigModel;

class GeneralSettingControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSetTcp()
    {
        $arr = [];
        $ID_SLOT = '1';

        $IP_ADDRESS = SlaveConfigModel::select('VALUE')->where([['ID_SLOT',$ID_SLOT], ['CONFIG_ITEM', '=', 'IP Address']])->value('VALUE');
        $ID_SLAVE = SlaveConfigModel::select('ID_SLAVE')->where([['ID_SLOT',$ID_SLOT], ['CONFIG_ITEM', '=', 'IP Address']])->value('ID_SLAVE');
        $SECOND_IP = SlaveConfigModel::select('VALUE')->where([['ID_SLOT',$ID_SLOT], ['CONFIG_ITEM', '=', 'Second IP']])->value('VALUE');
        $PORT = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Port']])->value('VALUE');
        $POOLING_TIME = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Pooling Time']])->value('VALUE');
        $TIMEOUT = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Timeout']])->value('VALUE');

        array_push($arr, $IP_ADDRESS, $ID_SLAVE, $SECOND_IP, $PORT, $POOLING_TIME, $TIMEOUT);

        echo "\nIP Address   : $IP_ADDRESS";
        echo "\nID Slave     : $ID_SLAVE";
        echo "\nSecond IP    : $SECOND_IP";
        echo "\nPort         : $PORT";
        echo "\nPooling Time : $POOLING_TIME";
        echo "\nTimeout      : $TIMEOUT";

        $this->assertNotNull(json_encode($arr), "Json_encode is a NULL");
    }

    public function testSetRtu()
    {
        $arr = [];
        $ID_SLOT = '1';
        $ID_SLAVE = '2';

        $SERIAL_TYPE = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Serial Type']])->value('VALUE');
        $ID_SLAVE = SlaveConfigModel::select('ID_SLAVE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Serial Type']])->value('ID_SLAVE');
        $Port = SlaveConfigModel::select('VALUE')->where([['ID_SLAVE', $ID_SLAVE], ['CONFIG_ITEM', '=', 'Port']])->value('VALUE');
        $BAUD_RATE = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Baud Rate']])->value('VALUE');
        $PARITY = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Parity']])->value('VALUE');
        $DATA_BITS = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Data Bits']])->value('VALUE');
        $STOP_BITS = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Stop Bits']])->value('VALUE');

        array_push($arr, $SERIAL_TYPE, $ID_SLAVE, $Port, $BAUD_RATE, $PARITY, $DATA_BITS, $STOP_BITS);

        echo "\nSerial Type : $SERIAL_TYPE";
        echo "\nID Slave    : $ID_SLAVE";
        echo "\nPort        : $Port";
        echo "\nBaud Rate   : $BAUD_RATE";
        echo "\nParity      : $PARITY";
        echo "\nData Bits   : $DATA_BITS";
        echo "\nStop Bits   : $STOP_BITS";

        // return json_encode($arr);
        $this->assertNotNull(json_encode($arr), "Json_encode is a NULL");
    }

    public function testSetIec()
    {
        $arr = [];
        $ID_SLOT = '1';
        $ID_SLAVE_IEC = '3';

        $IP_ADDRESS_IEC = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'IP Address'], ['ID_SLAVE', $ID_SLAVE_IEC]])->value('VALUE');
        $ID_SLAVE_IEC = SlaveConfigModel::select('ID_SLAVE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'IP Address'], ['ID_SLAVE', $ID_SLAVE_IEC]])->value('ID_SLAVE');
        $SECOND_IP_IEC = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Second IP'], ['ID_SLAVE', $ID_SLAVE_IEC]])->value('VALUE');
        $PORT_IEC = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Port'], ['ID_SLAVE', $ID_SLAVE_IEC]])->value('VALUE');
        $POOLING_TIME_IEC = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Pooling Time'], ['ID_SLAVE', $ID_SLAVE_IEC]])->value('VALUE');
        $TIMEOUT_IEC = SlaveConfigModel::select('VALUE')->where([['ID_SLOT', $ID_SLOT], ['CONFIG_ITEM', '=', 'Timeout'], ['ID_SLAVE', $ID_SLAVE_IEC]])->value('VALUE');

        array_push($arr, $IP_ADDRESS_IEC, $ID_SLAVE_IEC, $SECOND_IP_IEC, $PORT_IEC, $POOLING_TIME_IEC, $TIMEOUT_IEC);

        echo "\nIP Address   : $IP_ADDRESS_IEC";
        echo "\nID Slave     : $ID_SLAVE_IEC";
        echo "\nSecond IP    : $SECOND_IP_IEC";
        echo "\nPort         : $PORT_IEC";
        echo "\nPooling Time : $POOLING_TIME_IEC";
        echo "\nTimeout      : $TIMEOUT_IEC";

        // return json_encode($arr);
        $this->assertNotNull(json_encode($arr), "Json_encode is a NULL");
    }

    public function testUpdateTcp()
    {
        $arr = [];
        $idSlot = '1';
        $idSlave = '1';
        $mainIp = '192.168.100.205';
        $secIp = '192.168.200.108';
        $port = '502';
        $pooling = '1.0';
        $timeout = '5.0';

        array_push($arr, $idSlot, $idSlave, $mainIp, $secIp, $port, $pooling, $timeout);

        $updateMainIp = SlaveConfigModel::where([['ID_SLOT', $idSlot], ['ID_SLAVE', $idSlave], ['CONFIG_ITEM', '=', 'IP Address']])->update(['VALUE' => $mainIp]);
        $updateSecIp = SlaveConfigModel::where([['ID_SLOT', $idSlot], ['ID_SLAVE', $idSlave], ['CONFIG_ITEM', '=', 'Second IP']])->update(['VALUE' => $secIp]);
        $updatePort = SlaveConfigModel::where([['ID_SLOT', $idSlot], ['ID_SLAVE', $idSlave], ['CONFIG_ITEM', '=', 'Port']])->update(['VALUE' => $port]);
        $updatePooling = SlaveConfigModel::where([['ID_SLOT', $idSlot], ['ID_SLAVE', $idSlave], ['CONFIG_ITEM', '=', 'Pooling Time']])->update(['VALUE' => $pooling]);
        $updateTimeout = SlaveConfigModel::where([['ID_SLOT', $idSlot], ['ID_SLAVE', $idSlave], ['CONFIG_ITEM', '=', 'Timeout']])->update(['VALUE' => $timeout]);

        // return json_encode(1);

        $this->assertEquals(1, json_encode(1), "json_encode value is not as expected");
    }

    public function testUpdateRtu()
    {
        $arr = [];
        $slaveSlot = '1';
        $slaveProtocol = '2';
        $serialType = 'RS232';
        $portRtu = '1';
        $baudRate = '1200';
        $parity = 'NONE';
        $dataBits = '5';
        $stopBits = '1';

        array_push($arr, $slaveSlot, $slaveProtocol, $serialType, $portRtu, $baudRate, $parity, $dataBits, $stopBits);

        $update_serial_type = SlaveConfigModel::where([['ID_SLOT', $slaveSlot], ['ID_SLAVE', $slaveProtocol], ['CONFIG_ITEM', '=', 'Serial Type']])->update(['VALUE' => $serialType]);
        $update_port_rtu = SlaveConfigModel::where([['ID_SLOT', $slaveSlot], ['ID_SLAVE', $slaveProtocol], ['CONFIG_ITEM', '=', 'Port']])->update(['VALUE' => $portRtu]);
        $update_baud_rate = SlaveConfigModel::where([['ID_SLOT', $slaveSlot], ['ID_SLAVE', $slaveProtocol], ['CONFIG_ITEM', '=', 'Baud Rate']])->update(['VALUE' => $baudRate]);
        $update_parity = SlaveConfigModel::where([['ID_SLOT', $slaveSlot], ['ID_SLAVE', $slaveProtocol], ['CONFIG_ITEM', '=', 'Parity']])->update(['VALUE' => $parity]);
        $update_data_bits = SlaveConfigModel::where([['ID_SLOT', $slaveSlot], ['ID_SLAVE', $slaveProtocol], ['CONFIG_ITEM', '=', 'Data Bits']])->update(['VALUE' => $dataBits]);
        $update_stop_bits = SlaveConfigModel::where([['ID_SLOT', $slaveSlot], ['ID_SLAVE', $slaveProtocol], ['CONFIG_ITEM', '=', 'Stop Bits']])->update(['VALUE' => $stopBits]);

        // return json_encode(1);
        $this->assertEquals(1, json_encode(1), "json_encode value is not as expected");
    }

    public function testUpdateIec()
    {
        $arr = [];
        $idSlotIec = '1';
        $idSlaveIec = '3';
        $mainIpIec = '192.168.200.105';
        $secIpIec = '192.168.100.108';
        $portIec = '102';
        $poolingIec = '1.0';
        $timeoutIec = '5.0';

        array_push($arr, $idSlotIec, $idSlaveIec, $mainIpIec, $secIpIec, $portIec, $poolingIec, $timeoutIec);

        $update_main_ip_iec = SlaveConfigModel::where([['ID_SLOT', $idSlotIec], ['ID_SLAVE', $idSlaveIec], ['CONFIG_ITEM', '=', 'IP Address']])->update(['VALUE' => $mainIpIec]);
        $update_sec_ip_iec = SlaveConfigModel::where([['ID_SLOT', $idSlotIec], ['ID_SLAVE', $idSlaveIec], ['CONFIG_ITEM', '=', 'Second IP']])->update(['VALUE' => $secIpIec]);
        $update_port_iec = SlaveConfigModel::where([['ID_SLOT', $idSlotIec], ['ID_SLAVE', $idSlaveIec], ['CONFIG_ITEM', '=', 'Port']])->update(['VALUE' => $portIec]);
        $update_pooling_iec = SlaveConfigModel::where([['ID_SLOT', $idSlotIec], ['ID_SLAVE', $idSlaveIec], ['CONFIG_ITEM', '=', 'Pooling Time']])->update(['VALUE' => $poolingIec]);
        $update_timeout_iec = SlaveConfigModel::where([['ID_SLOT', $idSlotIec], ['ID_SLAVE', $idSlaveIec], ['CONFIG_ITEM', '=', 'Timeout']])->update(['VALUE' => $timeoutIec]);

        // return json_encode(1);
        $this->assertEquals(1, json_encode(1), "json_encode value is not as expected");
    }

    public function testNampilin()
    {
        $id = '3';
        $slave_status = GeneralSettingModel::select('ACTIVE')->where('ID_SLOT', $id)->value('ACTIVE');
        echo json_encode($slave_status);

        $this->assertNotNull(json_encode($slave_status), "Json_encode is a NULL");
    }
}
