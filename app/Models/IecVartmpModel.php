<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IecVartmpModel extends Model
{
    public $timestamps = false;
    protected $table ='IEC_VARIABLES_TMP';
    protected $fillable = ['ID_VARIABLE','ID_SLAVE','ID_SLOT','ADDRESS','VARIABLE_NAME','TYPE','ACCESS','VALUE'];
}
