<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HardwareSettingModel extends Model
{
    public $timestamps = false;
    protected $table ='HARDWARE_SETTING';
    protected $fillable = [
        'ID',
        'IP_HW',
        'SUBNET',
        'GATEWAY',
        'HW_NAME'
    ];
}
