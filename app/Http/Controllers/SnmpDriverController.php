<?php
namespace App\Http\Controllers;

use App\Models\SnmpDriverModel;
use Illuminate\Http\Request;

class SnmpDriverController extends Controller
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
        //show from table SNMP_DRIVER
        $snmp_driver_ver = SnmpDriverModel::get()->where('CONFIG_ITEM', 'Version');

        //show from table SNMP_DRIVER
        $snmp_driver_port = SnmpDriverModel::get()->where('CONFIG_ITEM', 'Port');

        //show from table SNMP_DRIVER
        $snmp_driver_username = SnmpDriverModel::get()->where('CONFIG_ITEM', 'Username');

        return view('/snmp-driver',
            [
                'snmp_driver_ver' => $snmp_driver_ver,
                'snmp_driver_port' => $snmp_driver_port,
                'snmp_driver_username' => $snmp_driver_username,
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
        $port = $request->VALUE2;
        $username = $request->VALUE3;
        $portUpdate = SnmpDriverModel::where('CONFIG_ITEM', '=', 'Port')->update(['VALUE' => $port]);
        $usenameUpdate = SnmpDriverModel::where('CONFIG_ITEM', '=', 'Username')->update(['VALUE' => $username]);

        return redirect('/snmp-driver')
            ->with('update-success', 'The data was updated successfully');
    }
}
