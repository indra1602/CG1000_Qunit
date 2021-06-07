<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Eloquent;

class MasterProtocolsModel extends Model
{
    public $timestamps = false;
    protected $table ='MASTER_PROTOCOLS';
    protected $fillable = [
        'ID_MASTER',
        'NAMES',
        'ACTIVED'
    ];
}
