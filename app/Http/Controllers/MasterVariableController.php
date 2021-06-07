<?php
namespace App\Http\Controllers;

use App\Models\GeneralSettingModel;
use App\Models\MasterProtocolsModel;
use App\Models\MasterVariableModel;
use App\Models\SlaveModel;
use App\Models\SlaveProtocolsModel;
use Datatables;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterVariableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show from table SLAVE_VARIABLES
        $SLAVE_VARIABLES = SlaveModel::get();

        //show from table MASTER_VARIABLES
        // $MASTER_VARIABLES = MasterVariableModel::get();
        $MASTER_VARIABLES = SlaveModel::leftJoin('MASTER_VARIABLES', 'MASTER_VARIABLES.SLV_ADDRESS', '=', 'SLAVE_VARIABLES.ID_VARIABLE')->select(
            'SLAVE_VARIABLES.ID_VARIABLE as sv_id_variable',
            'SLAVE_VARIABLES.ID_SLAVE as sv_id_slave',
            'SLAVE_VARIABLES.ID_SLOT as sv_id_slot',
            'SLAVE_VARIABLES.VARIABLE_NAME as sv_variable_name',
            'SLAVE_VARIABLES.TYPE as sv_type',
            'SLAVE_VARIABLES.ADDRESS as sv_address',
            'MASTER_VARIABLES.ID_VARIABLE as ms_id_variable',
            'MASTER_VARIABLES.SLV_ADDRESS as ms_slv_address',
            'MASTER_VARIABLES.VARIABLE_NAME as ms_variable_name',
            'MASTER_VARIABLES.TYPE as ms_type',
            'MASTER_VARIABLES.ADDRESS as ms_address'
        )->get();

        //show from table MASTER_PROTOCOLS
        $MASTER_PROTOCOLS = MasterProtocolsModel::get();

        $SLAVE_PROTOCOLS = SlaveProtocolsModel::get();

        $GENERAL_SETTING = GeneralSettingModel::DISTINCT()->join('SLAVE_CONFIG', 'GENERAL_SETTING.ID_SLOT', '=', 'SLAVE_CONFIG.ID_SLOT')
            ->select('GENERAL_SETTING.*', 'SLAVE_CONFIG.VALUE')
            ->where('SLAVE_CONFIG.CONFIG_ITEM', '=', 'IP Address')
            ->get();

        return view('/variable-list/master-variable',
            [
                'SLAVE_VARIABLES' => $SLAVE_VARIABLES,
                'MASTER_VARIABLES' => $MASTER_VARIABLES,
                // 'MASTER_VARIABLE' => $MASTER_VARIABLE,
                'MASTER_PROTOCOLS' => $MASTER_PROTOCOLS,
                'SLAVE_PROTOCOLS' => $SLAVE_PROTOCOLS,
                'GENERAL_SETTING' => $GENERAL_SETTING,
            ]);
    }

    public function data()
    {
        //show from table SLAVE_VARIABLES
        $MASTER_VARIABLES = SlaveModel::leftJoin('MASTER_VARIABLES', 'MASTER_VARIABLES.SLV_ADDRESS', '=', 'SLAVE_VARIABLES.ID_VARIABLE')
            ->select(
                'SLAVE_VARIABLES.ID_VARIABLE as sv_id_variable',
                'SLAVE_VARIABLES.ID_SLAVE as sv_id_slave',
                'SLAVE_VARIABLES.ID_SLOT as sv_id_slot',
                'SLAVE_VARIABLES.VARIABLE_NAME as sv_variable_name',
                'SLAVE_VARIABLES.TYPE as sv_type',
                'SLAVE_VARIABLES.ADDRESS as sv_address',
                'MASTER_VARIABLES.ID_VARIABLE as ms_id_variable',
                'MASTER_VARIABLES.SLV_ADDRESS as ms_slv_address',
                'MASTER_VARIABLES.VARIABLE_NAME as ms_variable_name',
                'MASTER_VARIABLES.TYPE as ms_type',
                'MASTER_VARIABLES.ADDRESS as ms_address'
                // ,'MASTER_VARIABLES.VALUE as ms_value'
            )->get();
        return Datatables::of($MASTER_VARIABLES)
            ->addColumn('action', function ($row) {
                $btn = '<div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle btn-rounded"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item  add-master" href="javascript:void(0)" data-toggle="tooltip"
                        data-sv-id-variable="' . $row->sv_id_variable . '"
                        data-sv-id-slave="' . $row->sv_id_slave . '"
                        data-sv-id-slot="' . $row->sv_id_slot . '"
                        data-sv-variable-name="' . $row->sv_variable_name . '"
                        data-original-title="Add" data-ms-variable-name="' . $row->ms_variable_name . '">Add</a>
                        <a class="dropdown-item deleteMasterVariable" href="javascript:void(0)" data-toggle="tooltip" data-ms-id-variable="' . $row->ms_id_variable . '" data-original-title="Delete">Delete</a>
                    </div>
                </div>';

                return $btn;

            })
            ->addColumn('checkbox', '<input type="checkbox" name="master_checkbox[]" class="master_checkbox" value="{{$ms_id_variable}}" />')
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            // insert data ke table MASTER_VARIABLES
            $SLV_ADDRESS = $request->SLV_ADDRESS;
            $ID_MASTER = $request->ID_MASTER;
            $ID_SLOT = $request->ID_SLOT;
            $VARIABLE_NAME = $request->VARIABLE_NAME;
            $TYPE = $request->TYPE;
            $ADDRESS = $request->ADDRESS;
            $ID_VARIABLE = "$ID_MASTER.$ID_SLOT.$ADDRESS";
            $VALUE = "";
            $check_id = MasterVariableModel::select('ID_VARIABLE')
            ->where('ID_VARIABLE', '=', $ID_VARIABLE)
            ->count();
            if ($check_id == 1) {
                // alihkan halaman ke halaman /variable-list/slave-variable
                return redirect('/variable-list/master-variable')
                ->with('input-error', 'Data already exist!');
            } elseif ($check_id == 0) {
                if ($TYPE == 'BOOL') {
                    $VALUE = 'FALSE';
                } elseif ($TYPE == 'INT') {
                    $VALUE = 0;
                } elseif ($TYPE == 'REAL') {
                    $VALUE = 0;
                } elseif ($TYPE == 'FLOAT') {
                    $VALUE = 0;
                } elseif ($TYPE == 'STRING') {
                    $VALUE = 0;
                }
                $master_variable = MasterVariableModel::insert([
                    'ID_VARIABLE' => $ID_VARIABLE,
                    'SLV_ADDRESS' => $SLV_ADDRESS,
                    'ID_MASTER' => $ID_MASTER,
                    'ID_SLOT' => $ID_SLOT,
                    'VARIABLE_NAME' => $VARIABLE_NAME,
                    'TYPE' => $TYPE,
                    'ADDRESS' => $ADDRESS,
                    'VALUE' => $VALUE,
                ]);
            }
            // alihkan halaman ke halaman /variable-list/master-variable
            return redirect('/variable-list/master-variable')
            ->with('add-success', 'Data has ben added!');
        }catch(Exception $e){
            echo $e->getMessage();
            die();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($ID_VARIABLE)
    {
        $MASTER_VARIABLE = MasterVariableModel::where('ID_VARIABLE', $ID_VARIABLE);
        if ($MASTER_VARIABLE->delete()) {
            echo 'Data Deleted';
        }
    }

    public function deleteAll(Request $request)
    {
        $ID_VARIABLES = $request->input('id');
        $MASTER_VARIABLE = MasterVariableModel::whereIn('ID_VARIABLE', $ID_VARIABLES);
        if ($MASTER_VARIABLE->delete()) {
            echo 'Data Deleted';
        }
    }

    /**
     * Export file
     *
     *
     */
    public function download($type)
    {
        $data = MasterVariableModel::get()->toArray();
        return Excel::create('Master Variable', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    /**
     * Import file
     *
     *
     */
    public function import(Request $request)
    {
        try {
            if ($request->file('import_file')) {
                $path = $request->file('import_file')->getRealPath();
                $data = Excel::load($path, function ($reader) {
                })->get();

                if (!empty($data) && $data->count()) {
                    $data = $data->toArray();
                    for ($i = 0; $i < count($data); $i++) {
                        $dataImported[] = $data[$i];
                    }
                }
                MasterVariableModel::insert($dataImported);
            }
        } catch (\Exception $ex) {
            return back()->with('import-error', 'Something wrong. Check your query or file.');
        }
        return back()->with('import-success', 'Something wrong. Check your query or file.');
    }

    public function deleteAllMasterVariable()
    {
        DB::delete('DELETE FROM `MASTER_VARIABLES`');
        
        return json_encode(1);
    }
}
