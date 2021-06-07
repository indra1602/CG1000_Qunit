<?php
namespace App\Http\Controllers;

class FepController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('home');
    }

    public function generalSetting()
    {
        return view('general-setting');
    }

    public function snmpDriver()
    {
        return view('snmp-driver');
    }

    public function mqttDriver()
    {
        return view('mqtt-driver');
    }

    public function eventsLog()
    {
        return view('events-log');
    }

    public function gsModbus()
    {
        return view('/general-setting/modbus');
    }

    public function gsOpcUa()
    {
        return view('/general-setting/opc-ua');
    }

    public function masterVariable()
    {
        return view('/variable-list/master-variable');
    }

    public function slaveVariable()
    {
        return view('/variable-list/slave-variable');
    }

    public function variableValue()
    {
        return view('/variable-list/variable-value');
    }
}
