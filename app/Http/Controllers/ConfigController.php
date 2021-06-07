<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $DATA_USER = DB::SELECT('SELECT*FROM users');
        return view('/user-config', [
            'DATA_USER' => $DATA_USER,
        ]);
    }

    public function update(Request $data)
    {
        $arr = [];
        $idUser = $_GET['idUser'];
        $cPassword = $_GET['cPassword'];
        array_push($arr, $idUser, $cPassword);

        $update_password = DB::update('update users set password = (?) where id = (?)', [Hash::make($cPassword), $idUser]);

        return json_encode(1);
    }
}
