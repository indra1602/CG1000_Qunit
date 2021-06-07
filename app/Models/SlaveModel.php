<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Eloquent;

class SlaveModel extends Model
{
    public $timestamps = false;
    protected $table ='SLAVE_VARIABLES';
    protected $fillable = ['ID_VARIABLE','ID_SLAVE','ID_SLOT','ADDRESS','VARIABLE_NAME','TYPE','ACCESS','VALUE'];
    
}
