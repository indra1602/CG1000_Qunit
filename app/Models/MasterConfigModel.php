<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterConfigModel extends Model
{
    public $timestamps = false;
    protected $table ='MASTER_CONFIG';
    protected $fillable = ['ID_MASTER','CONFIG_ITEM','VALUE'];
}
