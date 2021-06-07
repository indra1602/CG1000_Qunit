<?php
namespace App\Http\Controllers;

use App\Models\GeneralSettingModel;

class RestartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function restart()
    {
        try {
            $restartMain = app('App\Http\Controllers\RestartController')
        ->restartMain();
            $restartBackup = app('App\Http\Controllers\RestartController')
        ->restartBackup();
        } catch (Exception $e) {
            return back()->with('restart-error', 'Something wrong. Restart 
        failed.');
        }
        return back()->with('restart-success', 'Restart succesfully!');
    }

    public function restartMain()
    {
        try {
            $host = GeneralSettingModel::where('ID_MASTER', '1') ->value('IP_MAIN');
            // $host = "127.0.0.1";
            $port = 235;
            $message = "r";
            set_time_limit(0);
            // dd($host);
            // dd($host_backup);
            // echo "Message To server :".$message;
            // create socket
            $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
            // dd($socket);
            // connect to server
            $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
            // dd($result);
            // send string to server
            socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
            // get server response
            // $result = socket_read($socket, 1024) or die("Could not read server response\n");
            // echo "Reply From Server  :" . $result;
            // close socket
            socket_shutdown($socket,2);
            socket_close($socket);
            return back()->with('restart-main-success', 'Restart succesfully!');
        } catch (\Exception $ex) {
            return back()->with('restart-main-error', 'Something wrong. Restart failed.');
        }
    }

    public function restartBackup()
    {
        try {
            $host_backup = GeneralSettingModel::where('ID_MASTER', '1')->value('IP_BACKUP');
            // $host_backup = "127.0.0.1";
            $port = 235;
            $message = "r";
            set_time_limit(0);
            // dd($host);
            // dd($host_backup);
            // echo "Message To server :".$message;
            // create socket
            $socket_backup = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
            // connect to server
            $result_backup = socket_connect($socket_backup, $host_backup, $port) or die("Could not connect to backup server\n");
            // send string to server
            socket_write($socket_backup, $message, strlen($message)) or die("Could not send data to backup server\n");
            // get server response
            // $result_backup = socket_read($socket_backup, 1024) or die("Could not read server response\n");
            // echo "Reply From Backup Server  :" . $result_backup;
            // close socket
            socket_shutdown($socket_backup,2);
            socket_close($socket_backup);
            return back()->with('restart-backup-success', 'Restart succesfully!');
        } catch (\Exception $ex) {
            return back()->with('restart-backup-error', 'Something wrong. Restart failed.');
        }
    }

    public function restartGeneralSetting()
    {
        try {
            $host = "127.0.0.1";
            $port = 235;
            $message = "w";
            // dd($host);
            // dd($host_backup);
            // echo "Message To server :".$message;
            // create socket
            $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
            // connect to server
            $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
            // send string to server
            socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
            // get server response
            // $result = socket_read($socket, 1024) or die("Could not read server response\n");
            // echo "Reply From Server  :" . $result;
            // echo "Reply From Backup Server  :" . $result_backup;
            // close socket
            socket_shutdown($socket_backup,2);
            socket_close($socket);
            // socket_close($socket_backup);
            return back()->with('restart-main-success', 'Restart succesfully!');
        } catch (\Exception $ex) {
            return back()->with('restart-main-error', 'Something wrong. Restart failed.');
        }
    }
}
