<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SlaveConfigModel extends Model
{
    public $timestamps = false;
    protected $table ='SLAVE_CONFIG';
    protected $fillable = ['ID_SLOT','ID_SLAVE','CONFIG_ITEM','VALUE'];
}
