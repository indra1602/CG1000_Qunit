<?php
namespace App\Http\Controllers;

use App\Models\SlaveModel;
use Datatables;
use Excel;
use Illuminate\Http\Request;

class VariableValueController extends Controller
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
        return view('/variable-list/variable-value');
    }

    public function data()
    {
        $VARIABLE_VALUE = SlaveModel::join('MASTER_VARIABLES', 'MASTER_VARIABLES.SLV_ADDRESS', '=', 'SLAVE_VARIABLES.ID_VARIABLE')
            ->select(
                'SLAVE_VARIABLES.VARIABLE_NAME as sv_variable_name',
                'SLAVE_VARIABLES.TYPE as sv_type',
                'SLAVE_VARIABLES.ADDRESS as sv_address',
                'SLAVE_VARIABLES.VALUE as sv_value',
                'MASTER_VARIABLES.VARIABLE_NAME as ms_variable_name',
                'MASTER_VARIABLES.TYPE as ms_type',
                'MASTER_VARIABLES.ADDRESS as ms_address',
                'MASTER_VARIABLES.VALUE as ms_value'
            )->get();

        return Datatables::of($VARIABLE_VALUE)->make(true);
    }

    public function download($type)
    {
        $variable_value = SlaveModel::join('MASTER_VARIABLES', 'MASTER_VARIABLES.SLV_ADDRESS', '=', 'SLAVE_VARIABLES.ID_VARIABLE')
            ->get();
        $VariableValueArray = [];
        $VariableValueArray[] = ['VARIABLE_NAME', 'TYPE', 'ADDRESS', 'VARIABLE_NAME', 'TYPE', 'ADDRESS', 'VALUE'];
        foreach ($variable_value as $variable_value => $rows) {
            $VariableValueArray[] = $rows->toArray();
        }
        Excel::create('Variable Value', function ($excel) use ($VariableValueArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Variable Value');
            $excel->setCreator('LEN-FEP')->setCompany('LEN Industri');
            $excel->setDescription('Variable Value file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('variable-value', function ($sheet) use ($VariableValueArray) {
                $sheet->fromArray($VariableValueArray, null, 'A1', false, false);
            });

        })->download($type);
    }
}
