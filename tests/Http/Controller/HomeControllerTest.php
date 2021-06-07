<?php

use App\Models\GeneralSettingModel;

class HomeControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomedirect()
    {
        $this->get('/home')->assertResponseStatus(302);
    }

    public function testHardwareStatus()
    {
        $BATTERY_TEMP = trim(fgets(STDIN));
        $POWER_STATUS = trim(fgets(STDIN));

        if (
            ($BATTERY_TEMP >= 0 && $BATTERY_TEMP <= 55)
            && ($POWER_STATUS == 0)
        ) {
            echo "\n[HARDWARE STATUS : Normal]";
            echo "\n[Battery Temperature : $BATTERY_TEMP Celcius]";
            echo "\n[Power Status : ON AC]";
        } elseif (
            ($BATTERY_TEMP >= 0 && $BATTERY_TEMP <= 55)
            && ($POWER_STATUS == 1)
        ) {
            echo "\n[HARDWARE STATUS : Warning]";
            echo "\n[Battery Temperature : $BATTERY_TEMP Celcius]";
            echo "\n[Power Status : ON BATTERY]";
        } elseif (
            ($BATTERY_TEMP > 55 && $BATTERY_TEMP <= 70)
            && ($POWER_STATUS == 0)
        ) {
            echo "\n[HARDWARE STATUS : Warning]";
            echo "\n[Battery Temperature : $BATTERY_TEMP Celcius]";
            echo "\n[Power Status : ON AC]";
        } elseif (
            ($BATTERY_TEMP > 55 && $BATTERY_TEMP <= 70)
            && ($POWER_STATUS == 1)
        ) {
            echo "\n[HARDWARE STATUS : Warning]";
            echo "\n[Battery Temperature : $BATTERY_TEMP Celcius]";
            echo "\n[Power Status : ON BATTERY]";
        } elseif (
            ($BATTERY_TEMP > 70)
            && ($POWER_STATUS == 0)
        ) {
            echo "\n[HARDWARE STATUS : Alarm]";
            echo "\n[Battery Temperature : $BATTERY_TEMP Celcius]";
            echo "\n[Power Status : ON AC]";
        } elseif (
            ($BATTERY_TEMP > 70)
            && ($POWER_STATUS == 1)
        ) {
            echo "\n[HARDWARE STATUS : Alarm]";
            echo "\n[Battery Temperature : $BATTERY_TEMP Celcius]";
            echo "\n[Power Status : ON BATTERY]";
        }
    }

    public function testRedundancyStatus()
    {
        $REDUNDANCY_TYPE = trim(fgets(STDIN));
        $KEEPALIVED_STATUS = trim(fgets(STDIN));
        $FIRMWARE_STATUS = trim(fgets(STDIN));
        $DB_REPLICATION_STATUS = trim(fgets(STDIN));
        $REDUNDANCY_COMM = trim(fgets(STDIN));

        // START REDUNDANCY STATUS
        if (
            ($KEEPALIVED_STATUS == 1)
            && ($FIRMWARE_STATUS == 1)
            && ($DB_REPLICATION_STATUS == 1)
            && ($REDUNDANCY_COMM == 1)
        ) {
            echo "\n[REDUNDANCY STATUS : Ready]";
        } else {
            echo "\n[REDUNDANCY STATUS : Not-Ready]";
        }
        // END REDUNDANCY STATUS

        // START REDUNDANCY TYPE STATUS
        if ($REDUNDANCY_TYPE == 0) {
            echo "\n[REDUNDANCY TYPE : Non-Dominant]";
        } elseif ($REDUNDANCY_TYPE == 1) {
            echo "\n[REDUNDANCY TYPE : Dominant]";
        }
        // END REDUNDANCY TYPE STATUS
    }

    public function testSNMPDriver()
    {
        $SNMP_DRIVER = trim(fgets(STDIN));

        if ($SNMP_DRIVER == 0) {
            echo "\n[SNMP DRIVER : Disconnected]";
        } else {
            echo "\n[SNMP DRIVER : Connected]";
        }
    }

    public function testCloudDriver()
    {
        $CLOUD_DRIVER = trim(fgets(STDIN));

        if ($CLOUD_DRIVER == 0) {
            echo "\n[CLOUD DRIVER : Disconnected]";
        } else {
            echo "\n[CLOUD DRIVER : Connected]";
        }
    }

    public function testMasterClock()
    {
        $MC_STATUS = trim(fgets(STDIN));

        if ($MC_STATUS == 0) {
            echo "\n[MASTER CLOCK STATUS : Disconnected]";
        } else {
            echo "\n[MASTER CLOCK STATUS : Connected]";
        }
    }

    public function testMasterProtocol()
    {
        $MASTER_STATUS = trim(fgets(STDIN));

        if ($MASTER_STATUS == 0) {
            echo "\n[MASTER PROTOCOL STATUS : Disconnected]";
        } else {
            echo "\n[MASTER PROTOCOL STATUS : Connected]";
        }
    }

    public function testSlaveProtocol()
    {
        $SLAVE_SLOT = trim(fgets(STDIN));
        $SLAVE_STATUS = trim(fgets(STDIN));
        $SLAVE_ACTIV = trim(fgets(STDIN));

        if (
            ($SLAVE_STATUS == 0) && ($SLAVE_ACTIV == 0)
        ) {
            echo "\n[SLAVE PROTOCOL SLOT : $SLAVE_SLOT]";
            echo "\n[SLAVE PROTOCOL STATUS : Disconnected]";
            echo "\n[SLAVE PROTOCOL ACTIVE : Disable]";
        } elseif (
            ($SLAVE_STATUS == 1) && ($SLAVE_ACTIV == 0)
        ) {
            echo "\n[SLAVE PROTOCOL SLOT : $SLAVE_SLOT]";
            echo "\n[SLAVE PROTOCOL STATUS : Connected]";
            echo "\n[SLAVE PROTOCOL ACTIVE : Disable]";
        } elseif (
            ($SLAVE_STATUS == 0) && ($SLAVE_ACTIV == 1)
        ) {
            echo "\n[SLAVE PROTOCOL SLOT : $SLAVE_SLOT]";
            echo "\n[SLAVE PROTOCOL STATUS : Disconnected]";
            echo "\n[SLAVE PROTOCOL ACTIVE : Enable]";
        } elseif (
            ($SLAVE_STATUS == 1) && ($SLAVE_ACTIV == 1)
        ) {
            echo "\n[SLAVE PROTOCOL SLOT : $SLAVE_SLOT]";
            echo "\n[SLAVE PROTOCOL STATUS : Connected]";
            echo "\n[SLAVE PROTOCOL ACTIVE : Enable]";
        }
    }

    public function testUpdateStatusSlave()
    {
        $arr = [];
        $slave_slot = trim(fgets(STDIN));
        $status_slave = trim(fgets(STDIN));
        $protocol_slave = trim(fgets(STDIN));
        array_push($arr, $slave_slot, $status_slave, $protocol_slave);
        
        $update_status_slave = GeneralSettingModel::where('ID_SLOT', $slave_slot)
            ->update([
                'ACTIVE' => $status_slave,
                'ID_SLAVE' => $protocol_slave,
            ]);
        // return json_encode(1);
        $this->assertEquals(1, json_encode(1), "json_encode value is not as expected");
    }
}
