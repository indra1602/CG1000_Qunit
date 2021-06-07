<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Eloquent;

class GeneralSettingModel extends Model
{
    public $timestamps = false;
    protected $table ='GENERAL_SETTING';
    protected $fillable = [
        'ID_SLOT',
        'IP_REDUNDANT',
        'IP_MC',
        'IP_MAIN',
        'IP_BACKUP',
        'REDUNDANCY_TYPE',
        'ID_SLAVE',
        'ID_MASTER',
        'ACTIVE'
    ];
}
