<?php
namespace App\Http\Controllers;

use App\Models\GeneralSettingModel;
use App\Models\SlaveModel;
use App\Models\SlaveProtocolsModel;
use Datatables;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlaveController extends Controller
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
        $SLAVE_PROTOCOLS = SlaveProtocolsModel::get();

        $GENERAL_SETTING = GeneralSettingModel::get();

        //show from table SLAVE_VARIABLES
        $SLAVE_VARIABLES = SlaveModel::whereNotIn('ID_SLAVE', [3])->get();

        return view('/variable-list/slave-variable',
            [
                'SLAVE_PROTOCOLS' => $SLAVE_PROTOCOLS,
                'GENERAL_SETTING' => $GENERAL_SETTING,
                'SLAVE_VARIABLES' => $SLAVE_VARIABLES,
            ]);
    }

    // public function data()
    // {
        // $SLAVE_VARIABLES = SlaveModel::select('*')->orderBy('TYPE');
        // return Datatables::of($SLAVE_VARIABLES)
            // ->addColumn('action', function ($row) {
                // $btn = '<div class="btn-group">
                            // // <button type="button" class="btn btn-info dropdown-toggle btn-rounded"
                                // // data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                // Action
                            // </button>
                            // <div class="dropdown-menu">
                                // // <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip"
                                    // data-id-variable="' . $row->ID_VARIABLE . '"
                                    // data-id-slave="' . $row->ID_SLAVE . '"
                                    // data-id-slot="' . $row->ID_SLOT . '"
                                    // // data-variable-name="' . $row->VARIABLE_NAME . '"
                                    // data-type="' . $row->TYPE . '"
                                    // data-address="' . $row->ADDRESS . '"
                                    // data-access="' . $row->ACCESS . '"
                                    // data-original-title="Modify">Modify</a>
                                // <a class="dropdown-item deleteSlaveVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="' . $row->ID_VARIABLE . '" data-original-title="Delete">Delete</a>
                            // </div>
                        // </div>';
                // return $btn;
            // })
            // ->addColumn('checkbox', '<input type="checkbox" name="slave_checkbox[]" class="slave_checkbox" value="{{$ID_VARIABLE}}" />')
            // ->make(true);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function storeManual(Request $request)
    {

        $ID_SLAVE = $request->ID_SLAVE;
        $ID_SLOT = $request->ID_SLOT;
        $VARIABLE_NAME = $request->VARIABLE_NAME;
        $TYPE = $request->TYPE;
        $ADDRESS = $request->ADDRESS;
        $ACCESS = $request->ACCESS;
        $ID_VARIABLE = "$ID_SLAVE.$ID_SLOT.$ADDRESS";
        $check_id = SlaveModel::select('ID_VARIABLE')->where('ID_VARIABLE', '=', $ID_VARIABLE)->count();

        if ($check_id == 1) {
            // alihkan halaman ke halaman /variable-list/slave-variable
            return redirect('/variable-list/slave-variable')
                ->with('input-error', 'Data already exist!');
        } elseif ($check_id == 0) {
            if ($TYPE == 'COIL') {
                $ACCESS = 1;
                $VALUE = 'FALSE';
            } elseif ($TYPE == 'HOLDING') {
                $ACCESS = 1;
                $VALUE = 0;
            } elseif ($TYPE == 'DISCRETE_INPUT') {
                $ACCESS = 0;
                $VALUE = 0;
            } elseif ($TYPE == 'INPUT_REGISTER') {
                $ACCESS = 0;
                $VALUE = false;
            }
            $slave_variables = SlaveModel::insert([
                'ID_VARIABLE' => $ID_VARIABLE,
                'ID_SLAVE' => $ID_SLAVE,
                'ID_SLOT' => $ID_SLOT,
                'VARIABLE_NAME' => $VARIABLE_NAME,
                'TYPE' => $TYPE,
                'ADDRESS' => $ADDRESS,
                'ACCESS' => $ACCESS,
                'VALUE' => $VALUE,
            ]);
            // alihkan halaman ke halaman /variable-list/slave-variable
            return redirect('/variable-list/slave-variable')
                ->with('add-success', 'Data has ben added!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function storeAuto(Request $request)
    {
        $ID_SLAVE = $request->ID_SLAVE;
        $ID_SLOT = $request->ID_SLOT;
        $START = $request->START;
        $END = $request->END;
        $TYPE = $request->TYPE;
        $VALUE = $request->VALUE;

        for ($ADDRESS = $START; $ADDRESS <= $END; $ADDRESS++) {
            $ID_VARIABLE = "$ID_SLAVE.$ID_SLOT.$ADDRESS";
            $check_id = SlaveModel::select('ID_VARIABLE')->where('ID_VARIABLE', '=', $ID_VARIABLE)->count();
            if ($check_id == 1) {
                // alihkan halaman ke halaman /variable-list/slave-variable
                return redirect('/variable-list/slave-variable')
                    ->with('input-error', 'Data already exist!');
            } elseif ($check_id == 0) {
                if ($START <= 0){
                    return redirect('/variable-list/slave-variable')
                    ->with('start-error', 'Minimum Value of Start is 1');
                } elseif ($END > 9999){
                    return redirect('/variable-list/slave-variable')
                    ->with('end-error', 'Maximum Value of End is 9999');
                } else {
                    if ($TYPE == 'COIL') {
                        $ACCESS = 1;
                        $VALUE = 'FALSE';
                        $VARIABLE_NAME = "COIL_$ADDRESS";
                        $slave_variables = SlaveModel::insert([
                            'ID_VARIABLE' => $ID_VARIABLE,
                            'ID_SLAVE' => $ID_SLAVE,
                            'ID_SLOT' => $ID_SLOT,
                            'VARIABLE_NAME' => $VARIABLE_NAME,
                            'TYPE' => $TYPE,
                            'ACCESS' => $ACCESS,
                            'ADDRESS' => $ADDRESS,
                            'VALUE' => $VALUE,
                        ]);
                    } elseif ($TYPE == 'HOLDING') {
                        $ACCESS = 1;
                        $VALUE = 0;
                        $VAR_NUM = $ADDRESS - 40000;
                        $VARIABLE_NAME = "HOLDING_$VAR_NUM";
                        $slave_variables = SlaveModel::insert([
                            'ID_VARIABLE' => $ID_VARIABLE,
                            'ID_SLAVE' => $ID_SLAVE,
                            'ID_SLOT' => $ID_SLOT,
                            'VARIABLE_NAME' => $VARIABLE_NAME,
                            'TYPE' => $TYPE,
                            'ACCESS' => $ACCESS,
                            'ADDRESS' => $ADDRESS,
                            'VALUE' => $VALUE,
                        ]);
                    } elseif ($TYPE == 'INPUT_REGISTER') {
                        $ACCESS = 0;
                        $VALUE = false;
                        $VAR_NUM = $ADDRESS - 30000;
                        $VARIABLE_NAME = "INPUT_REGISTER_$VAR_NUM";
                        $slave_variables = SlaveModel::insert([
                            'ID_VARIABLE' => $ID_VARIABLE,
                            'ID_SLAVE' => $ID_SLAVE,
                            'ID_SLOT' => $ID_SLOT,
                            'VARIABLE_NAME' => $VARIABLE_NAME,
                            'TYPE' => $TYPE,
                            'ACCESS' => $ACCESS,
                            'ADDRESS' => $ADDRESS,
                            'VALUE' => $VALUE,
                        ]);
                    } elseif ($TYPE == 'DISCRETE_INPUT') {
                        $ACCESS = 0;
                        $VALUE = 0;
                        $VAR_NUM = $ADDRESS - 10000;
                        $VARIABLE_NAME = "DISCRETE_INPUT_$VAR_NUM";
                        $slave_variables = SlaveModel::insert([
                            'ID_VARIABLE' => $ID_VARIABLE,
                            'ID_SLAVE' => $ID_SLAVE,
                            'ID_SLOT' => $ID_SLOT,
                            'VARIABLE_NAME' => $VARIABLE_NAME,
                            'TYPE' => $TYPE,
                            'ACCESS' => $ACCESS,
                            'ADDRESS' => $ADDRESS,
                            'VALUE' => $VALUE,
                        ]);
                    }
                }
            }
        }
        // alihkan halaman ke halaman /variable-list/slave-variable
        return redirect('/variable-list/slave-variable')
            ->with('add-success', 'Data has ben added!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $ID_VARIABLE = $request->ID_VARIABLE;
        $ID_SLAVE = $request->ID_SLAVE;
        $ID_SLOT = $request->ID_SLOT;
        $VARIABLE_NAME = $request->VARIABLE_NAME;
        $TYPE = $request->TYPE;
        $ACCESS = $request->ACCESS;
        $ADDRESS = $request->ADDRESS;

        $slave_variables = SlaveModel::where('ID_VARIABLE', '=', $ID_VARIABLE)
            ->update([
                'ID_SLAVE' => $ID_SLAVE,
                'ID_SLOT' => $ID_SLOT,
                'VARIABLE_NAME' => $request->VARIABLE_NAME,
                'TYPE' => $request->TYPE,
                'ACCESS' => $request->ACCESS,
                'ADDRESS' => $ADDRESS,
            ]);

        // alihkan halaman ke halaman /variable-list/slave-variable
        return redirect('/variable-list/slave-variable')
            ->with('update-success', 'Data has ben updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function delete($ID_VARIABLE)
    {
        //memilih id
        $SLAVE_VARIABLE = SlaveModel::where('ID_VARIABLE', $ID_VARIABLE);
        if ($SLAVE_VARIABLE->delete()) {
            echo 'Data Deleted';
        }
    }

    public function deleteAll(Request $request)
    {
        $ID_VARIABLES = $request->input('id');
        $SLAVE_VARIABLE = SlaveModel::whereIn('ID_VARIABLE', $ID_VARIABLES);
        if ($SLAVE_VARIABLE->delete()) {
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
        $data = SlaveModel::whereNotIn('ID_SLAVE', [3])->get()->toArray();
        return Excel::create('Slave Variable', function ($excel) use ($data) {
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
        try
        {
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
                SlaveModel::insert($dataImported);
            }
        } catch (\Exception $ex) {
            return back()->with('import-error', 'Something wrong. Check your query or file.');
        }

        return back()->with('import-success', 'Your file successfully import in database!!!');
    }

    public function deleteAllVariable()
    {
        DB::delete('DELETE FROM `SLAVE_VARIABLES` WHERE NOT `ID_SLAVE` = 3');
        return json_encode(1);
    }
}
