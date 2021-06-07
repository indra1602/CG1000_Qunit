<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Eloquent;

class SlaveProtocolsModel extends Model
{
    protected $table ='SLAVE_PROTOCOLS';
    protected $fillable = [
        'ID_SLAVE',
        'NAMES'
    ];
}
