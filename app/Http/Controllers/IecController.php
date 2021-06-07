<?php
namespace App\Http\Controllers;

use App\Models\GeneralSettingModel;
use App\Models\IecModel;
use App\Models\IecVartmpModel;
use App\Models\SlaveModel;
use App\Models\SlaveProtocolsModel;
use App\Models\SlaveConfigModel;
use Datatables;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IecController extends Controller
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
        $SLAVE_PROTOCOLS = SlaveProtocolsModel::get();
        $GENERAL_SETTING = GeneralSettingModel::get();
        $IEC_VARIABLES = SlaveModel::where('ID_SLAVE', '=', 3)->get();

        return view('/variable-list/iec-variable',
            [
                'SLAVE_PROTOCOLS' => $SLAVE_PROTOCOLS,
                'GENERAL_SETTING' => $GENERAL_SETTING,
                'IEC_VARIABLES' => $IEC_VARIABLES,
            ]);
    }

    public function download($type)
    {
        $data = SlaveModel::where('ID_SLAVE', '=', '3')->get()->toArray();
        return Excel::create('Iec Variable', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function delete($ID_VARIABLE)
    {
        //memilih id
        $IEC_VARIABLE = SlaveModel::where('ID_VARIABLE', $ID_VARIABLE);
        if ($IEC_VARIABLE->delete()) {
            echo 'Data Deleted';
        }
        return 0;
    }

    public function deleteAll(Request $request)
    {
        $ID_VARIABLES = $request->input('id');
        $IEC_VARIABLE = SlaveModel::whereIn('ID_VARIABLE', $ID_VARIABLES);
        if ($IEC_VARIABLE->delete()) {
            echo 'Data Deleted';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        $VALUE="";

        if ($ACCESS == '0') {
            $ACCESS = 'Read';
        } elseif ($ACCESS == '1') {
            $ACCESS = 'Read/Write';
        }

        if ($TYPE == 'BOOL') {
            $VALUE = 'FALSE';
        } elseif ($TYPE == 'DOUBLE') {
            $VALUE = 0;
        } elseif ($TYPE == 'INT') {
            $VALUE = 0;
        } elseif ($TYPE == 'REAL') {
            $VALUE = 0;
        } elseif ($TYPE == 'FLOAT') {
            $VALUE = 0;
        } elseif ($TYPE == 'STRING') {
            $VALUE = 0;
        }

        $slave_variables = SlaveModel::where('ID_VARIABLE', '=', $ID_VARIABLE)
            ->update([
                'ID_SLAVE' => $ID_SLAVE,
                'ID_SLOT' => $ID_SLOT,
                'VARIABLE_NAME' => $request->VARIABLE_NAME,
                'TYPE' => $request->TYPE,
                'ACCESS' => $request->ACCESS,
                'ADDRESS' => $ADDRESS,
                'VALUE' => $VALUE,
            ]);
        // alihkan halaman ke halaman /variable-list/slave-variable
        return redirect('/variable-list/iec-variable')
            ->with('update-success', 'Data has ben updated!');
    }

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
                SlaveModel::insert($dataImported);
            }
        } catch (\Exception $ex) {
            return back()->with('import-error', 'Something wrong. Check your query or file.');
        }
        return back()->with('import-success', 'Your file successfully import in database!!!');
    }

    public function deleteAllVariable()
    {
        DB::delete('DELETE FROM `SLAVE_VARIABLES` WHERE ID_SLAVE = 3');
        return json_encode(1);
    }
}
