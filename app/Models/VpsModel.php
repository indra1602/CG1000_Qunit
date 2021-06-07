<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Eloquent;

class VpsModel extends Model
{
    public $timestamps = false;
    protected $table ='MASTER_VPS';
    protected $fillable = ['ID_VARIABLE','ID_SLAVE','ID_SLOT','ADDRESS','VARIABLE_NAME','TYPE','ACCESS','VALUE'];
}
