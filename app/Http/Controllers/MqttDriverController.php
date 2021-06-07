<?php
namespace App\Http\Controllers;

use App\Models\MqttDriverModel;
use Illuminate\Http\Request;

class MqttDriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //show from table MQTT_DRIVER
        $mqtt_driver_port = MqttDriverModel::get()
            ->where('CONFIG_ITEM', 'Port');

        //show from table MQTT_DRIVER
        $mqtt_driver_qos = MqttDriverModel::get()
            ->where('CONFIG_ITEM', 'QoS');

        //show from table MQTT_DRIVER
        $mqtt_driver_clientId = MqttDriverModel::get()
            ->where('CONFIG_ITEM', 'Client ID');

        //show from table MQTT_DRIVER
        $mqtt_driver_username = MqttDriverModel::get()
            ->where('CONFIG_ITEM', 'Username');

        //show from table MQTT_DRIVER
        $mqtt_driver_password = MqttDriverModel::get()
            ->where('CONFIG_ITEM', 'Password');

        return view('/mqtt-driver',
            [
                'mqtt_driver_port' => $mqtt_driver_port,
                'mqtt_driver_qos' => $mqtt_driver_qos,
                'mqtt_driver_clientId' => $mqtt_driver_clientId,
                'mqtt_driver_username' => $mqtt_driver_username,
                'mqtt_driver_password' => $mqtt_driver_password,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $port = $request->VALUE1;
        $qos = $request->VALUE2;
        $clientId = $request->VALUE3;
        $username = $request->VALUE4;
        $password = $request->VALUE5;
        $portUpdate = MqttDriverModel::where('CONFIG_ITEM', '=', 'Port')
            ->update(['VALUE' => $port]);
        $qosUpdate = MqttDriverModel::where('CONFIG_ITEM', '=', 'QoS')
            ->update(['VALUE' => $qos]);
        $clientIdUpdate = MqttDriverModel::where('CONFIG_ITEM', '=', 'Client ID')->update(['VALUE' => $clientId]);
        $usernameUpdate = MqttDriverModel::where('CONFIG_ITEM', '=', 'Username')->update(['VALUE' => $username]);
        $passwordUpdate = MqttDriverModel::where('CONFIG_ITEM', '=', 'Password')->update(['VALUE' => $password]);

        return redirect('/mqtt-driver')
            ->with('update-success', 'The data was updated successfully');
    }
}
