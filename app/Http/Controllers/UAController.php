<?php
namespace App\Http\Controllers;

use App\Models\GeneralSettingModel;
use App\Models\VpsModel;
use App\Models\SlaveProtocolsModel;
use Datatables;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RcbController extends Controller
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

        //show from table SLAVE_VARIABLES
        $VPS_VARIABLES = VpsModel::get();

        return view(
            '/variable-list/vps-variable',
            [
                'SLAVE_PROTOCOLS' => $SLAVE_PROTOCOLS,
                'GENERAL_SETTING' => $GENERAL_SETTING,
                'VPS_VARIABLES' => $VPS_VARIABLES,
            ]
        );
    }

    public function data()
    {
        $RCB_VARIABLES = RcbModel::select('*')->orderBy('TYPE');
        return Datatables::of($RCB_VARIABLES)
            ->addColumn('action', function ($row) {
                $btn = '<div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle btn-rounded"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item modify-modal" href="javascript:void(0)" data-toggle="tooltip"
                                    data-id-variable="' . $row->ID_VARIABLE . '"
                                    data-id-slave="' . $row->ID_SLAVE . '"
                                    data-id-slot="' . $row->ID_SLOT . '"
                                    data-variable-name="' . $row->VARIABLE_NAME . '"
                                    data-type="' . $row->TYPE . '"
                                    data-address="' . $row->ADDRESS . '"
                                    data-access="' . $row->ACCESS . '"
                                    data-original-title="Modify">Modify</a>
                                <a class="dropdown-item deleteRcbVariable" href="javascript:void(0)" data-toggle="tooltip" data-id-variable="' . $row->ID_VARIABLE . '" data-original-title="Delete">Delete</a>
                            </div>
                        </div>';
                return $btn;
            })
            ->addColumn('checkbox', '<input type="checkbox" name="rcb_checkbox[]" class="rcb_checkbox" value="{{$ID_VARIABLE}}" />')
            ->make(true);
    }

    public function dataTmpRcb()
    {
        $SV_TMP_VARIABLES = RcbVartmpModel::select('*')->orderBy('TYPE');
        return Datatables::of($SV_TMP_VARIABLES)
            ->addColumn('checkbox', function ($row) {
                $ckbx = '<input type="checkbox" data-id="' . $row->ID_VARIABLE . '" name="tmp_rcb[]" class="tmp_rcb"/>';
                return $ckbx;
            })
            ->make(true);
    }

    public function copyTmpRcbsatu()
    {
        $id = [];
        $id = $_GET['id'];

        try {
            $host = "127.0.0.1";
            $port = 235;
            $message = "%";
            // echo "Message To server :".$message;
            // create socket
            $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
            // connect to server
            $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
            // send string to server
            socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
            // get server response
            $result = socket_read($socket, 1024) or die("Could not read server response\n");

            foreach ($id as $row => $values) {
                $delete_data_rcb_tmp = DB::delete('DELETE FROM `rcb_variables` WHERE ID_VARIABLE = (?)', ["$values"]);
                //insert
                $insert_data = DB::statement('INSERT INTO rcb_variables (ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE) SELECT ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE FROM rcb_variables_tmp WHERE ID_VARIABLE = (?)', [$values]);
            }
            echo "Reply From Server  :" . $result;
            // close socket
            socket_close($socket);
            return back()->with('Sending-data-success', 'Sending data succesfully!');
        } catch (\Exception $ex) {
            return back()->with('Sending-data-error', 'Something wrong. Sending data failed.');
        }
        return;
    }

    public function copyTmpRcbdua()
    {
        $id = [];
        $id = $_GET['id'];

        try {
            $host = "127.0.0.1";
            $port = 235;
            $message = "^";
            // echo "Message To server :".$message;
            // create socket
            $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
            // connect to server
            $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
            // send string to server
            socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
            // get server response
            $result = socket_read($socket, 1024) or die("Could not read server response\n");

            foreach ($id as $row => $values) {
                $delete_data_rcb_tmp = DB::delete('DELETE FROM `rcb_variables` WHERE ID_VARIABLE = (?)', ["$values"]);
                //insert
                $insert_data = DB::statement('INSERT INTO rcb_variables (ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE) SELECT ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE FROM rcb_variables_tmp WHERE ID_VARIABLE = (?)', [$values]);
            }
            echo "Reply From Server  :" . $result;
            // close socket
            socket_close($socket);
            return back()->with('Sending-data-success', 'Sending data succesfully!');
        } catch (\Exception $ex) {
            return back()->with('Sending-data-error', 'Something wrong. Sending data failed.');
        }
        return;
    }

    public function copyTmpRcbtiga()
    {
        $id = [];
        $id = $_GET['id'];

        try {
            $host = "127.0.0.1";
            $port = 235;
            $message = "&";
            // echo "Message To server :".$message;
            // create socket
            $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
            // connect to server
            $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
            // send string to server
            socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
            // get server response
            $result = socket_read($socket, 1024) or die("Could not read server response\n");

            foreach ($id as $row => $values) {
                $delete_data_rcb_tmp = DB::delete('DELETE FROM `rcb_variables` WHERE ID_VARIABLE = (?)', ["$values"]);
                //insert
                $insert_data = DB::statement('INSERT INTO rcb_variables (ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE) SELECT ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE FROM rcb_variables_tmp WHERE ID_VARIABLE = (?)', [$values]);
            }
            echo "Reply From Server  :" . $result;
            // close socket
            socket_close($socket);
            return back()->with('Sending-data-success', 'Sending data succesfully!');
        } catch (\Exception $ex) {
            return back()->with('Sending-data-error', 'Something wrong. Sending data failed.');
        }
        return;
    }

    public function copyTmpRcbempat()
    {
        $id = [];
        $id = $_GET['id'];

        try {
            $host = "127.0.0.1";
            $port = 235;
            $message = "*";
            // echo "Message To server :".$message;
            // create socket
            $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
            // connect to server
            $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
            // send string to server
            socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
            // get server response
            $result = socket_read($socket, 1024) or die("Could not read server response\n");

            foreach ($id as $row => $values) {
                $delete_data_rcb_tmp = DB::delete('DELETE FROM `rcb_variables` WHERE ID_VARIABLE = (?)', ["$values"]);
                //insert
                $insert_data = DB::statement('INSERT INTO rcb_variables (ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE) SELECT ID_VARIABLE, ID_SLAVE, ID_SLOT, ADDRESS, VARIABLE_NAME, TYPE, ACCESS, VALUE FROM rcb_variables_tmp WHERE ID_VARIABLE = (?)', [$values]);
            }
            echo "Reply From Server  :" . $result;
            // close socket
            socket_close($socket);
            return back()->with('Sending-data-success', 'Sending data succesfully!');
        } catch (\Exception $ex) {
            return back()->with('Sending-data-error', 'Something wrong. Sending data failed.');
        }
        return;
    }

    public function delete($ID_VARIABLE)
    {
        //memilih id
        $RCB_VARIABLE = RcbModel::where('ID_VARIABLE', $ID_VARIABLE);
        if ($RCB_VARIABLE->delete()) {
            echo 'Data Deleted';
        }
    }

    public function deleteAll(Request $request)
    {
        $ID_VARIABLES = $request->input('id');
        $RCB_VARIABLE = RcbModel::whereIn('ID_VARIABLE', $ID_VARIABLES);
        if ($RCB_VARIABLE->delete()) {
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

        $slave_variables = RcbModel::where('ID_VARIABLE', '=', $ID_VARIABLE)
            ->update([
                'ID_SLAVE' => $ID_SLAVE,
                'ID_SLOT' => $ID_SLOT,
                'VARIABLE_NAME' => $request->VARIABLE_NAME,
                'TYPE' => $request->TYPE,
                'ACCESS' => $request->ACCESS,
                'ADDRESS' => $ADDRESS,
            ]);

        // alihkan halaman ke halaman /variable-list/slave-variable
        return redirect('/variable-list/rcb-variable')
            ->with('update-success', 'Data has ben updated!');
    }

    public function download($type)
    {
        $data = RcbModel::get()->toArray();
        return Excel::create('Rcb Variable', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
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
                RcbModel::insert($dataImported);
            }
        } catch (\Exception $ex) {
            return back()->with('import-error', 'Something wrong. Check your query or file.');
        }

        return back()->with('import-success', 'Your file successfully import in database!!!');
    }
}
