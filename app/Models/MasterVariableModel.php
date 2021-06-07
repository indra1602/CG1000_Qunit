<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Eloquent;

class MasterVariableModel extends Model
{
    // public $table = "showmastervariable";

    protected $table ='MASTER_VARIABLES';
    protected $fillable = ['ID_VARIABLE','SLV_VARIABLE','ID_MASTER','ID_SLOT','VARIABLE_NAME','TYPE','ADDRESS','VALUE'];
}
