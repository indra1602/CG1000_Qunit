<?php
namespace App\Http\Controllers;

use App\Models\GeneralSettingModel;
use App\Models\HardwareSettingModel;
use App\Models\MasterConfigModel;
use App\Models\MasterProtocolsModel;
use App\Models\SlaveConfigModel;
use App\Models\SlaveProtocolsModel;
use Datatables;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
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
        //----------------------------------------//
        //--------- GENERAL SETTING PAGE ---------//
        //----------------------------------------//
        $GENERAL_SETTING = GeneralSettingModel::DISTINCT()->join('SLAVE_CONFIG', 'GENERAL_SETTING.ID_SLOT', '=', 'SLAVE_CONFIG.ID_SLOT')
            ->select('GENERAL_SETTING.*', 'SLAVE_CONFIG.VALUE')
            ->where('SLAVE_CONFIG.CONFIG_ITEM', '=', 'Serial Type')
            ->get();

        $DISTINCT_GS = GeneralSettingModel::DISTINCT()
            ->get([
                'IP_REDUNDANT',
                'IP_MC',
                'IP_MAIN',
                'IP_BACKUP',
                'REDUNDANCY_TYPE',
            ]);

        $HW_SETTING = HardwareSettingModel::get();
        $MASTER_PROTOCOLS = MasterProtocolsModel::get();
        $SLAVE_PROTOCOLS = SlaveProtocolsModel::get();
        //----------------------------------------//
        //----- MASTER PROTOCOLS CONF MODAL ------//
        //----------------------------------------//
        $MASTER_PORT = MasterConfigModel::where([['ID_MASTER', '1'],['CONFIG_ITEM', 'Port']])->value('VALUE');
        $MASTER_IPAddress = MasterConfigModel::where('CONFIG_ITEM', 'IP Address')
            ->value('VALUE');
        $MASTER_PortVps = MasterConfigModel::where([['ID_MASTER', '2'],['CONFIG_ITEM', 'Port']])
            ->value('VALUE');
        $MASTER_Pt = MasterConfigModel::where('CONFIG_ITEM', 'Pooling Time')->value('VALUE');

        //----------------------------------------//
        //------ SLAVE PROTOCOLS CONF MODAL ------//
        //----------------------------------------//
        $SLAVE_CONF = SlaveConfigModel::get();

        // mengirim data GENERAL_SETTING ke view /general-setting
        return view('general-setting',
            [
                'GENERAL_SETTING' => $GENERAL_SETTING,
                'DISTINCT_GS' => $DISTINCT_GS,
                'HW_SETTING' => $HW_SETTING,
                'MASTER_PROTOCOLS' => $MASTER_PROTOCOLS,
                'SLAVE_PROTOCOLS' => $SLAVE_PROTOCOLS,
                'MASTER_PORT' => $MASTER_PORT,
                'MASTER_IPAddress' => $MASTER_IPAddress,
                'MASTER_PortVps'=>$MASTER_PortVps,
                'MASTER_Pt'=>$MASTER_Pt,
                'SLAVE_CONF' => $SLAVE_CONF,
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
        $ID = $request->ID;
        $IP_HW = $request->IP_HW;
        $SUBNET = $request->SUBNET;
        $GATEWAY = $request->GATEWAY;
        $HW_NAME = $request->HW_NAME;
        HardwareSettingModel::where('ID', '=', $ID)
            ->update([
                'IP_HW' => $IP_HW,
                'SUBNET' => $SUBNET,
                'GATEWAY' => $GATEWAY,
                'HW_NAME' => $HW_NAME,
            ]);
        $IP_MC = $request->IP_MC;
        $count = GeneralSettingModel::select('ID_SLOT')->get();
        foreach ($count as $key => $ID_SLOT) {
            GeneralSettingModel::where('ID_SLOT', '=', $key + 1)
                ->update([
                    'IP_MC' => $IP_MC,
                ]);
        }
        
        $restartMain = app('App\Http\Controllers\RestartController')
        ->restartGeneralSetting();

        return redirect('/logout');
    }

    public function updateRedundant(Request $request)
    {
        $ID = $request->ID;
        $IP_REDUNDANT = $request->IP_REDUNDANT;
        $IP_MAIN = $request->IP_MAIN;
        $IP_BACKUP = $request->IP_BACKUP;
        $REDUNDANCY_TYPE = $request->REDUNDANCY_TYPE;
        $count = GeneralSettingModel::select('ID_SLOT')->get();
        foreach ($count as $key => $ID_SLOT) {
            GeneralSettingModel::where('ID_SLOT', '=', $key + 1)
                ->update([
                    'IP_REDUNDANT' => $IP_REDUNDANT,
                    'IP_MAIN' => $IP_MAIN,
                    'IP_BACKUP' => $IP_BACKUP,
                    'REDUNDANCY_TYPE' => $REDUNDANCY_TYPE,
                ]);
        }
    
        $restartMain = app('App\Http\Controllers\RestartController')
        ->restartGeneralSetting();
        return redirect('/logout');
    }

    public function masterConfig(Request $request)
    {
        $MASTER_PORT = $request->MASTER_PORT;

        MasterConfigModel::where([['ID_MASTER', '=', '1'], ['CONFIG_ITEM', '=', 'Port']])
            ->update(['VALUE' => $MASTER_PORT]);

        return redirect('/general-setting')
            ->with('update-success', 'The data was updated successfully');
    }
}
